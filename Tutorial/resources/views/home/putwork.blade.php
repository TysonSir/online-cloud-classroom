@extends('layouts.home')
@section('title')
	作业提交-云课堂
@endsection
@section('content')

	<!-- Top Navigation -->
<div class="banner banner6">
	<div class="container">
	<h2>作业提交</h2>
	</div>
</div>
<!--header-->	
<!--start-content-->
<div class="typrography">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<script type="text/javascript">
					$(function() {

						var menu_ul = $('.menu_drop > li > ul'),
								menu_a  = $('.menu_drop > li > a');

						menu_ul.hide();

						menu_a.click(function(e) {
							e.preventDefault();
							if(!$(this).hasClass('active')) {
								menu_a.removeClass('active');
								menu_ul.filter(':visible').slideUp('normal');
								$(this).addClass('active').next().stop(true,true).slideDown('normal');
							} else {
								$(this).removeClass('active');
								$(this).next().stop(true,true).slideUp('normal');
							}
						});

					});
				</script>
                
                
				<style>
					.floatright{
						float: right;
					}

				</style>
				<div class="tabs">  
					<ul class="menu_drop">

						@foreach($courses as $d)
						<li class="item1"><a href="#"><img src="{{url('resources/views/home/images/arrow.png')}}" alt="">{{$d->cour_name}}</a>
							<ul class="list-group">
								@foreach($tasks as $dd)
									@if($dd->cour_id == $d->cour_id)
									<li class="list-group-item">
										<span class="floatright"><input type="radio" name="field_name" value="'value" ></span>
										<span><span style="color:#000;">{{$dd->task_id}}</span></span>:
										<span id="subjname"><span style="color:#000;">{{$dd->task_name}}</span></span>
									</li>
									@endif
								@endforeach
							</ul>
						</li>
						@endforeach


					</ul>
				</div>

			</div>
			<div class="col-md-6">
				<form role="form" action="{{url('/putworkpost')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="exampleInputEmail1">提交作业科目</label>
						<input type="text" name="cour_name" class="form-control" id="subject" placeholder="请输入科目名称">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">作业名</label>
						<input type="text" name="task_name" class="form-control" id="homework" placeholder="请输入作业名称">
					</div>
					@if(session('stu_id'))
					<div class="form-group">
						{{--<label for="exampleInputFile">选择文件</label>--}}
						<label for="exampleInputPassword1">选择文件</label>
						{{--<input type="file" id="exampleInputFile">--}}
						<input type="text" size="50" name="hw_file">
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
									uploader:"{{url('/upload')}}",  //修改1：上传处理

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
									'uploadScript'     : "{{url('/upload')}}",  //修改3：上传处理
									'onUploadComplete' : function(file, data) {
										$('input[name=hw_file]').val(data);  //修改2：表单显示文件路径
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
						<p class="help-block">请上传rar或zip格式,以最后一次提交为准</p>
					</div>
					<input type="hidden" name="task_id" class="form-control" id="task_id">

						<button type="submit" class="btn btn-default">上传作业</button>
					@else
						<button type="button" class="btn btn-default">请登录后上传</button>
					@endif
				</form>
			</div>
		</div>

	</div>	 
</div>
	<script>
		@if(!empty(session('success')))
            alert({{session('success')}});
		@endif
	</script>

<script type="text/javascript">
					$(function() {

						var menu_span = $('.menu_drop > li > ul > li > span'),
						menu_subject_name  = $('.menu_drop > li > ul > li'),
						menu_subject_nameclick  = $('.menu_drop > li > a'),
						menu_subject  = $('#subject'),
						menu_homework  = $('#homework');
						menu_task_id  = $('#task_id');
						
						menu_subject_nameclick.click(function(e) {
							var subjname = $(this).text();	
							menu_subject.attr("value",subjname);
							menu_homework.attr("value",'');
						});
						
						menu_span.click(function(e) {
							var hwname = $(this).next().next().text();
							var task_id = $(this).next().text();
							//alert(hwname);
							menu_homework.attr("value",hwname);
							menu_task_id.attr("value",task_id);
						});

					});
				</script>
@endsection
