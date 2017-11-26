<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getDataAll()
    {
	    $get  = $this->db->query("Select * From MstCustomer");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query(" select p.NoPoCustomer as NoPoCustomer, DATE_TRANSACTION, Total, NOTE, DATE_INPUT, ID_ACT, DEBIT from penjualanbbm p, penjualanbbm_detil pd, journals j 
                                     where concat(p.NoPoCustomer,DetilNumber)=j.ID_TRANSACTION and p.IdCustomer='$id' and NOTE='Pelunasan Piutang' GROUP BY NoPoCustomer, ID_JOURNALS");
	    return $get->result();
    }	
	
	

}