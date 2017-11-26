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
          <h2>PO Pembelian BBM (Non Pertmina)</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahPOPembelianNonPertamina">Buat PO</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive" style="height: 500px;">
            <table class="table table-striped jambo_table bulk_action tree-Order table-mstBahanBakar">
              <thead>
                <tr class="headings">
                  <th class="column-title">PO Pembelian </th>
                  <th class="column-title">Tgl. Pengajuan </th>
                  <th class="column-title">Tgl. Pengisian </th>
                  <th class="column-title">Nama Pengaju</th>
                  <th class="column-title">Supplier</th>
                  <th class="column-title">BBM</th>
                  <th class="column-title">Jml. Permintaan(L)</th>
                  <th class="column-title">Harga Beli</th>
                  <th class="column-title">Total</th>
                  <th class="column-title">Biaya Transportir</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                 </th>        
                </tr>
              </thead>
              <tbody>
                  <?php foreach($dataTablePO as $dtPO) { ?>
                        <tr>
                          <td><?php echo $dtPO->POPembelian_non; ?></td>
                          <td><?php echo $dtPO->TglPengajuan; ?></td>
                          <td><?php echo $dtPO->TglPengisian; ?></td>
                          <td><?php echo $dtPO->NamaCustomer; ?></td>
                          <td><?php echo $dtPO->NamaSupplier; ?></td>
                          <td><?php echo $dtPO->NamaBBM; ?></td>
                          <td><?php echo number_format($dtPO->JumlahPermintaan,0,".","."); ?></td>
                          <td><?php echo "Rp. " .number_format($dtPO->HargaPenjualan,0,".","."); ?></td>
                          <!--<td><?php //echo "Rp. " .number_format($dtPO->Total,0,".","."); ?></td>-->
                          <td><?php echo "Rp. " .number_format(($dtPO->JumlahPermintaan*$dtPO->HargaPenjualan),0,".","."); ?></td>
                          <td><?php echo "Rp. " .number_format($dtPO->HargaBeli,0,".","."); ?></td>
                          <td>
                            <div class="btn-group" style="margin-bottom: 6px;">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false"><i class="fa fa-pencil"></i> Manage</a>  <span class="caret"></span> </button>
                              <ul class="dropdown-menu">
                                <li><a onclick="editPOPembelian_non('<?php echo $dtPO->POPembelian_non ?>')">Edit PO</a>
                                </li>
                                <li><a onclick="deletePOPembelian_non('<?php echo $dtPO->POPembelian_non ?>')">Delete PO</a>
                                </li>
								<li><a onclick="cetakPOPembelian_non('<?php echo $dtPO->POPembelian_non ?>')">Cetak PO</a>
                                </li>
                                <?php if ($dtPO->Status <> 'Barang Diterima') { ?>
                                <li><a onclick="prosesPOPembelian_non('<?php echo $dtPO->POPembelian_non ?>','<?php echo $dtPO->IdBBM ?>','<?php echo $dtPO->IdVessel ?>','<?php echo $dtPO->JumlahPermintaan ?>')">Barang Diterima </a>
                                </li>
                                <?php } ?>
                              </ul>
                            </div>
                         
                          </td>
                        </tr> 
                              
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
