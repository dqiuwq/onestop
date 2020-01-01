<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_admin_home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		$dt = new DateTime();
		$now = $dt->format('yyyy-mm-dd');

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		
		$crud->where("booking.date = date_format(current_date(),'%d.%m.%y')");
		$crud->or_where("booking.date = date_format(current_date(),'%d.%m.%y')");
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
		$crud->unset_read();
		$crud->unset_print();


		// $crud->callback_after_delete(array($this,'after_delete'));

		$output = $crud->render();

		$this->load->view('templates/admin/header', $output);
		$this->load->view('Admin_home_view');
		$this->load->view('templates/admin/footer');
	}
}

?>