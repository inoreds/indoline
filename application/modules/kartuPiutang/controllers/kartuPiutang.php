<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kartuPiutang extends CI_Controller {

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
			$this->load->view('kartuPiutang/content', $d);			
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
		
		$dt['namaPerusahaan'] = $_POST['namaPerusahaan'];
		$dt['namaCustomer'] = $_POST['namaCustomer'];
		$dt['alamatCustomer'] = $_POST['alamatCustomer'];
		$dt['jenisKelamin'] = $_POST['jenisKelamin'];
		$dt['NPWP']	= $_POST['NPWP'];
		$dt['kabupatenKota'] = $_POST['kabupatenKota'];
		$dt['provinsi'] = $_POST['provinsi'];
		$dt['kodePos'] = $_POST['kodePos'];
		$dt['telpCustomer1'] = $_POST['telpCustomer1'];
		$dt['telpCustomer2'] = $_POST['telpCustomer2'];
		$dt['emailCustomer'] = $_POST['emailCustomer'];
		$dt['faxCustomer'] = $_POST['faxCustomer'];
		$dt['jumlahBatasKredit'] = $_POST['jumlahBatasKredit'];
		$dt['namaPenanggungJawab'] = $_POST['namaPenanggungJawab'];
		$dt['telpPenanggungJawab'] = $_POST['telpPenanggungJawab'];
		$dt['namaBagianKeuangan'] = $_POST['namaBagianKeuangan'];
		$dt['telpBagianKeuangan'] = $_POST['telpBagianKeuangan'];

		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idCustomer'] = $this->kode_inc($kode);
			$this->db->insert("MstCustomer",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idCustomer'] = $st;
			$this->db->update("MstCustomer",$dt,$id);
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
			$this->load->view('MstCustomer/printOut', $d);			
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
		$where['idCustomer'] = $id;
		$this->db->delete("MstCustomer",$where);
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
		$code = 'PEL';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(idCustomer,5)) AS maxid FROM MstCustomer')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function importExcel_customer()
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
	           $dataexcel[$i - 1]['IdCustomer'] = $this->kode_inc($kode + $i);
	           $dataexcel[$i - 1]['NamaCustomer'] = $data['cells'][$i+1][1];
	           $dataexcel[$i - 1]['AlamatCustomer'] = $data['cells'][$i+1][2];
	           $dataexcel[$i - 1]['JenisKelamin'] = $data['cells'][$i+1][3];
	           $dataexcel[$i - 1]['NPWP'] = $data['cells'][$i+1][4];
	           $dataexcel[$i - 1]['KabupatenKota'] = $data['cells'][$i+1][5];
	           $dataexcel[$i - 1]['Provinsi'] = $data['cells'][$i+1][6];
	           $dataexcel[$i - 1]['KodePOS'] = $data['cells'][$i+1][7];
	           $dataexcel[$i - 1]['TelpCustomer1'] = $data['cells'][$i+1][8];
	           $dataexcel[$i - 1]['TelpCustomer2'] = $data['cells'][$i+1][9];
	           $dataexcel[$i - 1]['EmailCustomer'] = $data['cells'][$i+1][10];
	           $dataexcel[$i - 1]['FaxCustomer'] = $data['cells'][$i+1][11];
	           $dataexcel[$i - 1]['JumlahBatasKredit'] = $data['cells'][$i+1][12];

	      }

	      for ($i = 0; $i < count($dataexcel); $i++) {
            $data = array(
                'IdCustomer' => $dataexcel[$i]['IdCustomer'],
                'NamaCustomer' => $dataexcel[$i]['NamaCustomer'],
                'AlamatCustomer' => $dataexcel[$i]['AlamatCustomer'],
                'JenisKelamin' => $dataexcel[$i]['JenisKelamin'],
                'NPWP' => $dataexcel[$i]['NPWP'],
                'KabupatenKota' => $dataexcel[$i]['KabupatenKota'],
                'Provinsi' => $dataexcel[$i]['Provinsi'],
                'KodePOS' => $dataexcel[$i]['KodePOS'],
                'TelpCustomer1' => $dataexcel[$i]['TelpCustomer1'],
                'TelpCustomer2' => $dataexcel[$i]['TelpCustomer2'],
                'EmailCustomer' => $dataexcel[$i]['EmailCustomer'],
                'FaxCustomer' => $dataexcel[$i]['FaxCustomer'],
                'JumlahBatasKredit' => $dataexcel[$i]['JumlahBatasKredit']

            );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
            $this->db->insert("MstCustomer",$data);
        }
	      

		print $count;
	}
}
