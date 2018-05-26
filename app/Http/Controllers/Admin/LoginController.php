<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 登录页面
     */
    public function index(){

        return view('admin/login');
    }
    /**
     * 登录
     */
    public function login(Request $request){
        $name=$request->userName;
        $password=$request->password;
        $users = DB::table('users')->where([
            ['user_name', '=', $name],
            ['user_password', '=', $password],
        ])->get();

        $users_array=json_decode(json_encode($users),true);

        if(count($users_array)){
            Session::push('users.'.$users_array[0]['uid'],$password);
            Session::save();
            return Response::json([
                'msg' => '登录成功',
                'code'=>200,
                'uid' =>$users_array[0]['uid']
            ],200)->cookie('user_token', $password);
        }else {
            return Response::json([
                'msg' => '密码错误',
                'code'=>400
            ],200);
        }
//        Session(['user_token'=>$request->password]);
//        $sessions = Session::get('user_token');
//        dd($sessions);

    }
}
