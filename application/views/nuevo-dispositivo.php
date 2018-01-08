<div id="popup-form">
  <div class="col-md-12 nopadding">
    <div class="col-md-12 head">
      <h2 class="col-md-12">Nuevo dispositivo</h2>
    </div>
    <div class="col-md-12 body multi-add">
    <fieldset class="dispositivo">
    <legend>Agregar dispositivo</legend>
    <div class="col-md-5">
        <label for="dispositivo" class="col-md-4">Etiqueta</label>
        <input id="dispositivo" for="dispositivo" class="col-md-8">
      </div>
      <div class="col-md-5">
        <label for="keymodelo" class="col-md-4">Modelo</label>
        <select id="keymodelo" for="keymodelo" class="col-md-8">
          <?php 
              if(gettype($valores["modelos"])=="array"){
                  foreach ($valores["modelos"] as $modelos) {
                      echo '<option value="'.$modelos["id_modelo"].'">'.$modelos["modelo"].'</option>';
                  }
              }
          ?>
        </select>
      </div>
<button class="col-md-2 btn btn-success"><i class="glyphicon glyphicon-plus"></i>Agregar</button>
    </fieldset>
    <fieldset class="modelo">
    <legend>Agregar modelo</legend>
      <div class="col-md-5">
        <label for="modelo" class="col-md-4">Modelo</label>
        <input id="modelo" for="modelo" class="col-md-8">
      </div>
      <div class="col-md-5">
        <label for="keymarca" class="col-md-4">Marca</label>
        <select id="keymarca" for="keymarca" class="col-md-8">
          <?php 
              if(gettype($valores2["marcas"])=="array"){
                  foreach ($valores2["marcas"] as $marcas) {
                      echo '<option value="'.$marcas["id_marca"].'">'.$marcas["marca"].'</option>';
                  }
              }
          ?>
        </select>
      </div>
      <button class="col-md-2 btn btn-success"><i class="glyphicon glyphicon-plus"></i>Agregar</button>
    
    </fieldset>
    <fieldset class="marca">
    <legend>Agregar marca</legend>
      <div class="col-md-5">
        <label for="marca" class="col-md-4">Marca</label>
        <input id="marca" for="marca" class="col-md-8">
      </div>
      <div class="col-md-5">
      </div><button class="col-md-2 btn btn-success"><i class="glyphicon glyphicon-plus"></i>Agregar</button>
    
    </fieldset>
    </div>
    <div class="col-md-12 footer">
      
      <div class="col-md-2">
        <button id="cancel" class="btn btn-lg btn-danger">Cerrar</button>
      </div>
    </div>
  </div>
</div>
