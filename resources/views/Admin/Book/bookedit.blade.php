<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<article class="page-container">
    @foreach($list as $v)
    <form action="{{url('bookedit',['id'=>$v->book_id])}}" method="post" class="form form-horizontal" id="form-member-add">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span> 书名：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="name" value="{{$v->book_name}} ">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span> 作者：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="author" value="{{$v->author}}" >
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类：</label>
            <div class="formControls col-xs-4 col-sm-5"> <span class="select-box">
				<select name="cate_id" class="select">
					<option value="0">选择类目</option>
                    @foreach ($cate as $vv)
                        <option value="{{$vv->cate_id}}" id="category">
                        {{$vv->cate_name}}
                    </option>
                    @endforeach
				</select>
				</span> </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>出版社：</label>
            <div class="formControls col-xs-4 col-sm-5"> <span class="select-box">
				<select name="cate_id" class="select">
					<option value="0">选择出版社</option>
                    @foreach($in as $vvv)
                        <option value="{{$vvv->publish_id}}" id="publish">
                        {{$vvv->publish_name}}
                    </option>
                    @endforeach
				</select>
				</span> </div>
        </div>

        <div class="row cl">

            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span> 价格：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="price" value="{{$v->price}}">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">缩略图：</label>
                &nbsp;&nbsp;
                <input type="file" name="thumb" >
                <strong id="upload" style="cursor: pointer;">上传</strong>
                <img src="" alt="" width="150px" id="imageThumb" height="150px">
                <!-- 旧图片的地址 -->
                <input type="hidden" name="oldThumb" value="">
                <!-- 新图片地址 -->
                <input type="hidden" name="thumb" id="thumb" value="{{$v->thumb}}">
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red"></span> 展示模块:
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <span class="select-box">
				<select name="type" id="type" class="select">
					<option value="">展示模块</option>
                    @foreach($new as $vvv)
                        <option value="{{$vvv->type_id}}" >
                        {{$vvv->type_name}}
                    </option>
                    @endforeach
				</select>
				</span>
            </div>
        </div>


        <div class="row cl">

            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red"></span> 出版格式：
            </label>
            <div class="formControls col-xs-4 col-sm-5">
                <input type="text" class="input-text" id="format" value="{{$v->format}}">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">简介：</label>
            <div class="formControls col-xs-4 col-sm-5">
                <textarea class="textarea" id="remark"  placeholder="内容的介绍...10-255个字符" onKeyUp="countStringLength(this,10,255)" value="{{$v->remark}}"></textarea>
                <p class="textarea-numberbar">
                    <em class="textarea-length">0</em>/255
                </p>
            </div>
        </div>
        @endforeach
        <div class="row cl">
            <div class="col-xs-4 col-sm-5 col-xs-offset-4 col-sm-offset-3">
                <button id="subBtn" class="btn btn-primary noradius" type="button">&nbsp;&nbsp;添加&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>
@include('Admin.Common.footer')
<script>
    @foreach($list as $v)
     var id = "{{$v->book_id}}";
    @endforeach
    $(function () {
        $('#subBtn').click(function () {
            var name = $('#name').val();
            var author = $('#author').val();
            var category = $('#category').val();
            var publish = $('#publish').val();
            var price = $('#price').val();
            var thumb = $('#thumb').val();
            var format = $('#format').val();
            var remark = $('#remark').val();
            if(name == '')
            {
                errorAlert("标题不能为空!",2000);
                return false;
            }

            if(author == '')
            {
                errorAlert("作者不能为空!",2000);
                return false;
            }

            if(category == '')
            {
                errorAlert("分类不能为空!",2000);
                return false;
            }

            if(publish == '')
            {
                errorAlert("出版数量不能为空!",2000);
                return false;
            }

            if(price == '')
            {
                errorAlert("价格不能为空!",2000);
                return false;
            }

            $.post("{{url('bookedit')}}/"+id, {book_name:name,author:author, category:category,publish:publish,price:price,thumb:thumb,format:format, remark:remark}, function (e) {
                if(e.status)
                {
                    successAlert(e.info);
//                    console.log(e)
//                    window.parent.location.reload();
                }else {
                    errorAlert(e.info);
                }
            })

        });
    })
</script>
</body>
</html>