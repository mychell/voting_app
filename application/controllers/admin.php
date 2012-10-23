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
	private function auth_check(){
    	if($this->session->userdata('admin') != TRUE){
    	  redirect('/admin/login', 'refresh');
    	  die();
	   }
	}
	public function index()
	{
	   //is this person an admin?
	   $this->auth_check();
	   
	   $this->load->view('admin/dashboard');
	}
	public function auth()
	{
	   if($this->input->post()){
    	   $post = $this->input->post();
    	   if($post['password'] == 'GACG!!smile8'){
        	   $this->session->set_userdata(array('admin'=>TRUE));
        	   redirect('/admin', 'refresh');
    	   }else{
        	   redirect('/admin/login', 'refresh');
    	   }
	   }else{
    	   redirect('/admin/login', 'refresh');
	   }
	}
	public function login()
	{
        $this->load->view('admin/login');	
	}
	public function cat($action = "", $id = "")
	{
	   
	   //is this person an admin?
	   $this->auth_check();
	   
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
					$this->form_validation->set_rules('machine_name', 'Machine Name', 'trim|required');
					
					if($this->form_validation->run() == FALSE)
					{
						$this->load->view('/admin/cat_add');
					}
					else
					{
						$this->Category_model->insert_cat($post);
						redirect($this->config->item('base_url').'admin/cat', 'refresh');
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
			case "update":
			     if($this->input->post()){
    			     $post = $this->input->post();
    			     unset($post['submit']); 
        		  
    			     $this->Category_model->update($post);
        		  
    			     redirect('/admin/cat', 'refresh');
    			 }else{
        		   redirect('/admin/cat', 'refresh');
    		   }
			break;
			case "delete":
			     $this->Category_model->delete_cat($id);
			     redirect('/admin/cat', 'refresh');
			break;
			default:
				$this->load->view('admin/category');
    	}
	}
	public function entry($action="", $id="")
	{
	    //is this person an admin?
	    $this->auth_check();
	   
		$this->load->model('Entry_model');
		$this->load->model('Category_model');
		$categories = $this->Category_model->query_all_categories();
		
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
    		  $data = array('id' => $id, 'categories' => $categories);
    		  $this->load->view('/admin/entry_edit', $data);
    		break;
    		case "update":
    		   if($this->input->post()){
        		  $post = $this->input->post();
        		  unset($post['submit']);
        		  $selected_categories = serialize($post['categories']);
        		  
        		  $post['categories'] = $selected_categories; 
        		  
        		  $this->Entry_model->update($post);
        		  
        		  redirect('/admin/entry', 'refresh');
    		   }else{
        		   redirect('/admin', 'refresh');
    		   }
    		break;
    		case "delete":
    		  $this->Entry_model->delete($id);
    		  redirect('/admin/entry', 'refresh');
    		break;
    		default:
    		  $this->load->view('admin/entry');
		}
	}
	public function users()
	{
    	//is this person an admin?
	   $this->auth_check();
	   $this->load->view('admin/users');
	}
	public function results()
	{
	   //is this person an admin?
	   $this->auth_check();
	   $this->load->view('admin/results');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */