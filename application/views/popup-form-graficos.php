
<div id="popup-form">
  <div class="col-md-12 nopadding">
  <div class="col-md-12 head">
  <h2 class="col-md-12">Configuración de dashboard</h2>
  </div>
  <div class="col-md-12 body graficos">


<?php //var_dump($opciones);
$fecha = new DateTime();
$fecha->modify('-1 day');
$hoy = $fecha->format('Y-m-d');
$fecha->modify('-1 month');
$mespasado=$fecha->format('Y-m-d');
if($opciones["chartid"]=="1"){ ?>
  <div class="col-md-3">
    <label class="col-md-12 center" style="">Ver por:</label>
    <div class="col-md-12 flex-margins">
      <input id="radio1" value="day" name="escala" type="radio" class="col-md-2">
      <label class="col-md-10" for="radio1" style="">Días</label>
    </div>
    <div class="col-md-12 flex-margins">
      <input id="radio2" value="month" name="escala" type="radio" class="col-md-2">
      <label class="col-md-10" style="" for="radio2">Meses</label>
    </div>
    <div class="col-md-12 flex-margins">
      <input id="radio3" value="year" name="escala" type="radio" class="col-md-2">
      <label class="col-md-10" style="" for="radio3">Años</label>
    </div>
  </div>
<?php } ?>
  <div class="col-md-8">
    <label class="col-md-12 center" for="input2">Rango:</label>
    <label for="input2" class="col-md-2" style="">Inicio</label>
    <input for="input2" type="date" value="<?php echo $mespasado; ?>" class="col-md-4">
    <label for="input3" class="col-md-2" style="">Fin</label>
    <input for="input3" type="date" value="<?php echo $hoy; ?>" class="col-md-4">
  </div>


<?php if($opciones["chartid"]=="2" | $opciones["chartid"]=="3" | $opciones["chartid"]=="4"){
  if(gettype($valores)=="array"){?>
  <div class="col-md-4">
    <label class="col-md-12 center">Clasificación</label>
  <?php
    foreach ($valores["valores"] as $valor) {//var_dump($valores);
      ?>
      <div class="col-md-12 flex-margins">
        <input id="radio1" data-id="<?php echo $valor["id"]; ?>" name="clasificacion" type="checkbox" class="col-md-2">
        <label class="col-md-10" for="radio1"><?php echo $valor["valor"]; ?></label>
      </div>
      <?php
    }
  ?>
  </div>
<?php }} ?>



  </div>
  <div class="col-md-12 footer graficos">

  <div class="col-md-2"><label></label><button id="popup-submit" class="btn btn-lg btn-danger">Guardar</button></div><div class="col-md-2"><label></label><button id="cancel" class="btn btn-lg btn-danger">Cancelar</button></div>

  </div>
  </div>
</div>