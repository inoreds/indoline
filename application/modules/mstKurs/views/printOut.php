<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Kurs</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID</th>
                  <th class="column-title">ID Currency </th>
                  <th class="column-title">ID KURS</th>
                  <th class="column-title">NAME KURS</th>
                  <th class="column-title">VALUE KURS</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                      foreach($dataTable as $dt)
                      {
                        ?>
                        <tr>
                              <td><?php echo $dt->ID_KUR; ?></td>
                              <td><?php echo $dt->NAME_CURRENCY; ?></td>
                              <td><?php echo $dt->ID_KURS; ?></td>
                              <td><?php echo $dt->NAME_KURS; ?></td>
                              <td><?php echo $dt->VALUE_KURS; ?></td>
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