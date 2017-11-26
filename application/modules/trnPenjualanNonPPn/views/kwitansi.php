<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-12 invoice-header">
        <h2>
            <img src="<?php echo base_url("assets/images/headerKW.PNG"); ?>" width="27%" height="100"/>
            <small class="pull-right"><br/>KWITANSI</small>
        </h2>
      </div>
      <small class="pull-right" style="margin-bottom: 10px;font-size: 16px;">No. : <?php echo $NoKwitansi//$NoPO; ?></small>
      <div class="x_panel">
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                   <tr>
                        <td style="font-size: 15px;width: 25%;">Sudah Terima dari</td>
                        <td style="font-size: 15px;">:</td>
                        <td style="font-size: 20px;"><?php echo $pelanggan; ?></td>
                  </tr>   
                  <tr>
                        <td style="font-size: 15px;width: 25%;">Banyaknya Uang</td>
                        <td style="font-size: 15px;">:</td>
                        <td style="font-size: 20px;"><?php echo $terbilang; ?></td>
                  </tr>   
                  <tr>
                        <td style="font-size: 15px;width: 25%;">Untuk Pembayaran</td>
                        <td style="font-size: 15px;">:</td>
                        <td style="font-size: 20px;"><?php echo $untukPembayaran; ?></td>
                  </tr>   
              </tbody>
            </table>
          </div>
      </div>
              <div class="row">
          <div class="col-xs-6">
                  <table class="table ">
                  <tbody>
                       <tr>
                            <td colspan="3" style="font-size: 25px;">Rp. <?php echo number_format($total,0,".","."); ?></td>
                      </tr>
											  
                      <!--<tr>
                            <td style="width: 45%;">Tanggal Supply</td>
                            <td>:</td>
                            <td><?php //echo $tglSupply; ?></td>
                      </tr> 
                       <tr>
                            <td style="width: 45%;">Lokasi Supply</td>
                            <td>:</td>
                            <td><?php //echo $lokasiSupply; ?></td>
                      </tr> 
                       <tr>
                            <td style="width: 45%;">Harga MBA-HSD</td>
                            <td>:</td>
                            <td><?php //echo $hargaMBA; ?></td>
                      </tr>-->   
                  </tbody>
                </table>
              </div>
          <div class="col-xs-6">
            <div>
              <!-- <p class="lead" style="margin-left: 150px; font-size:15px;">Surabaya, <?php echo date("d F Y"); ?></p> -->
              <p class="lead" style="margin-left: 150px; font-size:15px;">Surabaya, <?php echo $TglAkhirSupply; ?></p>
			  <br/>
			  <br/>
			  <p class="lead" style="margin-left: 150px; font-size:15px;"><u>Erid Mutiar,SE, M. Ak</u><br/>&emsp;&emsp;&nbsp;&nbsp;&nbsp;Direktur</p>
            </div>
          </div>
        </div>
    </div>
	<BR />					  
	<BR />					  
	<BR />
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-12 invoice-header">
        <h2>
            INCOME
            <medium class="pull-right">KWITANSI</medium>
        </h2>
      </div>
      <small class="pull-right" style="margin-bottom: 10px;font-size: 16px;">No. : <?php echo $NoKwitansi; ?></small>
      <div class="x_panel">
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                   <tr>
                        <td style="font-size: 15px;width: 25%;">Sudah Terima dari</td>
                        <td style="font-size: 15px;">:</td>
                        <td style="font-size: 20px;"><?php echo $pelanggan; ?></td>
                  </tr>   
                  <tr>
                        <td style="font-size: 15px;width: 25%;">Banyaknya Uang</td>
                        <td style="font-size: 15px;">:</td>
                        <td style="font-size: 20px;"><?php echo $terbilang; ?></td>
                  </tr>   
                  <tr>
                        <td style="font-size: 15px;width: 25%;">Untuk Pembayaran</td>
                        <td style="font-size: 15px;">:</td>
                        <td style="font-size: 20px;"><?php echo $untukPembayaran; ?></td>
                  </tr>   
              </tbody>
            </table>
          </div>
      </div>
              <div class="row">
          <div class="col-xs-6">
                  <table class="table ">
                  <tbody>
                       <tr>
                            <td colspan="3" style="font-size: 25px;">Rp. <?php echo number_format($total,0,".","."); ?></td>
                      </tr>   
                      <tr>
                            <td style="width: 45%;">Tanggal Supply</td>
                            <td>:</td>
						<td><?php echo $tglSupply." s/d ".$TglAkhirSupply.$ketTambahan; ?></td>
                      </tr> 
                       <tr>
                            <td style="width: 45%;">Lokasi Supply</td>
                            <td>:</td>
                            <td><?php echo $lokasi; ?></td>
                      </tr> 
                       <tr>
                            <td style="width: 45%;">Harga MBA-HSD</td>
                            <td>:</td>
                            <td><?php echo $hargaMBA; ?></td>
                      </tr>   
                  </tbody>
                </table>
              </div>
          <div class="col-xs-6">
            <div>
              <!-- <p class="lead" style="margin-left: 150px; font-size:15px;">Surabaya, <?php //echo date("d F Y"); ?></p> -->
              <p class="lead" style="margin-left: 150px; font-size:15px;">Surabaya, <?php echo $TglAkhirSupply; ?></p>
            </div>
          </div>
        </div>
  </div>

  </div>
