<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<article class="page-container">

    <form action="{{url('bookadd')}}" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data" >
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span> 书名：
            </label>
            <div class="formControls col-xs-4 col-sm-5">

                <input type="text" class="input-text" id="name"  name="book_name" >
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span> 作者：
            </label>
            <div class="formControls col-xs-4 col-sm-5">

                <input type="text" class="input-text" id="author" name="author">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分类：</label>
            <div class="formControls col-xs-4 col-sm-5"> <span class="select-box">

				<select name="category" id="category" class="select">
					<option value="0">选择类目</option>
                    @foreach ($list as $v)
                    <option value="{{$v->cate_id}}" >
                        {{$v->cate_name}}
                    </option>
                    @endforeach
				</select>
				</span> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>出版社：</label>
            <div class="formControls col-xs-4 col-sm-5"> <span class="select-box">

				<select name="publish" id="publish" class="select">
					<option value="">选择出版社</option>
                    @foreach($in as $vv)
                    <option value="{{$vv->publish_id}}" >
                        {{$vv->publish_name}}
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

                <input type="text" class="input-text" id="price" name="price">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">缩略图：</label>
                &nbsp;&nbsp;
                <input type="file" name="thumb" id="thumb">
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

                <input type="text" class="input-text" id="format" name="format">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">简介：</label>
            <div class="formControls col-xs-4 col-sm-5">

                <textarea class="textarea" id="remark"  placeholder="内容的介绍...10-255个字符" onKeyUp="countStringLength(this,10,255)" name="remark"></textarea>

            </div>
        </div>

        <div class="row cl">
            <div class="col-9 col-offset-3">

                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;添加&nbsp;&nbsp;" id="button">
                &nbsp;&nbsp;
                <span style="color: lightslategrey; font-size: 10px">
                    注意: * 为必填项,请仔细填写
                </span>

            </div>
        </div>
    </form>

</article>
@include('Admin.Common.footer')
</body>
</html>