<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}
	/* this particular upload action is SPECIFIC to the photo upload in services view
	 * Other additional uploads below as seperate functions */
	function do_upload()
	{
		$service_id = $_POST['services_id'];
		$poster_name = $_POST['name3'];
		$photo_title = $_POST['title3'];
		$userfile = $_POST['userfile'];
		$passcode = $_POST['passcode'];
		
		//
		$servpath = $service_id;
		$target_path = './uploads/'.$servpath.'/';
		$makepath = $target_path;
		if(!realpath($makepath)) {
			$old = umask(0);
			mkdir($makepath,0777);
			umask($old);
		}
		//
		
		$config['upload_path'] = './uploads/'.$service_id.'';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		//$config['max_width']  = '1024';
		//$config['max_height']  = '1024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_success', $data);
			
			$upload_data = $this->upload->data();
			$this->load->model('services/services_model');
			$data = array(
				'name' => $_POST['name3'],
				'title' => $_POST['title3'],
				'filename' => 'uploads/'.$_POST['services_id'].'/'.$upload_data['file_name'].'',
				'services_id' => $_POST['services_id'],
				'active' => 0
			);
			$this->services_model->add_photo($data);

		}
	}
}
/* End of file upload.php */
/* Location: ./application/controllers/upload.php */