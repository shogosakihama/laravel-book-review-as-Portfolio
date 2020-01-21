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
Route::get('/article/new','ArticleController@create')->name('article.new');
Route::post('/article/new','ArticleController@searchCover')->name('article.searchCover');
Route::post('/article', 'ArticleController@store')->name('article.store');


Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
Route::post('/article/update/{id}', 'ArticleController@update')->name('article.update');

Route::get('/article/getCover','ArticleController@getCover')->name('article.getCover');
Route::post('/article/getCover','ArticleController@getCover');

Route::get('/article/test','ArticleController@test');


Route::get('/article/{id}','ArticleController@show')->name('article.show');
Route::delete('/article/{id}','ArticleController@destroy')->name('article.delete');

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
