<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {
	
	function __construct()
	{
		parent::__construct();
		//get FH settings from database
		$this->load->model('settings_model', '', TRUE);
		$info = $this->get_settings();
		$this->template->set('ss_info', $info);
		$this->template->set('ss_locstring', str_replace(' ','+', element('ss_address', $info)).'+'.str_replace(' ','+', element('ss_city', $info)).'+'.str_replace(' ','+', element('ss_state', $info)).'+'.element('ss_zip', $info));
		//setup $ss_info construct (see bottom of controller) for use in template
	}
	
	public function index()
	{

		//TODO: Add INDEX view for this controller
	}
	
	public function display($value)
	{

		$this->load->model('page/page_model', '', TRUE);
		$array = $this->page_model->get_data($value);
		//$style = element('template', $array);
		//get FH settings from database
		$this->load->model('settings_model', '', TRUE);
		$ss_name = $this->settings_model->get_name();
		$title = ''.$ss_name.' - '.element('title', $array);
		$headline = element('headline', $array);
		$content_a = element('content_a', $array);
		$content_b = element('content_b', $array);
		$content_c = element('content_c', $array);
		$content_d = element('content_d', $array);
		
		$this->template->set('title', $title);
		$this->template->set('headline', $headline);
		$this->template->set('content_a', $content_a);
		$this->template->set('content_b', $content_b);
		$this->template->set('content_c', $content_c);
		$this->template->set('content_d', $content_d);
		//$this->template->set('nav', '');// or, for regular use, a particular page uri
		$show_services_partial = Modules::run('services/services/show_list');
		$this->template->set('services_partial', $show_services_partial);
		
		$show_staff_partial = Modules::run('page/page/show_staff');
		$this->template->set('staff_partial', $show_staff_partial);
		
		$this->template->load('templates/template_page', 'page');
		//$this->template->load_page('blank');
		
		//$page_to_load = ($value == 'home') ? 'blank' : 'blank';
		//$this->template->load_page($page_to_load);
	}
	
	
	public function subdisplay($value)
	{
		if ($value == 'login') { 
			redirect('login', 'refresh'); 
		}
		$this->load->model('page/page_model', '', TRUE);
		$array = $this->page_model->get_subdata($value);
		//$style = element('template', $array);
		$title = element('title', $array);
		$headline = element('headline', $array);
		$content_a = element('content_a', $array);
		$content_b = element('content_b', $array);
		$content_c = element('content_c', $array);
		$content_d = element('content_d', $array);
		$this->template->set('title', $title);
		$this->template->set('headline', $headline);
		$this->template->set('content_a', $content_a);
		$this->template->set('content_b', $content_b);
		$this->template->set('content_c', $content_c);
		$this->template->set('content_d', $content_d);
		//$this->template->set('nav', '');// or, for regular use, a particular page uri
		
		$show_items_partial = Modules::run('page/page/show_items');
		$this->template->set('items_partial', $show_items_partial);
		
		$show_staff_partial = Modules::run('page/page/show_staff');
		$this->template->set('staff_partial', $show_staff_partial);
		
		$this->template->load('templates/template_page', 'page');
	}
	
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
	
	public function show_staff()
	{
		$this->load->model('admin/admin_model', '', TRUE);
		$all_data['staff'] = $this->admin_model->show_staff();
		$this->template->set('controller', $this);
		$this->template->load_partial('admin/view_staff', 'admin/staff_partial', $all_data);
	}
	
	//--------------------------------------------------------------------
	
	public function show_items()
	{
		$this->load->model('page/page_model', '', TRUE);
		
		$array = $this->page_model->get_subdata('memorial-products');
		$content_d = element('content_d', $array);
		
		$all_data['items'] = $this->page_model->get_items();
		$all_data['verbage'] = $content_d;
		$this->template->set('controller', $this);
		$this->template->load_partial('page/page_memo', 'page/item_gallery', $all_data);
	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */