<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class New_booking extends CI_Controller {
	
	public function __construct()
	{
		// Must include this line, if not class will not inherit load function
		parent::__construct();

		$this->load->helper('url');
	}
	
	public function index()
	{}

	public function book_facility()
	{
		// $this->load->model('facility');
		
		// $this->facility->get_by_id($facility_id)->name

		
		
		// print_r($tmp);

		$date = $this->input->post('date');
		$timeslot_id = $this->input->post('timeslot_id');
		$headcount = $this->input->post('headcount');
		$student_id = $this->input->post('student_id');
		$facility_id = $this->input->post('facility_id');

		// $pin = rand(0000,9999); // Random Pin
		$pin = substr(str_shuffle("0123456789"), 0, 4);
		
		$this->load->model('booking');
		$this->load->model('facility');
		$this->load->model('timeslot');

		$data = array(
        	// 'booking_id' => $booking_id,
        	'headcount' => $headcount,
        	'date' => $date,
        	'facility_id' => $facility_id,
        	'pin' => $pin,
        	'student_id' => $student_id,
        	'timeslot_id' => $timeslot_id
		);

		$result = $this->booking->create($data);

		$tmp = $this->facility->get_by_id($facility_id);

		echo json_encode($data);

		// Junlong, your code can be place after json
		$this->load->library('nexmo');
		// $this->nexmo->set_format('json');
		$tmp = $this->facility->get_by_id($facility_id);

		$tmp_time = $this->timeslot->get_by_id($timeslot_id);


        $from = 'NYP Administrator';
        // $to = '6582337607'; 6591254978
        $to = $_SESSION['mobile']; 

        $message = array(
            'text' => 'Dear '. $_SESSION['username'] .', Kindly take note that your booking of '.$tmp[0]->name.' at '.$tmp_time[0]->start_time.' is successful.',
        );

        $response = $this->nexmo->send_message($from, $to, $message);

        // echo "<h1>Text Message</h1>";
        // $this->nexmo->d_print($response);
        // echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";
	}

	/**
	 * create a new booking for students and returns the last $id inserted
	 *
	 * @param 		string 		$id 		student_id
	 * @return      array 		$result 	last_id, 1 or 0
	 */
	public function create()
	{
		// get student id

		// $booking_id auto generated
		$headcount = 'Test';
		$start_time = 'Test';
		$end_time = 'Test';
		$date = 'Test';
		$facility_id = '1';
		$pin = 'Test';
		$student_id = '125421F';

		$this->load->model('booking');

		$data = array(
        	// 'booking_id' => $booking_id,
        	'headcount' => $headcount,
        	'start_time' => $start_time,
        	'end_time' => $end_time,
        	'date' => $date,
        	'facility_id' => $facility_id,
        	'pin' => $pin,
        	'student_id' => $student_id
		);

		$result = $this->booking->create($data);

		print_r($result); // gets last_id inserted and success (1 or 0)

		/*
		 * Get boolean result
		 * if false = print fail
		 * else = print successful
		 */
	}
}

?>