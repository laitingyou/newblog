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
        $path=$request->path();
        $is_api=preg_match('/^api\//',$path);
        $uid=$request->get('uid');
        $users=Session::get('users');
        $token = Cookie::get("user_token");
//        dd($users);
        if($uid&&$users&&$token){
            if(isset($users[$uid]) && $users[$uid][1]===$token){
                return $next($request);
            }else{
                if($is_api){
                    return response()->json(['msg' => '未登录', 'code' => '700']);
                }else {
                    return Redirect::action('Admin\LoginController@index');
                }
            }
        }else{
            if($is_api){
                return response()->json(['msg' => '未登录', 'code' => '700']);
            }else {
                return Redirect::action('Admin\LoginController@index');
            }
        }


    }
}
