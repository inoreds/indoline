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
                  <th class="column-title">Hutang</th>
                  <th class="column-title">Action</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dtPembelian as $dtp)
                      {
                        ?>
                        <tr>
                              <td><?php echo "Pembelian BBM Pertamina (". $dtp->NamaBBM. ")"; ?></td>
                              <td><?php echo  $dtp->TglPengajuan; ?></td>
                              <td><?php echo "Rp. " .number_format($dtp->TotalHarga,0,".","."); ?> (<?php echo "Rp. " .number_format($dtp->Kurang,0,".","."); ?>)</td>
                              <td>
                                <?php if ($dtp->JumlahJurnal == 0) { ?>
                                  <a type="button" class="btn btn-default btn-xs" onclick="daftarKanHutang('<?php echo $dtp->IdBBM; ?>','<?php echo $dtp->TglPengajuan; ?>','<?php echo $dtp->POPembelian; ?>','<?php echo $dtp->Kurang; ?>', 'Pertamina')"><i class="fa fa-check"></i> Daftarkan Hutang</a>
                                <?php } else { ?> 
                                   <a type="button" class="btn btn-primary btn-xs" onclick="lunasiHutang('<?php echo $dtp->TglPengajuan; ?>','<?php echo $dtp->POPembelian; ?>', 'pelunasan_pertamina','<?php echo $dtp->Kurang; ?>', 'Pertamina')"><i class="fa fa-check"></i> Lunasi Hutang</a>
                                <?php } ?>
                              </td>
                        </tr>   
                        <?php   
                      }
                    ?>

                    <?php
                      foreach($dtPembelian_non as $dtp_n)
                      {
                        ?>
                        <tr>
                              <td><?php echo "Pembelian BBM Ke Supplier (". $dtp_n->NamaSupplier. ")"; ?></td>
                              <td><?php echo  $dtp_n->TglPengajuan; ?></td>
                              <td><?php echo "Rp. " .number_format($dtp_n->Total,0,".","."); ?> (<?php echo "Rp. " .number_format($dtp_n->Kurang,0,".","."); ?>)</td>
                              <td>
                                <?php if ($dtp_n->JumlahJurnal == 0) { ?>
                                  <a type="button" class="btn btn-default btn-xs" onclick="daftarKanHutang('<?php echo $dtp_n->IdBBM; ?>','<?php echo $dtp_n->TglPengajuan; ?>','<?php echo $dtp_n->POPembelian_non; ?>','<?php echo $dtp_n->Kurang; ?>','Non')"><i class="fa fa-check"></i> Daftarkan Hutang</a>
                                <?php } else { ?> 
                                   <a type="button" class="btn btn-primary btn-xs" onclick="lunasiHutang('<?php echo $dtp_n->TglPengajuan; ?>','<?php echo $dtp_n->POPembelian_non; ?>', 'pelunasan_non_pertamina','<?php echo $dtp_n->Kurang; ?>','Non')"><i class="fa fa-check"></i> Lunasi Hutang</a>
                                <?php } ?>
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
  <div class="modal fade bs-example-modal-lg modalInput-hutang" role="dialog" aria-hidden="true">
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
          <input type="hidden" id="penjual">
          <button type="button" class="btn btn-primary" id="simpanDataHutang">Simpan</button>
        </div>

      </div>
    </div>
  </div>
