@extends('layouts.admin')
@section('content')
        <!--面包屑评分 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 评分管理
</div>
<!--面包屑评分 结束-->

<!--结果集标题与评分组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>编辑评分</h3>
        @if(count($errors)>0)
            <div class="mark">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
    <div class="result_content">
        <div class="short_wrap">
            {{--<a href="{{url('admin/homework/create')}}"><i class="fa fa-plus"></i>添加评分</a>--}}
            <a href="{{url('admin/homework')}}"><i class="fa fa-recycle"></i>全部作业</a>
        </div>
    </div>
</div>
<!--结果集标题与评分组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/homework/'.$field->hw_id)}}" method="post">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>作业名称：</th>
                <td>
                    <input type="text" name="hw_name" readonly value="{{$field->hw_name}}">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>文件：</th>
                <td>
                    <a href="{{url($field->hw_file)}}">下载 </a><a href="{{url($field->hw_file)}}"> {{url($field->hw_file)}}</a>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 评价：</th>
                <td>
                    <textarea name="hw_comment" id="" cols="30" rows="10">教师暂未评价</textarea>
                </td>
            </tr>
            <tr>
                <th>打分：</th>
                <td>
                    <input type="text" class="sm" name="hw_score" @if($field->hw_score >0) value="{{$field->hw_score}}" @endif>
                    <span><i class="fa fa-exclamation-circle yellow"></i>分数必须填写</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

@endsection
