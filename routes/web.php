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

Route::get('home', 'HomeController@index')->name('home');
Route::get('users', 'UserController@index')->name('users');
Route::get('users/profile', 'UserController@profile')->name('profile');
Route::get('users/export','UserController@export');

/*=============================================================================
   The routes below are written for the examples only. 
   You can delete them because you do not need them for a real application.
*/

Route::get('examples', 'ExamplesController@index')->name('examples');

/*
=============================================================================*/
