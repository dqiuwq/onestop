<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_users extends CI_Controller {
	
	public function __construct()
	{
		// Must include this line, if not class will not inherit load function
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		
		$crud->set_table('student');
		$crud->columns('id', 'username', 'adminid', 'email', 'created_at');

		$crud->set_subject('Students');

		// $crud->required_fields('lastName');

		$crud->unset_print();
		// $crud->unset_export();

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('admin_view');
		$this->load->view('templates/admin/footer');
	}
}

?>