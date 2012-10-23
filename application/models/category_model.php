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
	private function check_mname_uniq($mname)
	{
	  $query = $this->db->get_where('categories', array('machine_name' => $mname));   
	  $data = $query->result();
	   
	   if($data != NULL){
    	   return TRUE;
	   }else{
    	   return FALSE;
	   }	
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
		$unique = $this->check_mname_uniq($post['machine_name']);
        
        if($unique == FALSE){
            $this->db->insert('categories', $post);
        }else{
            $post['machine_name'] = 'cat_'.time();
            $this->db->insert('categories', $post);
        }

	}
	public function update($post)
	{
    	$data = array(
	       'cat_title' => $post['cat_title']
	   );
    	$this->db->where('id', $post['cat_id']);
    	$this->db->update('categories', $data);
	}
	public function delete_cat($post)
	{
    	
	}
}