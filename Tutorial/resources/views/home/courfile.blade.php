@extends('layouts.home')

@section('title')
	课程文件-云课堂
@endsection

@section('content')


<!-- Top Navigation -->
<!--header-->
<div class="banner banner6">
	<div class="container">
	<h2>{{$lsname->cour_name}}-课程文件</h2>
	</div>
</div>

<!--start-content-->
<div class="typrography">
	 <div class="container">
		 <div class="grid_3 grid_4">
		     <h3 class="first">文件列表</h3>
		     <div class="bs-example">
				 <table class="table">
				  <tbody>
				  @forelse($courfiles as $v)
					<tr>
					  <td><a href="{{url($v->cf_url)}}"><h2 id="h1.-bootstrap-heading">{{url($v->cf_name)}}<a class="anchorjs-link" href="#h1.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2></a></td>
					  <td class="type-info"><a href="{{url($v->cf_url)}}">右键另存为</a></td>
					</tr>
				  @empty
					  <tr>
						  <td><h2 id="h1.-bootstrap-heading">暂无文件<a class="anchorjs-link" href="#h1.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h2></td>

					  </tr>
				  @endforelse
				  </tbody>
				 </table>
			 </div>
	      </div>
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
