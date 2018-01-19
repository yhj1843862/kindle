<!DOCTYPE HTML>
<html>
@include ('Admin.Common.header')
<style>
    a{
        text-decoration:none;
    }
</style>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 会员列表</nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a class="btn btn-primary" title="添加会员用户" data-width="1200" data-href="{{url('add_vip')}}" onclick="openPage(this)" href="javascript:;">
                <i class="Hui-iconfont Hui-iconfont-add"></i> 添加会员用户
            </a>
        </span>
        <span class="r">
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新">
                <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
            </a>
        </span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
            <tr class="text-c">
                {{--<th>会员编号</th>--}}
                <th>会员昵称</th>
                <th>会员邮箱</th>
                <th>会员等级</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $v)
                <tr class="text-c">
                    {{--<td>{{$v->num}}</td>--}}
                    <td>{{$v->nickname}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->level}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $users->links() !!}
@include ('Admin.Common.footer')

</body>
</html>