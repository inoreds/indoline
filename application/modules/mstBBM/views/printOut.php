<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Barang BBM</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID BBM </th>
                  <th class="column-title">Nama BBM</th>
                  <th class="column-title">Satuan</th>
                  <th class="column-title">Quantity</th>
                  <th class="column-title">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdBBM; ?></td>
                              <td><?php echo $dt->NamaBBM; ?></td>
                              <td><?php echo $dt->NamaSatuan; ?></td>
                              <td><?php echo $dt->QuantityBBM; ?></td>
                              <td><?php echo $dt->Keterangan; ?></td>
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