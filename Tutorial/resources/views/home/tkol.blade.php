@extends('layouts.home')
@section('title')
	在线讨论（{{$lsname->cour_name}}）-云课堂
@endsection
@section('content')
<!-- Top Navigation -->
<div class="banner banner5">
	<div class="container">
	<h2>在线讨论（{{$lsname->cour_name}}）</h2>
	</div>
</div>
<!--header-->	
<!--start-content-->

<style>
	.bgcolor{
		background: white;
	}
	.margintop{
		margin-top: 30px;
	}
	.margintop2{
		margin-top: -60px;
	}

	.boxhis{ border-radius:5px; border:5px solid   #828282  ; padding:10px;}
	.chathis{min-height:400px;overflow-y:auto;max-height:400px;}

</style>
<div class="typrography margintop2">
	<div class="container">

		<div class="row boxhis">
			<div class="col-md-1"></div>

			<div class="col-md-10 chathis">


				@foreach($talks as $d)
				<div class="media bgcolor">
					<a class="media-left" href="#">
						<img src="{{asset('resources/views/home/images/abt1.jpg')}}" alt="..." width="50" height="50">
					</a>
					<div class="media-body">
						<h4 class="media-heading">{{date('Y-m-d H:i:s',$d->talk_addtime)}}</h4>
						{{$d->talk_content}}
					</div>
				</div>
				@endforeach


			</div>
			<div class="col-md-1"></div>

		</div>

		<div class="row margintop">
			<div class="col-md-1"></div>
			<div class="col-md-10">


					<div class="input-group">
						{{csrf_field()}}
						<input type="text" name="talk_content" class="form-control mycontent"  placeholder="请输入讨论内容">
						<span class="input-group-btn">
							<button class="btn btn-primary mybutton" type="button"> 发 送 </button>
					  	</span>
					</div><!-- /input-group -->


				{{--<form action="{{url('/tkolpost')}}" method="post">--}}
					{{--<div class="input-group">--}}
						{{--{{csrf_field()}}--}}
						{{--<input type="text" name="talk_content" class="form-control mycontent"  placeholder="请输入讨论内容">--}}
						{{--<span class="input-group-btn">--}}
							{{--<button class="btn btn-primary mybutton" type="submit"> 发 送 </button>--}}
					  	{{--</span>--}}
					{{--</div><!-- /input-group -->--}}
				{{--</form>--}}

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
					$.post("{{url('/tkolpost')}}",
							{
								_token:"{{csrf_token()}}",
								talk_content:con,
								cour_id:"{{$courid}}"
							},
							function(){
								//alert("\nStatus: " + state);
								var con = input_content.val();

								var newtalk = "<div class='media bgcolor'> <a class='media-left' href='#'> <img src='{{asset('resources/views/home/images/abt1.jpg')}}' alt='...' width='50' height='50'> </a> <div class='media-body'> <h4 class='media-heading'>讨论区消息</h4>"+
										con + " </div> </div>";

								var oldtalk = chathis.html();
								chathis.html(newtalk + oldtalk);
							});





				});



			});
		</script>

	</div>	 
</div>

@endsection