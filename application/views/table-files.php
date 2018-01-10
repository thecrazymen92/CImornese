<?php 
$html="";
if(gettype($valores["incidencias"])=="array"){
	foreach ($valores["incidencias"] as $incidencia) {
		$html=$html.'<tr incidencia-id="'.$incidencia["id_incidencia"].'" dispositivo="'.$incidencia["id_dispositivo"].'">
		<div class="tooltip tr-tooltip">'.$incidencia["descripcion"].'</div>
		<td>Mornese - '.$incidencia["etiqueta"].'</td>
		<td>'.$incidencia["modelo"].'</td>
		<td>'.$incidencia["campana"].'</td>
		<td>'.$incidencia["posicion"].'</td>
		<td>'.$incidencia["incidencia"].'</td>
		<td>'.$incidencia["fecha"].'</td>
		<td>'.$incidencia["ticket"].'</td>
		<td> <button class="btn btn-xs btn-danger editar">Editar</button> </td>
		</tr>';
	}
}
echo $html;
if(count($valores["incidencias"])>0){
?>
<tr style="display: none;"><td>
	<script>
		countertr=<?php echo count($valores["incidencias"]); ?>;
		for (var i = 1; i <= countertr; i++) {
			$(".table-responsive tbody tr:nth-child("+countertr+")").click(function(){
      selectedincidencia=$(this).parent().parent().attr("incidencia-id");
      keydispositivo=$(this).parent().parent().attr("dispositivo");
      console.log(selectedincidencia);
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>editar",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
              $("#dispositivo").val(keydispositivo).trigger('change');
              espaciox=$("[incidencia-id="+selectedincidencia+"] td:nth-child(4)").text();
              $("#espacio option:contains('"+(espaciox.substring(0,1)=="C"?"camana":"ocoña")+espaciox.substring(2,3)+"')").each(function(){$(this).parent().val($(this).val());});
              $("#tipo_incidencia").each(function(){$(this).val($(this).find("option:contains('"+$("[incidencia-id="+selectedincidencia+"] td:nth-child(5)").val()+"')").val());});
              $("#ticket").val($("[incidencia-id="+selectedincidencia+"] td:nth-child(7)").text());
              $("#popup-form-area").val($("[incidencia-id="+selectedincidencia+"] td:nth-child(5)").text());
              // $('#espacio option:checked').val()
              // $('#posicion option:checked').text()
              // $('#tipo_incidencia option:checked').val()
              // $('#ticket').val()
              $('#popup-form-area').val()
          $("#popup-submit").click(function(){
        var dataString  = { id_incidencia : selectedincidencia, 
                            dispositivo : $('#dispositivo option:checked').val(), 
                            espacio : $('#espacio option:checked').val(), 
                            posicion : $('#posicion option:checked').text(),
                            tipo_incidencia : $('#tipo_incidencia option:checked').val(),
                            ticket : $('#ticket').val(),
                            descripcion : $('#popup-form-area').val(),
                            campana : $('#campana').val() };
        console.log(dataString.dispositivo);
        if (dataString.dispositivo=="--" | dataString.ticket=="") {alert("faltan campos por llenar: "+(dataString.dispositivo=="--"?"elegir dispositivo, ":"")+(dataString.ticket=="--"?"llenar ticket dispositivo, ":(dataString.ticket.length<16?"ticket invalido, revisar ticket, ":"")));}
        else{
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>edit",
            dataType: "html",
            data:dataString,
            cache   : false,
            success: function(data){
              console.log(data);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });$("#popup-form").remove();
        }
          });
          $("#cancel").click(function(){$("#popup-form").remove();});
          //console.log(data);
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });
		}
	</script>
	</td></tr>
	<?php } ?>