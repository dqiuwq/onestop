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

	/* HUI WEN 02/02/2018  START*/
	
	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		
		$crud->set_table('facility');
		$crud->columns('facility_id', 'name', 'location', 'max_capacity', 'status', 'category', 'image');
		//$crud->fields('facility_id','name','location','max_capacity','status', 'category', 'image');
		$crud->field_type('status','dropdown',array('Available' => 'Available', 'Unavailable' => 'Unavailable'));
		$crud->field_type('category','dropdown',array('t-junction' => 't-junction', 'library' => 'library', 'sports' => 'sports'));
		$crud->field_type('max_capacity','integer');
		//$crud->field_type('status','set',array('avaliable','unavaliable'));
		// $crud->set_relation('officeCode','offices','city');

		$crud->display_as('facility_id','ID');
		$crud->display_as('name','Name');	
		$crud->display_as('max_capacity','Max no. of Pax');
		$crud->display_as('image','Photo');

		$crud->required_fields('name', 'location', 'max_capacity', 'status', 'category');

		$crud->set_subject('Facilities');

		// $crud->required_fields('lastName');

		$crud->set_field_upload('image','assets/uploads/facilities');
		// $crud->callback_column('image', array($this, 'show_image'));

		$crud->unset_print();
		$crud->unset_read();
		
				// $crud->unset_export();

		$crud->callback_after_delete(array($this,'user_after_delete'));

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('admin_view');
		$this->load->view('templates/admin/footer');
	}

	public function user_after_delete($primary_key)
	{
		redirect('clientes_desactivar/listar'.'?base='.$_GET["base"],'refresh');
	}

	public function my_area()
	{

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		
		$crud->set_table('facility');
		$crud->columns('facility_id', 'name', 'location', 'max_capacity', 'status', 'category', 'image');
		//$crud->fields('facility_id','name','location','max_capacity','status', 'category', 'image');
		$crud->field_type('status','dropdown',array('Available' => 'Available', 'Unavailable' => 'Unavailable'));
		$crud->field_type('category','dropdown',array('t-junction' => 't-junction', 'library' => 'library', 'sports' => 'sports'));
		$crud->field_type('max_capacity','integer');
		//$crud->field_type('status','set',array('avaliable','unavaliable'));

		$crud->display_as('facility_id','ID');
		$crud->display_as('name','Name');
		$crud->display_as('max_capacity','Max no. of Pax');
		$crud->display_as('image','Photo');

		$crud->required_fields('name', 'location', 'max_capacity', 'status', 'category');

		$crud->set_subject('Facilities');

		// $crud->required_fields('lastName');

		$crud->set_field_upload('image','assets/uploads/facilities');
		// $crud->callback_column('image', array($this, 'show_image'));

		$crud->unset_print();
		$crud->unset_read();
				// $crud->unset_export();

		$crud->callback_after_delete(array($this,'user_after_delete'));

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('admin_view');
		$this->load->view('templates/admin/footer');
	}

	/* HUI WEN 02/02/2018  END*/
}

?>