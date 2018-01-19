<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="3;url={{ $url }}">
    <title>提示页面</title>

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: #efefef;
        }
        div#mother {
            margin: 0 auto;
            width: 943px;
            height: 572px;
            position: relative;
        }
        div#errorBox {
            background: url('/static/images/404_bg.png') no-repeat top left;
            width: 943px;
            height: 572px;
            margin: auto;
        }
        div#errorText {
            color: #39351e;
            padding: 146px 0 0 446px
        }
        div#errorText p {
            width: 303px;
            font-size: 14px;
            line-height: 26px;
        }
        div.link { /*background:#f90;*/
            height: 50px;
            width: 145px;
            float: left;
        }
        div#home {
            margin: 20px 0 0 444px;
        }

        div#contact {
            margin: 20px 0 0 25px;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 35px;
        }
        h3 {
            color: red;
        }
    </style>

</head>
<body>
<div id="mother">
    <div id="errorBox">
        <div id="errorText">
            <h1>Sorry...出错了！</h1>
            <h2>提示信息:</h2>
            <h3>{{$error}}。</h3>
            <p>
                火星不太安全，<span id="time" style="font-size: 18px;color: #6dbfff;">3s</span> 之后 我可以免费送你回地球
            </p>
        </div>
        <a href="javascript:window.history.go(-1)" title="">
            <div class="link" id="home">返回上一页</div>
        </a>
    </div>
</div>
</body>
</html>

