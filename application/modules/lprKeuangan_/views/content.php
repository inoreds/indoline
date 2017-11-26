<div class="row">
  <div class="col-md-12">
   <div class="x_panel" style="height: 1150px;">
      <div class="x_title">
        <h2><i class="fa fa-bars"></i> Laporan Keuangan <small>Float left</small></h2>
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
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                 <p class="lead">Bukti Bank Masuk</p>
                   <p>Laporan Bukti Bank Masuk</p>
                 <button type="button" class="btn btn-default" onclick="laporaBuktiBank('masuk')">Lihat Laporan</button>
          </div>  
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                 <p class="lead">Bukti Bank Keluar</p>
                   <p>Laporan Bukti Kas Keluar</p>
                 <button type="button" class="btn btn-default" onclick="laporaBuktiBankKeluar('keluar')">Lihat Laporan</button>
          </div>  
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                 <p class="lead">Bukti Kas Masuk</p>
                   <p>Laporan Bukti Bank Masuk</p>
                 <button type="button" class="btn btn-default" onclick="laporaBuktiKas('Jurnal')">Lihat Laporan</button>
          </div>  
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
                 <p class="lead">Bukti Kas Keluar</p>
                   <p>Laporan Bukti Kas Keluar</p>
                 <button type="button" class="btn btn-default" onclick="laporaBuktiKas('Jurnal')">Lihat Laporan</button>
          </div>  
      </div>
    </div>
  </div>
</div>

  <div class="modal fade bs-example-modal-lg modal-bukti_bank" role="dialog" aria-hidden="true">
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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sumber<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="sumberBank" style="width:100%">
                              <option value='customer' selected=>Perusahaan Customer</option>
                              <option value='lainnya'>Lainnya</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control id_account select2_single" id="idCustomer" style="width:100%">
                          </select> 
                        </div>
                     </div>
<!--                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="periodeTanggal" required="required" class="form-control col-md-7 col-xs-12 date">
                        </div>
                      </div>
 -->
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeTahun" style="width:100%">
                          </select>
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bulan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeBulan" style="width:100%">
                           <option value=1>Januari</option>
                              <option value=2>Februari</option>
                              <option value=3>Maret</option>
                              <option value=4>April</option>
                              <option value=5>Mei</option>
                              <option value=6>Juni</option>
                              <option value=7>Juli</option>
                              <option value=8>Agustus</option>
                              <option value=9>September</option>
                              <option value=10>Oktober</option>
                              <option value=11>November</option>
                              <option value=12>Desember</option>
                          </select>
                        </div>
                     </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="jenisBuktiBank">
          <button type="button" class="btn btn-primary" id="btnLaporan-bbm">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg modal-bukti_bank_keluar" role="dialog" aria-hidden="true">
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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sumber<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="bayarBank" style="width:100%">
                              <option value='customer' selected=>Perusahaan Supplier</option>
                              <option value='lainnya'>Lainnya</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Supplier<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control id_account select2_single" id="idSupplier" style="width:100%">
                          </select> 
                        </div>
                     </div>
<!--                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="periodeTanggal" required="required" class="form-control col-md-7 col-xs-12 date">
                        </div>
                      </div>
 -->
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeTahunKeluar" style="width:100%">
                          </select>
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bulan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeBulanKeluar" style="width:100%">
                           <option value=1>Januari</option>
                              <option value=2>Februari</option>
                              <option value=3>Maret</option>
                              <option value=4>April</option>
                              <option value=5>Mei</option>
                              <option value=6>Juni</option>
                              <option value=7>Juli</option>
                              <option value=8>Agustus</option>
                              <option value=9>September</option>
                              <option value=10>Oktober</option>
                              <option value=11>November</option>
                              <option value=12>Desember</option>
                          </select>
                        </div>
                     </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="jenisBuktiBank">
          <button type="button" class="btn btn-primary" id="btnLaporan-bbm_keluar">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>