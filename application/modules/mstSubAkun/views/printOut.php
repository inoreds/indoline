<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Akun / COA</h2>
           <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" id="table-printOutSubakun">
              
                <tr class="headings">
                  <th class="column-title">ID </th>
                  <th class="column-title">Currency </th>
                  <th class="column-title">Kategori </th>
                  <th class="column-title">ID Sub Akun </th>
                  <th class="column-title">ID Sub Akun 2</th>
                  <th class="column-title">ID Sub Akun 3</th>
                  <th class="column-title">ID Sub Akun 4</th>
                  <th class="column-title">Nama Akun</th>
                          
                </tr>
              <tbody>
                   <?php foreach($dataTable_1 as $dt_1) { ?>
                        <tr class="treegrid-<?php echo $dt_1->ID_SUB_ACCOUNT; ?>">
                              <td></td>
                              <td><?php echo $dt_1->NAME_CURRENCY; ?></td>
                              <td><?php echo $dt_1->NAME_ACCOUNT_CATEGORY; ?></td>
                              <td><?php echo $dt_1->ID_SUB_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->ID_SUB2_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->ID_SUB3_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->ID_SUB4_ACCOUNT; ?></td>
                              <td><?php echo $dt_1->NAME_SUB_ACCOUNT; ?></td>
                              
                        </tr>  
                                  <?php foreach($dataTable_2 as $dt_2) { if ($dt_2->ID_SUB_ACCOUNT == $dt_1->ID_SUB_ACCOUNT) {?>
                                      <tr style="background-color: #eef3de"; class="treegrid-<?php echo $dt_2->ID_SUB2_ACCOUNT; ?> treegrid-parent-<?php echo $dt_2->ID_SUB_ACCOUNT; ?>">
                                            <td></td>
                                            <td><?php echo $dt_2->NAME_CURRENCY; ?></td>
                                            <td><?php echo $dt_2->NAME_ACCOUNT_CATEGORY; ?></td>
                                            <td><?php echo $dt_2->ID_SUB_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->ID_SUB2_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->ID_SUB3_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->ID_SUB4_ACCOUNT; ?></td>
                                            <td><?php echo $dt_2->NAME_SUB_ACCOUNT; ?></td>
                                            
                                      </tr>   
                                            <?php foreach($dataTable_3 as $dt_3) { if ($dt_3->ID_SUB2_ACCOUNT == $dt_2->ID_SUB2_ACCOUNT) {?>
                                              <tr style="background-color: #f2ffc7"; class="treegrid-<?php echo $dt_2->ID_SUB3_ACCOUNT; ?> treegrid-parent-<?php echo $dt_3->ID_SUB2_ACCOUNT; ?>">
                                                    <td></td>
                                                    <td><?php echo $dt_3->NAME_CURRENCY; ?></td>
                                                    <td><?php echo $dt_3->NAME_ACCOUNT_CATEGORY; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB2_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB3_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->ID_SUB4_ACCOUNT; ?></td>
                                                    <td><?php echo $dt_3->NAME_SUB_ACCOUNT; ?></td>
                                              </tr>   

                                                  <?php foreach($dataTable_4 as $dt_4) { if ($dt_4->ID_SUB3_ACCOUNT == $dt_3->ID_SUB3_ACCOUNT) {?>
                                                      <tr style="background-color: #dee2dc"; class="treegrid-<?php echo $dt_4->ID_SUB4_ACCOUNT; ?> treegrid-parent-<?php echo $dt_4->ID_SUB3_ACCOUNT; ?>">
                                                            <td></td>
                                                            <td><?php echo $dt_4->NAME_CURRENCY; ?></td>
                                                            <td><?php echo $dt_4->NAME_ACCOUNT_CATEGORY; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB2_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB3_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->ID_SUB4_ACCOUNT; ?></td>
                                                            <td><?php echo $dt_4->NAME_SUB_ACCOUNT; ?></td>
                                                      </tr>   
                                                   <?php } } ?>
                                           <?php } } ?> 
                                   <?php } } ?> 
                        <?php  }?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>