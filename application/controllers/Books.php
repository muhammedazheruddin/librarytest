<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	function __construct() {
	parent::__construct(); 
	
	}

	public function addCategory()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			
			$book_cat_data=array(
					'cat_id'=> $this->input->post('cat_id'),
					'category_name'=> $this->input->post('category_name'),
					'cat_comments'=> $this->input->post('cat_comments'),
					'upload_date'=> date('d-m-Y h:i:s')

				  );
				$this->db->insert('book_category', $book_cat_data);
				$this->session->set_flashdata('book_add', 'Category Added');
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
		}
		else
		{
			$this->index();
		}
		
	}
	public function addnewbooks()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			 $config = array();
    		    $config['upload_path'] = './upload/book_thumnails/';
    			$config['allowed_types'] = '*';
    			$config['max_size']	= '2048000';
    			$config['encrypt_name']= FALSE;
    			$config['overwrite'] = TRUE;
    			$this->load->library('upload', $config, 'Upload1'); // Create object
    	        $this->Upload1->initialize($config);
    			$upload1 = $this->Upload1->do_upload('book_image');
    		    $imgupload = $this->Upload1->data();
			    
			    $book_details=array(
					'book_id'=> date('his')."BNO".rand(1000,10000),
					'category_id'=> $this->input->post('category_id'),
					'book_title'=> $this->input->post('book_title'),
					'book_description'=> $this->input->post('book_description'),
					'book_url'=> $this->input->post('book_url'),
					'book_image'=> $imgupload['file_name'],
					'upload_date_time'=> date('d-m-Y h:i:s')

				  );


				$this->db->insert('books', $book_details);
				$this->session->set_flashdata('book_added', 'One Book Added');
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
		}
		else
		{
			$this->index();
		}
	}
	
}
