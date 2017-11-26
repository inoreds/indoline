  <div class="modal fade bs-example-modal-lg modalInput" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1385px;  margin-left: -205px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Persewaan Armada</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                      <div class="alert alert-danger alert-dismissible" role="alert" id="warningMstKapal" style="display: none;">
                        <a class="close" onclick="$('#warningMstKapal').hide()">×</a>  
                        </button>
                        <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                      </div>
            
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  
              </div>
            </div>
                      </div>
                      <div class="row">
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden"> 
                       <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="date" required="required" class="form-control col-md-7 col-xs-12 date" >
                              </div>
                            </div>
                          </div> 
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dari<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="dari" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div>  
                       </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Untuk Pembayaran <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="untukpembayaran" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="jumlah" required="required" class="form-control col-md-7 col-xs-12 amount numeric" >
                              </div>
                            </div>
                          </div>
                      </div>
                        
                        
                  
                    </form>
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="SimpanPersewaanKapal">Simpan</button>
        </div>

      </div>
    </div>
</div>

