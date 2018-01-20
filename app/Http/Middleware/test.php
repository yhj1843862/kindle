<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class test
{
    /**
     * 验证用户是否已经登录，如果没有登录，直接跳转到登录页
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user_info = Session::get('user_info');
        if (!$user_info){
            //验证用户是否已经登录，如果没有登录，直接跳转到登录页
            return redirect('adminlogin');
        }

        return $next($request);
    }
}
