@extends('layouts.admin')
@section('content')
        <!--面包屑课程 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 课程管理
</div>
<!--面包屑课程 结束-->

<!--结果集标题与课程组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改课程</h3>
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
            <a href="{{url('admin/course/create')}}"><i class="fa fa-plus"></i>添加课程</a>
            <a href="{{url('admin/course')}}"><i class="fa fa-recycle"></i>全部课程</a>
        </div>
    </div>
</div>
<!--结果集标题与课程组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/course/' . $field->cour_id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>课程名称：</th>
                <td>
                    <input type="text" name="cour_name" value="{{$field->cour_name}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>课程名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 任课教师：</th>
                <td>
                    <input type="text" class="lg" name="cour_teacher" value="{{$field->cour_teacher}}">
                </td>
            </tr>

            <div class="form-group">
                {{--<label for="exampleInputFile">选择文件</label>--}}
                <label for="exampleInputPassword1">选择图片</label>
                {{--<input type="file" id="exampleInputFile">--}}
                <input type="text" size="50" name="cour_image" value="{{$field->cour_image}}">
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
                            uploader:"{{url('admin/uploadimg')}}",  //修改1：上传处理

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
                            'uploadScript'     : "{{url('admin/uploadimg')}}",  //修改3：上传处理
                            'onUploadComplete' : function(file, data) {
                                $('input[name=cour_image]').val(data);  //修改2：表单显示文件路径
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
            <tr>
                <th>课程图片：</th>
                <td><img src="{{url($field->cour_image)}}" alt="{{$field->cour_name}}-课程图片" height="25">
                </td>
            </tr>
            <tr>
                <th>课程简介：</th>
                <td>
                    <input type="text" class="lg" name="cour_title" value="{{$field->cour_title}}">
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
