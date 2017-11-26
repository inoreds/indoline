<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PenjualanBBM p, MstCustomer c where p.IdCustomer = c.IdCustomer");
	    
	    return $get->result();
    }

    public function getAllData_detil()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM left outer join penjualanbbm_mba mba on p.NoPoCustomer = mba.NoPoCustomer and p.detilNumber = mba.detilNumber");
	    
	    return $get->result();
    }

	public function getAllDataInvoicePertamina()
	{
		$get = $this->db->query("Select * from invoicepertamina");
		return $get->result();
	}

	public function getAllDataInvoicePertamina_detil()
	{
		$get = $this->db->query("select * from invoicepertamina_detil");
		return $get->result();
	}

}