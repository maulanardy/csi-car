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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

	// Route::get('/', 'HomeController@index');
	Route::get('/', function () {
	  return redirect('homecar');
	});

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/home2', 'HomeController@index2')->name('home2');

	Route::get('/homecar', 'HomeController@car')->name('homecar');

	Route::get('/display', 'HomeController@display')->name('display');

	Route::get('/driver', 'DriverController@index')->name('driver');

	Route::get('/car', 'CarController@index')->name('car');

	Route::get('/summary', 'SummaryController@index')->name('summary');

	Route::resources([
	    'task' => 'TaskController',
	]);

});