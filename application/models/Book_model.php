<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Book_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	 
	}


  public function Get_All_Books()
    {
      $sql = "SELECT * FROM `books`
            ORDER BY `upload_date_time` ASC";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
    }
   public function Get_All_Categories()
   {
      $sql = "SELECT * FROM `book_category`
            ORDER BY `category_name` ASC";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;    
   }
   public function Get_All_Categories_admin()
   {
      $sql = "SELECT * FROM `book_category`
            ORDER BY `category_name` ASC";
      $query=$this->db->query($sql);
      $result = $query->result_Array();
      return $result;    
   }








	  public function Add_Flat_Details($data)
    {
    	$flat_no=$data['flat_no'];
    	$flat_type=$data['flat_type'];
    	$block=$data['block'];
        //
        $sql = "SELECT * FROM `sms_flats`
      			WHERE `flat_no`='$flat_no' AND `block`='$block' AND `flat_type`='$flat_type'";
        $result=$this->db->query($sql);
        if ($result->row())
        {
           $this->session->set_flashdata('flat_add', "Duplicate data ! Failed to add flat.");
        } else {
          $this->db->insert('sms_flats', $data);
          $this->session->set_flashdata('flat_add', "Success ! Flat added");
        }
    }
    
    public function update_Flat($data)
    {
      $flat_id=$data['flat_id'];
      $this->db->where('flat_id',$flat_id);
      $this->db->update('sms_flats',$data); 
      $this->session->set_flashdata('flat_add', "Updated!");
    }
    
    public function Get_All_AllotmentFlats()
    {
      $sql    = "SELECT `flat_allotment`.*,
      `sms_flats`.*
      FROM `flat_allotment`
      LEFT JOIN `sms_flats` ON `flat_allotment`.`flat_id`=`sms_flats`.`flat_id` 
      WHERE `sms_flats`.`status`='1' AND `flat_allotment`.`status`='ACTIVE'";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
    }
    public function Add_Allotment_Details($d1,$d2,$d3)
    {
    	$flat_id=$d1['flat_id'];
      $email=$d1['email'];
      $mob=$d1['emc_contact'];
    	$this->db->where('flat_id',$flat_id);
      $this->db->update('sms_flats',$d2); 
    	$this->db->insert('flat_allotment', $d1);
      $sql = "SELECT * FROM `sms_user`
            WHERE `sms_email`='$email' AND `sms_mobile`='$mob'";
      $query=$this->db->query($sql);
      if ($query->row())
        {
           $this->db->set('flat_id', "CONCAT(flat_id,',','".$flat_id."')", FALSE); 
           $this->db->where('sms_email',$email);
           $this->db->where('sms_mobile',$mob);
           $this->db->update('sms_user'); 
        }
        else
        {
          $this->db->insert('sms_user', $d3);
        }

      $this->session->set_flashdata('flat_allot', "Success ! Flat alloted");
    }
    public function update_profile($d1,$d2,$u)
    {
           $this->db->where('sms_email',$u);
           $this->db->update('sms_user',$d1); 

           $this->db->where('email',$u);
           $this->db->update('flat_allotment',$d2); 
    }
    public function update_profilepic($d1,$email)
    {
      $this->db->where('sms_email',$email);
      $this->db->update('sms_user',$d1); 
    }
    public function update_password($d1,$email)
    {
      $this->db->where('sms_email',$email);
      $this->db->update('sms_user',$d1); 
    }

    public function Get_Blockwise_Flat($Block)
    {
    	$sql = "SELECT * FROM `sms_flats`
      			WHERE `block`='$Block' AND `status`='0'
      			ORDER BY `flat_no` ASC";
	    $query=$this->db->query($sql);
  		$result = $query->result_Array();
  		return $result;
    }
    public function Get_Blockwise_Flat_All($Block)
    {
      $sql = "SELECT * FROM `sms_flats`
            WHERE `block`='$Block'
            ORDER BY `flat_no` ASC";
      $query=$this->db->query($sql);
      $result = $query->result_Array();
      return $result;
    }
    public function Get_Flat($Block)
    {
      $sql = "SELECT * FROM `sms_flats`
            WHERE `block`='$Block'
            ORDER BY `flat_no` ASC";
      $query=$this->db->query($sql);
      $result = $query->result_Array();
      return $result;
    }
   //Update Flat List
    public function Get_By_FlatID($FID)
    {
      $sql = "SELECT * FROM `sms_flats`
            WHERE `flat_id`='$FID'";
      $query=$this->db->query($sql);
      $result = $query->result_Array();
      return $result;
    }

   public function Get_Allotment_FlatID($FID)
   {
    $sql    = "SELECT `flat_allotment`.*,
      `sms_flats`.*
      FROM `flat_allotment`
      LEFT JOIN `sms_flats` ON `flat_allotment`.`flat_id`=`sms_flats`.`flat_id` 
      WHERE `flat_allotment`.`flat_id`='$FID' AND `flat_allotment`.`status`='ACTIVE'";
      $query=$this->db->query($sql);
      $result = $query->result_Array();
      return $result;
   }
   public function Get_Allotment_email($ID)
   {
    $sql = "SELECT * FROM `sms_user`
            WHERE `sms_email`='$ID'";
      $query=$this->db->query($sql);
      $result = $query->result_Array();
      return $result;
   }
   public function Update_Allotment_Details($d1)
   {
    $flat_id=$d1['flat_id'];
    $this->db->where('flat_id',$flat_id);
    $this->db->update('flat_allotment',$d1); 
    $this->session->set_flashdata('flat_list', "Updated!");
   }
   public function add_bills_byFlatID($FID,$bill_data,$m,$y)
   {
        $sql = "SELECT * FROM `maintenance_bill`
            WHERE `flat_id`='$FID' AND `bill_month`='$m' AND `bill_year`='$y' ";
        $result=$this->db->query($sql);
        if ($result->row())
        {
           $this->session->set_flashdata('Bill_add', "Duplicate data ! Failed to add bill.");
        } else {
          $this->db->insert('maintenance_bill', $bill_data);
          $this->session->set_flashdata('Bill_add', "Success ! Bill added");
        }
   }
  public function Get_Bills()
   {
    $current_month=date('m');
    $current_year=date('Y');

    $sql= "SELECT `flat_allotment`.*,
      `maintenance_bill`.*,`sms_flats`.*
      FROM `sms_flats`
      LEFT JOIN `flat_allotment` ON `sms_flats`.`flat_id`=`flat_allotment`.`flat_id` 
      LEFT JOIN `maintenance_bill` ON `flat_allotment`.`flat_id`=`maintenance_bill`.`flat_id` 
      WHERE `sms_flats`.`status`='1' AND `flat_allotment`.`status`='ACTIVE'";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
      

   } 
  public function Get_Bills_Dues()
  {
    $current_month=date('m');
    $current_year=date('Y');
       $sql  = "SELECT `flat_allotment`.*,
      `maintenance_bill`.*,`sms_flats`.*
      FROM `sms_flats`
      LEFT JOIN `flat_allotment` ON `sms_flats`.`flat_id`=`flat_allotment`.`flat_id` 
      LEFT JOIN `maintenance_bill` ON `flat_allotment`.`flat_id`=`maintenance_bill`.`flat_id` 
      WHERE (`maintenance_bill`.`maintenance_status`='PENDING') AND `maintenance_bill`.`bill_month`<'$current_month' ";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
  }
  public function Get_paid_bills($FID)
  {
       $sql  = "SELECT `flat_allotment`.*,
      `maintenance_bill`.*,`sms_flats`.*
      FROM `sms_flats`
      LEFT JOIN `flat_allotment` ON `sms_flats`.`flat_id`=`flat_allotment`.`flat_id` 
      LEFT JOIN `maintenance_bill` ON `flat_allotment`.`flat_id`=`maintenance_bill`.`flat_id` 
      WHERE (`maintenance_bill`.`maintenance_status`='PAID') AND `maintenance_bill`.`flat_id`='$FID' ";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
  }
   public function clear_maintenance($FID)
   {
    $update_data=array('maintenance_status'=> "PAID");
    $this->db->where('flat_id',$FID);
    $this->db->update('maintenance_bill',$update_data); 
    $this->session->set_flashdata('bill_clear', "Maintenance cleared");
   }
   /*public function clear_EBill($FID)
   {
    $update_data=array('electricity_pay_status'=> "PAID");
    $this->db->where('flat_id',$FID);
    $this->db->update('electricity_bill',$update_data); 
    $this->session->set_flashdata('Ebill_clear', "Electric Bill cleared");
   } */
   public function Get_Bills_History()
   {
    $sql = "SELECT  DISTINCT `flat_no`,`block`,`flat_id` FROM `sms_flats`
            ORDER BY `flat_no` ASC";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
   }
public function userBlocksandblocks($ID)
   {
    $sql    = "SELECT `flat_allotment`.*,
      `maintenance_bill`.*,`sms_flats`.*
      FROM `sms_flats`
      LEFT JOIN `flat_allotment` ON `sms_flats`.`flat_id`=`flat_allotment`.`flat_id` 
      LEFT JOIN `maintenance_bill` ON `flat_allotment`.`flat_id`=`maintenance_bill`.`flat_id` 
      WHERE `flat_allotment`.`email` ='$ID'";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
   }
   public function get_unique_Blocks()
    {
      $sql = "SELECT  DISTINCT `block` FROM `sms_flats`
            ORDER BY `block` ASC";
      $query=$this->db->query($sql);
      $result = $query->result();
      return $result;
    }

  }
?>    