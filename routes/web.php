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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('welcome')->name('main');
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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/main', 'PageController@index')->name('main');
Route::get('/admin', 'HomeController@admin')->name('admin');

//admin news
Route::get('/admin/news/create', 'NewsController@create')->name('news.create');
Route::post('/admin/news/store', 'NewsController@store')->name('news.store');
Route::get('/admin/news/edit/{id}', 'NewsController@edit');
Route::post('/admin/news/edit/{id}', 'NewsController@update');
Route::get('/admin/news/delete/{id}', 'NewsController@destroy');
//admin users
Route::get('/admin/users/create', 'UserController@create')->name('users.create');
Route::post('/admin/users/store', 'UserController@store')->name('user.store');
Route::get('/admin/users/edit/{id}', 'UserController@edit')->name('edit.user');
Route::post('/admin/users/edit/{id}', 'UserController@update')->name('user.update');
Route::get('/admin/users/delete/{id}', 'UserController@destroy');

Route::get('/admin/news', 'NewsController@index')->name('admin.news');
Route::get('/admin/users', 'UserController@index')->name('admin.users');

//users crud
Route::get('/main/create', 'PageController@create')->name('page.create.news');
Route::post('/main/store', 'PageController@store')->name('page.store.news');
Route::get('/main/edit/{id}', 'PageController@edit')->name('page.edit.news');
Route::post('/main/edit/{id}', 'PageController@update')->name('page.update.news');
Route::get('/main/delete/{id}', 'PageController@destroy');


