<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-12 invoice-header" style="margin-bottom: 25px;">
        <h1 style="text-align: center;">
          <small style="font-size: 25px;font-weight: bold;">RECEIPT FOR BUNKER</small>
        </h1>
      </div>
      <p></p>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;">No. PNBP PE <?php echo $dt->NoPNBP; ?> Tgl <?php echo $dt->TglPNBP; ?> No. Ba <?php echo $dt->NoBA; ?> Tgl <?php echo $dt->TglBA; ?> </label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;">Received for use as bunkers, together with a representative sample, on board the</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
          </div>
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">No. RFP : <?php echo $dt->NoRFP; ?></label>
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3"><?php echo $dt->PortMBT; ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">s.s / m.v :</label>
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3"><?php echo $dt->VesselName; ?></label>
          </div>
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">Date :</label>
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3"><?php echo $dt->DateMBT; ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
          </div>
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">Port :</label>
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3"><?php echo $dt->PortMBT; ?></label>
          </div>
        </div>
      
         <div class="row">
          <div class="col-xs-4">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">The Quantity Of</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
          </div>
          <div class="col-xs-4">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">ENGLISH TONS : <?php echo $dt->EnglishTonsQuantity; ?></label>
          </div>
        </div>
         <div class="row">
          <div class="col-xs-4">
          </div>
          <div class="col-xs-4">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">METRIC TONS : <?php echo $dt->MetricTonsQuantity; ?></label>
          </div>
        </div>
         <div class="row">
          <div class="col-xs-4">
          </div>
          <div class="col-xs-4">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">LITRES TONS : <?php echo $dt->LitresQuantity; ?></label>
          </div>
        </div>
         <div class="row">
          <div class="col-xs-4">
          </div>
          <div class="col-xs-4">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-3">BARRELS (U.S) : <?php echo $dt->BarrelsUSQuantity; ?></label>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Grade of oil <?php echo $dt->GradeOfOil; ?> Temperatur of oil  <?php echo $dt->Temperatur_F; ?> &deg;F ( <?php echo $dt->Temperatur_C; ?> &deg;C)</label>
           
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Spcific Grafity <?php echo $dt->SpecificGravity; ?> @ <?php echo $dt->SpecificGravity_F; ?>  &deg;F) <?php echo $dt->SpecificGravity_C; ?>  &deg;C) Specific Grafity @60F (15 &deg;C) <?php echo $dt->SpecificGravity60_C; ?></label>
           
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Flashpoint   <?php echo $dt->FlashPoint; ?>  OF (<?php echo $dt->FlashPoint_C; ?> &deg;C) Water <?php echo $dt->Water; ?></label>
           
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 14px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Aproximate viscosity (Redwood No. 1 @ 100 &deg; F) <?php echo $dt->Aproximate; ?> Seconds</label>
           
          </div>
        </div>
       
        
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;"><?php echo $dt->NamaPengawas; ?></label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;"><?php echo $dt->ChiefEnginer; ?></label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;"><?php echo $dt->NamaMaster; ?></label>    
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;"></label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;">Chief Of Engineer / Cargo Officer</label>    
          </div>
            <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;">Master</label>    
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;">Acknowledge by / Mengetahui</label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;">Pws. Bunker Service,</label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;">Instalasi Surabaya Group</label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <label class="control-label" style="font-size: 14px;font-family: serif;font-weight: 100;"><?php echo $dt->Mengetahui; ?></label>    
          </div>
          <div class="col-xs-4" style="text-align: center;">
            
          </div>
        </div>

        
  </div>
