  <div class="modal fade bs-example-modal-lg modal-bank_lainnya"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
       <div class="modal-content" style="width: 950px;"> 
      <!--<div class="modal-content">-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Transaki Keluar / Masuk Bank</h4>
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
                              <input type="text" id="tglTransaksiBank" required="required" class="form-control col-md-7 col-xs-12 date">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Transaksi <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <select class="form-control" id="bank_masuk_keluar">
                                    <option value=""></option>  
                                    <option value="Bank Masuk">Bank Masuk</option>  
                                    <option value="Bank Keluar">Bank Keluar</option>
                                 </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Akun Bank <span class="required">*</span>
                            </label>
                            <div class="col-md- col-sm-8 col-xs-12">
                                 <select class="form-control id_account_bank" id="akunBank">
                                 </select>
                              </div>
                          </div>  
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                              <input type="text" id="keteranganBank" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>                      
                      </div>
                  <div class="ln_solid"></div>
                 
                  <div style="margin-left: 3%;">
                      <table class="table table-striped table-bordered dataTable no-footer" id="table-transaksi_bank">
                    <thead>
                          <tr class="headings">
                            <th></th>
                            <th class="column-title" width="40%">Akun Terkait</th>
                            <th class="column-title" width="30%">Nominal</th>
                            <th class="column-title" width="20%">Keterangan</th>
                            <th class="column-title no-link last" width="20%"><span class="nobr">Action</span>
                            </th>        
                          </tr>
                          </thead>
                          <tbody>
                           <tr>
                            <td></td>
                            <td><select class="form-control id_account_bukti_bank" style="width: 100%;"><option value="">-----------------Akun Perkiraan--------------</option></select></td>
                            <td><input type="text" id="nominalAkun" required="required" class="form-control col-md-3 col-xs-12 amount numeric"></td>
                             <td><input type="text" id="keteranganAkun" required="required" class="form-control col-md-3 col-xs-12"  ></td>
                            <td><button type="button" class="btn btn-sm btn-primary" id="simpanDetailBank"><i class="fa fa-plus"></i></button></td>
                          </tr>   
                    </tbody>
                  </table>
                  </div>
         
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanBankKeluarMasuk">Simpan</button>
        </div>
      </div>
    </div>
</div>
