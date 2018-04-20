@extends('layouts.admin')
		@section('content')

			<!--头部 开始-->
			<div class="top_box">
				<div class="top_left">
					<div class="logo">云课堂后台管理</div>
					<ul>
						<li><a href="#" class="active">首页</a></li>
						<li><a href="#">管理页</a></li>
					</ul>
				</div>
				<div class="top_right">
					<ul>
						<li>管理员：{{session('tea_name')}}</li>
						<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
						<li><a href="{{url('admin/logout')}}">退出</a></li>
					</ul>
				</div>
			</div>
			<!--头部 结束-->

			<!--左侧导航 开始-->
			<div class="menu_box">
				<ul>
					<li>
						<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
						<ul class="sub_menu">
							<li><a href="{{url('admin/course/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加课程</a></li>
							<li><a href="{{url('admin/course')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>课程列表</a></li>
							<li><a href="{{url('admin/task/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加任务</a></li>
							<li><a href="{{url('admin/task')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>任务列表</a></li>

							<li><a href="{{url('admin/evaluate/0')}}" target="main"><i class="fa fa-fw fa-edit"></i>批改作业</a></li>
							<li><a href="{{url('admin/scorelist/0')}}" target="main"><i class="fa fa-fw fa-edit"></i>作业记录</a></li>
						</ul>
					</li>
					<li>
						<h3><i class="fa fa-fw fa-folder"></i>共享资源</h3>
						<ul class="sub_menu">
							<li><a href="{{url('admin/courfile/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文件</a></li>
							<li><a href="{{url('admin/courfile')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文件列表</a></li>
							<li><a href="{{url('admin/courvideo/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加视频</a></li>
							<li><a href="{{url('admin/courvideo')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>视频列表</a></li>
						</ul>
					</li>
					<li>
						<h3><i class="fa fa-fw fa-graduation-cap"></i>人员管理</h3>
						<ul class="sub_menu">
							@if(session('tea_id') == 1)
							<li><a href="{{url('admin/teacher/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加教师</a></li>
							<li><a href="{{url('admin/teacher')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>教师列表</a></li>
							@endif

							<li><a href="{{url('admin/student/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加学生</a></li>
							<li><a href="{{url('admin/student')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>学生列表</a></li>
						</ul>
					</li>
					{{--<li>--}}
						{{--<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>--}}
						{{--<ul class="sub_menu">--}}
							{{--<li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>--}}
							{{--<li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>--}}
						{{--</ul>--}}
					{{--</li>--}}
					{{--<li>--}}
						{{--<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>--}}
						{{--<ul class="sub_menu">--}}
							{{--<li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>--}}
							{{--<li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>--}}
							{{--<li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>--}}
							{{--<li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>--}}
						{{--</ul>--}}
					{{--</li>--}}
				</ul>
			</div>
			<!--左侧导航 结束-->

			<!--主体部分 开始-->
			<div class="main_box">
				<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
			</div>
			<!--主体部分 结束-->

			<!--底部 开始-->
			<div class="bottom_box">
				CopyRight © 2016. Powered By <a href="http://bhuyun.club">http://bhuyun.club</a>.
			</div>
			<!--底部 结束-->

		@endsection


