<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{

    //图片上传
    public function upload()
    {
        //××  注意文件夹权限 ×///
        $input = Input::all();
        $file = Input::file('file');
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads/homework/',$newName);
            $filepath = 'uploads/homework/'.$newName;
            return $filepath;
        }
    }
}
