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
Route::group(['middleware'=>['web']], function(){
    //Route::get('/', function () {
      //  return view('welcome');
    //});
    Route::get('/', 'IndexController@index');

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
    Route::get('admin/crypt', 'Admin\LoginController@crypt');
});


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['web', 'admin.login']], function(){
    Route::get('/', 'IndexController@index');
    Route::resource('article', 'ArticleController');
});


//Route::get('user/{id}', 'IndexController@show'
//    
//)->where('id', '[0-9]+');

//Route::get('user', ['as'=>'profile', function(){
//    echo route('profile');
//    return '<h1>命名路由</h1>';
//}]);
//
//Route::get('user', ['as'=>'profile', 'uses'=>'Admin\IndexController@test']);
//
//Route::get('test2', 'Admin\IndexController@test2')->name('test2');
