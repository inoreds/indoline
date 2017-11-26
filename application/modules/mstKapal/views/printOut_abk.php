<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data ABK</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Nama Lengkap</th>
                  <th class="column-title">Tempat Lahir</th>
                  <th class="column-title">Tgl. Lahir</th>
                  <th class="column-title">Alamat</th>
                  <th class="column-title">Email</th>
                  <th class="column-title">Agama</th>
                  <th class="column-title">Warga Negara </th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->IdABK; ?></td>
                              <td><?php echo $dt->NamaLengkap; ?></td>
                              <td><?php echo $dt->TempatLahir; ?></td>
                              <td><?php echo $dt->TglLahir; ?></td>
                              <td><?php echo $dt->Alamat; ?></td>
                              <td><?php echo $dt->Email; ?></td>
                              <td><?php echo $dt->Agama; ?></td>
                              <td><?php echo $dt->WargaNegara; ?></td>
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