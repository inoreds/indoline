<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstPBBKB extends CI_Controller {

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
			$this->load->view('mstPBBKB/content', $d);			
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
		
		$dt['jenisPbbkb'] = $_POST['jenispbbkb'];
		$dt['Nilai'] = $_POST['nilai'];
		$dt['keterangan'] = $_POST['keterangan'];
		
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idPBBKB'] = $this->kode_inc($kode);
			$this->db->insert("mstPBBKB",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idPBBKB'] = $st;
			$this->db->update("mstPBBKB",$dt,$id);
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
			$this->load->view('mstPBBKB/printOut', $d);			
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
		$where['idPBBKB'] = $id;
		$this->db->delete("mstPBBKB",$where);
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
		$code = 'PB';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(idPBBKB,5)) AS maxid FROM mstPBBKB')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
