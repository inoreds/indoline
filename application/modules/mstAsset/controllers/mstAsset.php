<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstAsset extends CI_Controller {

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
			$this->load->view('mstAsset/content', $d);			
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
			

		$dt['id_asset_category'] = $_POST['id_asset_category'];
		$dt['date_asset'] = $_POST['date_asset'];
		$dt['name_asset'] = $_POST['name_asset'];
		$dt['qty'] = $_POST['qty'];
		$dt['price'] = $_POST['price'];
		$dt['qty_years'] = $_POST['qty_years'];
		$dt['residual'] = $_POST['residual'];
		$dt['deleted'] = 0;
		

		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['ID_ASSET'] = $this->kode_inc($kode);
			$this->db->insert("asset",$dt);
			$result =1;
		   
		}
		else
		{
			$id['ID_ASSET'] = $st;
			$this->db->update("asset",$dt,$id);
			$result=1;
		}	
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
			$this->load->view('mstAsset/printOut', $d);			
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
		$where['id_asset_category'] = $id;
		$this->db->delete("asset",$where);
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
		$code = 'AS';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(ID_ASSET,5)) AS maxid FROM asset')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
