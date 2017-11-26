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
          <h2>Akun / COA</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>mstSubAkun/printOut">Print Out</a>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahDataSubAkun">Tambah Data</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action tree-Order table-mstSubAkun" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Currency </th>
                  <th class="column-title">Kategori </th>
                  <th class="column-title">ID Sub Akun </th>
                  <th class="column-title">ID Sub Akun 2</th>
                  <th class="column-title">ID Sub Akun 3</th>
                  <th class="column-title">ID Sub Akun 4</th>
                  <th class="column-title">Nama Akun</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php foreach($dataTable_1 as $dt_1) { ?>
                        <tr class="treegrid-<?php echo $dt_1->ID_SUB_ACCOUNT; ?>">
                              <td></td>
                              <td><?php echo $dt_1->NAME_CURRENCY; ?></td>
                              <td><?php echo $dt_1->NAME_ACCOUNT_CATEGORY; ?></td>
                              <td><?php echo $dt_1->ID_SUB_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->ID_SUB2_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->ID_SUB3_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->ID_SUB4_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->NAME_SUB_ACCOUNT; ?></td>
                              <td>
                                <a type="button" class="btn btn-warning btn-xs" onclick="editDataSubAkun('<?php echo $dt_1->ID_ACT ?>', '<?php echo $dt_1->NUMBER_PARENT ?>')"><i class="fa fa-pencil"></i></a>
                                <a type="button" class="btn btn-dark btn-xs"  onclick="deleteDataSubAkun1('<?php echo $dt_1->ID_SUB_ACCOUNT ?>')"><i class="fa fa-trash"></i></a> 
                              </td>
                        </tr>  
                                  <?php foreach($dataTable_2 as $dt_2) { if ($dt_2->ID_SUB_ACCOUNT == $dt_1->ID_SUB_ACCOUNT) {?>
                                      <tr style="background-color: #eef3de"; class="treegrid-<?php echo $dt_2->ID_SUB2_ACCOUNT; ?> treegrid-parent-<?php echo $dt_2->ID_SUB_ACCOUNT; ?>">
                                            <td></td>
                                            <td><?php echo $dt_2->NAME_CURRENCY; ?></td>
                                            <td><?php echo $dt_2->NAME_ACCOUNT_CATEGORY; ?></td>
                                            <td><?php echo $dt_2->ID_SUB_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->ID_SUB2_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->ID_SUB3_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->ID_SUB4_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->NAME_SUB_ACCOUNT; ?></td>
                                            <td>
                                              <a type="button" class="btn btn-warning btn-xs" onclick="editDataSubAkun('<?php echo $dt_2->ID_ACT ?>', '<?php echo $dt_2->NUMBER_PARENT ?>')"><i class="fa fa-pencil"></i></a>
                                              <a type="button" class="btn btn-dark btn-xs"  onclick="deleteDataSubAkun2('<?php echo $dt_2->ID_SUB2_ACCOUNT ?>')"><i class="fa fa-trash"></i></a> 
                                            </td>
                                      </tr>   
                                            <?php foreach($dataTable_3 as $dt_3) { if ($dt_3->ID_SUB2_ACCOUNT == $dt_2->ID_SUB2_ACCOUNT) {?>
                                              <tr style="background-color: #f2ffc7"; class="treegrid-<?php echo $dt_3->ID_SUB3_ACCOUNT; ?> treegrid-parent-<?php echo $dt_3->ID_SUB2_ACCOUNT; ?>">
                                                    <td></td>
                                                    <td><?php echo $dt_3->NAME_CURRENCY; ?></td>
                                                    <td><?php echo $dt_3->NAME_ACCOUNT_CATEGORY; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB2_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB3_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB4_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->NAME_SUB_ACCOUNT; ?></td>
                                                     <td>
                                                      <a type="button" class="btn btn-warning btn-xs" onclick="editDataSubAkun('<?php echo $dt_3->ID_ACT ?>', <?php echo $dt_3->NUMBER_PARENT ?>)"><i class="fa fa-pencil"></i></a>
                                                      <a type="button" class="btn btn-dark btn-xs"  onclick="deleteDataSubAkun3('<?php echo $dt_3->ID_SUB3_ACCOUNT ?>')"><i class="fa fa-trash"></i></a> 
                                                    </td>
                                              </tr>   
                                                    <?php foreach($dataTable_4 as $dt_4) { if ($dt_4->ID_SUB3_ACCOUNT == $dt_3->ID_SUB3_ACCOUNT) {?>
                                                      <tr style="background-color: #dee2dc"; class="treegrid-<?php echo $dt_4->ID_SUB4_ACCOUNT; ?> treegrid-parent-<?php echo $dt_4->ID_SUB3_ACCOUNT; ?>">
                                                            <td></td>
                                                            <td><?php echo $dt_4->NAME_CURRENCY; ?></td>
                                                            <td><?php echo $dt_4->NAME_ACCOUNT_CATEGORY; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB2_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB3_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB4_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->NAME_SUB_ACCOUNT; ?></td>
                                                             <td>
                                                              <a type="button" class="btn btn-warning btn-xs" onclick="editDataSubAkun('<?php echo $dt_4->ID_ACT ?>', <?php echo $dt_4->NUMBER_PARENT ?>)"><i class="fa fa-pencil"></i></a>
                                                              <a type="button" class="btn btn-dark btn-xs"  onclick="deleteDataSubAkun4('<?php echo $dt_4->ID_SUB4_ACCOUNT ?>')"><i class="fa fa-trash"></i></a> 
                                                            </td>
                                                      </tr>   
                                                   <?php } } ?>
                                           <?php } } ?> 
                                   <?php } } ?> 
                        <?php  }?> 
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
          <h4 class="modal-title" id="myModalLabel">Input Data Akun / COA</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataSubAkun" style="display: none;">
                      <a class="close" onclick="$('#warningDataSubAkun').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Currency<span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                           <select class="form-control" id="id_curr">
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori<span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                           <select class="form-control" id="id_account_category">
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Sub Akun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="id_sub_account" required="required" class="form-control col-md-7 col-xs-12"  maxlength="30">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Sub Akun 2<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="id_sub2_account" required="required" class="form-control col-md-7 col-xs-12"  maxlength="30">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Sub Akun 3<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="id_sub3_account" required="required" class="form-control col-md-7 col-xs-12"  maxlength="30">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Sub Akun 4<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="id_sub4_account" required="required" class="form-control col-md-7 col-xs-12"  maxlength="30">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Akun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name_sub_account" required="required" class="form-control col-md-7 col-xs-12"  maxlength="100">
                        </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanDataSubAkun">Simpan</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg modalInput-editSubAkun" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit Data Akun / COA</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningDataSubAkun" style="display: none;">
                      <a class="close" onclick="$('#warningDataSubAkun').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="statusUpdate" name="statusUpdate" class="form-control col-md-7 col-xs-12" type="hidden">
                      <div class="form-group">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Sub Akun<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name_sub_accountEdit" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                        </div>
                      </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="updateDataSubAkun">Simpan</button>
        </div>

      </div>
    </div>
  </div>