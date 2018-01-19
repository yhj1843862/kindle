<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
{{--<title>添加管理员</title>--}}
<body>
<article class="page-container">
    <form class="form form-horizontal" action="" id="form-admin-add" method="">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员名称：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" value="" placeholder="" id="nickname" name="nickname">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员密码：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="password" class="input-text" autocomplete="off" value="" placeholder="请输入密码5-16位" id="pswd" name="pswd">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员邮箱：</label>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" placeholder="请输入邮箱" name="email" id="email">
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input id="subBtn" class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>

    </form>
</article>

@include('Admin.Common.footer')

<script>
    $(function () {

        $('#subBtn').click(function () {
            var nickname = $('#nickname').val();
            var pswd = $('#pswd').val();
            var email = $('#email').val();

          if (nickname.length >10 ||nickname.length < 2)
            {
                errorAlert('用户名不正确!');
                return false;
            }

            if (pswd.length == 0)
            {
                errorAlert('密码不能为空!');
                return false;
            }

            if (email.length == 0)
            {
                errorAlert('邮箱不能为空!');
                return false;
            }
            $.post("{{url('add_admin')}}",{nickname:nickname,pswd:pswd,email:email,role:2},function (e) {

                if (e.status){
//                    console.log(e.info);
                    successAlert(e.info);
                }else {
                    errorAlert(e.info);
                }

            })
        });
    })
</script>
</body>
</html>