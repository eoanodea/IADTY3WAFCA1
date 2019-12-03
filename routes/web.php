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

Route::get('/patient', 'Patient\PatientController@index')->name('patient.patients.index');
Route::get('/patient/{id}', 'Patient\PatientController@show')->name('patient.patients.show');
Route::get('/patient/visits/{id}', 'Patient\VisitController@show')->name('patient.visits.show');

Route::get('/doctor/patient', 'Doctor\PatientController@index')->name('doctor.patients.index');
Route::get('/doctor/patient/{id}', 'Doctor\PatientController@show')->name('doctor.patients.show');
Route::get('/doctor/patients/create', 'Doctor\PatientController@create')->name('doctor.patients.create');
Route::post('/doctor/patients/store', 'Doctor\PatientController@store')->name('doctor.patients.store');
Route::get('/doctor/patients/{id}/edit', 'Doctor\PatientController@edit')->name('doctor.patients.edit');
Route::put('/doctor/patients/{id}', 'Doctor\PatientController@update')->name('doctor.patients.update');
Route::delete('/doctor/patients/{id}', 'Doctor\PatientController@destroy')->name('doctor.patients.destroy');

Route::get('/doctor', 'Doctor\DoctorController@index')->name('doctor.doctors.index');
Route::get('/doctor/{id}', 'Doctor\DoctorController@show')->name('doctor.doctors.show');
Route::get('/doctor/doctors/{id}/edit', 'Doctor\DoctorController@edit')->name('doctor.doctors.edit');
Route::put('/doctor/doctors/{id}', 'Doctor\DoctorController@update')->name('doctor.doctors.update');

Route::get('/doctor/visits/all', 'Doctor\VisitController@index')->name('doctor.visits.index');
Route::get('/doctor/visits/create/{patientId?}', 'Doctor\VisitController@create')->name('doctor.visits.create');
Route::get('/doctor/visits/{id}', 'Doctor\VisitController@show')->name('doctor.visits.show');
Route::post('/doctor/visits/store', 'Doctor\VisitController@store')->name('doctor.visits.store');
Route::get('/doctor/visits/{id}/edit', 'Doctor\VisitController@edit')->name('doctor.visits.edit');
Route::put('/doctor/visits/{id}', 'Doctor\VisitController@update')->name('doctor.visits.update');
Route::delete('/doctor/visits/{id}', 'Doctor\VisitController@destroy')->name('doctor.visits.destroy');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.index');
Route::get('/admin/patients', 'Admin\PatientController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientController@destroy')->name('admin.patients.destroy');

Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

Route::get('/admin/visits', 'Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create', 'Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits/{id}', 'Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store', 'Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', 'Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}', 'Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}', 'Admin\VisitController@destroy')->name('admin.visits.destroy');
