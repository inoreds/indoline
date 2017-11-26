<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_model extends CI_Model {

	/**
	 * @author : Mochamad Rifai Idris
	 * @keterangan : Model untuk manajemen user login
	 **/

	function lookup($keyword){
		$this->db->select('*')->from('0_stock_master');
        $this->db->like('stock_id',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}
	
	public function tabel_data_item($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Stock Id.</th>
					  <th>Deskripsi</th>
					  <th>Akun Sales</th>
					  <th>Akun C.O.G.S</th>
					  <th>Akun Inventory</th>					  				 
					  <th>Akun Adjusment</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['description']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_stock_master");	  
		
		$tot_hal = $this->db->get("0_stock_master");
		$config['base_url'] = base_url() . 'dashboard/inventory/pemeliharaan_items/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("stock_id","DESC")->get("0_stock_master",$limit,$offset);
		$get = $this->db->order_by("stock_id","DESC")->get("0_stock_master",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->stock_id.'</td>
					<td class="center">'.$g->description.'</td>
					<td class="center">'.$g->sales_account.'</td>
					<td class="center">'.$g->cogs_account.'</td>
					<td class="center">'.$g->inventory_account.'</td>
					<td class="center">'.$g->adjustment_account.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/pelanggan/edit/'.$g->stock_id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->stock_id.'" onClick=\'return confirm("Anda yakin?");\'>
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
	
	public function tabel_data_category($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Category Id.</th>
					  <th>Deskripsi</th>
					  <th>Akun Sales</th>
					  <th>Akun C.O.G.S</th>
					  <th>Akun Inventory</th>					  				 
					  <th>Akun Adjusment</th>
					  <th>Akun Assembly</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['description']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_stock_category");	  
		
		$tot_hal = $this->db->get("0_stock_category");
		$config['base_url'] = base_url() . 'dashboard/inventory/pemeliharaan_categories/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("stock_id","DESC")->get("0_stock_category",$limit,$offset);
		$get = $this->db->order_by("stock_id","DESC")->get("0_stock_category",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->category_id.'</td>
					<td class="center">'.$g->description.'</td>
					<td class="center">'.$g->dflt_sales_act.'</td>
					<td class="center">'.$g->dflt_cogs_act.'</td>
					<td class="center">'.$g->dflt_inventory_act.'</td>
					<td class="center">'.$g->dflt_adjusment_act.'</td>
					<td class="center">'.$g->dflt_assembly_act.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/pelanggan/edit/'.$g->stock_id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->stock_id.'" onClick=\'return confirm("Anda yakin?");\'>
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

	public function tabel_data_lokasi($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Kode Lokasi</th>
					  <th>Nama Lokasi</th>
					  <th>Alamat Pengiriman</th>
					  <th>No. Telepon 1</th>
					  <th>No. Telepon 2</th>					  				 
					  <th>No. Fax</th>
					  <th>Alamat Email</th>
					  <th>No. Kontak</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['location_name']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_locations");	  
		
		$tot_hal = $this->db->get("0_locations");
		$config['base_url'] = base_url() . 'dashboard/inventory/pemeliharaan_locations/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("loc_code","DESC")->get("0_locations",$limit,$offset);
		$get = $this->db->order_by("loc_code","DESC")->get("0_locations",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$i.'</td>
					<td class="center">'.$g->location_name.'</td>
					<td class="center">'.$g->delivery_address.'</td>
					<td class="center">'.$g->phone.'</td>
					<td class="center">'.$g->phone2.'</td>
					<td class="center">'.$g->fax.'</td>
					<td class="center">'.$g->email.'</td>
					<td class="center">'.$g->contact.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/pelanggan/edit/'.$g->loc_code.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->loc_code.'" onClick=\'return confirm("Anda yakin?");\'>
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
	public function tabel_data_movement($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Id Perpindahan</th>
					  <th>Nama Perpindahan</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
		$where['name']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_movement_types");	  
		
		$tot_hal = $this->db->get("0_movement_types");
		$config['base_url'] = base_url() . 'dashboard/inventory/pemeliharaan_movement/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id","DESC")->get("0_movement_types",$limit,$offset);
		$get = $this->db->order_by("id","DESC")->get("0_movement_types",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->id.'</td>
					<td class="center">'.$g->name.'</td>
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/pelanggan/edit/'.$g->id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->id.'" onClick=\'return confirm("Anda yakin?");\'>
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
	
	public function tabel_data_satuan($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-hover table-nomargin table-bordered">
			  <thead>
				  <tr>
					  <th>Kode Satuan</th>
					  <th>Nama Satuan</th>
					   <th>Decimal</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
			  
		$where['name']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_item_units");	  
		
		$tot_hal = $this->db->get("0_item_units");
		$config['base_url'] = base_url() . 'dashboard/inventory/pemeliharaan_units/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		
		$this->pagination->initialize($config);

		$get = $this->db->like($where)->order_by("abbr","DESC")->get("0_item_units",$limit,$offset);
		$get = $this->db->order_by("abbr","DESC")->get("0_item_units",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->abbr.'</td>
					<td class="center">'.$g->name.'</td>
					<td class="center">'.$g->decimals.'</td>					
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/inventory/pemeliharaan_units/edit/'.$g->abbr.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/inventory/pemeliharaan_units/hapus/'.$g->abbr.'" onClick=\'return confirm("Anda yakin?");\'>
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
	
	public function tabel_iaya_harga_pembelian($limit)
	{
		
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Lokasi</th>
					  <th>Jumlah yang ada</th>
					  <th>Susunan Ulang</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select location_name, sum(qty) as qty, lc.loc_code as loc_code
																from 0_loc_stock lc, 0_locations l, 0_stock_moves sm 
																where lc.loc_code=l.loc_code and 
																	 lc.stock_id = sm.stock_id and  lc.stock_id='001'");
		
		$config['base_url'] = base_url() . 'dashboard/gaji_karyawan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select location_name, sum(qty) as qty, lc.loc_code as loc_code
														from 0_loc_stock lc, 0_locations l,  0_stock_moves sm  
																where lc.loc_code=l.loc_code and 
																	 lc.stock_id = sm.stock_id and  lc.stock_id='001'");
	
		foreach($get->result() as $g)
		{
			form_open("dashboard/inventory/inventory_items/simpan_reorder",'class="form-horizontal"');
			$hasil .= ' <tbody>
				<tr>
					<td>'.$g->location_name.'</td>
					<td class="center">'.$g->qty.'</td>
					<td class="center"><input type="text" class="input-xlarge" value="" name="'.$g->loc_code.'" required /></td>
				</tr>';
	
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();

		//$hasil .= '<a  class="btn btn-primary" href ="'.base_url().'dashboard/inventory/inventory_items/simpan_reorder/'.$g->stock_id.'">Update</a>';
		return $hasil;
	 
	}
	
	public function tabel_biaya_harga_pembelian($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-hover table-nomargin table-bordered">
			  <thead>
				  <tr>
					  <th>Kode Pemasok</th>
					  <th>Nama Pemasok</th>
					   <th>Harga</th>
					   <th>Satuan Pemasok</th>
					  	<th>Konversi</th>
					   <th>Deskripsi Pemasok</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
			  
		$where['suppliers_uom']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_purch_data");	  
		
		$tot_hal = $this->db->get("0_purch_data");
		$config['base_url'] = base_url() . 'dashboard/inventory/biaya_harga_purchasing/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		
		$this->pagination->initialize($config);

		$get = $this->db->like($where)->order_by("supplier_id","DESC")->get("0_purch_data",$limit,$offset);
		$get = $this->db->order_by("supplier_id","DESC")->get("0_purch_data",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->supplier_id.'</td>
					<td class="center">'.$g->stock_id.'</td>
					<td class="center">'.$g->price.'</td>					
					<td class="center">'.$g->suppliers_uom.'</td>
					<td class="center">'.$g->conversion_factor.'</td>
					<td class="center">'.$g->supplier_description.'</td>			
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/edit/'.$g->supplier_id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/hapus/'.$g->supplier_id.'" onClick=\'return confirm("Anda yakin?");\'>
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

	public function tabel_biaya_harga_penjualan($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-hover table-nomargin table-bordered">
			  <thead>
				  <tr>
					  <th>Id</th>
					  <th>Stock Id</th>
					   <th>Sales_type_id</th>
					   <th>curr_abrev</th>
					  	<th>price</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
			  
		$where['id']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_prices");	  
		
		$tot_hal = $this->db->get("0_prices");
		$config['base_url'] = base_url() . 'dashboard/inventory/biaya_harga_sales/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		
		$this->pagination->initialize($config);

		$get = $this->db->like($where)->order_by("id","DESC")->get("0_prices",$limit,$offset);
		$get = $this->db->order_by("id","DESC")->get("0_prices",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->id.'</td>
					<td class="center">'.$g->stock_id.'</td>
					<td class="center">'.$g->sales_type_id.'</td>					
					<td class="center">'.$g->curr_abrev.'</td>
					<td class="center">'.$g->price.'</td>	
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/edit/'.$g->id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/hapus/'.$g->id.'" onClick=\'return confirm("Anda yakin?");\'>
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

		public function tabel_standard_cost($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-hover table-nomargin table-bordered">
			  <thead>
				  <tr>
					  <th>Stock Id</th>
					   <th>Harga Standar</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
			  
		$where['stock_id']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_stock_master");	  
		
		$tot_hal = $this->db->get("0_stock_master");
		$config['base_url'] = base_url() . 'dashboard/inventory/biaya_cost/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		
		$this->pagination->initialize($config);

		$get = $this->db->like($where)->order_by("stock_id","DESC")->get("0_stock_master",$limit,$offset);
		$get = $this->db->order_by("stock_id","DESC")->get("0_stock_master",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->stock_id.'</td>
					<td class="center">'.$g->material_cost.'</td>					
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/edit/'.$g->stock_id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/hapus/'.$g->stock_id.'" onClick=\'return confirm("Anda yakin?");\'>
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

	
	public function tabel_data_kits($limit, $offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-hover table-nomargin table-bordered">
			  <thead>
				  <tr>
					  <th>id</th>
					  <th>item_code</th>
					   <th>stock_id</th>
					   <th>descripsi</th>
					  	<th>Jumlah</th>
					  <th>Aksi</th>
				  </tr>
			  </thead>';
			  
		$where['item_code']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("0_item_codes");	  
		
		$tot_hal = $this->db->get("0_item_codes");
		$config['base_url'] = base_url() . 'dashboard/inventory/pemeliharaan_kits/index';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		
		$this->pagination->initialize($config);

		$get = $this->db->like($where)->order_by("id","DESC")->get("0_item_codes",$limit,$offset);
		$get = $this->db->order_by("id","DESC")->get("0_item_codes",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td class="center">'.$g->id.'</td>
					<td class="center">'.$g->item_code.'</td>
					<td class="center">'.$g->stock_id.'</td>					
					<td class="center">'.$g->description.'</td>
					<td class="center">'.$g->category_id.'</td>	
					<td class="center">
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/edit/'.$g->id.'">
							<i class="icon-edit"></i>  
						</a>
						<a class="btn" href="'.base_url().'dashboard/inventory/biaya_harga_purchasing/hapus/'.$g->id.'" onClick=\'return confirm("Anda yakin?");\'>
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
	public function tabel_reorder_level($limit)
	{
		
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Lokasi</th>
					  <th>Jumlah yang ada</th>
					  <th>Susunan Ulang</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select location_name, sum(qty) as qty, lc.loc_code as loc_code
																from 0_loc_stock lc, 0_locations l, 0_stock_moves sm 
																where lc.loc_code=l.loc_code and 
																	 lc.stock_id = sm.stock_id and  lc.stock_id='001'");
		
		$config['base_url'] = base_url() . 'dashboard/gaji_karyawan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select location_name, sum(qty) as qty, lc.loc_code as loc_code
														from 0_loc_stock lc, 0_locations l,  0_stock_moves sm  
																where lc.loc_code=l.loc_code and 
																	 lc.stock_id = sm.stock_id and  lc.stock_id='001'");
	
		foreach($get->result() as $g)
		{
			form_open("dashboard/inventory/inventory_items/simpan_reorder",'class="form-horizontal"');
			$hasil .= ' <tbody>
				<tr>
					<td>'.$g->location_name.'</td>
					<td class="center">'.$g->qty.'</td>
					<td class="center"><input type="text" class="input-xlarge" value="" name="'.$g->loc_code.'" required /></td>
				</tr>';
	
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();

		//$hasil .= '<a  class="btn btn-primary" href ="'.base_url().'dashboard/inventory/inventory_items/simpan_reorder/'.$g->stock_id.'">Update</a>';
		return $hasil;
	 
	}
	
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */