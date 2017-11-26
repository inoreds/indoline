  <div class="modal fade bs-example-modal-lg modalPONonPertamina" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Buat PO Pembelian (Non Pertamina)</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningPOPembelianNonPertamina" style="display: none;">
                      <a class="close" onclick="$('#warningPOPembelianNonPertamina').show()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pengaju <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namaPengaju" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                        </div>
						<div class="col-md- col-sm-6 col-xs-12">
                             
                          </div>
                      </div>-->
					             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pengaju <span class="required">*</span>
                        </label>
						            <div class="col-md- col-sm-6 col-xs-12">
                           <!-- <select class="form-control" id="idCustomer">
                          </select>-->
                          <input type="text" id="NmPengaju" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                        </div> 
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Supplier <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idSupplier">
                              </select>
                          </div>
                      </div>
                     <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapal Pengangkut <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control idVessel">
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Port <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="portSource" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Biaya Pengiriman <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="biayakirim" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Beli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hargaBeliN" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Jual <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hargaJual" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Pengajuan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglPengajuanN" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Pengisian <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglPengisianN" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Pembayaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglPembayaranN" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis PPn <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                            <select class="form-control" name="jenisppn" id="jenisppn" readonly="yes">
                                <option value="PPn">PPn</option>
                                <!--<option value="Non-PPn">Non-PPn</option> -->
                            </select>
                          </div>
                      </div>
					   <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis PBBKB
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                                <select class="form-control" id="idPBBKB">
                             </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BBM 
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control idBBM">
                             </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah permintaan (L) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jumlahPermintaanN" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  min=0>
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Person <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="contactperson" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone Numbers CP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="phonenumber" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Syarat Pembayaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						  <input type="text" id="SyaratPembayaran" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <!--<div class="form-group"><textarea id="SyaratPembayaran" required="required" class="form-control col-md-7 col-xs-12"> </textarea>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Biaya Pengiriman <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="biayakirim" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  min=0>
                        </div>
                      </div>-->
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanPONonPertamina">Simpan</button>
        </div>

      </div>
    </div>
</div>

