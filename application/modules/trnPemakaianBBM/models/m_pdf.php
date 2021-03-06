<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_pdf extends CI_Model {

  
  public function pdf_ppn($noPO)
  {    
  	$hasil = "";
        $hasil .= "
            <style>
				body{
				  background-color: #f0f0f0;
				  width: 700px;
				  float: center;
				}

				hr.style1{
					border-top: 3px solid #8c8b8b;
					border-color: #ff0000 #0000ff;
				}


				hr.style2 {
					border-top: 3px double #0000FF;
					border-color: #0000FF #0000FF;
				}

				hr.style3 {
					border-top: 1px dashed #8c8b8b;
				}

				hr.style4 {
					border-top: 1px dotted #8c8b8b;
				}

				hr.style5 {
					background-color: #fff;
					border-top: 2px dashed #8c8b8b;
				}


				hr.style6 {
					background-color: #fff;
					border-top: 2px dotted #8c8b8b;
				}

				hr.style7 {
					border-top: 1px solid #8c8b8b;
					border-bottom: 1px solid #fff;
				}


				hr.style8 {
					border-top: 1px solid #8c8b8b;
					border-bottom: 1px solid #fff;
				}
				hr.style8:after {
					content: '';
					display: block;
					margin-top: 2px;
					border-top: 1px solid #8c8b8b;
					border-bottom: 1px solid #fff;
				}

				hr.style9 {
					border-top: 1px dashed #8c8b8b;
					border-bottom: 1px dashed #fff;
				}

				hr.style10 {
					border-top: 1px dotted #8c8b8b;
					border-bottom: 1px dotted #fff;
				}


				hr.style11 {
					height: 6px;
					background: url(http://ibrahimjabbari.com/english/images/hr-11.png) repeat-x 0 0;
					border: 0;
				}


				hr.style12 {
					height: 6px;
					background: url(http://ibrahimjabbari.com/english/images/hr-12.png) repeat-x 0 0;
					border: 0;
				}

				hr.style13 {
					height: 10px;
					border: 0;
					box-shadow: 0 10px 10px -10px #8c8b8b inset;
				}


				hr.style14 { 
				  border: 0; 
				  height: 1px; 
				  background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
				  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
				  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
				  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0); 
				}


				hr.style15 {
					border-top: 4px double #8c8b8b;
					text-align: center;
				}
				hr.style15:after {
					content: \002665;
					display: inline-block;
					position: relative;
					top: -15px;
					padding: 0 10px;
					background: #f0f0f0;
					color: #8c8b8b;
					font-size: 18px;
				}

				hr.style16 { 
				  border-top: 1px dashed #8c8b8b; 
				} 
				hr.style16:after { 
				  content: \002702; 
				  display: inline-block; 
				  position: relative; 
				  top: -12px; 
				  left: 40px; 
				  padding: 0 3px; 
				  background: #f0f0f0; 
				  color: #8c8b8b; 
				  font-size: 18px; 
				}


				hr.style17 {
					border-top: 1px solid #8c8b8b;
					text-align: center;
				}
				hr.style17:after {
					content: 'ยง';
					display: inline-block;
					position: relative;
					top: -14px;
					padding: 0 10px;
					background: #f0f0f0;
					color: #8c8b8b;
					font-size: 18px;
					-webkit-transform: rotate(60deg);
					-moz-transform: rotate(60deg);
					transform: rotate(60deg);
				}


				hr.style18 { 
				  height: 30px; 
				  border-style: solid; 
				  border-color: #8c8b8b; 
				  border-width: 1px 0 0 0; 
				  border-radius: 20px; 
				} 
				hr.style18:before { 
				  display: block; 
				  content: ; 
				  height: 30px; 
				  margin-top: -31px; 
				  border-style: solid; 
				  border-color: #8c8b8b; 
				  border-width: 0 0 1px 0; 
				  border-radius: 20px; 
				}
			</style>";

		/*
		<?php
		$Data 		= mysql_query("Select * From PenjualanBBM p, MstCustomer c where p.IdCustomer = c.IdCustomer AND c.NamaCustomer= '$namaPelanggan'");
		$getData 	= mysql_fetch_array($Data); 
		$DataC 		= mysql_query("Select * From MstCustomer WHERE NamaCustomer= '$namaPelanggan'");
		$getDataC 	= mysql_fetch_array($DataC); 
		?>
		*/	
        $get = $this->db->query("Select * from PembelianNonPertamina p, MstSupplier s, BarangBBM b, MstKapal k where k.IdVessel = p.IdVessel and p.IdSupplier = s.IdSupplier and p.IdBBM = b.IdBBM and POPembelian_non='$noPO'");      
        

        $noPO="";
        $namaSupplier="";
        $emailSupplier="";
        $vesselName = "";
        $portSource = "";
        $tglPengisian = "";
        $namaBBM = "";
        $jumlahPermintaan = "";
        $hargaPenjualan = "";
        $tglPO = "";
        $namaSupplier = "";
        $telpSupplier = "";
        $namaPerusahaan = "PT. INDOLINE INCOMEKITA";
        $noHP = "";

        foreach($get->result() as $g)
        {
            
            $noPO = $g->POPembelian_non;
            $namaSupplier = $g->NamaSupplier;
            $emailSupplier = $g->EmailSupplier;
            $vesselName = $g->VesselName;
            $portSource = $g->PortSource;
            $tglPengisian = $g->TglPengisian;
            $namaBBM = $g->NamaBBM;
            $jumlahPermintaan = $g->JumlahPermintaan;
            $hargaPenjualan = $g->HargaPenjualan;
            $tglPO = $g->TglPengajuan;
            $telpSupplier = $g->TelpSupplier;
        }

        $hasil .= '<table border="0" >
						<thead>
							<tr class="headings">
								<th class="column-title" style="width: 100%;" colspan="3">&nbsp;</th>
								
								'.$noPO.'</th>
							</tr>
						</thead>
					</table>
					<hr class="style2">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<table border="0" >
							<thead>
								<tr class="headings">
									<th class="column-title" style="width: 2%;"></th>
									<th class="column-title" style="width: 50%;"></th>
									<th class="column-title" style="width: 50%;"></th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<font style="font-family:Times New Roman; font-size:15px"><strong>Surabaya, <?php echo date("d-F-Y")?></strong></font>
								</td>
							</tr>
							<tr>
								<td width = "50%">				
									<p style="border:0; line-height:1.5 ">
										<font style="font-family:Times New Roman; font-size:15px">
											Kepada Yth,
											<br/>'.$namaPerusahaan.'
											<br/>'.$namaSupplier.'
											<br/>Telp.'.$telpSupplier.'
											<br/>Email. '.$emailSupplier.'
										</font>
									</p>
								</td>
								
							</tr>
							<tr align="center">
								<td style="text-align:center">
									<h2 align="center" style="text-align:center;"><u>Purchasing Order</u></h2>
								</td>
							</tr>
							
							</tbody>
						</table>
						<div class="x_content">
							<div class="table-responsive">
								<table border="0" cellspacing="1">
									<thead>
										
									</thead>
									<tbody>
										<tr>
											<td width="100%" colspan="4">
													&emsp;&emsp;Bersama ini kami sampaikan Permintaan Pengisian Bahan Bakar Minyak (BBM) sebagai <br/>berikut :
												
											</td>
										</tr>
										<tr>
											<td width="10%">&nbsp;</td>
											<td>Nama Kapal:</td>
											<td>:</td>
											<td width="50%">'.$vesselName.'</td>
										</tr>
										<tr>
											<td width="10%">&nbsp;</td>
											<td>Pelabuhan Pengisian Bunker </td>
											<td>:</td>
											<td width="50%">'.$portSource.'</td>
										</tr>
										<tr>
											<td width="10%">&nbsp;</td>
											<td>Tanggal Pengisian</td>
											<td>:</td>
											<td width="50%">'.$tglPengisian.'</td>
										</tr>
										<tr>
											<td width="10%">&nbsp;</td>
											<td>Spesifikasi BBM</td>
											<td>:</td>
											<td width="50%">'.$namaBBM.'</td>
										<tr>
										</tr>
											<td width="10%">&nbsp;</td>
											<td>Volume Bunker</td>
											<td>:</td>
											<td width="50%">'.$jumlahPermintaan.'</td>
										<tr>
										</tr>
											<td width="10%">&nbsp;</td>
											<td>Harga</td>
											<td>:</td>
											<td width="50%"><?php echo "Rp. ".'.$hargaPenjualan.',-/Liter</td>
										</tr>
										<tr>
											<td width="10%">&nbsp;</td>
											<td>Syarat Pembayaran</td>
											<td>:</td>
											<td width="50%">Syarat Pembayaran // '.$tglPO.'</td>
										</tr>
										<tr>
											<td width="20%">&nbsp;</td>
											<td>Contact Person</td>
											<td>:</td>
											<td width="50%">'.$namaSupplier.' '. $noHP .'</td>
										</tr>
										<tr>
											<td width="100%" colspan="4">
												<br />Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih.
											</td>
										</tr>
									</tbody>
								</table>
								<br/>
								<br/>
								<table border="1" cellspacing="1">
									<thead align="center">
										<th style="text-align:center"width="20%" align="center">Menyetujui</th>
										<th style="text-align:center"width="20%" align="center">Hormat Kami</th>
									</thead>
									<tbody>				
										<tr>
											<td>'.strtoupper($namaPerusahaan).'</td>	
											<td>&nbsp;</td>	
										</tr>
										<tr>
											<td colspan="2">&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2">&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2">&nbsp;</td>
										</tr>
										<tr>
											<td align="center">( . . . . . . . . . . . . . . . . . . )</td>
											<td align="center"><u>Erid Mutiar. SE,. M. Ak</u></td>
										</tr>
										
									<tbody>
								</table>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<br/>
								<table border="0" cellspacing="1" width="100%">
									<tr>
										<td width="65%">
											&nbsp; <font size="3">Note :Harap untuk dokumen asli dapat segera dikirim guna pembayaran pelunasan. </font> </i>
											<br/>
											<blockquote style="line-height:1.5; border:0">
												CC:
											<br />&emsp;-	Bagian Keuangan
											<br />&emsp;-	Bagian Operasional
											</blockquote>
										</td>					
									</tr>
								</table>
							</div>
						</div>
					</div>';
        return $hasil;
  }
}

