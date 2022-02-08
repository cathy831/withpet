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

Route::get('/top','SpotController@index', );
//スポットの表示
Route::get('/spot/{spot}', 'SpotController@show');
//スポットの詳細表示

Route::get('/01/store', 'SpotController@create');
//スポット新規投稿の画面表示
Route::post('/top', 'SpotController@store');
//スポット投稿の実行

Route::get('/01/update/{spot}', 'SpotController@edit');
//スポット投稿更新の画面表示
Route::put('/spot/{spot}', 'SpotController@update');
//スポット投稿更新の実行