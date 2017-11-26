<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trnUangMasuk extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['dataTableInvoice'] = $this->app_load_data_table->getAllData();	
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnPembelianBarangKapal/content', $d);	
			$this->load->view('trnPembelianBarangKapal/modal_invoice');			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}


	function kwitansi()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$this->load->helper("terbilang");
			$this->load->model('/app_load_data_table');

			$d['dataTableInvoice'] = $this->app_load_data_table->getAllData();	
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			$d['terbilang'] = ucwords(number_to_words("1300000"));

			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('trnUangMasuk/kwitansi', $d);	
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	
}
