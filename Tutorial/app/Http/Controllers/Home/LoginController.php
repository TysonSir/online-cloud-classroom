<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Student;
use Illuminate\Support\Facades\Input;

class LoginController extends CommonController
{
    //
    public function login()
    {
        if($input = Input::except('_token')){
            //dd($input);
            $u = $input['stu_code'];
            $p = $input['stu_password'];


            $row = (new Student)->checkUser($u,$p);
            if(empty($row)){
                return back()->with('error_login','用户名或密码错误！');
            }else{

                session(['stu_name' => $row['stu_name'],'stu_id' => $row['stu_id']]);
                //Session::put(['acc_name' => $row['acc_name'],'acc_id' => $row['acc_id']]);
                return back();
            }

        }else{
            return view('home.index');
        }

    }
//
//    public function register()
//    {
//
//        if($input = Input::except('_token')){
//
//            $rules = [
//                'acc_name' => 'required',
//                'acc_phone' => 'size:11',
//                'acc_email' => 'required|email',
//                'acc_passwd' => 'required|between:6,20|confirmed'
//            ];
//            $massage = [
//                'acc_name.required' => '账户名不能为空！',
//                'acc_phone.size' => '请输入11位数字手机号码！',
//                'acc_email.required' => '请输入邮箱地址',
//                'acc_email.email' => '请输入正确的邮箱地址！',
//                'acc_passwd.required' => '密码不能为空',
//                'acc_passwd.between' => '密码必须在 6 到 20 位之间',
//                'acc_passwd.confirmed' => '重复密码 和 密码 不一致',
//            ];
//            //参数1：表单数据 参数2：验证规则 参数3：自定义错误提示
//
//            $validator = Validator::make($input,$rules,$massage);
//            //dd($validator);
//            if ($validator->passes()){
//                $input['acc_regtime'] = time();
//                $input['acc_passwd'] = $this->encrypt($input['acc_passwd']);
//                unset($input['acc_passwd_confirmation']);
//
//                $re = Account::create($input);
//                //dd($re);
//                if ($re){
//                    return redirect('login');
//                }else{
//                    return back()->with('error_insert','注册失败');
//                }
//
//
//            }else{
////          dd($validator->errors()->all());//错误信息
//                return back()->withErrors($validator);
//            }
//
//        }else{
//            return view('home.register');
//        }
//
//    }

    public function logout()
    {
        session(['stu_name' => '','stu_id' => '']);
        return back();
    }
}
