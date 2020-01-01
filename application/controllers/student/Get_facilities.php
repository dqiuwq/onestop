<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Get_facilities extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}

	public function check_date()
	{
		// echo date('d.m.y');
		// echo date("H:i");

		// $curr_time = $this->input->post('time');

		// $data['timeslots'] = $this->timeslot->get_timeslots($curr_time);

		// return $data;
	}

	public function get_by_name_group()
	{
		$today = date("d.m.y");

		$this->load->model('facility');
		$this->load->model('timeslot');

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		
		// List contains similar names from facilities
		$data['facility_list'] = $this->facility->get_by_name_group($name);
		
		$data['free_slots'] = $this->timeslot->get_avail_by_id($id, $today);

		echo json_encode($data);
	}

	public function distinct()
	{
		// header('Content-type: text/plain');

		$this->load->model('facility');
		$this->load->model('timeslot');

		$category = array('t-junction','library','sports');

		for ($x = 0; $x < count($category); $x++)
		{
			$category[$x] = preg_replace('#-#', '_', $category[$x]);
			
			// echo $category[$x]."\n";

			$data[$category[$x]] = $this->facility->get_distinct($category[$x]);

			// print_r($data);

			for ($y = 0; $y < count($data[$category[$x]]); $y++)
			{

				$data[$category[$x]][$x]->new_name = preg_replace('#[0-9]#', '', $data[$category[$x]][$x]->new_name);
			}
		}

		
		// print_r($data);

		$this->load->view('templates/student/header');
		$this->load->view('student_facilities_view', $data);
		$this->load->view('one_glance_script');
		$this->load->view('templates/student/footer');
	}

	// public function get_slots_and_cap()
	// {
	// 	$this->load->model('facility');
	// 	$this->load->model('timeslot');

	// 	// echo 'HERE GET BY NAME GROUP';

	// 	$id = $this->input->post('id');

	// 	$data['free_slots'] = $this->timeslot->get_avail_by_id($id);
	// 	$data['capacity'] = $this->facility->get_capacity($id);

	// 	echo json_encode($data);
	// }

	public function refresh_form()
	{
		$this->load->model('facility');
		$this->load->model('timeslot');

		// echo 'HERE GET BY NAME GROUP';

		$id = $this->input->post('id');
		$date = $this->input->post('date');
		// $curr_time = $this->input->post('time_now');

		$data['facility'] = $this->facility->get_by_id($id);

		$data['booked_facilties'] = $this->facility->get_booked_facilities($id, $date);

		// $data['timeslots'] = $this->timeslot->get_timeslots($curr_time);
		$data['timeslots'] = $this->timeslot->get_timeslots();

		if (count($data['booked_facilties']) != 0)
		{
			for ($x = 0; $x < count($data['booked_facilties']); $x++)
			{
				for ($y = 0; $y < count($data['timeslots']); $y++)
				{
					if ($data['booked_facilties'][$x]->timeslot_id == $data['timeslots'][$y]->timeslot_id)
					{
						$max_cap = $data['booked_facilties'][$x]->max_capacity;
						$cur_cap = $data['booked_facilties'][$x]->current_headcount;
						$avail_cap = $max_cap - $cur_cap;

						if ($avail_cap < 0)
						{
							array_splice($data['timeslots'], $y, 1);
						}
						else
						{
							$data['timeslots'][$y]->left = $avail_cap;
						}
					}
					// else
					// {
					// 	$data['timeslots'][$y]->left = $data['booked_facilties'][$x]->max_capacity;
					// }					
				}
			}
		}
		$data['timeslots'] = array_merge($data['timeslots']);

		echo json_encode($data);
	}

	/**
	 * retrieves list of available facilities from database and displays in view
	 *
	 * @return      array 		$data
	 */
	public function index()
	{
		$this->load->model('facility');
		$this->load->model('timeslot');

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$date = $this->input->post('date');
		
		// List contains similar names from facilities
		// $data['facility_list'] = $this->facility->get_by_name($name);
		$data['grouped_facility'] = $this->facility->get_by_name($name);
		
		// $data['free_slots'] = $this->timeslot->get_avail_by_id($id, $today);
		$data['booked_facilties'] = $this->facility->get_booked_facilities($id, $date);

		// $data['slots_used'] = array();

		$data['timeslots'] = $this->timeslot->get_timeslots();

		if (count($data['booked_facilties']) != 0)
		{
			for ($x = 0; $x < count($data['booked_facilties']); $x++)
			{
				for ($y = 0; $y < count($data['timeslots']); $y++)
				{
					if ($data['booked_facilties'][$x]->timeslot_id == $data['timeslots'][$y]->timeslot_id)
					{
						$max_cap = $data['booked_facilties'][$x]->max_capacity;
						$cur_cap = $data['booked_facilties'][$x]->current_headcount;
						$avail_cap = $max_cap - $cur_cap;

						if ($avail_cap < 0)
						{
							array_splice($data['timeslots'], $y, 1);
						}
						else
						{
							$data['timeslots'][$y]->left = $avail_cap;
						}
					}
					// else
					// {
					// 	$data['timeslots'][$y]->left = $data['booked_facilties'][$x]->max_capacity;
					// }					
				}
			}
		}
		$data['timeslots'] = array_merge($data['timeslots']);

		// if (count($data['booked_facilties']) != 0)
		// {
		// 	for ($x = 0; $x < count($data['booked_facilties']); $x++)
		// 	{
		// 		$max_cap = $data['booked_facilties'][$x]->max_capacity;
		// 		$cur_cap = $data['booked_facilties'][$x]->current_headcount;
		// 		$avail_cap = $max_cap - $cur_cap;
				
		// 		if ($avail_cap < 0)
		// 		{
		// 			$data['slots_used'][$x] = $data['booked_facilties'][$x]->timeslot_id;
		// 		}
		// 	}
		// }

		// $data['timeslots'] = $this->timeslot->get_timeslots();

		// if (count($data['slots_used']) != 0)
		// {
		// 	for ($x=0; $x<count($data['slots_used']); $x++)
		// 	{
		// 		for ($y=0; $y<count($data['timeslots']); $y++)
		// 		{
		// 			if ($data['slots_used'][$x] == $data['timeslots'][$y]->timeslot_id)
		// 			{
		// 				array_splice($data['timeslots'], $y, 1);
		// 			}
		// 		}
		// 	}

		// 	$data['timeslots'] = array_merge($data['timeslots']);
		// }

		// @return grouped_facility - Tab Title
		// @return booked_facilties - Facilities that are booked
		// @return slots_used - Slots that are not avail for booking
		// @return timeslots - Avail slots after difference
		
		echo json_encode($data);
	}
}

?>