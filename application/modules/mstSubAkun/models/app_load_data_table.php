<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category=ac.id_account_category and sa.id_curr=c.id_curr and sa.deleted<>1");
	    return $get->result();
    }

    public function getAllData_1()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category=ac.id_account_category and sa.id_curr=c.id_curr and number_parent=1 and sa.deleted<>1");
	    return $get->result();
    }

    public function getAllData_2()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category=ac.id_account_category and sa.id_curr=c.id_curr and number_parent=2 and sa.deleted<>1");
	    return $get->result();
    }

    public function getAllData_3()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category=ac.id_account_category and sa.id_curr=c.id_curr and number_parent=3 and sa.deleted<>1");
	    return $get->result();
    }

    public function getAllData_4()
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category=ac.id_account_category and sa.id_curr=c.id_curr and number_parent=4 and sa.deleted<>1");
	    return $get->result();
    }

	public function getDataById($id,$number_parent)
    {
	    $get  = $this->db->query("Select * From sub_account sa, account_category ac, currency c where sa.id_account_category=ac.id_account_category and sa.id_account_category and sa.id_curr=c.id_curr and ID_ACT='$id' and number_parent='$number_parent' and sa.deleted<>1");
	    return $get->result();
    }	
	
	public function getAllData_bank()
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and sa.id_account_category =1
							    	and name_sub_account like '%bank%'
							    	and sa.deleted<>1");
	    return $get->result();
    }

    public function getAllData_bankKas()
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and sa.id_account_category =1
							    	and (name_sub_account like '%bank%' or name_sub_account like '%kas%')
							    	and sa.deleted<>1");
	    return $get->result();
    }

    public function getDataAll_akunBankMasuk($akun_except)
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and (sa.id_account_category =1 or sa.id_account_category=3 or sa.id_account_category=6)
							    	and name_sub_account not like '%persediaan%'
							    	and name_sub_account not like '%piutang%'
							    	and number_parent <> 1
									and number_parent <> 2
									and id_act <> '$akun_except'
							    	and sa.deleted<>1");
	    return $get->result();
    }

    
    public function getDataAll_akunKasMasuk($akun_except)
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and (sa.id_account_category =1 or sa.id_account_category=3 or sa.id_account_category=6)
							    	and name_sub_account not like '%persediaan%'
							    	and name_sub_account not like '%piutang%'
							    	and number_parent <> 1
									and number_parent <> 2
									and id_act <> '$akun_except'
							    	and sa.deleted<>1");
	    return $get->result();
    }

    public function getDataAll_akunBankKeluar($akun_except)
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and (sa.id_account_category =1 or sa.id_account_category=5)
							    	and name_sub_account not like '%persediaan%'
							    	and name_sub_account not like '%piutang%'
									and number_parent <> 1
									and number_parent <> 2
									and id_act <> '$akun_except'
							    	and sa.deleted<>1");
	    return $get->result();
    }

    public function getDataAll_akunKasKeluar($akun_except)
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and (sa.id_account_category =1 or sa.id_account_category=5)
							    	and name_sub_account not like '%persediaan%'
							    	and name_sub_account not like '%piutang%'
									and number_parent <> 1
									and number_parent <> 2
									and id_act <> '$akun_except'
							    	and sa.deleted<>1");
	    return $get->result();
    }

    public function getDataAll_kas()
    {
	    $get  = $this->db->query("Select * From 
							    	sub_account sa, 
							    	account_category ac, 
							    	currency c where sa.id_account_category=ac.id_account_category 
							    	and sa.id_curr=c.id_curr 
							    	and sa.id_account_category =1
							    	and (name_sub_account like '%kas%')
							    	and sa.deleted<>1");
	    return $get->result();
    }

}