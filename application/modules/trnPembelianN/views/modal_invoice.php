<div class="modal fade bs-example-modal-lg modalInvoice" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1385px;  margin-left: -205px">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Input Invoice</h4>
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
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No SO <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="noSO" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tgl. Invoice <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="tglInvoice" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bill To <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="billTo" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="billToAlamat" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ship To <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="shipTo" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="shipToAlamat" required="required" class="form-control col-md-7 col-xs-12"  maxlength="255">
                              </div>
                            </div>
                          </div>
						  <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PPh22 <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" id="PPh22" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                              </div>
                            </div>
                          </div>
						  <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rabat <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" id="Rabat" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                              </div>
                            </div>
                          </div>
						 
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vessel Name <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="vesselName" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rounding <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" id="Pembulatan" required="required" class="form-control col-md-7 col-xs-12 numeric amount"  min=0>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sales Person <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="salesPerson" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">P.O.# <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="poNumber" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shipment Date <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="shipmentDate" required="required" class="form-control col-md-7 col-xs-12 date"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shipment VIA <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="shipVIA" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">F.O.B<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="FOB" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Terms <span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="terms" required="required" class="form-control col-md-7 col-xs-12"  maxlength="65">
                              </div>
                            </div>
                          </div>
                          </div>
                    </form>
                  </div>

                 <div class="ln_solid"></div>
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered dataTable no-footer" id="table-transaksi">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">Item </th>
                        <th class="column-title">Description</th>
                        <th class="column-title">Qty</th>
                        <th class="column-title">UoM</th>
                        <th class="column-title">Unit Price</th>
                        <th class="column-title">Total</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>        
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                          <td><input type="text" id="itemInvoice" required="required" class="form-control col-md-3 col-xs-12"  maxlength="65"></td>
                          <td><input type="text" id="descInvoice" required="required" class="form-control col-md-3 col-xs-12"  maxlength="65"></td>
                          <td><input type="text" id="qtyInvoice" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  maxlength="65"></td>
                          <td><input type="text" id="uomInvoice" required="required" class="form-control col-md-3 col-xs-12"  maxlength="65"></td>
                          <td><input type="text" id="priceInvoice" required="required" class="form-control col-md-3 col-xs-12 amount numeric"  ></td>
                          <td><input type="text" id="totalInvoice" required="required" class="form-control col-md-3 col-xs-12"  maxlength="65" readonly=""></td>
                          <td>
                             <button type="button" class="btn btn-sm btn-primary" id="simpanDetail"><i class="fa fa-plus"></i></button>
                          </td>
                      </tr>   
                    </tbody>
                  </table>
                </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="poPembelian">
          <button type="button" class="btn btn-primary" id="simpanInvoice">Simpan</button>
        </div>

      </div>
    </div>
  </div>