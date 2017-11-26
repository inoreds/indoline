<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstJenisBBM extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTable'] = $this->app_load_data_table->getDataAll();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('mstJenisBBM/content', $d);			
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
		
		$dt['jenisBBM'] = $_POST['jenisBBM'];
		$dt['jumlahPBBKB'] = $_POST['jumlahPBBKB'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idDataJenisBBM'] = $this->kode_inc($kode);
			$this->db->insert("DataJenisBBM",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idDataJenisBBM'] = $st;
			$this->db->update("DataJenisBBM",$dt,$id);
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

	function getDataAll()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataAll();

		print json_encode($dataTable);	

	}

	function hapus()
	{
		$id = $_GET['id'];
		$where['idDataJenisBBM'] = $id;
		$this->db->delete("DataJenisBBM",$where);
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
		$code = 'BBM';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(idDataJenisBBM,5)) AS maxid FROM DataJenisBBM')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
