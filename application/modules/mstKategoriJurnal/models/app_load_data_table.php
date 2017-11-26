<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From journals_category");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From journals_category where ID_CATEGORY_JOURNALS='".$id."'");
	    return $get->result();
    }	
	
	

}