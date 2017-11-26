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
          <h2>PO Pembelian BBM (Pertmina dan Non Pertamina )</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahPOPembelianPertamina">PO Pertamina</button>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahPONonPertamina">PO Agen (Non Pertamina)</button>
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
                          <td><?php
								if ($dtPO->PONumber < 1)
								{echo $dtPO->NoPO;}
								else{
								echo $dtPO->PONumber;} 
						  ?></td>
                           <td><?php echo $dtPO->NamaSupplier; ?></td>
                          <td><?php echo $dtPO->TglPengajuan; ?></td>
                          <td><?php echo $dtPO->NamaPengaju; ?></td>
                          <td><?php echo $dtPO->NamaBBM; ?></td>
                          <td><?php echo number_format($dtPO->JumlahPermintaan,0,".","."); ?></td>
                          <td><?php echo "Rp. " .number_format($dtPO->HargaBeli,0,".","."); ?></td>
                          <!--<td><?php echo "Rp. " .number_format($dtPO->HargaPenjualan,0,".","."); ?></td> -->
                          <td><?php echo "Rp. " .number_format($dtPO->TotalHarga,0,".","."); ?></td>
                          <td>
                          <?php if ($dtPO->NoInvoice == null) { ?>
                            
                              <div class="btn-group" style="margin-bottom: 6px;">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false"><i class="fa fa-pencil"></i> Manage</a>  <span class="caret"></span> </button>
                              <ul class="dropdown-menu">
                                <?php if ($dtPO->idSupplier <> "SUP00001") { ?>
                                  <li><a onclick="cetakPOPembelian('<?php echo $dtPO->POPembelian_1 ?>')">cetak PO</a>
                                </li><?php } else { ?>
                                  <li><a onclick="inputInvoice('<?php echo $dtPO->POPembelian_1 ?>')">Input Invoice</a>
                                  </li>
                                <?php } ?>

                                <?php if ($dtPO->idSupplier <> "SUP00001") { ?>
                                  <li><a onclick="editPONonPertamina('<?php echo $dtPO->POPembelian_1 ?>')">Edit PO</a>
                                </li><?php } else { ?>
                                  <li><a onclick="editPOPembelianPertamina('<?php echo $dtPO->POPembelian_1 ?>')">Edit PO</a>
                                  </li>
                                <?php } ?>

                                <li><a onclick="deletePOPembelianPertamina('<?php echo $dtPO->POPembelian_1 ?>')">Delete PO</a>
                                </li>
                                <?php if ($dtPO->Status <> 'Barang Diterima') { ?>
                                <li><a onclick="prosesPOPembelianN('<?php echo $dtPO->POPembelian_1 ?>','<?php echo $dtPO->IdBBM ?>','<?php echo $dtPO->IdVessel ?>','<?php echo $dtPO->JumlahPermintaan ?>','<?php echo $dtPO->NamaSupplier ?>')">Barang Diterima </a>
                                </li>
                                <?php } ?>
                              </ul>
                              </div>
                     
                          <?php } ?>
                          </td>
                        </tr> 

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
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
