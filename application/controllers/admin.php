<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -  
	 * 		http://example.com/index.php/admin/index
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
		$this->load->model('Category_model');
		$categories = $this->Category_model->query_all_categories();
		
		switch($action)
		{
    		case "add":
    		  if($this->input->post())
    		  {
        		  $post = $this->input->post();
        		  unset($post['submit']);
        		  
        		  $selected_categories = serialize($post['categories']);
        		  
        		  $post['categories'] = $selected_categories; 
        		 
        		  //File Upload
        		  $config['upload_path'] = './uploads/';
        		  $config['allowed_types'] = 'jpg|jpeg';
        		  $config['max_size']	= '2000';
        		  $config['max_width']  = '1024';
        		  $config['max_height']  = '768';

        		  $this->load->library('upload', $config);
        		  
        		  
        		  if(!$this->upload->do_upload())
        		  {
            		  $error = array('error' => $this->upload->display_errors());
            		  //validate user input
            		  $this->form_validation->set_rules('entry_title', 'Entry Title', 'trim|required');
            		  $this->form_validation->set_rules('categories[]', 'Category', 'trim|required');
            		  $this->form_validation->run();
            		  $this->load->view('/admin/entry_add', array('error' => $error, 'categories' => $categories));
        		  }
        		  else
        		  {
        		      //We'll grab the data from the file upload to store in the database
        		      $file_data = $this->upload->data();
        		      $post['file_name'] = $file_data['file_name'];
            		  $this->Entry_model->insert($post);
            		  
            		  //Create thumbnail for image we just uploaded
            		  $config['image_library'] = 'gd2';
            		  $config['source_image']	= './uploads/'.$file_data['file_name'];
            		  $config['create_thumb'] = TRUE;
            		  $config['maintain_ratio'] = TRUE;
            		  $config['width']	 = 260;
            		  $config['height']	= 180;
            		  
            		  $this->load->library('image_lib', $config); 

            		  $this->image_lib->resize();
            		  
            		  redirect($this->config->item('base_url').'admin/entry', 'refresh');
        		  }

    		  }else{
        		  $this->load->view('/admin/entry_add', array('error' => '', 'categories' => $categories));
    		  }
    		break;
    		case "edit":
    		  $this->load->view('/admin/entry_edit', $data);
    		break;
    		case "delete":
    		break;
    		default:
    		  $this->load->view('admin/entry');
		}
	}
	public function vote()
	{
    	if($this->input->post()){
        	
        	//insert votes into votes table
        	
        	//set user to inactive
        	
        	$this->load->view('thank_you');
        	
    	}else{
        	$this->load->view('app_view');
    	}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */