<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>查看图片</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">
<!--menu_drop css-->
    <link href="{{asset('resources/views/home/css/swiper.min.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Demo styles -->
    <style>
    html, body {
        position: relative;
        height: 100%;
    }
    body {
        background: #000;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
        background: rgba(0,0,0,0.7);
         overflow-y: hidden;
    }
    .swiper-container {

        width: 800px;
        height: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    .swiper-slide {
        background-size: cover;
        background-position: center;
    }
    .swiper-slide img{
        width: 100%;
        height: 100%;
    }
    .gallery-top {
        margin-top: 50px;
        height: 400px;
        width: 800px;
    }
    .gallery-thumbs {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
        height: 100%;
        opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-active {
        opacity: 1;
    }
    .close{
        display: block;
        list-style: none;
        text-decoration: none;
        position: fixed;
        top:30px;
        right: 30px;
        color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(0,0,0,0.1);
        font-size: 30px;
        text-align: center;
        line-height: 40px;
        
    }
    .tip{
    width: 100%;
    height: 50px;
    background: rgba(0,0,0,0.7);
    color: #fff;
    position: absolute;
    left: 0;
    bottom: 0;
    line-height: 50px;
    text-align: center;   
    transition:all 1s;
    font-size: 20px;
    }
    .swiper-slide:hover .tip{
        height: 50px;
    }
    
    </style>
</head>
<body>
    <!-- Swiper -->
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P1.jpg')}}" alt="">
                <div class="tip">
                    拍摄于滨海校区工科楼
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P2.jpg')}}" alt="">
                <div class="tip">
                     拍摄于滨海校区文科楼
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P3.jpg')}}" alt="">
                <div class="tip">
                     拍摄于松山校区听林湖
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P4.jpg')}}" alt="">
                <div class="tip">
                     拍摄与松山校区行政楼后
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P5.jpg')}}" alt="">
                <div class="tip">
                    拍摄于松山校区图书馆广场
                </div>
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P6.jpg')}}" alt="">
                <div class="tip">
                     拍摄于松山校区图书馆南广场
                </div>
            </div>
            
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"id="next"></div>
        <div class="swiper-button-prev swiper-button-white" id="prev"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P1.jpg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P2.jpg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P3.jpg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P4.jpg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P5.jpg')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('resources/views/home/images/P6.jpg')}}" alt="">
            </div>
            
        </div>
    </div>
    <a href="{{url('/yuncampus')}}" class="close">X</a>
    <!-- Swiper JS -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <!-- js -->
    <script src="{{asset('resources/views/home/js/swiper.min.js')}}"></script>

    <!-- Initialize Swiper -->
    <script>
    var galleryTop = new Swiper('.gallery-top', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
        loop:true,
        loopedSlides: 5, //looped slides should be the same     
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        touchRatio: 0.2,
        loop:true,
        loopedSlides: 5, //looped slides should be the same
        slideToClickedSlide: true
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;
    
    //监听滚轮事件
        /*
            滚轴事件回调函数
        */
        function scrollFun(e) {

            e = e || window.event;

            // 获得滚轴的状态值
            var i = e.wheelDelta ? e.wheelDelta : -e.detail;

            if (i >= 0) {
                // alert('向上滚动');
                $("#prev").click();
                // document.getElementById("prev").onclick;
            } else{
                 // alert('向下滚动');
                $("#next").click();
                // document.getElementById("next").onclick;
            }
               
                
           

        }

        // 非火狐
        document.onmousewheel = scrollFun;

        // 火狐
        if (document.addEventListener)
            document.addEventListener('DOMMouseScroll',scrollFun);
    </script>

</body>
</html>
