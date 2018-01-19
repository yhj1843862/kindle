<!DOCTYPE HTML>
<html>
<include file="Common/header"/>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">

        <div class="row cl">

            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span>节点的名称：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="node_name" >
            </div>
        </div>

        <div class="row cl">

            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span>模块：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="module">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">控制器：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="controller">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">方法：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="action">
            </div>
        </div>



        <div class="row cl">
            <div class="col-xs-4 col-sm-5 col-xs-offset-4 col-sm-offset-3">
                <button id="subBtn" class="btn btn-primary noradius" type="button">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
            </div>
        </div>

    </form>
</article>

<include file="Common/footer"/>
<script>
    $(function () {

        $('#subBtn').click(function () {
            var node_name = $('#node_name').val();
            var module = $('#module').val();
            var controller = $('#controller').val();
            var action = $('#action').val();

            $.post('',{node_name:node_name,module:module,controller:controller,action:action},function (e) {
                if(e.status)
                {
                    window.location.reload();
                }else {
                    errorAlert(e.info);
                }
            })


        });

    });

</script>
</body>
</html>