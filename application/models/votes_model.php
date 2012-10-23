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

class Votes_model extends CI_Model
{
	function __construct()
	{
	        // Call the Model constructor
	        parent::__construct();
	}
	function query_all_votes()
	{
    	$query = $this->db->get('votes');
		$data = $query->result();
    	return $data;
	}
	function query_all_votes_by_category($catmname)
	{
    	$query = $this->db->get_where('votes', array('catmname' => $catmname));
    	$data = $query->result();
    	return $data;
	}
	//create query that looks returns # of entries that contain a given catname AND entry id
	function query_entry_votes_by_cat($catmname, $entid)
	{
    	$query = $this->db->get_where('votes', array('catmname' => $catmname, 'entid' => $entid));
    	$data = $query->result();
    	return $data;
	}
}