<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timeslot extends CI_Model {

	function __construct() 
	{ 
		parent::__construct();
		$this->load->database();
	}

	function get_timeslots()
	{
		try 
        {
        	// Get by current time..


        	// Get all available facilities
        	// $query = $this->db->query('SELECT * FROM timeslot WHERE start_time > "'.$time.'"');
        	$query = $this->db->query('SELECT * FROM timeslot');

	        $result = $query->result();
			
			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}

	function get_by_id($id = null)
	{
		try 
        {
        	$query = $this->db->query('SELECT * FROM timeslot WHERE timeslot_id="'.$id.'"');
	        $result = $query->result();

			return $result;
        } 
        catch (Exception $e)
        {
        	echo $e->get_message();
        }
	}

	function get_avail_by_id($id = null, $date = null)
	{
		// $today = date("d.m.y");

        try 
        {
        	// Get all available facilities
        	$query = $this->db->query('SELECT * FROM timeslot WHERE NOT EXISTS 
        		(SELECT * FROM booking INNER JOIN facility ON booking.facility_id=facility.facility_id 
        		WHERE booking.timeslot_id=timeslot.timeslot_id AND facility.facility_id='.$id.' AND booking.date="'.$date.'")');

	        $result = $query->result();
	        
	        // $result = $query->result();
			
			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}
}

?>