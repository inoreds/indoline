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
          <h2>Data Kapal</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>mstKapal/printOut">Print Out</a>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahDataMstKapal">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstKapal" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Kapal</th>
                  <th class="column-title">Detail</th>
                  <th class="column-title">Foto</th>
                  <th class="column-title">History Maintenance</th>
                  <th class="column-title">Sertifikat </th>
                  <th class="column-title">ABK</th>
                  <th class="column-title">Inventaris Kapal</th>
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
                              <td><?php echo $dt->IdVessel; ?></td>
                              <td><?php echo $dt->VesselName; ?></td>
                              <td align="center"><a type="button" class="btn btn-primary btn-xs" href="<?php echo base_url().'mstKapal/printOut_detil?id='.$dt->IdVessel ?>">Detail Kapal</a>
                                </td>
                              <td align="center"><a type="button" class="btn btn-primary btn-xs" data-rel="prettyPhoto" href="<?php echo base_url(). $dt->GambarKapal ?>">Lihat Foto</a>
                                </td>
                              <td align="center"><a type="button" class="btn btn-primary btn-xs"  href="<?php echo base_url().'mstKapal?subItem=historyPerbaikan&id='.$dt->IdVessel ?>">Lihat History</a>
                                </td>
                              <td align="center"><a type="button" class="btn btn-primary btn-xs"  href="<?php echo base_url().'mstKapal?subItem=sertifikatKapal&id='.$dt->IdVessel ?>">Data Sertifikat</a>
                                </td>
                              <td align="center"><a type="button" class="btn btn-primary btn-xs"  href="<?php echo base_url().'mstKapal?subItem=daftarABK&id='.$dt->IdVessel ?>">Daftar ABK</a>
                                </td>
                              <td align="center"><a type="button" class="btn btn-primary btn-xs"  href="<?php echo base_url().'mstKapal?subItem=inventarisKapal&id='.$dt->IdVessel ?>">Lihat Inventaris</a>
                                </td>
                              <td align="center">
                                <a type="button" class="btn btn-warning btn-xs" onclick="editMstDataKapal('<?php echo $dt->IdVessel ?>')"><i class="fa fa-pencil"></i></a>
                                <a type="button" class="btn btn-dark btn-xs"  onclick="deleteMstKapal('<?php echo $dt->IdVessel ?>')"><i class="fa fa-trash"></i></a> 
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
      <div class="modal-content" style="width: 1340px;  margin-left: -200px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Data Kapal</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningMstKapal" style="display: none;">
                      <a class="close" onclick="$('#warningMstKapal').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vessel Name <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="vesselName" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Call Sign <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="callSign" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type Ship <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="typeShip" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flag <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="flag" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Build <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="build" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Build Year <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="buildYear" required="required" class="form-control col-md-7 col-xs-12"  maxlength="4">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Classification <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="classification" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gross Tonnage <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="grossTonnage" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Net Tonnage <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="netTonnage" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dead Weight <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="deadWeightGrossTonnage" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">LOA 1 <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="LOA1" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">LOA 2 <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="LOA2" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Length Between <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="lengthBetweenPerpediculart" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Breadth Moulded <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="breadthMoulded" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dept Moulded <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="deptMoulded" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Design Draft <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="designDraft" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Number Of Tank <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="numberOfTank" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cargo Tank Material <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="cargoTankMaterial" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cargo Tank Capacity <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="cargoTankCapacity" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fresh Water Capacity <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="number" id="freshWaterCapacity" required="required" class="form-control col-md-7 col-xs-12"  min=0>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Main Engine <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="mainEngine" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Auxilary Engine <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="auxilaryEngine" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesin Generator <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="mesinGenerator" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gambar Kapal <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" id="gambarKapal" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>

                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanMstKapal">Simpan</button>
        </div>

      </div>
    </div>
  </div>
