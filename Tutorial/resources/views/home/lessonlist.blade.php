@extends('layouts.home')

@section('title')
	查成绩-云课堂
@endsection

@section('content')


	<!-- Top Navigation -->
<!--header-->
<div class="banner banner6">
	<div class="container">
	<h2>已交过作业的课程</h2>
	</div>
</div>

<!--start-content-->
<div class="typrography">
	 <div class="container">
		 <div class="grid_3 grid_4">
		     <h3 class="first">课程列表</h3>
		     <div class="bs-example">
				 <table class="table">
				  <tbody>
					@foreach($course as $v)
					<tr>
					  <td><h2 id="h2.-bootstrap-heading"><span style="color:#000;">{{$v->cour_name}}</span></h2></td>
					  <td class="type-info">
					  <a href="{{url('workhistory/'.$v->cour_id)}}"><span class="btn btn-success">作业提交记录</span></a>
					  </td>
					</tr>
					@endforeach
				  </tbody>
				 </table>
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

