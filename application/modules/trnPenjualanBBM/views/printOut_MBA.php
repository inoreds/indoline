<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-12 invoice-header" style="margin-bottom: 25px;">
        <h1 style="text-align: center;">
          <small style="font-size: 25px;font-weight: bold;">RECEIPT FOR BUNKER</small>
        </h1>
        <h1>
            <small style="font-size: 18px;">MOBILE BUNKER AGENT (MBA)</small>
        </h1>
      </div>
      <p></p>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">Received for use as bunkers, together with a representative smaple, on board the</label>
            </div>
        </div>  
        <br>
        <div class="row">
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">s.s / m.v :</label>
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3" for="first-name"><?php echo $dt->SSMV; ?></label>
          </div>
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">Date :</label>
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3" for="first-name"><?php echo $dt->DateMBA; ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
          </div>
          <div class="col-xs-6">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">Port :</label>
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3" for="first-name"><?php echo $dt->PortMBA; ?></label>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-8">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">The quality of LITER OBS</label>
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3" for="first-name"><?php echo  number_format($dt->LiterOBS,0,".","."); ?></label>
          </div>
         <div class="col-xs-4">
            <label class="control-label col-md-6" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">ex (Lighter *, Installation *)</label>
           
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8">
            
          </div>
         <div class="col-xs-4">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-3">*) Delete whichever Not Applicable</label>
           
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Grade of oil <?php echo $dt->GradeOfOil; ?> Temperatur of oil  <?php echo $dt->Temperatur_F; ?> &deg;F ( <?php echo $dt->Temperatur_C; ?> &deg;C)</label>
           
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Spcific Grafity <?php echo $dt->SpecificGravity; ?> @ <?php echo $dt->SpecificGravity_F; ?>  &deg;F) <?php echo $dt->SpecificGravity_C; ?>  &deg;C) Specific Grafity @60F (15 &deg;C) <?php echo $dt->SpecificGravity60_C; ?></label>
           
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Flashpoint   <?php echo $dt->FlashPoint; ?>  OF (<?php echo $dt->FlashPoint_C; ?> &deg;C) Water <?php echo $dt->Water; ?></label>
           
          </div>
        </div>
        <br>
        <div class="row" style="margin-bottom: 80px;">
          <div class="col-xs-12">
            <label class="control-label col-md-12" style="font-size: 18px;font-family: serif;font-weight: 100;" class="control-label col-md-12">Aproximate viscosity (Redwood No. 1 @ 100 &deg; F) <?php echo $dt->Aproximate; ?> Seconds</label>
           
          </div>
        </div>
        
        <div class="row">
          <div class="col-xs-5" style="text-align: center;">
            <label class="control-label" style="font-size: 18px;font-family: serif;font-weight: 100;"><?php echo $dt->NamaPengawas; ?></label>    
          </div>
          <div class="col-xs-2">
          </div>
          <div class="col-xs-5" style="text-align: center;">
            <label class="control-label" style="font-size: 18px;font-family: serif;font-weight: 100;"><?php echo $dt->ChiefEnginer; ?></label>    
          </div>
        </div>
        <div class="row">
          <div class="col-xs-5" style="text-align: center;">
            <label class="control-label" style="font-size: 18px;font-family: serif;font-weight: 100;"></label>    
          </div>
          <div class="col-xs-2">
          </div>
          <div class="col-xs-5" style="text-align: center;">
            <label class="control-label" style="font-size: 18px;font-family: serif;font-weight: 100;">Chief Of Engineer / Cargo Officer</label>    
          </div>
        </div>
        
  </div>
