
<div id="popup-form">
  <div class="col-md-12 nopadding">
  <div class="col-md-12 head">
  <h2 class="col-md-12">Agregar incidencia</h2>
  </div>
  <div class="col-md-12 body">



  <div class="col-md-6">

  <label for="dispositivo" class="col-md-4">Etiqueta</label>
  <select id="dispositivo" for="dispositivo" class="col-md-8">
  <option value="--" modelo="seleccionar dispositivo" marca="seleccionar dispositivo">--</option>
    <?php 
        if(gettype($valores["dispositivos"])=="array"){
            foreach ($valores["dispositivos"] as $dispositivo) {
                echo '<option value="'.$dispositivo["id_dispositivo"].'" modelo="'.$dispositivo["modelo"].'" marca="'.$dispositivo["marca"].'">'.$dispositivo["etiqueta"].'</option>';
            }
        }
    ?>
  
  </select>
  </div>

  <div class="col-md-6">

  <label for="modelo" class="col-md-4">Modelo</label>
  <input id="modelo" for="modelo" value="--" class="col-md-8" disabled="">
  </div><div class="col-md-6">

  <label for="marca" class="col-md-4">Marca</label>
  <input id="marca" for="marca" value="--" class="col-md-8" disabled="">
  </div>
  <div class="col-md-6">

    <label for="campana" class="col-md-4">Campaña</label>
    <select id="campana" for="campana" class="col-md-8">
    <?php 
        if(gettype($valores["campanas"])=="array"){
            foreach ($valores["campanas"] as $campana) {
                echo '<option value="'.$campana["id_campana"].'">'.$campana["nombre"].'</option>';
            }
        }
    ?>
    </select>
    </div>

  <div class="col-md-6">

  <label for="espacio" class="col-md-4">Espacio</label>
  <select id="espacio" for="espacio" class="col-md-8">
    <?php 
        if(gettype($valores["espacios"])=="array"){
            foreach ($valores["espacios"] as $espacio) {
                echo '<option value="'.$espacio["id_espacio"].'">'.$espacio["direccion"].'</option>';
            }
        }
    ?>
  </select>
  </div>
  <div class="col-md-6">

  <label for="posicion" class="col-md-4">Posicion</label>
  <div id="posicionex" class="col-md-2" style="color: #fff;margin: 5px;/* width:  calc(16.66% - 10px); */">C-5</div>
  <input id="posicion" for="posicion" class="col-md-6" type="number">

  <script>
      /*
        function llenaposiciones(){
              $.ajax({
                type: "GET",
                url: "<?php echo base_url();?>posiciones/"+$("#espacio :checked").val(),
                dataType: "json",
                cache   : false,
                success: function(data){
                    console.log(data);
                  posiciones=Object.values(data.posiciones);
                  htmlpos="";
                  for (var i = 0 ; i < posiciones.length; i++) {
                    htmlpos+='<option value="'+posiciones[i]["id_espacio"]+'">'+posiciones[i]["posicion"]+'</option>';
                  }
                  $("#posicion").html(htmlpos);
                } ,error: function(xhr, status, error) {
                  console.log(status);
                },
              });
        }
            llenaposiciones();
          $("#espacio").change(function(){llenaposiciones();});
        */
      $("#espacio").change(function(){
        texto=$("#espacio option:checked").text();
        console.log(texto);
        tamañotexto=texto.length;
        $("#posicionex").text(texto.substr(0,1)+"-"+texto.substr(tamañotexto-1,tamañotexto));
        });
      $("#dispositivo").change(function () {
          $("#modelo").val($("#dispositivo option:checked").attr("modelo"));
            $("#marca").val($("#dispositivo option:checked").attr("marca"));
      });
  </script>
  </div>
  <div class="col-md-6">

  <label for="tipo_incidencia" class="col-md-4">Motivo</label>
  <select id="tipo_incidencia" for="tipo_incidencia" class="col-md-8">

    <?php 
        if(gettype($valores["incidencias"])=="array"){
            foreach ($valores["incidencias"] as $incidencia) {
                echo '<option value="'.$incidencia["id_tipo_incidencia"].'">'.$incidencia["incidencia"].'</option>';
            }
        } 
    ?>
  </select>
  </div><div class="col-md-6">

  <label for="ticket" class="col-md-4">Ticket</label>
  <input id="ticket" for="Ticket" class="col-md-8">
  </div>

  </div>
  <div class="col-md-12 footer">

  <div class="col-md-2"><label></label><button id="popup-submit" class="btn btn-lg btn-danger">Guardar</button></div><div class="col-md-2"><label></label><button id="cancel" class="btn btn-lg btn-danger">Cancelar</button></div><div class="col-md-8">
  <label for="popup-form-area" class="col-md-12">Descripcion</label><textarea id="popup-form-area" class="col-md-12"></textarea>
  </div>

  </div>
  </div>
</div>