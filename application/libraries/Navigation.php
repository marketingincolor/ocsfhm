<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation {
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('ion_auth');
	}
	
    public function display($navtype)
    {
		echo '<script>
			$(document).ready(function(){
			 var str=location.href.toLowerCase();
			    $(".navigation li a").each(function() {
			            if (str.indexOf(this.href.toLowerCase()) > -1) {
			            		if (str == this.href.toLowerCase()) {
			                    	$(this).parent().addClass("selected");
			                    }
			               }
			           });
			});
		</script>';
		
	    switch ($navtype) {
	    case "primary":
			$list = array(
				'<a href="'.base_url().'">Home</a>',
				'<a>About Us</a>' => array(
					'<a href="'.base_url().'about-us/staff">Staff</a>',
					'<a href="'.base_url().'about-us/history">History</a>',
					'<a href="'.base_url().'about-us/affiliations">Affiliations</a>',
					//'<a href="'.base_url().'about-us/location">Finding Us</a>',
					'<a href="'.base_url().'contact-us">Finding Us</a>'
					),
				'<a href="'.base_url().'prearrangement">Prearrangement</a>',
				'<a>Helpful Links</a>' => array(
					//'<a href="'.base_url().'helpful-links/resources">Grief Resources</a>',
					//'<a href="'.base_url().'helpful-links/hospitality">Local Hospitality</a>',
					//'<a href="'.base_url().'helpful-links/floral">Flowers</a>',
					//'<a href="'.base_url().'helpful-links/memorial-products">Memorial Products</a>'
					'<a href="'.base_url().'resources">Grief Resources</a>',
					'<a href="'.base_url().'hospitality">Local Hospitality</a>',
					'<a href="'.base_url().'floral">Flowers</a>',
					'<a href="'.base_url().'memorial-products">Memorial Products</a>'
					),
				'<a href="'.base_url().'contact-us">Contact Us</a>'
			);
	        break;
	    case "admin":
	    	if ($this->ci->ion_auth->logged_in()) {
				$list = array(
					'<a href="'.base_url().'admin">Admin Dashboard</a>',
					'<a href="'.base_url().'logout">Logout</a>',
					'<a href="'.base_url().'">View Website</a>'
				);
	    	} else {
	    		$list = '';
	    	}
	        break;
	    case "members":
	    	if ($this->ci->ion_auth->logged_in()) {
				$list = array(
					'<a href="'.base_url().'admin">Dashboard</a>',
					'<a href="'.base_url().'logout">Logout</a>',
					'<a href="'.base_url().'">View Website</a>'
				);
	    	} else {
	    		$list = '';
	    	}
	        break;
		};

		$attributes = array(
			'class' => 'navigation'
			);
		return ul($list, $attributes);
    }
    
    /*public function primary_nav()
    {
		echo '<script>
			$(document).ready(function(){
			 var str=location.href.toLowerCase();
			    $(".navigation li a").each(function() {
			            if (str.indexOf(this.href.toLowerCase()) > -1) {
			            		if (str == this.href.toLowerCase()) {
			                    	$(this).parent().addClass("selected");
			                    }
			               }
			           });
			});
		</script>';
		
    	if (!$this->ci->ion_auth->logged_in()) {
		$list = array(
			'<a href="'.base_url().'">Home</a>',
			'<a href="'.base_url().'about-us">About Us</a>' => array(
				'<a href="'.base_url().'about-us/history">History</a>',
				'<a href="'.base_url().'about-us/affiliations">Affiliations</a>',
				'<a href="'.base_url().'about-us/location">Finding Us</a>'
				),
			'<a href="'.base_url().'prearrangement">Prearrangement</a>',
			'<a href="'.base_url().'helpful-links">Helpful Links</a>' => array(
				'<a href="'.base_url().'helpful-links/resources">Grief Resources</a>',
				'<a href="'.base_url().'helpful-links/hospitality">Local Hospitality</a>',
				'<a href="'.base_url().'helpful-links/floral">Flowers</a>'
				),
			'<a href="'.base_url().'contact-us">Contact Us</a>'
			);
		} elseif ($this->ci->ion_auth->is_admin()) {
		$list = array(
			'<a href="'.base_url().'">Home</a>',
			'<a href="'.base_url().'admindash">Admin Dashboard</a>',
			'<a href="'.base_url().'logout">Logout</a>'
			);
		} else {
		$list = array(
			'<a href="'.base_url().'">Home</a>',
			'<a href="'.base_url().'dashboard">Dashboard</a>',
			'<a href="'.base_url().'logout">Logout</a>'
			);
		}
		$attributes = array(
			'class' => 'navigation'
			);
		return ul($list, $attributes);
    }*/
}

/* End of file Navigation.php */