<?php 
if(gettype($valores["incidencias"])=="array"){
	foreach ($valores["incidencias"] as $incidencia) {
		echo '<tr incidencia-id="'.$incidencia["id_incidencia"].'" dispositivo="'.$incidencia["id_dispositivo"].'">
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
?>