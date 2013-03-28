<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	
	protected $table 	= '';

	//---------------------------------------------------------------
	
	/*
		Method: update_batch()
		
		Updates a batch of existing rows in the database.
		
		Parameters:
			$data	- An array of key/value pairs to update.
			$index	- A string value of the db column to use as the where key
			
		Return:
			true/false
	*/
	public function update_batch($data = NULL, $index = NULL)
	{
		if (is_null($index))
		{
			return FALSE;
		}

		if (!is_null($data))
		{

			$result = $this->db->update_batch($this->table, $data, $index);
			if (empty($result))
			{
				return TRUE;
			}
		}

		return FALSE;
	}

	//---------------------------------------------------------------
	
}