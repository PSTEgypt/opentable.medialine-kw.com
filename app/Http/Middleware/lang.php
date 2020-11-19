<?php

namespace App\Http\Middleware;

use Closure;

class lang
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
    
        if(\Request::header('lang')){
            
            $request->lang=\Request::header('lang');
            \App::setLocale(\Request::header('lang'));
            return $next($request);

        }else{
            \App::setLocale('en');
            $request->lang=\App::getLocale();
            return $next($request);

        }
    }
}
