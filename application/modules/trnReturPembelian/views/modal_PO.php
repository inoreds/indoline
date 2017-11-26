  <div class="modal fade bs-example-modal-lg modalInput" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Retur Pembelian</h4>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. PO <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noPo" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <!--<div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pengaju <span class="required">*</span>
                          </label>
						<div class="col-md- col-sm-6 col-xs-12"> -->
                          <!--<input type="text" id="namaPengaju" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">-->
						  <!--<select class="form-control" id="idCustomer">
						  </select>						  
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wilayah <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idKotaPO">
                             </select>
                          </div>
                      </div>
					             <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PBBKB<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pbbkb" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div> -->
                     <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapal Pengangkut <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idVessel">
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Supplier <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idSupplier">
                             </select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Beli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hargabeli" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Transaksi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglTransaksi" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BBM 
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idBBM">
                             </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah permintaan (L) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jumlahPermintaan" required="required" class="form-control col-md-7 col-xs-12 amount numeric"  min=0>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						  <input type="text" id="keterangan" required="required" class="form-control col-md-7 col-xs-12">
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
          <button type="button" class="btn btn-primary" id="simpanPOReturPembelian">Simpan</button>
        </div>

      </div>
    </div>
</div>

