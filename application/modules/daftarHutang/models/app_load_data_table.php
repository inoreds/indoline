<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getHutangembelian()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query("Select *, pp.POPembelian as POPembelian_1, (select count(*) from journals where  ID_TRANSACTION=pp.POPembelian) as JumlahJurnal  ,
                                    TotalHarga -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=pp.POPembelian AND  NOTE='Pelunasan Hutang') as Kurang
                                    From PembelianPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel 
	    	 						left outer join invoicepertamina i on pp.popembelian = i.popembelian
	    	 						where StatusPembayaran='Hutang'
	    	 						and TotalHarga - (select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=pp.POPembelian AND  NOTE='Pelunasan Hutang')");
	    
	    return $get->result();
    }

    public function getHutangembelian_non()
    {
	    //$get  = $this->db->query("Select * From PembelianPertamina pp, MstKapal k, MstCustomer c where pp.IdVessel = k.IdVessel and pp.IdCustomer = c.IdCustomer");
	    $get  = $this->db->query(" Select *, (select count(*) from journals where  ID_TRANSACTION=pp.POPembelian_non) as JumlahJurnal,
                                    Total -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=pp.POPembelian_non AND  NOTE='Pelunasan Hutang') as Kurang
									From PembelianNonPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel
	    	 						inner join MstSupplier s on pp.IdSupplier = s.IdSupplier
	    	 						where StatusPembayaran='Hutang'
                                    and  Total - (select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=pp.POPembelian_non AND  NOTE='Pelunasan Hutang')");
	    
	    return $get->result();
    }
	

}