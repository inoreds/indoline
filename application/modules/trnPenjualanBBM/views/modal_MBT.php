<div class="modal fade bs-example-modal-lg modal_MBT" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1385px;  margin-left: -205px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input OAT</h4>
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
                          <input id="status_MBT" name="status" class="form-control col-md-7 col-xs-12" type="hidden"> 
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. PNBP PE<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="noPNBP" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="tglPNBP" required="required" class="form-control col-md-7 col-xs-12 date" >
                              </div>
                            </div>
                          </div> 
                       </div>
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. BA<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="noBA" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="tglBA" required="required" class="form-control col-md-7 col-xs-12 date" >
                              </div>
                            </div>
                          </div> 
                       </div>
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kapal<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="NamaKapal" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="tglBA" required="required" class="form-control col-md-7 col-xs-12 date" >
                              </div>
                            </div>
                          </div> 
                       </div>
                       <!-- <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SS. MV<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" id="idVessel">
                                </select>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. RFP<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="noRFP" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div> 
                       </div> -->
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. MBT<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="dateMBT" required="required" class="form-control col-md-7 col-xs-12 date" >
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Port<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="portMBT" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                              </div>
                            </div>
                          </div> 
                       </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quantity <span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="englishTonsQuantity" required="required" class="form-control col-md-7 col-xs-12 amount numeric" placeholder="Emglish Tons" >
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" id="metricTonsQuantity" required="required" class="form-control col-md-7 col-xs-12 amount numeric" placeholder="Metric Tons">
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" id="litresQuantity" required="required" class="form-control col-md-7 col-xs-12 amount numeric" placeholder="Litres" valu=0>
                              </div>
                              <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" id="barrelsUSQuantity" required="required" class="form-control col-md-7 col-xs-12 amount numeric" placeholder="Barrels" >
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
                                <input type="text" id="gradeOfOil_MBT" required="required" class="form-control col-md-7 col-xs-12" varchar="65">
                              </div>
                            </div>
                           
                          </div> 
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Temperatur Of Oil<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="temperatur_F_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;F">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="temperatur_C_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;C">
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
                                <input type="text" id="specificGravity_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="@">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity_F_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;F">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="specificGravity_C_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric" placeholder="&deg;C">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Specific Grativity @60F (15 &deg;C)<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="specificGravity60_C_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric">
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
                                <input type="text" id="flashPoint_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric">
                              </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">OF<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="flashPoint_C_MBT" required="required" class="form-control col-md-7 col-xs-12 numeric">
                              </div> 
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Water <span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="water_MBT" required="required" class="form-control col-md-7 col-xs-12" maxlength="25">
                              </div>
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Aproximate Viscosity<span class="required">*</span>
                              </label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="aproximate_MBT" required="required" class="form-control col-md-3 col-sm-3  col-xs-12 numeric">
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
                                  <input type="text" id="namaPengawas_MBT" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chief Engineer<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="chiefEnginer_MBT" required="required" class="form-control col-md-7 col-xs-12" maxlength="65">
                                </div>
                              </div>
                            </div>  
                         </div>
                         <div class="row">
                         <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Master<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="namaMaster" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                              </div>
                            </div> 
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mengetahui<span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="mengetahui" required="required" class="form-control col-md-7 col-xs-12" >
                                </div>
                              </div>
                            </div>  
                         </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" id="noPOCustomer_MBT" class="noPOCustomer_penjualan">
                    <input type="hidden" id="detilNumber_MBT" class="detilNumber_penjualan">
                    <button type="button" class="btn btn-primary" id="simpanMBT">Simpan</button>
                  </div>
        </div>
        

      </div>
    </div>
  </div>