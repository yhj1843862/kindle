<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<title>管理员列表</title>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript: window.location.reload();;" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span><a data-href="{{url('add_admin')}}" href="javascript:;" onclick="openPage(this)" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="chooses" value=""></th>
                <th width="40">ID</th>
                <th width="150">登录昵称</th>
                <th width="150">登录邮箱</th>
                <th width="150">角色</th>
                <th width="130">加入时间</th>
                <th width="100">书库邮箱</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $v)
                <tr class="text-c" >
                    <td><input type="checkbox" value="{{$v->user_id}}" name=""></td>
                    <td>{{$v->user_id}}</td>
                    <td>{{$v->nickname}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->role_name}}</td>
                    <td>{{$v->create_time}}</td>
                    <td>{{$v->k_email}}</td>
                    <td class="td-manage"> <a title="删除" href="javascript:;" onclick="del(this,'{{$v->user_id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $admins->links() !!}
@include('Admin.Common.footer')
<script type="text/javascript">
    function del(obj,id)
    {
        layer.confirm('确定要删除吗?', function(index) {
            $.ajax({
                type: 'GET',
                url: '{{url('del')}}/' + id,
                dataType:'json',
                success:function (data) {
                    if (data.status < 0) {
                        layer.msg(data.msg, {icon: 2, time: 1000});
                    }else{
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg, {icon: 1, time: 1000});
                    }
                   window.location.reload();

                },
                error:function (data) {
                    console.log(data.msg);
                }
            });
        });
    }
</script>
</body>
</html>