<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Sertifikat Kapal</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Nama Sertifikat</th>
                  <th class="column-title">Jenis Sertifikat</th>
                  <th class="column-title">Tgl. Terbit</th>
                  <th class="column-title">Tgl. Habis</th>
                  <th class="column-title">Nama Instansi </th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdSertifikatKapal; ?></td>
                              <td><?php echo $dt->NamaSertifikat; ?></td>
                              <td><?php echo $dt->JenisSertifikat; ?></td>
                              <td><?php echo $dt->TglTerbitSertifikat; ?></td>
                              <td><?php echo $dt->TglHabisSertifikat; ?></td>
                              <td><?php echo $dt->NamaInstansi; ?></td>
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