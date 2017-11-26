<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class trnPemakaianBBM extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTablePO'] = $this->app_load_data_table->getAllData();	
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPemakaianBBM/content', $d);	
			$this->load->view('trnPemakaianBBM/modal_PO', $d);	
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
		$result=0;
		$kode = $this->get_id();
		$kode = $kode + 1;
		
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['SSMV'] = $_POST['ssmv'];
		$dt['Date'] = $_POST['date'];
		$dt['Port'] = $_POST['port'];
		$dt['LiterOBS'] = $_POST['literOBS'];
		$dt['idBBM'] = $_POST['gradeOfOil'];
		$dt['Temperatur_F'] = $_POST['temperatur_F'];
		$dt['Temperatur_C'] = $_POST['temperatur_C'];
		$dt['SpecificGravity'] = $_POST['specificGravity'];
		$dt['SpecificGravity_F'] = $_POST['specificGravity_F'];
		$dt['SpecificGravity_C'] = $_POST['specificGravity_C'];
		$dt['SpecificGravity60_C'] = $_POST['specificGravity60_C'];
		$dt['FlashPoint'] = $_POST['flashPoint'];
		$dt['FlashPoint_C'] = $_POST['flashPoint_C'];
		$dt['Water'] = $_POST['water'];
		$dt['Aproximate'] = $_POST['aproximate'];
		//$dt['lighter'] = $_POST['lighter'];
		$dt['NamaPengawas'] = $_POST['namaPengawas'];
		$dt['ChiefEnginer'] = $_POST['chiefEnginer'];


		$qty = $_POST['literOBS'];

		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['gradeOfOil'];
		//$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu['TglTransaksi'] =  $_POST['date'];
		$kartu['Keterangan'] = "Pemakaian BBM Kapal";
		$kartu['Debit'] = 0;
		$kartu['Kredit'] = $qty;

		
		$st = $_POST['st'];

		if($st=="tambah")
		{
			$dt['NoPO'] = $this->kode_inc($kode);
			$this->db->insert("Pemakaianbbm",$dt);

			$this->db->where('IdVessel', $_POST['idVessel']);
			$this->db->where('IdBBM', $_POST['gradeOfOil']);
			$this->db->set('Stok', 'Stok- ' . (int)$qty, FALSE);
			$this->db->update('StokBBM');

			$this->db->insert("KartuStokBBM",$kartu);

			$result =1;
		   
		}
		else
		{
			alert('fakyoeh');
			//$id['POPembelian_non'] = $st;
			//$this->db->update("PembelianNonPertamina",$dt,$id);
			//$result=1;
		}	
		print json_encode($result);	
	}
	

	function cekStok($idVessel, $idBBM)
	{
		$count = 0;
		$row = $this->db->query("SELECT count(*) AS count FROM StokBBM where IdVessel='$idVessel'  and IdBBM='$idBBM'")->row();
		if ($row) {
		    $count = $row->count; 
		}
		return $count;
	}

	function getDataById()
	{
		$id = $_GET['id'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataById($id);

		print json_encode($dataTable);	

	}
	
	// function getCustomerById()
	// {
		// $id = $_GET['id'];
		// $this->load->model('/app_load_data_table');
		// $dataTable2 = $this->app_load_data_table->getCustomerById($id);

		// print json_encode($dataTable2);	

	// }

	function hapus()
	{
		$id = $_GET['id'];
		$where['POPembelian_non'] = $id;
		$this->db->delete("PembelianNonPertamina",$where);
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
		$code = 'P0P';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(NoPO,9)) AS maxid FROM Pemakaianbbm')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
	

	
}
