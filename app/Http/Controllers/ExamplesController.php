<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExampleEmail;
use Dompdf\Dompdf;

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
     * Comprehensive example of Bootstrap capabilities
     *
     * @return \Illuminate\Http\Response
     */
    public function bootstrap()
    {
        return view('examples.bootstrap', ['currentExample' => 'Bootstrap CSS']);
    }

    /**
     * How to create fancy charts with Javascript
     *
     * @return \Illuminate\Http\Response
     */
    public function chartsjs()
    {
        return view('examples.chartsjs', ['currentExample' => 'Charts in JS']);
    }

    /**
     * How to use a calendar widget
     *
     * @return \Illuminate\Http\Response
     */
    public function fullCalendar()
    {
        return view('examples.fullCalendar', ['currentExample' => 'FullCalendar widget']);
    }

    /**
     * How to use a calendar widget
     *
     * @return \Illuminate\Http\Response
     */
    public function select2()
    {
        return view('examples.select2', ['currentExample' => 'Enhanced SELECT']);
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

    /**
     * Generate a PDF file that will be displayed in the page (inline)
     * You might use this wrapper: https://github.com/barryvdh/laravel-dompdf
     * @return void
     */
	function generatePDF()
	{
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml('hello world');
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		$dompdf->render();
        // Output the generated PDF to Browser
        //This is the way with the lib, we must adapt it to Laravel:
        //$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        $filename = "dompdf_out.pdf";
        $output = $dompdf->output();
        return new Response($output, 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="' . $filename . '"',
        ));

	}

    /**
     * Generate a PDF file that will be downloaded
     * You might use this wrapper: https://github.com/barryvdh/laravel-dompdf
     * @return void
     */
	function downloadPDF()
	{
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml('hello world');
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
        //$dompdf->stream();  This is the way with the lib, we must adapt it to Laravel
        $filename = "dompdf_out.pdf";
        $output = $dompdf->output();
        return new Response($output, 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'attachment; filename="' . $filename . '"'
        ));
	}
}
