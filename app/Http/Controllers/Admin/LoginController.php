<?php

namespace App\Http\Controllers\Admin;
use App\Model\User;
use Session;
use Response;
use Redirect;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;

class LoginController extends Controller
{
    /**
     * 登录页面
     */
    public function index(){
//            echo htmlentities($demo, ENT_QUOTES, 'UTF-8');
        return view('admin/login');
    }
    /**
     * 登录
     */
    public function login(Request $request){

        $name=$request->userName;
        $password=$request->password;
        $users = User::where([
            ['user_name', '=', $name],
            ['user_password', '=', $password],
        ])->get()->toArray();

        if(count($users)){
            $token=uniqid();
            Session::put('users.'.$users[0]['uid'],[$name,$token]);
            Session::save();
            return Response::json([
                'msg' => '登录成功',
                'code'=>200,
                'uid' =>$users[0]['uid']
            ])->cookie('user_token', $token ,10);
        }else {
            return Response::json([
                'msg' => '密码错误',
                'code'=>400
            ]);
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
    public function forget(Request $request){
//        for ($i=0;$i<5;$i++){
            $code=rand(1000,9999);
            Mail::to('laitingyou@outlook.com')->send(new OrderShipped($code));
//        }

        if(count(Mail::failures())<1){
            return Response::json([
                'msg' => '发送邮件成功，请查收！',
                'code'=>200
            ],200);
        }else{
            return Response::json([
                'msg' => '发送邮件失败，请重试！',
                'code'=>400
            ]);
        }
    }
}
