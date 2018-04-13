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
Route::get('/index', 'Home\PostController@index');

//==========前端路由管理================
Route::namespace('Home')->group(function () {
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