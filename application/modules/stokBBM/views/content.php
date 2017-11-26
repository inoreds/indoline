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
          <h2>Stok BBM</h2>
          <div class="nav navbar-right panel_toolbox">
            <a type="button" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>stokBBM/printOut">Print Out</a>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstBahanBakar" id="datatable">
              <thead>
                <tr class="headings">
                  <th class="column-title">Nama Kapal </th>
                  <th class="column-title">Nama BBM</th>
                  <th class="column-title">Stok</th>
                  <th class="column-title">Kartu Stok</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->VesselName; ?></td>
                              <td><?php echo $dt->NamaBBM; ?></td>
                              <td><?php echo number_format($dt->Stok,0,".","."); ?> LITER</td>
                              <td> <a type="button" class="btn btn-warning btn-xs" onClick="kartuStok('<?php echo $dt->IdBBM; ?>','<?php echo $dt->IdVessel; ?>')"><i class="fa fa-eye"></i> Lihat Data</a></td>
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
  <div class="modal fade bs-example-modal-lg modalKartuStok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Kartu Stok</h4>
        </div>
        <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" id="table-kartuStok">
              <thead>
                <tr class="headings">
                  <th class="column-title">Tanggal </th>
                  <th class="column-title">Keterangan</th>
                  <th class="column-title">Masuk</th>
                  <th class="column-title">Keluar</th>
                  <th class="column-title">Saldo</th>
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
  
