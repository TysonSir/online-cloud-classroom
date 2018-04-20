<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    //get.admin/course  全部课程列表
    public function index()
    {
        if(session('tea_id') == 1){
            $data = Course::orderBy('cour_order','asc')
                ->where('cour_isdelete',0)->get();
        }else{
            $data = Course::orderBy('cour_order','asc')->where('tea_id',session('tea_id'))
                ->where('cour_isdelete',0)->get();
        }

        return view('admin.course.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $course = Course::find($input['cour_id']);
        $course->cour_order = $input['cour_order'];
        $re = $course->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '课程排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/course/create   添加课程
    public function create()
    {
        return view('admin/course/add');
    }

    //post.admin/course  添加课程提交
    public function store()
    {
        $input = Input::except('_token','fileselect');
        $input['cour_time'] = time();
        $input['tea_id'] = session('tea_id');
        $rules = [
            'cour_name'=>'required',
            'cour_teacher'=>'required',
            'cour_image'=>'required',
            'cour_title'=>'required',
        ];

        $message = [
            'cour_name.required'=>'课程名称不能为空！',
            'cour_teacher.required'=>'任课教师不能为空！',
            'cour_image.required'=>'课程图片不能为空！',
            'cour_title.required'=>'课程简介不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Course::create($input);
            if($re){
                return redirect('admin/course');
            }else{
                return back()->with('errors','课程添加失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/course/{course}/edit  编辑课程
    public function edit($cour_id)
    {
        $field = Course::find($cour_id);
        return view('admin.course.edit',compact('field'));
    }

    //put.admin/course/{course}    更新课程
    public function update($cour_id)
    {
        $input = Input::except('_token','_method','fileselect');
        $re = Course::where('cour_id',$cour_id)->update($input);
        if($re){
            return redirect('admin/course');
        }else{
            return back()->with('errors','课程更新失败，请稍后重试！');
        }
    }

    //delete.admin/course/{course}   删除课程
    public function destroy($cour_id)
    {
        //$re = Course::where('cour_id',$cour_id)->delete();
        $re = Course::where('cour_id',$cour_id)->update(['cour_isdelete' => 1]);
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '课程删除失败，请稍后重试！',
            ];
        }
        return $data;
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

}
