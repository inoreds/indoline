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
          <h2>Jurnal</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>jurnal/printOut">Print Out</a>
            
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" >
              <thead>
                <tr class="headings">
                  <th class="column-title">Deskripsi </th>
                  <th class="column-title">Tanggal </th>
                  <th class="column-title">Piutang</th>
                  <th class="column-title">Action</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($datatable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo "Penjualan BBM Ke (". $dt->NamaCustomer. ")"; ?></td>
                              <td><?php echo  $dt->TglPO; ?></td>
                              <td><?php echo "Rp. " .number_format($dt->SubTotal,0,".","."); ?> (<?php echo "Rp. " .number_format($dt->Kurang,0,".","."); ?>)</td>
                              <td>
                                <?php if ($dt->JumlahJurnal == 0) { ?>
                                  <a type="button" class="btn btn-default btn-xs" onclick="daftarKanPiutang('<?php echo $dt->IdBBM; ?>','<?php echo $dt->TglPO; ?>','<?php echo $dt->NoPoCustomer; ?><?php echo $dt->DetilNumber; ?>','<?php echo $dt->Kurang; ?>','<?php echo $dt->Quantity; ?>')"><i class="fa fa-check"></i> Daftarkan Piutang</a>
                                <?php } else { ?> 
                                   <a type="button" class="btn btn-primary btn-xs" onclick="lunasiPiutang('<?php echo $dt->TglPO; ?>','<?php echo $dt->NoPoCustomer; ?><?php echo $dt->DetilNumber; ?>', 'pelunasan','<?php echo $dt->Kurang; ?>')"><i class="fa fa-check"></i> Pelunasan Piutang</a>
                                <?php } ?>
                                 <a type="button" class="btn btn-warning btn-xs" onclick="cetakKwitansi('<?php echo $dt->NoPoCustomer; ?>')"><i class="fa fa-print"></i> Cetak Kwitansi</a>
                              </td>
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
  <div class="modal fade bs-example-modal-lg modalInput-piutang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Hutang</h4>
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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Transaksi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="idTransaksi" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Note<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noteJurnal" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255" readonly>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pembayaran Melalui<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control id_account_bank select2_single" id="akunBank" style="width:100%"></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jumlahPembayaran" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  maxlength="255">
                        </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="kurang">
          <!--<input type="hidden" id="penjual">-->
          <button type="button" class="btn btn-primary" id="simpanDataPiutang">Simpan</button>
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade bs-example-modal-lg modalInput-daftarPiutang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input HPP</h4>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Liter<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="liter" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  maxlength="255" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">HPP / Liter<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hppLiter" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  maxlength="255">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="totalHPP" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  maxlength="255" readonly>
                        </div>
                      </div>

                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="idBBM">
          <input type="hidden" id="tgl">
          <input type="hidden" id="id">
          <input type="hidden" id="kurangDaftar">
          <!--<input type="hidden" id="penjual">-->
          <button type="button" class="btn btn-primary" id="daftarKanPiutang">Simpan</button>
        </div>

      </div>
    </div>
  </div>
  <!--
  <div class="modal fade bs-example-modal-lg modalInput-piutang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Hutang</h4>
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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Transaksi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="idTransaksi" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Note<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noteJurnal" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255" readonly>
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
                              <td><select class="form-control id_account select2_single" name="subAkunJurnal[]" style="width:100%"></select></td>
                              <td><input type="text" id="debit" name="debitJurnal[]" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  min=0></td>
                              <td><input type="text" id="kredit" name="kreditJurnal[]" required="required" class="form-control col-md-3 col-xs-12 amount numeric"></td>
                              <td></td>
                          </tr> 
                          <tr>
                              <td><select class="form-control id_account select2_single" name="subAkunJurnal[]" style="width:100%"></select></td>
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
          <input type="hidden" id="kurang" required="required" class="form-control col-md-7 col-xs-12">
          <button type="button" class="btn btn-primary" id="simpanDataPiutang">Simpan</button>
        </div>

      </div>
    </div>
  </div>
-->