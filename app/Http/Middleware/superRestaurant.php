<?php

namespace App\Http\Middleware;

use Closure;

class superRestaurant
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
               
        if(\Auth::guard('users')->user()->is_super == 1){
            return $next($request);
        }else{
            \Notify::error(' عير مصرح غير للادمن فقط', 'غير مصرح');
            return redirect()->back();
        }
    }
}
