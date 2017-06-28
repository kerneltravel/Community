<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>'auth'], function (){
    /*
     * 发表帖子
     */
    Route::get('discussion/create','PostsController@create');
    Route::post('discussion/create','PostsController@store');
    /*
     * 编辑帖子
     */
    Route::get('discussion/edit/{id}','PostsController@update');
    Route::post('discussion/edit/{id}','PostsController@save');
    /*
     * 用户修改密码
     */
    Route::get('user/change_password', 'UsersController@editPwd');
    Route::post('user/change_password', 'UsersController@updatePwd');
    /*
     * 发表评论
     */
    Route::post('comment', 'CommentsController@store');
});
/*
 * 首页帖子列表
 */
Route::get('/', 'PostsController@index');
Route::get('discussion','PostsController@index');

/*
 * 查看帖子
 */
Route::get('discussion/{id}','PostsController@show');
/*
 * 邮件发送demo
 */
Route::get('mail/send','MailController@send');
/*
 * 用户注册
 */
Route::get('user/register', 'UsersController@register');
Route::post('user/register', 'UsersController@store');
Route::get('user/register/confirm/{confirm_code}', 'UsersController@confirm');
Route::get('user/register/welcome', 'UsersController@welcome');
/*
 * 用户登录
 */
Route::get('user/login', 'UsersController@login');
Route::post('user/login', 'UsersController@signIn');
Route::get('user/logout', 'UsersController@logout');

/*
 * 重置密码页面
 */
Route::get('user/rest', 'UsersController@getEmail');
Route::post('user/rest', 'UsersController@postEmail');
/*
 * 密码重置路由
 */
Route::get('user/password/rest/{token}', 'UsersController@getReset');
Route::post('user/password/rest', 'UsersController@postReset');

/*
 * 修改头像
 */
Route::get('user/avatar', 'UsersController@avatar');
Route::post('user/avatar', 'UsersController@avatar');
