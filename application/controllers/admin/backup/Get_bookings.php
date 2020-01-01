<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_bookings extends CI_Controller {
	
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
		
		$crud->set_table('booking');
		$crud->columns('booking_id', 'facility_id', 'student_id', 'timeslot_id', 'headcount', 'date', 'pin');

		// $crud->callback_after_delete(array($this,'refresh_page'));
		
		// $crud->set_relation('facility_id','facility','{name} \n{location}');
		// $crud->set_relation('student_id','student','{admin_no} \n{name}');
		$crud->set_relation('timeslot_id','timeslot','{start_time} - {end_time}');

		$crud->display_as('timeslot_id','Timeslot');
		$crud->display_as('headcount','No. of Pax');
		// $crud->display_as('facility_id','Name & <br />Location');
		$crud->display_as('booking_id','ID');
		$crud->display_as('student_id','Student <br />(Admin No.)');

		$crud->set_subject('Student Bookings');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_print();

		// $crud->callback_after_delete(array($this,'after_delete'));

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('admin_view');
		$this->load->view('templates/admin/footer');
	}

	// public function try_new()
	// {
	// 	try
	// 	{
	// 		$query = $this->db->query('SELECT * FROM booking WHERE booking_id='.$primary_key.'');

	// 		$timeslot_id = $query[0]->timeslot_id;
	// 	}
	// 	catch (Exception $e) 
 //        {
 //        	echo $e->get_message();
 //        }

	// 	// return $this->db->delete('booking',array('user_id' => $primary_key,'action'=>'delete', 'updated' => date('Y-m-d H:i:s')));
	// }

	/**
	 * Method template
	 *
	 * @param 		string 		$your_choice
	 * @return      array 		$your_choice
	 */
	/* public function refresh_page()
	{
		redirect('get_bookings'.'?base='.$_GET["base"],'refresh');
	}*/

	/**
	 * Method template
	 *
	 * @param 		string 		$your_choice
	 * @return      array 		$your_choice
	 */
	public function your_function()
	{}
}

?>