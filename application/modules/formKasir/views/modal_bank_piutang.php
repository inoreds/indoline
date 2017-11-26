  <div class="modal fade bs-example-modal-lg modal-bank_piutang"   role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <!-- <div class="modal-content" style="width: 600px;margin-left: 20%;"> -->
      <div class="modal-content" style="margin-left: 10%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Transaki Pelunasan Piutang</h4>
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
                              <input type="text" id="tglTransaksiBankPiutang" required="required" class="form-control col-md-7 col-xs-12 date">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <select class="form-control id_customer select2_single" style="width: 100%;" id="id_customer_piutang">
                                  </select>
                              </div>
                          </div>  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Po <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <select class="form-control" style="width: 100%;" id="no_piutang_customer">
                                  </select>
                                  <input type="hidden" id="id_transaction">
                              </div>
                          </div>  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nominal Piutang <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <input type="text" id="nominalPiutang" required="required" class="form-control col-md-7 col-xs-12" disabled>
                                 <input type="hidden" id="kekuaranganPiutang" required="required" class="form-control col-md-7 col-xs-12" disabled>
                              </div>
                          </div>  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                 <select class="form-control id_account_bank" id="akunBankPiutang">
                                 </select>
                              </div>
                          </div>  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="text" id="keteranganBankPiutang" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>   
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nominal <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="text" id="jumlahPembayaranPiutang" required="required" class="form-control col-md-7 col-xs-12 amount numeric">
                            </div>
                          </div>                      
                      </div>
                  </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanBankPiutang">Simpan</button>
        </div>

      </div>
    </div>
</div>
