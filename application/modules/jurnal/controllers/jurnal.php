<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jurnal extends CI_Controller {

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
			$this->load->view('jurnal/content', $d);			
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
		$tgl_sekarang = date("Y/m/d");
		$result=0;
		
		$kode = $this->get_id();
		$kode = $kode + 1;

		$kode2 = $this->get_id2();
		$kode2 = $kode + 1;

		/*
		$arrSubAkunJurnal = explode(',',$_POST['dataSubAkunJurnal']);
		$arrDebitJurnal = explode(',' , $_POST['dataDebitJurnal']);
		$arrKreditJurnal = explode(',' , $_POST['dataKreditJurnal']);
		*/

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
			$dt['id_transaction'] = $_POST['id_transaction'];
			$dt['date_input'] = $tgl_sekarang;
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
		$code = 'J';
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
		$row = $this->db->query('SELECT MAX(right(ID_JOUR,9)) AS maxid FROM journals')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
	
}
