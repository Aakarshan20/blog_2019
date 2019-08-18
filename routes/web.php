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


Route::get('showPassword', 'Admin\LoginController@showPassword');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['web', 'admin.login']], function(){
    Route::get('/', 'IndexController@index');
    Route::get('index', 'IndexController@index');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::get('/index2', 'IndexController@index2');

    Route::post('cate/changeorder', 'CategoryController@changeOrder');

    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');

    Route::resource('links','LinksController');
    Route::post('links/changeorder', 'LinksController@changeOrder');

    //檔案上傳用
    Route::any('upload', 'CommonController@upload');
    //檔案刪除用
    Route::delete('upload', 'CommonController@deleteFile');
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
