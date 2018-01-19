<!doctype html>
<html lang="zh">
<head>
    @include('Home.Common.head')
    <title>Kindle书单 - 个人中心</title>
    <link rel="stylesheet" type="text/css" href="/static/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/default.css">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css">
    <link rel="stylesheet" href="/static/css/userstyle.css">
    <link href="/static/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        #nav-li{
            display: none;
        }
    </style>
</head>
<body>
@include('Home.Common.nav')

<div class="htmleaf-container">
    <header class="htmleaf-header"></header>
    <div class="container pb30">
        <div class="clear-backend">
            <div class="avatar">
                <div>
                    <a href="" target="_blank">
                        <!--<img src="img/weixin.jpg" alt="">-->
                    </a>
                </div>
            </div>
        {{--左边栏导航--}}
        <!-- tab-menu -->
            <input type="radio" class="tab-1" name="tab">
            <span>个人信息</span><i class="fa fa-user"></i>

            <input type="radio" class="tab-2" name="tab">
            <span>我的收藏</span><i class="fa fa-star"></i>

            <input type="radio" class="tab-3" name="tab">
            <span>我的书单</span><i class="fa fa-address-book"></i>

            <input type="radio" class="tab-4" name="tab">
            <span>推送记录</span><i class="fa fa-location-arrow"></i>

            <input type="radio" class="tab-5" name="tab">
            <span>下载记录</span><i class="fa fa-cloud-upload"></i>

            <input type="radio" class="tab-6" name="tab">
            <span>账号管理</span><i class="fa fa-cog"></i>

            <!-- tab-top-bar -->
            <div class="top-bar">
                <ul>
                    <li>
                        <a href="{{url('exit')}}" title="Log Out">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>

                </ul>
            </div>

            <!-- tab-content -->
            <div class="tab-content">
                <section class="tab-item" id="tab-item-0">
                    <h2>欢迎来到Kindle书单个人中心,<br>感谢主人您对小K的不离不弃!<br>小K会更努力的给主人提供更好服务的,<br> 么么哒~</h2>
                </section>
                <section class="tab-item-1">
                    <ul id="t-1-c">
                        <li><span class="t-1-l">帐号:</span><span class="t-s-r">{{$data['email']}}</span> <a href="">({{$data['role_name']}})</a></li>
                        <li><span class="t-1-l">昵称:</span><span class="t-s-r">{{$data['nickname']}}</span></li>
                        <li><span class="t-1-l">推送邮箱:</span><span class="t-s-r">{{$data['d_email']}}</span></li>
                        <li><span class="t-1-l">发信邮箱:</span><span class="t-s-r">{{$data['k_email']}}</span><br><h6>(需要把上面邮箱在亚马逊网站加入白名单否则无法收到推送的图书)</h6></li>
                        <li id="foo"><h1>……</h1><h5>|</h5></li>
                    </ul>
                </section>

                <section class="tab-item-2">

                    <div id="t-2-c">
                        @foreach($info as $v)
                            <div class="t-2-col">
                                <div class="t-2-t">
                                    <img src="/static/images/book01.0.jpg" alt="">
                                </div>
                                <div class="t-2-f">
                                    <div class="t-2-f-t">
                                        <p><span>书名:</span><a href="">{{$v->book_name}}</a></p>
                                        <p><span>作者:</span>{{$v->author}}</p>
                                    </div>
                                    <div class="t-2-f-f">
                                        <span><a href="">推送</a></span>
                                        <span>|</span>
                                        <span><a href="">取消</a></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="books-footer">
                        <div class="pagination">
                            {!! $page->links() !!}
                        </div>
                    </div>
                </section>

                <section class="tab-item-3">
                    <div id="t-3-c">
                        <div class="t-3-col">
                            <div class="t-3-t">
                                <img src="/static/images/book01.0.jpg" alt="">
                            </div>
                            <div class="t-3-f">
                                <div class="t-3-f-t">
                                    <p><span>书名:</span><a href="">干了这一杯</a></p>
                                    <p><span>作者:</span>歪哥</p>
                                </div>
                                <div class="t-3-f-f">
                                    <span><a href="">推送</a></span>
                                    <span>|</span>
                                    <span><a href="">取消</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="books-footer">
                        <div class="pagination">
                            <ul>
                                <li class="active"><span>1</span></li>
                                <li>
                                    <a href='https://sokindle.com/page/2'>2</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/3'>3</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/4'>4</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/5'>5</a>
                                </li>
                                <li class="p-mroe"><span> ... </span></li>
                                <li class="next-page">
                                    <a href="https://sokindle.com/page/2">下一页</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="tab-item-4">
                    <div class="table-c">
                        <table>
                            <tr class="table-title">
                                <td class="t-t-n">书名</td>
                                <td class="t-t-t">日期</td>
                                <td class="t-t-p">操作</td>
                            </tr>
                            <tr class="table-content">
                                <td class="t-t-n">再来一杯</td>
                                <td class="t-t-t">2018-01-08</td>
                                <td class="t-t-p"><span><a href="">推送</a></span><span>|</span><span><a href="">删除</a></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="books-footer">
                        <div class="pagination">
                            <ul>
                                <li class="active"><span>1</span></li>
                                <li>
                                    <a href='https://sokindle.com/page/2'>2</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/3'>3</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/4'>4</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/5'>5</a>
                                </li>
                                <li class="p-mroe"><span> ... </span></li>
                                <li class="next-page">
                                    <a href="https://sokindle.com/page/2">下一页</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="tab-item-5">
                    <div class="table-c">
                        <table>
                            <tr class="table-title">
                                <td class="t-t-n">书名</td>
                                <td class="t-t-t">日期</td>
                                <td class="t-t-p">操作</td>
                            </tr>
                            <tr class="table-content">
                                <td class="t-t-n">再来一杯</td>
                                <td class="t-t-t">2018-01-08</td>
                                <td class="t-t-p"><span><a href="">推送</a></span><span>|</span><span><a href="">删除</a></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="books-footer">
                        <div class="pagination">
                            <ul>
                                <li class="active"><span>1</span></li>
                                <li>
                                    <a href='https://sokindle.com/page/2'>2</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/3'>3</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/4'>4</a>
                                </li>
                                <li>
                                    <a href='https://sokindle.com/page/5'>5</a>
                                </li>
                                <li class="p-mroe"><span> ... </span></li>
                                <li class="next-page">
                                    <a href="https://sokindle.com/page/2">下一页</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="tab-item-6">
                    <div id="t-c-6">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td class="t-6-l">昵称</td>
                                    <td>
                                        <input type="text" name="nickname" value="{{$data['nickname']}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="t-6-l">旧密码</td>
                                    <td>
                                        <input type="password"  name="oldpswd">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="t-6-l">新密码</td>
                                    <td><input type="password" name="pswd" ></td>
                                </tr>
                                <tr>
                                    <td class="t-6-l">重新输入密码</td>
                                    <td><input type="password" name="repswd"></td>
                                </tr>
                                <tr>
                                    <td class="t-6-l"></td>
                                    <td id="tj">
                                        <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                                        <input type="submit"  value="修改">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('Home.Common.footer')
</div>
</body>
</html>