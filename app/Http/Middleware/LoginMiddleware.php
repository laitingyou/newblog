<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Redirect;
class LoginMiddleware
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
        $token = Cookie::get("TOKEN");
        if(isset($token)){
            return $next($request);
        }else{
            return Redirect::action('Admin\LoginController@login',["path" =>12313]);
        }

    }
}
