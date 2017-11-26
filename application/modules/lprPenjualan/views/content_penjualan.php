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
            <li role="presentation" class="active"><a href="#tab_penjualan" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Penjualan</a>
            </li>
            </ul>
          <div id="myTabContent" class="tab-content"> 
            <div role="tabpanel" class="tab-pane fade active in" id="tab_penjualan" aria-labelledby="home-tab">
                <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Penjualan</p>
                       <p>Menunjukkan setiap transaksi penjualan BBM untuk secara keseluruhan, informasinya adalah termasuk tanggal, jumlah dan total</p>
                      <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>lprUmum/pdf_penjualanBBM">Lihat Laporan</a>
              </div>  
                <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Penjualan Per Customer</p>
                      <p>Menunjukkan setiap transaksi penjualan BBM untuk per customer, informasinya adalah termasuk tanggal, jumlah dan total</p>
                     <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal-customer">Lihat Laporan</button>
                </div>
               <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Penjualan Per BBM</p>
                      <p>Menunjukkan setiap transaksi persewaan OAT untuk per jenis BBM, termasuk tanggal, jumlah dan total</p>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal-barang">Lihat Laporan</button>
                </div>
                <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Penjualan Per Periode</p>
                      <p>Menunjukkan setiap transaksi penjualan BBM per periode, termasuk tanggal, jumlah dan total</p>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target=".modal-periode">Lihat Laporan</button>
                </div>
               <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                     <p class="lead">Persewaan OAT</p>
                      <p>Menunjukkan setiap transaksi persewaan OAT untuk setiap pelanggan, termasuk tanggal, jumlah dan total</p>
                      <button type="button" class="btn btn-default">Lihat Laporan</button>
                </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

  </div>
  <div class="modal fade bs-example-modal-lg modal-customer" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pilih Customer</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataMstSatuan" style="display: none;">
                      <a class="close" onclick="$('#warningDataMstSatuan').hide()">×</a>  
                      </button>
                    </div>
                       <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Customer <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control singl select2_single" id="idCustomer" style="width:100%">
                              </select>
                          </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnLaporan-penjualanCustomer">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>

    </div>
  <div class="modal fade bs-example-modal-lg modal-barang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pilih Barang</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataMstSatuan" style="display: none;">
                      <a class="close" onclick="$('#warningDataMstSatuan').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                       <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Barang <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control singl select2_single" id="idBBM" style="width:100%">
                              </select>
                          </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnLaporan-penjualanBBM">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>

    <div class="modal fade bs-example-modal-lg modal-periode" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pilih Periode</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataMstSatuan" style="display: none;">
                      <a class="close" onclick="$('#warningDataMstSatuan').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Awal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglAwalLaporan" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Akhir<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglAkhirLaporan" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                        </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnLaporan-penjualanPeriode">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>