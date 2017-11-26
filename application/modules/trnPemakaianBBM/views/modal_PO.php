  <div class="modal fade bs-example-modal-lg modalInput" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1385px;  margin-left: -205px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Pemakaian BBM Kapal</h4>
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
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Port<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="port" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div>  
                       </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SS. MV <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="ssmv" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Liter OBS <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="literOBS" required="required" class="form-control col-md-7 col-xs-12 amount numeric" >
                              </div>
                            </div>
                          </div>
                      </div>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grade of Oil <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                              <select class="form-control" id="idBBM">
                              </select>
                             </div>
                            </div>
                           
                          </div> 
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Temperatur Of Oil<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="temperatur_F" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;F">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="temperatur_C" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;C">
                              </div>
                            </div>
                          </div>
                          </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Specific Grativity <span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="@">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity_F" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;F">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity_C" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;C">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Specific Grativity @60F (15 &deg;C)<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="specificGravity60_C" required="required" class="form-control col-md-7 col-xs-12 numeric">
                              </div>
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flash Point<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="flashPoint" required="required" class="form-control col-md-7 col-xs-12 numeric"  min=0>
                              </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">OF<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="flashPoint_C" required="required" class="form-control col-md-7 col-xs-12 numeric"  min=0>
                              </div> 
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Water <span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="water" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                              </div>
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Aproximate Viscosity<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="aproximate" required="required" class="form-control col-md-3 col-sm-3  col-xs-12 numeric" min=0 >
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                         <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pengawas<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="namaPengawas" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lighter<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                              <select class="form-control" id="idVessel">
                              </select>
                             </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chief Engineer<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="chiefEnginer" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                              </div>
                            </div>  
                         </div>
                    </form>
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="SimpanPOPemakaianBBM">Simpan</button>
        </div>

      </div>
    </div>
</div>

