<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';


class LoginController extends CommonController
{
    //登录
    public function login()
    {
        if ($input = Input::all()){
            //dd($input);
            /*  无验证码
            $_code = $this->getcode();//获得验证码内容
            //验证验证码
            if (strtoupper($input['code']) != $_code){//验证码转成大写
                return back()->with('msg','验证码错误');//返回到本页面，传参
            }
            */

            $u = $input['username'];
            $p = $input['password'];
            $row = (new Teacher)->checkUser($u,$p);
            if(empty($row)){
                return back()->with('msg','用户名或密码错误');//返回到本页面，传参
            }else{

                session(['tea_name' => $row['tea_name'],'tea_id' => $row['tea_id']]);
                //Session::put(['acc_name' => $row['acc_name'],'acc_id' => $row['acc_id']]);
                return redirect('admin/index');
            }


//            $teacher = Teacher::first();//取第一个数据
//            //dd($teacher);
//            //验证用户名
//            if ($teacher->tea_name != $input['username'] || decrypt($teacher->tea_password) != $input['password']){//验证用户名密码
//                return back()->with('msg','用户名或密码错误');//返回到本页面，传参
//            }
//
//
//            //登录成功
//            session(['teacher' => $teacher]);
//            return redirect('admin/index');

        }else{

            return view('admin.login');
        }

    }
    //制作验证码图片
    public function code()
    {
        $code = new \Code;
        $code->make();

    }
    //得到验证码信息
    public function getcode()
    {
        $code = new \Code;
        return $code->get();
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
    //退出登录
    public function logout()
    {
        session(['tea_id'=>null]);
        return redirect('admin/login');
    }

}
