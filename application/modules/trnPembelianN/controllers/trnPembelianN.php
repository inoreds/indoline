<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trnPembelianN extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTableN'] = $this->app_load_data_table->getAllData();	
			$d['dataTableInvoice'] = $this->app_load_data_table->getAllDataInvoicePertamina();	
			$d['dataTableInvoice_detil'] = $this->app_load_data_table->getAllDataInvoicePertamina_detil();	

			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPembelianN/content', $d);	
			$this->load->view('trnPembelianN/modal_PO', $d);	
			$this->load->view('trnPembelianN/modal_invoice');			
			$this->load->view('trnPembelianN/modal_do_lo');			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function nambah()
	{
		$this->load->view('dashboard/bg_header', $d);
	}

	function simpan()
	{
		$result=0;
		$kode = $this->get_id();
		$kode = $kode + 1;
		
		$dt['noresi'] = $_POST['noresi'];
		$dt['namabank'] = $_POST['namabank'];
		$dt['Supplier'] = $_POST['supplier'];
		$dt['tglPembayaran'] = $_POST['tglPembayaran'];
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['harga'] = $_POST['hargaBeli'];
		//$dt['hargaPenjualan'] = $_POST['hargaPenjualan'];
		//$dt['jenisPembayaran'] = $_POST['jenisPembayaran'];
		$dt['idBBM'] = $_POST['idBBM'];
		$dt['qty'] = $_POST['jumlahPermintaan'];
		$dt['total'] = $_POST['total'];
		$qty = $_POST['jumlahPermintaan'];
		$dt['Keterangan'] = $_POST['keterangan'];
		
		$stok['idVessel'] = $_POST['idVessel'];
		$stok['idBBM'] = $_POST['idBBM'];
		$stok['stok'] = $_POST['jumlahPermintaan'];

		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['idBBM'];
		//$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu['TglTransaksi'] =  $_POST['tglPembayaran'];
		$kartu['Keterangan'] = "Pembelian Non Agen";
		$kartu['Debit'] = $qty;
		$kartu['Kredit'] = 0;

		$count = $this->cekStok($stok['idVessel'], $stok['idBBM']);	
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
		$this->db->insert("pembeliannonagen",$dt);	
		
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
		$kartu['TglTransaksi'] =  date("Y/m/d");
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
