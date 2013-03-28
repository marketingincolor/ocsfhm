<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/services
	 *	- or -  
	 * 		http://example.com/index.php/services/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/services/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//this should create a sortable "list" view of all active services by date.
		/*$data = array(
			'title' => 'Services',
			'content' => 'services'
			);
		$this->load->view('includes/servtemplate', $data);*/
		
		$this->template->set('title', 'Services');
		$this->template->load('templates/template_trib', 'services');
	}
	
	public function display($value)
	{
		$this->load->model('services_model', '', TRUE);
		$array = $this->services_model->get_service($value);
		//$style = element('template', $array);
		
		$title = element('title', $array);
		
		/*$data = array(
			'title' => $title,
			'content' => 'services'
		);
		$this->load->view('includes/servtemplate', $data);*/
		
		$this->template->set('title', $title);
		$this->template->load('templates/template_trib', 'services');
	}
}

/* End of file services.php */
/* Location: ./application/controllers/services.php */