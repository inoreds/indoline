  <div class="modal fade bs-example-modal-lg modalInput" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Buat PO Pembelian (Pertamina)</h4>
        </div>
        <div class="modal-body">
          <div class="">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningPOPembelianPertamina" style="display: none;">
                      <a class="close" onclick="$('#warningPOPembelianPertamina').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pengaju <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namaPengaju" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                        </div>
                      </div>
                     <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapal Pengangkut <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idVessel">
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Beli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hargaBeli" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Jual <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="hargaPenjualan" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Pengajuan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglPengajuan" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Pembayaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglPembayaran" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Pembayaran <span class="required">*</span>
                          </label>
                          <div class="col-md- col-sm-6 col-xs-12">
                            <select class="form-control" id="jenisPembayaran">
                                <option value="Kredit">Kredit</option>
                                <option value="Tunai">Tunai</option>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BBM <span class="required">*</span>
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
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanPOPembelianPertamina">Simpan</button>
        </div>

      </div>
    </div>
</div>
