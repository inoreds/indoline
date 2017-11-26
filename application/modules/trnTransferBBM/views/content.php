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
          <h2>Pemakaian BBM Kapal</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahTransferBBM">Tambah Transfer BBM</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive" style="height: 500px;">
            <table class="table table-striped jambo_table bulk_action tree-Order table-mstBahanBakar">
              <thead>
                <tr class="headings">
                  <th class="column-title">PO Pemakaian </th>
                  <th class="column-title">Tanggal </th>
                  <th class="column-title">Nama Kapal</th>
                  <th class="column-title">Port </th>
                  <th class="column-title">Jenis BBM </th>
                  <th class="column-title">Jumlah BBM (L) </th>
                  <th class="column-title">Lighter </th>
                  <th class="column-title">Nama Pengawas</th>
                  <th class="column-title">Chief Engginer</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                 </th>        
                </tr>
              </thead>
              <tbody>
                  <?php foreach($dataTablePO2 as $dtPO) { ?>
                        <tr>
                          <td><?php echo $dtPO->NoTransferBBM; ?></td>
                          <td><?php echo $dtPO->Date; ?></td>
                          <td><?php echo $dtPO->Kapal1; ?></td>
                          <td><?php echo $dtPO->Port; ?></td>
                          <td><?php echo $dtPO->NamaBBM; ?></td>  
                          <td><?php echo number_format($dtPO->LiterOBS,0,".","."); ?></td>
                          <td><?php echo $dtPO->Kapal2; ?></td>
                          <td><?php echo $dtPO->NamaPengawas; ?></td>
                          <td><?php echo $dtPO->ChiefEnginer; ?></td>     
                  <?php } ?>
                  
                    </tr> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
