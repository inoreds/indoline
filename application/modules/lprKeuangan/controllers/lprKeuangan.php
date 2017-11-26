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

	function pdf_jurnal()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_jurnal($tahun, $bulan);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_jurnal.pdf");
    }

    function pdf_neracaSaldo()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_neracaSaldo($tahun, $bulan);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_neracaSaldo.pdf");
    }

    function pdf_labaRugi()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_labaRugi($tahun, $bulan);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_labaRugi.pdf");
    }

    function pdf_neraca()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_neraca($tahun, $bulan);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_neraca.pdf");
    }

    function pdf_bukuBesar()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    	$id = $_GET['id'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_bukuBesar($tahun, $bulan, $id);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_bukuBesar.pdf");
    }

    function pdf_perubahanModal()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_perubahanModal($tahun, $bulan);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_perubahan_modal.pdf");
    }

    function pdf_arusKas()
    {
    	$tahun = $_GET['tahun'];
    	$bulan = $_GET['bulan'];
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_arusKas($tahun, $bulan);
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'potrait');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan_arus_kas.pdf");
    }


	/*
	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			if(isset($_GET['subItem'])) 
			{
			   	if($_GET['subItem'] == 'neracaSaldo')
			   	{
			   		$this->neracaSaldo();
			   	}
			   
			} 
			else
			{
			$this->load->model('/app_load_data_table');

			$d['neracaSaldo'] = $this->app_load_data_table->loadNeracaSaldo();	
			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('lprKeuangan/neracaSaldo', $d);			
			$this->load->view('dashboard/bg_footer', $d);
			}
				
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
			$this->load->view('lprKeuangan/neracaSaldo', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}
	*/
	
	
}
