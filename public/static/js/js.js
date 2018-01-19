//公告
(function scrollVert(){
    setTimeout(function(){
        $("#callboard ul").animate({marginTop: '-35px'}, 1000, function(){
            setTimeout(function function_name(argument) {
                var top1 = $("#callboard ul li:first-child").text();
                var top2 = $("#callboard ul li:last-child").text();
                $("#callboard ul li:first-child").text(top2);
                $("#callboard ul li:last-child").text(top1);
                $("#callboard ul").css("margin-top","0px");
                scrollVert();
            },10);
        });
    }, 2000);
}());
//会员捐助
(function scrollVertA() {
    setTimeout(function(){
        $(".goodwill-speedbar ul").animate({marginTop: '-35px'}, 1000, function(){
            setTimeout(function function_name(argument) {
                var top1 = $(".goodwill-speedbar ul li:first-child").html();
                var top2 = $(".goodwill-speedbar ul li:last-child").html();
                $(".goodwill-speedbar ul li:first-child").html(top2);
                $(".goodwill-speedbar ul li:last-child").html(top1);
                $(".goodwill-speedbar ul").css("margin-top","0px");
                scrollVertA();
            },10);
        });
    },1500);
}());
//书单广场
function scrollVertB() {
    setTimeout(function(){
        $("#books-two-cardslist").animate({left: '-100%'}, 2000, function(){
            setTimeout(function(){
                $("#books-two-cardslist").animate({left: '-200%'}, 2000, function(){
                    huan();
                    scrollVertB();
                });
            },2000);
        });
    },4000);
};
scrollVertB();
function huan() {
    var top1 = $("#books-two-cardslist>div:first-child").html();
    var top2 = $("#books-two-cardslist>div:odd").html();
    var top3 = $("#books-two-cardslist>div:last-child").html();
    $("#books-two-cardslist>div:odd").html(top1);
    $("#books-two-cardslist>div:first-child").html(top3);
    $("#books-two-cardslist>div:last-child").html(top2);
    $("#books-two-cardslist").css("left","0px");
}


$(function(){
    //周月榜
    $("#month").click(function(){
        $("#sidebar-week").css("display","none");
        $("#sidebar-month").css("display","block");
        $("#s-i").animate({left:"145px"},"slow" );
    });
    $("#week").click(function(){
        $("#sidebar-month").css("display","none");
        $("#sidebar-week").css("display","block");
        $("#s-i").animate({left:"43px"}, "slow");
    });
    //书单广场 最新
    $(".titles").click(function(){
        $(".col-r").css("display","none");
        $(".col-x").css("display","block");
        $("#s-i").animate({right:"130px"},"slow" );
    });
    $(".titlem").click(function(){
        $(".col-x").css("display","none");
        $(".col-r").css("display","block");
        $("#s-i").animate({right:"88px"}, "slow");
    });

});
