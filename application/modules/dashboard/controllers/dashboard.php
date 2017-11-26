<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{

			$d['username']	= $this->session->userdata("username");
			$d['level']	= $this->session->userdata("level");
			
			$this->load->view('dashboard/bg_header', $d);
			$this->load->view('dashboard/bg_navigation', $d);
			$this->load->view('dashboard/bg_home', $d);			
			$this->load->view('dashboard/bg_footer', $d);
				
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}

	function jsonDashboardGauge()
	{
		$total_perenacanaan=0;
		$total_realisasi=0;
		$presentase=0;
		$tgl_sekarang = date("Y-m-d");
		$y = 0;

		$query = $this->db->query("select sum(jumlah_bb) as jumlah_bb, sum(diterima) as diterima  from bahan_baku bb, 
			perencanaan_bahan_baku pbb, supplier s where bb.id_supplier = s.id_supplier 
			and pbb.id_perencanaan = bb.id_perencanaan and tgl_perencanaan='".$tgl_sekarang."'
			group by tgl_perencanaan");

		  if($query->num_rows() >0 )
		  {
		    $row =  $query->row();
		    $total_perenacanaan  = $row->jumlah_bb; // return the count
		    $total_realisasi  = $row->diterima; // return the count
		  }
		 
		if (($total_realisasi != 0) & ($total_perenacanaan	!= 0))   
		{
				$presentase = ($total_realisasi	 / $total_perenacanaan	) * 100; 
				$y = 100;	
		} 	

		$rows = array();
		$r = array();
		$r['color']	='#0099CC';
		$r['radius']	='100%';
		$r['innerRadius']	='100%';
		$r['y']	=$y;
		$r['total'] = $total_perenacanaan;
		
		$rows['name'] = 'Perencanaan';
		$rows['borderColor'] = '#0099CC';
		$rows['data'][] = $r;	
		
		$rows1 = array();
		$r1 = array();
		$r1['color']	='#ADCC00';
		$r1['radius']	='75%';
		$r1['innerRadius']	='75%';
		$r1['y']	=$presentase;
		$r1['total'] = $total_realisasi;

		$rows1['name'] = 'Realisasi';
		$rows1['borderColor'] = '#ADCC00';
		$rows1['data'][] = $r1;	

		

		$result = array();
		array_push($result,$rows);
		array_push($result,$rows1);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function jsonDashboardGaugePelanggan()
	{
		$total_perenacanaan=0;
		$total_realisasi=0;
		$presentase=0;
		$tgl_sekarang = date("Y-m-d");

		$query = $this->db->query("select count(*) as rencana from detil_pesanan where tgl_pesanan='".$tgl_sekarang."'");
		  if($query->num_rows() >0 )
		  {
		    $row =  $query->row();
		    $total_perenacanaan  = $row->rencana; // return the count
		  }

		$query = $this->db->query("select count(*) as realisasi from detil_pesanan where tgl_pesanan='".$tgl_sekarang."' and invoice is not null");
		  if($query->num_rows() >0 )
		  {
		    $row =  $query->row();
		    $total_realisasi  = $row->realisasi; // return the count
		  }
		 
		if (($total_realisasi != 0) & ($total_perenacanaan	!= 0))  	
				$presentase = ($total_realisasi / $total_perenacanaan	) * 100; 	

		$rows = array();
		$r = array();
		$r['color']	='#0099CC';
		$r['radius']	='100%';
		$r['innerRadius']	='100%';
		$r['y']	= round($presentase);
		$r['total'] = $total_perenacanaan;
		
		$rows['name'] = 'Realisasi Pengiriman';
		$rows['borderColor'] = '#0099CC';
		$rows['data'][] = $r;	
		
		$result = array();
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function jsonDataPerencanaan()
	{
		$query = $this->db->query("select round(sum(jumlah_perencanaan)) as title, tgl_perencanaan as start from perencanaan_bahan_baku group by tgl_perencanaan");
		echo json_encode($query->result_array());
	}

	function jsonDataPemesanan()
	{
		$query = $this->db->query("select concat(p.id_pesanan,'/',pl.nama_pel,'/',jenis,'/',jumlah) as title, dp.tgl_pesanan as start from 
									pesanan p ,
									detil_pesanan dp,
									pelanggan pl
									where p.id_pesanan = dp.id_pesanan and pl.id_pelanggan = p.id_pelanggan
									order by dp.tgl_pesanan,p.id_pesanan");
		echo json_encode($query->result_array());
	}

	function jsonBahanBaku()
	{

		$tgl_sekarang = date("Y-m-d");

		$rows = array();
		$query = $this->db->query("select * from persediaan_bayangan where tgl_persediaan<='".$tgl_sekarang."' order by tgl_persediaan desc limit 1");

		  if($query->num_rows() >0 )
		  {
		    $g =  $query->row();
		    $total = ($g->jenis_A + $g->jenis_B + $g->jenis_C + $g->jenis_D + $g->jenis_E);

		    $row[0] = "0.1-4mm : ".$g->jenis_A. " Ton ";
		    $row[1] = ($g->jenis_A / $total) * 100;
		    array_push($rows,$row);

		    $row[0] = "5-10mm : ".$g->jenis_B. " Ton " ;
		    $row[1] = ($g->jenis_B / $total) * 100;
		    array_push($rows,$row);

		    $row[0] = "11-15mm : ". $g->jenis_C. " Ton ";
		    $row[1] = ($g->jenis_C / $total) * 100;
		    array_push($rows,$row);

		    $row[0] = "16-20mm : ".$g->jenis_D. " Ton ";
		    $row[1] = ($g->jenis_D / $total) * 100;
		    array_push($rows,$row);

		    $row[0] = "21-30mm : ".$g->jenis_E. " Ton ";
		    $row[1] = ($g->jenis_E / $total) * 100;
		    array_push($rows,$row);

		  }
		  else
		  {
		  	$row[0] = "<=4mm : 0 Ton ";
		    $row[1] = 0;
		    array_push($rows,$row);

		    $row[0] = "5-10mm : 0 Ton " ;
		    $row[1] = 0;
		    array_push($rows,$row);

		    $row[0] = "11-15mm : 0 Ton ";
		    $row[1] = 0;
		    array_push($rows,$row);

		    $row[0] = "16-20mm : 0 Ton ";
		    $row[1] = 0;
		    array_push($rows,$row);

		    $row[0] = "21-30mm : 0 Ton ";
		    $row[1] = 0;
		    array_push($rows,$row);
		  }
		 
		print json_encode($rows, JSON_NUMERIC_CHECK);;
	}

	function grafikPenjualan_bulan()
	{
		$tahun = $_GET['tahun'];
		$tgl_sekarang = date("Y-m-d");

		$rows = array();
		$series = array();
		$series1 = array();
		$result = array();
		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total_pesanan from detil_pesanan 
				where month(tgl_pesanan)=".$i." and year(tgl_pesanan)=".$tahun."");	

			$g =  $query->row();

			if ($g->total_pesanan	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total_pesanan;
			}	
			
		    array_push($series,$row);	
		}
		
		$row1 = "Jan";
		array_push($series1,$row1);	

		$row1 = "Feb";
		array_push($series1,$row1);	

		$row1 = "Mar";
		array_push($series1,$row1);	

		$row1 = "Apr";
		array_push($series1,$row1);	

		$row1 = "May";
		array_push($series1,$row1);	

		$row1 = "Jun";
		array_push($series1,$row1);	

		$row1 = "Jul";
		array_push($series1,$row1);	

		$row1 = "Aug";
		array_push($series1,$row1);	

		$row1 = "Sept";
		array_push($series1,$row1);	

		$row1 = "Oct";
		array_push($series1,$row1);	

		$row1 = "Nov";
		array_push($series1,$row1);	

		$row1 = "Dec";
		array_push($series1,$row1);	

		$rows['name'] = 'Data';
		$rows['data'] = $series1;
		
		array_push($result,$rows);

		$rows['name'] = 'Penjualan';
		$rows['data'] = $series;	
		
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function grafikPenjualan_tahun()
	{

		$tgl_sekarang = date("Y-m-d");
		$result = array();

		$rows = array();
		$rows1 = array();
		$series = array();
		$series1 = array();
		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total_pesanan from detil_pesanan 
				where year(tgl_pesanan)=".$i."");	

			$g =  $query->row();

			if ($g->total_pesanan	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total_pesanan;
			}	
			$row1 = "Tahun ".$i."";
		    array_push($series,$row);	
		    array_push($series1,$row1);	
		}
		
		$rows['name'] = 'Data';
		$rows['data'] = $series1;	
		
		array_push($result,$rows);

		$rows['name'] = 'Penjualan';
		$rows['data'] = $series;	
		
		array_push($result,$rows);



		print json_encode($result, JSON_NUMERIC_CHECK);;
	}


	function grafikPenjualanPerProduk_bulan()
	{
		$tahun = $_GET['tahun'];
		$tgl_sekarang = date("Y-m-d");

		$rows = array();
		$result = array();
		$seriesBulan = array();
		$series1 = array();
		$series2 = array();
		$series3 = array();
		$series4 = array();	
		$series5 = array();

		$row1 = "Jan";
		array_push($seriesBulan,$row1);	

		$row1 = "Feb";
		array_push($seriesBulan,$row1);	

		$row1 = "Mar";
		array_push($seriesBulan,$row1);	

		$row1 = "Apr";
		array_push($seriesBulan,$row1);	

		$row1 = "May";
		array_push($seriesBulan,$row1);	

		$row1 = "Jun";
		array_push($seriesBulan,$row1);	

		$row1 = "Jul";
		array_push($seriesBulan,$row1);	

		$row1 = "Aug";
		array_push($seriesBulan,$row1);	

		$row1 = "Sept";
		array_push($seriesBulan,$row1);	

		$row1 = "Oct";
		array_push($seriesBulan,$row1);	

		$row1 = "Nov";
		array_push($seriesBulan,$row1);	

		$row1 = "Dec";
		array_push($seriesBulan,$row1);	

		$rows['name'] = 'Data';
		$rows['data'] = $seriesBulan;
		
		array_push($result,$rows);	

		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where month(tgl_pesanan)=".$i." and year(tgl_pesanan)=".$tahun." and jenis='A'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series1,$row);	
		}
		
		$rows['name'] = '0.1-4mm';
		$rows['data'] = $series1;		
		array_push($result,$rows);


		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where month(tgl_pesanan)=".$i." and year(tgl_pesanan)=".$tahun." and jenis='B'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series2,$row);	
		}
		
		$rows['name'] = '5-10mm';
		$rows['data'] = $series2;		
		array_push($result,$rows);



		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where month(tgl_pesanan)=".$i." and year(tgl_pesanan)=".$tahun." and jenis='C'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series3,$row);	
		}
		
		$rows['name'] = '11-15mm';
		$rows['data'] = $series3;		
		array_push($result,$rows);


		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where month(tgl_pesanan)=".$i." and year(tgl_pesanan)=".$tahun." and jenis='D'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series4,$row);	
		}
		
		$rows['name'] = '16-20mm';
		$rows['data'] = $series4;		
		array_push($result,$rows);


		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where month(tgl_pesanan)=".$i." and year(tgl_pesanan)=".$tahun." and jenis='E'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series5,$row);	
		}
		
		$rows['name'] = '21-30mm';
		$rows['data'] = $series5;		
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function grafikPenjualanPerProduk_tahun()
	{

		$tgl_sekarang = date("Y-m-d");

		$rows = array();
		$result = array();
		$seriesTahun = array();
		$series1 = array();
		$series2 = array();
		$series3 = array();
		$series4 = array();	
		$series5 = array();


		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where year(tgl_pesanan)=".$i." and jenis='A'");	

			$tahun = "Tahun ". $i ."";	
			
		    array_push($seriesTahun,$tahun);	
		}	

		$rows['name'] = 'Data';
		$rows['data'] = $seriesTahun;
		array_push($result,$rows);

		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where year(tgl_pesanan)=".$i." and jenis='A'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series1,$row);	
		}
		
		$rows['name'] = '0.1-4mm';
		$rows['data'] = $series1;		
		array_push($result,$rows);


		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where year(tgl_pesanan)=".$i." and jenis='B'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series2,$row);	
		}
		
		$rows['name'] = '5-10mm';
		$rows['data'] = $series2;		
		array_push($result,$rows);



		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where year(tgl_pesanan)=".$i." and jenis='C'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series3,$row);	
		}
		
		$rows['name'] = '11-15mm';
		$rows['data'] = $series3;		
		array_push($result,$rows);


		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where year(tgl_pesanan)=".$i." and jenis='D'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series4,$row);	
		}
		
		$rows['name'] = '16-20mm';
		$rows['data'] = $series4;		
		array_push($result,$rows);


		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah) as total from detil_pesanan 
				where year(tgl_pesanan)=".$i."  and jenis='E'");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = $g->total;
			}	
			
		    array_push($series5,$row);	
		}
		
		$rows['name'] = '21-30mm';
		$rows['data'] = $series5;		
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function grafikPerencanaan_bulan()
	{
		$tahun = $_GET['tahun'];

		$tgl_sekarang = date("Y-m-d");

		$rows = array();
		$series = array();
		$seriesBulan = array();
		$result = array();

		$row1 = "Jan";
		array_push($seriesBulan,$row1);	

		$row1 = "Feb";
		array_push($seriesBulan,$row1);	

		$row1 = "Mar";
		array_push($seriesBulan,$row1);	

		$row1 = "Apr";
		array_push($seriesBulan,$row1);	

		$row1 = "May";
		array_push($seriesBulan,$row1);	

		$row1 = "Jun";
		array_push($seriesBulan,$row1);	

		$row1 = "Jul";
		array_push($seriesBulan,$row1);	

		$row1 = "Aug";
		array_push($seriesBulan,$row1);	

		$row1 = "Sept";
		array_push($seriesBulan,$row1);	

		$row1 = "Oct";
		array_push($seriesBulan,$row1);	

		$row1 = "Nov";
		array_push($seriesBulan,$row1);	

		$row1 = "Dec";
		array_push($seriesBulan,$row1);	

		$rows['name'] = 'Data';
		$rows['data'] = $seriesBulan;	

		array_push($result,$rows);	

		for ($i = 1; $i<=12; $i++)
		{
			$query = $this->db->query("select sum(jumlah_perencanaan) as total from perencanaan_bahan_baku 
				where month(tgl_perencanaan)=".$i." and year(tgl_perencanaan)=".$tahun."");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = ceil($g->total);
			}	
			
		    array_push($series,$row);	
		}
		
		
		$rows['name'] = 'Produksi';
		$rows['data'] = $series;	
		
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function grafikPerencanaan_tahun()
	{

		$tgl_sekarang = date("Y-m-d");
		$result = array();	
		$rows = array();
		$series = array();
		$series1 = array();
		for ($i = 2013; $i<=2016; $i++)
		{
			$query = $this->db->query("select sum(jumlah_perencanaan) as total from perencanaan_bahan_baku 
				where year(tgl_perencanaan)=".$i."");	

			$g =  $query->row();

			if ($g->total	== null)
			{
				$row = 0;	
			}	
			else
			{
				$row = ceil($g->total);
			}	
			
		    $row1 = "Tahun ".$i."";
		    array_push($series,$row);	
		    array_push($series1,$row1);	
		}
		
		$rows['name'] = 'Data';
		$rows['data'] = $series1;	
		
		array_push($result,$rows);
		
		$rows['name'] = 'Produksi';
		$rows['data'] = $series;	
		
		
		array_push($result,$rows);

		print json_encode($result, JSON_NUMERIC_CHECK);;
	}

	function grafik_supplier()
	{

		$tgl_sekarang = date("Y-m-d");

		$rows = array();
		$series = array();
		$series1 = array();

		$query = $this->db->query("select nama_sup, poin_barang from supplier LIMIT 5");	
		foreach($query->result() as $g)
		{
		
			$row = $g->nama_sup;
		    array_push($series,$row);

		    $row1 = $g->poin_barang;
		    array_push($series1,$row1);		
		}
					
		$rows['name'] = 'Produksi';
		$rows['category'] = $series;
		$rows['data'] = $series1;	
		
		//$result = array();
		//array_push($result,$rows);

		print json_encode($rows, JSON_NUMERIC_CHECK);;
	}

}
