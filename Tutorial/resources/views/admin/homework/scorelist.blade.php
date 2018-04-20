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
            <span>成绩单 - </span>
            <select name="" id="selcour">
                <option value="0">所有课程...</option>
                @foreach($mycour_names as $k=>$v)
                    <option value="{{$v->cour_id}}">{{$v->cour_name}}</option>
                @endforeach
            </select>
            <script>
                $(document).ready(function () {
                    $("#selcour").bind("change",function(){
                            location.href = "{{url('/admin/scorelist')}}/"+$(this).val();
                    });

                    var arr = this.location.href.split('/');
                    var courid = arr[arr.length-1];
                    $("#selcour").val(courid);
                    //alert();
                });
            </script>
        </div>
        <!--快捷作业 开始-->
        <div class="result_content">
            <div class="short_wrap">
                {{--<a href="{{url('admin/homework/create')}}"><i class="fa fa-plus"></i></a>--}}
                {{--<a href="{{url('admin/homework')}}"><i class="fa fa-recycle"></i>全部作业</a>--}}
            </div>
        </div>
        <!--快捷作业 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">ID</th>
                    <th>学生学号</th>
                    <th>学生姓名</th>
                    @foreach($alltask as $v)
                        <th> ( {{$v->cour_name}} )<br />
                            <span style="font-family:黑体;color:blue;">{{$v->hw_name}}</span></th>

                    @endforeach
                </tr>

                @foreach($data as $v)
                <tr>

                    <td class="tc">{{$v->stu_id}}</td>

                    <td>
                        <a href="#">{{$v->stu_code}}</a>
                    </td>
                    <td>
                        <a href="#">{{$v->stu_name}}</a>
                    </td>
                    @foreach($alltask as $vv)
                        <?php $t = $vv->hw_name; ?>
                        <td>
                            @if($v->$t === NULL)
                                <span style="font-family:黑体;color:green;">学生未交</span>
                            @elseif($v->$t === 0)
                                <span style="font-family:黑体;color:red;">未批改</span>
                            @else
                                {{$v->$t}}
                            @endif
                        </td>
                    @endforeach

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
