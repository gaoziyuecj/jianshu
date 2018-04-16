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

Route::get('/', 'Home\PostController@index');

//==========前端路由管理================
Route::namespace('Home')->group(function () {
    //----用户模块-----
    Route::name('users.')->group(function () {
        //注册页面
        Route::get('/register', 'RegisterController@index');
        //保存注册信息
        Route::post('/register', 'RegisterController@register');
        //登陆页面
        Route::get('/login', 'LoginController@index');
        //保存登陆信息
        Route::post('/login', 'LoginController@login');
        //退出登陆
        Route::get('/logout', 'LoginController@logout');
        //个人设置页
        Route::get('/user', 'UserController@setting');
        //保存个人信息
        Route::post('/user/me/setting', 'UserController@settingStore');

    });

    //----文章模块----
    Route::name('post.')->group(function () {
        //文章列表页Ø
        Route::get('/posts', 'PostController@index')->name('index');
        //创建文章
        Route::get('/posts/create', 'PostController@create')->name('create');
        Route::post('/posts', 'PostController@posts')->name('store');
        //文章详情页
        Route::get('/posts/{post}', 'PostController@show')->name('show');
        //编辑文章
        Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit');
        Route::put('/posts/{post}', 'PostController@update')->name('update');
        //删除文章
        Route::get('/posts/{id}/delete', 'PostController@delete')->name('destroy');
        //图片上传
        Route::post('/posts/image/upload', 'PostController@imageUpload');
    });


});