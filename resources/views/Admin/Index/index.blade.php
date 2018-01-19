<!DOCTYPE HTML>
<html>
@include('Admin.Common.header')
<body>
<div class="navbar navbar-fixed-top">
    <div class="container-fluid cl">
        <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/">Kindle管理系统</a>
        <span class="logo navbar-slogan f-l mr-10 hidden-xs">v0.1</span>
        <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
            <ul class="cl">
                <li style="min-width: 110px">{{$user_info['role_name']}}</li>
                <li class="dropDown dropDown_hover">
                    <a href="#" class="dropDown_A">{{$user_info['nickname']}} <i class="Hui-iconfont">&#xe6d5;</i></a>
                    <ul class="dropDown-menu menu radius box-shadow">
                        <li><a href="javascript:;" onClick="">个人信息</a></li>
                        <li><a href="{{url('logout')}}">退出</a></li>
                    </ul>
                </li>
                <li id="Hui-msg">
                    <a href="#" title="消息">
                        <span class="badge badge-danger">1</span>
                        <i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i>
                    </a>
                </li>
                <li id="Hui-skin" class="dropDown right dropDown_hover">
                    <a href="javascript:;" class="dropDown_A" title="换肤">
                        <i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i>
                    </a>
                    <ul class="dropDown-menu menu radius box-shadow">
                        <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                        <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                        <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                        <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                        <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                        <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-member">
            <dt>
                <i class="Hui-iconfont">&#xe60d;</i> 用户管理
                <i class="Hui-iconfont menu_dropdown-arrow Hui-iconfont-arrow2-bottom"></i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="{{url('listK')}}/id" data-title="用户列表" href="javascript:void(0)">用户列表</a>
                        <a data-href="{{url('admin_list')}}" data-title="管理员列表" href="javascript:void(0)">管理员列表</a>
                        <a data-href="{{url('add_admin')}}" data-title="添加管理员" href="javascript:void(0)">添加管理员</a>
                        <a data-href="{{url('power_lists')}}" data-title="权限管理" href="javascript:void(0)">权限管理</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-role">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 会员管理<i
                        class="Hui-iconfont menu_dropdown-arrow Hui-iconfont-arrow2-bottom"></i></dt>
            <dd>
                <ul>
                    <li><a data-href="{{url('add_vip')}}" data-title="添加会员" href="javascript:void(0)">添加会员</a></li>
                    <li><a data-href="{{url('vip_lists')}}" data-title="会员列表" href="javascript:void(0)">会员列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-duty">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 积分管理<i
                        class="Hui-iconfont menu_dropdown-arrow Hui-iconfont-arrow2-bottom"></i></dt>
            <dd>
                <ul>
                    <li><a data-href="{{url('score_lists')}}" data-title="积分列表" href="javascript:void(0)">积分列表</a></li>

                </ul>
            </dd>
        </dl>

        <dl id="menu-duty">
            <dt>
                <i class="Hui-iconfont">&#xe720;</i> 书籍管理
                <i class="Hui-iconfont menu_dropdown-arrow Hui-iconfont-arrow2-bottom"></i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="{{url('bookadd')}}" data-title="添加书籍" href="javascript:void(0)">添加书籍</a>
                        <a data-href="{{url('booklist')}}" data-title="书籍列表" href="javascript:void(0)">书籍列表</a>
                        <a data-href="{{url('booksort')}}" data-title="类目列表" href="javascript:void(0)">类目列表</a>
                    </li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-duty">
            <dt>
                <i class="Hui-iconfont">&#xe687;</i> 订单管理
                <i class="Hui-iconfont menu_dropdown-arrow Hui-iconfont-arrow2-bottom"></i>
            </dt>
            <dd>
                <ul>
                    <li>
                        <a data-href="{{url('order_lists')}}" data-title="订单列表" href="javascript:void(0)">订单列表</a>

                    </li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs">
    <a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面">我的桌面</span>
                    <em></em>
                </li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group">
            <a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d4;</i>
            </a>
            <a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
                <i class="Hui-iconfont">&#xe6d7;</i>
            </a>
        </div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="{{url('welcome')}}"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前</li>
        <li id="closeall">关闭全部</li>
    </ul>
</div>
@include('Admin.Common.footer')
</body>
</html>