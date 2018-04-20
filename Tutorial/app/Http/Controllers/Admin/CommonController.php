<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{


    //图片上传
    public function uploadimg()
    {
        $input = Input::all();
        $file = Input::file('file');
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads/images/',$newName);
            $filepath = 'uploads/images/'.$newName;
            return $filepath;
        }
    }

    //任务文件上传
    public function uploadtaskfile()
    {
        $input = Input::all();
        $file = Input::file('file');
        //print_r($file);exit();
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = $file->getClientOriginalName() .'_'. date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'\uploads\taskfile\\',$newName);
            $filepath = 'uploads\taskfile\\'.$newName;
            return $filepath;
        }
    }

    //课程文件上传
    public function uploadcourfile()
    {
        $input = Input::all();
        $file = Input::file('file');
        //print_r($file);exit();
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = $file->getClientOriginalName() .'_'. date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads/courfile/',$newName);
            $filepath = 'uploads/courfile/'.$newName;
            return $filepath;
        }
    }

    //课程视频上传
    public function uploadcourvideo()
    {
        $input = Input::all();
        $file = Input::file('file');
        //print_r($file);exit();
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            //$newName = $file->getClientOriginalName() .'_'. date('YmdHis').mt_rand(100,999).'.'.$entension;
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path()."/uploads/courvideo/",$newName);
            $filepath = "uploads/courvideo/".$newName;
            return $filepath;
        }
    }


}
