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

//Auth::routes();
//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');

//Admin
Route::get('/admin', 'HomeController@index')->name('home');

//admin news
Route::get('/admin/news/create', 'NewsController@create')->name('news.create');
Route::post('/admin/news/store', 'NewsController@store');
Route::get('/admin/news/edit/{id}', 'NewsController@edit');
Route::post('/admin/news/edit/{id}', 'NewsController@update');
Route::get('/admin/news/delete/{id}', 'NewsController@destroy');
//admin users
Route::get('/admin/users/create', 'UserController@create')->name('users.create');
Route::post('/admin/users/store', 'UserController@store');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::post('/admin/users/edit/{id}', 'UserController@update');
Route::get('/admin/users/delete/{id}', 'UserController@destroy');

Route::get('/admin/news', 'NewsController@index')->name('admin.news');
Route::get('/admin/users', 'UserController@index')->name('admin.users');

