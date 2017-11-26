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
          <h2>Data ABK</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>mstKapal/printOut_daftarABK/<?php echo $idParrent; ?>">Print Out</a>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahDataABKKapal">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstKapal" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Nama Lengkap</th>
                  <th class="column-title">Tempat Lahir</th>
                  <th class="column-title">Tgl. Lahir</th>
                  <th class="column-title">Alamat</th>
                  <th class="column-title">Email</th>
                  <th class="column-title">Agama</th>
                  <th class="column-title">Warga Negara </th>
                  <th class="column-title">Data Sertifikat </th>
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
                              <td><?php echo $dt->IdABK; ?></td>
                              <td><?php echo $dt->NamaLengkap; ?></td>
                              <td><?php echo $dt->TempatLahir; ?></td>
                              <td><?php echo $dt->TglLahir; ?></td>
                              <td><?php echo $dt->Alamat; ?></td>
                              <td><?php echo $dt->Email; ?></td>
                              <td><?php echo $dt->Agama; ?></td>
                              <td><?php echo $dt->WargaNegara; ?></td>
                              <td><a type="button" class="btn btn-warning btn-xs" onclick="viewSertifikatABK('<?php echo $dt->IdVessel ?>', '<?php echo $dt->IdABK ?>')"><i class="fa fa-eye"></i></td>
                              <td align="center">
                                <a type="button" class="btn btn-warning btn-xs" onclick="editDataABKKapal('<?php echo $dt->IdVessel ?>', '<?php echo $dt->IdABK ?>')"><i class="fa fa-pencil"></i></a>
                                <a type="button" class="btn btn-dark btn-xs"  onclick="deleteDataABKKapal('<?php echo $dt->IdVessel ?>','<?php echo $dt->IdABK ?>')"><i class="fa fa-trash"></i></a> 
                                <a type="button" class="btn btn-primary btn-xs" onclick="tambahDataSertifikatABK('<?php echo $dt->IdVessel ?>','<?php echo $dt->IdABK ?>')"><i class="fa fa-plus"></i> Tambah Sertifikat</a>
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
          <h4 class="modal-title" id="myModalLabel">Input Data ABK</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataABKKapal" style="display: none;">
                      <a class="close" onclick="$('#warningDataABKKapal').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Lengkap <span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="namaLengkap" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                          </div>
                        </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tempat Lahir <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="tempatLahir" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Lahir <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="date" id="tglLahir" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="alamat" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agama <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                 <select class="form-control" id="agama">
                                  <option value="Islam">Islam</option>
                                  <option value="Katolik">Katolik</option>
                                  <option value="Protestan">Protestan</option>
                                  <option value="Budha">Budha</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Lainnya">Lainnya</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="statusABK" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                              </div>
                            </div>  
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Warga Negara <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="wargaNegara" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                              </div>
                            </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="<?php echo $idParrent; ?>" id="idParrent">
          <button type="button" class="btn btn-primary" id="simpanDataABKKapal">Simpan</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg modalInputSertifikatABK" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Sertifikat ABK</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataSertifikatABK" style="display: none;">
                      <a class="close" onclick="$('#warningDataSertifikatABK').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sertifikat <span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="namaSertifikatABK" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                          </div>
                        </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Sertifikat <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="noSertifikatABK" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tempat Sertifikat <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="tempatSertifikat" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Terbit Sertifikat<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="date" id="tglTerbitSertifikatABK" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Habis Sertifikat <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="date" id="tglHabisSertifikatABK" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Document <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" id="sertifikatABK" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>

                            
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="<?php echo $idParrent; ?>" id="idParrent">
          <input type="hidden" id="idParrentABK">
          <button type="button" class="btn btn-primary" id="simpanDataSertifikatABK">Simpan</button>
        </div>

      </div>
    </div>
  </div>


<div class="modal fade bs-example-modal-lg modalViewSertifikatABK" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Daftar Sertifikat ABK</h4>
        </div>
        <div class="modal-body">
          <div class="">
              <br>
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action table-viewSertifikatABK" id="datatable">
                  <thead>
                    <tr class="headings">
                      <th class="column-title">Nama Sertifikat </th>
                      <th class="column-title">No Sertifikat</th>
                      <th class="column-title">Tempat Sertifiakt</th>
                      <th class="column-title">Tgl. Terbit Sertifikat</th>
                      <th class="column-title">Tgl. Habis Sertifikat</th>
                      <th class="column-title">Document</th>
                      </th>        
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>      
          </div>
        </div>
      </div>
    </div>
  </div>

  
