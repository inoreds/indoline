<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * from PembelianBarangKapal p, PembelianBarangKapal_detil d where p.POPembelian_barangKapal = d.POPembelian_barangKapal");
	    
	    return $get->result();
    }

}