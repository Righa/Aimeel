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

Route::get('/vacancies', function(){
	return view('vacancies');
});

Route::get('/requests', function(){
	return view('requests');
});

Route::get('/update', function(){
	return view('updatevacancy');
});

Route::get('/admission', function(){
	return view('admissions');
});

Route::get('/blog', function(){
	return view('blog');
});

Route::resource('makeapp', 'VacancyAppController');

Route::resource('makeprofile', 'ProfileContoller');

Route::resource('makeblog', 'BlogController');

Route::resource('students', 'StudentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('vacancy', 'VacancyController');
