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

Route::get('/', function () {
    return view('welcome');
});
//后台
route::prefix('admin')->group(function (){
    route::any('index','Admin\AdminController@index')->Middleware('session');
    route::any('wxindex','Admin\AdminController@wxindex')->Middleware('session');
    route::any('wxup','Admin\AdminController@wxup')->Middleware('session');
    route::any('tags','Admin\AdminController@tags')->Middleware('session');
    route::any('sendGroup','Admin\AdminController@sendGroupOpenid')->Middleware('session');
    route::get('menu','MenuController@menu')->Middleware('session');
    route::post('menuAdd','MenuController@menuAdd')->Middleware('session');
    route::get('menulist','MenuController@menulist')->Middleware('session');
    route::any('getmenu/{id}','MenuController@getmenu')->Middleware('session');
    route::any('forbidden/{id}','MenuController@forbidden')->Middleware('session');
   route::any('login','Admin\\LoginController@login');
    route::any('dologin','Admin\\LoginController@dologin');
});
 
//前台
Route::prefix('index')->group(function(){
    Route::any('/add','index\\IndexController@index');
    Route::any('/user','index\\IndexController@user');
    Route::any('/proinfo','index\\IndexController@proinfo');
   });