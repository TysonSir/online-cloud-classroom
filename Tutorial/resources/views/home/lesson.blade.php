@extends('layouts.home')

@section('title')
	课程-云课堂
@endsection

@section('content')


<!-- Top Navigation -->
<div class="banner banner6">
	<div class="container">
	<h2>课程</h2>
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

						var menu_ul = $('.menu_drop2 > li > ul'),
								menu_a  = $('.menu_drop2 > li > a');

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
					<ul class="menu_drop2">


						@foreach($course as $d)
						<li class="item1"><a href="#"><span class="glyphicon glyphicon-chevron-down">&nbsp</span>{{$d->cour_name}}</a>
							<ul class="list-group">
						    <a href="{{url('/putwork')}}" target="_blank">
								<li class="list-group-item">
									<span id="subjname">提交作业</span>
								</li>
						    </a>
							<a href="{{url('tkol/'.$d->cour_id)}}" target="_blank">
								<li class="list-group-item">
									<span id="subjname">课堂交流</span>
								</li>
							</a>
							<a href="{{url('courfile/'.$d->cour_id)}}" target="_blank">
								<li class="list-group-item">
									<span id="subjname">课程文件</span>
								</li>
							</a>
							</ul>
						</li>
						@endforeach



					</ul>
				</div>

			</div>
		</div>

	</div>	 
</div>


@endsection
