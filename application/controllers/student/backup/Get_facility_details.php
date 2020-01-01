<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_facility_details extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}
	
	public function index()
	{
		// Display on view
		$this->load->view('templates/student/header');
		$this->load->view('facility_details_view');
		$this->load->view('templates/student/footer');
	}
}

?>