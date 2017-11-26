<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lprPembelian extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
        {
            $d['username']  = $this->session->userdata("username");
            $d['level'] = $this->session->userdata("level");
            
            $this->load->view('dashboard/bg_header', $d);
            $this->load->view('dashboard/bg_navigation', $d);
            $this->load->view('lprUmum/content_pembelian', $d);           
            $this->load->view('dashboard/bg_footer', $d);
                
        }
        else
        {
            $this->session->sess_destroy();
            redirect("login");
        }
			
	}

   
	
	
	
}
