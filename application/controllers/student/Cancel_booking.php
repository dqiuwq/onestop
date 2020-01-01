<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cancel_booking extends CI_Controller {
	
	public function __construct()
	{
		// Must include this line, if not class will not inherit load function
		parent::__construct();

		// $this->load->database();
		$this->load->helper('url');
	}
	
	public function index()
	{}

	public function delete()
	{
		$booking_id = "20";
		$headcount = 'Test';
		$start_time = 'Test';
		$end_time = 'Test';
		$date = 'Test';
		$facility_id = '1';
		$pin = 'Test';

		// Pass data from model to controller
		$this->load->model('booking');

		$data = array(
        	'booking_id' => $booking_id,
        	'headcount' => $headcount,
        	'start_time' => $start_time,
        	'end_time' => $end_time,
        	'date' => $date,
        	'facility_id' => $facility_id,
        	'pin' => $pin
		);

		$result = $this->booking->delete($data);

		echo $result;

		/*
		 * Get boolean result
		 * if false = print fail
		 * else = print successful
		 */
	}
}

?>