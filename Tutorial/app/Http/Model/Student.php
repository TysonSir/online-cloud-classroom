<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'stu_id';
    public $timestamps = false;//不自动加时间字段
    protected $guarded = [];//添加字段保护，除了设定的

    //根据用户名查询用户信息
    public function checkUser($username,$passwd=''){
        if ($passwd == '') {
            $sql = 'select count(*) from tu_student' . " where stu_code='" . $username . "'";
            $users = DB::select($sql);
            return $users;
        }else{

            $row = $this->where('stu_code',$username)->first();
            if (empty($row)) {
                return false;
            }
            //print_r($row);exit();
            if ($this->decrypt($row['stu_password']) != $passwd) {
                return false;
            }

            unset($row['stu_password']);
            return $row;
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
