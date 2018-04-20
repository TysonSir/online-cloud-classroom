@extends('layouts.home')
@section('title')
    视频播放-云课堂
@endsection
@section('content')

    {{--<video src="http://localhost/Tutorial/uploads/courvideo/english01.mp4" width="320" height="240" controls="controls">--}}
        {{--Your browser does not support the video tag.--}}
    {{--</video>--}}

<div style="margin: 0 auto; width: 800px;">

    <video width="100%"  controls="controls" align="center">
        <source src="{{url($url)}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

</div>


{{--<img src="http://localhost/Tutorial/uploads/courvideo/english.jpeg_20170403120054192.jpeg">--}}

@endsection