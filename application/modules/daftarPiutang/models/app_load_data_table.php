<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    /*
	    $get  = $this->db->query("Select *,  (select count(*) from journals where  ID_TRANSACTION=p.NoPoCustomer) as JumlahJurnal 
	    							 From PenjualanBBM p, MstCustomer c where p.IdCustomer = c.IdCustomer and StatusPembayaran='Piutang'");
	    */
	  	$get = $this->db->query("Select *,  (select count(*) from journals where  ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber)) as JumlahJurnal,
									SubTotal -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber) AND  NOTE='Pelunasan Piutang') as Kurang
									From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c 
									where p.IdCustomer = c.IdCustomer and p.NoPoCustomer = pd.NoPoCustomer and pd.StatusPembayaran='Piutang' 
									and SubTotal - (select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=p.NoPoCustomer AND  NOTE='Pelunasan Piutang') > 0");
	    return $get->result();
    }
	
	public function getAllData_id($id)
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select *  
	    							 From PenjualanBBM p, MstCustomer c where p.IdCustomer = c.IdCustomer and NoPoCustomer='$id'");
	    
	    return $get->row();
    }
	

}