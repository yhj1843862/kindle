<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class AdminsessionJudge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('user_info')) {
            return redirect('adminlogin');
        }
        $userInfo = session('user_info');
//        dump($userInfo);
        if ($userInfo['role'] > 2)
        {
            echo "<script>alert('您没有相应的权限');</script>";
            session(['user_info'=> '']);
            return redirect('adminlogin');
        }
//        dump($userInfo['role']);
        $url= $request->url();
//        dump($url);
        $urlList = explode('/', $url);
//        dump($urlList);
        $locationUrl = DB::select("select `routes` as location from `kd_node` where `id` in (select `node_id` from `kd_role_node` where `role_id` = ". $userInfo['role'] .")");
//        dump($locationUrl);
        $locationList = [];
        foreach ($locationUrl as $k => $v)
        {
//            dump($v);
            $v = get_object_vars($v);
            $locationList[] =  $v['location'];
        }
//        dump($locationList);
//        dump($nodeInfo);
//        dump($node);
//        if (!in_array($urlList['3'],$locationList))
//        {
//            exit("<script>alert('您没有相应的权限');</script>");
//        }
        return $next($request);
    }
}
