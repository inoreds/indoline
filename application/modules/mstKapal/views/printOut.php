<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Kapal</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Kapal</th>
                  <th class="column-title">Bendera</th>
                  <th class="column-title">Tahun Pembuatan</th>
                  <th class="column-title">Kapasitas Diangkut</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdVessel; ?></td>
                              <td><?php echo $dt->VesselName; ?></td>
                              <td><?php echo $dt->Flag; ?></td>
                              <td><?php echo $dt->BuildYear; ?></td>
                              <td><?php echo $dt->CargoTankCapacity; ?></td>
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