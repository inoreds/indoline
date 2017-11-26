<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lprPenjualan extends CI_Controller {

	function index()
	{
		 if($this->session->userdata("logged_in")!="")
        {
            $d['username']  = $this->session->userdata("username");
            $d['level'] = $this->session->userdata("level");
            
            $this->load->view('dashboard/bg_header', $d);
            $this->load->view('dashboard/bg_navigation', $d);
            $this->load->view('lprUmum/content_penjualan', $d);           
            $this->load->view('dashboard/bg_footer', $d);
                
        }
        else
        {
            $this->session->sess_destroy();
            redirect("login");
        }
			
	}


	function neracaSaldo()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$this->load->model('/app_load_data_table');

			$d['neracaSaldo'] = $this->app_load_data_table->loadNeracaSaldo();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('laporan/neracaSaldo', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	
	
	
}
