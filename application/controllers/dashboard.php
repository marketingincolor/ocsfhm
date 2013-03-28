<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	//function __construct()
	/*function Dashboard()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
	}*/
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/dashboard
	 *	- or -  
	 * 		http://example.com/index.php/dashboard/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/dashboard/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
		   //show_error('You are not authorized to view this page.');
		   redirect('login', 'refresh');
		}
		else 
		{
			/*$data = array(
				'title' => 'Linkboxx - Project Unicorn',
				'content' => 'dashboard'
			);*/
			//$this->load->view('includes/template', $data);
			$this->template->set('title', 'Dashboard');
			$this->template->set('shownav', true);
			$this->template->load('templates/template_admin', 'dashboard');
		}
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */