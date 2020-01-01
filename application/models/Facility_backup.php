<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends CI_Model {

	function __construct() 
	{ 
		parent::__construct(); 
		$this->load->database();
	}

	function get_facility_list()
	{
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
        try 
        {
        	// $query = $this->db->get('facility'); // SELECT * FROM FACILITY
        	$query = $this->db->query('SELECT * FROM facility');
	        $result = $query->result();

			return $result;
        } 
        catch (Exception $e) 
        {
        	echo $e->get_message();
        }
	}

	function get_capacity($facility_id)
	{
		$query = $this->db->query('SELECT current_capacity, max_capacity FROM facility');
	    $result = $query->result();
	}

	function get_facility_details($id)
	{}
}

?>