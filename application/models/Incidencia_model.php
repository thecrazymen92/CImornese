<?php
class Incidencia_model extends CI_Model { 
   public function __construct() {
      parent::__construct();
   }
   public function lista_incidencias(){
      $query='SELECT i.id_incidencia, d.etiqueta, CONCAT(ma.marca, " - ", mo.modelo) as modelo, CONCAT(IF(e.direccion LIKE "%ocoñ%", "O", "C"), "-", e.piso,i.espacio_exacto) as posicion, i.descripcion, i.ticket, i.fecha FROM incidencia i INNER JOIN espacio e ON e.id_espacio=i.id_espacio INNER JOIN dispositivo d ON d.id_dispositivo=i.id_dispositivo INNER JOIN modelos mo ON mo.id_modelo=d.id_modelo INNER JOIN marcas ma ON ma.id_marca=mo.id_marca
         WHERE i.fecha>=DATE_SUB(NOW(),INTERVAL 2 MONTH)
         ORDER BY i.fecha DESC';
      $resultado=$this->db->query($query);
      return $resultado;
      }
   public function modelos(/*$nombre, $contrasena*/){
      $query='SELECT * FROM modelos;';
      $resultado=$this->db->query($query);
      $returnArray = array('modelos' => $resultado->result_array());
      return $returnArray;
      }
   public function marcas(/*$nombre, $contrasena*/){
      $query='SELECT * FROM marcas;';
      $resultado=$this->db->query($query);
      $returnArray = array('marcas' => $resultado->result_array());
      return $returnArray;
      }
   public function add_dispositivo($etiqueta,$modelo){
      $this->db->set('id_dispositivo', 'NULL', FALSE);
      $this->db->set('etiqueta', $etiqueta, TRUE);
      $this->db->set('id_modelo', $modelo, FALSE);
      $this->db->insert('dispositivo');
      if ($this->db->affected_rows() == '1') {
          echo "ok";
      } else {
         echo "error";
      }
      }
   public function add_modelo($marca,$modelo){
      $this->db->set('id_modelo', 'NULL', FALSE);
      $this->db->set('id_marca', $marca, FALSE);
      $this->db->set('modelo', $modelo, TRUE);
      $this->db->insert('modelos');
      if ($this->db->affected_rows() == '1') {
          echo "ok";
      } else {
         echo "error";
      }
      }
   public function add_marca($marca){
      $this->db->set('id_marca', 'NULL', FALSE);
      $this->db->set('marca', $marca, TRUE);
      $this->db->insert('marcas');
      if ($this->db->affected_rows() == '1') {
          echo "ok";
      } else {
         echo "error";
      }
      }
   public function add_motivo($motivo){
      $this->db->set('id_tipo_incidencia', 'NULL', FALSE);
      $this->db->set('incidencia', $motivo, TRUE);
      $this->db->insert('tipo_incidencia');
      if ($this->db->affected_rows() == '1') {
          echo "ok";
      } else {
         echo "error";
      }
      }
   public function add_incidencia($dispositivo, $espacio, $posicion, $tipo_incidencia, $ticket, $descripcion){
      $this->db->set('id_incidencia', 'NULL', FALSE);
      $this->db->set('id_espacio', $espacio, FALSE);
      $this->db->set('espacio_exacto', $posicion, TRUE);
      $this->db->set('id_dispositivo', $dispositivo, FALSE);
      $this->db->set('ticket', $ticket, TRUE);
      $this->db->set('id_tipo_incidencia', $tipo_incidencia, FALSE);
      $this->db->set('descripcion', $descripcion, TRUE);
      $this->db->set('fecha', 'NOW()', FALSE);
      $this->db->insert('incidencia');
      if ($this->db->affected_rows() == '1') {
         echo $this->db->query;
          echo "ok";
      } else {
         echo "error";
      }
      }
   public function incidencias_form(/*$nombre, $contrasena*/){
      $query='SELECT * ';
      $resultado=$this->db->query($query);
      return $resultado;
      }
   public function grafico_incidencias_fecha($tipo,$fecha_ini,$fecha_fin,$lugar){
      $type="xy";
      $filtro_fecha='DATE_FORMAT(i.fecha, "'.($tipo=="year"?"%y":($tipo=="month"?"%y-%m":"%y-%m-%d")).'")'; 
      $query='SELECT COUNT(i.id_incidencia) incidencias, '.$filtro_fecha.' as fechas
      FROM incidencia i 
         WHERE 1 
         '.($fecha_ini!="0" && strlen($fecha_ini)==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
         '.($fecha_fin!="0" && strlen($fecha_fin)==10?' AND i.fecha <= "'.$fecha_fin.'"':"").'
         GROUP BY '.$filtro_fecha.'
         ORDER BY i.fecha;';
      $resultado=$this->db->query($query);
      $returnArray = array('valores' => $resultado->result_array(), 'tipo' => $type, 'query' => $query);
      return $returnArray;
      }
   public function grafico_incidencias_area($fecha_ini,$fecha_fin,$areas,$lugar){
      $query='SELECT '.($lugar!="form"?"COUNT(i.id_incidencia) cantidad,":"e.id_espacio as id,").' e.piso, e.direccion as '.($lugar!="form"?"areas":"valor").'
               FROM incidencia i 
                  INNER JOIN espacio e ON e.id_espacio=i.id_espacio 
                  WHERE 1 
                  '.($fecha_ini!="0" && strlen($fecha_ini)==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
                  '.($fecha_fin!="0" && strlen($fecha_fin)==10?' AND i.fecha <= "'.$fecha_fin.'"':"").'
                  '.($areas!="0"?' AND e.id_espacio IN ('.$areas.') ':"").'
                  GROUP BY e.id_espacio';
      $resultado=$this->db->query($query);
      $returnArray = array('valores' => $resultado->result_array(), 'query' => $query);
      return $returnArray;
      }
   public function motivos_incidencias($fecha_ini,$fecha_fin,$areas,$lugar){
      $query='SELECT '.($lugar!="form"?"COUNT(ti.id_tipo_incidencia) as cantidad,":"ti.id_tipo_incidencia as id, ").' 
               ti.incidencia as '.($lugar!="form"?"motivos":"valor").' 
               FROM incidencia i 
                  INNER JOIN espacio e ON e.id_espacio=i.id_espacio 
                  INNER JOIN dispositivo d ON d.id_dispositivo=i.id_dispositivo 
                  INNER JOIN modelos mo ON mo.id_modelo=d.id_modelo 
                  INNER JOIN marcas ma ON ma.id_marca=mo.id_marca
                  INNER JOIN tipo_incidencia ti ON ti.id_tipo_incidencia=i.id_tipo_incidencia
                  WHERE 1
                  '.($fecha_ini!="0" && strlen($fecha_ini)==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
                  '.($fecha_fin!="0" && strlen($fecha_fin)==10?' AND i.fecha <= "'.$fecha_fin.'"':"").'
                  '.($areas!="0"?' AND ti.id_tipo_incidencia IN ('.$areas.') ':"").'
                  GROUP BY ti.incidencia';
      $resultado=$this->db->query($query);
      $returnArray = array('valores' => $resultado->result_array(), 'query' => $query);
      return $returnArray;
      }
   public function incidencia_area_mes($fecha_ini,$fecha_fin,$areas,$lugar){
      if($lugar==""){
            $query=  'SELECT DISTINCT SUM(IF(t2.fecha<>t.fecha,0,t2.cantidad)) cantidad,e.direccion,t.fecha FROM
                     (SELECT DISTINCT DATE_FORMAT(fecha,"%y-%m") as fecha FROM incidencia
                     WHERE 1 
                     '.($fecha_ini!="0" && strlen($fecha_ini)==10?' AND fecha >= "'.$fecha_ini.'"':"").'
                     '.($fecha_fin!="0" && strlen($fecha_fin)==10?' AND fecha <= "'.$fecha_fin.'"':"").') as t
                     LEFT JOIN
                     (SELECT COUNT(DISTINCT i.id_incidencia) cantidad, e.id_espacio, DATE_FORMAT(i.fecha,"%y-%m") as fecha 
                     FROM incidencia i
                     INNER JOIN espacio e ON i.id_espacio=e.id_espacio
                     WHERE 1 
                     '.($fecha_ini!="0" && strlen($fecha_ini)==10?' AND i.fecha >= "'.$fecha_ini.'"':"").'
                     '.($fecha_fin!="0" && strlen($fecha_fin)==10?' AND i.fecha <= "'.$fecha_fin.'"':"").'
                     GROUP BY i.id_espacio, i.fecha) as t2 
                     ON 1=1  
                     INNER JOIN espacio e ON e.id_espacio=t2.id_espacio 
                        '.($areas!="0"?' AND e.id_espacio IN ('.$areas.') ':"").'
                     GROUP BY t.fecha, t2.id_espacio
                     ORDER BY t.fecha, e.direccion';
                  }
      else if ($lugar=="form"){
         $query=  'SELECT DISTINCT e.id_espacio as id, e.direccion as valor FROM espacio e ORDER BY e.direccion';
      }
      $resultado=$this->db->query($query);
      $query2='SELECT DISTINCT direccion FROM espacio WHERE 1 '.($areas!="0"?' AND id_espacio IN ('.$areas.') ':"").' order by direccion';
      $direcciones=$this->db->query($query2);
      $returnArray = array('valores' => $resultado->result_array(), 'direcciones' => $direcciones->result_array(), 'query' => $query);
      return $returnArray;
      }
   public function form_values(){
      $query1='SELECT d.id_dispositivo, IF(d.etiqueta="","falta llenar",d.etiqueta) as etiqueta, mo.id_modelo, mo.modelo, ma.id_marca, ma.marca FROM dispositivo d INNER JOIN modelos mo ON d.id_modelo=mo.id_modelo INNER JOIN marcas ma ON mo.id_marca=ma.id_marca';
      $resultado1=$this->db->query($query1);
      $query2='SELECT id_tipo_incidencia, incidencia FROM tipo_incidencia';
      $resultado2=$this->db->query($query2);
      $query3='SELECT id_espacio, piso, direccion FROM espacio';
      $resultado3=$this->db->query($query3);
      return $returnArray = array('dispositivos' => $resultado1->result_array(),'incidencias' => $resultado2->result_array(),'espacios' => $resultado3->result_array());
      }
   public function posicionxespacios($idespacios){
      $query='SELECT * FROM `espacio_posicion` WHERE id_espacio='.$idespacios.' ORDER BY CAST(posicion as INTEGER);';
      $resultado1=$this->db->query($query);
      return $returnArray = array('posiciones' => $resultado1->result_array());
      }
   public function editar_incidencia($id_incidencia, $dispositivo, $espacio, $posicion, $tipo_incidencia, $ticket, $descripcion)
   {
      //$this->db->set('id_incidencia', 'field+1', FALSE);
      $this->db->set('id_espacio', $espacio, FALSE);
      $this->db->set('espacio_exacto', $posicion, TRUE);
      $this->db->set('id_dispositivo', $dispositivo, FALSE);
      $this->db->set('ticket', $ticket, TRUE);
      $this->db->set('id_tipo_incidencia', $tipo_incidencia, FALSE);
      $this->db->set('descripcion', $descripcion, TRUE);
      $this->db->where('id_incidencia', $id_incidencia);
      $this->db->update('incidencia');
      if ($this->db->affected_rows() == '1') {
          echo "ok";
      } else {
         echo "error";
      }
      }
}