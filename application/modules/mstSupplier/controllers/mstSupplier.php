<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstSupplier extends CI_Controller {

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
			$this->load->view('mstSupplier/content', $d);			
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
		
		$dt['namaSupplier'] = $_POST['namaSupplier'];
		$dt['alamatSupplier'] = $_POST['alamatSupplier'];
		$dt['telpSupplier'] = $_POST['telpSupplier'];
		$dt['emailSupplier'] = $_POST['emailSupplier'];
		$dt['faxSupplier'] = $_POST['faxSupplier'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idSupplier'] = $this->kode_inc($kode);
			$this->db->insert("MstSupplier",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idSupplier'] = $st;
			$this->db->update("MstSupplier",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}
	
	function printOut()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTable'] = $this->app_load_data_table->getDataAll();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('mstSupplier/printOut', $d);			
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
		$dataTable = $this->app_load_data_table->getDataAll();

		print json_encode($dataTable);	
	}	

	function hapus()
	{
		$id = $_GET['id'];
		$where['idSupplier'] = $id;
		$this->db->delete("MstSupplier",$where);
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
		$code = 'SUP';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(idSupplier,5)) AS maxid FROM MstSupplier')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}


	function importExcel_supplier()
	{
		
		$file_ext = $_POST['file_ext'];
		$path = 'uploads/temp_upload/';
		
		$config['upload_path'] = './'.$path ;
		$config['allowed_types'] = 'xls';
		$config['max_size'] = '10000';

		$this->load->library('upload', $config);
		$upload_data = $this->upload->data();

      	// load library Excell_Reader
	    $this->load->library('Excel_reader');

      	$this->load->library('upload', $config);
		$count  = $this->upload->do_upload('file');
		$upload_data = $this->upload->data();

	    //tentukan file
	    $this->excel_reader->setOutputEncoding('230787');
	    $file = $upload_data['full_path'];
	    $this->excel_reader->read($file);
	    error_reporting(E_ALL ^ E_NOTICE);

	      // array data
	    $result=0;
		$kode = $this->get_id();

	    $data = $this->excel_reader->sheets[0];
	    $dataexcel = Array();
	    for ($i = 1; $i <= $data['numRows']; $i++) {
	           if ($data['cells'][$i+1][1] == '')
	               break;
	           $dataexcel[$i - 1]['IdSupplier'] = $this->kode_inc($kode + $i);
	           $dataexcel[$i - 1]['NamaSupplier'] = $data['cells'][$i+1][1];
	           $dataexcel[$i - 1]['AlamatSupplier'] = $data['cells'][$i+1][2];
	           $dataexcel[$i - 1]['TelpSupplier'] = $data['cells'][$i+1][3];
	           $dataexcel[$i - 1]['FaxSupplier'] = $data['cells'][$i+1][4];
	           $dataexcel[$i - 1]['EmailSupplier'] = $data['cells'][$i+1][5];
	           $dataexcel[$i - 1]['JumlahBatasKredit'] = $data['cells'][$i+1][6];
	      }

	      for ($i = 0; $i < count($dataexcel); $i++) {
            $data = array(
                'IdSupplier' => $dataexcel[$i]['IdSupplier'],
                'NamaSupplier' => $dataexcel[$i]['NamaSupplier'],
                'AlamatSupplier' => $dataexcel[$i]['AlamatSupplier'],
                'TelpSupplier' => $dataexcel[$i]['TelpSupplier'],
                'FaxSupplier' => $dataexcel[$i]['FaxSupplier'],
                'EmailSupplier' => $dataexcel[$i]['EmailSupplier']

            );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
            $this->db->insert("MstSupplier",$data);
        }
	      

		print $count;
	}
}
