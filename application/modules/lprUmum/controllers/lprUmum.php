<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lprUmum extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{
            if(isset($_GET['jenis'])) 
            {
                if($_GET['jenis'] == 'penjualan')
                {
                    $this->penjualan();
                }
                if($_GET['jenis'] == 'pembelian')
                {
                    $this->pembelian();
                }
            } 
            else
            {
                $d['username']  = $this->session->userdata("username");
                $d['level'] = $this->session->userdata("level");
                
                $this->load->view('dashboard/bg_header', $d);
                $this->load->view('dashboard/bg_navigation', $d);
                $this->load->view('lprUmum/content', $d);           
                $this->load->view('dashboard/bg_footer', $d);

            }
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
			
	}

    function pembelian()
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

    function penjualan()
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

	function pdf_pembelianPertamina()
    {
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_pembelianPertamina();
            $this->load->library("pdf");
            $this->pdf->set_paper('a3', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_pembelianNonPertamina()
    {
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_pembelianNonPertamina();
            $this->load->library("pdf");
            $this->pdf->set_paper('A3', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_pembelianNonAgen()
    {
            $this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_pembelianNonAgen();
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_ReturPembelian()
    {
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_ReturPembelian();
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_pembelianBarang()
    {
            $this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_pembelianBarang();
            $this->load->library("pdf");
            $this->pdf->set_paper('letter', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_penjualanBBM()
    {
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_penjualanBBM();
            $this->load->library("pdf");
            $this->pdf->set_paper('legal', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }
    function pdf_pembelianBBM()
    {
            $this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_penjualanBBM();
            $this->load->library("pdf");
            $this->pdf->set_paper('legal', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_pemakaianBBM()
    {
            $this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_pemakaianBBM();
            $this->load->library("pdf");
            $this->pdf->set_paper('legal', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }
	
	function pdf_penjualanBBM_Cust()
    {
    		$id = $_GET['id'];	
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_penjualanBBM_Cust($id);
            $this->load->library("pdf");
            $this->pdf->set_paper('legal', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_penjualanBBM_barang()
    {
    		$id = $_GET['id'];		
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_penjualanBBM_barang($id);
            $this->load->library("pdf");
            $this->pdf->set_paper('legal', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }

    function pdf_penjualanBBM_periode()
    {
    	$tglAwal = $_GET['tglAwal'];	
    	$tglAkhir = $_GET['tglAkhir'];	
    		$this->load->model('/m_laporan');
            $html = $this->m_laporan->pdf_penjualanBBM_periode($tglAwal	, $tglAkhir	);
            $this->load->library("pdf");
            $this->pdf->set_paper('legal', 'landscape');
            $this->pdf->load_html($html);
            $this->pdf->render();
            $this->pdf->stream("laporan.pdf");
    }
	
	
}
