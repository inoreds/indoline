<?php
/**
 * Created by PhpStorm.
 * User: GilangSonar
 * Date: 5/4/14
 * Time: 4:49 PM
 */

class model_get_id extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_id(){
        $q = $this->db->query("select count(*) from tbl_kota");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("s", $tmp);
            }
        }else{
            $code = "01";
        }
        return "kota-".$code;
    }
}
?>