<div class="row">
  <div class="col-md-12">
   <div class="x_panel" style="height: 1150px;">
      <div class="x_title">
        <h2><i class="fa fa-bars"></i> Laporan Akuntansi <small>Float left</small></h2>
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
               <p class="lead">Jurnal</p>
                 <p>Daftar semua jurnal per transaksi yang terjadi dalam periode waktu. Hal ini berguna untuk melacak di mana transaksi Anda masuk ke masing-masing rekening</p>
               <button type="button" class="btn btn-default" onclick="laporanPeriode('Jurnal')">Lihat Laporan</button>
        </div>  
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
               <p class="lead">Buku Besar</p>
                <p>Laporan ini menampilkan semua transaksi yang telah dilakukan untuk suatu periode. Laporan ini bermanfaat jika Anda memerlukandaftar kronologis untuk semua transaksi yang telah dilakukan oleh perusahaan Anda.</p>
                 <button type="button" class="btn btn-default" onclick="laporanPeriodeBukuBesar('Buku Besar')">Lihat Laporan</button>
          </div>
         <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
               <p class="lead">Neraca Saldo</p>
                <p>Merupakan kumpulan dari saldo-saldo yang ada pada setiap perkiraan di buku besar</p>
                <button type="button" class="btn btn-default" onclick="laporanPeriode('Neraca Saldo')">Lihat Laporan</button>
          </div>
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
               <p class="lead">Neraca</p>
                <p>Menampilan apa yang anda miliki (aset), apa yang anda hutang (liabilitas), dan apa yang anda sudah investasikan pada perusahaan anda (ekuitas).</p>
                <button type="button" class="btn btn-default" onclick="laporanPeriode('Neraca')">Lihat Laporan</button>
          </div>
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
               <p class="lead">Laba Rugi</p>
                <p>Menampilkan setiap tipe transaksi dan jumlah total untuk pendapatan dan pengeluaran anda.</p>
                <button type="button" class="btn btn-default" onclick="laporanPeriode('Laba Rugi')">Lihat Laporan</button>
          </div>
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
               <p class="lead">Perubahan Modal</p>
                <p>Menampilkan laporan perubahan modal pada bulan dan tahun tersebut.</p>
                <button type="button" class="btn btn-default" onclick="laporanPeriode('Perubahan Modal')">Lihat Laporan</button>
          </div>
          <div class="row" style="margin-bottom: 30px;margin-left: 0px;">
               <p class="lead">Arus Kas</p>
                <p>Menampilkan laporan arus kas pada bulan dan tahun tersebut.</p>
                <button type="button" class="btn btn-default" onclick="laporanPeriode('Arus Kas')">Lihat Laporan</button>
          </div>
      </div>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Tahun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeTahun" style="width:100%">
                          </select>
                        </div>
                     </div>
                     <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Bulan<span class="required">*</span>
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
          <input type="hidden" id="jenisLaporan">
          <button type="button" class="btn btn-primary" id="btnLaporan-keuangan">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg modal-periodeBukuBesar" role="dialog" aria-hidden="true">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Tahun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeTahunBukuBesar" style="width:100%">
                          </select>
                        </div>
                     </div>
                     <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Bulan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="periodeBulanBukuBesar" style="width:100%">
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
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Akun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control id_account select2_single" id="periodeAkun" style="width:100%">
                          </select> 
                        </div>
                     </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="jenisLaporan">
          <button type="button" class="btn btn-primary" id="btnLaporan-keuanganBukuBesar">Lihat Laporan</button>
        </div>

      </div>
    </div>
  </div>