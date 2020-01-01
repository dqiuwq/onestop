<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Model {

	function __construct() 
	{ 
		parent::__construct(); 
		$this->load->database();
	}

	/**
	 * retrieves student's bookings from database and displays in view
	 *
	 * @param 		string 		$student_id
	 * @return      array 		$data
	 */
	// function get_booking_list()
	// {
	// 	try 
 //        {
 //        	// $query = $this->db->get('facility'); // SELECT * FROM FACILITY
 //        	$query = $this->db->query('SELECT * FROM booking');
	//         $result = $query->result();

	// 		return $result;
 //        } 
 //        catch (Exception $e)
 //        {
 //        	echo $e->get_message();
 //        }
	// }

	function get_booking_list($student_id)
	{
		try 
        {
        	// $query = $this->db->get('facility'); // SELECT * FROM FACILITY
        	$query = $this->db->query('SELECT * FROM booking WHERE student_id="'. $student_id .'"');
	        $result = $query->result();

			return $result;
        } 
        catch (Exception $e)
        {
        	echo $e->get_message();
        }
	}

	function search($keyword){}

	function create($data)
	{
		try
		{
			$this->db->insert('booking', $data);

			// update facility headcount
		
			if ($this->db->affected_rows() > 0)
			{
				$success = true;
				$last_id = $this->db->insert_id();
			}
			else
			{
				$success = false;
				$last_id = 0;
			}

			$result = array(
	        	'last_id' => $last_id,
	        	'success' => $success
			);

			return $result;
		}
		catch (Exception $e)
		{
			// echo $e->get_message();
			error_log($e->get_message(), 3, "/tmp/errors.log");
			echo 'Check errors.log';
		}
	}

	function delete($data)
	{
		// $data = array data of record

		try
		{
			$booking_id = $data['booking_id'];

			$this->db->where('booking_id', $booking_id);
			$this->db->delete('booking');

			if ($this->db->affected_rows() > 0)
			{
				return 'Boolean ' . TRUE;
			}
			else
			{
				return 'Boolean ' . FALSE;
			}
		}
		catch (Exception $e)
		{
			echo $e->get_message();
			// error_log($e->get_message(), 3, "/tmp/errors.log");
			// echo 'Check errors.log';
		}

		// Check if exist
		// Cfm pin code
		// Delete booking
		// return True if success else false
	}

}

?>