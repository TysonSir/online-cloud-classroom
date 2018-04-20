<!doctype html>
<html>
<head>
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Education Tutorial Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--bootstrap-->
    <link href="{{asset('resources/views/home/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
    <!--coustom css-->
    <link href="{{asset('resources/views/home/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('resources/views/home/css/help-style.css')}}" rel="stylesheet" type="text/css"/>
    <!--menu_drop css-->
    <link href="{{asset('resources/views/home/css/menu_drop.css')}}" rel="stylesheet" type="text/css"/>

<!--menu_drop css-->
    <link href="{{asset('resources/views/home/css/yuncampus.css')}}" rel="stylesheet" type="text/css"/>
<!--menu_drop css-->
    <link href="{{asset('resources/views/home/css/swiper.css')}}" rel="stylesheet" type="text/css"/>
<!--menu_drop css-->
    <link href="{{asset('resources/views/home/css/swiper.min.css')}}" rel="stylesheet" type="text/css"/>


    <!--script-->
    <script src="{{asset('resources/views/home/js/jquery-1.11.0.min.js')}}"></script>
    <!-- js -->
    <script src="{{asset('resources/views/home/js/bootstrap.js')}}"></script>


    <!-- js -->
    <script src="{{asset('resources/views/home/js/swiper.min.js')}}"></script>

    <!-- /js -->
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400italic,400,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!--/fonts-->


    <!--  index.html   hover-girds-->
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/default.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/component.css')}}" />
    <script src="{{asset('resources/views/home/js/modernizr.custom.js')}}"></script>



    <script type="text/javascript" src="{{asset('resources/views/home/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/js/easing.js')}}"></script>
    <!--script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
    <!--/script-->
</head>
<body>
<!--header-->
<div class="header" id="home">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                </button>
                <h1><a class="navbar-brand" href="{{url('/')}}"><img src="{{url('resources/views/home/images/logo.png')}}" class="img-responsive"></a></h1>
            </div></br>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right margin-top cl-effect-2">
                    <li><a href="{{url('/')}}"><span data-hover="Home">主页</span></a></li>
                    <li><a href="{{url('cloudclass')}}"><span data-hover="cloudclass">云课堂</span></a></li>
                    <li><a href="{{url('/lesson')}}"><span data-hover="lesson">课程</span></a></li>
                    <li><a href="{{url('/lessonlist')}}"><span data-hover="lessonlist">查成绩</span></a></li>
                    <li><a href="{{url('yuncampus')}}"><span data-hover="yuncampus">云校园</span></a></li>
                </ul>
                 
                <div class="clearfix"> </div>
            </div><!-- /.navbar-collapse -->
            <!-- /.container-fluid -->
            <div class="login-pop">
                <div id="loginpop">
                        @if(session('stu_name'))
                            <span style="font-family: 微软雅黑;font-zize:22px;" class="btn btn-primary">{{session('stu_name')}} </span>
                            <a href="{{url('/logout')}}" class="btn btn-danger btn-sm"> 退出登录</a>
                            {{--<img src="{{asset('resources/views/home/images/abt1.jpg')}}" width="100%" height="100%" title="点击可切换账号">--}}
                        @else
                        <a href="#" id="loginButton">
                            <span>登录</span>
                            @if(session('error_login'))
                                <p style="color:white">{{session('error_login')}}</p>
                            @endif
                        </a>
                        
                        @endif

                    <div id="loginBox">
                        <form id="loginForm" action="{{url('/login')}}" method="post">
                            {{csrf_field()}}
                            <fieldset id="body">
                                <fieldset>
                                    <label for="code">学号</label>
                                    <input type="text" id="email" name="stu_code">
                                </fieldset>
                                <fieldset>
                                    <label for="password">密码</label>
                                    <input type="password" id="password" name="stu_password">
                                </fieldset>
                                <input type="submit" id="login" value="登 录">
                                <label for="checkbox"><a href="{{url('/admin/login')}}"> <i class="btn btn-info"
                                                                                            style="margin-top:-7px;margin-left: 10px;font-family: 微软雅黑;font-zize:16px;">
                                            教师登录 -></i></a></label>
                            </fieldset>
                            <span><a href="#">忘记密码了吗?</a></span>
                        </form>
                    </div>
                </div>
            </div><script src="{{asset('resources/views/home/js/menu_jquery.js')}}"></script>
        </div>
    </nav>
    <!--/script-->
    <div class="clearfix"> </div>
</div>



@yield('content')



<!--footer-->
<div class="footer">
    <!-- container -->
    <div class="container">
        <div class="col-md-6 footer-left">
            <ul>
                <li><a href="{{url('/')}}">主页</a></li>
                <li><a href="{{url('cloudclass')}}">云课堂</a></li>
                <li><a href="{{url('/lesson')}}">课程</a></li>
                <li><a href="{{url('/lessonlist')}}">查成绩</a></li>
                <li><a href="{{url('yuncampus')}}">云校园</a></li>
            </ul>
            <form>
                <input type="text" placeholder="Email：15372720381@sina.cn" required="">
                <input type="submit" value="联系我们">
            </form>
        </div>
        <div class="col-md-3 footer-middle">
            <h3>地址</h3>
            <div class="Address">
                <p>辽宁省锦州市松山新区科技路19号
                    <span></span>
                </p>
            </div>
            <div class="phone">
                <p>(086)0416-3400015 </p>
            </div>
        </div>
        <div class="col-md-3 footer-right">
            <h3>详细信息</h3>
            <p>Bohai University Copyright 辽ICP备06006661号	辽公网安备 21078302000027号 </p>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //container -->
</div>
<!--/footer-->
<!--copy-rights-->
<div class="copyright">
    <!-- container -->
    <div class="container">
        <div class="copyright-left">
            <p>适应教学模式改革的课堂互动平台 made by蒋佳浩 陈泽众 纪演秋 胡晓晨 卢雪萍</p>
        </div>
        <div class="copyright-right">
            <ul>
                <li><a href="#" class="twitter"> </a></li>
                <li><a href="#" class="twitter facebook"> </a></li>
                <li><a href="#" class="twitter chrome"> </a></li>
                <li><a href="#" class="twitter pinterest"> </a></li>
                <li><a href="#" class="twitter linkedin"> </a></li>
                <li><a href="#" class="twitter dribbble"> </a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>

    </div>
    <!-- //container -->
    <!---->
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
    <a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!---->
</div>
<!--/copy-rights-->


</body>
</html>
