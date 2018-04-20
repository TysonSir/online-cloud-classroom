@extends('layouts.admin')
@section('content')
        <!--面包屑作业 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 作业管理
</div>
<!--面包屑作业 结束-->

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
            <h3>作业列表</h3>
            <select name="" id="seltask">
                <option value="0">所有作业...</option>
                @foreach($mytasks as $k=>$v)
                    <option value="{{$v->task_id}}">{{$v->cour_name}}-{{$v->task_name}}</option>
                @endforeach
            </select>
            <script>
                $(document).ready(function () {
                    $("#seltask").bind("change",function(){
                        location.href = "{{url('/admin/evaluate')}}/"+$(this).val();
                    });

                    var arr = this.location.href.split('/');
                    var taskid = arr[arr.length-1];
                    $("#seltask").val(taskid);
                    //alert();
                });
            </script>
        </div>
        <!--快捷作业 开始-->
        <div class="result_content">
            <div class="short_wrap">
                {{--<a href="{{url('admin/homework/create')}}"><i class="fa fa-plus"></i>添加作业</a>--}}
                {{--<a href="{{url('admin/homework')}}"><i class="fa fa-recycle"></i>全部作业</a>--}}
            </div>
        </div>
        <!--快捷作业 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>作业名称</th>
                    <th>所属课程</th>
                    <th>学生学号</th>
                    <th>学生姓名</th>
                    <th>上交时间</th>
                    <th>上交文件</th>
                    <th>分数</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,{{$v->hw_id}})" value="{{$v->hw_order}}">
                    </td>
                    <td class="tc">{{$v->hw_id}}</td>
                    <td>
                        <a href="#">{{$v->hw_name}}</a>
                    </td>
                    <td>{{$v->cour_name}}</td>
                    <td>{{$v->stu_code}}</td>
                    <td>{{$v->stu_name}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->hw_addtime)}}</td>
                    <td>{{$v->hw_file}}</td>
                    <td>@if($v->hw_score >0){{$v->hw_score}}@endif</td>
                    <td>
                        <a href="{{url('admin/homework/'.$v->hw_id.'/edit')}}">评分</a>
                        {{--<a href="javascript:;" onclick="delLinks({{$v->hw_id}})">删除</a>--}}
                        <a href="{{url($v->hw_file)}}"> 下载文件</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<script>
    function changeOrder(obj,hw_id){
        var hw_order = $(obj).val();
        $.post("{{url('admin/homework/changeorder')}}",{'_token':'{{csrf_token()}}','hw_id':hw_id,'hw_order':hw_order},function(data){
            if(data.status == 0){
                layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        });
    }

    //删除作业
    function delLinks(hw_id) {
        layer.confirm('您确定要删除这个作业吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/homework/')}}/"+hw_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
