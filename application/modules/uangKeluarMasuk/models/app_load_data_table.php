<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
    	/*
	    $get  = $this->db->query("Select ID_JOUR, a.ID_ACT, NAME_SUB_ACCOUNT, DEBIT, CREDIT From journals j, sub_account a where j.id_act = a.id_act and NOTE='Uang Masuk & Keluar' order by ID_JOUR");
	    */
	    $get = $this->db->query("select * from kas k, journals j, sub_account sa where k.id_journals=j.id_journals and sa.id_act=j.id_act and sa.id_act<>28");
	    return $get->result();
    }
	

}