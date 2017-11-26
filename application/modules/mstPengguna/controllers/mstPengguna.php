<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstPengguna extends CI_Controller {

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
			$this->load->view('mstPengguna/content', $d);			
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
			$kode = $this->get_id();
			$kode = $kode + 1;
			
			$password = "12345";
			$pass = $password.$GLOBALS['key_login'];

			$dt['namaPengguna'] = $_POST['namaPengguna'];
			$dt['jabatanPengguna'] = $_POST['jabatanPengguna'];
			$dt['username'] = $_POST['username'];
			$dt['pwd'] = md5($pass);
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$dt['idPengguna'] = $this->kode_inc($kode);
				$this->db->insert("MstPengguna",$dt);
				$result =1;
			   
			}
			else
			{
				$id['idPengguna'] = $st;
				$this->db->update("MstPengguna",$dt,$id);
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
			$this->load->view('mstPengguna/printOut', $d);			
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

	function hapus()
	{
		$id = $_GET['id'];
		$where['idPengguna'] = $id;
		$this->db->delete("MstPengguna",$where);
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
		$code = 'P';
		$code .= sprintf("%03s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(idPengguna,3)) AS maxid FROM MstPengguna')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
