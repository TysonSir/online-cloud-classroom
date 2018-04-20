@extends('layouts.home')

@section('title')
	查成绩-云课堂
@endsection

@section('content')
<!-- Top Navigation -->
<div class="banner banner5">
	<div class="container">
	<h2>作业反馈</h2>
	</div>
</div>
<!--header-->	
<!--start-content-->

<style>
	.bgcolor{
		background: lightblue;
	}
	.margintop{
		margin-top: 30px;
	}
	.margintop2{
		margin-top: -50px;
	}

	.boxhis{ border-radius:5px;border:3px solid #ccc;padding:10px;}
	.chathis{min-height:200px;overflow-y:auto;max-height:300px;}

</style>
<div class="typrography margintop2">
	<div class="container">

		<div class="row boxhis">
			<div class="col-md-1"></div>

			<div class="col-md-10 chathis">
         <h3 ><span style="color:#000;">{{$homework->cour_name}}</span></h3>
           <h4><span style="color:#000;">{{$homework->hw_name}}</span> @if($homework->hw_score>0) <span style="color:red;">（得分： {{$homework->hw_score}}）</span> @endif</h4>
				<h4><span style="color:#000;">作业点评: </span> </h4>
				<span style="color:red;">{{$homework->hw_comment}}</span>
				
			</div>
			<div class="col-md-1"></div>

		</div>

		<div class="row margintop">
			<div class="col-md-1"></div>
			<div class="col-md-10">

					{{--<div class="input-group">--}}
						{{--<input type="text" class="form-control mycontent"  placeholder="给老师发消息">--}}
						{{--<span class="input-group-btn">--}}
							{{--<button class="btn btn-primary mybutton" type="button"> 发 送 </button>--}}
					  	{{--</span>--}}
					{{--</div><!-- /input-group -->--}}


			</div>
			<div class="col-md-1"></div>

		</div>

		<script type="text/javascript">
			$(function() {

				var input_content = $('.mycontent'),
				chathis = $('.chathis'),
				mybutton = $('.mybutton');

				mybutton.click(function(e) {

					var con = input_content.val();

					var newtalk = "<div class='media bgcolor'> <a class='media-left' href='#'> <img src='images/abt1.jpg' alt='...' width='50' height='50'> </a> <div class='media-body'> <h4 class='media-heading'>讨论区消息</h4>"+
					con + " </div> </div>";

					var oldtalk = chathis.html();
					chathis.html(newtalk + oldtalk);

				});



			});
		</script>

	</div>	 
</div>
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
