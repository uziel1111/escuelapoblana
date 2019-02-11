<?php

class Escuela_sismo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_xcct_turno($cct,$id_turno){
      $str_query = "SELECT id_escuela FROM escuela WHERE clave_ct='".$cct."' AND id_turno=".$id_turno;
      return $this->db->query($str_query)->result_array();
    }

     function getEscuelas_sismo($id_municipio = "", $nivel = "", $sostenimiento = "", $clave = "", $mensaje = "", $valorabuscar=""){
		$html="";

		## No importa si buscamos desde la ventana modal, o desde el inputtext en la ventana de la tabla, llenamos $concat para la consulta
		$concat  = "";
		if($id_municipio != "0" || $id_municipio !=0){
			$concat .= " AND e.id_municipio = ".$id_municipio;
		}

		if($nivel != "0" || $nivel !=0){
			$concat .= " AND n.id_nivel = ".$nivel;
		}
		if($sostenimiento != "0" || $sostenimiento !=0){
			$concat .= " AND s.id_sostenimiento = ".$sostenimiento;
		}
		if($clave != "" || strlen(trim($clave)) >0){
			$concat .= " AND e.nombre_ct LIKE '%" . $clave . " %' ";
		}


		# Opción para cuando buscan en la ventan donde está la tabla
		if( ($mensaje == "voy_diferente") && ($valorabuscar!="")){
			/*
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
			INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND  m.id_municipio = l.id_municipio)
			WHERE e.id_municipio=".$this->id_municipio."  AND ( e.nombre_ct LIKE '%".$valorabuscar."%' OR e.nombre_ct LIKE '%".$valorabuscar."%') AND ( 1= 1 ".$concat.")
			GROUP BY e.id_escuela
			ORDER BY e.clave_ct, n.nombre_nivel
			";
			*/
			$query = "
			SELECT e.id_escuela, e.clave_ct cct, e.nombre_ct nombre, e.domicilio,
			t.nombre_turno,
			n.nombre_nivel AS nivel,
			m.nombre_municipio,
			l.nombre_localidad,
			tem.color,
			tem.regreso_clases,
			tem.lugar_regreso
			FROM escuela e
			INNER JOIN turno t ON t.id_turno = e.id_turno
			INNER JOIN nivel n ON n.id_nivel = e.id_nivel
			INNER JOIN municipio m ON m.id_municipio = e.id_municipio
			INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
			INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND  m.id_municipio = l.id_municipio)

      			INNER JOIN tabla_danos_temblor tem ON tem.cct=e.clave_ct

			WHERE  1=1 AND ( e.nombre_ct LIKE '%".$valorabuscar."%' OR e.nombre_ct LIKE '%".$valorabuscar."%') AND ( 1= 1 ".$concat.")
			GROUP BY e.id_escuela
			ORDER BY e.clave_ct, n.nombre_nivel
			";
		}
		else{
			/*
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
			WHERE e.id_municipio = ".$this->id_municipio . $concat ."
			ORDER BY e.clave_ct, n.nombre_nivel
			";
			*/
			$query = "
      SELECT e.id_escuela, e.clave_ct cct, e.nombre_ct nombre, e.domicilio,
			t.nombre_turno,
			n.nombre_nivel AS nivel,
			m.nombre_municipio,
			l.nombre_localidad,
			tem.color,
			tem.regreso_clases,
			tem.lugar_regreso
			FROM escuela e
			INNER JOIN turno t ON t.id_turno = e.id_turno
			INNER JOIN nivel n ON n.id_nivel = e.id_nivel
			INNER JOIN municipio m ON m.id_municipio = e.id_municipio
			INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
			INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND m.id_municipio = l.id_municipio)

			INNER JOIN tabla_danos_temblor tem ON tem.cct=e.clave_ct

			WHERE 1 = 1". $concat ."
			ORDER BY e.clave_ct, n.nombre_nivel
			";
		}#  else

		// echo $query; die();

		## Ya tenemos completo el string para la consulta, ejecutamos.
		return $this->db->query($query)->result_array();
	}# getEscuelas_sismo()

  function getEscuelas_sismo_una($cct = ""){
 $html="";

 ## No importa si buscamos desde la ventana modal, o desde el inputtext en la ventana de la tabla, llenamos $concat para la consulta
 $concat  = "";

   $concat .= " AND e.clave_ct = '21".$cct."'";







   $query = "
   SELECT e.id_escuela, e.clave_ct cct, e.nombre_ct nombre, e.domicilio,
   t.nombre_turno,
   n.nombre_nivel AS nivel,
   m.nombre_municipio,
   l.nombre_localidad,
   tem.color,
   tem.regreso_clases,
   tem.lugar_regreso
   FROM escuela e
   INNER JOIN turno t ON t.id_turno = e.id_turno
   INNER JOIN nivel n ON n.id_nivel = e.id_nivel
   INNER JOIN municipio m ON m.id_municipio = e.id_municipio
   INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
   INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND m.id_municipio = l.id_municipio)

   INNER JOIN tabla_danos_temblor tem ON tem.cct=e.clave_ct

   WHERE 1 = 1". $concat ."
   ORDER BY e.clave_ct, n.nombre_nivel
   ";


 // echo $query; die();

 ## Ya tenemos completo el string para la consulta, ejecutamos.
 return $this->db->query($query)->result_array();
}# getEscuelas_sismo_una()

	public function getTurno($cct){
		$query = "	SELECT e.id_escuela, t.nombre_turno
			FROM escuela e
			INNER JOIN turno t ON t.id_turno = e.id_turno
			WHERE e.clave_ct = '".$cct."'";

			return $this->db->query($query)->result_array();
	}

	public function getInfoEscuela($id_escuela, $mensaje, $ciclo_escolar_programas, $ciclo_escolar_estadistica, $ciclo_escolar_ipermanencia){
		  // $obj_db = new Querys();
		  $html="";
		  $a_g1 =  0;
		  $a_g2 =  0;
		  $a_g3 =  0;
		  $a_g4 =  0;
		  $a_g5 =  0;
		  $a_g6 =  0;

		  $g_g1 =  0;
		  $g_g2 =  0;
		  $g_g3 =  0;
		  $g_g4 =  0;
		  $g_g5 =  0;
		  $g_g6 =  0;
		  $g_mg = 0;

		  $t_docentes =  0;
		  $t_alumnos  =  0;
		  $t_grupos   =  0;
		  $valor_retencion =  0;
		  $valor_aprobacion =  0;
		  $valor_et =  0;

		  $total_alumnos=  0;
		  $muyalto=  0;
		  $alto=  0;
		  $medio=  0;
		  $bajo=  0;
		  $total1=  0;
		  $total2=  0;
		  $total3=  0;
		  $total4=  0;
		  $total5=  0;
		  $total6=  0;
		  $global_claveCT      =  ""; // echo "<pre>"; print_r($row); die();
		      $id_turno_global     =  "";
		      $nombre_turno_global =  "";
		      $nivel_global        =  "";
		      $nivel_datos_escuela = "";

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


		   $result = $this->db->query($query)->result_array();
		   // echo "<pre>";
		   // print_r($result);
		   // die();
		  $nivel_datos_escuela='';
		  $html .= "<div id='Exportar_a_Excel'>";
		  $cct_global = "";
		  $turno_global = "";

		  ################################################  LLENAMOS LA TABLA 1
		  ################################################  LLENAMOS LA TABLA 1 Datos de la Escuela
		  ################################################  LLENAMOS LA TABLA 1


		  // $html .= "<fieldset class='fieldset1'>";
		  // $html .= "<legend class='legend1'>Datos Generales</legend>";
		  $html .= "<div class='container-fluid'>";
			  $html .= "<div class='panel panel-default panel_content'>";
			    $html .= "<div class='panel-heading panel_head'>Datos Generales</div>";
			    $html .= "<div class='panel-body'>";


		  if (count($result) >= 1){
		  	$row = $result[0];

		      $global_claveCT      =  $row['clave_ct']; // echo "<pre>"; print_r($row); die();
		      $id_turno_global     =  $row['id_turno'];
		      $nombre_turno_global =  $row['nombre_turno'];
		      $nivel_global        =  $row['nombre_nivel'];

		      $nivel_datos_escuela = $row['nombre_nivel'];
		        $html .= "<div class='row'>";
		        $html .= "<div class='col-sm-12' style='font-size: 13px;'> Nombre del centro de trabajo: <b style='font-size: 18px;'>".utf8_encode($row['nombre_ct'])."</b></div>";
		        $html .= "</div>";

		        $html .= "<div class='row'>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> CCT: <b style='font-size: 18px;'>".$row['clave_ct']."</b></div>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Turno: <b> ".$row['nombre_turno']."</b></div>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Nivel: <b> ".$row['nombre_nivel']."</b></div>";
		        $nivel = $row['nombre_nivel'];
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Zona escolar: <b> ". $row['zona']."</b></div>";
		        $html .= "</div>";
		        $html .= "<div class='row'>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Modalidad: <b>".$row['nombre_modalidad']."</b></div>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Sostenimiento: <b>".$row['nombre_sostenimiento']. "</b></div>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Corde: <b> ".utf8_encode($row['nombre_corde'] )."</b></div>";
		        $html .= "<div class='col-sm-3' style='font-size: 13px;'> Sector: <b> ". $row['sector']."</b></div>";
		        $html .= "</div>";
		        $html .= "<div class='row'>";
		        $html .= "<div class='col-sm-4' style='font-size: 13px;'> Domicilio: <b> ".utf8_encode($row['domicilio'])."</b></div>";
		        $html .= "<div class='col-sm-4' style='font-size: 13px;'> Localidad: <b> ". utf8_encode($row['nombre_localidad'])."</b></div>";
		        $html .= "<div class='col-sm-4' style='font-size: 13px;'> Municipio: <b> ".utf8_encode( $row['nombre_municipio'])."</b></div>";
		        $html .= "</div>";
		        $html .= "<div class='row'>";
		        $html .= "<div class='col-sm-12' style='font-size: 13px;'> Nombre del Director: <b> ".utf8_encode($row['nombre_director'])."</b></div>";
		        $html .= "</div>";


		    }# if
		    else {
		       $html .= "<div class='row'><div class='col-sm-8'>No se encontraron registros...</div></div>";
		    }
		    // $html .= "</fieldset>";
		    $html .= "</div><!-- panel body -->";
			$html .= "</div><!-- panel-heading -->";
			$html .= "</div><!-- container -->";
		    $html .= "<br>";




		    ################################################  LLENAMOS LA TABLA 2
		    ################################################  LLENAMOS LA TABLA 2 Estatus de la Escuela
		    ################################################  LLENAMOS LA TABLA 2
		    $html .= "<br>";
		    // $html .= "<fieldset class='fieldset1'>";
		    // $html .= "<legend class='legend1'>Estatus de la Escuela</legend>";
		    $html .= "<div class='container-fluid'>";
			$html .= "<div class='panel panel-default panel_content'>";
			$html .= "<div class='panel-heading panel_head'>Estatus de la Escuela</div>";
			$html .= "<div class='panel-body'>";

		    $html .= "<div class='row'>";
		    $html .= "<div class='col-sm-3' style='font-size: 13px;'> Estatus: <b style='font-size: 18px;'>".utf8_encode($row['nombre_estatus'])."</b></div>";
		    $html .= "<div class='col-sm-3' style='font-size: 13px;'> Fecha de creación: <b style='font-size: 18px;'>".$row['fecha_alta']."</b></div>";
		    $html .= "<div class='col-sm-3' style='font-size: 13px;'> Última actualización: <b style='font-size: 18px;'>".$row['fecha_actualizacion']."</b></div>";
		    $html .= "<div class='col-sm-3' style='font-size: 13px;'> Fecha de cierre: <b style='font-size: 18px;'>".$row['fecha_clausura']."</b></div>";
		    $html .= "</div>";

		    // $html .= "</fieldset>";
		    $html .= "</div><!-- panel body -->";
			$html .= "</div><!-- panel-heading -->";
			$html .= "</div><!-- container -->";
		    $html .= "<br>";
		    ################################################  LLENAMOS LA TABLA 3
		    ################################################  LLENAMOS LA TABLA 3 Programas Federales de Apoyo (Ciclo 2016 - 2017)
		    ################################################  LLENAMOS LA TABLA 3



		    $queryp = " SELECT PIEE,PFCE,PNCE,PETC,PRONI,PRO_ALIM,PRO_ALCIEN
		                FROM programas_de_apoyo_esc_16_17
		                WHERE clave_ct='".$global_claveCT."'
		                AND turno ='".$id_turno_global."'
		                AND ciclo_escolar = '" .$ciclo_escolar_programas. "'
		                ";

		    // echo $queryp; die();

		    // $resultp = $obj_db->select($queryp);
		    $resultp = $this->db->query($queryp)->result_array();
		    if (count($resultp)>=1){
		    	$row = $resultp[0];
		          $piee       = $row['PIEE'];
		          $pfce       = $row['PFCE'];
		          $pnce       = $row['PNCE'];
		          $petc       = $row['PETC'];
		          $proni      = $row['PRONI'];
		          $pro_alim   = $row['PRO_ALIM'];
		          $pro_alcien = $row['PRO_ALCIEN'];

		          $html .= "<br>";
		          // $html .= "<fieldset class='fieldset1'>";
		          // $html .= "<legend class='legend1'>Programas Federales de Apoyo (Ciclo 2016 - 2017)</legend>";
		          $html .= "<div class='container-fluid'>";
				  $html .= "<div class='panel panel-default panel_content'>";
				  $html .= "<div class='panel-heading panel_head'>Programas Federales de Apoyo (Ciclo 2016 - 2017)</div>";
				  $html .= "<div class='panel-body'>";

		          $html .= "<div class='row margenFila'>";
		          $html .= "<div >";
		          $html .= "<center>";
		          $html .= "<span class='td_paloma_verde'> &#x2714; </span><label> = Programas vigentes en la escuela</label>";
		          $html .= "</center>";
		          $html .= "</div>";

		          if ($piee || $pfce || $pnce || $petc || $proni || $pro_alim || $pro_alcien){
		            $html .= "<tr>";
		            if ( $piee=='X') {
		              $html .= "<div class='row'>";
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA PARA LA INCLUSIÓN Y LA EQUIDAD EDUCATIVA (PIEE) ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='row'>";
		                    $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA PARA LA INCLUSIÓN Y LA EQUIDAD EDUCATIVA (PIEE) ";
		                    $html .= "</div>";}
		            if ( $pfce=='X') {
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA DE FORTALECIMIENTO DE LA CALIDAD EDUCATIVA (PFCE) ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA DE FORTALECIMIENTO DE LA CALIDAD EDUCATIVA (PFCE) ";
		              $html .= "</div>";
		              $html .= "</div>";}
		            if ( $pnce=='X') {
		              $html .= "<div class='row'>";
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA NACIONAL DE CONVIVENCIA ESCOLAR (PNCE) ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='row'>";
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA NACIONAL DE CONVIVENCIA ESCOLAR (PNCE) ";
		              $html .= "</div>";}
		            if ($petc=='X') {
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA ESCUELAS DE TIEMPO COMPLETO (PETC) ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA ESCUELAS DE TIEMPO COMPLETO (PETC) ";
		                    $html .= "</div>";
		                    $html .= "</div>";}
		            if ($proni=='X') {
		              $html .= "<div class='row'>";
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA NACIONAL DE INGLÉS (PRONI) ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='row'>";
		                    $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA NACIONAL DE INGLÉS (PRONI) ";
		                    $html .= "</div>";}
		            if ($pro_alim=='X') {
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA ALIMENTACIÓN ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA ALIMENTACIÓN ";
		                    $html .= "</div>";
		                    $html .= "</div>";}
		            if ($pro_alcien=='X') {
		              $html .= "<div class='row'>";
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA ESCUELAS AL CIEN ";
		              $html .= "<span class='td_paloma_verde'> &#x2714; </span>";
		              $html .= "</div>";
		              $html .= "</div>";
		            }else{ $html .= "<div class='row'>";
		              $html .= "<div class='col-sm-6' style='font-size: 13px;'> PROGRAMA ESCUELAS AL CIEN ";
		              $html .= "</div>";
		              $html .= "</div>";}

		        }
		        // $html .= "</fieldset>";
		        $html .= "</div><!-- panel body -->";
				$html .= "</div><!-- panel-heading -->";
				$html .= "</div><!-- container -->";
		        $html .= "<br>";
		  }
		  else{
		/*<div class='col-sm-12'>No se encontraron registros en Programas Federales de Apoyo (Ciclo 2016 - 2017)</div>*/
		      $html .= "<div class='row'></div>";
		  }




		  ################################################  LLENAMOS LA TABLA 4
		  ################################################  LLENAMOS LA TABLA 4 Estadística
		  ################################################  LLENAMOS LA TABLA 4

		  $query_e = "SELECT Clave_CT,Nivel_X,
		             IFNULL(Cant_alumnos_T, 0) AS alumnos_total,IFNULL(Cant_alumnos_1_T, 0) AS alumnos_total1,IFNULL(Cant_alumnos_2_T, 0) AS alumnos_total2,IFNULL(Cant_alumnos_3_T, 0) AS alumnos_total3,
		             IFNULL(Cant_alumnos_4_T, 0) AS alumnos_total4, IFNULL(Cant_alumnos_5_T, 0) AS alumnos_total5, IFNULL(Cant_alumnos_6_T, 0) AS alumnos_total6,
		             IFNULL(Cant_grupos, 0) AS grupos_total,IFNULL(Cant_grupos_1, 0) AS grupos_1,IFNULL(Cant_grupos_2, 0) AS grupos_2,IFNULL(Cant_grupos_3, 0) AS grupos_3,IFNULL(Cant_grupos_4, 0) AS grupos_4,IFNULL(Cant_grupos_5, 0) AS grupos_5,IFNULL(Cant_grupos_6, 0) AS grupos_6,
		             IFNULL(Cant_docentes_T, 0) AS total_docentes
		             FROM estadistica_inicio_16_17
		             WHERE Clave_CT='".$global_claveCT."'
		             AND Turno ='".$id_turno_global."'
		             AND ciclo_escolar = '" .$ciclo_escolar_estadistica. "'
		             ";
		            //  echo $query_e; die();
		  // $result_e = $obj_db->select($query_e);
		             $result_e = $this->db->query($query_e)->result_array();

		  if (count($result_e)>=1){
		  	$row = $result_e[0];
		    $html .= "<br>";
		    // $html .= "<fieldset class='fieldset1'>";
		    // $html .= "<legend class='legend1'>Estadística escolar: Alumnos, Grupos y Docentes.</legend>";
		    $html .= "<div class='container-fluid'>";
			$html .= "<div class='panel panel-default panel_content'>";
		  	$html .= "<div class='panel-heading panel_head'>Estadística escolar: Alumnos, Grupos y Docentes.</div>";
		  	$html .= "<div class='panel-body'>";

		    $a_g1 =  $row['alumnos_total1'];
		    $a_g2 =  $row['alumnos_total2'];
		    $a_g3 =  $row['alumnos_total3'];
		    $a_g4 =  $row['alumnos_total4'];
		    $a_g5 =  $row['alumnos_total5'];
		    $a_g6 =  $row['alumnos_total6'];

		    $g_g1 =  $row['grupos_1'];
		    $g_g2 =  $row['grupos_2'];
		    $g_g3 =  $row['grupos_3'];
		    $g_g4 =  $row['grupos_4'];
		    $g_g5 =  $row['grupos_5'];
		    $g_g6 =  $row['grupos_6'];

		    $t_docentes =  $row['total_docentes'];
		    $t_alumnos  =  $row['alumnos_total'];
		    $t_grupos   =  $row['grupos_total'];

		    $html .= "<div id='container'>";
		    $html .= "</div>";#contenedor de grafica
		    $html .= "<div class='row margenFila'>";

		    $html .= "<div class='col-sm-12' id='div_grafico1' style='width: 70% !important; '></div>";

		    $html .= "</div>";
		    // $html .= "</fieldset>";
		    $html .= "</div><!-- panel body -->";
			$html .= "</div><!-- panel-heading -->";
			$html .= "</div><!-- container -->";
		    $html .= "<br>";

		}else{

		        $html .= "<div id='container'>";
		        $html .= "</div>";#contenedor de grafica
		        $html .= "<div class='row margenFila'>";

		        $html .= "<div class='col-sm-12' id='div_grafico1' style='Display: none !important; '></div>";

		        $html .= "</div>";/*<div class='col-sm-8'>No se encontraron registros en Estadística escolar: Alumnos, Grupos y Docentes.</div>*/
		       $html .= "<div class='row'></div>";

		  }





		  ################################################  LLENAMOS LA TABLA 5
		  ################################################  LLENAMOS LA TABLA 5 Indicadores de Permanencia
		  ################################################  LLENAMOS LA TABLA 5



		  $query_ip = "SELECT IF(Retencion='No Aplica' OR Retencion='N/D' ,0,Retencion) AS retencion,
		               IF(Aprobacion='No Aplica' OR Aprobacion='N/D',0,Aprobacion) AS aprobacion,
		               IF(Eficiencia_Terminal='No Aplica' OR Eficiencia_Terminal='N/D',0,Eficiencia_Terminal) AS eficiencia_terminal
		                                 FROM estadistica_inicio_16_17
		               WHERE Clave_CT='".$global_claveCT."'
		                AND Turno ='".$id_turno_global."'
		                AND ciclo_escolar = '" .$ciclo_escolar_estadistica. "'
		             ";
		             // echo $query_e; die();
		  // $result_ip = $obj_db->select($query_ip);
		  $result_ip = $this->db->query($query_ip)->result_array();
		  // echo "<pre>";
		  // print_r($result_ip);
		  // die();

		  if (count($result_ip) >= 1){
		  	$row = $result_ip[0];
		  // 	echo "<pre>";
		  // print_r($row);
		  // die();
		    $ret    =  ($row['retencion']!="")?$row['retencion']:"El sistema no cuenta con esta información";
		    $aprob  = ($row['aprobacion']!="")?$row['aprobacion']:"El sistema no cuenta con esta información";
		    $ef_ter = ($row['eficiencia_terminal']!="")?$row['eficiencia_terminal']:"El sistema no cuenta con esta información";

		    $valor_retencion =   $row['retencion'];
		    $valor_aprobacion =   $row['aprobacion'];
		    $valor_et =   $row['eficiencia_terminal'];

		    $html .= "<br>";
		    // $html .= "<fieldset class='fieldset1'>";
		    // $html .= "<legend class='legend1'>Indicadores de Permanencia.</legend>";
		    $html .= "<div class='container-fluid'>";
			$html .= "<div class='panel panel-default panel_content'>";
		  	$html .= "<div class='panel-heading panel_head'>Indicadores de Permanencia.</div>";
		  	$html .= "<div class='panel-body'>";

		    $html .= "<div class='row'>";
		    $html .= "<div class='col-sm-4'>";
		    $html .= "<div id='containerRPB01'></div>";
		    $html .= "<div class='tooltip2' style='cursor:default; font-size:1.5em;'>";
		    $html .= "<center>Retención</center>";
		    $html .= "<span class='tooltiptext2'><p>Porcentaje de alumnos que permanecen en la escuela entre ciclos escolares consecutivos antes de concluir el nivel educativo de referencia, por cada cien alumnos matriculados al inicio del ciclo escolar.</p><i>- Fuente: INEE</i></span> ";
		    $html .= "</div>";
		    $html .= "</div>";
		    $html .= "<div class='col-sm-4'>";
		    $html .= "<div id='containerRPB02'></div>";
		    $html .= "<div class='tooltip2' style='cursor:default; font-size:1.5em;'>";
		    $html .= "<center>Aprobación</center>";
		    $html .= "<span class='tooltiptext2'><p>Porcentaje de alumnos aprobados de un determinado grado, por cada cien alumnos que están matriculados al final del ciclo escolar.</p><i>- Fuente: INEE</i></span> ";
		    $html .= "</div>";
		    $html .= "</div>";
		    $html .= "<div class='col-sm-4'>";
		    $html .= "<div id='containerRPB03'></div>";
		    $html .= "<div class='tooltip2' style='cursor:default; font-size:1.5em;'>";
		    $html .= "<center>Eficiencia Terminal</center>";
		    $html .= "<span class='tooltiptext2'><p>Porcentaje de alumnos que egresan de cierto nivel o tipo educativo en un determinado ciclo escolar por cada cien alumnos de nuevo ingreso, inscritos tantos ciclos escolares atrás como dure el nivel o tipo educativo en cuestión.</p><i>- Fuente: INEE</i></span> ";
		    $html .= "</div>";
		    $html .= "</div>";
		    // $html .= "</fieldset>";
		    $html .= "</div><!-- panel body -->";
			$html .= "</div><!-- panel-heading -->";
			$html .= "</div><!-- container -->";
		    $html .= "<br>";


		  }else{
		    //$html .= "<br>";
		    $html .= "<div id='containerRPB01' style='Display: none !important; '></div>";
		    $html .= "<div id='containerRPB02' style='Display: none !important; '></div>";
		    $html .= "<div id='containerRPB03' style='Display: none !important; '></div>";/*<div class='col-sm-8'>No se encontraron registros en Indicadores de Permanencia.</div>*/
		    $html .= "<div class='row'></div>";

		  }












		################################################  LLENAMOS LA TABLA 6
		################################################  LLENAMOS LA TABLA 6 Indicadores de Aprendizaje
		################################################  LLENAMOS LA TABLA 6
		$ILC15 =0;
		$IILC15 =0;
		$IIILC15 =0;
		$IVLC15 =0;
		$IMAT15 =0;
		$IIMAT15 =0;
		$IIIMAT15 =0;
		$IVMAT15 =0;
		$ILC =0;
		$IILC =0;
		$IIILC =0;
		$IVLC =0;
		$IMAT =0;
		$IIMAT =0;
		$IIIMAT =0;
		$IVMAT =0;


		$query_ipe =     "SELECT

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
		$query_ipe15 =     "SELECT

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
		                        AND ciclo_escolar = '14_15'
		                        ";

		// $result_ipe15 = $obj_db->select($query_ipe15);
		$result_ipe15 = $this->db->query($query_ipe15)->result_array();

		  if (count($result_ipe15)>=1){
		  	$row = $result_ipe15[0];
		    $lco_bueno15 = (double)$row['IIILC']+(double)$row['IVLC'];
		    $mat_bueno15 = (double)$row['IIIMAT']+(double)$row['IVMAT'];

		    $ILC15 =  $row['ILC'];
		    $IILC15 =  $row['IILC'];
		    $IIILC15 =  $row['IIILC'];
		    $IVLC15 =  $row['IVLC'];

		    $IMAT15 =  $row['IMAT'];
		    $IIMAT15 =  $row['IIMAT'];
		    $IIIMAT15 =  $row['IIIMAT'];
		    $IVMAT15 =  $row['IVMAT'];
		  }



		  // $result_ipe = $obj_db->select($query_ipe);
		  $result_ipe = $this->db->query($query_ipe)->result_array();

		  if (count($result_ipe)>=1){
		  	$row = $result_ipe[0];
		    $lco_bueno = (double)$row['IIILC']+(double)$row['IVLC'];
		    $mat_bueno = (double)$row['IIIMAT']+(double)$row['IVMAT'];

		    $ILC =  $row['ILC'];
		    $IILC =  $row['IILC'];
		    $IIILC =  $row['IIILC'];
		    $IVLC =  $row['IVLC'];

		    $IMAT =  $row['IMAT'];
		    $IIMAT =  $row['IIMAT'];
		    $IIIMAT =  $row['IIIMAT'];
		    $IVMAT =  $row['IVMAT'];

		    $html .= "<br>";
		    // $html .= "<fieldset class='fieldset1'>";
		    // $html .= "<legend class='legend1'>Indicadores de Aprendizaje.</legend>";
		    $html .= "<div class='container-fluid'>";
			$html .= "<div class='panel panel-default panel_content'>";
		  	$html .= "<div class='panel-heading panel_head'>Indicadores de Aprendizaje.</div>";
		  	$html .= "<div class='panel-body'>";

		    $html .= '<div class="row">';
		    $html .= '<div class="col-sm-12">';
		    $html .= '  <center><h3 id="containertitulo" style="margin:0 auto;"></h3></center>';
		    $html .= '</div>';
		    $html .= '</div>';
		    $html .= '<div class="row">';
		    $html .= '<div class="col-sm-12">';
		    $html .= '  <center>';
		    $html .= '    <div>';
		    $html .= '      <div style="display:inline-block; width:20px; height:20px; background-color:#ECC462; border: 1px solid black;"></div>';
		    $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2015</p>';

		    $html .= '       <div style="display:inline-block; margin-left:30px; width:20px; height:20px; background-color:#D5831C; border: 1px solid black;"></div>';
		    $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2016</p>';
		    $html .= '    </div>';
		    $html .= '  </center>';
		    $html .= '</div>';
		    $html .= '</div>';
		    $html .= '<div class="row"> ';
		    $html .= '<div class="col-sm-6">';
		    $html .= '  <div id="containerpiedrilldown01" ></div>';
		    $html .= '</div>';
		    $html .= '<div class="col-sm-6">';
		    $html .= '  <div id="containerpiedrilldown02" ></div>';
		    $html .= '</div>';
		    $html .= '</div>';



		    $html .= "<div class='col-sm-12'>";
		  $html .= "<table id='tabla_planea' class='table table-gray table-hover'>";
		  $html .= "<thead>  ";
		  $html .= "<tr>    ";
		  $html .= "<th class='text-center' rowspan='2'></th>    ";
		  $html .= "<th class='text-center' colspan='4'>Lenguaje y comunicación</th>   ";
		  $html .= "<th class='text-center' colspan='4'>Matemáticas</th> </tr><tr>  ";
		  $html .= "<th class='text-center'>I";
		  $html .= "<br><span style='font-weight:normal'>Insuficiente</span></th>   ";
		  $html .= "<th class='text-center'>II";
		  $html .= "<br><span style='font-weight:normal'>Elemental</span>";
		  $html .= "</th>    <th class='text-center'>III";
		  $html .= "<br><span style='font-weight:normal'>Bueno</span></th>    ";
		  $html .= "<th class='text-center'>IV";
		  $html .= "<br><span style='font-weight:normal'>Excelente</span></th>    ";
		  $html .= "<th class='text-center'>I";
		  $html .= "<br><span style='font-weight:normal'>Insuficiente</span></th>   ";
		  $html .= "<th class='text-center'>II";
		  $html .= " <br><span style='font-weight:normal'>Elemental</span></th>    ";
		   $html .= "<th class='text-center'>III";
		   $html .= "<br><span style='font-weight:normal'>Bueno</span></th>    ";
		   $html .= "<th class='text-center'>IV";
		   $html .= "<br><span style='font-weight:normal'>Excelente</span></th></tr>";
		   $html .= "</thead><tbody><tr>";
		   $html .= "<td colspan='9' style='background-color:silver;'>PLANEA 2015</td></tr><tr>   ";
		   $html .= "<th class='text-center'>Tú escuela</th>    ";
		   $html .= "<td id='lycI_15' class='text-center'>".$ILC15."%</td>    ";
		   $html .= "<td id='lycII_15' class='text-center'>".$IILC15."%</td>    ";
		   $html .= "<td id='lycIII_15' class='text-center'>".$IIILC15."%</td>    ";
		   $html .= "<td id='lycIV_15' class='text-center'>".$IVLC15."%</td>    ";
		   $html .= "<td id='matI_15' class='text-center'>".$IMAT15."%</td>    ";
		   $html .= "<td id='matII_15' class='text-center'>".$IIMAT15."%</td>    ";
		   $html .= "<td id='matIII_15' class='text-center'>".$IIIMAT15."%</td>    ";
		   $html .= "<td id='matIV_15' class='text-center'>".$IVMAT15."%</td></tr><tr>    ";
		   $html .= "<th class='text-center'>Estado de Puebla</th>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%</td></tr>  ";
		   $html .= "<tr>    ";
		   $html .= "<th class='text-center'>Nacional";
		   $html .= "</th>    ";
		   $html .= "<td class='text-center'>49.5%";
		   $html .= "</td>    <td class='text-center'>33.2%";
		   $html .= "</td>    <td class='text-center'>14.6%";
		   $html .= "</td>    <td class='text-center'>2.6%";
		   $html .= "</td>    <td class='text-center'>60.5%";
		   $html .= "</td>    <td class='text-center'>18.9%";
		   $html .= "</td>    <td class='text-center'>13.8%";
		   $html .= "</td>    <td class='text-center'>6.8%";
		   $html .= "</td>  </tr>";
		   $html .= "<tr><td colspan='9' style='background-color:silver;'>PLANEA 2016";
		   $html .= "</td></tr>  <tr>    <th class='text-center'>Tú escuela";
		   $html .= "</th>    <td id='lycI_16' class='text-center'>".$ILC."%";
		   $html .= "</td>    <td id='lycII_16' class='text-center'>".$IILC."%";
		   $html .= "</td>    <td id='lycIII_16' class='text-center'>".$IIILC."%";
		   $html .= "</td>    <td id='lycIV_16' class='text-center'>".$IVLC."%";
		   $html .= "</td>    <td id='matI_16' class='text-center'>".$IMAT."%";
		   $html .= "</td>    <td id='matII_16' class='text-center'>".$IIMAT."%";
		   $html .= "</td>    <td id='matIII_16' class='text-center'>".$IIIMAT."%";
		   $html .= "</td>    <td id='matIV_16' class='text-center'>".$IVMAT."%";
		   $html .= "</td>  </tr>  <tr>    <th class='text-center'>Estado de Puebla";
		   $html .= "</th>    <td class='text-center'>--%</td>    ";
		   $html .= "<td class='text-center'>--%";
		   $html .= "</td>    <td class='text-center'>--%";
		   $html .= "</td>    <td class='text-center'>--%";
		   $html .= "</td>    <td class='text-center'>--%";
		   $html .= "</td>    <td class='text-center'>--%";
		   $html .= "</td>    <td class='text-center'>--%";
		   $html .= "</td>    <td class='text-center'>--%";
		   $html .= "</td>  </tr>  ";
		   $html .= "<tr>    <th class='text-center'>Nacional";
		   $html .= "</th>    <td class='text-center'>36.8%";
		   $html .= "</td>    <td class='text-center'>35%";
		   $html .= "</td>    <td class='text-center'>21.8%";
		   $html .= "</td>    <td class='text-center'>6.4%";
		   $html .= "</td>    <td class='text-center'>48.6%";
		   $html .= "</td>    <td class='text-center'>18.8%";
		   $html .= "</td>    <td class='text-center'>18.7%";
		   $html .= "</td>    <td class='text-center'>13.8%";
		   $html .= "</td>  </tr></tbody></table>";
		   $html .= " </div>";

		  $html .= "</tbody>";
		  $html .= "</table>";
		  $html .= "</div>";#row margenFila

		  // $html .= "</fieldset>";
		  $html .= "</div><!-- panel body -->";
		  $html .= "</div><!-- panel-heading -->";
		  $html .= "</div><!-- container -->";
		  $html .= "<br>";
		  }
		  else{
		    //$html .= "<br>";
		    $html .= '  <div id="containerpiedrilldown01" style="Display: none !important; " ></div>';
		    $html .= '  <div id="containerpiedrilldown02"  style="Display: none !important; "></div>';
		    /*<div class='col-sm-8'>No se encontraron registros en Indicadores de Aprendizaje.</div>*/
		    $html .= "<div class='row'></div>";

		  }

		////////////////////RIESGO DE abandono




		$bim=5;

		if($nivel_global=='PRIMARIA')
		{
		  $tabla_riesgo = "riesgoprimb".$bim."c1617";
		}
		else
		{
		  $tabla_riesgo = "riesgosecub".$bim."c1617";
		}




		  $query_riesgo =     "SELECT COUNT(CCT) total_alumnos,
		                      (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0) ) zombies,
		                      (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3) ) muyalto_riesgo,
		                      (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2) ) alto_riesgo,
		                      (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1) ) medio_riesgo,
		                      (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0) ) bajo_riesgo
		                      FROM $tabla_riesgo WHERE CCT='$global_claveCT' AND TURNO='$nombre_turno_global'
		                        ";

		// $result_riesgo = $obj_db->select($query_riesgo);
		$result_riesgo = $this->db->query($query_riesgo)->result_array();

		  if (count($result_riesgo)>=1){
		    $row = $result_riesgo[0];
		    if ($row['total_alumnos']!='0') {
		      $html .= "<br>";
		    // $html .= "<fieldset class='fieldset1'>";
		    // $html .= "<legend class='legend1'>Riesgo de Abandono Escolar.</legend>";
		    $html .= "<div class='container-fluid'>";
			$html .= "<div class='panel panel-default panel_content'>";
		  	$html .= "<div class='panel-heading panel_head'>Riesgo de Abandono Escolar.</div>";
		  	$html .= "<div class='panel-body'>";

		    $html .= '          <div class="row">';
		    $html .= '            <form id="form_riesgoporct" name="form_riesgoporct">';
		    $html .= '              <div class="col-sm-3">';
		    $html .= '              </div>';
		    $html .= '              <div class="col-sm-2">';
		    $html .= '                <div class="form-group">';
		    $html .= '                  <label>Bimestre: </label>';
		    $html .= '                  <select id="select_opcbimestre" name="select_opcbimestre" class="form-control">';
		    $html .= '                    <option value="1">1er Bimestre</option>';
		    $html .= '                    <option value="2">2do Bimestre</option>';
		    $html .= '                    <option value="3">3er Bimestre</option>';
		    $html .= '                    <option value="4">4to Bimestre</option>';
		    $html .= '                    <option value="5" selected="selected">5to Bimestre</option>';

		    $html .= '                  </select>';
		    $html .= '                </div>';
		    $html .= '              </div>';
		    $html .= '              <div class="col-sm-2">';
		    $html .= '                <div class="form-group">';
		    $html .= '                  <label>Ciclo Escolar:</label>';
		    $html .= '                  <select id="select_opcciclo" name="select_opcciclo" class="form-control">';
		    $html .= '                    <option value="2016-2017" selected="selected">2016 - 2017</option>';
		    $html .= '                  </select>';
		    $html .= '                </div>';
		    $html .= '              </div>';
		    $html .= '            </form>';
		    $html .= '            <div class="col-sm-2">';
		    $html .= '              <div style="margin-top:23px;">';
		    $html .= '                <button style="color: white; background-color: #3C5AA2;" id="btnBuscarCT" type="button"  class="btn">Consultar</button>';
		    $html .= '              </div>';
		    $html .= '            </div>';
		    $html .= '          </div>';

		    $total_alumnos =  $row['total_alumnos'];
		    $muyalto =  $row['muyalto_riesgo'] + $row['zombies'];
		    $alto =  $row['alto_riesgo'];
		    $medio =  $row['medio_riesgo'];
		    $bajo =  $row['bajo_riesgo'];

		    $html .= '        <div id="contenedor_riesgo">';
		    $html .= '        <div class="row contenedorfila">';
		    $html .= '          <div class="col-sm-6">';
		    $html .= '            <div id="containerpiechartRiesgo" style="height:400px; margin:0 auto;"></div>';
		    $html .= '          </div>';
		    $html .= '          <div class="col-sm-6">';
		    $html .= '            <div id="containerbarchartRiesgo" style="height: 400px; margin:0 auto;"></div>';
		    $html .= '          </div>';
		    $html .= '        </div>';
		    $html .= '        <div class="row contenedorfila">';
		    $html .= '          <div class="col-sm-6">';
		    $html .= '            <table id="tabla_pie_info" class="table table-gray table-hover">';
		    $html .= '              <thead>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Total</th>';
		    $html .= '                  <th class="text-center">Muy Alto</th>';
		    $html .= '                  <th class="text-center">Alto</th>';
		    $html .= '                  <th class="text-center">Medio</th>';
		    $html .= '                  <th class="text-center">Bajo</th>';
		    $html .= '                </tr>';
		    $html .= '              </thead>';
		    $html .= '              <tbody>';
		    $html .= '                <tr>';
		    $html .= '                  <td class="text-center" style="font-size:1.2em; font-weight:500;">'.$total_alumnos.'</td>';
		    $html .= '                  <td class="text-center" style="background-color:#FF0000; color:white; font-size:1.2em; font-weight:600;">'.$muyalto.'</td>';
		    $html .= '                  <td class="text-center" style="background-color:#FF9900; font-size:1.2em; font-weight:500;">'.$alto.'</td>';
		    $html .= '                  <td class="text-center" style="background-color:#FFFF00; font-size:1.2em; font-weight:500;">'.$medio.'</td>';
		    $html .= '                  <td class="text-center" style="background-color:#3CB371; font-size:1.2em; font-weight:500;">'.$bajo.'</td>';
		    $html .= '                </tr>';
		    $html .= '              </tbody>';
		    $html .= '            </table>';
		    $html .= '          </div>';


		    $query_riesgot =     "SELECT COUNT(CCT) total_alumnos,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0 AND GRADO=1) ) zombies1,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0 AND GRADO=2) ) zombies2,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0 AND GRADO=3) ) zombies3,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0 AND GRADO=4) ) zombies4,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0 AND GRADO=5) ) zombies5,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0 AND GRADO=6) ) zombies6,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3 AND GRADO=1) ) muyalto_riesgo1,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3 AND GRADO=2) ) muyalto_riesgo2,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3 AND GRADO=3) ) muyalto_riesgo3,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3 AND GRADO=4) ) muyalto_riesgo4,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3 AND GRADO=5) ) muyalto_riesgo5,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3 AND GRADO=6) ) muyalto_riesgo6,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2 AND GRADO=1) ) alto_riesgo1,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2 AND GRADO=2) ) alto_riesgo2,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2 AND GRADO=3) ) alto_riesgo3,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2 AND GRADO=4) ) alto_riesgo4,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2 AND GRADO=5) ) alto_riesgo5,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2 AND GRADO=6) ) alto_riesgo6,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1 AND GRADO=1) ) medio_riesgo1,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1 AND GRADO=2) ) medio_riesgo2,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1 AND GRADO=3) ) medio_riesgo3,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1 AND GRADO=4) ) medio_riesgo4,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1 AND GRADO=5) ) medio_riesgo5,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1 AND GRADO=6) ) medio_riesgo6,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0 AND GRADO=1) ) bajo_riesgo1,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0 AND GRADO=2) ) bajo_riesgo2,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0 AND GRADO=3) ) bajo_riesgo3,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0 AND GRADO=4) ) bajo_riesgo4,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0 AND GRADO=5) ) bajo_riesgo5,
		    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0 AND GRADO=6) ) bajo_riesgo6
		    FROM $tabla_riesgo WHERE CCT='$global_claveCT' AND TURNO='$nombre_turno_global'
		                                ";

		        // $result_riesgot = $obj_db->select($query_riesgot);
		        $result_riesgot = $this->db->query($query_riesgot)->result_array();

		          if (count($result_riesgot) >=1){
		          	$row = $result_riesgot[0];

		            $muyalto1 =  $row['muyalto_riesgo1'] + $row['zombies1'];
		            $muyalto2 =  $row['muyalto_riesgo2'] + $row['zombies2'];
		            $muyalto3 =  $row['muyalto_riesgo3'] + $row['zombies3'];
		            $muyalto4 =  $row['muyalto_riesgo4'] + $row['zombies4'];
		            $muyalto5 =  $row['muyalto_riesgo5'] + $row['zombies5'];
		            $muyalto6 =  $row['muyalto_riesgo6'] + $row['zombies6'];
		            $alto1 =  $row['alto_riesgo1'];
		            $alto2 =  $row['alto_riesgo2'];
		            $alto3 =  $row['alto_riesgo3'];
		            $alto4 =  $row['alto_riesgo4'];
		            $alto5 =  $row['alto_riesgo5'];
		            $alto6 =  $row['alto_riesgo6'];
		            $medio1 =  $row['medio_riesgo1'];
		            $medio2 =  $row['medio_riesgo2'];
		            $medio3 =  $row['medio_riesgo3'];
		            $medio4 =  $row['medio_riesgo4'];
		            $medio5 =  $row['medio_riesgo5'];
		            $medio6 =  $row['medio_riesgo6'];
		            $bajo1 =  $row['bajo_riesgo1'];
		            $bajo2 =  $row['bajo_riesgo2'];
		            $bajo3 =  $row['bajo_riesgo3'];
		            $bajo4 =  $row['bajo_riesgo4'];
		            $bajo5 =  $row['bajo_riesgo5'];
		            $bajo6 =  $row['bajo_riesgo6'];

		            $total1= $muyalto1 + $alto1 + $medio1;
		            $total2= $muyalto2 + $alto2 + $medio2;
		            $total3= $muyalto3 + $alto3 + $medio3;
		            $total4= $muyalto4 + $alto4 + $medio4;
		            $total5= $muyalto5 + $alto5 + $medio5;
		            $total6= $muyalto6 + $alto6 + $medio6;

		          }
		          if($nivel_global=='PRIMARIA')
		{


		    $html .= '          <div class="col-sm-6">';
		    $html .= '            <table id="tabla_bar_info" class="table table-gray table-hover">';
		    $html .= '              <thead>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center"></th>';
		    $html .= '                  <th class="text-center">1°</th>';
		    $html .= '                  <th class="text-center">2°</th>';
		    $html .= '                  <th class="text-center">3°</th>';
		    $html .= '                  <th class="text-center">4°</th>';
		    $html .= '                  <th class="text-center">5°</th>';
		    $html .= '                  <th class="text-center">6°</th>';
		    $html .= '                </tr>';
		    $html .= '              </thead>';
		    $html .= '              <tbody>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Total</th>';
		    $html .= '                  <td class="text-center">'.$total1.'</td>';
		    $html .= '                  <td class="text-center">'.$total2.'</td>';
		    $html .= '                  <td class="text-center">'.$total3.'</td>';
		    $html .= '                  <td class="text-center">'.$total4.'</td>';
		    $html .= '                  <td class="text-center">'.$total5.'</td>';
		    $html .= '                  <td class="text-center">'.$total6.'</td>';
		    $html .= '                </tr>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Muy Alto</th>';
		    $html .= '                  <td class="text-center">'.$muyalto1.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto2.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto3.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto4.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto5.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto6.'</td>';
		    $html .= '                </tr>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Alto</th>';
		    $html .= '                  <td class="text-center">'.$alto1.'</td>';
		    $html .= '                  <td class="text-center">'.$alto2.'</td>';
		    $html .= '                  <td class="text-center">'.$alto3.'</td>';
		    $html .= '                  <td class="text-center">'.$alto4.'</td>';
		    $html .= '                  <td class="text-center">'.$alto5.'</td>';
		    $html .= '                  <td class="text-center">'.$alto6.'</td>';
		    $html .= '                </tr>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Medio</th>';
		    $html .= '                  <td class="text-center">'.$medio1.'</td>';
		    $html .= '                  <td class="text-center">'.$medio2.'</td>';
		    $html .= '                  <td class="text-center">'.$medio3.'</td>';
		    $html .= '                  <td class="text-center">'.$medio4.'</td>';
		    $html .= '                  <td class="text-center">'.$medio5.'</td>';
		    $html .= '                  <td class="text-center">'.$medio6.'</td>';
		    $html .= '                </tr>';
		    $html .= '              </tbody>';
		    $html .= '            </table>';

		    $html .= '          </div>';

		  }
		  else{

		    $html .= '          <div class="col-sm-6">';
		    $html .= '            <table id="tabla_bar_info" class="table table-gray table-hover">';
		    $html .= '              <thead>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center"></th>';
		    $html .= '                  <th class="text-center">1°</th>';
		    $html .= '                  <th class="text-center">2°</th>';
		    $html .= '                  <th class="text-center">3°</th>';
		    $html .= '                </tr>';
		    $html .= '              </thead>';
		    $html .= '              <tbody>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Total</th>';
		    $html .= '                  <td class="text-center">'.$total1.'</td>';
		    $html .= '                  <td class="text-center">'.$total2.'</td>';
		    $html .= '                  <td class="text-center">'.$total3.'</td>';
		    $html .= '                </tr>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Muy Alto</th>';
		    $html .= '                  <td class="text-center">'.$muyalto1.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto2.'</td>';
		    $html .= '                  <td class="text-center">'.$muyalto3.'</td>';
		    $html .= '                </tr>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Alto</th>';
		    $html .= '                  <td class="text-center">'.$alto1.'</td>';
		    $html .= '                  <td class="text-center">'.$alto2.'</td>';
		    $html .= '                  <td class="text-center">'.$alto3.'</td>';
		    $html .= '                </tr>';
		    $html .= '                <tr>';
		    $html .= '                  <th class="text-center">Medio</th>';
		    $html .= '                  <td class="text-center">'.$medio1.'</td>';
		    $html .= '                  <td class="text-center">'.$medio2.'</td>';
		    $html .= '                  <td class="text-center">'.$medio3.'</td>';
		    $html .= '                </tr>';
		    $html .= '              </tbody>';
		    $html .= '            </table>';

		    $html .= '          </div>';

		  }
		    $html .= '        </div>';
		    $html .= '        </div>';
		    // $html .= "</fieldset>";
		    $html .= "</div><!-- panel body -->";
			  $html .= "</div><!-- panel-heading -->";
			  $html .= "</div><!-- container -->";
		    $html .= "<br>";

		    }
		    else{
		    //$html .= "<br>";
		    $html .= '            <div id="containerpiechartRiesgo" style="Display: none !important; height:400px; margin:0 auto;"></div>';
		    $html .= '            <div id="containerbarchartRiesgo" style="Display: none !important; height: 400px; margin:0 auto;"></div>';

		    /*$html .= "<div class='row'><div class='col-sm-8'>No se encontraron registros en Riesgo de Abandono Escolar.</div></div>";*/

		  }



		  }















		  $html .= "</div>"; # Exportar a excel
		  $num_rows = 0;
		  // $obj_db->closeDB();




		  $array_estadistica = array(
		                            'a_g1' => $a_g1,
		                            'a_g2' => $a_g2,
		                            'a_g3' => $a_g3,
		                            'a_g4' => $a_g4,
		                            'a_g5' => $a_g5,
		                            'a_g6' => $a_g6,
		                            'g_g1' => $g_g1,
		                            'g_g2' => $g_g2,
		                            'g_g3' => $g_g3,
		                            'g_g4' => $g_g4,
		                            'g_g5' => $g_g5,
		                            'g_g6' => $g_g6,
		                            'g_mg' => $g_mg,
		                            't_docentes' => $t_docentes,
		                            't_alumnos' => $t_alumnos,
		                            't_grupos' => $t_grupos
		                          );
		  $array_ind_perma = array(
		                            'valor_retencion' => $valor_retencion,
		                            'valor_aprobacion' => $valor_aprobacion,
		                            'valor_et' => $valor_et
		                          );

		  $array_planea = array(
		                            'ILC' => $ILC,
		                            'IILC' => $IILC,
		                            'IIILC' => $IIILC,
		                            'IVLC' => $IVLC,
		                            'IMAT' => $IMAT,
		                            'IIMAT' => $IIMAT,
		                            'IIIMAT' => $IIIMAT,
		                            'IVMAT' => $IVMAT,
		                            'ILC15' => $ILC15,
		                            'IILC15' => $IILC15,
		                            'IIILC15' => $IIILC15,
		                            'IVLC15' => $IVLC15,
		                            'IMAT15' => $IMAT15,
		                            'IIMAT15' => $IIMAT15,
		                            'IIIMAT15' => $IIIMAT15,
		                            'IVMAT15' => $IVMAT15
		                          );


		    $array_riesgo = array(
		                            'total_alumnos' => $total_alumnos,
		                            'muyalto' => $muyalto,
		                            'alto' => $alto,
		                            'medio' => $medio,
		                            'bajo' => $bajo
		                          );


		    $array_riesgot = array(
		                            'total1' => $total1,
		                            'total2' => $total2,
		                            'total3' => $total3,
		                            'total4' => $total4,
		                            'total5' => $total5,
		                            'total6' => $total6
		                          );
		    $array_btnnewriesgo = array(

		                            'cct' => $global_claveCT,
		                            'turno' => $nombre_turno_global,
		                            'nivel' => $nivel_global
		                          );

		  $array_graficas = array(
		                          'estadistica' => $array_estadistica,
		                          'ind_perma' => $array_ind_perma,
		                          'planea' => $array_planea,
		                          'riesgo' => $array_riesgo,
		                          'riesgot' => $array_riesgot,
		                          'btnnewriesgo'=> $array_btnnewriesgo
		                          );
		  $respuesta = array(
		                      'html' => $html,
		                      'total' => $num_rows,
		                      'mensaje' => $mensaje,
		                      'array_graficas' => $array_graficas,
		                      'nivel' => $nivel
		                    );

		  return $respuesta;
	}# getInfoEscuela()


  function get_particulares($nivel,$id_municipio,$sost,$mensaje,$clave=""){
      $concat  = "";
  		if($clave != "" || strlen(trim($clave)) >0){
  				$concat .= " AND (e.nombre_ct LIKE '%".trim($clave)."%' OR e.domicilio LIKE '%".trim($clave)."%')";
  		}

  		if($nivel != "0" || $nivel !=0){
  				$concat .= " AND e.id_nivel = ".$nivel;
  		}
  		if($id_municipio != "0" || $id_municipio !=0){
  				$concat .= " AND e.id_municipio = ".$id_municipio;
  		}

  		if($sost != "0" || $sost !=0){
  			$concat .= " AND s.id_sostenimiento = ".$sost;
  		}

      # Opción para cuando buscan en la ventan donde está la tabla
  		if( ($mensaje == "voy_diferente") && ($clave!="")){
  			$str_query = "

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
  			WHERE e.id_sostenimiento = 2 ".$concat." AND (e.nombre_ct LIKE '%".trim($clave)."%' OR e.domicilio LIKE '%".trim($clave)."%')
  			GROUP BY e.id_escuela
  			ORDER BY e.clave_ct, n.nombre_nivel
  			";
  		}
  		else{
  			$str_query = "
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
  			WHERE e.id_sostenimiento = 2 " .$concat. "
  			ORDER BY e.clave_ct, n.nombre_nivel
  			";
  		}#  else
      // echo $str_query; die();
      return $this->db->query($str_query)->result_array();
  }// get_particulares()


}
