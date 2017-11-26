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
          <h2>List Kartu Piutang</h2>
          <div class="nav navbar-right panel_toolbox">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">Nama Customer</th>
                  <th class="column-title">Kartu Piutang</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->NamaCustomer; ?></td>
                              <td>
                                <a type="button" class="btn btn-info btn-xs"  onclick="kartuPiutang('<?php echo $dt->IdCustomer ?>')"><i class="fa fa-credit-card"></i> Kartu Piutang</a> 
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
  <div class="modal fade bs-example-modal-lg modalKartuPiutang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Kartu Piutang</h4>
        </div>
        <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" id="table-kartuPiutang">
              <thead>
                <tr class="headings">
                  <th class="column-title">Tanggal </th>
                  <th class="column-title">Keterangan</th>
                  <th class="column-title">Piutang</th>
                  <th class="column-title">Nominal</th>
                  <th class="column-title">Kekurangan</th>
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
