<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trnPembelianPertamina extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTablePO'] = $this->app_load_data_table->getAllData();	
			$d['dataTableInvoice'] = $this->app_load_data_table->getAllDataInvoicePertamina();
			$d['dataTableRecieptForBunker'] = $this->app_load_data_table->getAllDataRecieptForBunker();	
			$d['dataTableInvoice_detil'] = $this->app_load_data_table->getAllDataInvoicePertamina_detil();	

			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPembelianPertamina/content', $d);	
			$this->load->view('trnPembelianPertamina/modal_PO', $d);	
			$this->load->view('trnPembelianPertamina/modal_invoice');			
			$this->load->view('trnPembelianPertamina/modal_do_lo');	
			$this->load->view('trnPembelianPertamina/modal_PONonPertamina');	
			$this->load->view('trnPembelianPertamina/modal_RecieptBunker');			
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
		
		$dt['namaPengaju'] = $_POST['namaPengaju'];
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['hargaBeli'] = $_POST['hargaBeli'];
		$dt['idSupplier'] = $_POST['suplier'];
		//$dt['hargaPenjualan'] = $_POST['hargaPenjualan'];
		$dt['tglPengajuan'] = $_POST['tglPengajuan'];
		$dt['tglPembayaran'] = $_POST['tglPembayaran'];
		//$dt['jenisPembayaran'] = $_POST['jenisPembayaran'];
		$dt['idBBM'] = $_POST['idBBM'];
		$dt['jumlahPermintaan'] = $_POST['jumlahPermintaan'];
		$dt['status'] = 'Baru';
		$dt['totalHarga'] =  $dt['hargaBeli'] * $dt['jumlahPermintaan'];
		$dt['statusPembayaran'] = 'Hutang';
		
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['NoPO'] = $this->generateNoPO();				
			$dt['POPembelian'] = $this->kode_inc($kode);
			$this->db->insert("PembelianPertamina",$dt);
			$result =1;
		   
		}
		else
		{
			$id['POPembelian'] = $st;
			$this->db->update("PembelianPertamina",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}
	
	function simpanNonPertamina()
	{
		$result=0;
		$kode = $this->get_id();
		$kode = $kode + 1;

		$ndt['idVessel'] = $_POST['idVessel'];
		$ndt['NamaPengaju'] = $_POST['NmPengaju'];
		$ndt['hargaBeli'] = $_POST['hargaBeliN'];
		$ndt['hargaPenjualan'] = $_POST['hargaJual'];
		$ndt['tglPengajuan'] = $_POST['tglPengajuanN'];
		$ndt['tglPembayaran'] = $_POST['tglPembayaranN'];
		$ndt['idSupplier'] = $_POST['idSupplier'];
		$ndt['tglPengisian'] = $_POST['tglPengisianN'];
		$ndt['portSource'] = $_POST['portSource'];		
		$ndt['idBBM'] = $_POST['idBBM2'];
		$ndt['jumlahPermintaan'] = $_POST['jumlahPermintaanN'];
		$ndt['totalHarga'] = $ndt['hargaBeli']  * $ndt['jumlahPermintaan'];
		$ndt['jenisppn'] = $_POST['jenisppn'];
		$ndt['idPBBKB'] = $_POST['idPBBKB'];
		$ndt['contactperson'] = $_POST['contactperson'];
		$ndt['phonenumber'] = $_POST['phonenumber'];
		//$dt['WilayahSupply'] = $_POST['WilayahSupply'];
		//$dt['PBBKBWilayah'] = $_POST['PBBKBWilayah'];
		$ndt['BiayaKirim'] = $_POST['biayakirim'];
		$ndt['status'] = 'Baru';
		$ndt['statusPembayaran'] = 'Hutang';
		$ndt['SyaratPembayaran'] = $_POST['SyaratPembayaran'];
		
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$ndt['NoPO'] = $this->generateNoPO();	
			$ndt['POPembelian'] = $this->kode_inc($kode);
			$this->db->insert("PembelianPertamina",$ndt);
			$result =1;
		   
		}
		else
		{
			$id['POPembelian'] = $st;
			$this->db->update("PembelianPertamina",$ndt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function getDataById()
	{
		$id = $_GET['id'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataById($id);

		print json_encode($dataTable);	

	}

	function hapus()
	{
		$id = $_GET['id'];
		$where['POPembelian'] = $id;
		$this->db->delete("PembelianPertamina",$where);
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
		$code = 'PO';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(POPembelian,9)) AS maxid FROM PembelianPertamina')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function generateNoPO()
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(POPembelian,9)) AS maxid FROM PembelianPertamina where YEAR(tglPengajuan) = YEAR(CURDATE()) and MONTH(tglPengajuan) = MONTH(CURDATE())')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}

		$maxid	= intval(preg_replace('/[^0-9]+/', '', $maxid), 10)	;
		$po = sprintf("%03s", $maxid)."/LI/SBY/".$this->getMonthRomawi()."/".date('Y');			

		return $po;
	}

	function getMonthRomawi()
	{
		$month = "I";

		if (date('n') == 1)
		{
			$month = "I";	
		}
		else if (date('n') == 2)
		{
			$month = "II";	
		}	
		else if (date('n') == 3)
		{
			$month = "III";	
		}
		else if (date('n') == 4)
		{
			$month = "IV";	
		}
		else if (date('V') == 5)
		{
			$month = "V";	
		}
		else if (date('n') == 6)
		{
			$month = "VI";	
		}
		else if (date('n') == 7)
		{
			$month = "VII";	
		}
		else if (date('n') == 8)
		{
			$month = "VIII";	
		}
		else if (date('n') == 9)
		{
			$month = "IX";	
		}
		else if (date('n') == 10)
		{
			$month = "X";	
		}
		else if (date('n') == 11)
		{
			$month = "XI";	
		}
		else if (date('n') == 12)
		{
			$month = "XII";	
		}		
		return $month;	
	}	
	
	//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Invoice
	//----------------------------------------------------------------------------------------------------------------------------------------------------------------------

	function simpanInvoice()
	{
		$tgl_sekarang = date("Y/m/d");

		$tot_hal = $this->db->get("InvoicePertamina");		
		$kode = $tot_hal->num_rows();
		$kode = $kode + 1;

		$arrItemInvoice = explode(';',$_POST['itemInvoice']);
		$arrDescInvoice = explode(';' , $_POST['descInvoice']);
		$arrQtyInvoice = explode(';' , $_POST['qtyInvoice']);
		$arrUoMInvoice = explode(';', $_POST['uomInvoice']);
		$arrUnitpriceInvoice = explode(';' , $_POST['priceInvoice']);
		$arrTotalInvoice = explode(';' , $_POST['totalInvoice']);
		$result = count($arrItemInvoice);

		$noInvoice	 = $this->kode_invoice($kode);
		$dt['noInvoice'] = $noInvoice;
		$dt['poPembelian'] = $_POST['poPembelian'];
		$dt['noSO'] = $_POST['noSO'];
		$dt['billTo'] = $_POST['billTo'];
		$dt['billToAlamat'] = $_POST['billToAlamat'];
		$dt['shipToAlamat'] = $_POST['shipToAlamat'];
		$dt['tglInvoice'] = $_POST['tglInvoice'];
		$dt['salesPerson'] = $_POST['salesPerson'];
		$dt['poNumber'] = $_POST['poNumber'];
		$dt['shipmentDate'] = $_POST['shipmentDate'];
		$dt['shipVIA'] = $_POST['shipVIA'];
		$dt['FOB'] = $_POST['FOB'];
		$dt['terms'] = $_POST['terms'];
		$dt['PPh22'] = $_POST['PPh22'];
		$dt['Rabat'] = $_POST['Rabat'];
		$dt['Pembulatan'] = $_POST['Pembulatan'];
		$disc = $_POST['discount'];
		$dt['Discount'] = $disc / 100;

		$this->db->trans_start();

		$this->db->insert("InvoicePertamina",$dt);
		
		for($i=0;$i<$result;$i++)
		{
			$detil['poPembelian'] = $dt['poPembelian'];
			$detil['noInvoice'] = $noInvoice;
			$detil['detilNo'] = $i + 1;
			$detil['Item'] = $arrItemInvoice[$i];
			$detil['Description'] = $arrDescInvoice[$i];
			$detil['Quantity'] = $arrQtyInvoice[$i];
			$detil['UoM'] = $arrUoMInvoice[$i];
			$detil['UnitPrice'] = $arrUnitpriceInvoice[$i];
			$detil['Total'] = $arrTotalInvoice[$i];
			$this->db->insert("InvoicePertamina_detil",$detil);
		}	
		
		$this->db->trans_complete();
		$this->update_perencanaan($arrTglPesanan);
		print $id_pesanan;	
		//print json_encode($result);
	}
//-----------------------------------------------------------------------------------------------------------
	//simpanRecieptBunker
//-----------------------------------------------------------------------------------------------------------
	function simpanRecieptBunker()
	{
		$result=0;
		$kode = $this->get_id();
		$kode = $kode + 1;
		
		$dt['POPembelian'] = $_POST['poPembelian'];
		$dt['NoResi'] = $_POST['nomorresi'];
		$dt['pengaju'] = $_POST['pengaju'];
		$dt['tglPengisian'] = $_POST['tglPengisian'];
		$dt['idVessel'] = $_POST['idVessel'];
		//$dt['harga'] = $_POST['hargaBeli'];
		//$dt['hargaPenjualan'] = $_POST['hargaPenjualan'];
		//$dt['jenisPembayaran'] = $_POST['jenisPembayaran'];
		$dt['idBBM'] = $_POST['idBBM'];
		$dt['jumlah'] = $_POST['jumlahPermintaanB'];
		//$dt['total'] = $_POST['total'];
		$qty = $_POST['jumlah'];
		//$dt['Keterangan'] = $_POST['keterangan'];

		$kartu1['idVessel'] = $_POST['idVessel'];
		$kartu1['idBBM'] = $_POST['idBBM'];
		//$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu1['TglTransaksi'] =  $_POST['tglPengisian'];
		$kartu1['Keterangan'] = "Penjualan Agen (Non Pertamina)";
		$kartu1['Debit'] = $qty;
		$kartu1['Kredit'] = 0;

		$this->db->where('IdVessel', $_POST['idVessel']);
		$this->db->where('IdBBM', $_POST['idBBM']);
		$this->db->set('Stok', 'Stok+ ' . (int)$qty, FALSE);
		$this->db->update('StokBBM');

		$this->db->insert("KartuStokBBM",$kartu1);

		$this->db->insert("reciept_for_bunker",$dt);	
		
		print json_encode($result);
	}


	function kode_invoice($id)
	{
		$code = 'INV';
		$code .= sprintf("%09s", $id);
		return $code;
	}

	function getAllDataInvoicePertamina_detilById()
	{
		$poPembelian = $_GET['poPembelian'];
		$noInvoice = $_GET['noInvoice'];
		$detilNo = $_GET['detilNo'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllDataInvoicePertamina_detilById($poPembelian, $noInvoice, $detilNo);

		print json_encode($dataTable);
	}

	function getPO()
	{
	
		$this->load->model('/app_load_data_table');
        $row = $this->app_load_data_table->getPO($_GET['noPO']);	
		if ($row) 
		{
	   		$d['noPO'] 				= $row->POPembelian;
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
			$d['namaPerusahaan'] 	= $row->NamaSupplier;
			$d['biayakirim'] 		= $row->BiayaKirim;
			$d['SyaratPembayaran'] 	= $row->SyaratPembayaran;
			//$d['WilayahSupply'] 	= $row->WilayahSupply;
			$d['idPBBKB'] 		= $row->idPBBKB;
			$d['nilai'] 		= $row->nilai;
			//$d['namaPerusahaan'] 	= "PT. INDOLINE INCOMEKITA";
			$ppn 					= $row->JenisPPN;

        }		   	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			
			
				$this->load->view('trnPembelianPertamina/cetakPO', $d);	

			
			$this->load->view('dashboard/bg_footer', $d);
			
	}

	//---------------------------------------------------------------------------------------------

	function simpanDO_LO()
	{
		$do['poPembelian'] = $_POST['poPembelian'];
		$do['noInvoice'] = $_POST['noInvoice'];
		$do['detilNo'] = $_POST['detilNo'];
		$do['doPertamina'] = $_POST['doPertamina'];
		//$do['poPertamina'] = $_POST['poPertamina'];
		$do['tglDO'] = $_POST['tglDO'];
		//$do['idTransportir'] = $_POST['idTransportir'];
		$do['tglSpp'] = $_POST['tglSpp'];
		$do['tglBerlaku'] = $_POST['tglBerlaku'];
		$do['jamBerangkat'] = $_POST['jamBerangkat'];
		$do['jamTiba'] = $_POST['jamTiba'];
		$do['jamMulaiPembongkaran'] = $_POST['jamMulaiPembongkaran'];
		$do['jamSelesaiPembongkaran'] = $_POST['jamSelesaiPembongkaran'];
		$do['jamTibaDepo'] = $_POST['jamTibaDepo'];
		$do['distribusi'] = $_POST['distribusi'];
		$do['mengetahui'] = $_POST['mengetahui'];
		$do['penerima'] = $_POST['penerima'];
		$do['pengemudi'] = $_POST['pengemudi'];
		$do['kernet'] = $_POST['kernet'];
		$do['idBBM'] = $_POST['idBBM'];
		$do['jumlah'] = $_POST['jumlah'];
		$do['dikirimDengan'] = $_POST['dikirimDengan'];
		$do['noKendaraan'] = $_POST['noKendaraan'];
		$do['jamBerangkat'] = $_POST['jamBerangkat'];
		$do['kmAwal'] = $_POST['kmAwal'];
		$do['kmAkhir'] = $_POST['kmAkhir'];
		$do['sgMeter'] = $_POST['sgMeter'];
		$do['segelAtas'] = $_POST['segelAtas'];
		$do['segelBawah'] = $_POST['segelBawah'];
		$do['temperatur'] = $_POST['temperatur'];
		$do['jumlahTotalPemesananBBM'] = $_POST['jumlah'];
		

		$lo['poPembelian'] = $_POST['poPembelian'];
		$lo['noInvoice'] = $_POST['noInvoice'];
		$lo['detilNo'] = $_POST['detilNo'];
		$lo['doPertamina'] = $_POST['doPertamina'];
		$lo['loPertamina'] = $_POST['loPertamina'];
		$lo['idVessel'] = $_POST['idVessel'];
		$lo['deliveryNoteNumber'] = $_POST['deliveryNoteNumber'];
		//$lo['deliverNoteNumberDate'] = $_POST['deliverNoteNumberDate'];
		$lo['orderNumberDate'] = $_POST['orderNumberDate'];
		$lo['shipping'] = $_POST['shipping'];
		$lo['delivery'] = $_POST['delivery'];
		$lo['shipForm'] = $_POST['shipForm'];
		$lo['vehicleNumber'] = $_POST['vehicleNumber'];
		$lo['driverNumber'] = $_POST['driverNumber'];
		$lo['fillingPoint'] = $_POST['fillingPoint'];
		$lo['sealNumber'] = $_POST['sealNumber'];
		$lo['itemNumber'] = $_POST['itemNumber'];
		$lo['materialDescription'] = $_POST['materialDescription'];
		$lo['idBBM'] = $_POST['idBBM'];
		$lo['quantity'] = $_POST['quantity'];
		//$lo['idSatuan'] = $_POST['idSatuan'];
		$qty = $_POST['quantity'];
		$stok['idVessel'] = $_POST['idVessel'];
		$stok['idBBM'] = $_POST['idBBM'];
		$stok['stok'] = $lo['quantity'];

		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['idBBM'];
		$kartu['TglTransaksi'] =  $_POST['tglDO'];
		$kartu['Keterangan'] = "Pembelian Pertamina (Agen)";
		$kartu['Debit'] = $qty ;
		$kartu['Kredit'] = 0;

		$count = $this->cekStok($stok['idVessel'], $stok['idBBM']);	

		$this->db->trans_start();
		$this->db->insert("DOPertamina",$do);
		$this->db->insert("LOPertamina",$lo);
		
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

	function prosesPOPembelianN()
	{
		$qty = $_POST['total'];
		$stok['idVessel'] = $_POST['idVessel'];
		$stok['idBBM'] = $_POST['idBBM'];
		$stok['stok'] = $_POST['total'];

		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['idBBM'];
		$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu['Keterangan'] = "Penjualan Non Agen";;
		$kartu['Debit'] = $qty ;
		$kartu['Kredit'] = 0;

		$bbm_id['POPembelian'] = $_POST['poPembelian'];
		$bbm['Status'] = "Barang Diterima";

		$count = $this->cekStok($stok['idVessel'], $stok['idBBM']);	

		$this->db->trans_start();
		$this->db->update("PembelianPertamina",$bbm,$bbm_id);
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

	function cekStok($idVessel, $idBBM)
	{
		$count = 0;
		$row = $this->db->query("SELECT count(*) AS count FROM StokBBM where IdVessel='$idVessel'  and IdBBM='$idBBM'")->row();
		if ($row) {
		    $count = $row->count; 
		}
		return $count;
	}
}
