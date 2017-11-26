<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    //$get  = $this->db->query("Select *, pp.POPembelian as POPembelian_1 From PembelianPertamina pp 
	    //	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    //	 						inner join MstKapal k on pp.IdVessel = k.IdVessel 
	    //	 						left outer join invoicepertamina i on pp.popembelian = i.popembelian");
	    $get  = $this->db->query("Select * from pembelianNonAgen pa, MstKapal k, BarangBBM bb 
	    							where  pa.IdVessel = k.IdVessel and pa.IdBBM = bb.IdBBM");
	    return $get->result();
    }

    public function getDataById($id)
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, BarangBBM bb where pp.IdBBM = bb.IdBBM and pp.IdVessel = k.IdVessel and POPembelian='$id'");
	    
	    return $get->result();
    }

	public function getAllDataInvoicePertamina()
	{
		$get = $this->db->query("Select * from invoicepertamina");
		return $get->result();
	}

	public function getAllDataInvoicePertamina_detil()
	{
		$get = $this->db->query("select *, d.POPembelian as POPembelian_1, d.NoInvoice as NoInvoice_1, d.DetilNo as DetilNo_1 from invoicepertamina_detil d left outer join dopertamina do on d.popembelian=do.popembelian and d.noinvoice=do.noinvoice and d.detilno = do.detilNo");
		return $get->result();
	}

	public function getAllDataInvoicePertamina_detilById($poPembelian, $noInvoice, $detilNo)
	{
		$get = $this->db->query("select * from invoicepertamina_detil where POPembelian='$poPembelian' and NoInvoice='$noInvoice' and DetilNo='$detilNo'");
		return $get->result();
	}


}