<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	//Default constructor
	function __construct()
	{
			parent::__construct();
			log_message('debug', 'URI=' . $this->uri->uri_string());
	}

	public function privileges()
	{
		$data['activeLink'] = 'home';
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('errors/html/privileges', $data);
		$this->load->view('templates/footer', $data);
	}

	public function notfound()
	{
		$data['activeLink'] = 'home';
		$this->load->view('templates/header', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('errors/html/notfound', $data);
		$this->load->view('templates/footer', $data);
	}
}
