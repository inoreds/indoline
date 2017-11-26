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
          <h2>Data Jenis BBM</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahDataJenisBBM">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstKapal" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID Jenis BBM </th>
                  <th class="column-title">Jenis BBM</th>
                  <th class="column-title">Jumlah PBBKB</th>
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
                              <td><?php echo $dt->IdDataJenisBBM; ?></td>
                              <td><?php echo $dt->JenisBBM; ?></td>
                              <td><?php echo $dt->JumlahPBBKB; ?></td>
                              <td>
                                <a type="button" class="btn btn-warning btn-xs" onclick="editDataJenisBBM('<?php echo $dt->IdDataJenisBBM ?>')"><i class="fa fa-pencil"></i></a>
                                <a type="button" class="btn btn-dark btn-xs"  onclick="deleteDataJenisBBM('<?php echo $dt->IdDataJenisBBM ?>')"><i class="fa fa-trash"></i></a> 
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
          <h4 class="modal-title" id="myModalLabel">Input Data Supplier</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataJenisBBM" style="display: none;">
                      <a class="close" onclick="$('#warningDataJenisBBM').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis BBM <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jenisBBM" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah PBBKB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="int" id="jumlahPBBKB" name="alamatSupplier" required="required" class="form-control col-md-7 col-xs-12 amount" min=0>
                        </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanDataJenisBBM">Simpan</button>
        </div>

      </div>
    </div>
  </div>
