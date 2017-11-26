<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From asset a, asset_category ac where a.id_asset_category = ac.id_asset_category");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From asset a, asset_category ac where a.id_asset_category = ac.id_asset_category and ID_ASSET='".$id."'");
	    return $get->result();
    }	
	
	

}