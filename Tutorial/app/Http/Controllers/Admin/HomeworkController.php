<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Course;
use App\Http\Model\Homework;
use App\Http\Model\Student;
use App\Http\Model\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeworkController extends Controller
{
    //get.admin/homework  全部作业列表
    public function index()
    {
        if(session('tea_id') == 1){
            $data = Homework::where('hw_state',0)->orderBy('cour_name', 'asc')->orderBy('task_id', 'asc')->orderBy('hw_addtime', 'desc')
                ->orderBy('hw_order', 'asc')->get();
            //SELECT * from tu_homework where hw_id in (SELECT max(hw_id) from tu_homework GROUP BY hw_name,stu_id)
            foreach ($data as $k => $v) {
                $data[$k]['stu_code'] = $this->StuidToCode($v['stu_id']);
                $data[$k]['stu_name'] = $this->StuidToName($v['stu_id']);
            }
        }else {
            //找出所有当前登录者的课程名
            $mycour_names = Course::select('cour_name')->where('tea_id', session('tea_id'))->get();
            $cour_names = array();
            foreach ($mycour_names as $k => $v) {
                $cour_names[] = "'".$v->cour_name."'";
            }
            //dd($cour_ids);

            //$data = Homework::orderBy('cour_name', 'asc')->orderBy('task_id', 'asc')->orderBy('hw_addtime', 'desc')->orderBy('hw_order', 'asc')->whereIn('cour_name', $cour_names)->get();
            $cour_names_str = implode(',',$cour_names);//dd($cour_names_str);
            $sql = "SELECT * from tu_homework where hw_state=0 and hw_id in (SELECT max(hw_id) from tu_homework GROUP BY hw_name,stu_id) and cour_name in (".$cour_names_str.") order by cour_name,task_id,hw_addtime desc,hw_order";
            //dd($sql);
            $data =  DB::select($sql);
                //->whereIn('cour_name', $cour_names)->get();
            //echo '<pre>';print_r($data);
            //dd($data);
            foreach ($data as $k => $v) {
                $data[$k]->stu_code = $this->StuidToCode($v->stu_id);
                $data[$k]->stu_name = $this->StuidToName($v->stu_id);
            }
//            foreach ($data as $k => $v) {
//                $data[$k]['stu_code'] = $this->StuidToCode($v['stu_id']);
//                $data[$k]['stu_name'] = $this->StuidToName($v['stu_id']);
//            }
        }
        return view('admin.homework.index',compact('data'));
    }
//分类批改作业
    public function evaluate($task_id)
    {



        if(session('tea_id') == 1){
            $data = Homework::where('hw_state',0)->orderBy('cour_name', 'asc')->orderBy('task_id', 'asc')->orderBy('hw_addtime', 'desc')
                ->orderBy('hw_order', 'asc')->get();
            //SELECT * from tu_homework where hw_id in (SELECT max(hw_id) from tu_homework GROUP BY hw_name,stu_id)
            foreach ($data as $k => $v) {
                $data[$k]['stu_code'] = $this->StuidToCode($v['stu_id']);
                $data[$k]['stu_name'] = $this->StuidToName($v['stu_id']);
            }
        }else {
            //找出所有当前登录者的课程名
            $mycour_names = Course::select('cour_name')->where('tea_id', session('tea_id'))->get();
            $cour_names = array();
            foreach ($mycour_names as $k => $v) {
                $cour_names[] = "'".$v->cour_name."'";
            }
            //dd($cour_names);

            //$data = Homework::orderBy('cour_name', 'asc')->orderBy('task_id', 'asc')->orderBy('hw_addtime', 'desc')->orderBy('hw_order', 'asc')->whereIn('cour_name', $cour_names)->get();
            $cour_names_str = implode(',',$cour_names);//dd($cour_names_str);

            $cour_ids = array();
            foreach ($mycour_names as $k => $v) {
                $cour_ids[] = $this->CourNameToId($v->cour_name);
            }
            //$cour_ids_str = implode(',',$cour_ids);
            //dd($cour_ids_str);
            //找出所有当前登录者的任务
            $mytasks = Task::select('task_id','task_name','cour_id')->whereIn('cour_id', $cour_ids)->get();
            //dd($mytasks);
            foreach ($mytasks as $k=>$v){
                $mytasks[$k]->cour_name = $this->CourIdToName($v->cour_id);
            }
            if ($task_id == 0){
                $sql = "SELECT * from tu_homework where hw_state=0 and hw_id in (SELECT max(hw_id) from tu_homework GROUP BY hw_name,stu_id) and cour_name in (".$cour_names_str.") order by cour_name,task_id,hw_addtime desc,hw_order";

            }else{
                $sql = "SELECT * from tu_homework where task_id=".$task_id." and hw_state=0 and hw_id in (SELECT max(hw_id) from tu_homework GROUP BY hw_name,stu_id) and cour_name in (".$cour_names_str.") order by cour_name,task_id,hw_addtime desc,hw_order";

            }
            //dd($sql);
            $data =  DB::select($sql);
            //->whereIn('cour_name', $cour_names)->get();
            //echo '<pre>';print_r($data);
            //dd($data);
            foreach ($data as $k => $v) {
                $data[$k]->stu_code = $this->StuidToCode($v->stu_id);
                $data[$k]->stu_name = $this->StuidToName($v->stu_id);
            }
//            foreach ($data as $k => $v) {
//                $data[$k]['stu_code'] = $this->StuidToCode($v['stu_id']);
//                $data[$k]['stu_name'] = $this->StuidToName($v['stu_id']);
//            }
        }
        return view('admin.homework.index',compact('data','mytasks'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $homework = Homework::find($input['hw_id']);
        $homework->hw_order = $input['hw_order'];
        $re = $homework->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '作业排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '作业排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/homework/create   添加作业
    public function create()
    {
        return view('admin/homework/add');
    }

    //post.admin/homework  添加作业提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'hw_name'=>'required',
            'hw_url'=>'required',
        ];

        $message = [
            'hw_name.required'=>'作业名称不能为空！',
            'hw_url.required'=>'作业URL不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Homework::create($input);
            if($re){
                return redirect('admin/homework');
            }else{
                return back()->with('errors','作业失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/homework/{homework}/edit  编辑作业
    public function edit($hw_id)
    {
        $field = Homework::find($hw_id);
        return view('admin.homework.edit',compact('field'));
    }

    //put.admin/homework/{homework}    更新作业
    public function update($hw_id)
    {
        $input = Input::except('_token','_method');
        $hw = Homework::find($hw_id);
        $re = Homework::where('hw_id',$hw_id)->update($input);
        if($re){
            return redirect('admin/evaluate/'. $hw->task_id);
        }else{
            return back()->with('errors','作业评分失败，请稍后重试！');
        }
    }

    //delete.admin/homework/{homework}   删除作业
    public function destroy($hw_id)
    {
        $re = Homework::where('hw_id',$hw_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '作业删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '作业删除失败，请稍后重试！',
            ];
        }
        return $data;
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

    //通过stu_id得学号
    public function StuidToCode($stu_id)
    {
        $student = Student::find($stu_id);
        if ($student)
            return $student->stu_code;
        else
            return '该学生已被删除';

    }

    //通过stu_id得姓名
    public function StuidToName($stu_id)
    {
        $student = Student::find($stu_id);
        if ($student)
            return $student->stu_name;
        else
            return '该学生已被删除';
    }

    //通过课程名得cour_id
    public function CourNameToId($cour_name)
    {
        $course = Course::where('cour_name',$cour_name)->first();
        if ($course)
            return $course->cour_id;
        else
            return '该课程已被删除';
    }

    //通过cour_id得课程名
    public function CourIdToName($cour_id)
    {
        $course = Course::where('cour_id',$cour_id)->first();
        if ($course)
            return $course->cour_name;
        else
            return '该课程已被删除';
    }

    //成绩单
    public function scorelist($cour_id=0)
    {
        $mycour_names = Course::select('cour_name','cour_id')->where('tea_id', session('tea_id'))->get();
        //dd($mycour_names);
        $cour_names = array();
        if ($cour_id == 0){
            foreach ($mycour_names as $k => $v) {
                $cour_names[] = "'".$v->cour_name."'";
            }
        }else{
            $mycour_name = Course::select('cour_name')->find($cour_id);
            $cour_names[] = "'".$mycour_name->cour_name."'";
        }

        $cour_names_str = implode(',',$cour_names);//dd($cour_names_str);
        //dd($cour_names_str);
        $sql = "SELECT DISTINCT `hw_name`,cour_name FROM `tu_homework` WHERE cour_name in (".$cour_names_str.") ";
        $alltask =  DB::select($sql);
        //dd($alltask);
        $alltask_str = "";
        foreach ($alltask as $k=>$v){
            //echo $v->hw_name;
            $alltask_str .= ",MAX(
                            CASE
                            WHEN  hw_name='". $v->hw_name ."' THEN
                                hw_score
                            END
                        ) AS '". $v->hw_name ."' ";
        }
        //echo $alltask_str;exit();

        $sql = "SELECT stu.stu_name,stu.stu_code,
    stu.stu_id".$alltask_str."
FROM
    (SELECT * FROM `tu_homework` 
    WHERE hw_id in (SELECT max(hw_id) FROM tu_homework GROUP BY hw_name,stu_id) 
    AND cour_name in (".$cour_names_str.")) AS new
    RIGHT JOIN tu_student AS stu ON stu.stu_id = new.stu_id
GROUP BY new.stu_id ORDER BY stu.stu_code";

        //var_dump($sql);
        $data =  DB::select($sql);
        //dd($data);
        return view('admin.homework.scorelist',compact('data','mycour_names','alltask'));
    }

}
