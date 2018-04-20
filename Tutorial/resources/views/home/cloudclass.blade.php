@extends('layouts.home')

@section('title')
	云课堂-云课堂
@endsection

@section('content')
<!-- Top Navigation -->
<div class="banner2">
	<div class="container">
		<script src="js/responsiveslides.min.js"></script>
		<script>
			$(function () {
				$("#slider").responsiveSlides({
					auto: true,
					nav: true,
					speed: 500,
					namespace: "callbacks",
					pager: true,
				});
			});
		</script>
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<h3>海纳众创空间启动</h3>
						<p>周景雷向出席启动仪式的领导、专家、学者和社会各界人士表示热烈欢迎，他指出，海纳众创空间的成立是顺应大众创新、万众创业趋势的新型创业服务平台，是学校创新创业课程的有效延伸，是发展“专业教育+创业教育”的全新培养模式。
						</p>
						<div class="readmore">
							<a href="http://www.bhu.edu.cn/page/list.asp?boardid=bd_news">更多<i class="glyphicon glyphicon-menu-right"> </i></a>
						</div>
					</li>
					<li>
						<h3>杨延东校长与2016级学生代表面对面交流</h3>
						<p>　2016级学生入学已有一个多月，为了更好地了解同学们的学习生活情况，及时解决他们入学后遇到的各方面问题，本学期第一次“校长面对面”活动于10月27日下午在行政楼第一会议室举行。
						</p>
						<div class="readmore">
							<a href="http://www.bhu.edu.cn/page/list.asp?boardid=bd_news">更多<i class="glyphicon glyphicon-menu-right"> </i></a>
						</div>
					</li>
					<li>
						<h3>学校召开博士点筹建学科推进调研会</h3>
						<p>11月1日至3日，张守波副校长带领学科与专业建设处人员分别到8个博士点筹建单位进行深度调研，各博士点筹建学科所在学院院长、副院长、一级学科负责人、学科方向负责人等参加了推进调研会。
						</p>
						<div class="readmore">
							<a href="http://www.bhu.edu.cn/page/list.asp?boardid=bd_news">更多<i class="glyphicon glyphicon-menu-right"> </i></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--header-->
<!-- Top Navigation -->
<div class="banner1 banner5">
	<div class="container">
		<h2>云课堂</h2>
	</div>
</div>
<!--header-->
<!-- contact -->


{{--<div class="tishi">--}}
	{{--<p>课程所在学院：</p>--}}
{{--</div>--}}
{{--<!--下拉选择菜单-->--}}
{{--<div class="selbtn1">--}}
	{{--<div class="dropdown">--}}
		{{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">--}}
			{{--计算机科学与技术学院--}}
			{{--<span class="caret"></span>--}}
		{{--</button>--}}
		{{--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">软件学院</a></li>--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">化学食品与安全学院</a></li>--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">马克思主义学院</a></li>--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">工学院</a></li>--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">新能源</a></li>--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">管理学院</a></li>--}}
			{{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">艺术与传媒学院</a></li>--}}

		{{--</ul>--}}
	{{--</div>--}}
{{--</div>--}}
{{--<!--下拉选择菜单end-->--}}

<!--输入框-->
<div class="selbtn2">
	<div class="row">
		<form action="{{url('cloudclass')}}" method="post">
			<div class="input-group">

				<input  type="text" name="search" class="form-control"  value="请输入课程名称" onfocus="javascript:if(this.value=='请输入课程名称')this.value='' ">
				{{csrf_field()}}
				<span class="input-group-btn">
					<input class="btn btn-default" type="submit" value="查询课程">
					<a id="anchor_scroll" href="#pos" >点击这里本页跳转</a>
				</span>

			</div><!-- /input-group style="display:none"-->
		</form>
	</div><!-- /.row -->
</div>

<!--输入框end-->

<div class="effect-grid">
	<div class="container" id="pos">
		<ul class="grid cs-style-5">
			@foreach($courses as $v)
			<li>
				<br /><a href="{{url('courvideo/'.$v->cour_id)}}" class="alert alert-success">进入课程</a>
				<figure>

					<img src="{{url($v->cour_image)}}" width="400" height="300" alt="{{$v->cour_name}}">
					<figcaption>
						<h3>{{$v->cour_name}}</h3>
						<span>{{$v->cour_teacher}}</span>
						<a href="{{url('courvideo/'.$v->cour_id)}}">进入课程</a>
					</figcaption>
				</figure>
			</li>
			@endforeach

		</ul>
	</div>
</div>
<!-- //contact -->
<!--更多按钮-->
<div class=buttonxsqb>
	<a href="http://www.bhu.edu.cn/">
		<button class="btn btn-large btn-primary" type="button">显示全部</button>
	</a>
</div>
	{!!$scriptcode!!}
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 var defaults = {
			 containerID: 'toTop', // fading element id
			 containerHoverID: 'toTopHover', // fading element hover id
			 scrollSpeed: 1200,
			 easingType: 'linear'
			 };
			 */
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
@endsection
