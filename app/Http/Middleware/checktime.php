<?php

namespace App\Http\Middleware;

use Closure;

class checkTime
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
        $t = strtotime("now");
        $j = strtotime("09:00:00");
        $s = strtotime("17:00:00");
        if($j>$t || $t>$s){
            echo "<script>alert('请在早上09:00-17:00之间修改');location.href='http://qwe.xxoo.com/admin/goodsList';</script>";
        }
        return $next($request);
    }
}
