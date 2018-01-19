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
        <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
            <tr class="text-c">
                <th>ID</th>
                <th>角色名称</th>
                <th>权限配置</th>
            </tr>
            </thead>
            <tbody>
          @foreach($lists as $v)
                <tr class="text-c">
                    <td>{{$v->role_id}}</td>
                    <td>{{$v->role_name}}</td>
                    <td class="f-14 td-manage">
                        <a onClick="Hui_admin_tab(this)" data-href="{{url('role_node')}}" href="javascript:;" data-title="权限配置{{$v->role_name}}">权限配置
                        </a>
                        {{--<a onClick="Hui_admin_tab(this)" data-href="{:U('Access/role_node',['id'=>$v['role_id']])}" href="javascript:;" data-title="权限配置（{$v.role_name}）">权限配置--}}
                        {{--</a>--}}
                    </td>
                {{--</tr>--}}
           @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('Admin.Common.footer')
</body>
</html>