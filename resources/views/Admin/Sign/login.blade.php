<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link href="/static/ui/ui/css/H-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/ui/ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css"/>
    <link href="/static/ui/ui.admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/ui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css"/>
    <script src="/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/ui/ui/js/H-ui.min.js"></script>
    <script src="/static/ui/ui.admin/js/H-ui.admin.js"></script>
    <script src="/static/ui/lib/layer/2.4/layer.js"></script>
    <title>用户登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <style>
        .noradius {
            border-radius: 0px;
        }
    </style>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" action="" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3">
                    <i class="Hui-iconfont">&#xe60d;</i>
                </label>
                <div class="formControls col-xs-8">
                    <input type="text" name="email" id="email" placeholder="邮箱账号" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input type="password" name="pswd" id="pswd" placeholder="您的密码" class="input-text size-L">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe725;</i></label>
                <div class="formControls col-xs-8 col-xs-offset-3" style="margin-left: 0px">
                    <input class="input-text size-L " type="text" placeholder="请输入验证码" id="j_verify" name="j_verify"
                           style="width: 222px">
                    <a onclick="javascript:re_captcha();"> <img id="verify_img" alt="点击更换" title="点击更换"
                                                                src="{{url('captcha/1')}}" height="40" width="134"></a>
                </div>
            </div>

            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success noradius size-L"
                           value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default noradius size-L"
                           value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright kindle v0.1</div>
</body>
</html>

<script>
    /**
     * 验证码刷新
     */
    function re_captcha() {
        $url = "{{ URL('captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('verify_img').src = $url;
    }
    $(function () {




        /**
         * 验证码异步验证
         */
        $('#j_verify').focusout(function () {
            var email = $('#email').val();
            var pswd = $('#pswd').val();
            var code = $('#j_verify').val();
            if (email == '') {
                layer.msg('用户不能为空', {icon: 5});
                $('#email').focus();
                return false;
            }
            if (pswd == '') {
                layer.msg('用户不能为空', {icon: 5});
                $('#pswd').focus();
                return false;
            }

//            console.log(code);
            if (code == '') {
                layer.msg('验证码不能为空', {icon: 5});
                $('#j_verify').focus();
                return false;
            }
            $.post("{{url('do_verify')}}", {code: code}, function (e) {
//                console.log(e);
                if (e.status == true) {
                    layer.msg(e.info, {icon: 6});
                }
                else {
                    layer.msg(e.info, {icon: 5});
                }
            })
        });


    });

</script>

