<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getDataAll()
    {
	    $get  = $this->db->query("Select * From MstCustomer");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From MstCustomer where IdCustomer='".$id."'");
	    return $get->result();
    }	
	
	

}