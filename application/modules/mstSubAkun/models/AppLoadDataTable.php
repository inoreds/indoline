<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category and sa.id_curr=c.id_curr");
	    return $get->result();
    }

    public function getAllData_1()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category and sa.id_curr=c.id_curr and number_parent=1");
	    return $get->result();
    }

    public function getAllData_2()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category and sa.id_curr=c.id_curr and number_parent=2");
	    return $get->result();
    }

    public function getAllData_3()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category and sa.id_curr=c.id_curr and number_parent=3");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From sub_account sub_account sa, account_category ac, currency c where sa.id_account_category and sa.id_curr=c.id_curr and ID_ACT='".$id."'");
	    return $get->result();
    }	
	
	

}