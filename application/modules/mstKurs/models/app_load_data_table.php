<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From kurs k, currency c where k.id_curr=c.id_curr");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From kurs where ID_KUR='".$id."' and k.id_curr=c.id_curr");
	    return $get->result();
    }	
	
	

}