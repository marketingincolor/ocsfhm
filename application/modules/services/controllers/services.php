<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends MX_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('services/services_model');
	}
	
	/* Core site function actions */
	public function index()
	{
		//get FH settings from database
		$this->load->model('settings_model', '', TRUE);
		$info = $this->get_settings();
		$this->template->set('ss_info', $info);
		//setup $ss_info construct (see bottom of controller) for use in template

		//$this->template->set('title', 'Services');
		//$this->template->load('templates/template_trib', 'services');
		redirect($this->config->item('base_url'));
	}
	
	public function display($value)
	{
		//get FH settings from database
		$this->load->model('settings_model', '', TRUE);
		$info = $this->get_settings();
		$this->template->set('ss_info', $info);
		//setup $ss_info construct (see bottom of controller) for use in template
		$array = $this->services_model->get_service($value);
		$all_data['services'] = $array;
		$id = element('id', $array);
		$title = element('full_name', $array);
		$dob = element('dob', $array);
		$dod = element('dod', $array);
		$photo = element('photo', $array);
		$passcode = element('passcode', $array);
		$all_data['filearray'] = $this->services_model->get_file($id);
		$all_data['condarray'] = $this->services_model->get_cond($id);
		$all_data['memoarray'] = $this->services_model->get_memo($id);
		$all_data['service_id'] = $id;
		$all_data['passcode'] = $passcode;
		
		$config['upload_path'] = './uploads/'.$id.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size'] = '100';
		//$config['max_width'] = '1024';
		//$config['max_height'] = '768';
		$this->load->library('upload', $config);
		
		$this->template->set('title', $title);
		$this->template->set('photo', $photo);
		$this->template->set('dob', $dob);
		$this->template->set('dod', $dod);
		
		$this->template->load('templates/template_trib', 'services_detail', $all_data);
	}

	public function add($type)
	{

		switch ($type) {
	    case "cond":
			//add CHECK for passcode to determine if posting will be allowed
	
			//steps to write input from ajax to db
			$data = array(
				'name' => $_POST['name'],
				'quote' => $_POST['quote'],
				'services_id' => $_POST['services_id']
			);
			$this->services_model->add_cond($data);
			return true;
	        break;
	    case "photo":
	    	
	    	/*$id = $_POST['services_id'];
			$config['upload_path'] = base_url().'uploads/2/';
			$config['allowed_types'] = 'gif|jpg|png';
			//$config['max_size'] = '100';
			//$config['max_width'] = '1024';
			//$config['max_height'] = '768';
			$this->load->library('upload', $config);*/
			
	        break;
	    case "memo":
			//add CHECK for passcode to determine if posting will be allowed
	
			//steps to write input from ajax to db
			$data = array(
				'name' => $_POST['name'],
				'title' => $_POST['title'],
				'story' => $_POST['story'],
				'services_id' => $_POST['services_id']
			);
			$this->services_model->add_story($data);
			return true;
	        break;
		}

	}

	public function gallery_view($id)
	{
		//$all_data['list_photos'] = $this->services_model->get_photos();
		$service_id = (int)$this->services_model->get_serv_photo($id);
		
		$all_data['photoid'] = $id;
		$all_data['serviceid'] = $service_id;
		$all_data['list_photos'] = $this->services_model->get_file($service_id);
		$start = $_GET['s'];
		$all_data['start'] = $start;
		
		$this->template->load('gallery_view', 'gallery_view_partial', $all_data);
	}
	
	public function gallery_read($id)
	{
		$service_id = (int)$this->services_model->get_serv_story($id);
		
		$all_data['memoid'] = $id;
		$all_data['serviceid'] = $service_id;
		$all_data['list_memos'] = $this->services_model->get_memo($service_id);
		
		$this->template->load('memo_view', 'memo_view_partial', $all_data);
	}
	
	public function show_list()
	{
		$all_data['list_active'] = $this->services_model->show_active();
		$all_data['list_inactive'] = $this->services_model->show_inactive();
		$this->template->set('sect_hdr', 'images/main_srv_title.png');
		$this->template->set('controller', $this);
		$this->template->load_partial('service_list', 'services_partial', $all_data);
	}
	//--------------------------------------------------------------------
	
	public function get_settings()
	{
		$results = $this->settings_model->get_settings();
		$return_array = array();
		if (is_array($results) && count($results))
		{
			foreach ($results as $record)
			{
				$return_array[$record->name] = $record->value;
			}
		}
		return $return_array;
	}
	//--------------------------------------------------------------------
	
}

/* End of file services.php */
/* Location: ./application/modules/services/controllers/services.php */