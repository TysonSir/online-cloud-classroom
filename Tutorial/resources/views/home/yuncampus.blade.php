@extends('layouts.home')

@section('title')
	云校园-云课堂
@endsection

@section('content')
<!-- js -->
    <script src="{{asset('resources/views/home/js/yuncampus.js')}}"></script>
<!-- 中间内容开始 -->
<div class="content" style="margin-left: -65px;">
	<div class="contentImg">
		<a href="{{url('/picture')}}">
			<div class="stuimg">
				<img src="{{url('resources/views/home/images/P1.jpg')}}" alt="">
				<div class="tip">
				同学1 滨海夜景
				</div>
			</div>
		</a>
		
		<a href="{{url('/picture')}}"><div class="stuimg">
			<img src="{{url('resources/views/home/images/P2.jpg')}}" alt="">
			<div class="tip">
				同学2 滨海夜景
			</div>
		</div></a>
		<a href="{{url('/picture')}}"><div class="stuimg right">
			<img src="{{url('resources/views/home/images/P3.jpg')}}" alt="">
			<div class="tip">
			  同学3 静止的时间
			</div>
		</div></a>
		<a href="{{url('/picture')}}"><div class="stuimg">
			<img src="{{url('resources/views/home/images/P4.jpg')}}" alt="">
			<div class="tip">
			  同学4 春.花开
			</div>
		</div></a>
		<a href="{{url('/picture')}}"><div class="stuimg">
			<img src="{{url('resources/views/home/images/P5.jpg')}}" alt="">
			<div class="tip">
			  同学5 蓝天
			</div>
		</div></a>
		<a href="{{url('/picture')}}"><div class="stuimg right">
			<img src="{{url('resources/views/home/images/P6.jpg')}}" alt="">
			<div class="tip">
			同学6 春柳
			</div>
		</div></a>

	</div>
	<div class="btn1">
		<input type="button" value="上传作品" class="btn btn-info">
	</div>
	<div class="contentVid">
		<!-- 第一个电影区开始 -->
		<div class="movie">
			<div class="img">
				<a href="http://www.80s.tw/search">
					<img src="{{url('resources/views/home/images/movie1.jpg')}}" alt="">
				</a>
			</div>
			<div class="intro">
				<div class="intro1">
					<h2>阿甘正传</h2>
					<div class="direct">
						导演:
						<span>罗伯特·泽米吉斯</span>
					</div>
					<div class="pingfen">
						评分:
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="juqing">
						<h3>剧情简介......</h3>
						<p>
							阿甘是个智商只有75的低能儿。在学校里为了躲避别的孩子的欺侮，听从一个朋友珍妮的话而开始“跑”。他跑着躲避别人的捉弄。在中学时，他为了躲避别人而跑进了一所学校的橄榄球场，就这样跑进了大学。阿甘被破格录取，并成了橄榄球巨星，受到了肯尼迪总统的接见...

					</div>
				</div>
				<!-- 评论 眼睛 收藏图片开始 -->
				<div class="intro2">
					<p>
						<img src="{{url('resources/views/home/images/kan.png')}}" alt="">
						<span>854</span>
						<img src="{{url('resources/views/home/images/shoucang.png')}}" alt="">
						<span>880</span>
						<img src="{{url('resources/views/home/images/liuyan.png')}}" alt="" id="liuyan">
						<span id="PLcount"></span>
						<span>2017/5/22</span>
					</p>
				</div>
				<!-- 评论 眼睛 收藏图片结束-->
			</div>

		</div>
		<!-- 第一个电影区结束 -->
		<!-- 评论区开始 默认是隐藏-->
		<div class="pinglun" style="display:none" id="pinglun1">
			<textarea id="PLcontent" cols="100" rows="20" class="PLcontent" readonly ></textarea>
			<input type="text" placeholder="请输入评论的内容" id="t1" class="t">
			<input type="button"  value="评论" id="PLbtn" class="PLbtn btn btn-success">
		</div>
		<!-- 评论区结束 默认是隐藏的 -->
		<!-- 第二个电影区开始 -->
		<div class="movie">
			<div class="img" id="img">
				<a href="http://www.80s.tw/search">
					<img src="{{url('resources/views/home/images/movie2.jpg')}}" alt="">
				</a>
			</div>
			<div class="intro">
				<div class="intro1">
					<h2>肖申克的救赎</h2>
					<div class="direct">
						导演:
						<span>弗兰克·达拉邦特</span>
					</div>
					<div class="pingfen">
						评分:
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="juqing">
						<h3>剧情简介......</h3>
						<p>
							故事发生在1947年，银行家安迪（Andy）被指控枪杀了妻子及其情人，安迪被判无期徒刑，这意味着他将在肖恩克监狱中渡过余生。瑞德（Red）1927年因谋杀罪被判无期徒刑，数次假释都未获成功。他成为了肖恩克监狱中的“权威人物”，只要你付得起钱，他几乎有办法搞到任何你想要的东西：香烟、糖果、酒，甚至是大麻。每当有新囚犯来的时候，大家就赌谁会在第一个夜晚哭泣。瑞德认为弱不禁风、书生气时足的安迪一定会哭，结果安迪的沉默使他输掉了两包烟。但同时也使瑞德对他另眼相看...
						</p>

					</div>
				</div>
				<!-- 评论 眼睛 收藏图片开始 -->
				<div class="intro2">
					<p>
						<img src="{{url('resources/views/home/images/kan.png')}}" alt="">
						<span>854</span>
						<img src="{{url('resources/views/home/images/shoucang.png')}}" alt="">
						<span>880</span>
						<img src="{{url('resources/views/home/images/liuyan.png')}}" alt="" id="liuyan2">
						<span id="PLcount2"></span>
						<span>2017/5/22</span>
					</p>
				</div>
				<!-- 评论 眼睛 收藏图片结束-->
			</div>

		</div>
		<!-- 第二个电影区结束 -->
		<!-- 评论区开始 默认是隐藏-->
		<div class="pinglun last" style="display:block" id="pinglun2">
			<textarea id="PLcontent2" cols="100" rows="20" class="PLcontent" readonly></textarea>
			<input type="text" placeholder="请输入评论的内容" id="t2" class="t">
			<input type="button"  value="评论" id="PLbtn2" class="PLbtn btn btn-success">
		</div>
		<!-- 评论区结束 默认是隐藏的 -->
		
	</div>
	
	
</div>

@endsection
