<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_kota extends CI_Model {

	public function tabel_data_kota($limit, $offset)
	{
			$hasil = "";
		$hasil .= '
			<table class="table table-striped datagrid m-b-sm">
			  <thead>
				  <tr>
					  <th>Id Kota</th>
					  <th>Nama Kota</th>
					  <th>Longitde</th>
					  <th>Latitude</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['account_name']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("tbl_kota");	  
		
		$tot_hal = $this->db->get("tbl_kota");
		$config['base_url'] = base_url() . 'kota/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id_kota","DESC")->get("tbl_kota",$limit,$offset);
		$get = $this->db->order_by("id_kota","DESC")->get("tbl_kota",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->id_kota.'</td>
					<td class="center">'.$g->nama_kota.'</td>
					<td class="center">'.$g->longitude.'</td>
					<td class="center">'.$g->langitude.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'kota/edit/'.$g->account_code.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'kota/hapus/'.$g->account_code.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="icon-remove"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	

}