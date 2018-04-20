@extends('layouts.admin')
@section('content')
        <!--面包屑课程 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 课程管理
</div>
<!--面包屑课程 结束-->

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
            <h3>课程列表</h3>
        </div>
        <!--快捷课程 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/course/create')}}"><i class="fa fa-plus"></i>添加课程</a>
                <a href="{{url('admin/course')}}"><i class="fa fa-recycle"></i>全部课程</a>
            </div>
        </div>
        <!--快捷课程 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>课程名称</th>
                    <th>任课教师</th>
                    <th>课程图片</th>
                    <th>课程简介</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$v->cour_id}})" value="{{$v->cour_order}}">
                    </td>
                    <td class="tc">{{$v->cour_id}}</td>
                    <td>
                        <a href="#">{{$v->cour_name}}</a>
                    </td>
                    <td>{{$v->cour_teacher}}</td>
                    <td><img src="{{url($v->cour_image)}}" alt="{{$v->cour_name}}-课程图片" height="25"></td>
                    <td>{{$v->cour_title}}</td>
                    <td>
                        <a href="{{url('admin/course/'.$v->cour_id.'/edit')}}">修改</a>
                        <a href="javascript:;" onclick="delLinks({{$v->cour_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<script>
    function changeOrder(obj,cour_id){
        var cour_order = $(obj).val();
        $.post("{{url('admin/course/changeorder')}}",{'_token':'{{csrf_token()}}','cour_id':cour_id,'cour_order':cour_order},function(data){
            if(data.status == 0){
                layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        });
    }

    //删除课程
    function delLinks(cour_id) {
        layer.confirm('您确定要删除这个课程吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/course/')}}/"+cour_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
