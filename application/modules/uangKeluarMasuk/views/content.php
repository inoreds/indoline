  <div class="page-title">
    <div class="title_left">
      <h3>
            INDOLINE
            <small>
                App Software
            </small>
        </h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Masuk Masuk & Keluar</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>jurnal/printOut">Print Out</a>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahUangKeluarMasuk">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
         <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" >
              <thead>
                <tr class="headings">
                  <th class="column-title">Tanggal Transaksi </th>
                  <th class="column-title">Jumlah</th>
                  <th class="column-title">Uraian</th>
                  <th class="column-title">Tipe Kas</th>
                  <th class="column-title">Action</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->TglTransaksi; ?></td>
                              <td><?php echo "Rp. " .number_format($dt->Jumlah,0,".","."); ?></td>
                              <td><?php echo $dt->Uraian; ?></td>
                              <td><?php echo $dt->TipeKas; ?></td>
                              <td><a type="button" class="btn btn-warning btn-xs" href='uangKeluarMasuk/pdf_jkm/<?php echo $dt->IdKas; ?>'"><i class="fa fa-print"></i> Cetak</a></td>
                        </tr>   
                        <?php   
                      }
                    ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bs-example-modal-lg modalInput-uangKeluarMasuk" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Uang Masuk & Keluar</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" id="formJurnal">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataJurnal" style="display: none;">
                      <a class="close" onclick="$('#warningDataJurnal').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Transaksi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglTransaksi" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Kas<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control select2_single" id="tipeKas" style="width:100%">
                            <option value="Kas Masuk">Kas Masuk</option>
                            <option value="Kas Keluar">Kas Keluar</option>
                          </select>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kas/Bank<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control select2_single id_account_bank_kas" id="namaKasBank" style="width:100%">
                          </select>
                        </div>
                      </div> 
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Untuk/Dari<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="untukDari" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Akun Keperluan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control select2_single id_account" id="keteranganKas" style="width:100%">
                          </select>
                        </div>
                      </div> 
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jumlah" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Uraian<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="uraian" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Pemnbayaran<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control select2_single" id="jenisPembayaran" style="width:100%">
                            <option value="Tunai">Tunai</option>
                            <option value="RTGS">RTGS</option>
                            <option value="Cek">Cek</option>
                            <option value="BG">BG</option>
                          </select>
                        </div>  
                        </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Cek / BG<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noCekBG" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl Jatuh Tempo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglJatuhTempo" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dikonfirmasi Oleh<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="konfirmasi" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dikontrol Oleh<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="kontrol" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dicatat Oleh<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="catat" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                      
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanDataUangKeluarMasuk">Simpan</button>
        </div>

      </div>
    </div>
  </div>
  <!--
  <div class="modal fade bs-example-modal-lg modalInput-uangKeluarMasuk" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Uang Masuk & Keluar</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" id="formJurnal">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataJurnal" style="display: none;">
                      <a class="close" onclick="$('#warningDataJurnal').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Transaksi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglTransaksiJurnal" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="table-responsive">
                      <div class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="tambahRowAkun" style="margin-left: 45px;"><i class="fa fa-plus"></i></button>
                      </div>
                      <table class="table table-striped table-bordered dataTable no-footer" id="table-postingJurnalAkun">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Akun </th>
                            <th class="column-title">Debit</th>
                            <th class="column-title">Kredit</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>        
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                              <td><select class="form-control select2_single id_account" name="subAkunJurnal[]" style="width:100%"></select></td>
                              <td><input type="text" id="debit" name="debitJurnal[]" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  min=0></td>
                              <td><input type="text" id="kredit" name="kreditJurnal[]" required="required" class="form-control col-md-3 col-xs-12 amount numeric"></td>
                              <td></td>
                          </tr> 
                          <tr>
                              <td><select class="form-control select2_single id_account" name="subAkunJurnal[]" style="width:100%"></select></td>
                              <td><input type="text" id="debit" name="debitJurnal[]" required="required" class="form-control col-md-3 col-xs-12 amount numeric"></td>
                              <td><input type="text" id="kredit" name="kreditJurnal[]" required="required" class="form-control col-md-3 col-xs-12 amount numeric"></td>
                              <td></td>
                          </tr>   
                        </tbody>
                      </table>
                    </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanDataUangKeluarMasuk">Simpan</button>
        </div>

      </div>
    </div>
  </div>
  -->