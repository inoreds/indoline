<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData_pertamina()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select *, pp.POPembelian as POPembelian_1 From PembelianPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel 
	    	 						left outer join invoicepertamina i on pp.popembelian = i.popembelian");
	    
	    return $get->result();
    }

    public function getAllData_non()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PembelianNonPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel
	    	 						inner join MstSupplier s on pp.IdSupplier = s.IdSupplier");
	    
	    return $get->result();
    }


}