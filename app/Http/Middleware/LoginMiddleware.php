<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Redirect;
use Session;
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

        $uid=$request->get('uid');
        $users=Session::get('users');
        $token = Cookie::get("user_token");
//        dd(Session::all(),isset($users[$uid]));
        if($uid&&$users&&$token){
            if(isset($users[$uid]) && $users[$uid]===$token){
                return $next($request);
            }else{
                return Redirect::action('Admin\LoginController@index');
            }
        }else{
            return Redirect::action('Admin\LoginController@index');
        }


    }
}
