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
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahDataJurnal">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" >
              <thead>
                <tr class="headings">
                  <th class="column-title">Nama Akun </th>
                  <th class="column-title">Debit</th>
                  <th class="column-title">Kredit</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->NAME_SUB_ACCOUNT; ?></td>
                              <td><?php echo "Rp. " .number_format($dt->DEBIT,0,".","."); ?></td>
                              <td><?php echo "Rp. " .number_format($dt->CREDIT,0,".","."); ?></td>
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
  <div class="modal fade bs-example-modal-lg modalInput" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Jurnal</h4>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Note<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noteJurnal" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255">
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
          <button type="button" class="btn btn-primary" id="simpanDataJurnal">Simpan</button>
        </div>

      </div>
    </div>
  </div>
