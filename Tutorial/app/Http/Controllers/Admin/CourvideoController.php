<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Courvideo;
use App\Http\Model\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CourvideoController extends Controller
{
    //get.admin/courvideo  全部课程视频列表
    public function index()
    {
        $data = Courvideo::orderBy('cv_order','asc')->get();
        foreach ($data as $k=>$v) {
            $data[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        return view('admin.courvideo.index',compact('data'));
    }

    public function changeOrder()
    {
        $input = Input::all();
        $courvideo = Courvideo::find($input['cv_id']);
        $courvideo->cv_order = $input['cv_order'];
        $re = $courvideo->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程视频排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '课程视频排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/courvideo/create   添加课程视频
    public function create()
    {
        if (session('tea_id') == 1)
            $courses = Course::where('cour_isdelete',0)->get();
        else
            $courses = Course::where('tea_id',session('tea_id'))->where('cour_isdelete',0)->get();

        foreach($courses as $k=>$v){
            $courses[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        return view('admin/courvideo/add',compact('courses'));
    }

    //post.admin/courvideo  添加课程视频提交
    public function store()
    {
        $input = Input::except('_token','fileselect');
        $input['cv_addtime'] = time();
        $rules = [
            'cour_id'=>'required',
            'cv_name'=>'required',
            'cv_url'=>'required',
        ];

        $message = [
            'cour_id.required'=>'请选择课程！',
            'cv_name.required'=>'课程视频名称不能为空！',
            'cv_url.required'=>'课程视频URL不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Courvideo::create($input);
            if($re){
                return redirect('admin/courvideo');
            }else{
                return back()->with('errors','课程视频失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/courvideo/{courvideo}/edit  编辑课程视频
    public function edit($cv_id)
    {
        $courses = Course::where('tea_id',session('tea_id'))->get();
        foreach($courses as $k=>$v){
            $courses[$k]['cour_name'] = $this->CouridToName($v['cour_id']);
        }
        $field = Courvideo::find($cv_id);
        return view('admin.courvideo.edit',compact('field','courses'));
    }

    //put.admin/courvideo/{courvideo}    更新课程视频
    public function update($cv_id)
    {
        $input = Input::except('_token','_method','fileselect');
        $re = Courvideo::where('cv_id',$cv_id)->update($input);
        if($re){
            return redirect('admin/courvideo');
        }else{
            return back()->with('errors','课程视频更新失败，请稍后重试！');
        }
    }

    //delete.admin/courvideo/{courvideo}   删除课程视频
    public function destroy($cv_id)
    {
        $re = Courvideo::where('cv_id',$cv_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '课程视频删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '课程视频删除失败，请稍后重试！',
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
