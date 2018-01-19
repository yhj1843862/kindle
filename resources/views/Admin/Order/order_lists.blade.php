<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">

        <form action="{{'order_lists'}}" method="get">
            <input type="text" class="input-text" style="width:250px" placeholder="输入订单用户名" id="search" name="nickname">
            <button type="submit" class="btn btn-success" id="user" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索订单用户</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="r">共有数据：<strong>{{$num}}</strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="9">订单列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="80">订单号</th>
            <th width="80">订单用户</th>
            <th width="80">商品名称</th>
            <th width="80">商品数量</th>
            <th width="80">价格(元)</th>
            <th width="80">支付金额(元)</th>
            <th width="80">支付状态</th>

            <th width="80">操作</th>
        </tr>
        </thead>
        <tbody>
       @foreach($page as $v)
            <tr class="text-c">
                <td><input type="checkbox" value="" name=""></td>
                <td>{{$v->order_id}}</td>
                <td>{{$v->nickname}}</td>
                <td>{{$v->book_name}}</td>
                <td>{{$v->number}}</td>
                <td>{{$v->price}}</td>
                <td>{{$v->total}}</td>
                <td>
                    @if($v->status == 1 )
                        <span style="color: #00B83F" >已支付</span>
                    @else
                        <span style="color: red">未支付</span>
                    @endif
                </td>
                <td class="td-manage">
                    <a data-title="删除"onclick="order_del(this,'{{$v->order_id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" >&#xe6e2;</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $page->links() !!}
</div>
@include('Admin.Common.footer')
<script type="text/javascript">
    /*管理员-删除*/
    function order_del(obj,id) {
        layer.confirm('确认要删除吗？', function (index) {
            $.ajax({
                type: 'GET',
                url: '{{url('order_del')}}/' + id,
                dataType: 'json',
                success: function (data) {
                    if (data.status < 0) {
                        layer.msg(data.msg, {icon: 2, time: 1000});
                    } else {
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg, {icon: 1, time: 1000});
                    }
                },
                error: function (data) {
                    console.log(data.msg);
                }
            });
        });
    }
</script>
</body>
</html>