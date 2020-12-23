<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class General_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	 
	}

	public function Add_Notice_Details($data)
	{
		$this->db->insert('notice', $data);
        $this->session->set_flashdata('notice_added', "Success ! Notice Published");
	}
	public function get_Notice_Details()
	{
		$sql = "SELECT * FROM `notice`
            ORDER BY `id` DESC 
            LIMIT 10";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
	}
	public function get_Notice_ById($id)
	{
		$sql = "SELECT * FROM `notice`
            WHERE `id` = '$id'";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
	}
}

?>