<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		// To easily deal with multiple templates, define new load methods in libraries/Template.php instead of modifying the existing one
		
		/**
		 * load_page
		 * Advanced Template use with a custom method: 
		 **/
		function load_page($view = '', $view_data = array(), $return = FALSE)
		{
			$this->set('thisvar','thisvalue');//for using variable 'thisvar' on the template page
			$this->load('templates/template_page', $view, $view_data, $return);
		}
		
		/**
		 * load_partial
		 * For working with Wiredesign'z HMVC setup, use the following in the controller:
		 * $this->template->set('controller', $this);
		 * $this->template->load_partial('template', 'view');
		 **/
		function load_partial($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{
			$this->set('contents', $this->template_data['controller']->load->view($view, $view_data, TRUE));
			return $this->template_data['controller']->load->view($template, $this->template_data, $return);
		}
		
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */