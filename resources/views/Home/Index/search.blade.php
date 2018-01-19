<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kindle书单</title>
    <link rel="stylesheet" type="text/css" href="/static/css/stylebook.css">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css">
    @include('Home.Common.head')

</head>
<body>
@include('Home.Common.nav')
<div id="content">
    @include('Home.Common.tips')

    <div id="books">
        <div class="books-wrap">
            <div class="books-top"><h1>随便看看</h1><a href="">查看更多>></a></div>
            <div id="books-contentsm">
                <div id="books-cardslist">
                    @foreach($info as $v)
                        <div class="col">
                            <div class="col-box">
                                <div class="col-img">
                                    <a href="" class="col-a" id="{{$v->book_id}}"></a>
                                    <a href="{{url('book_detail',['id'=>$v->book_id])}}"><img src="{{$v->thumb}}"></a>
                                </div>
                                <h3>{{$v->book_name}}</h3>
                                <p>作者:
                                    <a href="" class="names">{{$v->author}}</a>
                                    <br>格式:
                                    <a href="">{{$v->format}}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('Home.Common.footer')
</body>
</html>