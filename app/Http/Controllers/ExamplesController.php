<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExampleEmail;

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

Route::get('examples/bootstrap', 'ExamplesController@bootstrap');
Route::get('examples/chartsjs', 'ExamplesController@chartsjs');
Route::get('examples/fullCalendar', 'ExamplesController@fullCalendar');
Route::get('examples/select2', 'ExamplesController@select2');
Route::get('examples/autocomplete', 'ExamplesController@autocomplete');
        */
    }

    /**
     * How to test emails / How tosend an email
     *
     * @return \Illuminate\Http\Response
     */
    public function emails()
    {
        return view('examples.emails', ['currentExample' => 'Send/Test Emails']);
    }

    /**
     * How to use icons of the starter kit
     *
     * @return \Illuminate\Http\Response
     */
    public function icons()
    {
        return view('examples.icons', ['currentExample' => 'Material Icons']);
    }

    /**
     * How to manipulate dates in JS
     *
     * @return \Illuminate\Http\Response
     */
    public function momentjs()
    {
        return view('examples.dates', ['currentExample' => 'Manipulate dates in JS']);
    }


    /**
     * Examples with two datepicker widgets
     *
     * @return \Illuminate\Http\Response
     */
    public function datepicker()
    {
        return view('examples.datepicker', ['currentExample' => 'Date selector widget']);
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



    //================================================================================
    // Service endpoints

    /**
     * Triggered by Ajax: send an example of email
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail()
    {
        Mail::to('anonymous.user@example.org')->send(new ExampleEmail());
        return response(__('Email sent'), 200)->header('Content-Type', 'text/plain');
    }
}
