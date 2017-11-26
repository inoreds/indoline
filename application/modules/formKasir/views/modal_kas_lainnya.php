  <div class="modal fade bs-example-modal-lg modal-kas_lainnya" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 950px;"> 
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Transaki Keluar / Masuk Kas</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                      <div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="warningPOPembelianPertamina" style="display: none;">
                          <a class="close" onclick="$('#warningPOPembelianPertamina').hide()">×</a>  
                          </button>
                          <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                        </div>
                           <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Transaksi <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="text" id="tglTransaksiKas" required="required" class="form-control col-md-7 col-xs-12 date">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Transaksi <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <select class="form-control" id="kas_masuk_keluar">
                                    <option value=""></option>  
                                    <option value="Kas Masuk">Kas Masuk</option>  
                                    <option value="Kas Keluar">Kas Keluar</option>
                                 </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Akun Kas <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <select class="form-control id_account_kas" id="akunKas">
                                 </select>
                              </div>
                          </div>  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="text" id="keteranganKas" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>                      
                      </div>
                  <div class="ln_solid"></div>
                 
                  <div style="margin-left: 3%;">
                      <table class="table table-striped table-bordered dataTable no-footer" id="table-transaksi_kas">
                    <thead>
                          <tr class="headings">
                            <th></th>
                            <th class="column-title" width="40%">Akun Terkait</th>
                            <th class="column-title" width="40%">Nominal</th>
                            <th class="column-title" width="40%">Keterangan</th>
                            <th class="column-title no-link last" width="20%"><span class="nobr">Action</span>
                            </th>        
                          </tr>
                          </thead>
                          <tbody>
                           <tr>
                            <td></td>
                            <td><select class="form-control id_account_bukti_kas" style="width: 100%;"><option value="">-----------------Akun Perkiraan--------------</option></select></td>
                            <td><input type="text" id="nominalAkunKas" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  ></td>
                            <td><input type="text" id="keteranganAkunKas" required="required" class="form-control col-md-3 col-xs-12"  ></td>
                            <td><button type="button" class="btn btn-sm btn-primary" id="simpanDetailKas"><i class="fa fa-plus"></i></button></td>
                          </tr>   
                    </tbody>
                  </table>
                  </div>
         
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanKasKeluarMasuk">Simpan</button>
        </div>

      </div>
    </div>
</div>
