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
Route::get('examples/emails', 'ExamplesController@emails');
Route::get('examples/icons', 'ExamplesController@icons');
Route::get('examples/momentjs', 'ExamplesController@momentjs');
Route::get('examples/datepicker', 'ExamplesController@datepicker');
Route::get('examples/flatpickr', 'ExamplesController@flatpickr');
Route::get('examples/bootstrap', 'ExamplesController@bootstrap');
Route::get('examples/bootstrap', 'ExamplesController@bootstrap');
Route::get('examples/chartsjs', 'ExamplesController@chartsjs');
Route::get('examples/fullCalendar', 'ExamplesController@fullCalendar');
Route::get('examples/select2', 'ExamplesController@select2');
Route::get('examples/richtexteditor', 'ExamplesController@richtexteditor');
Route::get('examples/treeview', 'ExamplesController@treeview');
Route::get('examples/noto', 'ExamplesController@noto');
Route::get('examples/rest', 'ExamplesController@rest');
Route::get('examples/barcode', 'ExamplesController@barcode');
Route::get('examples/pdf', 'ExamplesController@pdf');
Route::get('examples/translation', 'ExamplesController@translation');

//Service endpoints
Route::get('examples/emails/sendFakeEmail', 'ExamplesController@sendEmail');
Route::get('examples/rest/getServerTime', 'ExamplesController@getServerTime');
Route::get('examples/barcode/generate', 'ExamplesController@generateBarcode');
Route::get('examples/pdf/generatePDF', 'ExamplesController@generatePDF');
Route::get('examples/pdf/downloadPDF', 'ExamplesController@downloadPDF');

//Landing page for the examples:
Route::get('examples', 'ExamplesController@index')->name('examples');
/*
=============================================================================*/
