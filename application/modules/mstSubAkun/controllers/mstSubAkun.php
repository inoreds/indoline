<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstSubAkun extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTable_1'] = $this->app_load_data_table->getAllData_1();
			$d['dataTable_2'] = $this->app_load_data_table->getAllData_2();
			$d['dataTable_3'] = $this->app_load_data_table->getAllData_3();
			$d['dataTable_4'] = $this->app_load_data_table->getAllData_4();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('mstSubAkun/content', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function printOut()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTable_1'] = $this->app_load_data_table->getAllData_1();
			$d['dataTable_2'] = $this->app_load_data_table->getAllData_2();
			$d['dataTable_3'] = $this->app_load_data_table->getAllData_3();	
			$d['dataTable_4'] = $this->app_load_data_table->getAllData_4();
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('mstSubAkun/printOut', $d);			
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
		
		$dt['id_curr'] = $_POST['id_curr'];
		$dt['id_account_category'] = $_POST['id_account_category'];
		$dt['id_sub_account'] = $_POST['id_sub_account'];
		$dt['id_sub2_account'] = $_POST['id_sub2_account'];
		$dt['id_sub3_account'] = $_POST['id_sub3_account'];
		$dt['id_sub4_account'] = $_POST['id_sub4_account'];
		$dt['name_sub_account'] = $_POST['name_sub_account'];

		if(($_POST['id_sub_account'] != 0 || $_POST['id_sub_account'] != "") && ($_POST['id_sub2_account'] == 0 || $_POST['id_sub2_account'] == "") && ($_POST['id_sub3_account'] == 0 || $_POST['id_sub3_account'] == "")  && ($_POST['id_sub4_account'] == 0 || $_POST['id_sub4_account'] == "") )
		{
			$dt['number_parent'] = 1;
		}
		else if(($_POST['id_sub_account'] != 0 || $_POST['id_sub_account'] != "") && ($_POST['id_sub2_account'] != 0 || $_POST['id_sub2_account'] != "") && ($_POST['id_sub3_account'] == 0 || $_POST['id_sub3_account'] == "")  && ($_POST['id_sub4_account'] == 0 || $_POST['id_sub4_account'] == "") )
		{
			$dt['number_parent'] = 2;
		}
		else if(($_POST['id_sub_account'] != 0 || $_POST['id_sub_account'] != "") && ($_POST['id_sub2_account'] != 0 || $_POST['id_sub2_account'] != "") && ($_POST['id_sub3_account'] != 0 || $_POST['id_sub3_account'] != "")  && ($_POST['id_sub4_account'] == 0 || $_POST['id_sub4_account'] == "") )
		{
			$dt['number_parent'] = 3;
		}
		else if(($_POST['id_sub_account'] != 0 || $_POST['id_sub_account'] != "") && ($_POST['id_sub2_account'] != 0 || $_POST['id_sub2_account'] != "") && ($_POST['id_sub3_account'] != 0 || $_POST['id_sub3_account'] != "")  && ($_POST['id_sub4_account'] != 0 || $_POST['id_sub4_account'] != "") )
		{
			$dt['number_parent'] = 4;
		}

		$dt['deleted'] = 0;
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$this->db->insert("sub_account",$dt);
			$result =1;
		   
		}
		else
		{
			$id['id_act'] = $st;
			$this->db->update("sub_account",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function update()
	{
		$id['id_act'] = $_POST['st'];
		$dt['name_sub_account'] = $_POST['name_sub_account'];

		$this->db->update("sub_account",$dt,$id);
		$result=1;

		print json_encode($result);
	}
	
	function getDataById()
	{
		$id = $_GET['id'];
		$number_parent = $_GET['number_parent'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataById($id, $number_parent);

		print json_encode($dataTable);	

	}

	function getDataAll()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData();

		print json_encode($dataTable);	

	}

	function getDataAll_bank()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData_bank();

		print json_encode($dataTable);	

	}

	function getDataAll_kas()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataAll_kas();

		print json_encode($dataTable);	

	}

	function getDataAll_bankKas()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData_bankKas();

		print json_encode($dataTable);	

	}


	function getDataAll_1()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData_1();

		print json_encode($dataTable);	

	}

	function getDataAll_2()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData_2();

		print json_encode($dataTable);	

	}

	function getDataAll_3()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllData_3();

		print json_encode($dataTable);	

	}

	function getDataAll_akunBankMasuk()
	{
		$akun_except = $_GET['akun_except'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataAll_akunBankMasuk($akun_except);

		print json_encode($dataTable);	

	}

	function getDataAll_akunBankKeluar()
	{
		$akun_except = $_GET['akun_except'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataAll_akunBankKeluar($akun_except);

		print json_encode($dataTable);	

	}

	function getDataAll_akunKasMasuk()
	{
		$akun_except = $_GET['akun_except'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataAll_akunKasMasuk($akun_except);

		print json_encode($dataTable);	

	}

	function getDataAll_akunKasKeluar()
	{
		$akun_except = $_GET['akun_except'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataAll_akunKasKeluar($akun_except);

		print json_encode($dataTable);	

	}

	function hapus()
	{
		$result=0;
		$id = $_GET['id'];
		$where['id_account_category'] = $id;

		$row = $this->db->query("SELECT COUNT(*) as countId FROM sub_account WHERE id_sub_account = '$id' and id_sub2_account is not null")->row();		
		if ($row) {
		    $jumlah = $row->countId; 
		}


		if ($jumlah == 0)
		{
			$this->db->query("update sub_account SET DELETED=1 WHERE id_sub_account='$id')");
			$result = $this->db->affected_rows();

		}

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

   	function hapus2()
	{
		$result = 0;
		$id = $_GET['id'];
		$where['id_account_category'] = $id;
		
		$row = $this->db->query("SELECT COUNT(*) as countId FROM sub_account WHERE id_sub2_account = '$id' and id_sub3_account is not null")->row();		
		if ($row) {
		    $jumlah = $row->countId; 
		}


		if ($jumlah == 0)
		{
			$this->db->query("update sub_account SET DELETED=1 WHERE id_sub2_account='$id')");
			$result = $this->db->affected_rows();

		}
		
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

   	function hapus3()
	{
		$result = 0;
		$id = $_GET['id'];
		$where['id_account_category'] = $id;


		$row = $this->db->query("SELECT COUNT(*) as countId FROM sub_account WHERE id_sub3_account = '$id' and id_sub4_account is not null")->row();		
		if ($row) {
		    $jumlah = $row->countId; 
		}

		if ($jumlah == 0)
		{
			
			$this->db->query("update sub_account SET DELETED=1 WHERE id_sub3_account='$id'");
			$result = $this->db->affected_rows();

		}
		else
		{
			$result = 0;
		}
		
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

   	function hapus4()
	{
		$result = 0;
		$id = $_GET['id'];
		$where['id_account_category'] = $id;


		$this->db->query("update sub_account SET DELETED=1 WHERE id_sub4_account='$id'");
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
		$code = 'ST';
		$code .= sprintf("%02s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(id_account_category,2)) AS maxid FROM account_category')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}
}
