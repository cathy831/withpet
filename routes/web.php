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

// web.phpの01を消したらbladeのa.hrefタグの変更、コントローラーのリダイレクトの部分

Route::get('/top','SpotController@index', );
//スポットの表示
//検索したい条件をデータベースに送って表示もする

Route::get('/spot/{spot}', 'SpotController@show');
//スポットの詳細表示

Route::get('/store', 'SpotController@create');
//スポット新規投稿の画面表示
Route::post('/top', 'SpotController@store');
//スポット投稿の実行

Route::get('/update/{spot}', 'SpotController@edit');
//スポット投稿更新の画面表示
Route::put('/spot/{spot}', 'SpotController@update');
//スポット投稿更新の実行

Route::delete('/spot/{spot}', 'SpotController@delete');
//スポットの削除

Route::get('/review/{spot}', 'ReviewController@index');
//スポットのクチコミの投稿画面
Route::post('/spot/{spot}', 'ReviewController@store');
//スポットのクチコミの保存

Route::get('/myreview','ReviewController@show', );
//自分の投稿済みレビューを見る(まだユーザーまで紐付けられてない)

Route::delete('/review/{review}', 'ReviewController@delete');
