<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Services_model extends CI_Model {

    var $value = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function get_service($value)
	{
		$query = $this->db->query('SELECT * FROM services WHERE uri = "'.$value.'"');       
		$row = $query->row_array();
		return $row;
	}
	
	function get_file($id) //gets image files from db table for specific services_id
	{
		$query = $this->db->query('SELECT * FROM services_file WHERE services_id = "'.$id.'"');       
		return $query->result();
	}
	
	function get_cond($id) //gets condolences text from db table for specific services_id
	{
		$query = $this->db->query('SELECT * FROM services_cond WHERE services_id = "'.$id.'"');       
		return $query->result();
	}
	
	function get_memo($id) //gets memorial text from db table for specific services_id
	{
		$query = $this->db->query('SELECT * FROM services_memo WHERE services_id = "'.$id.'"');       
		return $query->result();
	}
	
	function get_serv_photo($id)
	{
		$query = $this->db->query('SELECT * FROM services_file WHERE id = "'.$id.'"');       
		$row = $query->row_array();
		return $row['services_id'];
	}
	
	function get_serv_story($id)
	{
		$query = $this->db->query('SELECT * FROM services_memo WHERE id = "'.$id.'"');       
		$row = $query->row_array();
		return $row['services_id'];
	}
	
	function show_active()
	{
		$query = $this->db->query('SELECT * FROM services WHERE active = 0');       
		return $query->result();
	}
	
	function show_inactive()
	{
		$query = $this->db->query('SELECT * FROM services WHERE active = 1');       
		return $query->result();
	}
    
	function add_cond($data=array())
	{
		$this->db->insert('services_cond', $data); 
	}
	
	function add_story($data=array())
	{
		$this->db->insert('services_memo', $data); 
	}
	
	function add_photo($data=array())
	{
		$this->db->insert('services_file', $data); 
	}
}