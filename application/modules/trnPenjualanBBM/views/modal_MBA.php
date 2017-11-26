<div class="modal fade bs-example-modal-lg modal_MBA" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1385px;  margin-left: -205px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input MBA</h4>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Recipt Bunker<span class="required">*</span>
                                </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" required="required" class="form-control col-md-7 col-xs-12" maxlength="65" id="noPOCustomer_MBA" class="noPOCustomer_penjualan" readonly>
                              </div>
                            </div>
						</div>
                      </div>
                      
					  <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapal Sumber<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
									<select class="form-control" id="idVessel">
									</select>
								 </div>
                            </div>
						</div>
                      </div>
                      <div class="row">
                       <input id="status_MBA" name="status" class="form-control col-md-7 col-xs-12" type="hidden"> 
                       <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="dateMBA" required="required" class="form-control col-md-7 col-xs-12 date" >
                              </div>
                            </div>
                          </div> 
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Port<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="portMBA" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
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
                                <input type="text" id="ssmv" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
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
                                <input type="text" id="gradeOfOil_MBA" required="required" class="form-control col-md-7 col-xs-12" maxlength="25" >
                              </div>
                            </div>
                           
                          </div> 
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Temperatur Of Oil<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="temperatur_F_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;F">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="temperatur_C_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;C">
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
                                <input type="text" id="specificGravity_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="@">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity_F_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;F">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity_C_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;C">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Specific Grativity @60F (15 &deg;C)<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="specificGravity60_C_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric">
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
                                <input type="text" id="flashPoint_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric"  min=0>
                              </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">OF<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="flashPoint_C_MBA" required="required" class="form-control col-md-7 col-xs-12 numeric"  min=0>
                              </div> 
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Water <span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="water_MBA" required="required" class="form-control col-md-7 col-xs-12"  maxlength="25">
                              </div>
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Aproximate Viscosity<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="aproximate_MBA" required="required" class="form-control col-md-3 col-sm-3  col-xs-12 numeric" min=0 >
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
                                  <input type="text" id="namaPengawas_MBA" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chief Engineer<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="chiefEnginer_MBA" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                              </div>
                            </div>  
                         </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <!--<input type="hidden" id="noPOCustomer_MBA" class="noPOCustomer_penjualan">-->
                    <input type="hidden" id="noPO" class="noPO_penjualan">
                    <input type="hidden" id="detilNumber_MBA" class="detilNumber_penjualan">
                    <input type="hidden" id="detilNumber_jumlah" class="detilNumber_jumlah">
                    <input type="hidden" id="detilNumber_idBBM" class="detilNumber_idBBM">
                    <button type="button" class="btn btn-primary" id="simpanMBA">Simpan</button>
                  </div>
        </div>
        

      </div>
    </div>
  </div>