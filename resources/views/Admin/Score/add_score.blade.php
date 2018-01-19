{{--<!DOCTYPE HTML>--}}
{{--<html>--}}
{{--@include('Admin.common.header')--}}
{{--<body>--}}
{{--<article class="page-container">--}}
    {{--<form class="form form-horizontal" id="form-admin-add">--}}
        {{--<div class="row cl">--}}
            {{--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>积分编号：</label>--}}
            {{--<div class="formControls col-xs-8 col-sm-9">--}}
                {{--<input type="text" class="input-text" value="" placeholder="" id="num" name="num">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row cl">--}}
            {{--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>积分昵称：</label>--}}
            {{--<div class="formControls col-xs-8 col-sm-9">--}}
                {{--<input type="text" class="input-text" value="" placeholder="" id="nickname" name="nickname">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row cl">--}}
            {{--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>积分数：</label>--}}
            {{--<div class="formControls col-xs-8 col-sm-9">--}}
                {{--<input type="text" class="input-text" value="" placeholder="" id="score" name="score">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row cl">--}}
            {{--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户邮箱：</label>--}}
            {{--<div class="formControls col-xs-8 col-sm-9">--}}
                {{--<input type="text" class="input-text" placeholder="" name="email" id="email">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row cl">--}}
            {{--<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">--}}
                {{--<input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;添加&nbsp;&nbsp;" id="button">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</article>--}}

{{--@include('Admin.common.footer')--}}

{{--<script>--}}
    {{--$(function () {--}}

        {{--$('#button').click(function () {--}}
{{--//            var num = $('#num').val();--}}
            {{--var nickname = $('#nickname').val();--}}
            {{--var score = $('#score').val();--}}
            {{--var email = $('#email').val();--}}
            {{--if (nickname.length >10 || nickname.length < 2)--}}
            {{--{--}}
                {{--errorAlert('积分昵称不正确!');--}}
                {{--return false;--}}
            {{--}--}}

            {{--if (score.length == 0)--}}
            {{--{--}}
                {{--errorAlert('积分不能为空!');--}}
                {{--return false;--}}
            {{--}--}}
            {{--$.post("{{url('add_score')}}",{nickname:nickname,score:score,email:email},function (e) {--}}
                {{--if (e.status){--}}
{{--//                    console.log(e);--}}
                    {{--successAlert(e.info);--}}
                {{--}else {--}}
                    {{--errorAlert(e.info);--}}
                {{--}--}}

            {{--})--}}


        {{--});--}}
    {{--})--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}