<!DOCTYPE html>
<html>
<head>
    <title>Kindle书单</title>
    <link rel="stylesheet" type="text/css" href="/static/css/stylebook.css">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css">
    @include('Home.Common.head')
    <style>
        #nav-li-zl {
            display: none;
        }
    </style>
</head>
<body>
@include('Home.Common.nav')

<div id="content">
    @include('Home.Common.tips')

    <div id="books">
        {{--最新图书--}}
        <div class="books-wrap">
            <div class="books-top">
                <h1>最新图书</h1>
                <a href="{{url('book_lists1')}}">查看更多>></a>
            </div>
            <div id="books-contentsm">
                <div id="books-cardslist">
                    @foreach($data as $v)
                        @if($v->type == 1 )
                            <div class="col">
                                <div class="col-box">
                                    <div class="col-img">
                                        <a href="" class="col-a" id="{{$v->book_id}}">{{$v->cate_name}}</a>
                                        <a href="{{url('book_detail',['id'=>$v->book_id])}}"><img
                                                    src="{{$v->thumb}}"></a>
                                    </div>
                                    <h3>{{$v->book_name}}</h3>
                                    <p>作者:
                                        <a href="" class="names">{{$v->author}}</a>
                                        <br>格式:
                                        <a href="">{{$v->format}}</a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        {{--右边栏--}}
        <aside class="sidebar">
            <div class="sidebar-two">
                <ul class="i">
                    <li class="i-1">
                        <div class="sidebar-two-box">
                            <div class="sidebar-two-i">
                                <span></span>
                            </div>
                            <div class="sidebar-two-content">
                                <img src="/static/images/weixin.jpg">
                            </div>
                        </div>
                        <div class="sidebar-two-box">
                            <div class="sidebar-two-i">
                                <span></span>
                            </div>
                            <div class="sidebar-two-content">
                                <img src="/static/images/weixin.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="i-2">
                        <div class="sidebar-two-box">
                            <div class="sidebar-two-i">
                                <span></span>
                            </div>
                            <div class="sidebar-two-content">
                                <img src="/static/images/qq.jpg">
                            </div>
                        </div>
                        <div class="sidebar-two-box">
                            <div class="sidebar-two-i">
                                <span></span>
                            </div>
                            <div class="sidebar-two-content">
                                <img src="/static/images/qq.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="i-3" style="border:none;">
                        <div class="sidebar-two-box">
                            <div class="sidebar-two-i">
                                <span></span>
                            </div>
                            <div class="sidebar-two-content">
                                <img src="/static/images/weibo.jpg">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            {{--登录--}}
            @if(empty($nickname))
                <div class="sidebar-entry">
                    <h1>登录是一种态度</h1>
                    <div class="entry-button">
                        <a href="{{url('login')}}"> <input type="button" name="登录" id="" value="登录"></a>
                        <a href="{{url('register')}}"><input type="button" name="注册" id="" value="注册"></a>
                    </div>
                </div>
            @else
                <div class="sidebar-entry" >
                    <h1>用户: <span id="nick"> {{$nickname}}</span></h1>
                    <div class="entry-button-user" id="">
                        <a href="{{url('person')}}"><input type="button" name="个人中心" id="" value="个人中心"></a>
                        <a href="exit"><input type="button" name="退出" id="" value="退出"></a>
                    </div>
                </div>
            @endif
                {{--推送服务,精品图书--}}
                <div class="sidebar-tui">
                    <a href="https://push.bookfere.com" class="tui-t"></a>
                    <a href="https://bookfere.com/share" class="tui-b"></a>
                </div>
                <div class="Kindle">
                    <h1>Kindle 内容管理</h1>
                    <ul id="Kindle-box">
                        @foreach($arr as $kd)
                            <li class="Kindle-content">
                                <a href="{{$kd->href}}"
                                   style="padding: 0px;background-image: url('{{$kd->url}}');">{{$kd->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="goodwill">
                    <div class="goodwill-speedbar">
                        <div class="goodwill-toptip">
                            <ul>
                                <li><span>[匿名]</span><span>10000$</span><span>2017-11-28</span></li>
                                <li><span>[匿名]</span><span>20000$</span><span>2017-11-30</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="goodwill-ai">
                        <span>让金钱为有意义的事出一份力：</span><a href="">立即捐助 >></a>
                    </div>
                </div>
        </aside>
    </div>
    {{--书单广场--}}
    <div id="books-two">
        <div class="books-wrap">
            <div class="books-two-top">
                <div class="books-two-top-left">
                    <h1>书单广场</h1>
                    <a href="{url('book_lists')}}">查看更多>></a>
                </div>
                <div class="books-two-top-right">
                    <ul>
                        <li id="d1"></li>
                        <li id="d2"></li>
                        <li id="d3"></li>
                    </ul>
                </div>
            </div>
            <div id="books-two-contentsm">
                <div id="books-two-cardslist">
                    @foreach($datas as $k)
                        <div>
                            <div class="btc1" style="padding: 20px">
                                <div class="btc1-box">
                                    <div class="btc1-left">
                                        <img src="{{$k->thumb}}">
                                    </div>
                                    <div class="btc1-right btc1-right02">
                                        <h1>{{$k->book_name}}</h1>
                                        <p class="remark">
                                            @if(mb_strlen($k->remark, 'UTF-8') > 40)
                                                {{mb_substr($k->remark, 0, 40, 'UTF-8').'......'}}
                                            @else
                                                {{$k->remark}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{--精品图书--}}
    <div id="books-three">
        <div class="books-top"><h1>精品图书</h1><a href="{{url('book_cate/{cate_id?}')}}">查看更多>></a></div>
        <div class="books-three-content">
            <aside class="books-three-sidebar">
                <div class="sidebar-top">
                    <div id="s-i"></div>
                    <div id="week"><a>周推榜</a><span></span></div>
                    <div id="month"><a>月推榜</a></div>
                </div>
                {{--周推--}}
                <ol class="sidebar-content" id="sidebar-week">
                    @foreach($data as $v)
                        @if($v->type == 4)
                            <li>
                                <div>
                                    <a href="">{{$v->book_name}}</a>
                                    <p>{{$v->author}}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                {{--月推--}}
                <ol class="sidebar-content" id="sidebar-month">
                    @foreach($data as $v)
                        @if($v->type == 5)
                            <li>
                                <div>
                                    <a href="">{{$v->book_name}}</a>
                                    <p>{{$v->author}}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </aside>
            <div id="books-three-contentsm">
                <div id="books-three-cardslist">
                    @foreach($data as $v)
                        @if($v->type == 3)
                            <div class="col">
                                <div class="col-box">
                                    <div class="col-img">
                                        <a href="" class="col-a" id="{{$v->book_id}}">{{$v->cate_name}}</a>
                                        <a href=""><img src="{{$v->thumb}}"></a>
                                    </div>
                                    <h3>{{$v->book_name}}</h3>
                                    <p>作者:
                                        <a href="" class="names">{{$v->author}}</a>
                                        <br>格式:
                                        <a href="">{{$v->format}}</a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="c"><br></div>
    {{--热门图书--}}
    <div class="c"></div>
    <div id="books-four">
        <div class="books-top"><h1>热门图书</h1><a href="{{url('book_lists1')}}">查看更多>></a></div>
        <div id="books-four-contentsm">
            <div id="books-four-cardslist">
                @foreach($data as $v)
                    @if($v->type == 6)
                        <div class="col">
                            <div class="col-box">
                                <div class="col-img">
                                    <a href="" class="col-a" id="{{$v->book_id}}">{{$v->cate_name}}</a>
                                    <a href=""><img src="{{$v->thumb}}"></a>
                                </div>
                                <h3>把这瓶开了</h3>
                                <p>作者:<a href="" class="names">{{$v->author}}</a><br>格式:<a href="">{{$v->format}}</a>
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="c"><br></div>
    {{--随便看看--}}
    <div id="books-five">
        <div class="books-top"><h1>随便看看</h1><a href="{{url('book_cate')}}">查看更多>></a></div>
        <div id="books-five-contentsm">
            <div id="books-five-cardslist">
                @foreach($data as $v)
                    @if($v->type == 7 )
                        <div class="col">
                            <div class="col-box">
                                <div class="col-img">
                                    <a href="" class="col-a" id="{{$v->book_id}}">{{$v->cate_name}}</a>
                                    <a href=""><img src="{{$v->thumb}}"></a>
                                </div>
                                <h3>{{$v->book_name}}</h3>
                                <p>作者:
                                    <a href="" class="names">{{$v->author}}</a>
                                    <br>格式:
                                    <a href="">{{$v->format}}</a>
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="c"><br></div>
</div>
@include('Home.Common.footer')
</body>
</html>
