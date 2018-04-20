@extends('layouts.admin')
@section('content')
        <!--面包屑任务 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 任务管理
</div>
<!--面包屑任务 结束-->

<!--结果集标题与任务组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加任务</h3>
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
            <a href="{{url('admin/task/create')}}"><i class="fa fa-plus"></i>添加任务</a>
            <a href="{{url('admin/task')}}"><i class="fa fa-recycle"></i>全部任务</a>
        </div>
    </div>
</div>
<!--结果集标题与任务组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/task')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>所属课程：</th>
                <td>
                    <select name="cour_id">
                        <option value="">==请选择==</option>
                        @foreach($courses as $v)
                            <option value="{{$v->cour_id}}">{{$v->cour_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <th><i class="require">*</i>任务名称：</th>
                <td>
                    <input type="text" name="task_name">
                    <span><i class="fa fa-exclamation-circle yellow"></i>任务名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 任务描述：</th>
                <td>
                    <textarea name="task_description"></textarea>
                    <p>描述可以写250个字</p>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 提交截至日期：</th>
                <td>
                    <input type="text" name="task_finaltime" value="2017-1-1 8:00:00">
                    <span><i class="fa fa-exclamation-circle yellow"></i>请选择年月日</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 相关文件：</th>
                <td>
                    <div class="form-group">
                        {{--<label for="exampleInputFile">选择文件</label>--}}
                        <label for="exampleInputPassword1">选择文件</label>
                        {{--<input type="file" id="exampleInputFile">--}}
                        <input type="text" size="50" name="task_file">
                        <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/Huploadify.css')}}"/>
                        <script type="text/javascript" src="{{asset('resources/org/uploadify/jquery.js')}}"></script>
                        <script type="text/javascript" src="{{asset('resources/org/uploadify/jquery.Huploadify.js')}}"></script>
                        <script type="text/javascript">
                            $(function(){
                                var up = $('#upload').Huploadify({
                                    auto:false,
                                    fileTypeExts:'*.*',
                                    multi:true,
                                    formData:{key:123456,key2:'vvvv','_token':"{{csrf_token()}}"},
                                    fileSizeLimit:99999999999,
                                    showUploadedPercent:true,
                                    showUploadedSize:true,
                                    removeTimeout:9999999,
                                    uploader:"{{url('admin/uploadtaskfile')}}",  //修改1：上传处理

                                    onUploadStart:function(file){
                                        console.log(file.name+'开始上传');
                                    },
                                    onInit:function(obj){
                                        console.log('初始化');
                                        console.log(obj);
                                    },
                                    onUploadComplete:function(file){
                                        console.log(file.name+'上传完成');
                                        alert(file+'上传完成');

                                    },
                                    'uploadScript'     : "{{url('admin/uploadtaskfile')}}",  //修改3：上传处理
                                    'onUploadComplete' : function(file, data) {
                                        $('input[name=task_file]').val(data);  //修改2：表单显示文件路径
                                        //$('#art_thumb_img').attr('src','/Tutorial/'+ data);
                                    },




                                    onCancel:function(file){
                                        console.log(file.name+'删除成功');
                                    },
                                    onClearQueue:function(queueItemCount){
                                        console.log('有'+queueItemCount+'个文件被删除了');
                                    },
                                    onDestroy:function(){
                                        console.log('destroyed!');
                                    },
                                    onSelect:function(file){
                                        console.log(file.name+'加入上传队列');
                                    },
                                    onQueueComplete:function(queueData){
                                        console.log('队列中的文件全部上传完成',queueData);
                                    }
                                });


                            });
                        </script>

                        <div id="upload"></div>

                    </div>
                </td>
            </tr>
            <tr>
                <th>任务状态：</th>
                <td>
                    <label for=""><input name="task_state" value="1" type="radio">任务发布状态</label>
                    <label for=""><input name="task_state" value="0" type="radio">任务暂不发布</label>
                </td>
            </tr>
            <tr>
                <th>排序：</th>
                <td>
                    <input type="text" class="sm" name="task_order" value="0">
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
