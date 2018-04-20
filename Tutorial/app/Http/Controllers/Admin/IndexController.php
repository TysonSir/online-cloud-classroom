<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Teacher;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }
    //系统详情页
    public function info()
    {
        return view('admin.info');
    }

    public function pass()
    {
        if ($input = Input::all()){
            $rules = [
                'password' => 'required|between:6,20|confirmed'
            ];
            $massage = [
                'password.required' => '新密码不能为空',
                'password.between' => '新密码必须在 6 到 20 位之间',
                'password.confirmed' => '确认密码和新密码不一致',
            ];
            //参数1：表单数据 参数2：验证规则 参数3：自定义错误提示
            $validator = Validator::make($input,$rules,$massage);
            if ($validator->passes()){
                $teacher = Teacher::find(session('tea_id'));
                $_password = $this->decrypt($teacher->tea_password);//将数据库密码解密
                if ($input['password_o'] == $_password){//密码符合原密码
                    $teacher->tea_password = $this->encrypt($input['password']);
                    $teacher->update();

                    return back()->with('success','密码修改成功');//返回到本页面，传参
                }else{
                    return back()->with('error_o','原密码错误');//返回到本页面，传参
                }

            }else{
//                dd($validator->errors()->all());//错误信息
                return back()->withErrors($validator);
            }


            //dd($input);
        }else{
            return view('admin.pass');
        }

    }


    //加密
    public function encrypt($original)
    {
        return Crypt::encrypt($original);//加密
    }

    //解密
    public function decrypt($ciphertext)
    {
        return Crypt::decrypt($ciphertext);//解密
    }

}
