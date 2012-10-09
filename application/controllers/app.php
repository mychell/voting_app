<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $this->load->model('Entry_model');
	    $this->load->model('Category_model');
	    $data = array();
	    $categories = $this->Category_model->query_all_categories();

	    foreach($categories as $category){
	       
	       //retrun all of the entries in a given category
    	    $entries = $this->Entry_model->query_all_entries_by_cat($category->id);
    	    
    	    $cat_entries = array();
    	    $cat_entries[] = $category->cat_title;
    	    
    	    foreach($entries as $entry){
        	    $cat_entries[] = $this->Entry_model->query_entries_by_id($entry);
    	    }
    	    $data[] = $cat_entries;
	    }
		$this->load->view('app_view', array('data' => $data));
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */