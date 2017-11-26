<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getDataAll()
    {
	    $get  = $this->db->query("Select * From MstSupplier");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query(" select POPembelian_non as PO, DATE_TRANSACTION, Total, NOTE, DATE_INPUT, ID_ACT, DEBIT from pembeliannonpertamina p, journals j 
                                     where p.POPembelian_non=j.ID_TRANSACTION and p.idSupplier='$id' and NOTE='Pelunasan Hutang' GROUP BY POPembelian_non, ID_JOURNALS");
	    return $get->result();
    }

    public function getDataByIdAgen()
    {
	    $get  = $this->db->query(" select POPembelian as PO, DATE_TRANSACTION, TotalHarga as Total, NOTE, DATE_INPUT, ID_ACT, DEBIT from pembelianPertamina p, journals j 
                                     where p.POPembelian=j.ID_TRANSACTION and NOTE='Pelunasan Hutang' GROUP BY POPembelian, ID_JOURNALS");
	    return $get->result();
    }
	
	

}