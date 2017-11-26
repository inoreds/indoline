<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data History Kapal</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Tanggal Perbaikan</th>
                  <th class="column-title">Nama Teknisi</th>
                  <th class="column-title">Jenis Perbaikan</th>
                  <th class="column-title">Sparepart</th>
                  <th class="column-title">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdHistoryPerbaikan; ?></td>
                              <td><?php echo $dt->TanggalPerbaikan; ?></td>
                              <td><?php echo $dt->NamaTeknisi; ?></td>
                              <td><?php echo $dt->NamaJenisPerbaikan; ?></td>
                              <td><?php echo $dt->NamaBarangInternal; ?></td>
                              <td><?php echo $dt->Jumlah; ?></td>
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