<?php
class Settings_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_settings()
    {
    	$query = $this->db->query('SELECT * FROM site_settings WHERE name LIKE "ss_%"');       
		//$row = $query->row_array();
		//return $row;
		return $query->result();
    }
    function get_name()
    {
    	$query = $this->db->query('SELECT value FROM site_settings WHERE name = "ss_name"');       
		$row = $query->row();
		return $row->value;
    }
    
}