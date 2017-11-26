<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getDataAll()
    {
	    $get  = $this->db->query("Select * From MstSupplier");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From MstSupplier where IdSupplier='".$id."'");
	    return $get->result();
    }	
	
	

}