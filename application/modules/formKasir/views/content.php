<div class="row">
  <div class="col-md-12">
   <div class="x_panel" style="height: 1150px;">
      <div class="x_title">
        <h2><i class="fa fa-bars"></i> Form Kasir</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_bank" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Bank</a>
                </li>
                <li role="presentation" class=""><a href="#tab_kas" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Kas</a>
                </li>
                <li role="presentation" class=""><a href="#tab_giro" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Giro</a>
                </li>
                <li role="presentation" class=""><a href="#tab_bon" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Bon Sementara</a>
                </li>
                <li role="presentation" class=""><a href="#tab_anggaran_mingguan" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Anggaran Mingguan</a>
                </li>

              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_bank" aria-labelledby="home-tab">
                 <div class="x_panel">
                    <div class="x_title">
                      <h2>Bank Masuk / Keluar</h2>
                      <div class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="modal_bank_lainnya()"><i class="fa fa-plus"></i> Transaksi Lainnya</button>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" onclick="modal_bank_piutang()"><i class="fa fa-plus"></i> Pelunasan Piutang</button>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" onclick="modal_bank_hutang()"><i class="fa fa-plus"></i> Pelunasan Hutang</button>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="form-horizontal" style="margin-left: -385px;">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Awal</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="tanggalAwalBank" required="required" class="form-control col-md-7 col-xs-12 date">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="tanggalAkhirBank" required="required" class="form-control col-md-7 col-xs-12 date">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Bank</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <select class="form-control" id="jenisBank">
                              <option value="Bank Masuk">Bank Masuk</option>
                              <option value="Bank Keluar">Bank Keluar</option>
                            </select>
                          </div>
                          <button type="button" class="btn btn-success" id="btn_historyBank">Cari Data</button>
                        </div>
                      </div>   
                      <table class="table" id="table-historyBank">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Tanggal</th>
                              <th>Keterangan</th>
                              <th>Nominal</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table> 
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_kas" aria-labelledby="profile-tab">
                 <div class="x_panel">
                    <div class="x_title">
                      <h2>Kas Masuk / Keluar</h2>
                      <div class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="modal_kas_lainnya()"><i class="fa fa-plus"></i> Transaksi Kas</button>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="form-horizontal" style="margin-left: -385px;">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Awal</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="tanggalAwalKas" required="required" class="form-control col-md-7 col-xs-12 date">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="tanggalAkhirKas" required="required" class="form-control col-md-7 col-xs-12 date">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kas</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <select class="form-control" id="jenisKas">
                              <option value="Kas Masuk">Kas Masuk</option>
                              <option value="Kas Keluar">Kas Keluar</option>
                            </select>
                          </div>
                          <button type="button" class="btn btn-success" id="btn_historyKas">Cari Data</button>
                        </div>
                      </div>   
                      <table class="table" id="table-historyKas">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Tanggal</th>
                              <th>Keterangan</th>
                              <th>Nominal</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table> 
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="" aria-labelledby="profile-tab">
                  
                </div>
              </div>
            </div>

          </div>
    </div>
  </div>
</div>

  