<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mstKapal extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			if(isset($_GET['subItem'])) 
			{
			   	if($_GET['subItem'] == 'sertifikatKapal')
			   	{
			   		$this->sertifikatKapal();
			   	}
			   	if($_GET['subItem'] == 'daftarABK')
			   	{
			   		$this->daftarABK();
			   	}
			   	if($_GET['subItem'] == 'inventarisKapal')
			   	{
			   		$this->inventarisKapal();
			   	}
			   	if($_GET['subItem'] == 'historyPerbaikan')
			   	{
			   		$this->historyPerbaikan();
			   	}
			} 
			else 
			{
				$d['dataTable'] = $this->app_load_data_table->getAllData();	
				$d['username']	= $this->session->userdata("username");
				$d['level']	= $this->session->userdata("level");
				
				$this->load->view('dashboard/bg_header', $d);
				$this->load->view('dashboard/bg_navigation', $d);
				$this->load->view('mstKapal/content', $d);			
				$this->load->view('dashboard/bg_footer', $d);

			}
				
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

			$d['dataTable'] = $this->app_load_data_table->getAllData();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");

			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('mstKapal/printOut', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function printOut_detil()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id = $_GET['id'];

			$this->load->model('/app_load_data_table');
			
			$this->load->model('/app_load_data_table');
			$d['dataTable'] = $this->app_load_data_table->getDataById($id);
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");

			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('mstKapal/printOut_detil', $d);			
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
		
		$dt['vesselName'] = $_POST['vesselName'];
		$dt['callSign'] = $_POST['callSign'];
		$dt['typeShip'] = $_POST['typeShip'];
		$dt['flag'] = $_POST['flag'];
		$dt['build'] = $_POST['build'];
		$dt['buildYear'] = $_POST['buildYear'];
		$dt['classification'] = $_POST['classification'];
		$dt['grossTonnage'] = $_POST['grossTonnage'];
		$dt['LOA1'] = $_POST['LOA1'];
		$dt['LOA2'] = $_POST['LOA2'];
		$dt['lengthBetweenPerpediculart'] = $_POST['lengthBetweenPerpediculart'];
		$dt['breadthMoulded'] = $_POST['breadthMoulded'];
		$dt['deptMoulded'] = $_POST['deptMoulded'];
		$dt['designDraft'] = $_POST['designDraft'];
		$dt['numberOfTank'] = $_POST['numberOfTank'];
		$dt['cargoTankMaterial'] = $_POST['cargoTankMaterial'];
		$dt['cargoTankCapacity'] = $_POST['cargoTankCapacity'];
		$dt['mainEngine'] = $_POST['mainEngine'];
		$dt['auxilaryEngine'] = $_POST['auxilaryEngine'];
		$dt['mesinGenerator'] = $_POST['mesinGenerator'];
		$dt['gambarKapal'] = $_POST['gambarKapal'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idVessel'] = $this->kode_inc($kode);
			$this->db->insert("MstKapal",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $st;
			$this->db->update("MstKapal",$dt,$id);
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
		$dataTable = $this->app_load_data_table->getAllData();

		print json_encode($dataTable);	

	}

	function hapus()
	{
		$id = $_GET['id'];
		$where['idVessel'] = $id;
		$this->db->delete("MstKapal",$where);
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
		$code = 'KAP';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_id() 
	{
		$maxid = 0;
		$row = $this->db->query('SELECT MAX(right(idVessel,5)) AS maxid FROM Mstkapal')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function uploadGambarKapal()
	{
		
		$name = $_POST['name'];
		$file_ext = $_POST['file_ext'];
		$path = 'uploads/GambarKapal/';
		
		if (!file_exists('./'.$path)) {
		    mkdir($path, 0777, true);
		}
		
		$config['upload_path'] = './'.$path ;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['overwrite'] = TRUE;
		$config['file_name'] = $name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$this->load->library('upload', $config);
		$count  = $this->upload->do_upload('file');
		$upload_data = $this->upload->data();

		if ($count == 1)
		{
			print $path.$upload_data['file_name'];
		}
		else
		{
			print 'Failed';
		}

	}

	//----------------------------------------------------------------------------------------------------------
	// Maintenance Data Sertifikat Kapal
	//----------------------------------------------------------------------------------------------------------

	function sertifikatKapal()
	{
		if(isset($_GET['id'])) {
		    $id = $_GET['id'];
		} else {
		    $id = '';
		}
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllDataSertifikat($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/content_sertifikat', $d);			
		$this->load->view('dashboard/bg_footer', $d);
	}

	function simpanSertifikatKapal()
	{
		$result=0;
		$kode = $this->get_idSertifikatKapal($_POST['idVessel']);
		$kode = $kode + 1;
		
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['namaSertifikat'] = $_POST['namaSertifikat'];
		$dt['jenisSertifikat'] = $_POST['jenisSertifikat'];
		$dt['tglTerbitSertifikat'] = $_POST['tglTerbitSertifikat'];
		$dt['tglHabisSertifikat'] = $_POST['tglHabisSertifikat'];
		$dt['namaInstansi'] = $_POST['namaInstansi'];
		$dt['documentPath'] = $_POST['documentPath'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idSertifikatKapal'] = $this->kode_incSertifikatKapal($kode);
			$this->db->insert("SertifikatKapal",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $_POST['idVessel'];
			$id['idSertifikatKapal'] = $st;
			$this->db->update("SertifikatKapal",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function kode_incSertifikatKapal($id)
	{
		$code = 'SK';
		$code .= sprintf("%04s", $id);
		return $code;
	}
	
	function get_idSertifikatKapal($id) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT MAX(right(idSertifikatKapal,4)) AS maxid FROM SertifikatKapal where IdVessel='$id'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}


	function uploadDataSertifikatKapal()
	{
		
		$name = $_POST['name'];
		$file_ext = $_POST['file_ext'];
		$path = 'uploads/SertifikatKapal/';
		
		if (!file_exists('./'.$path)) {
		    mkdir($path, 0777, true);
		}
		
		$config['upload_path'] = './'.$path ;
		$config['allowed_types'] = 'docx|doc|jpeg|jpg|pdf';
		$config['overwrite'] = TRUE;
		$config['file_name'] = $name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$this->load->library('upload', $config);
		$count  = $this->upload->do_upload('file');
		$upload_data = $this->upload->data();

		if ($count == 1)
		{
			print $path.$upload_data['file_name'];
		}
		else
		{
			print 'Failed';
		}

	}

	function hapusSertifikatKapal()
	{
		$idVessel = $_GET['idVessel'];
		$idSertifikatKapal = $_GET['idSertifikatKapal'];

		$where['idVessel'] = $idVessel;
		$where['idSertifikatKapal'] = $idSertifikatKapal;
		
		$this->db->delete("SertifikatKapal",$where);
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

   	function getDataByIdSertifikatKapal()
	{
		$idVessel = $_GET['idVessel'];
		$idSertifikatKapal  = $_GET['idSertifikatKapal'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataByIdSertifikatKapal($idVessel,$idSertifikatKapal);

		print json_encode($dataTable);	

	}

	function printOut_sertifikatKapal($id)
	{
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllDataSertifikat($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/printOut_sertifikatKapal', $d);
		$this->load->view('dashboard/bg_footer', $d);	
	}

	//-----------------------------------------------------------------------------------------------------------


	//-----------------------------------------------------------------------------------------------------------
	// Maintenance Data ABK
	//-----------------------------------------------------------------------------------------------------------


	function daftarABK()
	{
		if(isset($_GET['id'])) {
		    $id = $_GET['id'];
		} else {
		    $id = '';
		}
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllDataABK($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/content_abk', $d);			
		$this->load->view('dashboard/bg_footer', $d);
	}

	function simpanDataABKKapal()
	{
		$result=0;
		$kode = $this->get_idDataABKKapal($_POST['idVessel']);
		$kode = $kode + 1;
		
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['namaLengkap'] = $_POST['namaLengkap'];
		$dt['tempatLahir'] = $_POST['tempatLahir'];
		$dt['tglLahir'] = $_POST['tglLahir'];
		$dt['alamat'] = $_POST['alamat'];
		$dt['email'] = $_POST['email'];
		$dt['agama'] = $_POST['agama'];
		$dt['status'] = $_POST['status'];
		$dt['wargaNegara'] = $_POST['wargaNegara'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idABK'] = $this->kode_dataAbkKapal($kode);
			$this->db->insert("ABKKapal",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $_POST['idVessel'];
			$id['idABK'] = $st;
			$this->db->update("AbkKapal",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function kode_dataAbkKapal($id)
	{
		$code = 'ABK';
		$code .= sprintf("%04s", $id);
		return $code;
	}
	
	function get_idDataABKKapal($id) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT MAX(right(idABK,4)) AS maxid FROM ABKKapal where IdVessel='$id'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}


	function hapusDataABKKapal()
	{
		$idVessel = $_GET['idVessel'];
		$idABK = $_GET['idABK'];

		$where['idVessel'] = $idVessel;
		$where['idABK'] = $idABK;
		
		$this->db->delete("ABKKapal",$where);
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

   	function getDataByidABK()
	{
		$idVessel = $_GET['idVessel'];
		$idABK  = $_GET['idABK'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataByidABK($idVessel,$idABK);

		print json_encode($dataTable);	

	}

	function simpanDataSertifikatABK()
	{
		$result=0;
		$kode = $this->get_idDataSertifikatABK();
		$kode = $kode + 1;
		
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['idABK'] = $_POST['idABK'];
		$dt['namaSertifikatABK'] = $_POST['namaSertifikatABK'];
		$dt['noSertifikatABK'] = $_POST['noSertifikatABK'];
		$dt['tempatSertifikat'] = $_POST['tempatSertifikat'];
		$dt['tglTerbitSertifikatABK'] = $_POST['tglTerbitSertifikatABK'];
		$dt['tglHabisSertifikatABK'] = $_POST['tglHabisSertifikatABK'];
		$dt['documentPath'] = $_POST['documentPath'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idSertifikatABK'] = $this->kode_dataSertifikatABK($kode);
			$this->db->insert("SertifikatABK",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $_POST['idVessel'];
			$id['idABK'] = $st;
			$this->db->update("SertifikatABK",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}	

	function uploadDataSertifikatABK()
	{
		
		$name = $_POST['name'];
		$file_ext = $_POST['file_ext'];
		$path = 'uploads/SertifikatABK/';
		
		if (!file_exists('./'.$path)) {
		    mkdir($path, 0777, true);
		}
		
		$config['upload_path'] = './'.$path ;
		$config['allowed_types'] = 'docx|doc|jpeg|jpg|pdf|png|pdf';
		$config['overwrite'] = TRUE;
		$config['file_name'] = $name;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$this->load->library('upload', $config);
		$count  = $this->upload->do_upload('file');
		$upload_data = $this->upload->data();

		if ($count == 1)
		{
			print $path.$upload_data['file_name'];
		}
		else
		{
			print 'Failed';
		}

	}	

	function kode_dataSertifikatABK($id)
	{
		$code = 'S_ABK';
		$code .= sprintf("%04s", $id);
		return $code;
	}
		

	function get_idDataSertifikatABK($id) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT MAX(right(IdSertifikatABK,4)) AS maxid FROM SertifikatABK")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}	

	function printOut_daftarABK($id)
	{
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllDataABK($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/printOut_abk', $d);
		$this->load->view('dashboard/bg_footer', $d);	
	}

	function getDataSertifikatABK()
	{
		$idVessel = $_GET['idVessel'];
		$idABK  = $_GET['idABK'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataSertifikatABK($idVessel,$idABK);

		print json_encode($dataTable);	

	}

	//------------------------------------------------------------------------------------------------------
	// Mantenance Inventaris Kapal
	//------------------------------------------------------------------------------------------------------

	function inventarisKapal()
	{
		if(isset($_GET['id'])) {
		    $id = $_GET['id'];
		} else {
		    $id = '';
		}
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllDataInventaris($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/content_inventaris', $d);			
		$this->load->view('dashboard/bg_footer', $d);
	}

	function simpanInventarisKapal()
	{
		$result=0;
		$kode = $this->get_noInventarisKapal($_POST['idVessel']);
		$kode = $kode + 1;
		
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['namaBarang'] = $_POST['namaBarang'];
		$dt['jumlah'] = $_POST['jumlah'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['noInventaris'] = $this->kode_inventarisKapal($kode);
			$this->db->insert("InventarisKapal",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $_POST['idVessel'];
			$id['noInventaris'] = $st;
			$this->db->update("InventarisKapal",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function kode_inventarisKapal($id)
	{
		$code = 'INV';
		$code .= sprintf("%05s", $id);
		return $code;
	}
	
	function get_noInventarisKapal($id) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT MAX(right(noInventaris,5)) AS maxid FROM InventarisKapal where IdVessel='$id'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function hapusInventarisKapal()
	{
		$idVessel = $_GET['idVessel'];
		$noInventaris = $_GET['noInventaris'];

		$where['idVessel'] = $idVessel;
		$where['noInventaris'] = $noInventaris;
		
		$this->db->delete("InventarisKapal",$where);
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

   	function getDataByNoInventaris()
	{
		$idVessel = $_GET['idVessel'];
		$noInventaris  = $_GET['noInventaris'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataByNoInventaris($idVessel,$noInventaris);

		print json_encode($dataTable);	

	}

	function printOut_inventarisKapal($id)
	{
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllDataInventaris($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/printOut_inventaris', $d);
		$this->load->view('dashboard/bg_footer', $d);	
	}

	//-------------------------------------------------------------------------------------------------------------

	//------------------------------------------------------------------------------------------------------
	// Mantenance history Kapal
	//------------------------------------------------------------------------------------------------------

	function historyPerbaikan()
	{
		if(isset($_GET['id'])) {
		    $id = $_GET['id'];
		} else {
		    $id = '';
		}
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllHistoryPerbaikan($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/content_history', $d);			
		$this->load->view('dashboard/bg_footer', $d);
	}

	function simpanHistoryPerbaikan()
	{
		$result=0;
		$kode = $this->get_idHistoryPerbaikan($_POST['idVessel']);
		$kode = $kode + 1;
		
		$dt['idVessel'] = $_POST['idVessel'];
		$dt['idBarangInternal'] = $_POST['idBarangInternal'];
		$dt['idJenisPerbaikan'] = $_POST['idJenisPerbaikan'];
		$dt['tanggalPerbaikan'] = $_POST['tanggalPerbaikan'];
		$dt['namaTeknisi'] = $_POST['namaTeknisi'];
		$dt['jumlah'] = $_POST['jumlah'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idHistoryPerbaikan'] = $this->kode_historyPerbaikan($kode);
			$this->db->insert("HistoryPerbaikanKapal",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $_POST['idVessel'];
			$id['idHistoryPerbaikan'] = $st;
			$this->db->update("HistoryPerbaikanKapal",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function simpanJenisPerbaikan()
	{
		$result=0;
		$kode = $this->get_idJenisPerbaikan();
		$kode = $kode + 1;
		
		$dt['namaJenisPerbaikan'] = $_POST['namaJenisPerbaikan'];
		$st = $_POST['st'];
		
		if($st=="tambah")
		{
			$dt['idJenisPerbaikan'] = $this->kode_jenisPerbaikan($kode);
			$this->db->insert("MstJenisPerbaikan",$dt);
			$result =1;
		   
		}
		else
		{
			$id['idVessel'] = $_POST['idVessel'];
			$id['idHistoryPerbaikan'] = $st;
			$this->db->update("MstJenisPerbaikan",$dt,$id);
			$result=1;
		}	
		print json_encode($result);
	}

	function kode_jenisPerbaikan($id)
	{
		$code = 'JP';
		$code .= sprintf("%02s", $id);
		return $code;
	}
	
	function get_idJenisPerbaikan($id) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT MAX(right(idJenisPerbaikan,2)) AS maxid FROM MstJenisPerbaikan")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function kode_historyPerbaikan($id)
	{
		$code = 'HIS';
		$code .= sprintf("%04s", $id);
		return $code;
	}
	
	function get_idHistoryPerbaikan($id) 
	{
		$maxid = 0;
		$row = $this->db->query("SELECT MAX(right(idHistoryPerbaikan,4)) AS maxid FROM HistoryPerbaikanKapal where IdVessel='$id'")->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}
		return $maxid;
	}

	function hapusHistoryPerbaikan()
	{
		$idVessel = $_GET['idVessel'];
		$idHistoryPerbaikan = $_GET['idHistoryPerbaikan'];

		$where['idVessel'] = $idVessel;
		$where['idHistoryPerbaikan'] = $idHistoryPerbaikan;
		
		$this->db->delete("HistoryPerbaikanKapal",$where);
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

   	function getDataByHistoryPerbaikan()
	{
		$idVessel = $_GET['idVessel'];
		$idHistoryPerbaikan  = $_GET['idHistoryPerbaikan'];
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getDataByHistoryPerbaikan($idVessel,$idHistoryPerbaikan);

		print json_encode($dataTable);	

	}

	function getAllDataBarangInternal()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllBarangInternal();

		print json_encode($dataTable);	

	}

	function getAllJenisPerbaikan()
	{
		$this->load->model('/app_load_data_table');
		$dataTable = $this->app_load_data_table->getAllJenisPerbaikan();

		print json_encode($dataTable);	

	}

	function printOut_historyPerbaikan($id)
	{
		$this->load->model('/app_load_data_table');

		$d['dataTable'] = $this->app_load_data_table->getAllHistoryPerbaikan($id);	
		$d['username']	= $this->session->userdata("username");
		$d['level']	= $this->session->userdata("level");
		$d['idParrent'] = $id;

		$this->load->view('dashboard/bg_header', $d);
		$this->load->view('dashboard/bg_navigation', $d);
		$this->load->view('mstKapal/printOut_history', $d);
		$this->load->view('dashboard/bg_footer', $d);	
	}
	//-------------------------------------------------------------------------------------------------------------


}
