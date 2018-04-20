<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Courfile;
use App\Http\Model\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CourfileController extends Controller
{
    //get.admin/courfile  全部课程文件列表
    public function index()
    {
        $data = Courfile::orderBy('cf_order','asc')->get();
        foreach ($data as $k=>$v) {
            $data[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        return view('admin.courfile.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $courfile = Courfile::find($input['cf_id']);
        $courfile->cf_order = $input['cf_order'];
        $re = $courfile->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程文件排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '课程文件排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/courfile/create   添加课程文件
    public function create()
    {
        if (session('tea_id') == 1)
            $courses = Course::where('cour_isdelete',0)->get();
        else
            $courses = Course::where('tea_id',session('tea_id'))->where('cour_isdelete',0)->get();

        foreach($courses as $k=>$v){
            $courses[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        return view('admin/courfile/add',compact('courses'));
    }

    //post.admin/courfile  添加课程文件提交
    public function store()
    {
        $input = Input::except('_token','fileselect');
        $input['cf_addtime'] = time();
        $rules = [
            'cour_id'=>'required',
            'cf_name'=>'required',
            'cf_url'=>'required',
        ];

        $message = [
            'cour_id.required'=>'请选择课程！',
            'cf_name.required'=>'课程文件名称不能为空！',
            'cf_url.required'=>'课程文件URL不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Courfile::create($input);
            if($re){
                return redirect('admin/courfile');
            }else{
                return back()->with('errors','课程文件失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/courfile/{courfile}/edit  编辑课程文件
    public function edit($cf_id)
    {
        $courses = Course::where('tea_id',session('tea_id'))->get();
        foreach($courses as $k=>$v){
            $courses[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        $field = Courfile::find($cf_id);
        return view('admin.courfile.edit',compact('field','courses'));
    }

    //put.admin/courfile/{courfile}    更新课程文件
    public function update($cf_id)
    {
        $input = Input::except('_token','_method','fileselect');
        $re = Courfile::where('cf_id',$cf_id)->update($input);
        if($re){
            return redirect('admin/courfile');
        }else{
            return back()->with('errors','课程文件更新失败，请稍后重试！');
        }
    }

    //delete.admin/courfile/{courfile}   删除课程文件
    public function destroy($cf_id)
    {
        $re = Courfile::where('cf_id',$cf_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程文件删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '课程文件删除失败，请稍后重试！',
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
        return $course->cour_name;
    }

}
