<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Customer</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID Customer </th>
                  <th class="column-title">Nama Customer</th>
                  <th class="column-title">Alamat Customer</th>
                  <th class="column-title">Telp. Customer 1</th>
                  <th class="column-title">Telp. Customer 2</th>
                  <th class="column-title">Email Customers</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdCustomer; ?></td>
                              <td><?php echo $dt->NamaCustomer; ?></td>
                              <td><?php echo $dt->AlamatCustomer; ?></td>
                              <td><?php echo $dt->TelpCustomer1; ?></td>
                              <td><?php echo $dt->TelpCustomer2; ?></td>
                              <td><?php echo $dt->EmailCustomer; ?></td>
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