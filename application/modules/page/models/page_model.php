<?php
class Page_model extends CI_Model {

    var $value = '';
    var $section = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($value)
    {
    	$query = $this->db->query('SELECT * FROM site_pages WHERE uri = "'.$value.'"');       
		$row = $query->row_array();
		return $row;
    }
    
    function get_subdata($value)
    {
    	$query = $this->db->query('SELECT * FROM site_pages WHERE uri = "'.$value.'" AND section_id > 100');       
		$row = $query->row_array();
		return $row;
    }
    
    function get_items()
    {
    	$query = $this->db->query('SELECT * FROM site_items');       
		return $query->result();
    }
    
}