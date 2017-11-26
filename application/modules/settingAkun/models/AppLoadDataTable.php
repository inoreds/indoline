<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From BarangBBM bb, MstSatuan s, DataJenisBBM jb where bb.IdSatuan = s.IdSatuan and bb.IdDataJenisBBM = jb.IdDataJenisBBM");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From BarangBBM bb, MstSatuan s, DataJenisBBM jb where bb.IdSatuan = s.IdSatuan and bb.IdDataJenisBBM = jb.IdDataJenisBBM and IdBBM='".$id."'");
	    return $get->result();
    }	
	
	

}