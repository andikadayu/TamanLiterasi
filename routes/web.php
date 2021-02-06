<?php

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

Route::get('article', 'BlogController@viewBlog')->name('blogs');
Route::get('article/{detail}', 'BlogController@detailBlog')->name('detail_blogs');

Route::get('collection', 'CollectionController@index')->name('collection');
Route::get('collection/article/add', 'CollectionController@add_article')->name('add_article');
Route::post('collection/article/add_proccess', 'CollectionController@article_proccess')->name('add_article_proccess');
