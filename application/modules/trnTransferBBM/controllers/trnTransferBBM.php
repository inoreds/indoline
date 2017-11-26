<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class trnTransferBBM extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTablePO'] = $this->app_load_data_table->getAllData();
			$d['dataTablePO2'] = $this->app_load_data_table->getAllData2();	
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnTransferBBM/content', $d);	
			$this->load->view('trnTransferBBM/modal_PO', $d);	
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
		
		//$dt1['idVessel'] = $_POST['idVessel'];
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
		$kartu['TglTransaksi'] =  $_POST['date'];
		$kartu['Keterangan'] = "Transfer BBM ";
		$kartu['Debit'] = 0;
		$kartu['Kredit'] = $qty;

		$kartu2['idVessel'] = $_POST['ssmv'];
		$kartu2['idBBM'] = $_POST['gradeOfOil'];
		$kartu2['TglTransaksi'] =  $_POST['date'];
		$kartu2['Keterangan'] = "Transfer BBM ";
		$kartu2['Debit'] = $qty;
		$kartu2['Kredit'] = 0;

		
		$st = $_POST['st'];

		if($st=="tambah")
		{
			$dt['NoTransferBBM'] = $this->kode_inc($kode);
			$this->db->insert("transferbbm",$dt);

			$this->db->where('IdVessel', $_POST['idVessel']);
			$this->db->where('IdBBM', $_POST['gradeOfOil']);
			$this->db->set('Stok', 'Stok- ' . (int)$qty, FALSE);
			$this->db->update('StokBBM');

			//$dt1['NoTransferBBM'] = $this->kode_inc($kode);
			//$this->db->insert("transferbbm-from",$dt1);

			$this->db->where('idVessel', $_POST['ssmv']);
			$this->db->where('IdBBM', $_POST['gradeOfOil']);
			$this->db->set('Stok', 'Stok+ ' . (int)$qty, FALSE);
			$this->db->update('StokBBM');

			$this->db->insert("KartuStokBBM",$kartu);
			$this->db->insert("KartuStokBBM",$kartu2);

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
		$code = 'TR';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(NoTransferBBM,9)) AS maxid FROM transferbbm')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
	

	
}
