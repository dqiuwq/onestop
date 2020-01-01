<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_facilities extends CI_Controller {
	
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

		
		$crud->set_table('facility');
		$crud->columns('facility_id', 'name', 'max_capacity', 'status', 'category', 'image');
		// $crud->set_relation('officeCode','offices','city');

		$crud->display_as('facility_id','ID');
		$crud->display_as('name','Name');
		$crud->display_as('max_capacity','Max no. of Pax');
		$crud->display_as('image','Photo');

		$crud->set_subject('Facilities');

		// $crud->required_fields('lastName');

		$crud->set_field_upload('image','assets/uploads/facilities');
		// $crud->callback_column('image', array($this, 'show_image'));

		$crud->unset_print();
		// $crud->unset_export();

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('admin_view');
		$this->load->view('templates/admin/footer');
	}
}

?>