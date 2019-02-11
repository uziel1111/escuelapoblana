<?php

class Nivel_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function getNiveles($id_municipio)
     {
       if($id_municipio==0){
			$query = "
			SELECT DISTINCT n.id_nivel, n.nombre_nivel
			FROM escuela e
			INNER JOIN nivel n ON n.id_nivel=e.id_nivel
			INNER JOIN municipio m ON m.id_municipio = e.id_municipio
			ORDER BY  n.id_nivel
			";
		}else{
			$query = "
			SELECT DISTINCT n.id_nivel, n.nombre_nivel
			FROM escuela e
			INNER JOIN nivel n ON n.id_nivel=e.id_nivel
			INNER JOIN municipio m ON m.id_municipio = e.id_municipio
			WHERE  e.id_municipio=".$id_municipio."
			ORDER BY  n.id_nivel
			";
		}
       return $this->db->query($query)->result_array();
     }// getNiveles()


}