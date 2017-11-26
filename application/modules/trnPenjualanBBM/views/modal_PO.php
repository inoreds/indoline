  <div class="modal fade bs-example-modal-lg modalInput" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1280px;  margin-left: -70px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">PO Customer</h4>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No PO Customer <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noPO" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Invoice <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="noInvoice" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Invoice <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tglPO" required="required" class="form-control col-md-7 col-xs-12 date">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idCustomer">
                             </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ppn / Non <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="ppn" readonly="">
                                <option value="ppn">PPN</option>  
                                <option value="nonPPN">Non PPN</option>  
                             </select>
                          </div>
                      </div>
                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Wilayah <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="idKotaPO">
                             </select>
                          </div>
                      </div> -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PBBKB<span class="required">*</span>
                        </label>
                        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pbbkb" required="required" class="form-control col-md-7 col-xs-12" readonly>
                        </div> -->
                        <div class="col-md- col-sm-6 col-xs-12">
                                <select class="form-control" id="idPBBKB">
                             </select>
                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lokasi Pengiriman<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="lokasiPengiriman" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapal di Supply<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namaKapal" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jatuh Tempo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jatuhTempo" required="required" class="form-control col-md-7 col-xs-12 date">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MBA/OAT <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="MBAOAT">
                                <option value="MBA">MBA</option>  
                                <option value="OAT">OAT</option>
                                <!-- <option value="MBA/OAT">Pemakaian Sendiri</option> -->
                                <option value="MBA/OAT">Lainnya</option>
                             </select>
                          </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan Tambahan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Persyaratan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank <span class="required">*</span>
                        </label>
                        <div class="col-md- col-sm-6 col-xs-12">
                             <select class="form-control" id="bank">
                                <option value="MANDIRI">Bank MANDIRI</option>  
                                <option value="BCA">Bank BCA</option>  
                                <option value="BNI">Bank BNI</option>
								<option value="BRI">Bank BRI</option>
								<option value="DANAMON">Bank DANAMON</option>   
                             </select>
                          </div>
                      </div>
                     
                  <div class="ln_solid"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered dataTable no-footer" id="table-transaksi_penjualan">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Tgl Supply Awal</th>
                        <th class="column-title">Tgl Supply Akhir</th>
                        <th class="column-title">Lokasi Supply</th>
                        <th class="column-title">Barang</th>
                        <th class="column-title">Jumlah</th>
                        <th class="column-title">Harga</th>
                        <th class="column-title">Sub Total</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>        
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                          <td><input type="text" id="tglSupplyPenjualan" required="required" class="form-control col-md-3 col-xs-12 date"></td>
                          <td><input type="text" id="tglSupplyPenjualanAkhir" required="required" class="form-control col-md-3 col-xs-12 date"></td>
                          <td><input type="text" id="lokasi" required="required" class="form-control col-md-3 col-xs-12"></td>
                          <td> <select class="form-control idBBM" id="barangPenjualanBBM"></select></td>
                          <td><input type="text" id="jumlahPenjualan" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  maxlength="65"></td>
                          <td><input type="text" id="hargaPenjualan" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  ></td>
                          <td><input type="text" id="subTotalPenjualan" required="required" class="form-control col-md-3 col-xs-12 readonly amount numeric"  maxlength="65"></td>
                          <td>
                             <button type="button" class="btn btn-sm btn-primary" id="simpanDetailPenjualan"><i class="fa fa-plus"></i></button>
                          </td>
                      </tr>   
                    </tbody>
                  </table>
                </div>
                    </form>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="simpanPOPenjualanBBM">Simpan</button>
        </div>

      </div>
    </div>
</div>
<script>
jQuery(document).ready(function($) {
$this->load->library('form_validation');});
</script>
