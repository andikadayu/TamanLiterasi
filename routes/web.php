<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
    return redirect('home');
});
Route::get('login', 'HomeController@login')->name('login');
Route::get('logout', 'HomeController@logout')->name('logout');
Route::get('home', 'HomeController@index')->name('home');
Route::post('update-profile', 'HomeController@update_profile')->name('update_profile');

Route::get('article', 'BlogController@viewBlog')->name('blogs');
Route::get('article/{detail}', 'BlogController@detailBlog')->name('detail_blogs');
Route::post('article/comment', 'BlogController@comment_article')->name('comment_article');

Route::get('collection', 'CollectionController@index')->name('collection');
Route::get('collection/article/add', 'CollectionController@add_article')->name('add_article');
Route::post('collection/article/add_proccess', 'CollectionController@article_proccess')->name('add_article_proccess');
Route::get('collection/article/{id}', 'CollectionController@viewEdit')->name('viewEdit');
Route::post('collection/article/update_proccess', 'CollectionController@article_update')->name('update_article_proccess');
Route::get('collection/article/delete', 'CollectionController@article_delete')->name('article_delete');

Route::get('collection/novel/add', 'CollectionController@add_novel')->name('add_novel');
Route::post('collection/novel/add_process', 'CollectionController@novel_proccess')->name('novel_proccess');
Route::get('collection/novel/{id}', 'CollectionController@collecion_novel')->name('collecion_novel');
Route::get('collection/novel/{id}/episode', 'CollectionController@episode')->name('episode_view');
Route::post('collection/novel/episode/proccess', 'CollectionController@add_proccess')->name('add_episode_proccess');

Route::get('forums', 'ForumController@index')->name('forums');
Route::post('forums/send', 'ForumController@chat_forums')->name('chat_forums');

Route::get('clear-cache', function () {
    Artisan::call('cache:clear');
    return 'success';
});

Route::get('novel', 'NovelController@index')->name('novel');
Route::get('novel/{detail}', 'NovelController@detail')->name('detnovel');
Route::post('novel/comment', 'NovelController@comment_novel')->name('comment_novel');
Route::get('novel/{detail}/{episode}', 'NovelController@episode')->name('detnovel');
