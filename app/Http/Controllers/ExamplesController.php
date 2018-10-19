<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamplesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //No authentication needed for accessing to the examples
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('examples.index', ['currentExample' => 'List of examples']);
        /*
Send/Test Emails
Material Icons
Manipulate dates in JS
Date selector widget
Bootstrap CSS
Charts in JS
FullCalendar widget
Enhanced SELECT
Bootstrap modals
autocomplete field
Rich text editor
Google noto font
Call a REST API in PHP
Create a barcode in PHP
Create a PDF file in PHP
Translation

Route::get('examples/emails', 'ExamplesController@emails');
Route::get('examples/icons', 'ExamplesController@icons');
Route::get('examples/momentjs', 'ExamplesController@momentjs');
Route::get('examples/datepicker', 'ExamplesController@datepicker');
Route::get('examples/bootstrap', 'ExamplesController@bootstrap');
Route::get('examples/chartsjs', 'ExamplesController@chartsjs');
Route::get('examples/fullCalendar', 'ExamplesController@fullCalendar');
Route::get('examples/select2', 'ExamplesController@select2');
Route::get('examples/autocomplete', 'ExamplesController@autocomplete');
        */
    }

    /**
     * How to check if email was sent
     *
     * @return \Illuminate\Http\Response
     */
    public function emails()
    {
        return view('examples.emails', ['currentExample' => 'Send/Test Emails']);
    }




    /**
     * Example of two rich text editors
     *
     * @return \Illuminate\Http\Response
     */
    public function richtexteditor()
    {
        return view('examples.richtexteditor', ['currentExample' => 'Rich text editor']);
    }

    /**
     * Example of a static treeview (from HTML and JS, no backend)
     *
     * @return \Illuminate\Http\Response
     */
    public function treeview()
    {
        return view('examples.treeview', ['currentExample' => 'Treeview widget']);
    }

    /**
     * Example of Google noto font usage
     *
     * @return \Illuminate\Http\Response
     */
    public function noto()
    {
        return view('examples.noto', ['currentExample' => 'Google noto font']);
    }

    /**
     * Example of REST call in PHP
     *
     * @return \Illuminate\Http\Response
     */
    public function rest()
    {
        return view('examples.rest', ['currentExample' => 'Call a REST API in PHP']);
    }

    /**
     * Example of barcode generation in PHP
     *
     * @return \Illuminate\Http\Response
     */
    public function barcode()
    {
        return view('examples.barcode', ['currentExample' => 'Create a barcode in PHP']);
    }

    /**
     * Example of PDF generation in PHP
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        return view('examples.pdf', ['currentExample' => 'Create a PDF file in PHP']);
    }

    /**
     * Example of translation
     *
     * @return \Illuminate\Http\Response
     */
    public function translation()
    {
        return view('examples.translation', ['currentExample' => 'Translation']);
    }
}
