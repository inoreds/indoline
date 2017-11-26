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
          <h2>Data History Kapal</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>mstKapal/printOut_historyPerbaikan/<?php echo $idParrent; ?>">Print Out</a>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" id="tambahJenisPerbaikan">Tambah Jenis Perbaikan</button>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahHistoryPerbaikan">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstKapal" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Tanggal Perbaikan</th>
                  <th class="column-title">Nama Teknisi</th>
                  <th class="column-title">Jenis Perbaikan</th>
                  <th class="column-title">Sparepart</th>
                  <th class="column-title">Jumlah</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdHistoryPerbaikan; ?></td>
                              <td><?php echo $dt->TanggalPerbaikan; ?></td>
                              <td><?php echo $dt->NamaTeknisi; ?></td>
                              <td><?php echo $dt->NamaJenisPerbaikan; ?></td>
                              <td><?php echo $dt->NamaBarangInternal; ?></td>
                              <td><?php echo $dt->Jumlah; ?></td>
                              <td align="center">
                               <!-- <a type="button" class="btn btn-warning btn-xs" onclick="editHistoryPerbaikan('<?php echo $dt->IdVessel ?>', '<?php echo $dt->IdHistoryPerbaikan ?>')"><i class="fa fa-pencil"></i></a> -->
                                <a type="button" class="btn btn-dark btn-xs"  onclick="deleteHistoryPerbaikan('<?php echo $dt->IdVessel ?>','<?php echo $dt->IdHistoryPerbaikan ?>')"><i class="fa fa-trash"></i></a>
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
  <div class="modal fade bs-example-modal-lg modalInput" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input History Perbaikan</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningSertfikatKapal" style="display: none;">
                      <a class="close" onclick="$('#warningSertfikatKapal').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Teknisi <span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="namaTeknisi" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Perbaikan <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                               <select class="form-control" id="idJenisPerbaikan">
                                </select>
                            </div>
                          </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl Perbaikan <span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="date" id="tanggalPerbaikan" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sparepart <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                               <select class="form-control" id="idBarangInternal">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah <span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" id="jumlah" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                          </div>
                        </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="<?php echo $idParrent; ?>" id="idParrent">
          <button type="button" class="btn btn-primary" id="simpanHistoryPerbaikan">Simpan</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg modalInputJenisPerbaikan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Jenis Perbaikan</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningSertfikatKapal" style="display: none;">
                      <a class="close" onclick="$('#warningJenisPerbaikan').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="statusPerbaikan" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Jenis Perbaikan <span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="namaJenisPerbaikan" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                          </div>
                        </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="<?php echo $idParrent; ?>" id="idParrent">
          <button type="button" class="btn btn-primary" id="simpanJenisPerbaikan">Simpan</button>
        </div>

      </div>
    </div>
  </div>
