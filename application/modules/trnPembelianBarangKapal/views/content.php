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
          <h2>PO Pembelian Barang Kapal</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahPOPembelianBarangKapal">Input Pembelian</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action tree-Order table-mstBahanBakar">
              <thead>
                <tr class="headings">
                  <th class="column-title">Pembelian </th>
                  <th class="column-title">Tgl. Pembelian </th>
                  <th class="column-title">Nama Barang </th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                 </th>        
                </tr>
              </thead>
              <tbody>
                  <?php foreach($dataTableInvoice as $dtInvoice) { ?>
                        <tr>
                          <td><?php echo $dtInvoice->POPembelian_barangKapal; ?></td>
                          <td><?php echo $dtInvoice->TglPembelian; ?></td>
                          <td><?php echo $dtInvoice->TglPembelian; ?></td>
                          <td></td>
                        </tr> 
                             
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
