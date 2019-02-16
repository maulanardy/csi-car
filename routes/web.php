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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/display', 'HomeController@display')->name('display');

Route::get('/driver', 'DriverController@index')->name('driver');

Route::get('/car', 'CarController@index')->name('car');

Route::resources([
    'task' => 'TaskController',
]);