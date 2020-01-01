<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends CI_Model {

	function __construct() 
	{ 
		parent::__construct();
		$this->load->database();
	}

	function get_booked_facilities($id = null, $date = null)
	{
        try 
        {
        	// $query = $this->db->get('facility'); // SELECT * FROM FACILITY
        	$query = $this->db->query('SELECT booking_id, booking.facility_id, timeslot_id, max_capacity, headcount, SUM(headcount) AS current_headcount FROM booking INNER JOIN facility ON booking.facility_id=facility.facility_id WHERE date="'.$date.'" AND facility.facility_id='.$id.' GROUP BY timeslot_id');
	        $result = $query->result();

			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}

	function get_avail()
	{
        try 
        {
        	// Get all available facilities
        	$query = $this->db->query('SELECT * FROM facility WHERE status LIKE "available" ORDER BY name');
	        
	        // $result['facility_list'] = $facility_list;
	        // $result['timeslot_list'] = $timeslot_list;
	        
	        $result = $query->result();
			
			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}

	function get_by_cate($category = null)
	{
		try 
        {
        	// Get all available facilities
        	$query = $this->db->query('SELECT * FROM facility WHERE status LIKE "available" AND category LIKE "'.$category.'" ORDER BY name');
	        
	        $result = $query->result();
			
			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}

	function get_distinct($category = null)
	{
		try 
        {
        	// Get all available facilities
        	// $query = $this->db->query('SELECT DISTINCT SUBSTRING(name, 1, LENGTH(name)-1) FROM facility WHERE status LIKE "available" AND category LIKE "'.$category.'" ORDER BY name'); regexp_replace
	        
	        // $query = $this->db->query('SELECT DISTINCT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(name,"5",""),"4",""),"3",""),"2",""),"1",""),"0","") FROM facility WHERE status LIKE "available" AND category LIKE "'.$category.'" ORDER BY name');

        	// $query = $this->db->query('SELECT * FROM facility WHERE status LIKE "available" AND category LIKE "'.$category.'" GROUP BY REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(name,"9",""),"8",""),"7",""),"6",""),"5",""),"4",""),"3",""),"2",""),"1",""),"0","") ORDER BY name');

        	$query = $this->db->query('SELECT facility_id, TRIM(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(name,"9",""),"8",""),"7",""),"6",""),"5",""),"4",""),"3",""),"2",""),"1",""),"0","")) AS new_name, max_capacity, category, image FROM facility WHERE status="available" AND category LIKE "'.$category.'" GROUP BY new_name ORDER BY name');

	        $result = $query->result();
			
			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}

	// function get_capacity($facility_id = null)
	// {
	// 	try 
 //        {
	// 		$query = $this->db->query('SELECT current_capacity, max_capacity FROM facility WHERE facility_id='.$facility_id.'');
	// 	    $result = $query->result();

	// 	    return $result;
 //        } 
 //        catch (Exception $e)
 //        {
 //        	echo $e->get_message();
 //        }
	// }

	function get_by_name($name = null)
	{
		try 
        {
        	$query = $this->db->query('SELECT * FROM facility WHERE name LIKE "%'. $name .'%" AND status="Available"');
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
        	$query = $this->db->query('SELECT * FROM facility WHERE facility_id="'.$id.'"');
	        $result = $query->result();

			return $result;
        } 
        catch (Exception $e)
        {
        	echo $e->get_message();
        }
	}



	/*$this->db->select('facility_id');
		$this->db->select('name');
		$this->db->select('location');
		$this->db->select('current_capacity');
		$this->db->select('max_capacity');
		$this->db->select('status');
		$this->db->select('category');
		$this->db->select('qr_id');

		$this->db->from('facility');

		$query = $this->db->get('facility');
        $result = $query->result();
		
		$list = Array(); 
        
		for ($i = 0; $i < count($result); $i++)
        {
			$list[$i] = (object)NULL;
			$list[$i]->title =  $result[$i]->blog_title;
			$list[$i]->author = $result[$i]->blog_author;
        }
        return $list;*/
}

?>