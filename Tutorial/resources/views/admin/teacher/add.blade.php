@extends('layouts.admin')
@section('content')
        <!--面包屑教师 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 教师管理
</div>
<!--面包屑教师 结束-->

<!--结果集标题与教师组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加教师</h3>
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
            <a href="{{url('admin/teacher/create')}}"><i class="fa fa-plus"></i>添加教师</a>
            <a href="{{url('admin/teacher')}}"><i class="fa fa-recycle"></i>全部教师</a>
        </div>
    </div>
</div>
<!--结果集标题与教师组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/teacher')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>教师名称：</th>
                <td>
                    <input type="text" name="tea_name">
                    <span><i class="fa fa-exclamation-circle yellow"></i>教师名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 邮箱：</th>
                <td>
                    <input type="text" class="lg" name="tea_email" value="@163.com">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 密码：</th>
                <td>
                    <input type="text" class="lg" name="tea_password" >
                </td>
            </tr>
            <tr>
                <th>排序：</th>
                <td>
                    <input type="text" class="sm" name="tea_order" value="0">
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
