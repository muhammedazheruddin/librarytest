<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
	parent::__construct(); 
	$this->load->model('Book_model');
	
	}

	public function index()
	{
		$session = session_id();
		// for online users
    	$this->load->library('user_agent');
    	$data['browser']= $this->agent->browser();
    	$data['browser_version']= $this->agent->version();
    	$data['os']= $this->agent->platform();
    	$data['ip']= $this->input->ip_address();
    	$data['as']= $this->agent->agent_string();
    	if ($this->agent->is_mobile())
    		$data['whatagent']=$this->agent->mobile();
    	if ($this->agent->is_browser())
    	 	$data['whatagent']=$this->agent->browser();
        if ($this->agent->is_robot())
    		 $data['whatagent']=$this->agent->robot();


		$this->load->model('Book_model');
		$data['allBooks']=$this->Book_model->Get_All_Books();
		$data['allCategories']=$this->Book_model->Get_All_Categories();
		$this->load->view('website/website_home',$data);

		// echo $data['as']."<br>";
		// echo $data['whatagent']."<br>";
		// echo $data['os']."<br>";
		// echo $data['ip']."<br>";
		// echo $data['browser']."<br>";
		// echo $data['browser_version']."<br>";
		// echo $session;
	}
	public function admin()
	{
		$this->load->view('frontend/login');
	}
	public function user_auth()
	{
		$user=$this->input->post('username');
		$pass=md5($this->input->post('password'));
		$this -> db -> select('*');
	    $this -> db -> from('authentication');
	    $this -> db -> where('user_email', $user);
	    $this-> db ->or_where('user_mobile', $user); 
	    $query = $this -> db -> get();
	    $result= $query->result_Array();

	    if(empty($result))
	    {
	    	 $this->session->set_flashdata('Error_Login', 'Oops!! No record found.');
             redirect('Welcome/logout','refresh');
	    }

	    if($result[0]['user_password'] == $pass && $result[0]['user_email'] == $user|| $result[0]['user_password'] == $pass && $result[0]['user_mobile'] == $user)
	    {
	      if($result[0]['roletype'] == "SUPERADMIN")
	            {
	             $this->session->set_userdata('username',$result[0]['first_name']." ".$result[0]['last_name']); 
	             $this->session->set_userdata('email',$result[0]['user_email']); 
	             $this->session->set_userdata('mobile',$result[0]['user_mobile']);
	             $this->session->set_userdata('role',$result[0]['roletype']);  
	             $this->load_dashboard();       
	            }
	            
	            if($result[0]['roletype'] == "USER")
	            {
	             $this->session->set_userdata('username',$result[0]['first_name']." ".$result[0]['last_name']); 
	            $this->session->set_userdata('email',$result[0]['user_email']); 
	             $this->session->set_userdata('mobile',$result[0]['user_mobile']);
	             $this->session->set_userdata('role',$result[0]['roletype']); 
	             
	             $this->load_dashboard();       
	            }
	           
	           
    }
    else
      {
          //return 0;
          $this->session->set_flashdata('Error_Login', 'Oops!! No record found.');
          redirect('Welcome/logout','refresh');
      }
     
   }
	public function load_dashboard()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			
			$this->load->model('General_model');
		    //$data['get_notice']=$this->General_model->get_Notice_Details();
			$this->load->view('frontend/dashboard');
		}
		else
		{
			$this->index();
		}
		
	}
	public function addbook()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$this->load->model('Book_model');
			$data['allCategories']=$this->Book_model->Get_All_Categories_admin();
			$this->load->view('frontend/addBook',$data);
		}
		else
		{
			$this->index();
		}
	}
	public function addbookcategory()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$this->load->view('frontend/addBookCategory');
		}
		else
		{
			$this->index();
		}
	}
	public function viewNotice()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$ID=$_GET['ID'];
			$this->load->model('General_model');
		    $data['show_notice']=$this->General_model->get_Notice_ById($ID);
			$this->load->view('frontend/noticepage',$data);
		}
		else
		{
			$this->index();
		}
	}
	public function addallotmentview()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$this->load->view('frontend/addallotment');
		}
		else
		{
			$this->index();
		}
	}
	public function addVisitorsview()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
		 $this->load->view('frontend/addvisitor');
		}
		else
		{
			$this->index();
		}
	}
	public function addStaff()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$this->load->view('frontend/addStaff');
		}
		else
		{
			$this->index();
		}
	}public function publishNotice()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			    $config = array();
    		    $config['upload_path'] = './upload/notice/';
    			$config['allowed_types'] = '*';
    			$config['max_size']	= '2048000';
    			$config['encrypt_name']= FALSE;
    			$config['overwrite'] = TRUE;
    			$this->load->library('upload', $config, 'Upload1'); // Create object
    	        $this->Upload1->initialize($config);
    			$upload1 = $this->Upload1->do_upload('notice_image');
    		    $imgupload = $this->Upload1->data();
			    
			    $noticedata=array(
					'title'=> $this->input->post('title'),
					'category'=> $this->input->post('category'),
					'content'=> $this->input->post('content'),
					'notice_img'=> $imgupload['file_name'],
					'status'=> $this->input->post('select_status'),
					'upload_date'=> date('d-m-Y')

				  );


			    //print_r($noticedata);
		$this->load->model('General_model');
		$this->General_model->Add_Notice_Details($noticedata);
		redirect('Welcome/addNoticeview', 'refresh');
		}
		else
		{
			$this->index();
		}
	}
	public function pagenotfound()
	{
		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$this->load->view('frontend/error404');
		}
		else
		{
			$this->index();
		}
	}
	public function showprofile()
	{
		//echo $_GET['id'];

		if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
	    	$ID=$_GET['id'];
			$this->load->model('Flat_model');
			$data['profile_details'] = $this->Flat_model->Get_Allotment_email($ID);
		  	$this->load->view('frontend/profile',$data);
		}
		else
		{
			$this->index();
		}
	}
	public function deleteNotice()
	  {
	  	$id=$_GET['ID'];
	  	if($this->session->userdata('email') != NULL || $this->session->userdata('mobile') != NULL)
		{
			$this->db->where('id', $id);
            $this->db->delete('notice');
        	$this->load_dashboard();
        }
        else
		{
			$this->index();
		}

      }
	function logout()
	{
			$this->session->sess_destroy();
			$this->index();
	}
}
