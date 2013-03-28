<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/access
	 *	- or -  
	 * 		http://example.com/index.php/access/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/access/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//TODO: Add INDEX view for this controller
	}

	public function login()
	{
		$this->data['title'] = "Login";
		$this->data['content'] = 'includes/testlogin';
		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{ //check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{ //if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect($this->config->item('base_url'), 'refresh');
				/*if (!$this->ion_auth->is_admin())
				{
					redirect('dashboard', 'refresh');
				} else 
				{
					redirect('admindash', 'refresh');
				}*/
				redirect('dashboard', 'refresh');
				
			}
			else
			{ //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			
			//$this->load->view('includes/template', $this->data);
			$this->template->set('title', 'Login');
			$this->template->set('shownav', false);
			$this->template->load('templates/template_admin', 'includes/testlogin', $this->data);
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";
		//log the user out
		$logout = $this->ion_auth->logout();
		//redirect them back to the page they came from
		//redirect('login', 'refresh');
		redirect($this->config->item('base_url'), 'refresh');
	}
	
	public function add_user()
	{
		//TODO: handles the addition of a new user to the system by the admin
	}
	
	public function edit_userinfo()
	{
		//TODO: handles user record in FORM for edit by the individual user
	}
	
	public function view_userinfo()
	{
		//TODO: handles user record in display for review by the individual user
	}
	
	public function view_pages()
	{
		//TODO: handles user created individual landing pages
	}
	

}

/* End of file access.php */
/* Location: ./application/controllers/access.php */