<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<div class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-category-add">
        <div class="tabBar cl">
            <span style="background-color:lightgray">类目设置</span>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2">
                <span class="c-red">*</span>
                类目名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  placeholder="" id="cate_name" style="width: 260px">
            </div>
        </div>
        <div class="row cl">
            <div class="col-3 col-offset-2">
                <input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;添加&nbsp;&nbsp;"id="button">
            </div>
        </div>
    </form>
</div>

@include('Admin.Common.footer')
<script type="text/javascript">
    $(function() {
        $('#button').click(function () {
            var cate_name = $('#cate_name').val();

            if(cate_name == '')
            {
                errorAlert("类目不能为空!");
                return false;
            }

            $.post('{{url('sortadd')}}',{cate_name:cate_name}, function (e) {
                if(e.status)
                {
                    successAlert(e.info);
//                    console.log(e);

                }else {
                    errorAlert(e.info);
                }

            })
        });

    })

</script>
</body>
</html>