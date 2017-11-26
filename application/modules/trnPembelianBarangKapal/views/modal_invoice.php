<div class="modal fade bs-example-modal-lg modalInput" clas= tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1050px;  margin-left: -80px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Pembelian Barang Kapal</h4>
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
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        <div class="row">
                          <!--<div class="col-md-12">
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kapal <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <select class="form-control" id="idKapal"></select>
							</div>
						  </div>
                            <div class="form-group">
                              <label class="control-label col-md-12" for="first-name">Tanggal<span class="required">*</span>
                              </label>
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
								<input type="text" id="tglPembelian" data-date-format="yyyy-mm-dd" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                              </div>
                            </div>
                          </div>-->
						  <div class="col-md-12">
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Pengajuan <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="tglPembelian" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65" required>
							</div>
						  </div>
                            <!--<div class="form-group">
                              <label class="control-label col-md-12" for="first-name">Tanggal<span class="required">*</span>
                              </label>
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
								<input type="text" id="tglPembelian" data-date-format="yyyy-mm-dd" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="25">
                              </div>
                            </div>-->
                          </div>
                        </div>
                    </form>
                  </div>

                 <div class="ln_solid"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered dataTable no-footer" id="table-transaksi_pembelianBarangKapal">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Nama Barang </th>
                        <th class="column-title">Jumlah</th>
                        <th class="column-title">Satuan</th>
                        <th class="column-title">Harga Satuan</th>
                        <th class="column-title">Harga Total</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>        
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                          <td><input type="text" id="namaBarang" required="required" class="form-control col-md-3 col-xs-12"  maxlength="65"></td>
                          <td><input type="text" id="jumlah" required="required" class="form-control col-md-3 col-xs-12 numeric" min=0></td>
                          <td><select class="form-control" id="idSatuan"></select></td>
                          <td><input type="text" id="hargaSatuan" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  min=0></td>
                          <td><input type="text" id="hargaTotal" required="required" class="form-control col-md-3 col-xs-12"  maxlength="65" readonly=""></td>
                          <td>
                             <button type="button" class="btn btn-sm btn-primary" id="simpanDetilPembelian_barangKapal"><i class="fa fa-plus"></i></button>
                          </td>
                      </tr>   
                    </tbody>
                  </table>
                </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="poPembelian">
          <button type="button" class="btn btn-primary" id="simpanPembelianBarangKapal">Simpan</button>
        </div>

      </div>
    </div>
  </div>