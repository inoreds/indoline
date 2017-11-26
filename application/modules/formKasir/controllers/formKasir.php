<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formKasir extends CI_Controller {

	
	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('formKasir/content', $d);			
			$this->load->view('formKasir/modal_bank_lainnya', $d);		
			$this->load->view('formKasir/modal_kas_lainnya', $d);			
			$this->load->view('formKasir/modal_bank_piutang', $d);		
				
			$this->load->view('formKasir/modal_bank_hutang', $d);		
			$this->load->view('dashboard/bg_footer', $d);

				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
			
	}

	function simpanBankPiutang()
	{
		if($this->session->userdata("logged_in")!="")
		{
		
			$result=0;
		$tgl_sekarang = date("Y/m/d");
		$kode = $this->get_id();
		$kode = $kode + 1;

		$note = "";
		$akunPiutang = $this->get_idSettingAkunPiutang();
		
		$idJurnal=  $this->kode_inc($kode);	
		$note = "Pelunasan Piutang";
		
		$idJurnal=  $this->kode_inc($kode);	
		
		$this->db->trans_start();
		
		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['note_2'] = "Transaksi Bank Masuk";
		$dt['note_3'] = $_POST['keteranganBank'];
		$dt['date_transaction'] = $_POST['tglTransaksiBank'];
		$dt['id_transaction'] = $_POST['idTransaction'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] =  $_POST['akunBank'];
		$dt['DEBIT'] = $_POST['jumlahPembayaran'];
		$dt['CREDIT'] =  0;
		$this->db->insert("journals",$dt);

		$dt['ID_JOURNALS'] = $idJurnal;	
		$dt['note'] = $note;
		$dt['note_2'] = "Transaksi Bank Masuk";
		$dt['note_3'] = $_POST['keteranganBank'];
		$dt['date_transaction'] = $_POST['tglTransaksiBank'];
		$dt['id_transaction'] = $_POST['idTransaction'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_ACT'] = $akunPiutang;
		$dt['DEBIT'] = 0;
		$dt['CREDIT'] = $_POST['jumlahPembayaran'];	
		$this->db->insert("journals",$dt);	

		$value = $this->cekLUnas($_POST['idTransaction']);
		if ($value == 0)
		{
			$noPo = substr($_POST['idTransaction'],0,12);
			$detilNumber = substr($_POST['idTransaction'],12);
			
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
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}


	function simpanBank()
	{
		if($this->session->userdata("logged_in")!="")
		{
		
			$total = 0;
			$tgl_sekarang = date("Y/m/d");
			$kode = $this->get_id();
			$kode = $kode + 1;
			$idJurnal=  $this->kode_inc($kode);	
			$arrSubAkun = explode(';' , $_POST['arrSubAkun']);
			$arrNominal = explode(';' , $_POST['arrNominal']);
			$arrKeterangan = explode(';' , $_POST['arrKeterangan']);
			$result = count($arrSubAkun);
		
			if ($_POST['tipeBank'] == 'Bank Masuk') {
				for($i=0;$i<$result;$i++)
				{
					$total =  $total + $arrNominal[$i];
				}
				
				$idJurnal=  $this->kode_inc($kode);	
				$this->db->trans_start();

				$dt['ID_JOURNALS'] = $idJurnal;	
				$dt['note_2'] = "Transaksi Bank Masuk";
				$dt['note_3'] = $_POST['keteranganBank'];
				$dt['id_transaction'] = null;
				$dt['date_input'] = $tgl_sekarang;
				$dt['date_transaction'] = $_POST['tglTransaksiBank'];
				$dt['ID_ACT'] = $_POST['akunBank'];
				$dt['DEBIT'] = $total;
				$dt['CREDIT'] = 0;

				$this->db->insert("journals",$dt);

				for($i=0;$i<$result;$i++)
				{
					$dt['ID_JOURNALS'] = $idJurnal;	
					$dt['note_2'] = "Transaksi Bank Masuk";
					$dt['note_3'] = $arrKeterangan[$i];
					$dt['id_transaction'] = null;
					$dt['date_input'] = $tgl_sekarang;
					$dt['date_transaction'] = $_POST['tglTransaksiBank'];
					$dt['ID_ACT'] = $arrSubAkun[$i];
					$dt['DEBIT'] = 0;
					$dt['CREDIT'] = $arrNominal[$i];
						
					$this->db->insert("journals",$dt);
				}	
				$this->db->trans_complete();

			} else {
				
				for($i=0;$i<$result;$i++)
				{
					$total =  $total + $arrNominal[$i];
				}
				
				$idJurnal=  $this->kode_inc($kode);	
				$this->db->trans_start();

				$dt['ID_JOURNALS'] = $idJurnal;	
				$dt['note_2'] = "Transaksi Bank Keluar";
				$dt['note_3'] =  $_POST['keteranganBank'];
				$dt['id_transaction'] = null;
				$dt['date_input'] = $_POST['tglTransaksiBank'];
				$dt['date_transaction'] = $_POST['tglTransaksiBank'];
				$dt['ID_ACT'] = $_POST['akunBank'];
				$dt['DEBIT'] = 0;
				$dt['CREDIT'] = $total;

				$this->db->insert("journals",$dt);

				for($i=0;$i<$result;$i++)
				{
					$dt['ID_JOURNALS'] = $idJurnal;	
					$dt['note_2'] = "Transaksi Bank Keluar";
					$dt['note_3'] = $arrKeterangan[$i];
					$dt['id_transaction'] = null;
					$dt['date_input'] = $tgl_sekarang;
					$dt['date_transaction'] = $_POST['tglTransaksiBank'];
					$dt['ID_ACT'] = $arrSubAkun[$i];
					$dt['DEBIT'] = $arrNominal[$i];
					$dt['CREDIT'] = 0;
						
					$this->db->insert("journals",$dt);
				}	
				$this->db->trans_complete();
			}

			print $idJurnal;		
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}


	function simpanKas()
	{
		if($this->session->userdata("logged_in")!="")
		{
		
			$total = 0;
			$tgl_sekarang = date("Y/m/d");
			$kode = $this->get_id();
			$kode = $kode + 1;
			$idJurnal=  $this->kode_inc($kode);	
			
			$arrSubAkun = explode(';' , $_POST['arrSubAkun']);
			$arrNominal = explode(';' , $_POST['arrNominal']);
			$arrKeterangan = explode(';' , $_POST['arrKeterangan']);
			$result = count($arrSubAkun);

			if ($_POST['tipeKas'] == 'Kas Masuk') {
				for($i=0;$i<$result;$i++)
				{
					$total =  $total + $arrNominal[$i];
				}
				
				$idJurnal=  $this->kode_inc($kode);	
				$this->db->trans_start();

				$dt['ID_JOURNALS'] = $idJurnal;	
				$dt['note_2'] = "Transaksi Kas Masuk";
				$dt['note_3'] = $_POST['keteranganKas'];
				$dt['id_transaction'] = null;
				$dt['date_input'] = $tgl_sekarang;
				$dt['date_transaction'] = $_POST['tglTransaksiKas'];
				$dt['ID_ACT'] = $_POST['akunKas'];
				$dt['DEBIT'] = $total;
				$dt['CREDIT'] = 0;

				$this->db->insert("journals",$dt);

				for($i=0;$i<$result;$i++)
				{
					$dt['ID_JOURNALS'] = $idJurnal;	
					$dt['note_2'] = "Transaksi Kas Masuk";
					$dt['note_3'] = $arrKeterangan[$i];
					$dt['id_transaction'] = null;
					$dt['date_input'] = $tgl_sekarang;
					$dt['date_transaction'] = $_POST['tglTransaksiKas'];
					$dt['ID_ACT'] = $arrSubAkun[$i];
					$dt['DEBIT'] = 0;
					$dt['CREDIT'] = $arrNominal[$i];
						
					$this->db->insert("journals",$dt);
				}	
				$this->db->trans_complete();

			} else {
				for($i=0;$i<$result;$i++)
				{
					$total =  $total + $arrNominal[$i];
				}
				
				$idJurnal=  $this->kode_inc($kode);	
				$this->db->trans_start();

				$dt['ID_JOURNALS'] = $idJurnal;	
				$dt['note_2'] = "Transaksi Kas Keluar";
				$dt['note_3'] = $_POST['keteranganKas'];
				$dt['id_transaction'] = null;
				$dt['date_input'] = $tgl_sekarang;
				$dt['date_transaction'] = $_POST['tglTransaksiKas'];
				$dt['ID_ACT'] = $_POST['akunKas'];
				$dt['DEBIT'] = 0;
				$dt['CREDIT'] = $total;

				$this->db->insert("journals",$dt);

				for($i=0;$i<$result;$i++)
				{
					$dt['ID_JOURNALS'] = $idJurnal;	
					$dt['note_2'] = "Transaksi Kas Keluar";
					$dt['note_3'] = $arrKeterangan[$i];
					$dt['id_transaction'] = null;
					$dt['date_input'] = $tgl_sekarang;
					$dt['date_transaction'] = $_POST['tglTransaksiKas'];
					$dt['ID_ACT'] = $arrSubAkun[$i];
					$dt['DEBIT'] = $arrNominal[$i];
					$dt['CREDIT'] = 0;
						
					$this->db->insert("journals",$dt);
				}	
				$this->db->trans_complete();
			}

			print $idJurnal;		
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}


	function pdf_BBM()
    {
        $id_journals = $_GET['id_journals'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_BBM($id_journals);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("bukti_bank_masuk.pdf");
    }	

	function pdf_BBK()
    {
        $id_journals = $_GET['id_journals'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_BBK($id_journals);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);		
            $this->pdf->render();
            $this->pdf->stream("bukti_bank_keluar.pdf");
    }

    function pdf_BKM()
    {
        $id_journals = $_GET['id_journals'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_BKM($id_journals);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("bukti_kas_masuk.pdf");
    }	

	function pdf_BKK()
    {
        $id_journals = $_GET['id_journals'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_BKK($id_journals);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);		
            $this->pdf->render();
            $this->pdf->stream("bukti_kas_keluar.pdf");
    }	

	function getNominalPiutang()
	{
		$noPoCustomer = substr($_GET['id_transaction'],0,12);
		$detilNumber = substr($_GET['id_transaction'],12);

		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getNominalPiutang($noPoCustomer, $detilNumber);

		print json_encode($dataTable);

	}

	function getHistoryBankKeluarMasuk()
	{
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$jenis_bank = $_GET['jenis_bank'];

		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getHistoryBankKeluarMasuk($tgl_awal, $tgl_akhir, $jenis_bank);

		print json_encode($dataTable);
	}	

	function getHistoryKasKeluarMasuk()
	{
		$tgl_awal = $_GET['tgl_awal'];
		$tgl_akhir = $_GET['tgl_akhir'];
		$jenis_kas = $_GET['jenis_kas'];

		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getHistoryKasKeluarMasuk($tgl_awal, $tgl_akhir, $jenis_kas);

		print json_encode($dataTable);
	}	

	function getDataPiutangCustomer()
	{
		$id_customer = $_GET['id_customer'];


		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataPiutangCustomer($id_customer);

		print json_encode($dataTable);
	}

	function kode_inc($id)
	{
		$code = 'JU';
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

   	function get_idSettingAkunPiutang() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSetting='Piutang Usaha'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
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
	
	
}
