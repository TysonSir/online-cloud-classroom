@extends('layouts.admin')
@section('content')
        <!--面包屑教师 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 教师管理
</div>
<!--面包屑教师 结束-->

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
            <h3>教师列表</h3>
        </div>
        <!--快捷教师 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/teacher/create')}}"><i class="fa fa-plus"></i>添加教师</a>
                <a href="{{url('admin/teacher')}}"><i class="fa fa-recycle"></i>全部教师</a>
            </div>
        </div>
        <!--快捷教师 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>教师名称</th>
                    <th>邮箱</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$v->tea_id}})" value="{{$v->tea_order}}">
                    </td>
                    <td class="tc">{{$v->tea_id}}</td>
                    <td>
                        <a href="#">{{$v->tea_name}}</a>
                    </td>
                    <td>{{$v->tea_email}}</td>
                    <td>
                        <a href="{{url('admin/teacher/'.$v->tea_id.'/edit')}}">修改</a>
                        <a href="javascript:;" onclick="delLinks({{$v->tea_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<script>
    function changeOrder(obj,tea_id){
        var tea_order = $(obj).val();
        $.post("{{url('admin/teacher/changeorder')}}",{'_token':'{{csrf_token()}}','tea_id':tea_id,'tea_order':tea_order},function(data){
            if(data.status == 0){
                layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        });
    }

    //删除教师
    function delLinks(tea_id) {
        layer.confirm('您确定要删除这个教师吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/teacher/')}}/"+tea_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
