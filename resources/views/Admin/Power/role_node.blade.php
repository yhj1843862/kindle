<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<style>
    a{
        text-decoration:none;
    }
    .check-box{
        width: 150px;
    }
</style>
<body>
<div class="page-container">
    <div class="mt-20">
        <form action="" method="post">
            <div class="panel panel-default mb-5">
                <div class="panel-header">节点模块</div>
                <div class="panel-body">
                    @foreach($data as $v)
                        <span class="check-box">
                                @if($v['nodes'])
                                <input  type="checkbox" checked value="{{$v['id']}}" id="checkbox-{{$v['id']}}" name="node_id[]">
                            @else
                                <input  type="checkbox" value="{{$v['id']}}" id="checkbox-{{$v['id']}}" name="node_id[]">
                            @endif
                            <label for="checkbox-{{$v['id']}}">{{$v['node_name']}}</label>
                            </span>
                    @endforeach
                </div>
            </div>

            <input type="hidden" id="role_id" name="role_id" value="{{$role_id['role_id']}}">
            <button id="btn" class="btn btn-primary noradius" type="submit">提交</button>
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
        })}
    );
</script>
</body>
</html>