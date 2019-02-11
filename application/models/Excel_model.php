<?php

class Excel_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function excel_grid($concat)
     {
       $query = "
		    SELECT e.id_escuela, e.clave_ct cct, e.nombre_ct nombre, e.domicilio,
		    t.nombre_turno,
		    n.nombre_nivel AS nivel,
		    m.nombre_municipio,
		    l.nombre_localidad
		    FROM escuela e
		    INNER JOIN turno t ON t.id_turno = e.id_turno
		    INNER JOIN nivel n ON n.id_nivel = e.id_nivel
		    INNER JOIN municipio m ON m.id_municipio = e.id_municipio
		    INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
		    INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND m.id_municipio = l.id_municipio)
		    WHERE 1 = 1". $concat ."
		    ORDER BY e.clave_ct, n.nombre_nivel
		    ";
       return $this->db->query($query)->result_array();
     }// get_all()

     public function excel1($id_escuela){
     	$query = "
		                    SELECT n.nombre_nivel,s.nombre_sostenimiento, e.clave_ct,e.nombre_ct, e.sector, e.nombre_director,e.domicilio,
		                    es.nombre_estatus, e.fecha_alta as fecha_alta, e.fecha_alta as fecha_actualizacion, '' as fecha_clausura,
		                    t.nombre_turno,e.id_turno,
		                    m.nombre_municipio,
		                    l.nombre_localidad,
		                    co.nombre_corde,
		                    sup.zona,
		                    mo.nombre_modalidad
		                    FROM escuela e
		                    INNER JOIN turno t ON t.id_turno = e.id_turno
		                    INNER JOIN nivel n ON n.id_nivel = e.id_nivel
		                    INNER JOIN municipio m ON m.id_municipio = e.id_municipio
		                    INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
		                    INNER JOIN modalidad mo ON mo.id_modalidad = e.id_modalidad
		                    INNER JOIN corde co ON co.id_corde = e.id_corde
		                    INNER JOIN supervision sup ON sup.cct_supervision = e.cct_supervision
		                    INNER JOIN estatus es ON es.id_estatus = e.id_estatus
		                    INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND m.id_municipio = l.id_municipio)
		                    WHERE id_escuela='".$id_escuela."'
										";


		                  // echo $query; die();
		      // $result = $obj_db->select($query);
		      return $this->db->query($query)->result_array();
     }

     public function excel2($global_claveCT, $id_turno_global, $ciclo_escolar_programas){
     	$queryp = " SELECT PIEE,PFCE,PNCE,PETC,PRONI,PRO_ALIM,PRO_ALCIEN
		                    FROM programas_de_apoyo_esc_16_17
		                    WHERE clave_ct='".$global_claveCT."'
		                    AND turno ='".$id_turno_global."'
		                    AND ciclo_escolar = '" .$ciclo_escolar_programas. "'
		                    ";

		        // $resultp = $obj_db->select($queryp);
		return $this->db->query($queryp)->result_array();
     }

     public function excel3($global_claveCT, $id_turno_global, $ciclo_escolar_estadistica){
     	$query_e = "SELECT Clave_CT,Nivel_X,
		                 Cant_alumnos_T AS alumnos_total,Cant_alumnos_1_T AS alumnos_total1,Cant_alumnos_2_T AS alumnos_total2,Cant_alumnos_3_T AS alumnos_total3,
		                 Cant_alumnos_4_T AS alumnos_total4, Cant_alumnos_5_T AS alumnos_total5, Cant_alumnos_6_T AS alumnos_total6,
		                 Cant_grupos AS grupos_total,Cant_grupos_1 AS grupos_1,Cant_grupos_2 AS grupos_2,Cant_grupos_3 AS grupos_3,Cant_grupos_4 AS grupos_4,Cant_grupos_5 AS grupos_5,Cant_grupos_6 AS grupos_6,
		                 Cant_docentes_T AS total_docentes
		                 FROM estadistica_inicio_16_17
		                 WHERE Clave_CT='".$global_claveCT."'
		                 AND Turno ='".$id_turno_global."'
		                 AND ciclo_escolar = '" .$ciclo_escolar_estadistica. "'
		                 ";

		      // $result_e = $obj_db->select($query_e);
		      return $this->db->query($query_e)->result_array();
     }

     public function excel4($global_claveCT, $id_turno_global, $ciclo_escolar_estadistica){
     	$query_ip = "SELECT Retencion AS retencion, Aprobacion AS aprobacion, Eficiencia_Terminal AS eficiencia_terminal
		                       FROM estadistica_inicio_16_17
		                       WHERE Clave_CT='".$global_claveCT."'
		                        AND Turno ='".$id_turno_global."'
		                        AND ciclo_escolar = '" .$ciclo_escolar_estadistica. "'
		                     ";

		          // $result_ip = $obj_db->select($query_ip);
		return $this->db->query($query_ip)->result_array();
     }

     public function excel5($nivel_global, $global_claveCT, $id_turno_global, $ciclo_escolar_ipermanencia){
     	$query_ipe =     "SELECT
                              '$nivel_global' as nivel,
                              ILC,
                              IILC,
                              IIILC,
                              IVLC,
                              IMAT,
                              IIMAT,
                              IIIMAT,
                              IVMAT
                          FROM planeaxescprimsecuyms
                          WHERE clave_ct='" .$global_claveCT. "'
                          AND turno ='".$id_turno_global."'
                          AND ciclo_escolar = '" .$ciclo_escolar_ipermanencia. "'
                          ";

      // $result_ipe = $obj_db->select($query_ipe);
      return $this->db->query($query_ipe)->result_array();
     }


}