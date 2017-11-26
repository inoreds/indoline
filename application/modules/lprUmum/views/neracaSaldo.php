  <div class="page-title">
    <div class="title_left">
      <h3>
            INDOLINE
            <small>
                App Software
            </small>
        </h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Neraca Saldo</h2>
          <div class="nav navbar-right panel_toolbox">
            
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-mstKapal" >
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
                      $debit = 0;
                      $credit = 0;
                      foreach($neracaSaldo as $dt)
                      {
                        $debit = $debit +  $dt->DEBIT;
                        $credit = $credit +  $dt->CREDIT;
                        ?>
                        <tr>
                              <td><?php echo $dt->NAME_SUB_ACCOUNT; ?></td>
                              <td><?php echo "Rp. " .number_format($dt->DEBIT,0,".","."); ?></td>
                              <td><?php echo "Rp. " .number_format($dt->CREDIT * -1,0,".","."); ?></td>
                        </tr>   
                        <?php   
                      }
                    ?>
                        <tr  style="font-weight: bold;">
                              <td><?php echo "Jumlah"; ?></td>
                              <td><?php echo "Rp. " .number_format($debit,0,".","."); ?></td>
                              <td><?php echo "Rp. " .number_format($credit * -1,0,".","."); ?></td>
                        </tr>  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  
