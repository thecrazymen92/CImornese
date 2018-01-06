<div id="popup-form">
  <div class="col-md-12 nopadding">
    <div class="col-md-12 head">
      <h2 class="col-md-12">Nuevo modelo</h2>
    </div>
    <div class="col-md-12 body">
      <div class="col-md-6">
        <label for="modelo" class="col-md-4">Modelo</label>
        <input id="modelo" for="modelo" class="col-md-8">
      </div>
      <div class="col-md-6">
        <label for="marca" class="col-md-4">Marca</label>
        <select id="marca" for="marca" class="col-md-8">
          <?php 
              if(gettype($valores["marcas"])=="array"){
                  foreach ($valores["marcas"] as $marcas) {
                      echo '<option value="'.$marcas["id_marca"].'">'.$marcas["marca"].'</option>';
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