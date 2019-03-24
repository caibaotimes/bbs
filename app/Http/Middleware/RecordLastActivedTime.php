<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RecordLastActivedTime
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
        //这是前置中间件，在还未进入 $next 之前调用
        //如果是登录用户的话
        if(Auth::check()){
            //记录最后登录时间
            Auth::user()->recordLastActivedAt();
        }
        return $next($request);
    }
}
