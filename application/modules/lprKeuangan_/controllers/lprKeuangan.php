<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lprKeuangan extends CI_Controller {

	
	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{
		
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('lprKeuangan/content', $d);			
			$this->load->view('dashboard/bg_footer', $d);

				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
			
	}

	function pdf_BBM()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
        $customer = $_GET['customer'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_BBM($tahun, $bulan, $customer);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_BBM.pdf");
    }

    function pdf_BBK()
    {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $supplier = $_GET['supplier'];
            $this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_BBK($tahun, $bulan, $supplier);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_BBK.pdf");
    }

   
	
	
}
