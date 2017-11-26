<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class PersewaanKapal extends CI_Controller {

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
			$this->load->view('PersewaanKapal/content', $d);	
			$this->load->view('PersewaanKapal/modal_PO', $d);	
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
		
		
		$dt['Tanggal'] = $_POST['date'];
		$dt['recieptFrom'] = $_POST['dari'];
		$dt['paymentOf'] = $_POST['untukpembayaran'];
		$dt['jumlah'] = $_POST['jumlah'];

		$dt1['Persyaratan'] = "Persewaan";
		$st = $_POST['st'];

		if($st=="tambah")
		{
			$dt['NoPoCustomer'] = $this->kode_inc($kode);
			$this->db->insert("persewaan",$dt);

			
			$dt1['NoPoCustomer'] = $this->kode_inc($kode);
			$this->db->insert("penjualanbbm",$dt1);

			$result =1;
		   
		}
		else
		{
			alert('fa');
			//$id['POPembelian_non'] = $st;
			//$this->db->update("PembelianNonPertamina",$dt,$id);
			//$result=1;
		}	
		print json_encode($result);	
	}
	

	

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
	

	function kwitansi()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$po = $_GET['po'];
			//$this->load->helper("terbilang");
			$this->load->model('/app_load_data_table');

			$row = $this->app_load_data_table->getAllData_kwitansi($po);	
			if ($row) 
			{
		   		
				//$d['tanggal'] =$row->tanggal ;
				$d['recieptFrom'] = $row->recieptFrom;
				$d['paymentOf'] = $row->paymentOf;
				$d['jumlah'] = $row->jumlah;
				$d['terbilang'] = ucwords(number_to_words($row->jumlah));
				//$d['TglAkhirSupply'] = date("d F Y", strtotime($row->TglAkhirSupply ));
				$d['tanggal'] = date("d F Y", strtotime($row->tanggal));

				$tanggal = date("m", strtotime($row->tanggal));

				if ($tanggal == 01 )
				{
					$tglF = "I";
				}elseif ($tanggal == 02){
					$tglF = "II";
				}
				elseif ($tanggal == 03 )
				{
					$tglF = "III";
				}elseif ($tanggal == 04){
					$tglF = "IV";
				}elseif ($tanggal == 05 )
				{
					$tglF = "V";
				}elseif ($tanggal == 06){
					$tglF = "VI";
				}elseif ($tanggal == 07 )
				{
					$tglF = "VII";
				}elseif ($tanggal == 08){
					$tglF = "VIII";
				}elseif ($tanggal == 09 )
				{
					$tglF = "IX";
				}
				elseif ($tanggal == 10){
					$tglF = "X";
				}elseif ($tanggal == 11 )
				{
					$tglF = "XI";
				}else {
					$tglF = "XII";
				}

				$d['NoKwitansi'] = intval(preg_replace('/[^0-9]+/', '', $row->NoPoCustomer), 10).'/I.I/'.$tglF.'/'.date('Y');
				
		   	}

			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			

			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			
			
			$this->load->view('PersewaanKapal/kwitansi', $d);		
		
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	
}
