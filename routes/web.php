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
    return view('welcome');
});

Auth::routes();


Route::get('/admin', 'HomeController@index')->name('home');


Route::get('/admin/news/create', 'NewsController@create')->name('news.edit');
Route::get('/admin/news/delete', 'NewsController@destroy');

Route::get('/admin/users/create', 'UserController@create')->name('users.edit');
Route::get('/admin/users/delete', 'UserController@destroy');

Route::get('/admin/news', 'NewsController@index')->name('admin.news');
Route::get('/admin/users', 'UserController@index')->name('admin.users');
