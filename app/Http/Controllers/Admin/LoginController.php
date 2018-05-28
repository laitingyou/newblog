<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use Response;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 登录页面
     */
    public function index(){
            $demo= '<script>alert(123)</script>';
//            echo htmlentities($demo, ENT_QUOTES, 'UTF-8');
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
            Session::put('users.'.$users_array[0]['uid'],[$name,$password]);
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
    }

    /**
     * 登出
     */
    public function loginOut(Request $request){
        $uid=$request->get('uid');
        $request->session()->forget('users.'.$uid);
        return Redirect::to('/admin/index');
    }
}
