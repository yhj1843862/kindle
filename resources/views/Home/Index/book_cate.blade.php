<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kindle书单(图书分类)</title>
    <link rel="stylesheet" type="text/css" href="/static/css/stylebookclass.css">
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/js/js.js"></script>
    <link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
@include('Home.Common.nav')

<div id="content">
    @include('Home.Common.tips')

    <div id="contents">
        <div class="sidebar">
            @foreach($list1 as $v1)
                <ul>
                    <li>
                        <div class="wrap">
                            <a href="{{url('book_cate')}}/{{$v1->cate_id}}">{{$v1->cate_name}}</a></div>
                    </li>
                </ul>
            @endforeach
        </div>
        <div class="books">
            <div class="books-content">
                @foreach($list as $v)
                    <div class="book">
                        <div class="book-box">
                            <div class="book-img">
                                <a href="{{url('book_detail',['id'=>$v->book_id])}}"><img src="{{$v->thumb}}"></a>
                            </div>
                            <div class="book-content">
                                <a href="{{url('book_detail',['id'=>$v->book_id])}}">{{$v->book_name}}</a>
                                <div class="book-content-star">
                                    <div class="star">
                                        <div class="star01"></div>
                                    </div>
                                    <span>(7.4)</span>
                                </div>
                                <p>知乎</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="book">
                    <div class="book-box">
                        <div class="book-img">
                            <a href="{{url('book_detail',['id'=>$v->book_id])}}"><img src="/static/images/book01.0.jpg"></a>
                        </div>
                        <div class="book-content">
                            <a href="{{url('book_detail',['id'=>$v->book_id])}}">知乎一小时「补课系列」套装</a>
                            <div class="book-content-star">
                                <div class="star">
                                    <div class="star01"></div>
                                </div>
                                <span>(7.4)</span>
                            </div>
                            <p>知乎</p>
                        </div>
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