<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    书籍管理
    <span class="c-gray en">&gt;</span>
    书籍列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <div class="text-c">
        <form action="{{url('booklist')}}" method="">
                <button href="{{url('booklist')}}" class="btn btn-success radius">返回列表</button>
            <input type="text" name="search" id="search" placeholder="类目名称、书籍id" style="width:250px" class="input-text">
            <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </form>
    </div>
    <div class="cl pd-10 bg-1 bk-gray mt-25">
		<span class="text-c">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" title="添加书籍"  data-width="900" data-href="{{url('bookadd')}}" onclick="openPage(this)"href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加书籍</a>

		</span>
        <span class="r">共有数据：{{$num}}<strong>
            </strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">ID</th>
                <th width="100">书名</th>
                <th width="100">作者</th>
                <th width="100">分类</th>
                <th width="100">出版社</th>
                <th width="100">价格</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $v)
            <tr class="text-c">
                <td><input type="checkbox" name="" value="{{$v->book_id}}"></td>
                <td>{{$v->book_id}}</td>
                <td>{{$v->book_name}}</td>
                <td>{{$v->author}}</td>
                <td>{{$v->cate_name}}</td>
                <td>{{$v->publish_name}}</td>
                <td class="text-c">{{$v->price}}</td>
                <td class="td-manage">
                    <a title="编辑书单" data-href="{{url('bookedit')}}/{{$v->book_id}}" onclick="openPage(this)" class="ml-5" ><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="删除"  onclick="admin_del(this,'{{$v->book_id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" >&#xe6e2;</i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $list->links() !!}
</div>

@include('Admin.Common.footer')
<script type="text/javascript">
    //书单-删除
    function admin_del(obj,id)
    {
        layer.confirm('确定要删除吗?', function(index) {
            $.ajax({
                type: 'GET',
                url: '{{url('bookdel')}}/' + id,
                dataType:'json',
                success:function (data) {
                    if (data.status > 0) {
                        layer.msg(data.msg, {icon: 2, time: 1000});
                    }else{
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg, {icon: 1, time: 1000});
                    }

                },
                error:function (data) {
                    console.log(data.msg);
                }
            });
        });
    }

    //批量删除
    function datadel() {
        layer.confirm('确认要删除吗?', function (index) {
            var inputs = $('input:checked');
            var ids = "";
            $.each(inputs, function (k, v) {
                if (v.value != "") {
                    ids += "," + v.value;
                }
            });
            $.ajax({
                type:'GET',
                url: '{{url('bookdel')}}/' + ids,
                dataType :'json',
                success:function (data) {
                    if (data.status > 0) {
                        layer.msg(data.msg, {
                            icon: 1, time:1000
                        });
                    }else{
                        $.each(inputs, function(k,v) {
                            if (v.value != "")
                            {
                                $(v).parents("tr").remove();
                            }
                        });
                        layer.msg(data.msg, {
                            icon: 1,time:1000
                        });
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