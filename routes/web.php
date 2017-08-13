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

Route::get('/','GcjsController@index');

/*
 * 工程建设
 * */
Route::get('/gcjs','GcjsController@index');
Route::get('/gcjs_info/{id}','GcjsController@info');

/*
 * 政府采购
 * */
Route::get('/zfcg','ZfcgController@index');
Route::get('/zfcg_info/{id}','ZfcgController@info');


/*
 * 注册
 * */
Route::any('/zhuce','user\ZhuceController@zhuce');
Route::any('/denglu','user\ZhuceController@denglu');
Route::get('/user_list','user\UserController@user_list');
Route::get('/clear','user\UserController@clear');
Route::get('/yanz','user\UserController@clear');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * 留言
 * */

Route::any('/guestbook','user\UserController@guestbook');


//发布新闻

Route::get('/news','NewsController@news');
Route::get('/addnews','user\XinwenController@addnews');
Route::post('/news_action','user\XinwenController@news_action');
Route::get('/news_detail/{id}','NewsController@news_detail');


