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
	
	/* HUI WEN 02/02/2018  START*/

	public function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		
		$crud->set_table('administrator');
		$crud->columns('username', 'email', 'category', 'mobile');
		$crud->required_fields('username', 'email', 'category','password');

		$crud->set_subject('Administrator');
		$crud->field_type('email','email');
		$crud->field_type('mobile','integer');
		$crud->field_type('category','dropdown',array('t-junction' => 't-junction', 'library' => 'library', 'sports' => 'sports'));

		$crud->unset_print();
		$crud->unset_add();
		$crud->unset_read();

		//$crud->add_action('Add', '', 'demo/action_more','ui-icon-plus',array($this,'score_participant'));

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('admin_view');
		$this->load->view('templates/admin/footer');
	}

	/* HUI WEN 02/02/2018  END*/
}

?>