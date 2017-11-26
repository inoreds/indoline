<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="alert alert-danger alert-dismissible" role="alert" id="warningMstKapal" style="display: none;">
                      <a class="close" onclick="$('#warningMstKapal').hide()">×</a>  
                      </button>
                      <strong>Data Tidak Bisa disimpan!</strong> Silahkan Isi Field Yang masih Kosong.
                    </div>
                       <input id="status" name="status" class="form-control col-md-7 col-xs-12" type="hidden">
                        
                        <?php foreach($dataTable as $dt){ ?>
                            <div class="form-group">
                              <label class="control-label col-sm-3" for="first-name">Vessel Name <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->VesselName; ?>
                              </label>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Call Sign <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->CallSign; ?>
                              </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Type Ship <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->TypeShip; ?>
                               </label>
                            </div>
                          

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Flag <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->Flag; ?>
                             </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Build <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->Build; ?>
                             </label>
                            </div>
                          

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Build Year <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->BuildYear; ?>
                           </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Classification <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->Classification; ?>
                             </label>
                            </div>
                          

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Gross Tonnage <span class="required">:</span>
                              </label>
                             
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->GrossTonnage; ?>
                             </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Net Tonnage <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->NetTonnage; ?>
                           </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Dead Weight <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->DeadWeightGrossTonnage; ?>
                             </label>
                            </div>
                          

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">LOA 1 <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->LOA1; ?>
                             </label>
                            </div>
                          
                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">LOA 2 <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->LOA2; ?>
                                </label>
                            </div>
                         
                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Length Between <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->LengthBetweenPerpediculart; ?>
                                </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Breadth Moulded <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->BreadthMoulded; ?>
                                </label>
                            </div>
                        

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Dept Moulded <span class="required">:</span>
                              </label>
                               <label class="control-label col-sm-3" for="first-name"><?php echo $dt->DeptMoulded; ?>
                               </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Design Draft <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->DesignDraft; ?>
                               </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Number Of Tank <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->NumberOfTank; ?>
                               </label>
                            </div>
                          
                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Cargo Tank Material <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->CargoTankMaterial; ?>
                               </label>
                            </div>
                          

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Cargo Tank Capacity <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->CargoTankCapacity; ?>
                               </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Fresh Water Capacity <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->FreshWaterCapacity; ?>
                               </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Main Engine <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->MainEngine; ?>
                               </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Auxilary Engine <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->AuxilaryEngine; ?>
                               </label>
                            </div>
                         

                            <div class="form-group">
                              <label class="control-label col-md-3" for="first-name">Mesin Generator <span class="required">:</span>
                              </label>
                              <label class="control-label col-sm-3" for="first-name"><?php echo $dt->MesinGenerator; ?>
                               </label>
                            </div>
                          
                            </div>
                          
                         <?php } ?>
                    </form>