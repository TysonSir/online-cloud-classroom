@extends('layouts.home')

@section('title')
	首页-云课堂
@endsection

@section('content')


<!-- Top Navigation -->
<div class="banner">
	<div class="container">
	<script src="{{asset('resources/views/home/js/responsiveslides.min.js')}}"></script>
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
				 <a href="about.html">更多<i class="glyphicon glyphicon-menu-right"> </i></a>
				 </div>
				 </li>
			  </ul>
		  </div>
	  </div>
</div>			
	</div>
<!--header-->
<!--weelcome-->
<div class="welcome">
	<div class="container">
		<!--<h2>Welcome To BHU Cloud Education Tutorial</h2>-->
		<h2>欢迎来到渤海大学云课堂</h2>
		<p>Welcome to BHU CloudEducation
		</p>
	</div>
</div>
<!--/welcome-->
<div class="welcome-grids">
	<div class="container">
		<div class="welcome-gridsinfo">
		<div class="col-md-3 welcome-grid">
			<i class="glyphicon glyphicon-pencil"> </i>
			<a href="{{url('lesson')}}"><h3>课堂交流</h3></a>
			<p>communication</p>
		</div>
		<div class="col-md-3 welcome-grid">
			<i class="glyphicon glyphicon-blackboard"> </i>
			<a href="{{url('putwork')}}"><h3>作业提交</h3></a>
			<p>uploading homework</p>
		</div>
		<div class="col-md-3 welcome-grid">
			<i class="glyphicon glyphicon-font"> </i>
			<a href="{{url('cloudclass')}}"><h3>云课堂</h3></a>
			<p>yun lesson</p>
		</div>
		<div class="col-md-3 welcome-grid">
			<i class="glyphicon glyphicon-education"> </i>
			<a href="{{url('lessonlist')}}"><h3>信息查询</h3></a>
			<p>query information</p>
		</div>
		<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--effect-grid-->
<div class="copyrights">Collect from <a href="http://www.baidu.com/" >...</a></div>
<div class="effect-grid">
	<div class="container">
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
<!--\effect-grid-->
<!--testmonials-->
<div class="testimonials">
	<div class="container">
			<div class="testimonial-nfo">
				<h3>荣誉榜</h3>
				<h5>实时更新学校各类获奖信息<span></span></h5>
			</div>
			<div class="testimonial-grids">
				<div class="testimonial-grid">
					<p><span></span> <span></span></p>
				</div>
			</div>
	</div>
</div>
<!--\testmonials-->
<!--specfication-->
<div class="news">
		<div class="container">
			<div class="news-text">
				<h3>课后讨论区</h3>
				<p>抛出你的问题，大家帮你解决<br /><span></span></p>
			</div>
			<div class="news-grids">
				<div class="col-md-3 news-grid">
					<a href="#"><h4>信息科学与技术学院</h4></a>
					<span>2016.11.4</span>
					<a href="#" class="mask"><img src="{{url('resources/views/home/images/img1.jpg')}}" alt="image" class="img-responsive zoom-img"></a>
					<div class="news-info">
						{{--<p>Pellentesque ut urna eu mauris scele risque auctor volutpat et massa pers piciis iste natus scele risque auctor volutpat et massa.</p>--}}
					</div>
				</div>
				<div class="col-md-3 news-grid">
					<a href="#"><h4>管理学院</h4></a>
					<span>2016.11.4</span>
					<a href="#" class="mask"><img src="{{url('resources/views/home/images/img2.jpg')}}" alt="image" class="img-responsive zoom-img"></a>
					<div class="news-info">
						{{--<p>Pellentesque ut urna eu mauris scele risque auctor volutpat et massa pers piciis iste natus scele risque auctor volutpat et massa.</p>--}}
					</div>
				</div>
				<div class="col-md-3 news-grid">
					<a href="#"><h4>文学院</h4></a>
					<span>2016.11.4</span>
					<a href="#" class="mask"><img src="{{url('resources/views/home/images/img3.jpg')}}" alt="image" class="img-responsive zoom-img"></a>
					<div class="news-info">
						{{--<p>Pellentesque ut urna eu mauris scele risque auctor volutpat et massa pers piciis iste natus scele risque auctor volutpat et massa.</p>--}}
					</div>
				</div>
				<div class="col-md-3 news-grid">
					<a href="#"><h4>艺术与传媒学院</h4></a>
					<span>2016.11.4</span>
					<a href="#" class="mask"><img src="{{url('resources/views/home/images/img4.jpg')}}" alt="image" class="img-responsive zoom-img"></a>
					<div class="news-info">
						{{--<p>Pellentesque ut urna eu mauris scele risque auctor volutpat et massa pers piciis iste natus scele risque auctor volutpat et massa.</p>--}}
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!--/specfication-->
@endsection
