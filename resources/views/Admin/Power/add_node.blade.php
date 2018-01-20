<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<article class="page-container">
    <form action=""  class="form form-horizontal" id="form-member-add">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span>节点的名称：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="node_name" >
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">路由名称：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="routes">
            </div>
        </div>



        <div class="row cl">
            <div class="col-xs-4 col-sm-5 col-xs-offset-4 col-sm-offset-3">
                <button id="subBtn" class="btn btn-primary noradius" type="button">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
            </div>
        </div>

    </form>
</article>

@include('Admin.Common.footer')
<script>
    $(function () {

        $('#subBtn').click(function () {
            var node_name = $('#node_name').val();
//            var module = $('#module').val();
//            var controller = $('#controller').val();
            var route = $('#routes').val();

            $.post('',{node_name:node_name,routes:route},function (e) {
//                console.log(e);
                if(e.status)
                {
                    alert(e.info);
                    window.location.reload();
                }else {
                    alert(e.info);
                }
            })
        });
    });

</script>
</body>
</html>