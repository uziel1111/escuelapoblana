<?php

class Sostenimiento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function get_xmunicipio_xnivel($id_municipio, $id_nivel)
     {
      $concat = "";
       if($id_municipio!="0" || $id_municipio!=0){
   			$concat .= " AND m.id_municipio = {$id_municipio}";
   		}
   		if($id_nivel!="0" || $id_nivel!=0){
   			$concat .= " AND n.id_nivel = {$id_nivel}";
   		}
       $str_query = "
                   		SELECT DISTINCT s.id_sostenimiento, s.nombre_sostenimiento
                   		FROM escuela e
                   		INNER JOIN nivel n ON n.id_nivel=e.id_nivel
                   		INNER JOIN sostenimiento s ON s.id_sostenimiento=e.id_sostenimiento
                   		INNER JOIN municipio m ON m.id_municipio = e.id_municipio
                   		WHERE 1= 1 {$concat}
                   		ORDER BY s.nombre_sostenimiento
                   		";
       return $this->db->query($str_query)->result_array();
     }// get_all()


}
