<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_gl extends CI_Model {

	public function tabel_data_coa($limit, $offset)
	{
			$hasil = "";
		$hasil .= '
			  <thead>
				  <tr>
					  <th>Kode Akun 1</th>
					  <th>Kode Akun 2</th>
					  <th>Nama Akun</th>
					  <th>Tipe Akun</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['account_name']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_chart_master");	  
		
		$tot_hal = $this->db->get("0_chart_master");
		$config['base_url'] = base_url() . 'gl/pemeliharaan_coa/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("account_code","DESC")->get("0_chart_master",$limit,$offset);
		$get = $this->db->order_by("account_code","DESC")->get("0_chart_master",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->account_code.'</td>
					<td class="center">'.$g->account_code2.'</td>
					<td class="center">'.$g->account_name.'</td>
					<td class="center">'.$g->account_type.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'pelanggan/edit/'.$g->account_code.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'pelanggan/hapus/'.$g->account_code.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="icon-remove"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		//$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	public function tabel_data_coa_class($limit, $offset)
	{
			$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Id</th>
					  <th>Nama Kelas</th>
					  <th>Tipe</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['class_name']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_chart_class");	  
		
		$tot_hal = $this->db->get("0_chart_class");
		$config['base_url'] = base_url() . 'gl/pemeliharaan_coa_class/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("cid","DESC")->get("0_chart_class",$limit,$offset);
		$get = $this->db->order_by("cid","DESC")->get("0_chart_class",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->cid.'</td>
					<td class="center">'.$g->class_name.'</td>
					<td class="center">'.$g->ctype.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'pelanggan/edit/'.$g->cid.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'pelanggan/hapus/'.$g->cid.'" onClick=\'return confirm("Anda yakin?");\'>
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
	
	public function tabel_data_coa_group($limit, $offset)
	{
			$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Id</th>
					  <th>Nama</th>
					  <th>Kelas</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['id']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_chart_types");	  
		
		$tot_hal = $this->db->get("0_chart_types");
		$config['base_url'] = base_url() . 'gl/pemeliharaan_coa_group/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id","DESC")->get("0_chart_types",$limit,$offset);
		$get = $this->db->order_by("id","DESC")->get("0_chart_types",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->id.'</td>
					<td class="center">'.$g->name.'</td>
					<td class="center">'.$g->class_id.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'pelanggan/edit/'.$g->id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'pelanggan/hapus/'.$g->id.'" onClick=\'return confirm("Anda yakin?");\'>
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