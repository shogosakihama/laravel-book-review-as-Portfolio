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
    return redirect('/articles');
});

//初期画面。レビューのリスト。
Route::get('/articles','ArticleController@index')->name('article.list');
//ログインに成功した時に表示される
Route::get('/home', 'HomeController@index')->name('home');
//退会する
Route::get('/accountDestroy', 'ArticleController@accountDestroy')->name('accountDestroy');

//選択した画像を編集画面にgetで送る。
Route::get('/article/new','ArticleController@create')->name('article.new');
//新規投稿のレビューをデータベースに保存する。
Route::post('/article', 'ArticleController@store')->name('article.store');


Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
//必要無さそうだが、消すと何故かshowの方でエラーが出る。放置しても機能に影響無いが、気になる。
Route::get('/article/getCover','ArticleController@getCover');
//書籍名を検索する
Route::post('/article/getCover','ArticleController@getCover')->name('article.getCover');
//投稿したレビューを再び編集する
Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
//@editで編集したデータをポストして保存する
Route::post('/article/update/{id}', 'ArticleController@update')->name('article.update');

//投稿したレビューを表示する。
Route::get('/article/{id}','ArticleController@show')->name('article.show');
//レビューを削除する
Route::delete('/article/{id}','ArticleController@destroy')->name('article.delete');

Auth::routes();


///お問合わせ(メール送信)

//お問い合わせフォーム
Route::get('/mailForm','ContactController@index')->name('contact');
//送信内容の確認
Route::post('/contact/confirm','ContactController@confirm')->name('confirm');
//送信完了報告
Route::post('/contact/sent','ContactController@sent')->name('sent');


//テスト
Route::get('/article/test','ArticleController@test');
