<div id="header">
    <div id="header-logo">
        <h1></h1>
    </div>
    <div id="nav">
        <ul>
            <li id="" class="nav-li">
                <a href="{{url('/')}}">首页</a>
            </li>
            <li id="" class="nav-li">
                <a href="{{url("book_cate")}}">图书分类</a>
            </li>
            <li id="" class="nav-li">
                <a href="{{url('book_lists')}}">书单广场</a>
            </li>
            <li id="" class="nav-li">
                <a href="{{url('push')}}">推送须知</a>
            </li>
            <li id="" class="nav-li">
                <a href="{{url('prepay')}}" >充值VIP</a>
            </li>
            <li id="personal" class="nav-li">
                <a href="{{url('person')}}" >个人中心</a>
            </li>
            <li id="nav-li">
                <form action="{{url('search')}}" method="post" >
                    {{--<span></span>--}}
                    <button type="submit" style="border: none; background: rgba(74, 74, 74, 0);"><span></span></button>
                    <div id="nav-input">
                        <input type="text" name="search" id="">
                    </div>
                </form>
            </li>

        </ul>
    </div>
</div>