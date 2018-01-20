<?php

namespace App\Http\Middleware;

use Closure;

class HomeSessionJudge
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
        if (!session('user_info'))
        {
            return redirect('login');
        }
        return $next($request);
    }
}
