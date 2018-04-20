@extends('layouts.admin')
@section('content')
        <!--面包屑学生 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 学生管理
</div>
<!--面包屑学生 结束-->

{{--<!--结果页快捷搜索框 开始-->--}}
{{--<div class="search_wrap">--}}
    {{--<form action="" method="post">--}}
        {{--<table class="search_tab">--}}
            {{--<tr>--}}
                {{--<th width="120">选择分类:</th>--}}
                {{--<td>--}}
                    {{--<select onchange="javascript:location.href=this.value;">--}}
                        {{--<option value="">全部</option>--}}
                        {{--<option value="http://www.baidu.com">百度</option>--}}
                        {{--<option value="http://www.sina.com">新浪</option>--}}
                    {{--</select>--}}
                {{--</td>--}}
                {{--<th width="70">关键字:</th>--}}
                {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                {{--<td><input type="submit" name="sub" value="查询"></td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</form>--}}
{{--</div>--}}
{{--<!--结果页快捷搜索框 结束-->--}}

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>学生列表</h3>
        </div>
        <!--快捷学生 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/student/create')}}"><i class="fa fa-plus"></i>添加学生</a>
                <a href="{{url('admin/student')}}"><i class="fa fa-recycle"></i>全部学生</a>
            </div>
        </div>
        <!--快捷学生 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>学生名称</th>
                    <th>学生学号</th>
                    <th>登录密码</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$v->stu_id}})" value="{{$v->stu_order}}">
                    </td>
                    <td class="tc">{{$v->stu_id}}</td>
                    <td>
                        <a href="#">{{$v->stu_name}}</a>
                    </td>
                    <td>{{$v->stu_code}}</td>
                    <td>{{$v->stu_password}}</td>
                    <td>
                        <a href="{{url('admin/student/'.$v->stu_id.'/edit')}}">修改</a>
                        <a href="javascript:;" onclick="delLinks({{$v->stu_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<script>
    function changeOrder(obj,stu_id){
        var stu_order = $(obj).val();
        $.post("{{url('admin/student/changeorder')}}",{'_token':'{{csrf_token()}}','stu_id':stu_id,'stu_order':stu_order},function(data){
            if(data.status == 0){
                layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        });
    }

    //删除学生
    function delLinks(stu_id) {
        layer.confirm('您确定要删除这个学生吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/student/')}}/"+stu_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }



</script>

@endsection
