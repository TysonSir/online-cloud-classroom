$(function(){
    //记录评论的数量 动态改变
    var count=0;
    var count2 = 0;
    $("#PLcount").html(0);
    $("#PLcount2").html(0);
	var galleryTop = new Swiper('.gallery-top', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
        loop:true,
        loopedSlides: 5, //looped slides should be the same 
        autoplay:3000    
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        touchRatio: 0.2,
        loop:true,
        loopedSlides: 5, //looped slides should be the same
        slideToClickedSlide: true,
        autoplay:3000  
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;


    // 评论区回车发送消息开始
    // 获得元素对象
    var t1 = document.getElementById('t1');
    var PLcontent = document.getElementById('PLcontent');
    var PLbtn = document.getElementById("PLbtn");
    var liuyan = document.getElementById('liuyan');
    var pinglun1 = document.getElementById("pinglun1");

    
    // 获得焦点
    t1.focus();
    PLbtn.onclick = function(e){
        count++;
         $("#PLcount").html(count);
       // 如果输入不为空，追加数据到显示区域
        if (t1.value != "") {                   
            PLcontent.value += String.fromCharCode(13) +"用户:250" +String.fromCharCode(13) + "     "+t1.value ; 
            t1.value = '';
        }
    }
    // 键盘按下
    t1.onkeydown = function(e) {
    
        e = e || window.event;
        
        // 判断是否ctrl + 回车
        if ( e.keyCode == 13) {
            count++;
             $("#PLcount").html(count);
            // 如果输入不为空，追加数据到显示区域
            if (t1.value != "") {                   
                PLcontent.value += String.fromCharCode(13) +"用户:250" +String.fromCharCode(13) + "     "+t1.value ; 
                t1.value = '';
            }
                
        }
    }

    liuyan.onclick = function(){       
       
        if( $("#pinglun1").css("display") == "block"){
            $("#pinglun1").css("display",'none');
        }else{
            $("#pinglun1").css("display",'block');
        }

       
    }

    //第二个电影评论
    // 评论区回车发送消息开始
    // 获得元素对象
    var t2 = document.getElementById('t2');
    var PLcontent2 = document.getElementById('PLcontent2');
    var PLbtn2 = document.getElementById("PLbtn2");
    var liuyan2 = document.getElementById('liuyan2');
    var pinglun2 = document.getElementById("pinglun2");

    
    // 获得焦点
    t2.focus();
    PLbtn2.onclick = function(e){
       // 如果输入不为空，追加数据到显示区域
       count2++;
        $("#PLcount2").html(count2);
        if (t2.value != "") {                   
            PLcontent2.value += String.fromCharCode(13) +"用户:250" +String.fromCharCode(13) + "     "+t2.value ; 
            t2.value = '';
        }
    }
    // 键盘按下
    t2.onkeydown = function(e) {
    
        e = e || window.event;
        
        // 判断是否ctrl + 回车
        if ( e.keyCode == 13) {
            count2++;
            $("#PLcount2").html(count2);

            // 如果输入不为空，追加数据到显示区域
            if (t2.value != "") {                   
                PLcontent2.value += String.fromCharCode(13) +"用户:250" +String.fromCharCode(13) + "     "+t2.value ; 
                t2.value = '';
            }
                
        }
    }

    liuyan2.onclick = function(){       
       
        if( $("#pinglun2").css("display") == "block"){
            $("#pinglun2").css("display",'none');
        }else{
            $("#pinglun2").css("display",'block');
        }

       
    }

    //点击回到顶部
    $("#toTop").click(function(event) {
        $("html,body").animate({scrollTop:0},1000);
    });

    //点击图片显示具体图片 
  
    $(".stuimg").click(function(event) {
        window.location="picture.html";
    });
});