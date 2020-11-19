<?php

namespace App\Http\Middleware;

use Closure;

class restaurant
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
        if(\Auth::guard('restaurants')->check()){
            $request->id=\Auth::guard('restaurants')->user()->id;
        return $next($request);
        }elseif(\Auth::guard('restaurant_emps')->check()){
            $request->id=\Auth::guard('restaurant_emps')->user()->restaurant_id;
    
            return $next($request);
        }else{
            return redirect()->back()->with('AuthLogin','error');

        }
    }
}
