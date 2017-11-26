<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getDataBank()
    {
	    $get  = $this->db->query("select * from sub_account where NAME_SUB_ACCOUNT like '%bank%' and ID_SUB_ACCOUNT=11");
	    return $get->result();
    }

	
	public function getDataKas()
    {
	    $get  = $this->db->query("select * from sub_account where NAME_SUB_ACCOUNT like '%kas%' and ID_SUB_ACCOUNT=11");
	    return $get->result();
    }


	public function getDataBeban()
    {
	    $get  = $this->db->query("select * from sub_account where ID_ACCOUNT_CATEGORY=5");
	    return $get->result();
    }

	public function getDataPendapatan()
    {
	    $get  = $this->db->query("select * from sub_account where ID_ACCOUNT_CATEGORY=4");
	    return $get->result();
    }
	
    public function getHistoryBankKeluarMasuk($tgl_awal, $tgl_akhir, $jenis_bank)
    {
    	$query = "";
    	if ($jenis_bank == 'Bank Masuk') 
    	{
    		$query	= "select *, DATE_FORMAT(DATE_TRANSACTION	, '%d-%m-%Y') INDONESIAN_DATE,
    				   DEBIT AS SALDO		 
    				   from journals where credit=0 and NOTE_2 = 'Transaksi Bank Masuk' 
    				   and (DATE_TRANSACTION between '$tgl_awal' and '$tgl_akhir') ";
    	} 
    	else if ($jenis_bank == 'Bank Keluar') 
    	{
			$query	= "select *, DATE_FORMAT(DATE_TRANSACTION	, '%d-%m-%Y') INDONESIAN_DATE,
    				   CREDIT AS SALDO 
    				   from journals where debit=0 and NOTE_2 = 'Transaksi Bank Keluar' and (DATE_TRANSACTION between '$tgl_awal' and '$tgl_akhir') ";
    	}
    	$get  = $this->db->query($query);
	    return $get->result();
    }

    public function getHistoryKasKeluarMasuk($tgl_awal, $tgl_akhir, $jenis_kas)
    {
        $query = "";
        if ($jenis_kas == 'Kas Masuk') 
        {
            $query  = "select *, DATE_FORMAT(DATE_TRANSACTION   , '%d-%m-%Y') INDONESIAN_DATE,
                       DEBIT AS SALDO        
                       from journals where credit=0 and NOTE_2 = 'Transaksi Kas Masuk' 
                       and (DATE_TRANSACTION between '$tgl_awal' and '$tgl_akhir') ";
        } 
        else if ($jenis_kas == 'Kas Keluar') 
        {
            $query  = "select *, DATE_FORMAT(DATE_TRANSACTION   , '%d-%m-%Y') INDONESIAN_DATE,
                       CREDIT AS SALDO 
                       from journals where debit=0 and NOTE_2 = 'Transaksi Kas Keluar' and (DATE_TRANSACTION between '$tgl_awal' and '$tgl_akhir') ";
        }
        $get  = $this->db->query($query);
        return $get->result();
    }

    public function getDataPiutangCustomer($id_customer)
    {
        $get =  $this->db->query("Select *,  (select count(*) from journals where  ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber)) as JumlahJurnal,
									SubTotal -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber) AND  NOTE='Pelunasan Piutang') as Kurang
									From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c 
									where p.IdCustomer = c.IdCustomer and p.NoPoCustomer = pd.NoPoCustomer and pd.StatusPembayaran='Piutang' 
									and SubTotal - (select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=p.NoPoCustomer AND  NOTE='Pelunasan Piutang') > 0
                                    and p.idCustomer='$id_customer'
                                    and (select count(*) from journals where  ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber) > 0)");
        return $get->result();
    }

    public function getNominalPiutang($noPoCustomer, $detilNumber)
    {
         $get =  $this->db->query("Select *,  (select count(*) from journals where  ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber)) as JumlahJurnal,
									SubTotal -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=concat(p.NoPoCustomer,DetilNumber) AND  NOTE='Pelunasan Piutang') as Kurang
									From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c 
									where p.IdCustomer = c.IdCustomer and p.NoPoCustomer = pd.NoPoCustomer and pd.StatusPembayaran='Piutang' 
									and SubTotal - (select IFNULL(sum(debit),0) from journals where ID_TRANSACTION=p.NoPoCustomer AND  NOTE='Pelunasan Piutang') > 0
                                    and pd.NoPoCustomer='$noPoCustomer' 
                                    and pd.DetilNumber = '$detilNumber'");
        return $get->result();
    }


}