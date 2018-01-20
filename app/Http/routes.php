<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * ==================================================================
 * ===========================前端页面部分=============================
 * ==================================================================
 */
Route::group(['namespace' => 'Home'], function () {

    //登录
    Route::any('login', 'Sign\Sign@login');
    //注册
    Route::any('register', 'Sign\Sign@register');
    //首页
    Route::get('/', 'Index\Index@index');
    //搜索
    Route::any('search', 'Index\search@search');
    Route::get('index', 'Index\Index@index');
    //退出
    Route::any('exit', 'Sign\Sign@logout');
    //协议
    Route::any('agreement', function () {
        return view('Home/pay/agreement');
    });
    //下载协议
    Route::get('download', function () {
        return response()->download(storage_path('app/photo/agreement.blade.php'), 'agreement.blade.php');
    });
    //图书分类
    Route::any('book_cate/{cate_id?}', 'Index\bookcateController@lists1');
    //图书广场
    Route::any('book_lists', 'Index\booklistsController@lists');
    Route::any('book_lists1/{id?}', 'Index\booklistsController@lists1');
    //书籍详情页面
    Route::any('book_detail/{id?}', 'Index\bookdetailController@detail');
    //收藏按钮
    Route::any('collect', 'Index\bookdetailController@collect');
    //推送须知
    Route::any('push', 'Index\push@push');
    //点赞
    Route::any('click', 'Index\booklistsController@click');
    //vip充值
    Route::any('prepay', 'pay\pay@prepay');
    Route::any('pay/{id?}', 'pay\pay@pay');
    //支付宝支付处理
    Route::any('webNotify', 'pay\pay@webNotify');
    Route::any('webReturn', 'pay\pay@webReturn');
});
Route::group(['namespace'=>'Home', 'middleware'=>'home.session'], function (){
    //个人中心
    Route::any('person', 'Personal\personal@person');
});
//验证码
Route::get('captcha/{tmp}', 'Home\Sign\Sign@captcha');
//验证验证码
Route::any('do_verify', 'Home\Sign\Sign@do_verify');
Route::any('test', function () {
    return view('Home/Sign/test');
});
/**
 * ================================================================
 */

/**
 * ============================= 整合部分 ===========================
 */

Route::group(['namespace' => 'Admin'], function () {

    //后台登录
    Route::any('adminlogin', 'Sign\LoginController@login');
    //退出登录
    Route::get('logout', 'Sign\LoginController@logout');
});

Route::group(['namespace'=>'Admin', 'middleware'=>'admin.session'], function () {
    //后台首页
    Route::get('admin', 'Index\Index@index')->middleware('test_mid');
    Route::get('welcome', function () {
        return view('Admin/Index/welcome');
    });


    //用户列表
    Route::any('listK/{id}', 'User\User@lists');
    Route::any('del/{id}', 'User\User@del');
    //管理员列表
    Route::any('admin_list', 'admin\AdminController@admin_list');
    Route::any('del/{id}', 'admin\AdminController@del');
    //添加管理员
    Route::any('add_admin', 'admin\AdminController@add_admin');
    //权限管理
    Route::any('power_lists', 'Power\PowerController@power_lists');
    Route::any('role_node/{id}', 'Power\PowerController@role_node');
    Route::any('add_node', 'Power\PowerController@add_node');
    //积分列表
    Route::any('score_lists', 'Score\ScoreController@lists');
    //书籍添加
    Route::any('bookadd', 'book\BookaddController@Bookadd');
    //书籍列表
    Route::any('booklist', 'book\BooklistController@Booklist');
    //书籍编辑
    Route::any('bookedit/{id}', 'book\BookaddController@Bookedit');
    //书籍删除
    Route::get('bookdel/{id}', 'book\BookaddController@Bookdel');
    //书籍分类
    Route::any('booksort', 'book\BooksortController@Booksort');
    //添加类目
    Route::any('sortadd', 'book\BooksortController@Sortadd');
    //类目删除
    Route::get('sortdel/{id}', 'book\BooksortController@Sortdel');
    //订单列表
    Route::any('order_lists', 'Order\OrderController@order_lists');
    Route::any('order_del/{id}', 'Order\OrderController@order_del');
});

/**
 * ================================================================
 */
