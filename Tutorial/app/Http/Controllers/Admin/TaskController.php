<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Course;
use App\Http\Model\Homework;
use App\Http\Model\Task;
use App\Http\Model\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //get.admin/task  全部任务列表
    public function index()
    {
        if(session('tea_id') == 1){
            $data = Task::orderBy('cour_id', 'asc')->orderBy('task_order', 'asc')->get();
            foreach ($data as $k => $v) {
                $data[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
            }
        }else {
            //找出所有当前登录者的课程id
            $mycour_ids = Course::select('cour_id')->where('tea_id', session('tea_id'))->get();
            $cour_ids = array();
            foreach ($mycour_ids as $k => $v) {
                $cour_ids[] = $v->cour_id;
            }

            $data = Task::orderBy('cour_id', 'asc')->orderBy('task_order', 'asc')
                ->whereIn('cour_id', $cour_ids)->get();
            foreach ($data as $k => $v) {
                $data[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
            }
        }
        return view('admin.task.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $task = Task::find($input['task_id']);
        $task->task_order = $input['task_order'];
        $re = $task->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '任务排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '任务排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/task/create   添加任务
    public function create()
    {
        if (session('tea_id') == 1)
            $courses = Course::where('cour_isdelete',0)->get();
        else
            $courses = Course::where('tea_id',session('tea_id'))->where('cour_isdelete',0)->get();

        foreach($courses as $k=>$v){
            $courses[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        return view('admin/task/add',compact('courses'));
    }

    //post.admin/task  添加任务提交
    public function store()
    {
        $input = Input::except('_token','fileselect');
        //dd($input['task_finaltime'] . ' ' . '23:59:59');
        $input['task_finaltime'] = strtotime($input['task_finaltime']);
        //dd($input);
        $rules = [
            'task_name'=>'required',
            'task_description'=>'required',
            'task_finaltime'=>'required',
            'task_state'=>'required',
            'cour_id'=>'required',
        ];

        $message = [
            'task_name.required'=>'任务名称不能为空！',
            'task_description.required'=>'任务描述不能为空！',
            'task_finaltime.required'=>'任务提交截至时间不能为空！',
            'task_state.required'=>'任务状态不能为空！',
            'cour_id.required'=>'所属课程不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Task::create($input);
            if($re){
                $data['hw_name'] = $input['task_name'];
                $data['cour_name'] = $this->CouridToName($input['cour_id']);
                $data['hw_state'] = 1;
                $data['hw_addtime'] = time();
                //dd($data);

                Homework::insert($data);
                return redirect('admin/task');
            }else{
                return back()->with('errors','任务失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/task/{task}/edit  编辑任务
    public function edit($task_id)
    {
        $field = Task::find($task_id);
        $courses = Course::where('tea_id',session('tea_id'))->get();
        foreach($courses as $k=>$v){
            $courses[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        return view('admin.task.edit',compact('field','courses'));
    }

    //put.admin/task/{task}    更新任务
    public function update($task_id)
    {
        $input = Input::except('_token','_method','fileselect');
        $re = Task::where('task_id',$task_id)->update($input);
        if($re){

            return redirect('admin/task');
        }else{
            return back()->with('errors','任务更新失败，请稍后重试！');
        }
    }

    //delete.admin/task/{task}   删除任务
    public function destroy($task_id)
    {
        $re = Task::where('task_id',$task_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '任务删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '任务删除失败，请稍后重试！',
            ];
        }
        return $data;
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }
    
    //把课程id转成课程名
    public function CouridToName($id)
    {
        $course = Course::find($id);
        if ($course)
            return $course->cour_name;
        else
            return '该课程已删除';
    }

}
