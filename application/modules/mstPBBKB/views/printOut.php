<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Harga PBBKB</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">Kode PBBKB</th>
                  <th class="column-title">Jenis PBBKB</th>
                  <th class="column-title">NIlai</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->idPBBKB; ?></td>
                              <td><?php echo $dt->jenisPbbkb; ?></td>
                              <td><?php echo $dt->nilai; ?></td>
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