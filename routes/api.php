<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    Route::post('/login', 'LoginController@login');
    Route::get('/getUsers', 'UserController@getUsers');


});
//Route::namespace('Admin')->prefix('admin')->get('/login', 'LoginController@login');