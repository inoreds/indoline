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
          <h2>Penjualan BBM Non PPN</h2>
          <div class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" id="tambahPOCustomerNonPPN">Input PO Customer</button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action tree-Order table-mstBahanBakar">
              <thead>
                <tr class="headings">
                  <th class="column-title">PO Customer </th>
                  <th class="column-title">Nama Customer </th>
                  <th class="column-title">Tgl. PO </th>
                  <th class="column-title">Tanggal Awal Supply</th>
                  <th class="column-title">Tanggal Akhir Supply</th>
                  <th class="column-title">Total</th>
                  <th class="column-title">Action</th>
                  <th></th>
                 </th>        
                </tr>
              </thead>
              <tbody>
                  <?php foreach($dataTablePO as $dtPO) { ?>
                        <tr class="treegrid-<?php echo $dtPO->NoPoCustomer; ?>">
                          <td><?php echo $dtPO->NoPO; ?></td>
                          <td><?php echo $dtPO->NamaCustomer; ?></td>
                          <td><?php echo $dtPO->TglPO; ?></td>
                          <td><?php echo $dtPO->TglAwalSupply; ?></td>
                          <td><?php echo $dtPO->TglAkhirSupply; ?></td>
                          <td><?php echo "Rp. " .number_format($dtPO->Total,0,".","."); ?></td>
                          <!-- <td><a type="button" class="btn btn-warning btn-xs" onclick="cetakInvoice('<?php echo $dtPO->NoPoCustomer; ?>')"><i class="fa fa-print"></i> Cetak Invoice</a></td> -->
                          <td></td>
                        </tr> 

                            <?php foreach($dataTablePO_detil as $dtPO_detil) { if ($dtPO_detil->NoPoCustomer == $dtPO->NoPoCustomer) {?>
                                <?php  if ($dtPO_detil === reset($dataTablePO_detil)) { ?>
                                <tr style="background-color: #c7e8e8"; class="treegrid-<?php echo $dtPO_detil->DetilNumber; ?> treegrid-parent-<?php echo $dtPO->NoPoCustomer; ?>" >
                                    <th class="column-title">Tgl Supply</th>
                                    <th class="column-title">BBM</th>
                                    <th class="column-title">Jumlah</th>
                                    <th class="column-title">Harga</th>
                                    <th class="column-title">Sub Total</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span>
                                    </th>
                                    <th class="column-title no-link last"><span class="nobr">Kwitansi</span>
                                    </th>
                                    <th></th> 
                                </tr>
                                <?php } ?>
                                <tr style="background-color: #eef3de"; class="treegrid-<?php echo $dtPO_detil->DetilNumber; ?> treegrid-parent-<?php echo $dtPO->NoPoCustomer; ?>">
                                      <td><?php echo $dtPO_detil->TglSupply; ?></td>
                                      <td><?php echo $dtPO_detil->NamaBBM; ?></td>
                                      <td><?php echo $dtPO_detil->Quantity; ?></td>
                                      <td><?php echo $dtPO_detil->Harga; ?></td>
                                      <td><?php echo "Rp. " .number_format($dtPO_detil->SubTotal,0,".","."); ?></td>
                                      <td>
                                        <?php if ($dtPO_detil->NoMBA == null) { ?>
                                          <a type="button" class="btn btn-info btn-xs" onclick="inputMBA_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>',<?php echo $dtPO_detil->Quantity ?>,'<?php echo $dtPO_detil->IdBBM ?>')"><i class="fa fa-file-o"></i> MBA</a>
                                        <?php } else { ?>
                                          <div class="btn-group" style="margin-bottom: 6px;">
                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false"><i class="fa fa-pencil"></i> MBA</a>  <span class="caret"></span> </button>
                                            <ul class="dropdown-menu">
                                              <li><a onclick="editMBA_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>')">Edit MBA</a>
                                              </li>
                                              <li><a onclick="printMBA_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>','<?php echo $dtPO_detil->NoMBA ?>')">Print MBA</a>
                                              </li>
                                              <li><a onclick="deleteMBA_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>','<?php echo $dtPO_detil->NoMBA ?>')">Delete MBA</a>
                                              </li>
                                            </ul>
                                          </div>
                                        <?php } ?>
                                         <?php if ($dtPO_detil->NoMBT == null) { ?>
                                          <a type="button" class="btn btn-warning btn-xs" onclick="inputMBT_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>')"><i class="fa fa-file-o"></i> OAT</a>
                                        <?php } else { ?>
                                          <div class="btn-group" style="margin-bottom: 6px;">
                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="false"><i class="fa fa-pencil"></i> OAT</a>  <span class="caret"></span> </button>
                                            <ul class="dropdown-menu">
                                              <li><a onclick="editMBT_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>')">Edit OAT</a>
                                              </li>
                                              <li><a onclick="printMBT_Non('<?php echo $dtPO_detil->NoPoCustomer ?>','<?php echo $dtPO_detil->DetilNumber ?>','<?php echo $dtPO_detil->NoMBT ?>')">Print OAT</a>
                                              </li>
                                              <li><a href="#">Delete OAT</a>
                                              </li>
                                            </ul>
                                          </div> 
                                        <?php } ?>
										
										<!-- Tambahan -->
										
										
										
										<!-- Tambahan -->
										
                                      </td>
                                      <td><a type="button" class="btn btn-info btn-xs" onclick="cetakKwitansiNONppn('<?php echo $dtPO_detil->NoPoCustomer; ?>','<?php echo $dtPO_detil->DetilNumber?>')"><i class="fa fa-print"></i> Kwitansi</a></td>
                                      <!-- <td><a type="button" class="btn btn-info btn-xs" onclick="cetakKwitansi2('<?php echo $dtPO_detil->NoPoCustomer; ?>','<?php echo $dtPO_detil->DetilNumber?>')"><i class="fa fa-print"></i> Kwitansi</a></td> -->
                                      <td></td>
                                </tr>   
                             <?php } } ?>

                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
