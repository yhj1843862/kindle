<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<style>
    a{
        text-decoration:none;
    }
</style>
<body>
<div class="page-container">

    <div class="mt-20">
        <form action="" method="post">
            <volist name="nodes" id="v">
                <div class="panel panel-default mb-5">
                    <div class="panel-header">角色模块</div>
                    <div class="panel-body">
                        <volist name="v.children" id="vv">
                            <div class="panel panel-default mb-5">
                                <div class="panel-header">管理员管理</div>
                                <div class="panel-body">
                                    <volist name="vv.children" id="vvv">
                                        <div class="check-box">
                                            <if condition="$vvv['selected']">
                                                <input type="checkbox" checked value="管理书籍" name="box[]" id="checkbox-{$vvv.id}">
                                                <else/>
                                                <input type="checkbox" value="{管理书籍" name="box[]" id="checkbox-{$vvv.id}">
                                            </if>
                                            <label for="checkbox-{$vvv.id}">vip会员}</label>
                                        </div>
                                    </volist>
                                </div>
                            </div>
                        </volist>
                    </div>
                </div>
            </volist>
            <input type="hidden" name="role_id" value="{$role_id}">
            <button class="btn btn-primary noradius">提交</button>
        </form>
    </div>
</div>
@include('Admin.Common.footer')
<script>
    $(function(){
        $('.check-box input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        })});
</script>
</body>
</html>