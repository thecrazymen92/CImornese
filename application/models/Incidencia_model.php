<?php
class Incidencia_model extends CI_Model { 
   public function __construct() {
      parent::__construct();
   }
   public function lista_incidencias(/*$nombre, $contrasena*/){
      /*
      $this->db->select('i.id_incidencia, CONCAT(ma.marca," - ",mo.modelo) as modelo, CONCAT(IF(e.id_espacio LIKE "%ocoñ%","O","C"),"-",e.piso,i.espacio_exacto) as posicion, i.descripcion, i.ticket, i.fecha');
      $this->db->from('incidencia i');
      $this->db->join('espacio e','e.id_espacio=i.id_espacio','inner');
      $this->db->join('dispositivo d','d.id_dispositivo=i.id_dispositivo','inner');
      $this->db->join('modelos mo','mo.id_modelo=d.id_modelo','inner');
      $this->db->join('marcas ma','ma.id_marca=mo.id_marca','inner');
      */
      $query='SELECT i.id_incidencia, CONCAT(ma.marca, " - ", mo.modelo) as modelo, CONCAT(IF(e.id_espacio LIKE "%ocoñ%", "O", "C"), "-", e.piso,i.espacio_exacto) as posicion, i.descripcion, i.ticket, i.fecha FROM incidencia i INNER JOIN espacio e ON e.id_espacio=i.id_espacio INNER JOIN dispositivo d ON d.id_dispositivo=i.id_dispositivo INNER JOIN modelos mo ON mo.id_modelo=d.id_modelo INNER JOIN marcas ma ON ma.id_marca=mo.id_marca';
      $resultado=$this->db->query($query);
      //$resultado = $this->db->get();
      //echo $consulta;
      //$resultado = $consulta->row();
      return $resultado;
   }
   public function grafico_incidencias_fecha($tipo,$fecha_ini,$fecha_fin){
      $type="xy";
      $filtro_fecha='DATE_FORMAT(i.fecha, "'.($tipo=="year"?"%y":($tipo=="month"?"%y-%m":"%y-%m-%d")).'")'; 
      $query='SELECT COUNT(i.id_incidencia) incidencias, '.$filtro_fecha.' as fechas
      FROM incidencia i 
         WHERE 1 
         '.($fecha_ini!="0" && $fecha_ini.lengh==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
         '.($fecha_fin!="0" && $fecha_fin.lengh==10?' AND i.fecha >= "'.$fecha_fin.'"':"").'
         GROUP BY '.$filtro_fecha.';';
      $resultado=$this->db->query($query);
      //$resultado->toArray;
      $returnArray = array('valores' => $resultado->result_array(), 'tipo' => $type, 'query' => $query);
      return $returnArray;
   }
   public function grafico_incidencias_area($fecha_ini,$fecha_fin,$areas){
      $query='SELECT COUNT(i.id_incidencia) cantidad, e.piso, e.direccion as areas
               FROM incidencia i 
                  INNER JOIN espacio e ON e.id_espacio=i.id_espacio 
                  WHERE 1 
                  '.($fecha_ini!="0" && $fecha_ini.lengh==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
                  '.($fecha_fin!="0" && $fecha_fin.lengh==10?' AND i.fecha >= "'.$fecha_fin.'"':"").'
                  '.($areas!="0"?' AND " '.$areas.' " LIKE CONCAT("%",direccion,"%")':"").'
                  GROUP BY e.id_espacio';
      $resultado=$this->db->query($query);
      //$resultado->toArray;
      $returnArray = array('valores' => $resultado->result_array(), 'query' => $query);
      return $returnArray;
   }
   public function motivos_incidencias($fecha_ini,$fecha_fin,$areas){
      $query='SELECT ti.incidencia as motivos, COUNT(ti.id_tipo_incidencia) as cantidad 
               FROM incidencia i 
                  INNER JOIN espacio e ON e.id_espacio=i.id_espacio 
                  INNER JOIN dispositivo d ON d.id_dispositivo=i.id_dispositivo 
                  INNER JOIN modelos mo ON mo.id_modelo=d.id_modelo 
                  INNER JOIN marcas ma ON ma.id_marca=mo.id_marca
                  INNER JOIN tipo_incidencia ti ON ti.id_tipo_incidencia=i.id_tipo_incidencia
                  WHERE 1
                  '.($fecha_ini!="0" && $fecha_ini.lengh==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
                  '.($fecha_fin!="0" && $fecha_fin.lengh==10?' AND i.fecha >= "'.$fecha_fin.'"':"").'
                  '.($areas!="0"?' AND " '.$areas.' " LIKE CONCAT("%",direccion,"%")':"").'
                  GROUP BY ti.incidencia';
      $resultado=$this->db->query($query);
      //$resultado->toArray;
      $returnArray = array('valores' => $resultado->result_array(), 'query' => $query);
      return $returnArray;
   }
   public function incidencia_area_mes($fecha_ini,$fecha_fin,$areas){
      $query='SELECT COUNT(i.id_incidencia) as cantidad, e.direccion, DATE_FORMAT(i.fecha,"%y-%m") as fecha
               FROM incidencia i 
                  INNER JOIN espacio e ON e.id_espacio=i.id_espacio 
                  WHERE 1
                  '.($fecha_ini!="0" && $fecha_ini.lengh==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
                  '.($fecha_fin!="0" && $fecha_fin.lengh==10?' AND i.fecha >= "'.$fecha_fin.'"':"").'
                  '.($areas!="0"?' AND " '.$areas.' " LIKE CONCAT("%",direccion,"%")':"").'
                  GROUP BY e.direccion, DATE_FORMAT(i.fecha,"%y-%m")';
      $resultado=$this->db->query($query);
      //$resultado->toArray;
      $returnArray = array('valores' => $resultado->result_array(), 'query' => $query);
      //var_dump($resultado->result_array());
      return $returnArray;
   }
}
/*
SELECT CONCAT(ma.marca," - ",mo.modelo) as modelo, CONCAT(IF(e.id_espacio LIKE "%ocoñ%","O","C"),"-",e.piso,i.espacio_exacto) as posicion, i.descripcion, i.ticket, i.fecha
FROM incidencia i 
INNER JOIN espacio e ON e.id_espacio=i.id_espacio
INNER JOIN dispositivo d ON d.id_dispositivo=i.id_dispositivo
INNER JOIN modelos mo ON mo.id_modelo=d.id_modelo
INNER JOIN marcas ma ON ma.id_marca=mo.id_marca
*/