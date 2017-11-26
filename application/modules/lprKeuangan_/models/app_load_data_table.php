<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_table extends CI_Model {

	public function getAllData()
    {
	    $get  = $this->db->query("Select ID_JOUR, a.ID_ACT, NAME_SUB_ACCOUNT, DEBIT, CREDIT * -1 as CREDIT From journals j, sub_account a where j.id_act = a.id_act order by ID_JOUR");
	    return $get->result();
    }

	public function getDataById($id)
    {
	    $get  = $this->db->query("Select * From journals where id_jour='".$id."'");
	    return $get->result();
    }	
	
	public function loadNeracaSaldo()
	{
		$get = $this->db->query("select NAME_SUB_ACCOUNT,
									(CASE when (SUM(DEBIT) - SUM(CREDIT)) > 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as DEBIT,
								    (CASE when (SUM(DEBIT) - SUM(CREDIT)) < 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as CREDIT
								from sub_account sa 
								left outer join journals j on sa.id_act = j.id_act
								group by name_sub_account
								order by id_sub_account;");
		return $get->result();
	}
	
	public function loadLabaRugi()
	{
		$get = $this->db-query("select NAME_SUB_ACCOUNT,
									(CASE when (SUM(DEBIT) - SUM(CREDIT)) > 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as DEBIT,
									(CASE when (SUM(DEBIT) - SUM(CREDIT)) < 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as CREDIT
								from sub_account sa 
								inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
								left outer join journals j on sa.id_act = j.id_act
								WHERE ac.ID_ACCOUNT_CATEGORY = 4 OR ac.ID_ACCOUNT_CATEGORY = 5
								group by name_sub_account
								order by id_sub_account;");
		return $get->result();
	}

	public function aktiva()
	{
		$get = $this->db-query("select ID_SUB_ACCOUNT, NAME_SUB_ACCOUNT,
									SUM(DEBIT) - SUM(CREDIT) as saldo
								from sub_account sa 
								inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
								left outer join journals j on sa.id_act = j.id_act
								WHERE ac.ID_ACCOUNT_CATEGORY = 1
								group by name_sub_account
								order by sa.id_act asc;");
		return $get->result();
	}

	public function kewajiban()
	{
		$get = $this->db-query("select ID_SUB_ACCOUNT, NAME_SUB_ACCOUNT,
									SUM(DEBIT) - SUM(CREDIT) as saldo
								from sub_account sa 
								inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
								left outer join journals j on sa.id_act = j.id_act
								WHERE ac.ID_ACCOUNT_CATEGORY = 2
								group by name_sub_account
								order by sa.id_act asc;");
		return $get->result();
	}

	public function labaRugi()
	{
		$get = $this->db-query("select ID_SUB_ACCOUNT, NAME_SUB_ACCOUNT,
									SUM(DEBIT) - SUM(CREDIT) as saldo
								from sub_account sa 
								inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
								left outer join journals j on sa.id_act = j.id_act
								WHERE ac.ID_ACCOUNT_CATEGORY = 4 or ac.ID_ACCOUNT_CATEGORY = 5
								group by name_sub_account
								order by sa.id_act asc;");
		return $get->result();
	}

}