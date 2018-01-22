<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kindle书单(书单广场)</title>
    <link rel="stylesheet" type="text/css" href="/static/css/stylelist.css">
    <link rel="stylesheet" href="/static/css/style.css">
    <script type="text/javascript" src="/static/js/jQuery.min.js"></script>
    <script type="text/javascript" src="/static/js/js.js"></script>
    <style type="text/css">

    </style>
</head>
<body>
@include('Home.Common.nav')
<div id="content">
    <div id="">
        <div class="speedbar">
            <div class="toptip" id="callboard">
                <ul>
                    <li>使用快捷键Ctrl+D收藏Kindle书单，下次访问更方便哟！</li>
                    <li>真心感谢所有捐赠打赏的书友！你们的支持将会让Kindle书单更好的发展下去！</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="books">
        <div class="books-wrap">
            <div class="books-top">
                <p><span>当前位置:</span><a href="{{url('/')}}">首页</a><span>>></span><span class="books-top-name">书单广场</span></p>
            </div>
            <div class="kong">
                <div class="books-content">
                    <div class="book-content-title">
                        <div></div>
                        <div id="s-i"></div>
                        <div class="titleh3"><h2>书单广场</h2></div>
                        {{--<div><div class="button">我来创书单</div></div>--}}
                        <div><a href="{{url('person')}}" class="button">我来创书单</a></div>
                        <div class="titles">
                            <span><a href="{{url('book_lists1')}}/1">最新</a></span>
                        </div>
                        <div class="titlem">
                            <span><a href="{{url('book_lists1')}}/6">最热</a></span>
                        </div>
                    </div>
                    <div class="books-c">

                        <ul class="col-x">
                            @foreach($list as $v)
                                <li class="col">
                                    <div class="col-img">
                                        {{--<div><a href="{{url('book_detail')}}"><img src="/static/images/book01.0.jpg"  alt=""></a></div>--}}
                                        <div><a href="{{url('book_detail',['id'=>$v->book_id])}}"><img src="/static/images/book01.0.jpg"  alt=""></a></div>
                                        <div class="col-img-n">
                                            <a href="" class="name">把这瓶开了</a>

                                            <span>1个小时前</span>
                                        </div>
                                    </div>
                                    <div class="col-c">
                                        <h4><a href="{{url('book_detail')}}">{{$v->book_name}}</a></h4>
                                        <p>{{$v->remark}}</p>
                                        <div class="col-f">
                                            <a href="" class="i-z" style="min-width: 61px">
                                                <span class="ii ii-z" id="{{$v->book_id}}">
                                                </span>
                                                <span>{{$v->click}}</span>
                                            </a>
                                            <span class="foo">|</span>
                                            <a href="" class="i-c">
                                                <span class="ii ii-c"></span>
                                                <span>0</span></a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="books-footer">
                <div id="pagination">
                    {!! $list->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('Home.Common.footer')
</body>
</html>
<script type="text/javascript">
    $('.ii-z').click(function () {
        var id = this.id;
//            console.log(id);
        $.post('{{url('click')}}',{id:id},function (e) {
//            console.log(e);
        });
    })
</script>