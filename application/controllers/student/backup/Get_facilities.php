<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_facilities extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}
	
	public function get_by_name_group()
	{
		// $this->load->model('facility');
		
		// $data = $this->facility->get_avail();

		// for ($x = 0; $x <= count($data); $x++)
		// {
		// 	// $data['facility_list'][$x]->timeslot_list = 0;
		// 	// print_r( $data['facility_list'][$x]->timeslot_list );
		// 	// echo "<br />";
		// 	// print_r( $data['facility_list'][$x] );

		// 	$data['facility_list'][$x]->timeslot_list = $data['timeslot_list'];
		// 	echo "<br />";
		// 	print_r( $data['facility_list'][$x]->timeslot_list );			
		// }


		// $category = 't-junction';

		// $data['t_juction'] = $this->facility->get_by_cate($category);
		// $count = count($data['t_juction']);
		
		// // echo $count;

		// for ($x = 0; $x < $count; $x++)
		// {
		// 	$id = $data['t_juction'][$x]->facility_id;

		// 	$free_slots = $this->timeslot->get_avail_by_id($id);
			
		// 	$data['t_juction'][$x]->free_slots = $free_slots;
		// }

		// echo count($data['t_juction']);

		//$facilityCategory = 'Pool Table';

		$this->load->model('facility');
		$this->load->model('timeslot');

		// echo 'HERE GET BY NAME GROUP';

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		
		$this->load->model('facility');
		
		$data['facility_list'] = $this->facility->get_by_name_group($name);
		
		$data['free_slots'] = $this->timeslot->get_avail_by_id($id);

		echo json_encode($data);
	}

	public function group() 
	{
		$this->load->model('facility');
		$this->load->model('timeslot');

		$category = 't-junction';

		$data['t_junction'] = $this->facility->get_by_cate($category); // Get all avail facilities from t-junction
		$size = count($data['t_junction']); // number of avail facilties
		
		echo 'Start Size: '.$size.'<br />';

		$categorized = array();

		do
		{
			echo 'RUNNING <br />';
			$group_title = preg_replace('#[0-9]*#', '', $data['t_junction'][0]->name);
			echo $size.'*SIBEI IMPT* <br />';

			for ($x = 0; $x < $size; $x++)
			{
				// str to search for
				$input = preg_replace('#[0-9]*#', '', $data['t_junction'][$x]->name);

				if ($group_title == $input)
				{
					// $categorized[$group_title][$x] = $data['t_junction'][$x];
					// $categorized[$group_title][$x] = array_splice($data['t_junction'], $x, 1);
					$data['t_junction'][$x]->name = $group_title;
					array_push($categorized, array_splice($data['t_junction'], $x, 1));

					unset($data['t_junction'][$x]);
					echo 'IN!<br />';
				}
				else
				{
					echo 'BREAK!<br />';
					break;
				}
			}

			$data['t_junction'] = array_merge($data['t_junction']);  // Reset array index
			$size = count($data['t_junction']);
		}
		while (count($data['t_junction']) != 0);

		print_r($categorized);
		
		
		// echo '<br /><br />';
		// print_r($data);
		// echo '<br />'.count($data);
		// echo '<br />';
		// print_r($data['t_junction']);
		// echo '<br />'.count($data['t_junction']).'<br />';
		
		//$data['categorized'] = $categorized;

		//$this->load->view('example', $data);

		// Print combined distinct timeslots
		// $distinct_free_slots = $this->timeslot->get_avail_distinct_by_id($id);

		// $size = count($categorized);
		
		// echo $count;

		// print_r($categorized);
		// echo '<br />';

		// if (($key = array_search(401, $array)) !== false) {
		// 	
		// }

		// for ($x = 0; $x < $count; $x++)
		// {
		// 	$id = $data['t_juction'][$x]->facility_id;

		// 	$free_slots = $this->timeslot->get_avail_by_id($id);
			
		// 	$data['t_juction'][$x]->free_slots = $free_slots;
		// }
	}
	
	public function distinct()
	{
		$this->load->model('facility');
		$this->load->model('timeslot');

		$category = array('t-junction','library','sports');

		for ($x = 0; $x < count($category); $x++)
		{
			$category[$x] = preg_replace('#-#', '_', $category[$x]);
			$data[$category[$x]] = $this->facility->get_distinct($category[$x]);

			for ($y = 0; $y < count($data[$category[$x]]); $y++)
			{
				$data[$category[$x]][$x]->name = preg_replace('#[0-9]-*#', '', $data[$category[$x]][$x]->name);
			}
		}

		// header('Content-type: text/plain');
		// print_r($data);

		$this->load->view('templates/student/header');
		$this->load->view('student_facilities_view', $data);
		$this->load->view('one_glance_script');
		$this->load->view('templates/student/footer');
	}

	public function get_slots_and_cap()
	{
		$this->load->model('facility');
		$this->load->model('timeslot');

		// echo 'HERE GET BY NAME GROUP';

		$id = $this->input->post('id');

		$data['free_slots'] = $this->timeslot->get_avail_by_id($id);
		$data['capacity'] = $this->facility->get_capacity($id);

		echo json_encode($data);
	}

	/**
	 * retrieves list of available facilities from database and displays in view
	 *
	 * @return      array 		$data
	 */
	public function index()
	{
		// // Pass data from model to controller
		// $this->load->model('facility');
		
		// $data = $this->facility->get_avail();
		
		// // $data['facility_list'] = $this->facility->get_avail();

		// // Display on view
		// $this->load->view('templates/student/header');
		// $this->load->view('all_facilities_view', $data);
		// $this->load->view('templates/student/footer');
	}

	/**
	 * retrieves facilities by category from database
	 *
	 * @param 		string 		$category
	 * @return      array 		
	 */
	public function by_category()
	{}
}

?>