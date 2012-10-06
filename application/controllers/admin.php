<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function cat($action = "", $id = "")
	{
	
	   $this->load->model('Category_model');
	
	   $data = array(
	           'id' => $id
	           );
	   
    	switch($action)
    	{
			case "add":
				if($this->input->post())
				{
					$post = $this->input->post();
					unset($post['submit']);
					
					//validate the input
					$this->form_validation->set_rules('cat_title', 'Category Title', 'trim|required');
					
					if($this->form_validation->run() == FALSE)
					{
						$this->load->view('/admin/cat_add');
					}
					else
					{
						$this->Category_model->insert_cat($post);
						redirect($this->config->item('base_url').'admin/categories', 'refresh');
					}
				}
				else
				{
					$this->load->view('/admin/cat_add');
				}
			break;
			case "edit":
			     $this->load->view('admin/cat_edit', $data);
			break;
			case "delete":
			break;
			default:
				$this->load->view('admin/category');
    	}
	}
	public function entry($action="", $id="")
	{		
		$this->load->model('Entry_model');
		
		switch($action)
		{
    		case "add":
    		  if($this->input->post())
    		  {
        		  $post = $this->input->post();
        		  unset($post['submit']);
        		  
        		  //validate user input
        		  $this->form_validation->set_rules('entry_title', 'Entry Title', 'trim|required');
        		  
        		  if($this->form_validation->run() == FALSE)
        		  {
            		  $this->load->view('/admin/entry_add');
        		  }
        		  else{
            		  $this->Entry_model->insert($post);
            		  redirect($this->config->item('base_url').'admin/entry', 'refresh');
        		  }
    		  }else{
        		  $this->load->view('/admin/entry_add');
    		  }
    		break;
    		case "edit":
    		break;
    		case "delete":
    		break;
    		default:
    		  $this->load->view('admin/entry');
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */