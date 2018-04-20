<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //get.admin/student  全部学生信息列表
    public function index()
    {
        $data = Student::orderBy('stu_order','asc')->get();
        foreach ($data as $v) {
            $v->stu_password = substr($v->stu_password,1,10);
        }

        return view('admin.student.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $student = Student::find($input['stu_id']);
        $student->stu_order = $input['stu_order'];
        $re = $student->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '学生信息排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '学生信息排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/student/create   添加学生信息
    public function create()
    {
        return view('admin/student/add');
    }

    //post.admin/student  添加学生信息提交
    public function store()
    {
        $input = Input::except('_token');
        $input['stu_password'] = Crypt::encrypt($input['stu_password']);

        $rules = [
            'stu_name'=>'required',
            'stu_code'=>'required',
            'stu_password'=>'required',
        ];

        $message = [
            'stu_name.required'=>'学生姓名不能为空！',
            'stu_code.required'=>'学生学号不能为空！',
            'stu_password.required'=>'登录密码不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Student::create($input);
            if($re){
                return redirect('admin/student');
            }else{
                return back()->with('errors','学生信息失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/student/{student}/edit  编辑学生信息
    public function edit($stu_id)
    {
        $field = Student::find($stu_id);
        return view('admin.student.edit',compact('field'));
    }

    //put.admin/student/{student}    更新学生信息
    public function update($stu_id)
    {
        $input = Input::except('_token','_method');
        $input['stu_password'] = Crypt::encrypt($input['stu_password']);
        $re = Student::where('stu_id',$stu_id)->update($input);
        if($re){
            return redirect('admin/student');
        }else{
            return back()->with('errors','学生信息更新失败，请稍后重试！');
        }
    }

    //delete.admin/student/{student}   删除学生信息
    public function destroy($stu_id)
    {
        $re = Student::where('stu_id',$stu_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '学生信息删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '学生信息删除失败，请稍后重试！',
            ];
        }
        return $data;
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

}
