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
          <h2>PO Pembelian BBM (Pertmina)</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahPOPembelianPertamina">Buat PO</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive" style="height: 500px;">
            <table class="table table-striped jambo_table bulk_action tree-Order table-mstBahanBakar">
              <thead>
                <tr class="headings">
                  <th class="column-title">PO Pembelian </th>
                  <th class="column-title">Supplier </th>
                  <th class="column-title">Tgl. Pengajuan </th>
                  <th class="column-title">Nama Pengaju</th>
                  <th class="column-title">BBM</th>
                  <th class="column-title">Jumlah Permintaan (L)</th>
                  <th class="column-title">Harga Beli</th>
                  <!--<th class="column-title">Harga Jual</th> -->
                  <th class="column-title">Total</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                 </th>        
                </tr>
              </thead>
              <tbody>
                  <?php foreach($dataTablePO as $dtPO) { ?>
                        <tr class="treegrid-<?php echo $dtPO->POPembelian_1; ?>">
                          <td><?php echo $dtPO->NoPO; ?></td>
                           <td><?php echo $dtPO->Suplier; ?></td>
                          <td><?php echo $dtPO->TglPengajuan; ?></td>
                          <td><?php echo $dtPO->NamaPengaju; ?></td>
                          <td><?php echo $dtPO->NamaBBM; ?></td>
                          <td><?php echo number_format($dtPO->JumlahPermintaan,0,".","."); ?></td>
                          <td><?php echo "Rp. " .number_format($dtPO->HargaBeli,0,".","."); ?></td>
                          <!--<td><?php echo "Rp. " .number_format($dtPO->HargaPenjualan,0,".","."); ?></td> -->
                          <td><?php echo "Rp. " .number_format($dtPO->TotalHarga,0,".","."); ?></td>
                          <td>
                          <?php if ($dtPO->NoInvoice == null and $dtPO->NoResi == null) { ?>
                            <?php if ($dtPO->Suplier == "Non-Pertamina") { ?>
                              <div class="btn-group" style="margin-bottom: 6px;">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false"><i class="fa fa-pencil"></i> Manage</a>  <span class="caret"></span> </button>
                              <ul class="dropdown-menu">
                                <li><a onclick="inputRecieptBunker('<?php echo $dtPO->POPembelian_1 ?>')">Input Reciept Bunker</a>
                                </li>
                                <li><a onclick="editPOPembelianPertamina('<?php echo $dtPO->POPembelian_1 ?>')">Edit PO</a>
                                </li>
                                <li><a onclick="inputInvoice('<?php echo $dtPO->POPembelian_1 ?>')">Delete PO</a>
                                </li>
                              </ul>
                              </div>
                            <?php } else { ?>
                            <div class="btn-group" style="margin-bottom: 6px;">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false"><i class="fa fa-pencil"></i> Manage</a>  <span class="caret"></span> </button>
                              <ul class="dropdown-menu">
                                <li><a onclick="inputInvoice('<?php echo $dtPO->POPembelian_1 ?>')">Input Invoice</a>
                                </li>
                                <li><a onclick="editPOPembelianPertamina('<?php echo $dtPO->POPembelian_1 ?>')">Edit PO</a>
                                </li>
                                <li><a onclick="inputInvoice('<?php echo $dtPO->POPembelian_1 ?>')">Delete PO</a>
                                </li>
                              </ul>
                            </div>
                            <?php } ?>
                          <?php } ?>
                          </td>
                        </tr> 
                              <?php if ($dtPO->Suplier == "Non-Pertamina") { ?>
                                <?php foreach($dataTableRecieptForBunker as $dtBunker) { if ($dtBunker->POPembelian == $dtPO->POPembelian_1) {?>
                                 
                                  <tr class="treegrid-<?php echo $dtBunker->NoResi; ?> treegrid-parent-<?php echo $dtPO->POPembelian_1; ?>">
                                          
                                        <td><?php echo "Reciept For Bunker"; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                  </tr>   
                                        <?php foreach($dataTableRecieptForBunker as $dtBunker) { if ($dtBunker->POPembelian == $dtPO->POPembelian_1) {?>
                                          <?php  //if ($dtInvoice_detil === reset($dataTableInvoice_detil)) { ?>
                                          <tr style="background-color: #c7e8e8"; class="treegrid-<?php echo $dtInvoice_detil->DetilNo; ?> treegrid-parent-<?php echo $dtInvoice->NoInvoice; ?>" >
                                              <th class="column-title">NO Invoice </th>
                                              <th class="column-title">Item</th>
                                              <th class="column-title">Description</th>
                                              <th class="column-title">Quantity</th>
                                              <th class="column-title">UoM</th>
                                              <th class="column-title">Unit Price</th>
                                              <th class="column-title">Total</th>
                                              <th class="column-title no-link last"><span class="nobr">Action</span>
                                              </th> 
                                              <th></th>
                                          </tr>
                                          <?php //} ?>
                                           
                                       <?php } } ?>
                               <?php } } ?>
                              <?php } else { ?>
                              <?php foreach($dataTableInvoice as $dtInvoice) { if ($dtInvoice->POPembelian == $dtPO->POPembelian_1) {?>
                                 
                                  <tr class="treegrid-<?php echo $dtInvoice->NoInvoice; ?> treegrid-parent-<?php echo $dtPO->POPembelian_1; ?>">
                                          
                                        <td><?php echo "INVOICE"; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                  </tr>   
                                        <?php foreach($dataTableInvoice_detil as $dtInvoice_detil) { if ($dtInvoice_detil->NoInvoice_1 == $dtInvoice->NoInvoice) {?>
                                          <?php  if ($dtInvoice_detil === reset($dataTableInvoice_detil)) { ?>
                                          <tr style="background-color: #c7e8e8"; class="treegrid-<?php echo $dtInvoice_detil->DetilNo; ?> treegrid-parent-<?php echo $dtInvoice->NoInvoice; ?>" >
                                              <th class="column-title">NO Invoice </th>
                                              <th class="column-title">Item</th>
                                              <th class="column-title">Description</th>
                                              <th class="column-title">Quantity</th>
                                              <th class="column-title">UoM</th>
                                              <th class="column-title">Unit Price</th>
                                              <th class="column-title">Total</th>
                                              <th class="column-title no-link last"><span class="nobr">Action</span>
                                              </th> 
                                              <th></th>
                                          </tr>
                                          <?php } ?>
                                          <tr style="background-color: #eef3de"; class="treegrid-<?php echo $dtInvoice_detil->DetilNo; ?> treegrid-parent-<?php echo $dtInvoice->NoInvoice; ?>">
                                                  
                                                <td></td>
                                                <td><?php echo $dtInvoice_detil->DetilNo_1; ?></td>
                                                <td><?php echo $dtInvoice_detil->Description; ?></td>
                                                <td><?php echo $dtInvoice_detil->Quantity; ?></td>
                                                <td><?php echo $dtInvoice_detil->UoM; ?></td>
                                                <td><?php echo "Rp. " .number_format($dtInvoice_detil->UnitPrice,0,".","."); ?></td>
                                                <td><?php echo "Rp. " .number_format($dtInvoice_detil->Total,0,".","."); ?></td>

                                                <td>
                                                  <?php if ($dtInvoice_detil->DOPertamina == null) { ?>
                                                  <a type="button" class="btn btn-info btn-xs" onclick="inputDOLO('<?php echo $dtInvoice_detil->POPembelian_1 ?>','<?php echo $dtInvoice_detil->NoInvoice_1 ?>','<?php echo $dtInvoice_detil->DetilNo_1 ?>')"><i class="fa fa-file-o"></i> DO / LO</a>
                                                  <?php } ?>
                                                </td>
                                                <td>
                                                </td>
                                          </tr>   
                                       <?php } } ?>
                               <?php } } ?>
                              <?php } ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
