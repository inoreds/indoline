<div class="row">
  <div class="col-md-12">
   <div class="x_panel" style="height: 850px;">
      <div class="x_title">
        <h2><i class="fa fa-bars"></i> Laporan Umum <small>Float left</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_pembelian" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pembelian</a>
            </li>
            </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_pembelian" aria-labelledby="profile-tab">
              <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Permbelian Pertamina</p>
                      <p>Menunjukkan setiap transaksi pembelian BBM dari Pertamina informasi yang ditampilkan berupa tanggal pembelian, jenis bbm yang dibeli, jumlah dan total pembelian</p>
                      <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>lprUmum/pdf_pembelianPertamina">Lihat Laporan</a>
              </div>
              <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Pembelian Non pertamina</p>
                      <p>Menunjukkan setiap transaksi pembelian BBM dari Non Pertamina, informasi yang ditampilkan berupa tanggal pembelian, jenis bbm yang dibeli, jumlah dan total pembelian</p>
                      <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>lprUmum/pdf_pembelianNonPertamina">Lihat Laporan</a>
              </div>   
              <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Pembelian Barang</p>
                      <p>Menunjukkan setiap transaksi pembelian barang, informasi yang ditampilkan berupa tanggal pembelian, nama barang, dan total pembelian</p>
                      <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>lprUmum/pdf_pembelianBarang">Lihat Laporan</a>
              </div>   
            </div>  
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
 