<!DOCTYPE HTML>
<html>
@include('Admin.common.header')
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>会员昵称：</label>
            <div class="formControls col-xs-8 col-sm-5">
                <input type="text" class="input-text" value="" placeholder="" id="nickname" name="nickname">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>会员邮箱：</label>
            <div class="formControls col-xs-8 col-sm-5">
                <input type="text" class="input-text" value="" placeholder="" id="email" name="email">
            </div>
        </div>
        {{--<div class="row cl">--}}
            {{--<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>会员用户等级：</label>--}}
            {{--<div class="formControls col-xs-8 col-sm-9">--}}
                {{--<input type="text" class="input-text" placeholder="" name="level" id="level">--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">会员等级：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <span class="select-box">
                    <select class="select" id="level">
                        <option value="0" selected>请选择等级</option>
                        {{--<volist name="role_list" id="v">--}}
                        {{--@foreach($lists as $v)--}}
                        {{--<option value="{$v.role_id}">{{$v->level}}</option>--}}
                            <option>一星</option>
                            <option>二星</option>
                            <option>三星</option>
                      {{--@endforeach--}}
                    </select>
				</span>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;添加&nbsp;&nbsp;" id="button">
            </div>
        </div>
    </form>
</article>

@include('Admin.common.footer')
<script>
    $(function () {

        $('#button').click(function () {
            var nickname = $('#nickname').val();
            var email = $('#email').val();
            var level = $('#level').val();

            if (nickname.length >10 || nickname.length < 2)
            {
                errorAlert('用户名不正确!');
                return false;
            }

            if (email.length == 0)
            {
                errorAlert('邮箱不能为空!');
                return false;
            }

//            if (level.length == 0)
//            {
//                errorAlert('会员等级不能为空!');
//                return false;
//            }
            $.post("{{url('add_vip')}}",{nickname:nickname,email:email,level:level},function (e) {
                if (e.status){
//                    console.log(e);
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