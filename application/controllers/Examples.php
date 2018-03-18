<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examples extends CI_Controller {
	/**
	 * @var object Definition of navigation options
	 */
	protected $pills = [
		'matrix' => [
			'title' => 'List of examples',
			'url' => 'matrix',
		],
		'icons' => [
			'title' => 'Material Icons',
			'url' => 'icons',
		],
		'dates' => [
			'title' => 'Manipulate dates in JS',
			'url' => 'dates',
		],
		'datepicker' => [
			'title' => 'Date selector widget',
			'url' => 'datepicker',
		],
		'bootstrap' => [
			'title' => 'Bootstrap CSS',
			'url' => 'bootstrap',
		],
		'charts' => [
			'title' => 'Charts in JS',
			'url' => 'charts',
		],
		'calendar' => [
			'title' => 'FullCalendar widget',
			'url' => 'calendar',
		],
		'select2' => [
			'title' => 'Enhanced SELECT',
			'url' => 'select2',
		],
		'bootbox' => [
			'title' => 'Bootstrap modals',
			'url' => 'bootbox',
		],
		'autocomplete' => [
			'title' => 'autocomplete field',
			'url' => 'autocomplete',
		],
		'richtext' => [
			'title' => 'Rich text editor',
			'url' => 'richtext',
		],
		'treeview' => [
			'title' => 'Treeview widget',
			'url' => 'treeview',
		],
		'noto' => [
			'title' => 'Google noto font',
			'url' => 'noto',
		],
		'api' => [
			'title' => 'Call a REST API in PHP',
			'url' => 'api',
		],
		'barcode' => [
			'title' => 'Create a barcode in PHP',
			'url' => 'barcode',
		],
		'pdf' => [
			'title' => 'Create a PDF file in PHP',
			'url' => 'pdf',
		],
		'i18n' => [
			'title' => 'Translation',
			'url' => 'i18n',
		],
	];

	/**
	 * @var object Data array passed to the view
	 */
	protected $data = array();

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
			$this->session->set_userdata('last_page', $this->uri->uri_string());
			$this->data['pills'] = $this->pills;
			$this->data['activeLink'] = 'examples';
	}

	//Generic controller that render a view from its name
	function renderView($pillKey)
	{
		//Check if the key exists, otherwise point to any item
		if (!array_key_exists($pillKey, $this->pills)) {
			$pillKey = key($this->pills);
		}

		$this->data['selectedPill'] = $pillKey;
		$this->data['title'] = $this->pills[$pillKey]['title'];
		//Call extra function or sub view with call_user_func
		$this->data['partialView'] = $this->load->view('examples/' . $pillKey, $this->data, true);
		$this->load->view('templates/header');
		$this->load->view('menu/index');
		$this->load->view('examples/_master_view', $this->data);
		$this->load->view('templates/footer');
	}

	//Example of translated view
	function i18n($language = 'english') {
		$this->load->helper('language');
		$this->lang->load('global', $language);
		$this->data['language'] = $language;
		$this->data['selectedPill'] = 'i18n';
		$this->data['title'] = $this->pills['i18n']['title'];
		//Call extra function or sub view with call_user_func
		$this->data['partialView'] = $this->load->view('examples/i18n', $this->data, true);
		$this->load->view('templates/header');
		$this->load->view('menu/index');
		$this->load->view('examples/_master_view', $this->data);
		$this->load->view('templates/footer');
	}

	//Backend for the autocomplete field
	function listFiles($pattern) {
		$pattern = '*' . $pattern . '*';
		$files = $this->getDirContents(FCPATH, $pattern);

		$this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($files));
	}

	//Recursive function that lists files
	private function getDirContents($dir, $pattern, &$results = array()){
	    $files = scandir($dir);

	    foreach($files as $key => $value){
	        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
	        if(!is_dir($path)) {
						if (fnmatch($pattern, $path)) {
	            	$results[] = $path;
						}
	        } else if($value != "." && $value != "..") {
	            $this->getDirContents($path, $pattern, $results);
	            $results[] = $path;
	        }
	    }

	    return $results;
	}

	//Generate a PDF file that will be displayed inthe page
	function generatePDF()
	{
		require FCPATH . 'vendor/autoload.php';
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml('hello world');
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
		$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
	}

	//Generate a PDF file that will be downloaded
	function downloadPDF()
	{
		require FCPATH . 'vendor/autoload.php';
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml('hello world');
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		$dompdf->render();
		// Output the generated PDF to Browser
		$dompdf->stream();
	}

	//Return the current date and time
	function getServerTimeByApi()
	{
		echo date('Y-m-d H:i:s');
	}
}
