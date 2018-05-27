<?php

namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request){
        $users=Session::get('users');
        return view('admin/home')->with(
            ['user'=>$users[$request->get('uid')]]
        );
    }
}
