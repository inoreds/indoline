<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PembelianNonPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstCustomer mc on mc.IdCustomer = pp.IdCustomer  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel
	    	 						inner join MstSupplier s on pp.IdSupplier = s.IdSupplier
	    	 						where Status <> 'Selesai'");
	    
	    return $get->result();
    }

    public function getDataById($id)
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PembelianNonPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstCustomer mc on mc.IdCustomer = pp.IdCustomer
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel
	    	 						inner join MstSupplier s on pp.IdSupplier = s.IdSupplier and POPembelian_non='$id'");
	    
	    return $get->result();
    }
	 // public function getCustomerById($id)
    // {
	    // //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    // $get  = $this->db->query("Select * From mstCustomer where idCustomer='$id'");
	    
	    // return $get->result();
    // }

    public function getPO($noPO)
    {
    	$get = $this->db->query("Select * from PembelianNonPertamina p, MstSupplier s, MstCustomer c, BarangBBM b, MstKapal k where k.IdVessel = p.IdVessel and p.IdSupplier = s.IdSupplier and p.IdBBM = b.IdBBM and c.idCustomer = p.idCustomer and POPembelian_non='$noPO'");

    	return $get->row();
    }

}