<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Jurnal</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" >
              <thead>
                <tr class="headings">
                  <th class="column-title">Nama Akun </th>
                  <th class="column-title">Debit</th>
                  <th class="column-title">Kredit</th>
                  </th>        
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->NAME_SUB_ACCOUNT; ?></td>
                              <td><?php echo "Rp. " .number_format($dt->DEBIT,0,".","."); ?></td>
                              <td><?php echo "Rp. " .number_format($dt->CREDIT,0,".","."); ?></td>
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
