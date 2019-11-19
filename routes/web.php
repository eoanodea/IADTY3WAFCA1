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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

Route::get('/admin/users/patient', 'Admin\UserController@index')->name('admin.users.index');
Route::get('/admin/users/patient/create', 'Admin\UserController@create')->name('admin.users.create');
Route::get('/admin/users/patient/{id}', 'Admin\UserController@show')->name('admin.users.show');

Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
Route::get('/admin/users/create', 'Admin\UserController@create')->name('admin.users.create');
Route::get('/admin/users/{id}', 'Admin\UserController@show')->name('admin.users.show');
Route::post('/admin/users/store', 'Admin\UserController@store')->name('admin.users.store');
Route::get('/admin/users/{id}/edit', 'Admin\UserController@edit')->name('admin.users.edit');
Route::put('/admin/users/{id}', 'Admin\UserController@update')->name('admin.users.update');
Route::delete('/admin/users/{id}', 'Admin\UserController@destroy')->name('admin.users.destroy');

// Route::get('/user/books', 'user\BookController@index')->name('user.books.index');
// Route::get('/user/books/{id}', 'user\BookController@show')->name('user.books.show');

