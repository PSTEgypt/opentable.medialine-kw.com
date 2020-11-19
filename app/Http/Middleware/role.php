<?php

namespace App\Http\Middleware;

use Closure;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  Array  [section name , role name]
     * @return mixed
     */
    public function handle($request, Closure $next,...$param)
    {
        $user=\Auth::guard('web')->user()->permissions;

        $permissions=json_decode($user);

        $sectionName=$param[0];

        $role=$param[1];
        
        if(\Auth::guard('web')->user()->is_admin == 0){
            if($permissions->$sectionName->$role == 1){
                return $next($request);
            }else{
                \Notify::error('غير مصرح بدخول  القسم يرجي التواصل مع الادمن لتعديل الصلاحية ', 'غير مصرح');
                return redirect()->back();
            }
        }else{
            return $next($request); 
        }


        if(\Auth::guard('restaurant_emps')->user()->is_admin == 0){
            if($permissions->$sectionName->$role == 1){
                return $next($request);
            }else{
                \Notify::error('غير مصرح بدخول  القسم يرجي التواصل مع الادمن لتعديل الصلاحية ', 'غير مصرح');
                return redirect()->back();
            }
        }else{
            return $next($request); 
        }

    }
}
