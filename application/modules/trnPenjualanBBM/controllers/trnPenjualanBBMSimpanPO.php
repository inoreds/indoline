<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trnPenjualanBBM extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTablePO'] = $this->app_load_data_table->getAllData();	
			$d['dataTablePO_detil'] = $this->app_load_data_table->getAllData_detil();
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPenjualanBBM/content', $d);
			$this->load->view('trnPenjualanBBM/modal_PO', $d);
			$this->load->view('trnPenjualanBBM/modal_MBA', $d);	
			$this->load->view('trnPenjualanBBM/modal_MBT', $d);	
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
		var_dump($dt);
		//$dt['NoPOCustomer'] = $_POST['NoPOCustomer'];
		$dt['tglPO'] = $_POST['tglPO'];
		$dt['namaKapal'] = $_POST['namaKapal'];
		$dt['tglAwalSupply'] = $_POST['tglAwalSupply'];
		$dt['tglAkhirSupply'] = $_POST['tglAkhirSupply'];
		$dt['idCustomer'] = $_POST['idCustomer'];
		$dt['idBBM'] = $_POST['idBBM'];
		$dt['harga'] = $_POST['harga'];
		$dt['quantity'] = $_POST['quantity'];
		$dt['total'] = $_POST['total'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['NoPOCustomer'] = $this->kode_inc($kode);
			$this->db->insert("PenjualanBBM",$dt);
			$result =1;
		   
		}
		else
		{
			$id['NoPOCustomer'] = $st;
			$this->db->update("PenjualanBBM",$dt,$id);
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
		$where['idBBM'] = $id;
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
		$code = 'POC';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(NoPoCustomer,9)) AS maxid FROM PenjualanBBM')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// Invoice
	//----------------------------------------------------------------------------------------------------------------------------------------------------------------------

	function invoice()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id = $_GET['id'];

			$this->load->model('/app_load_data_table');

			$row = $this->app_load_data_table->getCustomer($id);
			if ($row) 
			{
			    $d['namaPelanggan'] = $row->NamaCustomer; 
			    $d['alamat'] = $row->AlamatCustomer;
			}
			
			$row = $this->app_load_data_table->getAllData_penjualanDetil2($id);
			if ($row) 
			{
				$IdBBM		 			= $row->IdBBM;
			    $d['IdBBM'] 			= $row->IdBBM; 
			    $d['PBBKB'] 			= $row->PBBKB; 
			    $d['IdCustomer'] 		= $row->IdCustomer; 
			    $d['NoPO'] 				= $row->NoPO; 
			    $d['TglPO'] 			= $row->TglPO;
			    $d['JnsPPN'] 			= $row->Ppn;
			    $d['Quantity'] 			= $row->Quantity;
			    $d['Harga'] 			= $row->Harga;
			    $d['SubTotal'] 			= $row->$row->Quantity*($row->Harga*$row->PBBKB);
			    $d['Total'] 			= $row->Total;
			    $JenisPPN				= $row->Ppn;
				$d['tglSupply'] 		= date("d", strtotime($row->TglAwalSupply ));		
				$d['TglAkhirSupply'] 	= date("d F Y", strtotime($row->TglAkhirSupply ));
			}
			
			

			$d['dataTable'] = $this->app_load_data_table->getAllData_penjualanDetil($id);
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			
			if ($JenisPPN == "ppn") 
			{
				$this->load->view('trnPenjualanBBM/invoicePPn', $d);
			}
			else
			{
				$this->load->view('trnPenjualanBBM/invoice', $d);
			}
		
			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	//------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	// kwitansi
	//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	function kwitansi()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$po = $_GET['po'];
			$detil = $_GET['detil'];
			$this->load->helper("terbilang");
			$this->load->model('/app_load_data_table');

			$row = $this->app_load_data_table->getAllData_kwitansi($po, $detil);	
			if ($row) 
			{
				// $Data 		= mysql_query("SELECT Count(*) as total FROM penjualanbbm_detil WHERE pb.NoPOCustomer='$row->NoPoCustomer'");
				// $getDataRow	= mysql_fetch_array($Data);
				
		   		$d['untukPembayaran'] = $row->NamaKapal.','.$row->MBAOAT.'-'.$row->NamaBBM.', '.$row->Quantity . ' Liter';
				$d['pelanggan'] =$row->NamaCustomer ;
				$d['total'] = $row->SubTotal;
				$d['terbilang'] = ucwords(number_to_words($row->SubTotal));
				$d['tglSupply'] = date("d", strtotime($row->TglAwalSupply ));		
				$d['TglAkhirSupply'] = date("d F Y", strtotime($row->TglAkhirSupply ));
				$d['lokasiSupply'] = $row->LokasiPengiriman;
				$d['hargaMBA']	 = $row->Harga.'/Liter';
				$d['tglSekarang'] = date("d/m/Y", strtotime($row->TglPO));
				$d['NoPO'] = $row->NoPO;
				$d['namaKapal'] = $row->NamaKapal;
				$d['MBAOAT'] = $row->MBAOAT;
				$d['ketTambahan'] = $row->Persyaratan;
				$d['JnsPPn'] = $row->Ppn;
				$d['NoKwitansi'] = intval(preg_replace('/[^0-9]+/', '', $row->NoPoCustomer), 10).'/I.I/'.$this->getMonthRomawi().'/'.(date('m')).'/'.date('Y');
				// $d['NoKwitansi'] = intval(preg_replace('/[^0-9]+/', '', $getDataRow['total']), 10).'/I.I/'.$this->getMonthRomawi().'/'.(date('m')).'/'.date('Y');
				$JenisPPn = $row->Ppn;
		   	}

			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			

			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			
			if ($JenisPPn == "ppn") 
			{
				$this->load->view('trnPenjualanBBM/kwitansiPPn', $d);	

			} 
			else 
			{
				$this->load->view('trnPenjualanBBM/kwitansi', $d);		
			}
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
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

	//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	function simpanPO()
	{
		$tgl_sekarang = date("Y/m/d");
		$total 		= 0;
		$tot_hal 	= $this->db->get("PenjualanBBM");		
		$kode 		= $tot_hal->num_rows();
		$kode 		= $kode + 1;
		
		$arrItemIdBBM 			= explode(';',$_POST['idBBM']);
		$arrItemTglSupply 		= explode(';' , $_POST['tglSupply']);
		$arrItemTglSupplyAkhir 	= explode(';' , $_POST['tglSupply']);
		$arrItemQuantity		= explode(';' , $_POST['quantity']);
		$arrItemHarga 			= explode(';' , $_POST['harga']);
		$arrItemSubTotal 		= explode(';' , $_POST['subTotal']);
		$arrItemPBBKB 			= explode(';' , $_POST['PBBKB']);
		$result 				= count($arrItemIdBBM);
		
		$id = $_POST['idBBM'];
		$row = $this->app_load_data_table->getPBBKB($id);	
		
		if ($row)
		{
			$d['PBBKB'] = $row->PBBKB;
			$QtyPBBKB	= $row->PBBKB;
		}
		
		if($dt['ppn']== "ppn")
		{
			$Harga		= ($arrItemHarga/$QtyPBBKB)*$arrItemQuantity;
		}
		else
		{
			$Harga		= $arrItemSubTotal;
		}

		for($i=0;$i<$result;$i++)
		{
			$total = $total + $Harga[$i];
		}	
		var_dump($_POST['idBBM']);
		$noPoCustomer	 = $this->kode_inc($kode);
		$dt['noPO'] = $_POST['noPO'];
		$dt['tglPO'] = $_POST['tglPO'];
		$dt['idCustomer'] = $_POST['idCustomer'];
		$dt['bank'] = $_POST['bank'];
		$dt['jatuhTempo'] = $_POST['jatuhTempo'];
		$dt['lokasiPengiriman'] = $_POST['lokasiPengiriman'];
		$dt['namaKapal'] = $_POST['namaKapal'];
		$dt['ppn'] = $_POST['ppn'];
		$dt['pbbkb'] = $_POST['Pbbkb'];
		$dt['noPoCustomer'] = $noPoCustomer;
		$dt['tglAwalSupply'] = $arrItemTglSupply[0];
		$dt['tglAkhirSupply'] = $arrItemTglSupply[$result-1];
		$dt['Persyaratan'] = $_POST['Persyaratan'];
		$dt['MBAOAT'] = $_POST['MBAOAT'];
		$dt['total'] = $total;
		$this->db->trans_start();

		$this->db->insert("PenjualanBBM",$dt);
		
		for($i=0;$i<$result;$i++)
		{
			$detil['noPoCustomer'] = $dt['noPoCustomer'];
			$detil['detilNumber'] = $i + 1;
			$detil['tglSupply'] = $arrItemTglSupply[$i];
			$detil['tglSupplyAkhir'] = $arrItemTglSupplyAkhir[$i];
			$detil['quantity'] = $arrItemQuantity[$i];
			$detil['idBBM'] = $arrItemIdBBM[$i];
			$detil['harga'] = $arrItemHarga[$i];
			$detil['subTotal'] = $arrItemSubTotal[$i];
			$detil['statusPembayaran'] ='Piutang';
			$detil['status'] ='Baru';
			$this->db->insert("PenjualanBBM_detil",$detil);
		}	
		
		$this->db->trans_complete();
		print $id_pesanan;	
		//print json_encode($result);
	}

	function kode_invoice($id)
	{
		$code = 'INV';
		$code .= sprintf("%09s", $id);
		return $code;
	}

	function simpanMBA_MBT()
	{
		$tot_hal = $this->db->get("PenjualanBBM_MBA");		
		$kodeMBA = $tot_hal->num_rows();
		$kodeMBA = $kodeMBA + 1;

		$tot_hal = $this->db->get("PenjualanBBM_MBT");		
		$kodeMBT = $tot_hal->num_rows();
		$kodeMBT = $kodeMBT + 1;

		$mba['noPOCustomer'] = $_POST['noPOCustomer'];
		$mba['detilNumber'] = $_POST['detilNumber'];
		$mba['noMBA'] = $this->kode_mba($kodeMBA);
		$mba['ssmv'] = $_POST['ssmv'];
		$mba['dateMBA'] = $_POST['dateMBA'];
		$mba['portMBA'] = $_POST['portMBA'];
		$mba['literOBS'] = $_POST['literOBS'];
		$mba['gradeOfOil'] = $_POST['gradeOfOil_MBA'];
		$mba['temperatur_F'] = $_POST['temperatur_F_MBA'];
		$mba['temperatur_C'] = $_POST['temperatur_C_MBA'];
		$mba['specificGravity'] = $_POST['specificGravity_MBA'];
		$mba['specificGravity_F'] = $_POST['specificGravity_F_MBA'];
		$mba['specificGravity_C'] = $_POST['specificGravity_C_MBA'];
		$mba['specificGravity60_C'] = $_POST['specificGravity60_C_MBA'];
		$mba['flashPoint'] = $_POST['flashPoint_MBA'];
		$mba['flashPoint_C'] = $_POST['flashPoint_C_MBA'];
		$mba['water'] = $_POST['water_MBA'];
		$mba['aproximate'] = $_POST['aproximate_MBA'];
		$mba['namaPengawas'] = $_POST['namaPengawas_MBA'];
		$mba['chiefEnginer'] = $_POST['chiefEnginer_MBA'];
		

		$mbt['noPOCustomer'] = $_POST['noPOCustomer'];
		$mbt['detilNumber'] = $_POST['detilNumber'];
		$mbt['noMBA'] = $mba['noMBA'];
		$mbt['noMBT'] = $this->kode_mbt($kodeMBT);
		$mbt['noPNBP'] = $_POST['noPNBP'];
		$mbt['tglPNBP'] = $_POST['tglPNBP'];
		$mbt['noBA'] = $_POST['noBA'];
		$mbt['tglBA'] = $_POST['tglBA'];
		$mbt['noRFP'] = $_POST['noRFP'];
		$mbt['idVessel'] = $_POST['idVessel'];
		$mbt['dateMBT'] = $_POST['dateMBT'];
		$mbt['portMBT'] = $_POST['portMBT'];
		$mbt['englishTonsQuantity'] = $_POST['englishTonsQuantity'];
		$mbt['metricTonsQuantity'] = $_POST['metricTonsQuantity'];
		$mbt['litresQuantity'] = $_POST['litresQuantity'];
		$mbt['barrelsUSQuantity'] = $_POST['barrelsUSQuantity'];
		$mbt['gradeOfOil'] = $_POST['gradeOfOil_MBT'];
		$mbt['temperatur_F'] = $_POST['temperatur_F_MBT'];
		$mbt['temperatur_C'] = $_POST['temperatur_C_MBT'];
		$mbt['specificGravity'] = $_POST['specificGravity_MBT'];
		$mbt['specificGravity_F'] = $_POST['specificGravity_F_MBT'];
		$mbt['specificGravity_C'] = $_POST['specificGravity_C_MBT'];
		$mbt['specificGravity60_C'] = $_POST['specificGravity60_C_MBT'];
		$mbt['flashPoint'] = $_POST['flashPoint_MBT'];
		$mbt['flashPoint_C'] = $_POST['flashPoint_C_MBT'];
		$mbt['water'] = $_POST['water_MBT'];
		$mbt['aproximate'] = $_POST['aproximate_MBT'];
		$mbt['namaPengawas'] = $_POST['namaPengawas_MBT'];
		$mbt['chiefEnginer'] = $_POST['chiefEnginer_MBT'];
		$mbt['namaMaster'] = $_POST['namaMaster'];
		$mbt['mengetahui'] = $_POST['mengetahui'];

		$this->db->trans_start();
		$this->db->insert("PenjualanBBM_MBA",$mba);
		$this->db->insert("PenjualanBBM_MBT",$mbt);
		$this->db->trans_complete();

		print 1;	
	}

	function simpanMBA()
	{
		$tot_hal = $this->db->get("PenjualanBBM_MBA");		
		$kodeMBA = $tot_hal->num_rows();
		$kodeMBA = $kodeMBA + 1;
		$qty = $_POST['qty'];

		$mba['ssmv'] = $_POST['ssmv'];
		$mba['dateMBA'] = $_POST['dateMBA'];
		$mba['portMBA'] = $_POST['portMBA'];
		$mba['literOBS'] = $_POST['literOBS'];
		$mba['gradeOfOil'] = $_POST['gradeOfOil_MBA'];
		$mba['temperatur_F'] = $_POST['temperatur_F_MBA'];
		$mba['temperatur_C'] = $_POST['temperatur_C_MBA'];
		$mba['specificGravity'] = $_POST['specificGravity_MBA'];
		$mba['specificGravity_F'] = $_POST['specificGravity_F_MBA'];
		$mba['specificGravity_C'] = $_POST['specificGravity_C_MBA'];
		$mba['specificGravity60_C'] = $_POST['specificGravity60_C_MBA'];
		$mba['flashPoint'] = $_POST['flashPoint_MBA'];
		$mba['flashPoint_C'] = $_POST['flashPoint_C_MBA'];
		$mba['water'] = $_POST['water_MBA'];
		$mba['aproximate'] = $_POST['aproximate_MBA'];
		$mba['namaPengawas'] = $_POST['namaPengawas_MBA'];
		$mba['chiefEnginer'] = $_POST['chiefEnginer_MBA'];
		
		$kartu['idVessel'] = $_POST['idVessel'];
		$kartu['idBBM'] = $_POST['idBBM'];
		$kartu['TglTransaksi'] =  date("Y/m/d");
		$kartu['Keterangan'] = "Penjualan ";
		$kartu['Debit'] = 0;
		$kartu['Kredit'] = $qty ;


		$st = $_POST['st'];

		if ($st == 'tambah')
		{
			$mba['idVessel'] = $_POST['idVessel'];
			$mba['noPOCustomer'] = $_POST['noPOCustomer'];
			$mba['detilNumber'] = $_POST['detilNumber'];
			$mba['noMBA'] = $this->kode_mba($kodeMBA);
			$this->db->trans_start();
			$this->db->insert("PenjualanBBM_MBA",$mba);
				
			$this->db->where('IdVessel', $_POST['idVessel']);
			$this->db->where('IdBBM', $_POST['idBBM']);
			$this->db->set('Stok', 'Stok- ' . (int)$qty, FALSE);
			$this->db->update('StokBBM');	

			$this->db->insert("KartuStokBBM",$kartu);
			
			$this->db->trans_complete();
		}
		else
		{
			$id['noPOCustomer'] = $_POST['noPOCustomer'];
			$id['detilNumber'] = $_POST['detilNumber'];
			$id['noMBA'] = $st;
			$this->db->trans_start();
			$this->db->update("PenjualanBBM_MBA",$mba, $id);
			$this->db->trans_complete();
		}


		print 1;	
	}

	function hapusMBA()
	{
		$return = 0;
		$where['noPOCustomer'] = $_GET['noPOCustomer'];
		$where['detilNumber'] = $_GET['detilNumber'];
		$where['noMBA'] = $_GET['noMBA'];

		$this->db->delete("PenjualanBBM_MBA",$where);
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

	function printOut_MBA()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$noPOCustomer = $_GET['noPOCustomer'];
			$detilNumber = $_GET['detilNumber'];
			$noMBA = $_GET['noMBA'];

			$this->load->model('/app_load_data_table');

			$d['dt'] = $this->app_load_data_table->getDataMBA2ById($noPOCustomer, $detilNumber, $noMBA);
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPenjualanBBM/printOut_MBA', $d);
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	
	function simpanMBT()
	{
		$tot_hal = $this->db->get("PenjualanBBM_MBT");		
		$kodeMBT = $tot_hal->num_rows();
		$kodeMBT = $kodeMBT + 1;
		
		
		$mbt['noPNBP'] = $_POST['noPNBP'];
		$mbt['tglPNBP'] = $_POST['tglPNBP'];
		$mbt['noBA'] = $_POST['noBA'];
		$mbt['tglBA'] = $_POST['tglBA'];
		$mbt['noRFP'] = $_POST['noRFP'];
		$mbt['idVessel'] = $_POST['idVessel'];
		$mbt['dateMBT'] = $_POST['dateMBT'];
		$mbt['portMBT'] = $_POST['portMBT'];
		$mbt['englishTonsQuantity'] = $_POST['englishTonsQuantity'];
		$mbt['metricTonsQuantity'] = $_POST['metricTonsQuantity'];
		$mbt['litresQuantity'] = $_POST['litresQuantity'];
		$mbt['barrelsUSQuantity'] = $_POST['barrelsUSQuantity'];
		$mbt['gradeOfOil'] = $_POST['gradeOfOil_MBT'];
		$mbt['temperatur_F'] = $_POST['temperatur_F_MBT'];
		$mbt['temperatur_C'] = $_POST['temperatur_C_MBT'];
		$mbt['specificGravity'] = $_POST['specificGravity_MBT'];
		$mbt['specificGravity_F'] = $_POST['specificGravity_F_MBT'];
		$mbt['specificGravity_C'] = $_POST['specificGravity_C_MBT'];
		$mbt['specificGravity60_C'] = $_POST['specificGravity60_C_MBT'];
		$mbt['flashPoint'] = $_POST['flashPoint_MBT'];
		$mbt['flashPoint_C'] = $_POST['flashPoint_C_MBT'];
		$mbt['water'] = $_POST['water_MBT'];
		$mbt['aproximate'] = $_POST['aproximate_MBT'];
		$mbt['namaPengawas'] = $_POST['namaPengawas_MBT'];
		$mbt['chiefEnginer'] = $_POST['chiefEnginer_MBT'];
		$mbt['namaMaster'] = $_POST['namaMaster'];
		$mbt['mengetahui'] = $_POST['mengetahui'];


		$st = $_POST['st'];

		if ($st == 'tambah')
		{
			$mbt['noPOCustomer'] = $_POST['noPOCustomer'];
			$mbt['detilNumber'] = $_POST['detilNumber'];
			$mbt['noMBT'] = $this->kode_mbt($kodeMBT);
			$this->db->trans_start();
			$this->db->insert("PenjualanBBM_MBT",$mbt);
			$this->db->trans_complete();

		}
		else
		{
			$id['noPOCustomer'] = $_POST['noPOCustomer'];
			$id['detilNumber'] = $_POST['detilNumber'];
			$id['noMBT'] = $st;
			$this->db->trans_start();
			$this->db->update("PenjualanBBM_MBT",$mbt, $id);
			$this->db->trans_complete();
		}
		print 1;	
	}


	function printOut_MBT()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$noPOCustomer = $_GET['noPOCustomer'];
			$detilNumber = $_GET['detilNumber'];
			$noMBT = $_GET['noMBT'];

			$this->load->model('/app_load_data_table');

			$d['dt'] = $this->app_load_data_table->getDataMBT2ById($noPOCustomer, $detilNumber, $noMBT);
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPenjualanBBM/printOut_MBT', $d);
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function get_idMBA() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(NoMBA,9)) AS maxid FROM PenjualanBBM_MBA')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function get_idMBT() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(NoMBT,9)) AS maxid FROM PenjualanBBM_MBT')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function kode_mba($id)
	{
		$code = 'MBA';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function kode_mbt($id)
	{
		$code = 'MBT';
		$code .= sprintf("%09s", $id);
		return $code;
	}
	
	function getDataMBAById()
	{
		$noPOCustomer = $_GET['noPOCustomer'];
		$detilNumber = $_GET['detilNumber'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataMBAById($noPOCustomer, $detilNumber);
		print json_encode($dataTable);
	}
	
	function getDataMBTById()
	{
		$noPOCustomer = $_GET['noPOCustomer'];
		$detilNumber = $_GET['detilNumber'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataMBTById($noPOCustomer, $detilNumber);

		print json_encode($dataTable);	

	}
}
