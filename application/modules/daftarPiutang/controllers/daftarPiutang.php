<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftarPiutang extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['datatable'] = $this->app_load_data_table->getAllData();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('daftarPiutang/content', $d);			
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
		$note = "Pendaftaran Piutang";
		$akunPiutang = $this->get_idSettingAkunPiutang();
		
		
		
		$this->db->trans_start();

		$idJurnal=  $this->kode_inc($kode);	
		
		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['tgl'];
		$dt['id_transaction'] = $_POST['id'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] = $akunPiutang;
		$dt['DEBIT'] = $_POST['kurang'];
		$dt['CREDIT'] =  0;
		$this->db->insert("journals",$dt);

		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['tgl'];
		$dt['id_transaction'] = $_POST['id'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] =  $this->get_idSettingAkunPenjualan();
		$dt['DEBIT'] = 0;
		$dt['CREDIT'] = $_POST['kurang'];	
		$this->db->insert("journals",$dt);	

		//----hpp

		$idJurnal=  $this->kode_inc($kode);	
		
		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['tgl'];
		$dt['id_transaction'] = $_POST['id'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] = $this->get_idSettingAkunHPP();
		$dt['DEBIT'] = $_POST['totalHPP'];
		$dt['CREDIT'] =  0;
		$this->db->insert("journals",$dt);

		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['tgl'];
		$dt['id_transaction'] = $_POST['id'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] =  $this->get_idSetting($_POST['idBBM']);
		$dt['DEBIT'] = 0;
		$dt['CREDIT'] = $_POST['totalHPP'];	
		$this->db->insert("journals",$dt);

		$this->db->trans_complete();

		$result =1;
		
		print json_encode($result);
	}

	function lunasiPiutang()
	{
		$result=0;
		$tgl_sekarang = date("Y/m/d");
		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode + 1;
		$note = "";
		$akunPiutang = $this->get_idSettingAkunPiutang();
		
		$idJurnal=  $this->kode_inc($kode);	
		$note = "Pelunasan Piutang";
		
		$idJurnal=  $this->kode_inc($kode);	
		
		$this->db->trans_start();
		
		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['date_transaction'];
		$dt['id_transaction'] = $_POST['id_transaction'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] =  $_POST['akunBank'];
		$dt['DEBIT'] = $_POST['jumlahPembayaran'];
		$dt['CREDIT'] =  0;
		$this->db->insert("journals",$dt);

		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['date_transaction'] = $_POST['date_transaction'];
		$dt['id_transaction'] = $_POST['id_transaction'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] = $akunPiutang;
		$dt['DEBIT'] = 0;
		$dt['CREDIT'] = $_POST['jumlahPembayaran'];	
		$this->db->insert("journals",$dt);	

		$value = $this->cekLUnas($_POST['id_transaction']);
		if ($value == 0)
		{
			$noPo = substr($_POST['id_transaction'],0,12);
			$detilNumber = substr($_POST['id_transaction'],12);
			
			$id['NoPoCustomer'] =  $noPo;
			$id['DetilNumber'] = $detilNumber;
			
			$po['StatusPembayaran'] = 'Lunas';
			$po['Status'] = 'Selesai';
			$this->db->update("PenjualanBBM_detil",$po,$id);
		}	

		$this->db->trans_complete();

		$result =1;
		
		print json_encode($result);
	}	

	function kwitansi()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id = $_GET['id'];
			$this->load->helper("terbilang");
			$this->load->model('/app_load_data_table');

			$row = $this->app_load_data_table->getAllData_id($id);	
			if ($row) 
			{
		   		$d['untukPembayaran'] = 'Pembelian BBM';
				$d['pelanggan'] =$row->NamaCustomer ;
				$d['total'] = $row->Total;
				$d['terbilang'] = ucwords(number_to_words($row->Total));
				$d['tglSupply'] = $row->TglAwalSupply;
				$d['lokasiSupply'] = "-";
				$d['hargaMBA']	 = "-";
				$d['tglSekarang'] = "-";
		   	}

			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			

			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('daftarPiutang/kwitansi', $d);	
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	/*
	function simpan()
	{
		$result=0;
		
		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode + 1;

		$arrSubAkunJurnal = $_POST['dataSubAkunJurnal'];
		$arrDebitJurnal = $_POST['dataDebitJurnal'];
		$arrKreditJurnal = $_POST['dataKreditJurnal'];
		$result = count($arrSubAkunJurnal);

		
		$idJurnal=  $this->kode_inc($kode);	
		$this->db->trans_start();
		for($i=0;$i<$result;$i++)
		{
			$dt['ID_JOURNALS'] = $idJurnal;	
			$dt['note'] = $_POST['note'];
			$dt['date_transaction'] = $_POST['date_transaction'];
			$dt['ID_ACT'] = $arrSubAkunJurnal[$i];
			$dt['DEBIT'] = $arrDebitJurnal[$i];
			$dt['CREDIT'] = $arrKreditJurnal[$i];
				
			$this->db->insert("journals",$dt);
		}	
		$this->db->trans_complete();

	
		$st = $_POST['st'];
		
		
		print json_encode($result);
	}
	*/
	function simpan()
	{
		$tgl_sekarang = date("Y/m/d");
		$result=0;
		$totalDebit=0;

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
			$totalDebit = $totalDebit + $arrKreditJurnal[$i];	
			$this->db->insert("journals",$dt);
		}	

		if ($st == 'pelunasan')
		{
			$value = $this->cekLUnas($_POST['id_transaction']);
			if ($value == 0)
			{
				$noPo = substr($_POST['id_transaction'],0,11);
				$detilNumber = substr($_POST['id_transaction'],11,2);
				
				$id['NoPoCustomer'] =  $noPo;
				$id['DetilNumber'] = $detilNumber;
				
				$po['StatusPembayaran'] = 'Lunas';
				$po['Status'] = 'Selesai';
				$this->db->update("PenjualanBBM_detil",$po,$id);
			}
			
		}
		$this->db->trans_complete();
		
		print json_encode($result);
	}
	
	function cekLUnas($noPoCustomer)
	{
		$value = 0;
		$row = $this->db->query("Select SubTotal -
								(select IFNULL(sum(debit),0) from journals where ID_TRANSACTION='$noPoCustomer' AND  NOTE='Pelunasan Piutang') as Kurang
								From PenjualanBBM p, PenjualanBBM_detil pd, MstCustomer c
								where p.IdCustomer = c.IdCustomer and pd.NoPoCustomer = p.NoPoCustomer 
								and concat(pd.NoPoCustomer,DetilNumber)	='$noPoCustomer'
								and pd.StatusPembayaran='Piutang'")->row();
		if ($row) {
		    $value = $row->Kurang; 
		}
		return $value;
	}

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

	function get_idSettingAkunPiutang() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSetting='Piutang Usaha'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_idSettingAkunPenjualan() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where IdSetting='SET008'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_idSettingAkunHPP() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where IdSetting='SET009'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_hppValue($idBBM)
	{
		
	}

}
