<?php

namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request){

        return view('admin/home')->with(['uid'=>$request->get('uid')]);
    }
}
