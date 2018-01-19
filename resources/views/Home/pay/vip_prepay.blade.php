<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kindle书单(VIP充值)</title>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/ui/lib/layer/2.4/layer.js"></script>
    <link rel="stylesheet" href="/static/css/pay.css">
    {{--@include('Home.Common.head')--}}
</head>
<body>
<div class="header">
    <div class="header-content">
        <div class="logo"></div>
        <div class="logo-pay">充值中心</div>
    </div>
</div>
<form action="{{url('prepay')}}" method="post">
    <div class="content">
        <div class="box">
            <div class="box-class">
                <div>
                    <h3>订单信息</h3>
                </div>
                <div>
                    <ul>
                        <li>
                            <label for="m1"><span class="time">1</span>个月<span>(6元)</span></label>
                            <input type="checkbox" id="m1" name="money" checked value="6">
                        </li>
                        <li>
                            <label for="m2"><span class="time">6</span>个月<span>(35元)</span></label>
                            <input type="checkbox" id="m2" name="money" value="35">
                        </li>
                        <li>
                            <label for="m3"><span class="time">12</span>个月<span>(60元)</span></label>
                            <input type="checkbox" id="m3" name="money" value="60">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-pay">
                <div>
                    <h3>支付类型</h3>
                </div>
                <div>
                    <ul>
                        <li>
                            <label for="p1"><span>支付宝</span></label>
                            <input type="radio" id="p1" name="pay" checked value="支付宝">
                        </li>
                        <li>
                            <label for="p2"><span>微信</span></label>
                            <input type="radio" id="p2" name="pay" value="微信">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-jie">
                <div>
                    <h3>结算</h3>
                </div>
                <div class="xieyi">
                    <input type="checkbox" id="status" checked name="agreed" value="同意">
                    <span>我阅读并同意<a href="{{url('agreement')}}">《用户使用协议》</a></span>
                </div>
                <div>
                    <ul>
                        <li><span id="timer">1</span>个月</li>
                        <li>支付金额: <span id="endPay">6</span> 元</li>
                        <li>
                            <div class="file"><input type="button" id="btn">提交</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>

<script>
    $(function () {
        var num = 6;
        var time = 0;
        //钱数
        $('input[name="money"]').click(function () {
            num = 0;
            time = 0;
            $('input[name="money"]:checked').each(function () {
                num += parseInt(this.value);
                time += parseInt($(this).parent().first().children().children().first().text());
            });
//            console.log(time);
            //总金额
            $('#endPay').html(num);
            //月份
            $('#timer').html(time);

        });
        //选择支付方式
        var payway = $('input[name="pay"]').val();
        $('input[name="pay"]').click(function () {
            payway = this.value;
        });

        $('#check').click(function () {
            if (this.value != '同意') {
                layer.msg('请先阅读该协议', {icon: 5});
            }
        });
        //异步提交
        $('.file').click(function () {
            var total = $('#endPay').html();
            var time = $('#timer').html();
            if ($('#status').is(':checked')) {
                var agreed = $('input[name="agreed"]').val();

            } else {
                var agreed = '不同意';
            }

            console.log(time);
            console.log(payway);

            if (payway == '支付宝') {
                var payways = 0;
            }
            if (payway == '微信') {
                var payways = 1;
            }
            console.log(payways);
            console.log(agreed);
            $.post('{{url('prepay')}}', {total: total, time: time, payway: payways, agreed: agreed}, function (e) {
                console.log(e);
                //用户未登录
                if (e.status == 2) {
                layer.msg( e.info, {
                icon: 5, time:1000
                });
                setTimeout(function () {
                window.location.href = "{{url('login')}}";
                },1500)
                }
                if (e.status == 1) {
                //订单成功
                layer.msg( e.info, {
                icon: 6, time:1000
                });
//                setTimeout(function () {
//                window.history.go(-1);
                window.location.href = "{{url('pay')}}/"+[e.data];
//                },1500)
                }
                if (e.status == 0) {
                //支付失败
                layer.msg( e.info, {
                icon: 5, time:1000
                });
                }
            });
        })

    });
</script>