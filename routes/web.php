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

    return view('gcjs',['data'=>[]]);
});

/*
 * 工程建设
 * */
Route::get('/gcjs','GcjsController@index');
Route::get('/gcjs_info/{id}','GcjsController@info');

/*
 * 政府采购
 * */
Route::get('/zfcg','ZfcgController@index');
