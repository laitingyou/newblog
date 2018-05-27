<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;
class UserController extends Controller
{
    //
    public function getUsers(){
        $users=DB::table('users')->get();

        return Response::json([
            'users'=>$users
        ],200);
    }
}
