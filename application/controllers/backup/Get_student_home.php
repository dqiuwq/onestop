<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_student_home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->view('templates/student/header');
		$this->load->view('student_home_view');
		$this->load->view('templates/student/footer');
	}
}

?>