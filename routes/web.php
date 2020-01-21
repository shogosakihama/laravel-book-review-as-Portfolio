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

Route::get('/accountDestroy', 'ArticleController@accountDestroy')->name('accountDestroy');


Route::get('/articles','ArticleController@index')->name('article.list');
//ログインに成功した時に表示される
Route::get('/home', 'HomeController@index')->name('home');
//退会する
Route::get('/accountDestroy', 'ArticleController@accountDestroy')->name('accountDestroy');

//投稿したレビューを再び編集する
Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');

//書籍名を検索する
Route::post('/article/getCover','PostController@getCover')->name('article.getCover');
//選択した画像を編集画面にgetで送る。
Route::get('/article/new','ArticleController@create')->name('article.new');
//新規投稿のレビューをデータベースに保存する。
Route::post('/article', 'ArticleController@store')->name('article.store');
//投稿したレビューを表示する。
Route::get('/article/{id}','ArticleController@show')->name('article.show');
//レビューを削除する
Route::delete('/article/{id}','ArticleController@destroy')->name('article.delete');

//必要無さそうだが、消すと何故かshowの方でエラーが出る。放置しても機能に影響無いが、気になる。
Route::get('/article/getCover','PostController@getCover');

///いいね機能

//いいねする
Route::post('/article/{id}/likes','LikeController@store')->name('likes.like');
//いいねを取り消す
Route::delete('/article/{id}/unlikes','LikeController@destroy')->name('likes.unlike');
//ログインしていない状態のユーザーがいいね!ボタンを押すと、ログインへ誘導するフラッシュメッセージを表示する。
Route::post('/article/{id}/showFlash','LikeController@showFlash')->name('likes.showFlash');

Auth::routes();

///TwitterOAuth

// ログインURL
Route::get('auth/twitter', 'TwitterController@redirectToProvider');
// コールバックURL
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
// ログアウトURL
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout');

///お問合わせ(メール送信)

//お問い合わせフォーム
Route::get('/mailForm','ContactController@index')->name('contact');
//送信内容の確認
Route::post('/contact/confirm','ContactController@confirm')->name('confirm');
//送信完了報告
Route::post('/contact/sent','ContactController@sent')->name('sent');

///TwitterOAuth

// ログインURL
Route::get('auth/twitter', 'TwitterController@redirectToProvider');
// コールバックURL
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
// ログアウトURL
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout');



///お問合わせ(メール送信)

//お問い合わせフォーム
Route::get('/mailForm','ContactController@index')->name('contact');
//送信内容の確認
Route::post('/contact/confirm','ContactController@confirm')->name('confirm');
//送信完了報告
Route::post('/contact/sent','ContactController@sent')->name('sent');


//テスト
Route::get('/article/test','ArticleController@test');
