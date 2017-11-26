<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trnPembelianBarangKapal extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTableInvoice'] = $this->app_load_data_table->getAllData();	
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPembelianBarangKapal/content', $d);	
			$this->load->view('trnPembelianBarangKapal/modal_invoice');			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function simpan()
	{
		
		$result	= 0;
		$kode 	= $this->get_id();
		$kode 	= $kode + 1;

		//$arrTanggalPembelian = explode(';',$_POST['tglPembelian']);
		$arrNamaBarang = explode(';',$_POST['namaBarang']);
		$arrJumlah = explode(';' , $_POST['jumlah']);
		$arrIdSatuan= explode(';' , $_POST['idSatuan']);
		$arrHargaSatuan = explode(';' , $_POST['hargaSatuan']);
		$arrHargaTotal = explode(';' , $_POST['hargaTotal']);
		$result = count($arrNamaBarang);

		$noPO	 = $this->kode_inc($kode);
		$dt['tglPembelian'] = $_POST['tglPembelian'];
		//$dt['idVessel'] = $_POST['idVessel'];
		$dt['POPembelian_barangKapal'] = $noPO;
		$this->db->trans_start();

		$this->db->insert("PembelianBarangKapal",$dt);
		
		for($i=0;$i<$result;$i++)
		{
			$detil['POPembelian_barangKapal'] = $dt['POPembelian_barangKapal'];
			$detil['detilNumber'] = $i + 1;
			$detil['namaBarang'] = $arrNamaBarang[$i];
			$detil['jumlah'] = $arrJumlah[$i];
			$detil['idSatuan'] = $arrIdSatuan[$i];
			$detil['hargaSatuan'] = $arrHargaSatuan[$i];
			$detil['hargaTotal'] = $arrHargaTotal[$i];
			$this->db->insert("PembelianBarangKapal_detil",$detil);
		}	
		
		$this->db->trans_complete();
		print $id_pesanan;	
		//print json_encode($result);
	}

	function kode_inc($id)
	{
		$code = 'POBK';
		$code .= sprintf("%09s", $id);
		return $code;
	}

	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(POPembelian_barangKapal,9)) AS maxid FROM PembelianBarangKapal')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
