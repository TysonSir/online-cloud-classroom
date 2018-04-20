@extends('layouts.admin')
@section('content')
        <!--面包屑学生 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 学生管理
</div>
<!--面包屑学生 结束-->

<!--结果集标题与学生组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加学生</h3>
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
            <a href="{{url('admin/student/create')}}"><i class="fa fa-plus"></i>添加学生</a>
            <a href="{{url('admin/student')}}"><i class="fa fa-recycle"></i>全部学生</a>
        </div>
    </div>
</div>
<!--结果集标题与学生组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/student')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>学生姓名：</th>
                <td>
                    <input type="text" name="stu_name">

                    <span><i class="fa fa-exclamation-circle yellow"></i>学生名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 学生学号：</th>
                <td>
                    <input type="text" class="lg" name="stu_code" value="1430">
                </td>
            </tr>
            <tr>
                <th>登录密码：</th>
                <td>
                    <input type="text" class="lg" name="stu_password" value="0">
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
