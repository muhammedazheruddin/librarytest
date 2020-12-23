<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Visitor_model extends CI_Model{


	function __consturct(){
	parent::__construct();

	}

	  public function Add_Visitor_Details($data)
    {
          $this->db->insert('visitors', $data);
          $this->session->set_flashdata('visitor_add', "Success ! New Visitor Added");
    }
    public function Get_Visitor()
    {
      $sql = "SELECT * FROM `visitors`
            ORDER BY `entry_flag` ASC";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
    }
   
  }
?>  