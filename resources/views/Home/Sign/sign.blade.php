<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kindle书单(注册)</title>
    <link rel="stylesheet" type="text/css" href="/static/css/htmleaf-demo.css">
    <link rel="stylesheet" type="text/css" href="/static/css/verify.css">
    <link rel="stylesheet" type="text/css" href="/static/css/bookregister.css">
</head>
<body>
<div class="content">
    <img src="/static/images/big001.jpg" alt="">
    <div class="box">
        <div class="col">
            <div class="logo"><img src="/static/images/logo.png" alt=""></div>
            <div class="col-content">

                <div class="col-title">
                    <div><h3 style="background-color: #fff; color:#444" id="t1">注册</h3></div>
                    <div><h3 id="t2">登录</h3></div>
                </div>
                {{--注册--}}
                <div id="zc">
                    <div class="box-m">
                        <form action="{{url('register')}}" method="post">
                            <div class="inputbox account-box"><input type="text" name="email" class="user" placeholder="常用邮箱 "></div>
                            <div class="inputbox account-box"><input type="password" name="pswd" placeholder="密码" class="wsp" id="wsp1"></div>
                            <div class="inputbox" ><input type="password" name="repswd" placeholder="确认密码" class="wsp" id="wsp2"></div>
                            <div class="yanzheng">
                                <div class="htmleaf-container">
                                    <div class="container">
                                        <div class="row">
                                            <div id="mpanel4" ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons"><input type="submit" name="" value="注&nbsp;&nbsp;册" id="zd1"></div>
                        </form>
                    </div>
                </div>
                {{--登录--}}
                <div id="dl">
                    <div class="box-m">
                        <form action="{{url('login')}}" method="post">
                            <div class="inputbox account-box" id="account-box"><input type="text" name="email" class="user" placeholder="常用邮箱"></div>
                            <div class="inputbox" ><input type="password" name="pswd" placeholder="密码" class="wsp" id="wsp3"></div>
                            <div class="yanzheng">
                                <div class="htmleaf-container">
                                    <div class="container">
                                        <div class="row">
                                            <div id="mpanel5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons"><input type="submit" name="" value="登&nbsp;&nbsp;录" id="zd2"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="/static/js/jquery-1.11.0.min.js"><\/script>')</script>
<script type="text/javascript" src="/static/js/verify.js" ></script>
<script src="/static/ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
    //控制显示登录注册
    $(".col-title").click( function (event) {
        $(".col-title>div>h3").css({"background":"rgba(17,17,17,0.5)" ,"color":"rgba(255,255,255,0.5)"});
        $(event.target).css({"background":"#fff" ,"color":"#444"});
        if ($(event.target).text() == "注册") {
            $("#zc").css({"display":"block"});
            $("#dl").css({"display":"none"});
            $("form").submit(function () {
                if(empty($('.user').val())){
                    layer.msg('账户不能为空')
                }

                if ($('#wsp1').val().length == 0){
                    layer.msg('密码不能为空', {icon: 5});
                    $('.wsp').focus();
                    return false;
                }
            });
        }
        if ($(event.target).text() == "登录"){
            $("#zc").css({"display":"none"});
            $("#dl").css({"display":"block"});
            $("form").submit(function () {
                if ($('#wsp3').val().length == 0){
                    layer.msg('密码不能为空', {icon: 5});
                    $('.wsp').focus();
                    return false;
                }
            });
        }
    });

    $('#mpanel4').slideVerify({
        type : 2,		//类型
        vOffset : 5,	//误差量，根据需求自行调整
        vSpace : 5,	//间隔
        imgName : ['1.jpg', '2.jpg'],
        imgSize : {
            width: '318px',
            height: '150px',
        },
        blockSize : {
            width: '20px',
            height: '20px',
        },
        barSize : {
            width : '316px',
            height : '40px',
        },
        ready : function() {
        },
        success : function() {
            $('#mpanel4 .verify-img-panel').css({"display":"none"});
            $('#mpanel4 .verify-sub-block').css({"display":"none"});
        },
        error : function() {
            $('#mpanel4 .verify-img-panel').css({"display":"block"});
            $('#mpanel4 .verify-sub-block').css({"display":"block"});
        }

    });
    $('#mpanel5').slideVerify({
        type : 2,		//类型
        vOffset : 5,	//误差量，根据需求自行调整
        vSpace : 5,	//间隔
        imgName : ['1.jpg', '2.jpg'],
        imgSize : {
            width: '318px',
            height: '150px',
        },
        blockSize : {
            width: '20px',
            height: '20px',
        },
        barSize : {
            width : '316px',
            height : '40px',
        },
        ready : function() {
        },
        success : function() {
            $('#mpanel5 .verify-img-panel').css({"display":"none"});
            $('#mpanel5 .verify-sub-block').css({"display":"none"});
        },
        error : function() {
            $('#mpanel5 .verify-img-panel').css({"display":"block"});
            $('#mpanel5 .verify-sub-block').css({"display":"block"});
        }
    });
</script>
</html>