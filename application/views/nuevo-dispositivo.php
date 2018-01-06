<div id="popup-form">
  <div class="col-md-12 nopadding">
    <div class="col-md-12 head">
      <h2 class="col-md-12">Nuevo dispositivo</h2>
    </div>
    <div class="col-md-12 body">
      <div class="col-md-6">
        <label for="dispositivo" class="col-md-4">Etiqueta</label>
        <input id="dispositivo" for="dispositivo" class="col-md-8">
      </div>
      <div class="col-md-6">
        <label for="modelo" class="col-md-4">Modelo</label>
        <select id="modelo" for="modelo" class="col-md-8">
          <?php 
              if(gettype($valores["modelos"])=="array"){
                  foreach ($valores["modelos"] as $modelos) {
                      echo '<option value="'.$modelos["id_modelo"].'">'.$modelos["modelo"].'</option>';
                  }
              }
          ?>
        </select>
      </div>
    </div>
    <div class="col-md-12 footer">
      <div class="col-md-2">
        <label></label>
        <button id="popup-submit" class="btn btn-lg btn-danger">Guardar</button>
      </div>
      <div class="col-md-2">
        <label></label>
        <button id="cancel" class="btn btn-lg btn-danger">Cancelar</button>
      </div>
    </div>
  </div>
</div>