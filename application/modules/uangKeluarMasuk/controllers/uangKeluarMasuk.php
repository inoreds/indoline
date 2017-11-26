<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uangKeluarMasuk extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTable'] = $this->app_load_data_table->getAllData();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('uangKeluarMasuk/content', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function pdf_jkm($id)
    {
		$this->load->model('/m_printout');
        $html = $this->m_printout->pdf_jkm($id);
        $this->load->library("pdf");
        $this->pdf->set_paper('letter', 'potrait');
        	$this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("BuktiKas.pdf");
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

		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode2 + 1;

		$dt['date_transaction'] = $_POST['tglTransaksi'];
		$dt['date_input'] = $tgl_sekarang;
		$dt['ID_JOURNALS'] =  $this->kode_inc($kode);	
		
		$dt['note'] = "Uang Masuk & Keluar";	
		$this->db->trans_start();
		
		if($_POST['tipeKas'] == 'Kas Masuk')
		{
			$dt['ID_ACT'] =  $_POST['namaKasBank'];
			$dt['DEBIT'] = $_POST['jumlah'];
			$dt['CREDIT'] =  0;
			$this->db->insert("journals",$dt);

			$dt['ID_ACT'] = $_POST['keteranganKas'];
			$dt['DEBIT'] = 0;
			$dt['CREDIT'] = $_POST['jumlah'];
			$this->db->insert("journals",$dt);
		}
		else if ($_POST['tipeKas'] == "Kas Keluar")
		{	

			$dt['ID_ACT'] =  $_POST['keteranganKas'];
			$dt['DEBIT'] = $_POST['jumlah'];
			$dt['CREDIT'] =  0;
			$this->db->insert("journals",$dt);

			$dt['ID_ACT'] = $_POST['namaKasBank'];
			$dt['DEBIT'] = 0;
			$dt['CREDIT'] = $_POST['jumlah'];
			$this->db->insert("journals",$dt);
		}

		$kas['IdKas'] = $kode2;	
		$kas['TglTransaksi'] = $_POST['tglTransaksi'];
		$kas['TipeKas'] = $_POST['tipeKas'];
		$kas['Uraian'] = $_POST['uraian'];
		$kas['Jumlah'] = $_POST['jumlah'];

		$kas['TglJatuhTempo'] = $_POST['tglJatuhTempo'];
		$kas['noCekBG'] = $_POST['NoCekBG'];
		$kas['JenisPembayaran'] = $_POST['jenisPembayaran'];
		$kas['UntukDari'] = $_POST['untukDari'];

		$kas['Konfirmasi']  = $_POST['konfirmasi'];
		$kas['Kontrol'] = $_POST['kontrol'];
		$kas['Catat'] = $_POST['catat'];
		$kas['ID_JOURNALS'] =  $this->kode_inc($kode);	
		$this->db->insert("Kas",$kas);
		$this->db->trans_complete();
		print json_encode($result);
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
		$code = 'KAS';
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
		$row = $this->db->query('SELECT MAX(right(IdKas,9)) AS maxid FROM Kas')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_idSetting() 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSetting='Kas'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
	
}
