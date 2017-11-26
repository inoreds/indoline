<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class trnReturPembelian extends CI_Controller {

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
			$this->load->view('trnReturPembelian/content', $d);	
			$this->load->view('trnReturPembelian/modal_PO', $d);	
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
		
		$dt['noPO'] = $_POST['noPo'];
		$dt['TglTransaksi'] = $_POST['tglTransaksi'];
		$dt['IdSupplier'] = $_POST['idSupplier'];
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['idBBM'] = $_POST['idBBM'];
		$dt['qty'] = $_POST['jumlahPermintaan'];
		$dt['hargaBeli'] = $_POST['hargaBeli'];
		//$dt['hargaPenjualan'] = $_POST['hargaPenjualan'];
		//$dt['jenisPembayaran'] = $_POST['jenisPembayaran'];
		$dt['total'] = $_POST['total'];
		$dt['Keterangan'] = $_POST['keterangan'];
		$qty = $_POST['jumlahPermintaan'];

		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['idBBM'];
		//$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu['TglTransaksi'] =  $_POST['tglTransaksi'];
		$kartu['Keterangan'] = "Retur Pembelian";
		$kartu['Debit'] = 0;
		$kartu['Kredit'] = $qty;

		$this->db->where('IdVessel', $_POST['idVessel']);
		$this->db->where('IdBBM', $_POST['idBBM']);
		$this->db->set('Stok', 'Stok- ' . (int)$qty, FALSE);
		$this->db->update('StokBBM');

		$this->db->insert("KartuStokBBM",$kartu);

		$this->db->insert("retur_pembelian",$dt);	
		
		print json_encode($result);
	}
	
	function prosesPOPembelian_non()
	{
		$qty = $_POST['total'];
		$stok['idVessel'] = $_POST['idVessel'];
		$stok['idBBM'] = $_POST['idBBM'];
		$stok['stok'] = $_POST['total'];

		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['idBBM'];
		$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu['Keterangan'] = "Pembelian Non Pertamina";
		$kartu['Debit'] = $qty ;
		$kartu['Kredit'] = 0;

		$bbm_id['POPembelian_non'] = $_POST['poPembelian'];
		$bbm['Status'] = "Barang Diterima";

		$count = $this->cekStok($stok['idVessel'], $stok['idBBM']);	

		$this->db->trans_start();
		$this->db->update("PembelianNonPertamina",$bbm,$bbm_id);
		if($count == 0 )
		{
			$this->db->insert("StokBBM",$stok);	
			$this->db->insert("KartuStokBBM",$kartu);		
		}
		else 
		{
			$this->db->where('IdVessel', $_POST['idVessel']);
			$this->db->where('IdBBM', $_POST['idBBM']);
			$this->db->set('Stok', 'Stok+ ' . (int)$qty, FALSE);
			$this->db->update('StokBBM');	

			$this->db->insert("KartuStokBBM",$kartu);	
		}
		$this->db->trans_complete();

		print 1;
	}
	/*
	function getPO()
	{
		$noPO = $_GET['noPO'];

		$this->load->model('/m_pdf');
        $html = $this->m_pdf->pdf_ppn($noPO);
        $this->load->library("pdf");
        $this->pdf->set_paper('letter', 'potrait');
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("PO.pdf");
	}
	*/
	function getPO()
	{
	
		$this->load->model('/app_load_data_table');
        $row = $this->app_load_data_table->getPO($_GET['noPO']);	
		if ($row) 
		{
	   		$d['noPO'] 				= $row->POPembelian_non;
			$d['namaSupplier'] 		= $row->NamaSupplier;
			$d['emailSupplier'] 	= $row->EmailSupplier;
			$d['vesselName'] 		= $row->VesselName;
			$d['portSource'] 		= $row->PortSource;
			$d['tglPengisian'] 		= $row->TglPengisian;
			$d['namaBBM']	 		= $row->NamaBBM;
			$d['jumlahPermintaan'] 	= $row->NamaBBM;
			$d['hargaPenjualan'] 	= $row->JumlahPermintaan;
			$d['HargaBeli'] 		= $row->HargaBeli;
			$d['tglPO'] 			= $row->TelpSupplier;
			$d['telpSupplier'] 		= $row->TelpSupplier;
			$d['contactPerson'] 	= $row->ContactPerson;
			$d['phoneNumber'] 		= $row->PhoneNumber;
			$d['telpSupplier'] 		= $row->TelpSupplier;
			$d['namaPerusahaan'] 	= $row->NamaPerusahaan;
			$d['namaCustomer'] 		= $row->NamaCustomer;
			$d['SyaratPembayaran'] 	= $row->SyaratPembayaran;
			$d['WilayahSupply'] 	= $row->WilayahSupply;
			$d['PBBKBWilayah'] 		= $row->PBBKBWilayah;
			//$d['namaPerusahaan'] 	= "PT. INDOLINE INCOMEKITA";
			$ppn 					= $row->JenisPPN;

        }		   	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			
			if ($ppn == "PPn") {
				$this->load->view('trnPembelianNonPertamina/POPembelianPPn', $d);	

			} else {

				$this->load->view('trnPembelianNonPertamina/POPembelianNonPPn', $d);	
			}
			$this->load->view('dashboard/bg_footer', $d);
			
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
		$code = 'PON';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(POPembelian_non,9)) AS maxid FROM PembelianNonPertamina')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
	

	
}
