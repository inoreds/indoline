<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From settingakun sa, MstKapal k, sub_account s where  sa.ID_ACT = s.ID_ACT");
	    return $get->result();
    }
    /*
	public function getDataById($idBBM, $idVessel)
    {
	   $get  = $this->db->query("Select sb.IdVessel as IdVessel, sb.IdBBM IdBBM, sb.Keterangan as Keterangan, Debit, Kredit, TglTransaksi From KartuStokBBM sb, MstKapal k,  BarangBBM bb, MstSatuan s 
	   							where bb.IdSatuan = s.IdSatuan and sb.IdVessel = k.IdVessel and sb.IdBBM = bb.IdBBM
	   							and sb.IdBBM='$idBBM' and sb.IdVessel='$idVessel'");
	    return $get->result();
    }	
	*/
	

}