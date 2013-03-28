<?php
//class Admin_model extends CI_Model {
class Admin_model extends MY_Model {
	
	protected $table = 'site_settings';
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_pages()
    {
    	$query = $this->db->query('SELECT * FROM site_pages');       
		return $query->result();
    }
    
    function get_page($val)
    {
    	$query = $this->db->query('SELECT * FROM site_pages WHERE id ='.$val.'');       
		$row = $query->row_array();
		return $row;
    }
    
    function get_products()
    {
    	$query = $this->db->query('SELECT * FROM site_items');       
		return $query->result();
    }

    function get_product($val)
    {
    	$query = $this->db->query('SELECT * FROM site_items WHERE id ='.$val.'');       
		$row = $query->row_array();
		return $row;
    }
    
    function get_services()
    {
    	$query = $this->db->query('SELECT * FROM services ORDER BY dod DESC');       
		return $query->result();
    }
    
    function get_service($val)
    {
    	$query = $this->db->query('SELECT * FROM services WHERE id ='.$val.'');       
		$row = $query->row_array();
		return $row;
    }
    
	function get_service_photos($id)
	{
		$query = $this->db->query('SELECT * FROM services_file WHERE services_id = "'.$id.'"');       
		return $query->result();
	}
	
	function get_service_photo($id)
	{
		$query = $this->db->query('SELECT * FROM services_file WHERE id = "'.$id.'"');       
		$row = $query->row_array();
		return $row;
	}
	
	function get_service_memos($id)
	{
		$query = $this->db->query('SELECT * FROM services_memo WHERE services_id = "'.$id.'"');       
		return $query->result();
	}
	
	function get_service_memo($id)
	{
		$query = $this->db->query('SELECT * FROM services_memo WHERE id = "'.$id.'"');       
		return $query->result();
	}

    function show_staff()
    {
    	$query = $this->db->query('SELECT * FROM site_staff');       
		return $query->result();
    }
    
    function get_staff($val)
    {
    	$query = $this->db->query('SELECT * FROM site_staff WHERE id ='.$val.'');       
		$row = $query->row_array();
		return $row;
    }
    
}
