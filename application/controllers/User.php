<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();

		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
	}
	
	
	public function index() 
	{}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[administrator.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[administrator.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[8]|is_unique[administrator.mobile]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
				$this->load->view('templates/admin/header');
				$this->load->view('user/register/register', $data);
				$this->load->view('templates/admin/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$email    = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$mobile = "65".$mobile;
			$category = $this->input->post('category');


			try
			{
				$this->user_model->create_administrator($username, $email, $password, $mobile, $category);

				$this->load->view('templates/admin/header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('templates/admin/footer');
			}
			catch (Exception $e)
			{
				$data->error = 'There was a problem creating your new account. Please try again.';

				// send error to the view
				$this->load->view('templates/admin/header');
				$this->load->view('user/register/register', $data);
				$this->load->view('templates/admin/footer');
			}				
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/student/header');
			$this->load->view('user/login/login');
			$this->load->view('templates/student/footer');
			
		}
		else
		{
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$isadmin = $this->user_model->get_user($username);

			// echo $isadmin;
			
			if ($isadmin == "TRUE")
			{
				if ($this->user_model->resolve_administrator_login($username, $password))
				{
					$user_id = $this->user_model->get_administrator_id_from_username($username);
					$user    = $this->user_model->get_administrator($user_id);
					$user_category = $this->user_model->get_administrator_cat_from_username($username);

					// set session user datas
					$_SESSION['user_id']      = (int)$user->id;
					$_SESSION['username']     = (string)$user->username;
					$_SESSION['logged_in']    = (bool)true;
					$_SESSION['user_category'] = (string)$user->category;
					$_SESSION['isadmin'] = "YES";

					$_POST['user_category'] = $_SESSION['user_category'];
					$_POST['username'] = $_SESSION['username'];
					
					// user login ok
					 redirect('http://localhost:8080/onestop/index.php/get_admin_home', 'refresh');
				}
				else
				{
					$data->error = 'Wrong username or password.';
					$this->load->view('templates/student/header', $data);
					$this->load->view('user/login/login');
					$this->load->view('templates/student/footer');
				}

			} 
			else
			{
				if ($this->user_model->resolve_student_login($username, $password))
				{
					$user_id = $this->user_model->get_student_id_from_username($username);
					$user    = $this->user_model->get_student($user_id);
					
					// set session user datas
					$_SESSION['user_id'] = (int)$user->id;
					$_SESSION['username'] = (string)$user->username;
					$_SESSION['logged_in'] = (bool)true;
					$_SESSION['adminid'] = (string)$user->adminid;
					$_SESSION['mobile'] = (string)$user->mobile;
					$_SESSION['isadmin'] = "NO";
					
					// user login ok
					$this->load->view('templates/student/header');
					$this->load->view('Student_home_view', $data);
					$this->load->view('templates/student/footer');
				}
				else
				{
					$data->error = 'Wrong username or password.';
					$this->load->view('templates/student/header', $data);
					$this->load->view('user/login/login');
					$this->load->view('templates/student/footer');
				}
			}
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('templates/student/header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('templates/student/footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
}
