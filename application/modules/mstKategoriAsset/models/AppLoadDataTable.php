<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From asset_category");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From asset_category where ID_ASSET_CATEGORY='".$id."'");
	    return $get->result();
    }	
	
	

}