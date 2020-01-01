<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_booking extends CI_Controller {
	
	public function __construct()
	{
		// Must include this line, if not class will not inherit load function
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{}

	/**
	 * retrieves student's bookings from database and displays in view
	 *
	 * @param 		string 		$student_id
	 * @return      array 		$data
	 */
	public function my_bookings($student_id = null)
	{
		// $student_id = '125421F';

		// // Pass data from model to controller
		// $this->load->model('booking');
		
		// $result = $this->booking->get_booking_list($student_id);
		
		// $data['booking_list'] = $result;

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		
		if (isset($_SESSION['adminid']) && !empty($_SESSION['adminid']))
		{
			$crud->where('student_id', $_SESSION['adminid']);

			$crud->set_table('booking');
			$crud->columns('booking_id', 'facility_id', 'student_id', 'timeslot_id', 'headcount', 'date', 'pin');

			// $crud->callback_after_delete(array($this,'refresh_page'));
			
			// $crud->set_relation('facility_id','facility','{name} \n{location}');
			// $crud->set_relation('student_id','student','{admin_no} \n{name}');
			$crud->set_relation('timeslot_id','timeslot','{start_time} - {end_time}');
			$crud->set_relation('facility_id','facility', 'name');

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

			// Display on view
			$this->load->view('templates/student/header', $output);
			$this->load->view('student_bookings_view');
			$this->load->view('templates/student/footer');
		}
	}
}

?>