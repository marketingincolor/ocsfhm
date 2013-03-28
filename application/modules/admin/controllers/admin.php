<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*if ( ! class_exists('Controller'))
{
	class Controller extends CI_Controller {}
}*/

class Admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model('admin/admin_model');
	}
	
	/* Core site function actions */
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->model('settings_model', '', TRUE);
			$ssname = $this->settings_model->get_name();
			$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
			$this->template->set('title', 'Admin');
			$this->template->set('shownav', true);
			$this->template->load('templates/template_admin', 'member_dashboard', $this->data);
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			
			$this->load->model('settings_model', '', TRUE);
			$ssname = $this->settings_model->get_name();
			$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
			$this->template->set('title', 'Admin');
			$this->template->set('shownav', true);
			$this->template->load('templates/template_admin', 'admin_dashboard', $this->data);
			
		}
	}
	
	public function dashboard()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin');
		$this->template->set('shownav', false);
		$this->template->load('templates/template_admin', 'member_dashboard', $this->data);
	}
	
	public function settings()
	{
		
		if (!$this->ion_auth->logged_in()) {  show_error('You are not authorized to view this page.'); }
		
		if ($this->ion_auth->is_admin())
		{
			//get site settings from database
			$this->load->model('settings_model', '', TRUE);

			if ($this->input->post('submit'))
			{
				if ($this->save_settings())
				{
					$this->data['sys_msg'] = 'Your settings have been saved.';
				} else 
				{
					$this->data['sys_msg'] = 'There was an error saving your settings.';
				}
			}

			$results = $this->settings_model->get_settings();
			$return_array = array();
			if (is_array($results) && count($results))
			{
				foreach ($results as $record)
				{
					$return_array[$record->name] = $record->value;
				}
			}
			$info = $return_array;
			$this->data['settings'] = $info;
			//setup $ss_info construct (see bottom of controller) for use in template
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$ssname = $this->settings_model->get_name();
			$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
			$this->template->set('title', 'Admin - Settings');
			$this->template->set('shownav', true);
			$this->template->load('templates/template_admin', 'admin_settings', $this->data);
		}
		else
		{
			show_error('You must be an Administrator to view this page!');
		}
	}
	
	public function navigation()
	{
		//TODO: Manages navigation content for the site
	}
	
	public function pages()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		$this->load->model('admin_model', '', TRUE);
		$pagearray = $this->admin_model->get_pages();
		$this->data['pagearray'] = $pagearray;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Pages');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_pages', $this->data);
	}
	
	public function page_add()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		
		if ($this->input->post('submit'))
		{
			if ($this->add_page())
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Pages - Add';
		$this->data['content_instruct'] = 'You may add a New Page below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Pages');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_page_edit', $this->data);
	}
	
	public function page_edit($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->save_page($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$pagedata= $this->admin_model->get_page($id);
		$this->data['pagedata'] = $pagedata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Pages - Edit';
		$this->data['content_instruct'] = 'You may edit the Pages of your website below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Pages');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_page_edit', $this->data);
	}
	
	public function page_delete($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->delete_page($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$pagedata = $this->admin_model->get_page($id);
		$this->data['pagedata'] = $pagedata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Page - Delete';
		$this->data['content_instruct'] = 'To delete this Page, simply press the delete button below.';
		$this->data['content'] = ''.element('title', $pagedata).' - '.element('uri', $pagedata).'';
		$this->data['back'] = 'pages';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Pages');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_deleted', $this->data);
	}
	
	public function services()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		$this->load->model('admin_model', '', TRUE);
		$servicearray = $this->admin_model->get_services();
		$this->data['servicearray'] = $servicearray;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Pages');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_services', $this->data);
	}
	
	public function service_add()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->add_service())
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Services - Add';
		$this->data['content_instruct'] = 'You may add Services Pages below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_service_edit', $this->data);
	}
	
	public function service_edit($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->save_service($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$servicedata = $this->admin_model->get_service($id);
		$this->data['servicedata'] = $servicedata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Services - Edit';
		$this->data['content_instruct'] = 'You may edit Services Pages below.';
		$this->data['service_id'] = $id;
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_service_edit', $this->data);
	}
	
	public function service_delete($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->delete_service($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$servdata = $this->admin_model->get_service($id);
		$this->data['serv'] = $servdata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Service - Delete';
		$this->data['content_instruct'] = 'To delete this Service Record, simply press the delete button below.';
		$this->data['content'] = ''.element('full_name', $servdata).' - '.element('service_date', $servdata).'';
		$this->data['back'] = 'services';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_deleted', $this->data);
	}
	
	public function service_photo($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		$this->load->model('admin_model', '', TRUE);
		$photoarray = $this->admin_model->get_service_photos($id);
		$this->data['photoarray'] = $photoarray;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Service Photos';
		$this->data['content_instruct'] = 'You may edit your Client\'s Service Photos below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_service_photo', $this->data);
	}
	
	public function service_photo_edit($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->save_service_photo($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$servicephoto = $this->admin_model->get_service_photo($id);
		$this->data['servicephoto'] = $servicephoto;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Service Photos - Edit';
		$this->data['content_instruct'] = 'You may edit the Service\'s Photos below for oversized or inappropriate content.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_service_photo_edit', $this->data);
	}
	
	public function service_photo_delete($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->delete_service_photo($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$servdata = $this->admin_model->get_service_photo($id);
		$this->data['serv'] = $servdata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Service Photo - Delete';
		$this->data['content_instruct'] = 'To delete this Photo, simply press the delete button below.';
		$this->data['content'] = ''.element('title', $servdata).' - '.element('filename', $servdata).'';
		$this->data['back'] = 'service_photo/'.element('services_id', $servdata).'';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_deleted', $this->data);
	}
	
	public function service_memo_edit($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->save_service_memo($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$servicememos = $this->admin_model->get_service_memos($id);
		$this->data['servicememos'] = $servicememos;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Service Memories - Edit';
		$this->data['content_instruct'] = 'You may edit the Service\'s Memories below for long on inappropriate content.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Services');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_service_memo_edit', $this->data);
	}
	
	public function service_memo_delete($id)
	{
		
	}
	
	public function products()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		$this->load->model('admin_model', '', TRUE);
		$prodarray = $this->admin_model->get_products();
		$this->data['prodarray'] = $prodarray;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Products');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_products', $this->data);
	}
	
	public function product_add()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->add_product())
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Product - Add';
		$this->data['content_instruct'] = 'You may add a Memorial Product below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Products');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_product_edit', $this->data);
	}
	
	public function product_edit($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->save_product($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$proddata = $this->admin_model->get_product($id);
		$this->data['proddata'] = $proddata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Product - Edit';
		$this->data['content_instruct'] = 'You may edit the Memorial Product information below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Products');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_product_edit', $this->data);
	}
	
	public function product_delete($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->delete_product($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$proddata = $this->admin_model->get_product($id);
		$this->data['proddata'] = $proddata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Product - Delete';
		$this->data['content_instruct'] = 'To delete this item, simply press the delete button below.';
		$this->data['content'] = ''.element('item_id', $proddata).' - '.element('item_name', $proddata).'';
		$this->data['back'] = 'products';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Products');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_deleted', $this->data);
	}

	public function staff()
	{
		//TODO: Add link of user_id if applicable to tie to account
		
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		$this->load->model('admin_model', '', TRUE);
		$staffarray = $this->admin_model->show_staff();
		$this->data['staffarray'] = $staffarray;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Staff');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_staff', $this->data);
	}
	
	public function staff_add()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->add_staff())
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Staff - Add';
		$this->data['content_instruct'] = 'You may add a Staff Member below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Staff');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_staff_edit', $this->data);
	}
	
	public function staff_edit($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->save_staff($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$staffdata = $this->admin_model->get_staff($id);
		$this->data['staffdata'] = $staffdata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Staff - Edit';
		$this->data['content_instruct'] = 'You may edit Staff Member information below.';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Staff');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_staff_edit', $this->data);
	}
	
	public function staff_delete($id)
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		if ($this->input->post('submit'))
		{
			if ($this->delete_staff($id))
			{
				$this->data['sys_msg'] = 'Your settings have been saved.';
			} else 
			{
				$this->data['sys_msg'] = 'There was an error saving your settings.';
			}
		}
		$this->load->model('admin_model', '', TRUE);
		$staffdata = $this->admin_model->get_staff($id);
		$this->data['staffdata'] = $staffdata;
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['content_header'] = 'Staff - Delete';
		$this->data['content_instruct'] = 'To delete this Staff Member, simply press the delete button below.';
		$this->data['content'] = ''.element('first_name', $staffdata).' '.element('last_name', $staffdata).'';
		$this->data['back'] = 'staff';
		$this->load->model('settings_model', '', TRUE);
		$ssname = $this->settings_model->get_name();
		$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
		$this->template->set('title', 'Admin - Staff');
		$this->template->set('shownav', true);
		$this->template->load('templates/template_admin', 'admin_deleted', $this->data);
	}
	
	public function statistics()
	{
		//TODO: Generates overall stats for the site
	}
	
	/* User Management Actions */
	public function users()
	{
		if (!$this->ion_auth->logged_in()) { show_error('You are not authorized to view this page.'); }
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->model('settings_model', '', TRUE);
			$ssname = $this->settings_model->get_name();
			$this->template->set('headline', '<h2>'.$ssname.' - Dashboard</h2>');
			$this->template->set('title', 'Admin');
			$this->template->set('shownav', true);
			$this->template->load('templates/template_admin', 'admin_users', $this->data);
		}
	}
	
	public function edit_user($user_id)
	{
		//TODO: Add ability to edit individual user for Admin
	}
	
	public function delete_user($user_id)
	{
		//TODO: Add ability to delete individual user for Admin
	}
	
	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	private function save_settings() 
	{
		$data = array(
			array('name' => 'ss_name', 'value' => $this->input->post('ss_name')),
			array('name' => 'ss_address', 'value' => $this->input->post('ss_address')),
			array('name' => 'ss_city', 'value' => $this->input->post('ss_city')),
			array('name' => 'ss_state', 'value' => $this->input->post('ss_state')),
			array('name' => 'ss_zip', 'value' => $this->input->post('ss_zip')),
			array('name' => 'ss_phone', 'value' => $this->input->post('ss_phone')),
			array('name' => 'ss_meta_tags', 'value' => $this->input->post('ss_meta_tags')),
			array('name' => 'ss_meta_desc', 'value' => $this->input->post('ss_meta_desc')),
			array('name' => 'ss_google_acct', 'value' => $this->input->post('ss_google_acct')),
		);
		$updated = $this->admin_model->update_batch($data, 'name');
		return $updated;
	}
	
	private function save_page($id) 
	{
		$data = array(
			'uri' => $this->input->post('p_uri'),
			'title' => $this->input->post('p_title'),
			'headline' => $this->input->post('p_headline'),
			'content_a' => $this->input->post('p_content_a'),
			'content_b' => $this->input->post('p_content_b'),
			'content_c' => $this->input->post('p_content_c'),
			'content_d' => $this->input->post('p_content_d'),
			'note' => $this->input->post('p_note'),
			'section_id' => $this->input->post('p_section_id'),
		);
		$updated = $this->db->update('site_pages', $data, "id = $id");
		return $updated;
	}
	
	private function add_page() 
	{
		$data = array(
			'uri' => $this->input->post('p_uri'),
			'title' => $this->input->post('p_title'),
			'headline' => $this->input->post('p_headline'),
			'content_a' => $this->input->post('p_content_a'),
			'content_b' => $this->input->post('p_content_b'),
			'content_c' => $this->input->post('p_content_c'),
			'content_d' => $this->input->post('p_content_d'),
			'note' => $this->input->post('p_note'),
			'section_id' => $this->input->post('p_section_id'),
		);
		$updated = $this->db->insert('site_pages', $data);
		return $updated;
	}
	
	private function delete_page($id)
	{
		$deleted = $this->db->delete('site_pages', array('id' => $id));
		return $deleted;
	}
	
	
	
	
	private function save_service($id) 
	{
		// create folder for photo if none exists
		$servpath = $id;
		$target_path = './uploads/'.$servpath.'/';
		$makepath = $target_path;
		if(!realpath($makepath)) {
			$old = umask(0);
			mkdir($makepath,0777);
			umask($old);
		}
		// end create folder
		$config['upload_path'] = './uploads/'.$id.'';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		//$filename = 'uploads/'.$id.'/'.$upload_data['file_name'].'';
		if ($upload_data['file_name']) {
			$filename = 'uploads/'.$id.'/'.$upload_data['file_name'].'';
		} else {
			$filename = isset($_POST['s_photo']) ? $_POST['s_photo'] : NULL ;
		}
		
		$data = array(
			'uri' => $this->input->post('s_uri'),
			'first_name' => $this->input->post('s_first_name'),
			'last_name' => $this->input->post('s_last_name'),
			'full_name' => $this->input->post('s_full_name'),
			'dob' => $this->input->post('s_dob'),
			'dod' => $this->input->post('s_dod'),
			'service_location' => $this->input->post('s_service_location'),
			'service_date' => $this->input->post('s_service_date'),
			'service_time' => $this->input->post('s_service_time'),
			'visit_date' => $this->input->post('s_visit_date'),
			'visit_time' => $this->input->post('s_visit_time'),
			'int_location' => $this->input->post('s_int_location'),
			'int_date' => $this->input->post('s_int_date'),
			'int_time' => $this->input->post('s_int_time'),
			'bio' => $this->input->post('s_bio'), 
			'obit' => $this->input->post('s_obit'), 
			'passcode' => $this->input->post('s_passcode'),
			'photo' => $filename,
		);
		$updated = $this->db->update('services', $data, "id = $id");
		return $updated;
	}

	private function add_service() 
	{
		$data = array(
			'uri' => $this->input->post('s_uri'),
			'first_name' => $this->input->post('s_first_name'),
			'last_name' => $this->input->post('s_last_name'),
			'full_name' => $this->input->post('s_full_name'),
			'dob' => $this->input->post('s_dob'),
			'dod' => $this->input->post('s_dod'),
			'service_location' => $this->input->post('s_service_location'),
			'service_date' => $this->input->post('s_service_date'),
			'service_time' => $this->input->post('s_service_time'),
			'visit_date' => $this->input->post('s_visit_date'),
			'visit_time' => $this->input->post('s_visit_time'),
			'int_location' => $this->input->post('s_int_location'),
			'int_date' => $this->input->post('s_int_date'),
			'int_time' => $this->input->post('s_int_time'),
			'bio' => $this->input->post('s_bio'), 
			'obit' => $this->input->post('s_obit'), 
			'passcode' => $this->input->post('s_passcode'),
			//'photo' => $filename,
		);
		$inserted = $this->db->insert('services', $data);
		//return $inserted;
		$newid = $this->db->insert_id();
		// create folder for photo if none exists
		$servpath = $newid;
		$target_path = './uploads/'.$servpath.'/';
		$makepath = $target_path;
		if(!realpath($makepath)) {
			$old = umask(0);
			mkdir($makepath,0777);
			umask($old);
		}
		// end create folder
		$config['upload_path'] = './uploads/'.$newid.'';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		//$filename = 'uploads/'.$newid.'/'.$upload_data['file_name'].'';
		if ($upload_data['file_name']) {
			$filename = 'uploads/'.$newid.'/'.$upload_data['file_name'].'';
		} else {
			$filename = isset($_POST['s_photo']) ? $_POST['s_photo'] : NULL ;
		}
		$data = array('photo' => $filename,);
		$updated = $this->db->update('services', $data, array('id' => $newid));
		return $updated;
	}
	
	private function delete_service($id)
	{
		$deleted = $this->db->delete('services', array('id' => $id));
		return $deleted;
	}
	
	private function save_service_photo($id) 
	{
		$servid = $this->input->post('servid');
		$config['upload_path'] = './uploads/'.$servid.'';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		//$filename = 'uploads/'.$servid.'/'.$upload_data['file_name'].'';
		if ($upload_data['file_name']) {
			$filename = 'uploads/'.$servid.'/'.$upload_data['file_name'].'';
		} else {
			$filename = isset($_POST['s_photo']) ? $_POST['s_photo'] : NULL ;
		}

		$data = array(
			'name' => $this->input->post('sp_name'),
			'title' => $this->input->post('sp_title'),
			'filename' => $filename,
		);
		$updated = $this->db->update('services_file', $data, "id = $id");
		return $updated;
	}
	
	private function delete_service_photo($id)
	{
		$deleted = $this->db->delete('services_file', array('id' => $id));
		return $deleted;
	}
	
	
	
	
	private function save_product($id) 
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		$filename = 'uploads/'.$upload_data['file_name'].'';
		
		$data = array(
			'item_id' => $this->input->post('p_itemid'),
			'item_name' => $this->input->post('p_itemname'),
			'item_desc' => $this->input->post('p_itemdesc'),
			'item_note' => $this->input->post('p_itemnote'),
			'item_photo' => $filename,
		);
		$updated = $this->db->update('site_items', $data, "id = $id");
		return $updated;
	}
	
	private function add_product() 
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		$filename = 'uploads/'.$upload_data['file_name'].'';
		
		$data = array(
			'item_id' => $this->input->post('p_itemid'),
			'item_name' => $this->input->post('p_itemname'),
			'item_desc' => $this->input->post('p_itemdesc'),
			'item_note' => $this->input->post('p_itemnote'),
			'item_photo' => $filename,
		);
		$updated = $this->db->insert('site_items', $data);
		return $updated;
	}
	
	private function delete_product($id)
	{
		$deleted = $this->db->delete('site_items', array('id' => $id));
		return $deleted;
	}
	
	private function save_staff($id) 
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		$filename = 'uploads/'.$upload_data['file_name'].'';

		$data = array(
			//'user_id' => (int)$this->input->post('s_userid'),
			'first_name' => $this->input->post('s_firstname'),
			'last_name' => $this->input->post('s_lastname'),
			'position' => $this->input->post('s_position'),
			'email' => $this->input->post('s_email'),
			'quote' => $this->input->post('s_quote'),
			'note' => $this->input->post('s_note'),
			'photo' => $filename,
		);
		$updated = $this->db->update('site_staff', $data, "id = $id");
		return $updated;
	}

	private function add_staff() 
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		$filename = 'uploads/'.$upload_data['file_name'].'';
		
		$data = array(
			//'user_id' => (int)$this->input->post('s_userid'),
			'first_name' => $this->input->post('s_firstname'),
			'last_name' => $this->input->post('s_lastname'),
			'position' => $this->input->post('s_position'),
			'email' => $this->input->post('s_email'),
			'quote' => $this->input->post('s_quote'),
			'note' => $this->input->post('s_note'),
			'photo' => $filename,
		);
		$updated = $this->db->insert('site_staff', $data);
		return $updated;
	}
	
	private function delete_staff($id)
	{
		$deleted = $this->db->delete('site_staff', array('id' => $id));
		return $deleted;
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */