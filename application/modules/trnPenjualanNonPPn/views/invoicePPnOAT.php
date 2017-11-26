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
		content: '\002665';
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
	  content: '\002702'; 
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
	  content: ""; 
	  height: 30px; 
	  margin-top: -31px; 
	  border-style: solid; 
	  border-color: #8c8b8b; 
	  border-width: 0 0 1px 0; 
	  border-radius: 20px; 
	}

</style>
<?php
$Data 		= mysql_query("Select * From BarangBBM bb, Penjualanbbm_Detil pd where pd.IdBBM = bb.IdBBM AND bb.IdBBM= '$IdBBM'");
$getData 	= mysql_fetch_array($Data); 
?>
<table border="0" >
	<thead>
		<tr class="headings">
			<th class="column-title" style="width: 70%;" colspan="3"><img src="<?php echo base_url("assets/images/header.PNG"); ?>" width="90%" height="100%"/></th>
			<th class="column-title" style="width: 30%; text-align:Center">
				<small class="pull-right">Invoice<br />
			<?php echo $NoPO;?></small></th>
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
				<div class="">
					<h2>Pelanggan</h2>
					<div class="clearfix"></div>
				</div>
			</td>
			<td colspan="1">&nbsp;</td>
			<td>
				<div class="">
					<p>Tanggal Supply : <?php echo $tglSupply." s/d ".$TglAkhirSupply;?></h2>
				<br />
					<p>Tanggal Invoice : <?php echo $TglAkhirSupply;?></h2>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<div class="">
					<p>Nama : <?php echo $namaPelanggan; ?></h2>
				</div>
			</td>
			
		</tr>
		<tr>
			<td colspan="3">
				<div class="">
					<p>Alamat : <?php echo $alamat; ?></h2>
				</div>
			</td>
			
		</tr>
		</tbody>
	</table>
	<div class="x_content">
		<div class="table-responsive">
			<table border="1" cellspacing="1">
				<thead>
					<tr class="headings">
						<th class="column-title" style="width: 2%;" align="center">No. </th>
						<th class="column-title" style="width: 70%;" colspan="2" align="center">Uraian</th>
						<th class="column-title" style="width: 30%;" align="center">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 0; $total=0; ?>
					<?php foreach($dataTable as $dt) { $count++; $total = $total + $dt->SubTotal ?>
					<tr>
                          <td width="2%" align="center"><?php echo $count; ?></td>
                          <td colspan="2">&nbsp;&nbsp;Pengiriman BBM <?php echo $dt->NamaBBM; ?> , <?PHP echo $NamaKapal; ?> </td>
                          <td>&nbsp;&nbsp;Rp. <?php echo number_format((($dt->Harga/$getData['PBBKB'])*($dt->Quantity)),2,".","."); ?></td>
                    </tr>   
                    <tr>
                          <td></td>
                          <td style=" border-right: solid 1px #FFF;">&nbsp;&nbsp;Tanggal</td>
                          <td>: <?php echo $TglAkhirSupply; ?></td>
                          <td></td>
                    <tr>
					</tr>   
                          <td></td>
                          <td style=" border-right: solid 1px #FFF;">&nbsp;&nbsp;Vol Bunker</td>
                          <td>: <?php echo number_format($dt->Quantity,2,".","."); ?> LITER</td>
                          <td></td>
                    </tr> 
                    <tr>
                          <td></td>
                          <td style=" border-right: solid 1px #FFF;">&nbsp;&nbsp;Harga</td>
                          <td>: &nbsp;&nbsp;Rp. <?php echo number_format(($dt->Harga/$getData['PBBKB']),2,".","."); ?> / LITER</td>
                          <td></td>
                    </tr>
					
					<?php } ?>
                    <tr>
						<tr>
                        <td></td>
                        <td style=" border-right: solid 1px #FFF;"></td>
                        <td align="center">PPN 10% &nbsp;&nbsp;&nbsp;</td>                       
                          <td>&nbsp;&nbsp;Rp. <?php echo number_format(((($dt->Harga/$getData['PBBKB'])*($dt->Quantity))*0.1),2,".","."); ?></td>
                    </tr>
					<tr>
                        <td></td>
                        <td style=" border-right: solid 1px #FFF;"></td>
                        <td align="center">PBBKB &nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;Rp. <?php echo number_format(((($dt->Harga/$getData['PBBKB'])*($dt->Quantity))*0.05),2,".","."); ?></td>
                    </tr>
                        <td></td>
                        <td style=" border-right: solid 1px #FFF;"></td>
                        <td align="center">Total &nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;Rp. <?php echo number_format($total,2,".","."); ?></td>
                    </tr>
				</tbody>
			</table>
			
			<br/>
            
			<table>
				<?php 
					$angka = isset($total) ? $total : "0";

					function Terbilang($x) 
					{ 
					  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"); 
					  if ($x < 12) 
						return " " . $abil[$x]; 
					  elseif ($x < 20) 
						return Terbilang($x - 10) . " belas"; 
					  elseif ($x < 100) 
						return Terbilang($x / 10) . " puluh" . Terbilang($x % 10); 
					  elseif ($x < 200) 
						return " seratus" . Terbilang($x - 100); 
					  elseif ($x < 1000) 
						return Terbilang($x / 100) . " ratus" . Terbilang($x % 100); 
					  elseif ($x < 2000) 
						return " seribu" . Terbilang($x - 1000); 
					  elseif ($x < 1000000) 
						return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000); 
					  elseif ($x < 1000000000)
						return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
					} 

				?> 
				
            </table>
			<br/>
            <table>
				<tr>
					<td colspan="5">
						Terbilang
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td colspan="5">
						<strong><i><?php  echo "# ".ucwords(''.Terbilang($angka).'')." Rupiah #" ;?></i></strong>
					</td>
				</tr>
            </table>				
            <table>				
				<tr>
					<td>Rekening
						<blockquote style="border:0 ">
							<font style="font-family:Times New Roman">
								Bank Nasional Indonesia (BNI)<br/>
								A/n PT Indoline Incometika<br/>
								A/n No. 044.112.278.8
							</font>
						</blockquote>
					</td>
				</tr>
            </table>
			<br/>
			<table border="0" cellspacing="1">
				<thead align="center">
					<th colspan="1">&nbsp;</th>
					<th width="50%">&nbsp;</th>
					<th style="text-align:center"width="50%" align="center">Hormat Kami</th>
				</thead>
				<tbody>				
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="center">&nbsp;</td>
						<td align="center"><u>Erid Mutiar. SE,. M. Ak</u></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td align="center">Direktur</td>
					</tr>
				<tbody>
			</table>
			<hr class="style1">
			<table border="1" cellspacing="1" width="100%">
				<tr>
					<td width="65%">
						Catatan:<br/>
						* <i><font size="2">Pembayaran dengan CQ/BG baru dianggap lunas setelah pencairan </font> </i>
						<br/>
						* <i>Bukti bayar dapat dikirim melalui fax (031 - 3538913) </i>
					</td>
					<td width="35%">
						<table border="1" cellspacing="1" width="100%" height="100%">
							<thead>
								<td style="text-align:center">Mumun</td>
								<td style="text-align:center">Rochmat</td>
							</thead>
							<tbody>
								<tr height="100%">
									<td rowspan="3">&nbsp;<br/><br/></td>
									<td rowspan="3">&nbsp;<br/><br/></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>