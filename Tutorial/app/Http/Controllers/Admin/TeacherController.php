<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    //get.admin/teacher  全部教师列表
    public function index()
    {
        $data = Teacher::orderBy('tea_order','asc')->get();

        return view('admin.teacher.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $teacher = Teacher::find($input['tea_id']);
        $teacher->tea_order = $input['tea_order'];
        $re = $teacher->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '教师排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '教师排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/teacher/create   添加教师
    public function create()
    {
        return view('admin/teacher/add');
    }

    //post.admin/teacher  添加教师提交
    public function store()
    {
        $input = Input::except('_token');
        $input['tea_password'] = Crypt::encrypt($input['tea_password']);
        $rules = [
            'tea_name'=>'required',
            'tea_password'=>'required',
            'tea_email'=>'required|email',
        ];

        $message = [
            'tea_name.required'=>'教师名称不能为空！',
            'tea_password.required'=>'登录密码不能为空！',
            'tea_email.required'=>'教师邮箱不能为空！',
            'tea_email.email'=>'请输入正确的邮箱地址！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Teacher::create($input);
            if($re){
                return redirect('admin/teacher');
            }else{
                return back()->with('errors','教师失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/teacher/{teacher}/edit  编辑教师
    public function edit($tea_id)
    {
        $field = Teacher::find($tea_id);
        return view('admin.teacher.edit',compact('field'));
    }

    //put.admin/teacher/{teacher}    更新教师
    public function update($tea_id)
    {
        $input = Input::except('_token','_method');
        $input['tea_password'] = Crypt::encrypt($input['tea_password']);
        $re = Teacher::where('tea_id',$tea_id)->update($input);
        if($re){
            return redirect('admin/teacher');
        }else{
            return back()->with('errors','教师更新失败，请稍后重试！');
        }
    }

    //delete.admin/teacher/{teacher}   删除教师
    public function destroy($tea_id)
    {
        $re = Teacher::where('tea_id',$tea_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '教师删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '教师删除失败，请稍后重试！',
            ];
        }
        return $data;
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

}
