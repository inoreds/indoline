<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//test
class daftarHutang extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dtPembelian'] = $this->app_load_data_table->getHutangembelian();	
			$d['dtPembelian_non'] = $this->app_load_data_table->getHutangembelian_non();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('daftarHutang/content', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	
	function daftar()
	{
		$result=0;
		$tgl_sekarang = date("Y/m/d");
		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode + 1;
		$note = "";
		$akunHutang;
		if ($_POST['penjual'] == "Pertamina")
		{
			$akunHutang = $this->get_idSettingHutangPertamina();
			$note = "Hutang Dagang Pertamina";
		}
		else if ($_POST['penjual']	 == "Non")
		{
			$akunHutang = $this->get_idSettingHutangNon();	
			$note = "Hutang Dagang Non";
		}

		
		$idJurnal=  $this->kode_inc($kode);	
		
		$this->db->trans_start();
		
		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['tgl'];
		$dt['id_transaction'] = $_POST['id'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] =  $this->get_idSetting($_POST['idBBM']);
		$dt['DEBIT'] = $_POST['kurang'];
		$dt['CREDIT'] =  0;
		$this->db->insert("journals",$dt);

		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['tgl'];
		$dt['id_transaction'] = $_POST['id'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] = $akunHutang;
		$dt['DEBIT'] = 0;
		$dt['CREDIT'] = $_POST['kurang'];	
		$this->db->insert("journals",$dt);	

		$this->db->trans_complete();

		$result =1;
		
		print json_encode($result);
	}

	function lunasiHutang()
	{
				$result=0;
		$tgl_sekarang = date("Y/m/d");
		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode + 1;
		$note = "";
		$akunHutang;
		if ($_POST['penjual'] == "Pertamina")
		{
			$akunHutang = $this->get_idSettingHutangPertamina();
			$note = "Hutang Dagang Pertamina";
		}
		else if ($_POST['penjual']	 == "Non")
		{
			$akunHutang = $this->get_idSettingHutangNon();	
			$note = "Hutang Dagang Non";
		}

		$note = "Pelunasan Hutang";
		
		$idJurnal=  $this->kode_inc($kode);	
		
		$this->db->trans_start();
		
		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['date_transaction'];
		$dt['id_transaction'] = $_POST['id_transaction'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] =  $akunHutang;
		$dt['DEBIT'] = $_POST['jumlahPembayaran'];
		$dt['CREDIT'] =  0;
		$this->db->insert("journals",$dt);

		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['date_transaction'];
		$dt['id_transaction'] = $_POST['id_transaction'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] = $_POST['akunBank'];
		$dt['DEBIT'] = 0;
		$dt['CREDIT'] = $_POST['jumlahPembayaran'];	
		$this->db->insert("journals",$dt);	


		
		if ($_POST['penjual'] == "Pertamina")
		{
			$value = $this->cekLUnas($_POST['id_transaction']);
			if ($value == 0)
			{
				$id['POPembelian'] =  $_POST['id_transaction'];
				$po['StatusPembayaran'] = 'Lunas';
				$po['Status'] = 'Selesai';
				$this->db->update("PembelianPertamina",$po,$id);
			}
		}
		else if ($_POST['penjual']	 == "Non")
		{
			$value = $this->cekLUnas_non($_POST['id_transaction']);
			if ($value == 0)
			{

				$id['POPembelian_non'] =  $_POST['id_transaction'];
				$po['StatusPembayaran'] = 'Lunas';
				$po['Status'] = 'Selesai';
				$this->db->update("PembelianNonPertamina",$po,$id);
			}
		}

		$this->db->trans_complete();

		$result =1;
		
		print json_encode($result);
	}
	
	/*
	function simpan()
	{
		$tgl_sekarang = date("Y/m/d");
		$result=0;
		
		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode + 1;

		$arrSubAkunJurnal = $_POST['dataSubAkunJurnal'];
		$arrDebitJurnal = $_POST['dataDebitJurnal'];
		$arrKreditJurnal = $_POST['dataKreditJurnal'];
		$result = count($arrSubAkunJurnal);
		$st = $_POST['st'];
		
		$idJurnal=  $this->kode_inc($kode);	
		$this->db->trans_start();
		for($i=0;$i<$result;$i++)
		{
			$dt['ID_JOURNALS'] = $idJurnal;	
			$dt['note'] = $_POST['note'];
			$dt['date_transaction'] = $_POST['date_transaction'];
			$dt['date_input'] = $tgl_sekarang;
			$dt['id_transaction'] = $_POST['id_transaction'];
			$dt['ID_ACT'] = $arrSubAkunJurnal[$i];
			$dt['DEBIT'] = $arrDebitJurnal[$i];
			$dt['CREDIT'] = $arrKreditJurnal[$i];
				
			$this->db->insert("journals",$dt);
		}	

		if ($st == 'pelunasan_pertamina')
		{
			$value = $this->cekLUnas($_POST['id_transaction']);
			if ($value == 0)
			{
				$id['POPembelian'] =  $_POST['id_transaction'];
				$po['StatusPembayaran'] = 'Lunas';
				$po['Status'] = 'Selesai';
				$this->db->update("PembelianPertamina",$po,$id);
			}
		}
		else if ($st == 'pelunasan_non_pertamina')
		{
			$value = $this->cekLUnas_non($_POST['id_transaction']);
			if ($value == 0)
			{

				$id['POPembelian_non'] =  $_POST['id_transaction'];
				$po['StatusPembayaran'] = 'Lunas';
				$po['Status'] = 'Selesai';
				$this->db->update("PembelianNonPertamina",$po,$id);
			}
		}

		$this->db->trans_complete();
		
		print json_encode($result);
	}
	*/
	function printOut()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTable'] = $this->app_load_data_table->getAllData();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('jurnal/printOut', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function cekLUnas($po)
	{
		$value = 0;
		$row = $this->db->query("Select
                                    TotalHarga -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION='$po' AND  NOTE='Pelunasan Hutang') as Kurang
                                    From PembelianPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel 
	    	 						left outer join invoicepertamina i on pp.popembelian = i.popembelian
	    	 						where StatusPembayaran='Hutang' and pp.POPembelian='$po'")->row();
		if ($row) {
		    $value = $row->Kurang; 
		}
		return $value;
	}
	function cekLUnas_non($po)
	{
		$value = 0;
		$row = $this->db->query("Select
                                    Total -
									(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION='$po' AND  NOTE='Pelunasan Hutang') as Kurang
									From PembelianNonPertamina pp 
	    	 						inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
	    	 						inner join MstKapal k on pp.IdVessel = k.IdVessel
	    	 						inner join MstSupplier s on pp.IdSupplier = s.IdSupplier
	    	 						where StatusPembayaran='Hutang' and pp.POPembelian_non='$po'")->row();
		if ($row) {
		    $value = $row->Kurang; 
		}
		return $value;
	}
	function getDataById()
	{
		$id = $_GET['id'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataById($id);

		print json_encode($dataTable);	

	}

	function getDataAll()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData();

		print json_encode($dataTable);	

	}

	function hapus()
	{
		$id = $_GET['id'];
		$where['id_category_journals'] = $id;
		$this->db->delete("journals_category",$where);
		$result = $this->db->affected_rows();
		if ($result > 0)
		{
			$return = 1;
		}
		else
		{
			$return	= 0;
		}	

		print json_encode($return);
   	}

   	function kode_inc($id)
	{
		$code = 'JU';
		$code .= sprintf("%09s", $id);
		return $code;
	}

	function kode_inc2($id)
	{
		$code = 'J';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(ID_JOURNALS,9)) AS maxid FROM journals')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_id2() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(ID_JOUR,9)) AS maxid FROM journals')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
	
	function get_idSetting($idBBM) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSettingId='$idBBM'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_idSettingHutangPertamina() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSetting='Hutang Dagang Pertamina'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_idSettingHutangNon() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSetting='Hutang Dagang Non Agen'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
