<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Media Model
*
* Author:  Jason Jozwiak
*
* Location: http://github.com/jjozwiak/lloyd
*
* Created:  04.24.12
*
* Description:  A model to handle media for Lloyd
*
* Requirements: PHP5 or above
*
*/

class Category_model extends CI_Model
{
	function __construct()
	{
	        // Call the Model constructor
	        parent::__construct();
	}
    public function query_all_categories()
    {  	
		$query = $this->db->get('categories');
		$data = $query->result();
    	return $data;
    }
    public function query_cat_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        $data = $query->result();
        return $data;
    }
	public function insert_cat($post)
	{
		$this->load->database();				
		$this->db->insert('categories', $post);
	}
	public function delete_cat($post)
	{
    	
	}
}