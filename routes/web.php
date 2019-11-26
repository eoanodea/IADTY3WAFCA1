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

Route::get('/patient/home', 'User\HomeController@index')->name('patient.home');
Route::get('/patient/{id}', 'User\HomeController@show')->name('patient.show');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/admin/patients', 'Admin\UserController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\UserController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\UserController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\UserController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\UserController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\UserController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\UserController@destroy')->name('admin.patients.destroy');

Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

// Route::get('/user/books', 'user\BookController@index')->name('user.books.index');
// Route::get('/user/books/{id}', 'user\BookController@show')->name('user.books.show');

