<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware'=>['login']], function(){
   Route::get('/home',"IndexController@index");



});
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function(){

    Route::get('/index',"LoginController@index");
    Route::get('/loginOut',"LoginController@loginOut");

});
