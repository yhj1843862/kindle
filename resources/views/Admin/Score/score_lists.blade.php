<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 积分首页
    <span class="c-gray en">&gt;</span>
    积分管理
    <span class="c-gray en">&gt;</span>
    积分列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
       href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <div class="mt-15">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="10"><input type="checkbox" name="" value=""></th>
                {{--<th width="80">用户编号</th>--}}
                <th width="24%">用户昵称</th>
                <th width="25%">用户邮箱</th>
                <th width="25%">用户积分数</th>
                <th width="25%">会员等级</th>

                {{--<th width="100">操作</th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($sc_lists as $v)
                <tr class="text-c">
                    <td><input type="checkbox" name="" value=""></td>
                    {{--<td>{{$v->num}}</td>--}}
                    <td>{{$v->nickname}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->total}}</td>
                    <td>
                        @if($v->total >= 6 && $v->total <=41 )
                            三星会员
                        @elseif($v->total >= 60 && $v->total <=100 )
                            二星会员
                        @elseif($v->total >100)
                            一星会员
                        @endif
                    </td>
                    {{--<td class="f-14"><a title="编辑" href=""  style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>--}}
                    {{--<a data-title="删除"  onclick="del(this,'{{$v->user_id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" >&#xe6e2;</i></a>--}}
                    {{--</td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $sc_lists->links() !!}
@include('Admin.Common.footer')
{{--<script type="text/javascript">--}}
{{--//书单-删除--}}
{{--function del(obj,id)--}}
{{--{--}}
{{--layer.confirm('确定要删除吗?', function(index) {--}}
{{--$.ajax({--}}
{{--type: 'GET',--}}
{{--url: '{{url('del')}}/' + id,--}}
{{--dataType:'json',--}}
{{--success:function (data) {--}}
{{--if (data.status > 0) {--}}
{{--//                        layer.msg(data.msg, {icon: 2, time:--}}
{{--// 1000});--}}
{{--window.location.reload();--}}
{{--}else{--}}
{{--$(obj).parents("tr").remove();--}}
{{--layer.msg(data.msg, {icon: 1, time: 1000});--}}
{{--}--}}

{{--},--}}
{{--error:function (data) {--}}
{{--console.log(data.msg);--}}
{{--}--}}
{{--});--}}
{{--});--}}
{{--}--}}
{{--</script>--}}
</body>
</html>