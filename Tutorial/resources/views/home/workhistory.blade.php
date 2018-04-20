@extends('layouts.home')

@section('title')
	查成绩-云课堂
@endsection

@section('content')
<!-- Top Navigation -->
<!--header-->
<div class="banner banner6">
	<div class="container">
	<h2>作业记录</h2>
	</div>
</div>

<!--start-content-->
<div class="typrography">
	 <div class="container">
		 <div class="grid_3 grid_4">
		     <h3 class="first">{{$lsname->cour_name}} - 注：如多次提交，以<span style="color:red;">作业序号大</span>的为准</h3>
		     <div class="bs-example">
				 <table class="table">
				  <tbody>
					@foreach($homework as $v)
					<tr>
					  <td><h2 id="h2.-bootstrap-heading"><span style="color:#000;">{{$v->hw_name}} (作业序号：{{$v->hw_id}}) </span>[{{date('Y-m-d H:i:s',$v->hw_addtime+3600*8)}}]
							  <a href="{{url($v->hw_file)}}">文件下载</a></h2></td>
					  <td class="type-info">
						  <a href="{{url('workfeedback/'.$v->hw_id)}}"><span class="btn btn-success">查看作业反馈</span></a>
						  @if($v->hw_score>0) <span style="color:green;">已批改</span> @else <span style="color:red;">未批改</span> @endif
					  </td>
					</tr>
					@endforeach
					
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
