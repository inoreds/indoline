<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
          <h2>Data Supplier</h2>
        </div>
        
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstKapal">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID Supplier </th>
                  <th class="column-title">Nama Supplier</th>
                  <th class="column-title">Alamat Supplier</th>
                  <th class="column-title">Telp. Supplier</th>
                  <th class="column-title">Email Suppliers</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdSupplier; ?></td>
                              <td><?php echo $dt->NamaSupplier; ?></td>
                              <td><?php echo $dt->AlamatSupplier; ?></td>
                              <td><?php echo $dt->TelpSupplier; ?></td>
                              <td><?php echo $dt->EmailSupplier; ?></td>
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