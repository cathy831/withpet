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


// web.phpの01を消したらbladeのa.hrefタグの変更、コントローラーのリダイレクトの部分を変更
Route::get('/top','SpotController@index');
//スポットの表示
//検索したい条件をデータベースに送って表示もする

Route::get('/spot/{spot}', 'SpotController@show');
//スポットの詳細表示

Route::get('/newuser', 'UserController@create');
//ユーザー新規登録画面の表示
Route::post('/top', 'UserController@store');
//ユーザー新規登録の保存




Route::group(['middleware' => ['auth']], function(){
// //ログインユーザーのみ使える機能

Route::get('/store', 'SpotController@create');
//スポット新規投稿の画面表示
Route::post('/top', 'SpotController@store');
//スポット投稿の保存

Route::get('/update/{spot}', 'SpotController@edit');
//スポット投稿更新の画面表示
Route::put('/spot/{spot}', 'SpotController@update');
//スポット投稿更新の保存

Route::delete('/spot/{spot}', 'SpotController@delete');
//スポットの削除

Route::get('/review/create/{spot}', 'ReviewController@add');
//レビューの新規投稿の画面表示
Route::post('/review/{spot}', 'ReviewController@store');
//レビューの新規投稿の保存

Route::get('/review/{review}', 'ReviewController@index');
//投稿済みレビューの編集の画面表示
Route::put('/review/{review}', 'ReviewController@create');
//投稿済みレビューの編集の保存

Route::get('/myreview','UserController@index');
//自分の投稿済みレビュー一覧を見る

Route::delete('/review/{review}', 'ReviewController@delete');
//レビューの削除

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
