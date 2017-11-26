<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Asset</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" >
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Nama Kategori</th>
                  <th class="column-title">Kategori</th>
                  <th class="column-title">Asset</th>
                  <th class="column-title">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->ID_ASSET; ?></td>
                              <td><?php echo $dt->NAME_ASSET_CATEGORY; ?></td>
                              <td><?php echo $dt->NAME_ASSET; ?></td>
                              <td><?php echo $dt->DATE_ASSET; ?></td>
                              <td><?php echo $dt->QTY; ?></td>
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