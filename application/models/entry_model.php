<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Entry Model
*
* Author:  Jason Jozwiak
*
* Location: http://github.com/jjozwiak/voting_app
*
* Created:  04.24.12
*
* Description:  A model to handle entries for the voting app
*
* Requirements: PHP5 or above
*
*/

class Entry_model extends CI_Model
{
	function __construct()
	{
	        // Call the Model constructor
	        parent::__construct();
	}
    public function query_all_entries()
    {  	
		$query = $this->db->get('entries');
		$data = $query->result();
    	return $data;
    }
    public function query_entries_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('entries');
        $data = $query->result();
        return $data;
    }
    public function query_all_entries_by_cat($id)
    {
        $data = $this->query_all_entries();
        
        foreach($data as $cat){
            $unserialized = unserialize($cat->categories);
            
            if(in_array($id, $unserialized)){
                $entry[] = $cat->id;
            }
        }
        
        return $entry;
    }
	public function insert($post)
	{
		$this->load->database();				
		$this->db->insert('entries', $post);
	}
	public function update($post)
	{
	   $data = array(
	       'entry_title' => $post['entry_title'],
	       'categories' => $post['categories']
	   );
    	$this->db->where('id', $post['id']);
    	$this->db->update('entries', $data);
	}
}