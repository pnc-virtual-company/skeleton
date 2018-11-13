<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExampleEmail;
use Dompdf\Dompdf;
use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorSVG;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorJPG;
//If you want to use the debug bar
use Barryvdh\Debugbar\Facade as Debugbar;

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
    public function chartjs()
    {
        return view('examples.chartjs', ['currentExample' => 'Charts in JS']);
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
     * For image upload, see: 
     * https://medium.com/@bvipul/integrate-tinymce-editor-in-your-laravel-installation-with-a-filemanager-235894910531
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
        $client = new Client(); //Guzzle\Client
        $res = $client->request('GET', url('examples/rest/getServerTime'));
        
        $statusCode = $res->getStatusCode();
        // "200"
        $contentType = $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        $responseBody = $res->getBody();

        return view('examples.rest', [
            'currentExample' => 'Call a REST API in PHP',
            'statusCode' => $statusCode,
            'contentType' => json_encode($contentType),
            'responseBody' => $responseBody,
            ]);
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
     * See: https://laracasts.com/discuss/channels/general-discussion/where-to-setlocale-in-laravel-5-on-multilingual-multidomain-app
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function translation(Request $request)
    {
        $locale = \App::getLocale();
        Debugbar::info('Current locale: ' . $locale);
        $langCode = $request->session()->get('langCode');;
        return view('examples.translation', [
            'currentExample' => 'Translation',
            'langCode' => $langCode,
        ]);
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
        Debugbar::info('Send Email via Ajax call');
        Mail::to('anonymous.user@example.org')->send(new ExampleEmail());
        return response(__('Email sent'), 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Return the current date and time (PHP API called via Guzzle)
     *
     * @return \Illuminate\Http\Response
     */
    public function getServerTime()
    {
        return response(date('Y-m-d H:i:s'), 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Generate a barcode 
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generateBarcode(Request $request)
    {
        Debugbar::disable();
        $generator = null;
        $result = '';
        $contentType = '';
        $format = strtolower($request->input('format'));
        $type = strtolower($request->input('type'));
        $message = $request->input('message');

        //Output can be an image or HTML string
        switch ($format) {
            case 'svg': 
                $generator = new BarcodeGeneratorSVG();
                $contentType = 'image/svg+xml';
                break;
            case 'png':
                $generator = new BarcodeGeneratorPNG();
                $contentType = 'image/png';
                break;
            case 'jpg':
                $generator = new BarcodeGeneratorJPG();
                $contentType = 'image/jpeg';
                break;
            case 'html':
                $generator = new BarcodeGeneratorHTML();
                $contentType = 'text/html';
                break;
            default:
                $generator = new BarcodeGeneratorPNG();
                $contentType = 'image/png';
                break;
        }

        //Type of bar code
        //The library supports more types, but it enough for demo
        switch ($type) {
            case 'code128': 
                $result = $generator->getBarcode($message, $generator::TYPE_CODE_128);
                break;
            case 'ean13': 
                $result = $generator->getBarcode($message, $generator::TYPE_EAN_13);
                break;
            default:
                $result = $generator->getBarcode($message, $generator::TYPE_STANDARD_2_5);
                break;
        }
        
        //Return the answer
        return response($result, 200)->header('Content-Type', $contentType);
    }


    /**
     * Generate a PDF file that will be displayed in the page (inline)
     * You might use this wrapper: https://github.com/barryvdh/laravel-dompdf
     * @return void
     */
	function generatePDF()
	{
        Debugbar::disable();
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
