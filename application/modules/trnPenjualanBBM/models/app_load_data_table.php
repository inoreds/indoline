<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PenjualanBBM p, MstCustomer c, MstPBBKB mp where p.ppn='ppn' and p.IdCustomer = c.IdCustomer and p.idPBBKB = mp.idPBBKB order by p.NoPoCustomer DESC");
	    
	    return $get->result();
    }

    public function getAllData_detil()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select p.NoPoCustomer, p.DetilNumber, TglSupply, p.IdBBM, Quantity, Harga, SubTotal, NamaBBM, IdSatuan, mba.NoMBA, NoMBT 
							    	From PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
							    	left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
						            left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
						            ");
	    
	    return $get->result();
    }

    public function getAllData_penjualanDetil($id)
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c, BarangBBM b, MstPBBKB mp 
	    							where p.IdCustomer = c.IdCustomer and p.NoPoCustomer = pd.NoPoCustomer and pd.IdBBM = b.IdBBM and mp.idPBBKB = p.idPBBKB and pd.NoPoCustomer='$id'");
	    
	    return $get->result();
    }
	
	  public function getAllData_penjualanDetil2($id)
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c, BarangBBM b 
	    							where p.IdCustomer = c.IdCustomer and p.NoPoCustomer = pd.NoPoCustomer and pd.IdBBM = b.IdBBM and pd.NoPoCustomer='$id'");
	    
	    return $get->row();
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


	public function getDataMBAbyId($noPOCustomer, $detilNumber)
	{
		$get = $this->db->query("select * from PenjualanBBM_MBA where NoPoCustomer='$noPOCustomer' and DetilNumber=$detilNumber");
		return $get->result();
	}

	public function getDataMBTbyId($noPOCustomer, $detilNumber)
	{
		$get = $this->db->query("select * from PenjualanBBM_MBT where NoPoCustomer='$noPOCustomer' and DetilNumber=$detilNumber");
		return $get->result();
	}

	public function getDataMBA2byId($noPOCustomer, $detilNumber, $noMBA)
	{
		$get = $this->db->query("select * from PenjualanBBM_MBA where NoPoCustomer='$noPOCustomer' and DetilNumber=$detilNumber and NoMBA='$noMBA'");
		return $get->row();
	}
	
	public function getDataMBA3byId($noPOCustomer, $detilNumber)
	{
		$get = $this->db->query("select * from PenjualanBBM_MBA where NoPoCustomer='$noPOCustomer' and DetilNumber=$detilNumber");
		return $get->row();
	}

	public function getDataMBT2byId($noPOCustomer, $detilNumber, $noMBT)
	{
		$get = $this->db->query("select * from PenjualanBBM_MBT p, MstKapal k where p.NoPoCustomer='$noPOCustomer' and p.DetilNumber=$detilNumber  and p.NoMBT='$noMBT' and p.IdVessel = k.IdVessel");
		return $get->row();
	}

	public function getCustomer($id)
    {
	    $get  = $this->db->query("Select * From MstCustomer where IdCustomer=(select IdCustomer from PenjualanBBM where NoPoCustomer='$id')");
	    return $get->row();
    }
	
	public function getPBBKB($id)
    {
	    $get  = $this->db->query("Select * From BarangBBM where IdBBM = (SELECT IdBBM from Penjualanbbm_Detil where IdBBM='$id')");
	    return $get->row();
    }	

    public function getAllData_kwitansi($po, $detil)
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select * From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c, BarangBBM b 
	    							where p.IdCustomer = c.IdCustomer and p.NoPoCustomer = pd.NoPoCustomer and pd.IdBBM = b.IdBBM and pd.NoPoCustomer='$po' and pd.DetilNumber='$detil'");
	    
	    return $get->row();
    }
	

}