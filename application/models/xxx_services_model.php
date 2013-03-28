<?php
class Services_model extends CI_Model {

    var $value = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->model('services_model');
    }
    
    function get_service($value)
    {
    	$query = $this->db->query('SELECT * FROM services WHERE uri = "'.$value.'"');       
		$row = $query->row_array();
		return $row;
    }
    
}