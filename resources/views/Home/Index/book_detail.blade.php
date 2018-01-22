<!DOCTYPE html>
<html>
<head>
    <title>Kindle书单(书)</title>
    <link rel="stylesheet" type="text/css" href="/static/css/stylebooks.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/ui/lib/layer/2.4/layer.js"></script>
    <link rel="stylesheet" href="/static/css/style.css">
    <link rel="stylesheet" type="text/css" href="/static/css/stylebook.css">
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
        <div class="books-wrap">
            <div class="books-top">
                <p><span>当前位置:</span><a href="">首页</a><span>>></span>
                    @foreach($list as $v)
                    <a href="" id="books-classname">『{{$v->cate_name}}』</a>
                        <span>>> </span>
                    <span id="books-top-name">{{$v->book_name}}</span></p>
                    @endforeach
            </div>
            {{--书籍名字--}}
            <div class="kong">
                <div class="books-content">
                    {{--书籍模块--}}
                    @foreach($list as $v)
                    <div class="books-box">
                        <div class="books-box-img">
                            <img src="{{$v->thumb}}" alt="">
                        </div>
                        <div class="books-box-content">
                            <div class="books-box-name"><h1>
                                   {{$v->book_name}}
                                </h1></div>
                            <div class="books-box-star">
                                <h3>作者:<span>{{$v->author}}</span></h3>
                                <div class="star star01"></div>
                                <div class="star-fen"> 豆瓣评分: <span>7.6</span></div>
                                <div class="star-ren">分享的人: <span>歪哥</span></div>
                                <div class="star-class">类型: <span>『{{$v->type_name}}』</span><span class="button">分类纠错</span></div>
                            </div>
                            <div class="books-box-tui">
                                <div class="box-tui button">发送到我的kindle</div>
                                <div class="box-shou button" id="collect"><span class="{{$v->book_id}}">收藏</span></div>
                            </div>
                        </div>
                    </div>
                    {{--书籍end--}}
                </div>
                <div class="books-download">
                    <p>推送前请选阅读 <a href="">『推送须知』</a>否则推送后无法收到图书</p>
                    <table>
                        <tr>
                            <td>类型</td>
                            <td>星级</td>
                            <td>评论</td>
                            <td>操作</td>
                        </tr>
                        <tr>
                            <td>{{$v->type_name}}</td>
                            <td>暂无评分</td>
                            <td>暂无评论</td>
                            <td>下载</td>
                        </tr>
                    </table>
                </div>
                <div class="books-upload ">
                    <div class="upload-header">
                        <p>我有更好的版本(mobi|pdf|txt|epub|azw3|azw)</p>
                        <p>每本书最大50M,支持格式(mobi|pdf|txt|epub|azw3|azw)</p>
                    </div>
                    <div class="upload-content">
                        <div class="upload-content-top">
                            <div>图书名</div>
                            <div>大小</div>
                            <div>状态</div>
                        </div>
                        <ul class="upload-user">
                            <li>qqqq</li>
                        </ul>
                        <div class="upload-content-footer upload-content-top">
                            <div class="upload-button">
                                <div class="load button01">添加图书</div>
                                <div class="up button01">开始上传</div>
                            </div>
                            <div>0 b</div>
                            <div>0%</div>
                        </div>
                    </div>
                </div>
                <div class="books-brief">
                    <div class="books-brief-header">
                        <h5>简介</h5>
                        <div id="s-i"></div>
                    </div>
                    <div class="books-brief-content">
                        <section style="display: block;" class="cnt j-cnt">
                            <article >
                                <p>
                                    {{$v->remark}}
                                </p>
                                @endforeach
                            </article>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <!--
            右边栏
        -->
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
            <div class="sidebar-tui">
                <a href="https://push.bookfere.com" class="tui-t"></a>
                <a href="https://bookfere.com/share" class="tui-b"></a>
            </div>
            <div class="Kindle">
                <h1>Kindle 内容管理</h1>
                <ul id="Kindle-box" style="padding-left: 0px">
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
            <section class="u-taglist">
                <div class="u-ttl1"><h3>图书标签</h3></div>
                <ul>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">人文科学</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">经济学</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">文学</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">科学与自然</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">经商</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">网络科技</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">期刊</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">芭莎</a></li>
                    <li><a href="{{url('book_cate/{cate_id?}')}}">历史</a></li>
                </ul>
            </section>
        </aside>
    </div>
</div>
@include('Home.Common.footer')
</body>
</html>
<script type="text/javascript">
    $('.{{$v->book_id}}').click(function () {
        var a = $(this).attr('class');
        console.log(a);
        $.post('{{url('collect')}}',{id:a},function (e) {


            if(e.status == 2){
               layer.msg( e.info, {
                   icon: 5, time:1000
               });
                //跳转登录页
                setTimeout(function () {
                    window.location.href = "{{url('login')}}";
                },1500)
            }
            console.log(e);
            if(e.status == 1){
                //成功
                layer.msg(e.info,{icon: 6});
                console.log(e);
            }
            if(e.status == 0){
                //失败
                layer.msg(e.info,{icon: 5});
                console.log(e);
            }
        });
    })
</script>