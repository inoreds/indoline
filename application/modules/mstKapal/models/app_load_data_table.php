<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From MstKapal");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From MstKapal where IdVessel='".$id."'");
	    return $get->result();
    }

    
    //------------------------------------------------------------------------------------------------------------------------------------------------------
    // App Load Data Sertifikat Kapal
    //------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllDataSertifikat($id)
    {
	    $get  = $this->db->query("Select * From SertifikatKapal where IdVessel='$id'");
	    return $get->result();
    }
	
	public function getDataByIdSertifikatKapal($IdVessel, $idSertifikatKapal)
	{
		$get = $this->db->query("Select * from SertifikatKapal where IdVessel='$IdVessel' and IdSertifikatKapal='$idSertifikatKapal'");
		return $get->result();
	}

	//-------------------------------------------------------------------------------------------------------------------------------------------------------

	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	// App load Data ABK
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllDataABK($id)
	{
		$get  = $this->db->query("Select * From ABKKapal where IdVessel='$id'");
	    return $get->result();
	}

	public function getDataByIdABK($IdVessel, $idABK)
	{
		$get = $this->db->query("Select * from ABKKapal where IdVessel='$IdVessel' and idABK='$idABK'");
		return $get->result();
	}

	public function getDataSertifikatABK($IdVessel, $idABK)
	{
		$get  = $this->db->query("Select * From SertifikatABK where IdVessel='$IdVessel' and idABK='$idABK'");
	    return $get->result();
	}

	//-------------------------------------------------------------------------------------------------------------------------------------------------------

	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	// App load Data Inventaris
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllDataInventaris($id)
	{
		$get  = $this->db->query("Select * From InventarisKapal where IdVessel='$id'");
	    return $get->result();
	}

	public function getDataByNoInventaris($IdVessel, $noInventaris)
	{
		$get = $this->db->query("Select * from InventarisKapal where IdVessel='$IdVessel' and noInventaris='$noInventaris'");
		return $get->result();
	}

	//-------------------------------------------------------------------------------------------------------------------------------------------------------

	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	// App load Data Inventaris
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllHistoryPerbaikan($id)
	{
		$get  = $this->db->query("Select * From HistoryPerbaikanKapal  hp, MstJenisPerbaikan jp, MstBarangInternal bi
		 						where hp.IdBarangInternal = bi.IdBarangInternal and hp.IdJenisPerbaikan = jp.IdJenisPerbaikan and IdVessel='$id'");
	    return $get->result();
	}

	public function getDataByHistoryPerbaikan($IdVessel, $noInventaris)
	{
		$get = $this->db->query("Select * from HistoryPerbaikanKapal where IdVessel='$IdVessel' and noInventaris='$noInventaris'");
		return $get->result();
	}


	//----------------------------------------------------------------------------------------------------------------------------------------------------------

	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	// App load Data MstSatuan
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllDataSatuan()
	{
		$get  = $this->db->query("Select * From MstSatuan");
	    return $get->result();
	}

	public function getAllDataSatuanById($id)
	{
		$get = $this->db->query("Select * from MstSatuan where IdSatuan='$id'");
		return $get->result();
	}


	//----------------------------------------------------------------------------------------------------------------------------------------------------------


	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	// App load Data BarangInternal
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllBarangInternal()
	{
		$get  = $this->db->query("Select * From MstBarangInternal bi, MstSatuan s where bi.IdSatuan = s.IdSatuan");
	    return $get->result();
	}

	public function getAllBarangInternalById($id)
	{
		$get = $this->db->query("Select * from MstBarangInternal bi, MstSatuan s where bi.IdSatuan = s.IdSatuan and IdBarangInternal='$id'");
		return $get->result();
	}


	//----------------------------------------------------------------------------------------------------------------------------------------------------------

	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	// App load Data Jenis Perbaikan
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function getAllJenisPerbaikan()
	{
		$get  = $this->db->query("Select * From MstJenisPerbaikan");
	    return $get->result();
	}

	public function getAllJenisPerbaikanById($id)
	{
		$get = $this->db->query("Select * from MstJenisPerbaikan where IdJenisPerbaikan='$id'");
		return $get->result();
	}


	//----------------------------------------------------------------------------------------------------------------------------------------------------------

}