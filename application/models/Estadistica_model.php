<?php

class Estadistica_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function get_all_municipio_ei()
     {
       $str_query = "SELECT m.id_municipio, m.nombre_municipio FROM temp_estadistica m WHERE m.nombre_municipio !='SAN ANTONIO CA?ADA' AND m.nombre_municipio !='CA?ADA MORELOS'GROUP BY m.nombre_municipio";
     	//querys nuevos
     	//Eloisa HA.
     	// $str_query="SELECT id_municipio, nombre_municipio from municipio group by nombre_municipio";
       return $this->db->query($str_query)->result_array();
     }// get_all_municipio_ei()

     function getclave_ze($nivelid, $sostenimientoid, $num_ze)
     {


		$query = "SELECT DISTINCT cct_zona_escolar FROM temp_estadistica
      				WHERE cct_zona_escolar!='No aplica zona escolar' AND cct_zona_escolar!='Zona sin asignar'
      				 AND num_nivel='".$nivelid."'  AND sostenimiento_desagregado='".$sostenimientoid."' AND num_zona_escolar='".$num_ze."' ";
     	// $query="SELECT s.cct_supervision cct_zona_escolar from escuela e
     	// 		inner join supervision s on s.cct_supervision=e.cct_supervision
     	// 		inner join sostenimiento sos on sos.id_sostenimiento=e.id_sostenimiento
     	// 		where s.zona!=999 and id_nivel={$nivelid} and sos.nombre_sostenimiento='{$sostenimientoid}'
     	// 		and s.zona={$num_ze}
     	// 		group by e.cct_supervision";
      // echo $query;
      //die();
      return $this->db->query($query)->result_array();
     }// getclave_ze()

     function getze($nivelid, $sostenimientoid)
     {


			$query = "SELECT DISTINCT num_zona_escolar
			FROM temp_estadistica
      		WHERE num_zona_escolar!='No aplica zona escolar' AND num_zona_escolar!='Zona sin asignar'
      		AND cct_zona_escolar!='No aplica zona escolar' AND cct_zona_escolar!='Zona sin asignar' AND cct_zona_escolar!=''
      		AND num_nivel='".$nivelid."' AND sostenimiento_desagregado='".$sostenimientoid."'
      		ORDER BY num_zona_escolar+0
			";

     	//nuevo query Eloisa HA
     	// $query="SELECT s.zona num_zona_escolar from escuela e
     	// 		inner join supervision s on s.cct_supervision=e.cct_supervision
     	// 		inner join sostenimiento sos on sos.id_sostenimiento=e.id_sostenimiento
     	// 		where s.zona!=999 and id_nivel={$nivelid} and sos.nombre_sostenimiento='{$sostenimientoid}'
     	// 		group by s.zona";
      // echo $query;
      // die();
      return $this->db->query($query)->result_array();
     }// getze()

     function getNiveles_ei($id_municipio)
     {

       	if($id_municipio==0){
			$query = "SELECT num_nivel ,nivel FROM temp_estadistica
       					WHERE nivel!='CAPACITACION PARA EL TRABAJO' AND nivel!='ADULTOS' and num_nivel!=0
     					GROUP BY num_nivel";
       		//nuevo query
       		//Eloisa HA.
     		// $query = "SELECT n.id_nivel  num_nivel,n.nombre_nivel nivel FROM escuela e
     		// 			INNER JOIN nivel n on n.id_nivel=e.id_nivel
       // 					WHERE n.nombre_nivel!='CAPACITACION PARA EL TRABAJO' AND n.nombre_nivel!='ADULTOS'
     		// 			GROUP BY n.id_nivel";
		}else{
			$query = "SELECT num_nivel ,nivel FROM temp_estadistica
					WHERE id_municipio=".$id_municipio." AND nivel!='CAPACITACION PARA EL TRABAJO' and num_nivel!=0
					AND nivel!='ADULTOS' GROUP BY num_nivel";
			//nuevo query
			//Eloisa HA.
			// $query = "SELECT n.id_nivel  num_nivel,n.nombre_nivel nivel FROM escuela e
   //   					INNER JOIN nivel n on n.id_nivel=e.id_nivel
   //     					WHERE n.nombre_nivel!='CAPACITACION PARA EL TRABAJO' AND n.nombre_nivel!='ADULTOS'
   //     					AND e.id_municipio={$id_municipio}
   //   					GROUP BY n.id_nivel";
		}

		// echo $query;
		// die();
      	return $this->db->query($query)->result_array();
     }// getNiveles_ei()

     function getNiveles_ze()
     {

		$query = "SELECT num_nivel ,nivel FROM temp_estadistica
					WHERE num_nivel!=1 AND num_nivel!=2 and num_nivel!=0 AND nivel!='CAPACITACION PARA EL TRABAJO' AND nivel!='ADULTOS'
      				GROUP BY num_nivel";
     	//query nuevo Eloisa HA
     	// $query="SELECT n.id_nivel  num_nivel,n.nombre_nivel nivel FROM escuela e
     	// 		INNER JOIN nivel n on n.id_nivel=e.id_nivel
      //  			WHERE n.id_nivel!=1 AND n.id_nivel!=2 and n.nombre_nivel!='CAPACITACION PARA EL TRABAJO' AND n.nombre_nivel!='ADULTOS'
     	// 		GROUP BY n.id_nivel";
     	// echo $query;
     	// die();


      return $this->db->query($query)->result_array();
    }// getNiveles_ze()

     function get_xmunicipio_xnivel_ei($id_municipio, $id_nivel)
     {
       $concat = "";
       if($id_municipio!="0" || $id_municipio!=0){
   			$concat .= " AND id_municipio = {$id_municipio}";
   		}
   		if($id_nivel!="TODOS" || $id_nivel!=0){
   			$concat .= " AND num_nivel = {$id_nivel}";
   		}

			$query = "SELECT sostenimiento
					FROM temp_estadistica
					WHERE 1= 1 {$concat}
      				GROUP BY sostenimiento";
   			//query nuevo Eloisa HA.
   			// $query="SELECT s.nombre_sostenimiento sostenimiento from escuela e
   			// 		inner join sostenimiento s on s.id_sostenimiento=e.id_sostenimiento
   			// 		where 1=1 {$concat}
   			// 		group by s.nombre_sostenimiento";

      return $this->db->query($query)->result_array();
     }// get_xmunicipio_xnivel_ei()

     function get_sostenimeinto_ze($id_nivel)
     {
       	$concat = "";
   		$concat .= " AND num_nivel = {$id_nivel}";

		$query = "SELECT sostenimiento_desagregado
				FROM temp_estadistica
				WHERE 1= 1 {$concat} AND num_zona_escolar!='No aplica zona escolar'
				AND num_zona_escolar!='Zona sin asignar' AND cct_zona_escolar!='No aplica zona escolar'
				AND cct_zona_escolar!='Zona sin asignar' AND cct_zona_escolar!=''
      			GROUP BY sostenimiento_desagregado";
   		// $query="SELECT s.nombre_sostenimiento sostenimiento_desagregado from escuela e
   		// 		inner join sostenimiento s on s.id_sostenimiento=e.id_sostenimiento
   		// 		inner join supervision su on su.cct_supervision=e.cct_supervision
   		// 		where 1=1 {$concat}  and su.zona!=999
   		// 		group by s.nombre_sostenimiento";
      return $this->db->query($query)->result_array();
     }// get_sostenimeinto_ze()

     function get_xmunicipio_xnivel_xsostenimiento($id_municipio, $id_nivel, $id_sostenimiento)
     {
       	$concat = "";
       	if($id_municipio!="0" || $id_municipio!=0){
   			$concat .= " AND id_municipio = {$id_municipio}";
   		}
   		if($id_nivel!="TODOS" || $id_nivel!=0){
   			$concat .= " AND num_nivel = {$id_nivel}";
   		}
      	if($id_sostenimiento!="TODOS" || $id_sostenimiento!=0){
   			$concat .= " AND sostenimiento = '{$id_sostenimiento}'";
   		}

		$query = "SELECT modalidad FROM temp_estadistica WHERE 1= 1 {$concat}
      				GROUP BY modalidad";
			// nuevo query Eloisa HA.
      	// $query="SELECT m.nombre_modalidad modalidad
      	// 		from escuela e
      	// 		inner join modalidad m on m.id_modalidad=e.id_modalidad
      	// 		inner join sostenimiento s on s.id_sostenimiento=e.id_sostenimiento
      	// 		where 1=1 {$concat}
      	// 		group by e.id_modalidad";
      	// echo $query;
      	// die();

      return $this->db->query($query)->result_array();
     }// get_xmunicipio_xnivel_xsostenimiento()

     function get_xmunicipio_xnivel_xsostenimiento_xmodalidad($id_municipio, $id_nivel, $id_sostenimiento, $id_modalidad)
     {
       $concat = "";
       if($id_municipio!="0" || $id_municipio!=0){
   			$concat .= " AND id_municipio = {$id_municipio}";
   		}
   		if($id_nivel!="TODOS" || $id_nivel!=0){
   			$concat .= " AND num_nivel = {$id_nivel}";
   		}
      if($id_sostenimiento!="TODOS" || $id_sostenimiento!=0){
   			$concat .= " AND sostenimiento = '{$id_sostenimiento}'";
   		}
      if($id_modalidad!="TODOS" || $id_modalidad!=0){
   			$concat .= " AND modalidad = '{$id_modalidad}'";
   		}

			$query = "SELECT if(ciclo='INICIO-2018-2019','2018-2019-INICIO',ciclo)ciclo
						FROM temp_estadistica
						WHERE 1= 1 {$concat} and ciclo!='FIN-2017-2018'
					 	and ciclo!='2015-2016-FIN' and ciclo!='2014-2015-FIN'
					GROUP BY if(ciclo='INICIO-2018-2019','2018-2019-INICIO',ciclo)";
   			// nuevo query Eloisa HA.
   			// $query="SELECT ciclo FROM temp_estadistica
   			// 	";
			// echo $query;
			// die();

      return $this->db->query($query)->result_array();
     }// get_xmunicipio_xnivel_xsostenimiento_xmodalidad()

     function get_llenado_tabla1_0($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
     {
       $concat = "";
       if($municipioid!="0" || $municipioid!=0){
         $concat .= " AND id_municipio = {$municipioid}";
       }

       
       		$concat .= " AND ciclo = '{$ciclonomb}'";
       
			$query = "
      SELECT
				CASE nivel	 WHEN 'AYAYAI' THEN 'Total' ELSE 'Total (todos los niveles)' END AS Nivel_X,
				CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
				CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat}
			UNION ALL
			SELECT
				CASE nivel
        WHEN 'ESPECIAL' 		THEN 'Especial'
        WHEN 'INICIAL' 			THEN 'Inicial'
        WHEN 'PREESCOLAR' 		THEN 'Preescolar'
        WHEN 'PRIMARIA' 		THEN 'Primaria'
        WHEN 'SECUNDARIA' 		THEN 'Secundaria'
        WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
        WHEN 'SUPERIOR'			THEN 'Superior'
        WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
        WHEN 'ADULTOS'			THEN 'Adultos'
				END AS nivel,
				CASE sostenimiento
					WHEN 'PUBLICO' 		THEN 'Público'
					WHEN 'AUTONOMO' 	THEN 'Autónomo'
					WHEN 'PRIVADO' 		THEN 'Privado'
				END AS sostenimiento,
				CASE modalidad
					WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS modalidad,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			GROUP BY nivel, sostenimiento
			UNION ALL
			SELECT
				CASE nivel
        WHEN 'ESPECIAL' 		THEN 'Especial'
        WHEN 'INICIAL' 			THEN 'Inicial'
        WHEN 'PREESCOLAR' 		THEN 'Preescolar'
        WHEN 'PRIMARIA' 		THEN 'Primaria'
        WHEN 'SECUNDARIA' 		THEN 'Secundaria'
        WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
        WHEN 'SUPERIOR'			THEN 'Superior'
        WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
        WHEN 'ADULTOS'			THEN 'Adultos'
				END AS Nivel_X,
				CASE sostenimiento 	WHEN 'AYAYAI'	THEN 'Total'	ELSE 'Total'	END AS Sostenimiento_X,
				CASE modalidad 		WHEN 'AYAYAI' THEN 'Total' 	ELSE 'Total'
				END AS Modalidad_X,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			GROUP BY nivel
			UNION ALL
			SELECT
				CASE nivel
        WHEN 'ESPECIAL' 		THEN 'Especial'
        WHEN 'INICIAL' 			THEN 'Inicial'
        WHEN 'PREESCOLAR' 		THEN 'Preescolar'
        WHEN 'PRIMARIA' 		THEN 'Primaria'
        WHEN 'SECUNDARIA' 		THEN 'Secundaria'
        WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
        WHEN 'SUPERIOR'			THEN 'Superior'
        WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
        WHEN 'ADULTOS'			THEN 'Adultos'
				END AS Nivel_X,
				CASE sostenimiento
					WHEN 'PUBLICO' 		THEN 'Público'
					WHEN 'AUTONOMO' 	THEN 'Autónomo'
					WHEN 'PRIVADO' 		THEN 'Privado'
				END AS Sostenimiento_X,
				CASE modalidad
        WHEN 'CONAFE (COMUNITARIA)' 				THEN 'CONAFE (COMUNITARIA)'
        WHEN 'ND' 				THEN 'ND'
        WHEN 'CONAFE' 				THEN 'CONAFE'
        WHEN 'USAER' 				THEN 'USAER'
        WHEN 'CAM' 				THEN 'CAM'
        WHEN 'TECNICA' 				THEN 'Técnica'
        WHEN 'CENDI' 				THEN 'CENDI'
        WHEN 'INICIAL' 				THEN 'Escolarizada'
        WHEN 'ESCOLARIZADA' 				THEN 'Escolarizada'
        WHEN 'NO ESCOLARIZADA' 				THEN 'No Escolarizada'
        WHEN 'NO ESCOLARIZADO' 				THEN 'No Escolarizada'
        WHEN 'INICIAL NO ESCOLARIZADA' 		THEN 'Inicial No Escolarizada'
        WHEN 'INICIAL ESCOLARIZADA' 		THEN 'Inicial Escolarizada'
        WHEN 'INDIGENA' 					THEN 'Indígena'
        WHEN 'GENERAL' 						THEN 'General'
        WHEN 'TECNICA INDUSTRIAL' 			THEN 'Técnica Industrial'
        WHEN 'TECNICA AGROPECUARIA' 		THEN 'Técnica Agropecuaria'
        WHEN 'PARA TRABAJADORES' 			THEN 'Para Trabajadores'
        WHEN 'TELESECUNDARIA' 				THEN 'Telesecundaria'
        WHEN 'BACHILLERATO GENERAL' 		THEN 'Bachillerato General'
        WHEN 'BACHILLERATO TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
        WHEN 'TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
        WHEN 'TECNICO PROFESIONAL' 			THEN 'Profesional Técnico'
        WHEN 'PROFESIONAL TECNICO' 			THEN 'Profesional Técnico'
        WHEN 'SUPERIOR' 	THEN 'Universitaria'
        WHEN 'LICENCIATURA UNIVERSITARIA' 	THEN 'Universitaria'
        WHEN 'LICENCIATURA' 	THEN 'Universitaria'
        WHEN 'POSGRADO' 	THEN 'Universitaria'
        WHEN 'LICENCIATURA NORMAL' 			THEN 'Normal'
        WHEN 'NORMAL' 			THEN 'Normal'
        WHEN 'CAPACITACION PARA EL TRABAJO' 			THEN 'Capacitación para el trabajo'
        WHEN 'PARA ADULTOS' 			THEN 'Para adultos'
        WHEN 'TECNICA' 			THEN 'Técnica'
        WHEN 'COMUNITARIO' 			THEN 'Comunitario'
        WHEN 'ADMINISTRATIVO' 			THEN 'Administrativo'
        WHEN 'RECTORIAS' 			THEN 'Rectorias'
					ELSE modalidad
				END AS Modalidad_X,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			GROUP BY nivel, sostenimiento, modalidad
			ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior', 'Capacitacion para el trabajo', 'Adultos'),
			FIELD(Sostenimiento_X,'Público','Autónomo','Privado'),
			FIELD(Modalidad_X,'Total','CAM','USAER','CENDI','Escolarizada','General','Tecnica','Técnica Industrial','Técnica Agropecuaria',
			'Para Trabajadores','Telesecundaria','No Escolarizada','Inicial No Escolarizada','Inicial Escolarizada','Indígena','CONAFE (COMUNITARIA)','CONAFE','ND','Bachillerato General',
			'Bachillerato Tecnológico','Profesional Técnico','Universitaria','Normal','Comunitario','Para adultos', 'Administrativo','Rectorias')
			";
      // echo $query;
      // die();
      return $this->db->query($query)->result_array();
    }// get_llenado_tabla1_0()

     function get_llenado_tabla1_1($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
     {
       $concat = "";
       if($municipioid!="0" || $municipioid!=0){
         $concat .= " AND id_municipio = {$municipioid}";
       }

        
       		$concat .= " AND ciclo = '{$ciclonomb}'";



			$query = "
      SELECT
				CASE nivel	     WHEN 'AYAYAI' THEN 'Total' ELSE 'Superior' END AS Nivel_X,
				CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
				CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
			UNION ALL
			SELECT
				CASE nivel
					WHEN 'ESPECIAL' 		THEN 'Especial'
					WHEN 'INICIAL' 			THEN 'Inicial'
					WHEN 'PREESCOLAR' 		THEN 'Preescolar'
					WHEN 'PRIMARIA' 		THEN 'Primaria'
					WHEN 'SECUNDARIA' 		THEN 'Secundaria'
					WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
					WHEN 'SUPERIOR'			THEN 'Superior'
				END AS Nivel_X,
				CASE modalidad
        WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
        WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
					WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
					WHEN 'TECNOLOGICO' THEN 'Universitario y Tecnológico'
					WHEN 'NORMAL' 	THEN 'Normal'
					WHEN 'POSGRADO' THEN 'Posgrado'
          WHEN 'RECTORIAS' THEN 'Rectorias'
				END AS Modalidad_X,
				CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
			GROUP BY nivel, modalidad
			UNION ALL
			SELECT
				CASE nivel
					WHEN 'ESPECIAL' 		THEN 'Especial'
					WHEN 'INICIAL' 			THEN 'Inicial'
					WHEN 'PREESCOLAR' 		THEN 'Preescolar'
					WHEN 'PRIMARIA' 		THEN 'Primaria'
					WHEN 'SECUNDARIA' 		THEN 'Secundaria'
					WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
					WHEN 'SUPERIOR'			THEN 'Superior'
				END AS Nivel_X,
				CASE modalidad
        WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
        WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
					WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
					WHEN 'TECNOLOGICO' THEN 'Universitario y Tecnológico'
					WHEN 'NORMAL' 	THEN 'Normal'
					WHEN 'POSGRADO' THEN 'Posgrado'
          WHEN 'RECTORIAS' THEN 'Rectorias'
				END AS Modalidad_X,
				CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
			GROUP BY nivel, modalidad, sostenimiento
		/*	UNION ALL
			SELECT
				CASE nivel
					WHEN 'ESPECIAL' 		THEN 'Especial'
					WHEN 'INICIAL' 			THEN 'Inicial'
					WHEN 'PREESCOLAR' 		THEN 'Preescolar'
					WHEN 'PRIMARIA' 		THEN 'Primaria'
					WHEN 'SECUNDARIA' 		THEN 'Secundaria'
					WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
					WHEN 'SUPERIOR'			THEN 'Superior'
				END AS Nivel_X,
				CASE modalidad
        WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
        WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
					WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
					WHEN 'TECNOLOGICO' THEN 'Universitario y Tecnológico'
					WHEN 'NORMAL' 	THEN 'Normal'
					WHEN 'POSGRADO' THEN 'Posgrado'
          WHEN 'RECTORIAS' THEN 'Rectorias'

				END AS Modalidad_X,
				CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado
					WHEN 'ESTATAL'	THEN 'Estatal'
          WHEN 'RECTORIAS'  THEN 'Rectorias'
					ELSE 'Federal'
				END AS sub_Sostenimiento,
				SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
				SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
				SUM(t_alumnos)   AS Cant_alumnos_T,
				SUM(t1) AS Cant_alumnos_1_T,
				SUM(t2) AS Cant_alumnos_2_T,
				SUM(t3) AS Cant_alumnos_3_T,
				SUM(t4) AS Cant_alumnos_4_T,
				SUM(t5) AS Cant_alumnos_5_T,
				SUM(t6) AS Cant_alumnos_6_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR' AND sostenimiento='Publico'
			GROUP BY Nivel_X, Modalidad_X, Sostenimiento_X, sub_Sostenimiento='Estatal' */
			ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
			FIELD(Modalidad_X,'Total','Universitario y Tecnológico','Normal','Posgrado','Rectorias'),
			FIELD(Sostenimiento_X,'Total','Público','Autónomo','Privado'),
			FIELD(sub_Sostenimiento,'Total','Estatal','Federal','Rectorias')
			";
      // echo $query;
      // die();
      return $this->db->query($query)->result_array();
     }// get_llenado_tabla1_1()

     function get_llenado_tabla2_0($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
     {
       $concat = "";
       if($municipioid!="0" || $municipioid!=0){
         $concat .= " AND id_municipio = {$municipioid}";
       }

        
       		$concat .= " AND ciclo = '{$ciclonomb}'";
       


			$query = "
      SELECT
				CASE nivel	 WHEN 'AYAYAI' THEN 'Total' ELSE 'Total (todos los niveles)' END AS Nivel_X,
				CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
				CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			UNION ALL
			SELECT
				CASE nivel
        WHEN 'ESPECIAL' 		THEN 'Especial'
        WHEN 'INICIAL' 			THEN 'Inicial'
        WHEN 'PREESCOLAR' 		THEN 'Preescolar'
        WHEN 'PRIMARIA' 		THEN 'Primaria'
        WHEN 'SECUNDARIA' 		THEN 'Secundaria'
        WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
        WHEN 'SUPERIOR'			THEN 'Superior'
        WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
        WHEN 'ADULTOS'			THEN 'Adultos'
				END AS nivel,
				CASE sostenimiento
					WHEN 'PUBLICO' 		THEN 'Público'
					WHEN 'AUTONOMO' 	THEN 'Autónomo'
					WHEN 'PRIVADO' 		THEN 'Privado'
				END AS sostenimiento,
				CASE modalidad
					WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS modalidad,
          SUM(docente_m)   				AS Cant_docentes_M,
  				SUM(docente_h)   				AS Cant_docentes_H,
  				SUM(t_docente)   				AS Cant_docentes_T,
  				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
  				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
  				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
  				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
  				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
  				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			GROUP BY nivel, sostenimiento
			UNION ALL
			SELECT
				CASE nivel
        WHEN 'ESPECIAL' 		THEN 'Especial'
        WHEN 'INICIAL' 			THEN 'Inicial'
        WHEN 'PREESCOLAR' 		THEN 'Preescolar'
        WHEN 'PRIMARIA' 		THEN 'Primaria'
        WHEN 'SECUNDARIA' 		THEN 'Secundaria'
        WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
        WHEN 'SUPERIOR'			THEN 'Superior'
        WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
        WHEN 'ADULTOS'			THEN 'Adultos'
				END AS Nivel_X,
				CASE sostenimiento 	WHEN 'AYAYAI'	THEN 'Total'	ELSE 'Total'	END AS Sostenimiento_X,
				CASE modalidad 		WHEN 'AYAYAI' THEN 'Total' 	ELSE 'Total'
				END AS Modalidad_X,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			GROUP BY nivel
			UNION ALL
			SELECT
				CASE nivel
        WHEN 'ESPECIAL' 		THEN 'Especial'
        WHEN 'INICIAL' 			THEN 'Inicial'
        WHEN 'PREESCOLAR' 		THEN 'Preescolar'
        WHEN 'PRIMARIA' 		THEN 'Primaria'
        WHEN 'SECUNDARIA' 		THEN 'Secundaria'
        WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
        WHEN 'SUPERIOR'			THEN 'Superior'
        WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
        WHEN 'ADULTOS'			THEN 'Adultos'
				END AS Nivel_X,
				CASE sostenimiento
					WHEN 'PUBLICO' 		THEN 'Público'
					WHEN 'AUTONOMO' 	THEN 'Autónomo'
					WHEN 'PRIVADO' 		THEN 'Privado'
				END AS Sostenimiento_X,
				CASE modalidad
        WHEN 'CONAFE (COMUNITARIA)' 				THEN 'CONAFE (COMUNITARIA)'
        WHEN 'CONAFE' 				THEN 'CONAFE'
        WHEN 'ND' 				THEN 'ND'
        WHEN 'USAER' 				THEN 'USAER'
        WHEN 'CAM' 				THEN 'CAM'
        WHEN 'TECNICA' 				THEN 'Técnica'
        WHEN 'CENDI' 				THEN 'CENDI'
        WHEN 'INICIAL' 				THEN 'Escolarizada'
        WHEN 'ESCOLARIZADA' 				THEN 'Escolarizada'
        WHEN 'NO ESCOLARIZADA' 				THEN 'No Escolarizada'
        WHEN 'NO ESCOLARIZADO' 				THEN 'No Escolarizada'
        WHEN 'INICIAL NO ESCOLARIZADA'  THEN 'Inicial No Escolarizada'
		WHEN 'INICIAL ESCOLARIZADA' 	THEN 'Inicial Escolarizada'
        WHEN 'INDIGENA' 					THEN 'Indígena'
        WHEN 'GENERAL' 						THEN 'General'
        WHEN 'TECNICA INDUSTRIAL' 			THEN 'Técnica Industrial'
        WHEN 'TECNICA AGROPECUARIA' 		THEN 'Técnica Agropecuaria'
        WHEN 'PARA TRABAJADORES' 			THEN 'Para Trabajadores'
        WHEN 'TELESECUNDARIA' 				THEN 'Telesecundaria'
        WHEN 'BACHILLERATO GENERAL' 		THEN 'Bachillerato General'
        WHEN 'BACHILLERATO TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
        WHEN 'TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
        WHEN 'TECNICO PROFESIONAL' 			THEN 'Profesional Técnico'
        WHEN 'PROFESIONAL TECNICO' 			THEN 'Profesional Técnico'
        WHEN 'SUPERIOR' 	THEN 'Universitaria'
        WHEN 'LICENCIATURA UNIVERSITARIA' 	THEN 'Universitaria'
        WHEN 'LICENCIATURA' 	THEN 'Universitaria'
        WHEN 'POSGRADO' 	THEN 'Universitaria'
        WHEN 'LICENCIATURA NORMAL' 			THEN 'Normal'
        WHEN 'NORMAL' 			THEN 'Normal'
        WHEN 'CAPACITACION PARA EL TRABAJO' 			THEN 'Capacitación para el trabajo'
        WHEN 'PARA ADULTOS' 			THEN 'Para adultos'
        WHEN 'TECNICA' 			THEN 'Técnica'
        WHEN 'COMUNITARIO' 			THEN 'Comunitario'
        WHEN 'ADMINISTRATIVO' 			THEN 'Administrativo'
        WHEN 'RECTORIAS' 			THEN 'Rectorias'
					ELSE modalidad
				END AS Modalidad_X,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
			GROUP BY nivel, sostenimiento, modalidad
			ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
			FIELD(Sostenimiento_X,'Público','Autónomo','Privado'),
			FIELD(Modalidad_X,'Total','CAM','USAER','CENDI','Escolarizada','General','Tecnica','Técnica Industrial','Técnica Agropecuaria',
			'Para Trabajadores','Telesecundaria','No Escolarizada','Inicial No Escolarizada','Inicial Escolarizada','Indígena','CONAFE (COMUNITARIA)','ND','CONAFE','Bachillerato General',
			'Bachillerato Tecnológico','Profesional Técnico','Universitaria','Normal','Comunitario','Para adultos', 'Administrativo','Rectorias')
			";
      // echo $query;
      // die();
      return $this->db->query($query)->result_array();
    }// get_llenado_tabla2_0()

     function get_llenado_tabla2_1($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
     {
       $concat = "";
       if($municipioid!="0" || $municipioid!=0){
         $concat .= " AND id_municipio = {$municipioid}";
       }

      
       		$concat .= " AND ciclo = '{$ciclonomb}'";


			$query = "
      SELECT
				CASE nivel	     WHEN 'AYAYAI' THEN 'Total' ELSE 'Superior' END AS Nivel_X,
				CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
				CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
			UNION ALL
			SELECT
				CASE nivel
					WHEN 'ESPECIAL' 		THEN 'Especial'
					WHEN 'INICIAL' 			THEN 'Inicial'
					WHEN 'PREESCOLAR' 		THEN 'Preescolar'
					WHEN 'PRIMARIA' 		THEN 'Primaria'
					WHEN 'SECUNDARIA' 		THEN 'Secundaria'
					WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
					WHEN 'SUPERIOR'			THEN 'Superior'
				END AS Nivel_X,
				CASE modalidad
					WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
					WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
					WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
					WHEN 'NORMAL' 	THEN 'Normal'
					WHEN 'POSGRADO' THEN 'Posgrado'
          WHEN 'RECTORIAS'      THEN 'Rectorias'
				END AS Modalidad_X,
				CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
			GROUP BY nivel, modalidad
			UNION ALL
			SELECT
				CASE nivel
					WHEN 'ESPECIAL' 		THEN 'Especial'
					WHEN 'INICIAL' 			THEN 'Inicial'
					WHEN 'PREESCOLAR' 		THEN 'Preescolar'
					WHEN 'PRIMARIA' 		THEN 'Primaria'
					WHEN 'SECUNDARIA' 		THEN 'Secundaria'
					WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
					WHEN 'SUPERIOR'			THEN 'Superior'
				END AS Nivel_X,
				CASE modalidad
					WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
					WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
					WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
					WHEN 'NORMAL' 	THEN 'Normal'
					WHEN 'POSGRADO' THEN 'Posgrado'
          WHEN 'RECTORIAS'      THEN 'Rectorias'
				END AS Modalidad_X,
				CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
			GROUP BY nivel, modalidad, sostenimiento
			/*UNION ALL
			SELECT
				CASE nivel
					WHEN 'ESPECIAL' 		THEN 'Especial'
					WHEN 'INICIAL' 			THEN 'Inicial'
					WHEN 'PREESCOLAR' 		THEN 'Preescolar'
					WHEN 'PRIMARIA' 		THEN 'Primaria'
					WHEN 'SECUNDARIA' 		THEN 'Secundaria'
					WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
					WHEN 'SUPERIOR'			THEN 'Superior'
				END AS Nivel_X,
				CASE modalidad
					WHEN 'UNIVERSITARIO Y TECNOLOGICO' 	THEN 'Universitario y Tecnológico'
					WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
					WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
					WHEN 'NORMAL' 						THEN 'Normal'
					WHEN 'POSGRADO' 					THEN 'Posgrado'
          WHEN 'RECTORIAS'      THEN 'Rectorias'
				END AS Modalidad_X,
				CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
				CASE sostenimiento_desagregado
					WHEN 'ESTATAL'	THEN 'Estatal'
					ELSE 'Federal'
				END AS sub_Sostenimiento,
        SUM(docente_m)   				AS Cant_docentes_M,
				SUM(docente_h)   				AS Cant_docentes_H,
				SUM(t_docente)   				AS Cant_docentes_T,
				SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
				SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
				SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
				SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
				SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
				SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
			FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR' AND sostenimiento='Publico'
			GROUP BY Nivel_X, Modalidad_X, Sostenimiento_X, sub_Sostenimiento='Estatal'*/
			ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
			FIELD(Modalidad_X,'Total','Universitario y Tecnológico','Normal','Posgrado','Rectorias'),
			FIELD(Sostenimiento_X,'Total','Público','Autónomo','Privado'),
			FIELD(sub_Sostenimiento,'Total','Estatal','Federal','Rectorias')
			";
      // echo $query;
      // die();
      return $this->db->query($query)->result_array();
    }// get_llenado_tabla2_1()

    function get_llenado_tabla3_0($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
    {
      $concat = "";
      if($municipioid!="0" || $municipioid!=0){
        $concat .= " AND id_municipio = {$municipioid}";
      }


       		$concat .= " AND ciclo = '{$ciclonomb}'";
      



     $query = "
     SELECT
       CASE nivel	 WHEN 'AYAYAI' THEN 'Total' ELSE 'Total (todos los niveles)' END AS Nivel_X,
       CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
       CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
     UNION ALL
     SELECT
       CASE nivel
       WHEN 'ESPECIAL' 		THEN 'Especial'
       WHEN 'INICIAL' 			THEN 'Inicial'
       WHEN 'PREESCOLAR' 		THEN 'Preescolar'
       WHEN 'PRIMARIA' 		THEN 'Primaria'
       WHEN 'SECUNDARIA' 		THEN 'Secundaria'
       WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
       WHEN 'SUPERIOR'			THEN 'Superior'
       WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
       WHEN 'ADULTOS'			THEN 'Adultos'
       END AS nivel,
       CASE sostenimiento
         WHEN 'PUBLICO' 		THEN 'Público'
         WHEN 'AUTONOMO' 	THEN 'Autónomo'
         WHEN 'PRIVADO' 		THEN 'Privado'
       END AS sostenimiento,
       CASE modalidad
         WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS modalidad,
         COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
     GROUP BY nivel, sostenimiento
     UNION ALL
     SELECT
       CASE nivel
       WHEN 'ESPECIAL' 		THEN 'Especial'
       WHEN 'INICIAL' 			THEN 'Inicial'
       WHEN 'PREESCOLAR' 		THEN 'Preescolar'
       WHEN 'PRIMARIA' 		THEN 'Primaria'
       WHEN 'SECUNDARIA' 		THEN 'Secundaria'
       WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
       WHEN 'SUPERIOR'			THEN 'Superior'
       WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
       WHEN 'ADULTOS'			THEN 'Adultos'
       END AS Nivel_X,
       CASE sostenimiento 	WHEN 'AYAYAI'	THEN 'Total'	ELSE 'Total'	END AS Sostenimiento_X,
       CASE modalidad 		WHEN 'AYAYAI' THEN 'Total' 	ELSE 'Total'
       END AS Modalidad_X,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
     GROUP BY nivel
     UNION ALL
     SELECT
       CASE nivel
       WHEN 'ESPECIAL' 		THEN 'Especial'
       WHEN 'INICIAL' 			THEN 'Inicial'
       WHEN 'PREESCOLAR' 		THEN 'Preescolar'
       WHEN 'PRIMARIA' 		THEN 'Primaria'
       WHEN 'SECUNDARIA' 		THEN 'Secundaria'
       WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
       WHEN 'SUPERIOR'			THEN 'Superior'
       WHEN 'CAPACITACION PARA EL TRABAJO'			THEN 'Capacitacion para el trabajo'
       WHEN 'ADULTOS'			THEN 'Adultos'
       END AS Nivel_X,
       CASE sostenimiento
         WHEN 'PUBLICO' 		THEN 'Público'
         WHEN 'AUTONOMO' 	THEN 'Autónomo'
         WHEN 'PRIVADO' 		THEN 'Privado'
       END AS Sostenimiento_X,
       CASE modalidad
       WHEN 'CONAFE (COMUNITARIA)' 				THEN 'CONAFE (COMUNITARIA)'
       WHEN 'USAER' 				THEN 'USAER'
       WHEN 'CONAFE' 				THEN 'CONAFE'
       WHEN 'ND' 				THEN 'ND'
       WHEN 'CAM' 				THEN 'CAM'
       WHEN 'TECNICA' 				THEN 'Técnica'
       WHEN 'CENDI' 				THEN 'CENDI'
       WHEN 'INICIAL' 				THEN 'Escolarizada'
       WHEN 'ESCOLARIZADA' 				THEN 'Escolarizada'
       WHEN 'NO ESCOLARIZADA' 				THEN 'No Escolarizada'
       WHEN 'NO ESCOLARIZADO' 				THEN 'No Escolarizada'
       WHEN 'INICIAL NO ESCOLARIZADA'  THEN 'Inicial No Escolarizada'
	   WHEN 'INICIAL ESCOLARIZADA' 	THEN 'Inicial Escolarizada'
       WHEN 'INDIGENA' 					THEN 'Indígena'
       WHEN 'GENERAL' 						THEN 'General'
       WHEN 'TECNICA INDUSTRIAL' 			THEN 'Técnica Industrial'
       WHEN 'TECNICA AGROPECUARIA' 		THEN 'Técnica Agropecuaria'
       WHEN 'PARA TRABAJADORES' 			THEN 'Para Trabajadores'
       WHEN 'TELESECUNDARIA' 				THEN 'Telesecundaria'
       WHEN 'BACHILLERATO GENERAL' 		THEN 'Bachillerato General'
       WHEN 'BACHILLERATO TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
       WHEN 'TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
       WHEN 'TECNICO PROFESIONAL' 			THEN 'Profesional Técnico'
       WHEN 'PROFESIONAL TECNICO' 			THEN 'Profesional Técnico'
       WHEN 'SUPERIOR' 	THEN 'Universitaria'
       WHEN 'LICENCIATURA UNIVERSITARIA' 	THEN 'Universitaria'
       WHEN 'LICENCIATURA' 	THEN 'Universitaria'
       WHEN 'POSGRADO' 	THEN 'Universitaria'
       WHEN 'LICENCIATURA NORMAL' 			THEN 'Normal'
       WHEN 'NORMAL' 			THEN 'Normal'
       WHEN 'CAPACITACION PARA EL TRABAJO' 			THEN 'Capacitación para el trabajo'
       WHEN 'PARA ADULTOS' 			THEN 'Para adultos'
       WHEN 'TECNICA' 			THEN 'Técnica'
       WHEN 'COMUNITARIO' 			THEN 'Comunitario'
       WHEN 'ADMINISTRATIVO' 			THEN 'Administrativo'
       WHEN 'RECTORIAS' 			THEN 'Rectorias'
         ELSE modalidad
       END AS Modalidad_X,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR' AND nivel!='ADULTOS' AND nivel!='CAPACITACION PARA EL TRABAJO'
     GROUP BY nivel, sostenimiento, modalidad
     ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior', 'Capacitacion para el trabajo', 'Adultos'),
     FIELD(Sostenimiento_X,'Público','Autónomo','Privado'),
     FIELD(Modalidad_X,'Total','CAM','USAER','CENDI','Escolarizada','General','Tecnica','Técnica Industrial','Técnica Agropecuaria',
     'Para Trabajadores','Telesecundaria','No Escolarizada','Inicial No Escolarizada','Inicial Escolarizada','Indígena','CONAFE (COMUNITARIA)','CONAFE','ND','Bachillerato General',
     'Bachillerato Tecnológico','Profesional Técnico','Universitaria','Normal','Comunitario','Para adultos', 'Administrativo','Rectorias')
     ";
     // echo $query;
     // die();
     return $this->db->query($query)->result_array();
   }// get_llenado_tabla3_0()

    function get_llenado_tabla3_1($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
    {
      $concat = "";
      if($municipioid!="0" || $municipioid!=0){
        $concat .= " AND id_municipio = {$municipioid}";
      }

       
      $concat .= " AND ciclo = '{$ciclonomb}'";
       


     $query = "
     SELECT
       CASE nivel	     WHEN 'AYAYAI' THEN 'Total' ELSE 'Superior' END AS Nivel_X,
       CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
       CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
       CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
     UNION ALL
     SELECT
       CASE nivel
         WHEN 'ESPECIAL' 		THEN 'Especial'
         WHEN 'INICIAL' 			THEN 'Inicial'
         WHEN 'PREESCOLAR' 		THEN 'Preescolar'
         WHEN 'PRIMARIA' 		THEN 'Primaria'
         WHEN 'SECUNDARIA' 		THEN 'Secundaria'
         WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
         WHEN 'SUPERIOR'			THEN 'Superior'
       END AS Nivel_X,
       CASE modalidad
         WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
         WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
         WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
         WHEN 'NORMAL' 	THEN 'Normal'
         WHEN 'POSGRADO' THEN 'Posgrado'
         WHEN 'RECTORIAS'       THEN 'Rectorias'
       END AS Modalidad_X,
       CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
       CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
     GROUP BY nivel, modalidad
     UNION ALL
     SELECT
       CASE nivel
         WHEN 'ESPECIAL' 		THEN 'Especial'
         WHEN 'INICIAL' 			THEN 'Inicial'
         WHEN 'PREESCOLAR' 		THEN 'Preescolar'
         WHEN 'PRIMARIA' 		THEN 'Primaria'
         WHEN 'SECUNDARIA' 		THEN 'Secundaria'
         WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
         WHEN 'SUPERIOR'			THEN 'Superior'
       END AS Nivel_X,
       CASE modalidad
         WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
         WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
         WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
         WHEN 'NORMAL' 	THEN 'Normal'
         WHEN 'POSGRADO' THEN 'Posgrado'
         WHEN 'RECTORIAS'       THEN 'Rectorias'
       END AS Modalidad_X,
       CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
       CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
     GROUP BY nivel, modalidad, sostenimiento
    /* UNION ALL
     SELECT
       CASE nivel
         WHEN 'ESPECIAL' 		THEN 'Especial'
         WHEN 'INICIAL' 			THEN 'Inicial'
         WHEN 'PREESCOLAR' 		THEN 'Preescolar'
         WHEN 'PRIMARIA' 		THEN 'Primaria'
         WHEN 'SECUNDARIA' 		THEN 'Secundaria'
         WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
         WHEN 'SUPERIOR'			THEN 'Superior'
       END AS Nivel_X,
       CASE modalidad
         WHEN 'UNIVERSITARIO Y TECNOLOGICO' 	THEN 'Universitario y Tecnológico'
         WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
         WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
         WHEN 'NORMAL' 						THEN 'Normal'
         WHEN 'POSGRADO' 					THEN 'Posgrado'
         WHEN 'RECTORIAS'       THEN 'Rectorias'
       END AS Modalidad_X,
       CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
       CASE sostenimiento_desagregado
         WHEN 'ESTATAL'	THEN 'Estatal'
         ELSE 'Federal'
       END AS sub_Sostenimiento,
       COUNT(escuela) AS escuelas,
				SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
				SUM(grupos_1)   			AS Cant_grupos_1,
				SUM(grupos_2)   			AS Cant_grupos_2,
				SUM(grupos_3)   			AS Cant_grupos_3,
				SUM(grupos_4)   			AS Cant_grupos_4,
				SUM(grupos_5)   			AS Cant_grupos_5,
				SUM(grupos_6)   			AS Cant_grupos_6,
				SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
				SUM(t_grupos)   				AS Cant_grupos
     FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR' AND sostenimiento='Publico'
     GROUP BY Nivel_X, Modalidad_X, Sostenimiento_X, sub_Sostenimiento='Estatal'*/
     ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
     FIELD(Modalidad_X,'Total','Universitario y Tecnológico','Normal','Posgrado','Rectorias'),
     FIELD(Sostenimiento_X,'Total','Público','Autónomo','Privado'),
     FIELD(sub_Sostenimiento,'Total','Estatal','Federal','Rectorias')
     ";
     // echo $query;
     // die();
     return $this->db->query($query)->result_array();
   }// get_llenado_tabla3_1()

   function get_llenado_tabla4($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
   {

     $concat = "";

       $concat .= " AND Num_municipio = {$municipioid}";

     if($ciclonomb=="2014-2015-INICIO"){
       $concat .= " AND Ciclo_escolar = 'Inicio_2014-2015'";
     }
     elseif ($ciclonomb=="2015-2016-INICIO"){
       $concat .= " AND Ciclo_escolar = 'Inicio_2015-2016'";
     }
     elseif ($ciclonomb=="2016-2017-INICIO"){
       $concat .= " AND Ciclo_escolar = 'Inicio_2016-2017'";
     }
     elseif ($ciclonomb=="2017-2018-INICIO"){
        $concat .=  " AND Ciclo_escolar = 'Inicio_2016-2017'";
      }
      elseif ($ciclonomb=="2018-2019-INICIO"){
        $concat .=  " AND Ciclo_escolar = 'Inicio_2016-2017'";
      }


    $query = "
    SELECT
				Nivel as nivel,
				Cobertura_tasa as cobertura,
				Cobertura_posicion as cpos,
				Absorcion_tasa as absorcion,
				Absorcion_posicion as apos
				FROM indicaxmuni
				WHERE 1= 1 {$concat}
        AND nivel!='Preescolar' AND nivel!='Superior' AND nivel!='Superior con Posgrado'
    ";
     // echo $query;
     // die();
    return $this->db->query($query)->result_array();
  }// get_llenado_tabla4()

  function get_llenado_tabla5($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
  {

    $concat = "";

      $concat .= " AND Num_municipio = {$municipioid}";

    if($ciclonomb=="2014-2015-INICIO"){
      $concat .= " AND Ciclo_escolar = 'Inicio_2014-2015'";
    }
    elseif ($ciclonomb=="2015-2016-INICIO"){
      $concat .= " AND Ciclo_escolar = 'Inicio_2015-2016'";
    }
    elseif ($ciclonomb=="2016-2017-INICIO"){
      $concat .= " AND Ciclo_escolar = 'Inicio_2015-2016'";
    }
    elseif ($ciclonomb=="2017-2018-INICIO"){
        $concat .=  " AND Ciclo_escolar = 'Inicio_2015-2016'";
      }

    elseif ($ciclonomb=="2018-2019-INICIO"){
        $concat .=  " AND Ciclo_escolar = 'Inicio_2015-2016'";
     }


   $query = "

   SELECT
ciclo_escolar,
 retencion_primaria,
 retencion_secundaria,
 retencion_media_superior,
 aprobacion_primaria,
 aprobacion_secundaria,
 aprobacion_media_superior,
eficiencia_terminal_primaria,
eficiencia_terminal_secundaria,
eficiencia_terminal_media_superior
 FROM indicadores_fail
WHERE id_municip=$municipioid

   ";
    // echo $query;
    // die();
   return $this->db->query($query)->result_array();
 }// get_llenado_tabla5()

 function get_llenado_tabla6($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
 {

   $concat = "";

     $concat .= " AND Num_Municipio = {$municipioid}";

   if($ciclonomb=="2014-2015-INICIO"){
     $concat .= " AND Periodo = '14_15'";
   }
   elseif ($ciclonomb=="2015-2016-INICIO"){
     $concat .= " AND Periodo = '15_16'";
   }
   elseif ($ciclonomb=="2016-2017-INICIO"){
     $concat .= " AND Periodo = '15_16'";
   }
   elseif ($ciclonomb=="2017-2018-INICIO"){
        $concat .=  " AND Periodo = '15_16'";
      }
    elseif ($ciclonomb=="2018-2019-INICIO"){
        $concat .=  " AND Periodo = '15_16'";
      }


  $query = "
  SELECT
			CASE Nivel
				WHEN 'PRIMARIA' THEN 'Primaria'
				WHEN 'SECUNDARIA' THEN 'Secundaria'
				WHEN 'MEDIA SUPERIOR' THEN 'Media Superior'
			END AS Nivel,
			CONCAT(ROUND(lyc_I,1),'%') 					AS lyc_I,
			CONCAT(ROUND(lyc_II,1),'%') 				AS lyc_II,
			CONCAT(ROUND(lyc_III,1),'%') 				AS lyc_III,
			CONCAT(ROUND(lyc_IV,1),'%') 				AS lyc_IV,
			CONCAT(ROUND(SUM(lyc_III+lyc_IV),1),'%') 	AS lyc_III_mas_IV,
			CONCAT(ROUND(mat_I,1),'%') 					AS mat_I,
			CONCAT(ROUND(mat_II,1),'%') 				AS mat_II,
			CONCAT(ROUND(mat_III,1),'%') 				AS mat_III,
			CONCAT(ROUND(mat_IV,1),'%') 				AS mat_IV,
			CONCAT(ROUND(SUM(mat_III+mat_IV),1),'%') 	AS mat_III_mas_IV
		FROM planea_x_muni WHERE 1= 1 {$concat}
		GROUP BY Nivel
		ORDER BY FIELD(Nivel,'Primaria','Secundaria','Media Superior')

  ";
   // echo $query;
   // die();
  return $this->db->query($query)->result_array();
}// get_llenado_tabla6()

function get_llenado_tabla7($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
{

  $concat = "";

    $concat .= " AND num_muni = {$municipioid}";




 $query = "
 SELECT
				(3_5h_t) as TH_3_5,
				(3_5m_t) as TM_3_5,
				(3_5h_t + 3_5m_t) as TT_3_5,

				(6_11h_t) as TH_6_11,
				(6_11m_t) as TM_6_11,
				(6_11h_t + 6_11m_t) as TT_6_11,

				(12_14h_t) as TH_12_14,
				(12_14m_t) as TM_12_14,
				(12_14h_t + 12_14m_t) as TT_12_14,

				(15_17h_t) as TH_15_17,
				(15_17m_t) as TM_15_17,
				(15_17h_t + 15_17m_t) as TT_15_17,

				(18_22h_t) as TH_18_22,
				(18_22m_t) as TM_18_22,
				(18_22h_t + 18_22m_t) as TT_18_22,

				(inasis_3_5_h) as INH_3_5,
				(inasis_3_5_m) as INM_3_5,
				(inasis_3_5_h + inasis_3_5_m) as INT_3_5,

				(inasis_6_11_h) as INH_6_11,
				(inasis_6_11_m) as INM_6_11,
				(inasis_6_11_h + inasis_6_11_m) as INT_6_11,

				(inasis_12_14_h) as INH_12_14,
				(inasis_12_14_m) as INM_12_14,
				(inasis_12_14_h + inasis_12_14_m) as INT_12_14,

				(inasis_15_17_h) as INH_15_17,
				(inasis_15_17_m) as INM_15_17,
				(inasis_15_17_h + inasis_15_17_m) as INT_15_17,

				(inasis_18_22_h) as INH_18_22,
				(inasis_18_22_m) as INM_18_22,
				(inasis_18_22_h + inasis_18_22_m) as INT_18_22,

				(analfa_8_14_h) as ANH_8_14,
				(analfa_8_14_m) as ANM_8_14,
				(analfa_8_14_h + analfa_8_14_m) as ANT_8_14,

				(analfa_15_omas_h) as ANH_15_OM,
				(analfa_15_omas_m) as ANM_15_OM,
				(analfa_15_omas_h + analfa_15_omas_m) as ANT_15_OM

				FROM inegixmuni
				WHERE 1= 1 {$concat} and periodo='2015'

 ";
  // echo $query;
  // die();
 return $this->db->query($query)->result_array();
}// get_llenado_tabla7()

function get_llenado_tabla8($municipioid, $municipionomb, $nivelid, $nivelnomb, $sostenimientonomb, $modalidadnomb, $ciclonomb)
{

  $concat = "";

    $concat .= " AND num_muni = {$municipioid}";




 $query = "
 SELECT
				(3_5h_t) as TH_3_5,
				(3_5m_t) as TM_3_5,
				(3_5h_t + 3_5m_t) as TT_3_5,

				(6_11h_t) as TH_6_11,
				(6_11m_t) as TM_6_11,
				(6_11h_t + 6_11m_t) as TT_6_11,

				(12_14h_t) as TH_12_14,
				(12_14m_t) as TM_12_14,
				(12_14h_t + 12_14m_t) as TT_12_14,

				(15_17h_t) as TH_15_17,
				(15_17m_t) as TM_15_17,
				(15_17h_t + 15_17m_t) as TT_15_17,

				(18_22h_t) as TH_18_22,
				(18_22m_t) as TM_18_22,
				(18_22h_t + 18_22m_t) as TT_18_22,

				(inasis_3_5_h) as INH_3_5,
				(inasis_3_5_m) as INM_3_5,
				(inasis_3_5_h + inasis_3_5_m) as INT_3_5,

				(inasis_6_11_h) as INH_6_11,
				(inasis_6_11_m) as INM_6_11,
				(inasis_6_11_h + inasis_6_11_m) as INT_6_11,

				(inasis_12_14_h) as INH_12_14,
				(inasis_12_14_m) as INM_12_14,
				(inasis_12_14_h + inasis_12_14_m) as INT_12_14,

				(inasis_15_17_h) as INH_15_17,
				(inasis_15_17_m) as INM_15_17,
				(inasis_15_17_h + inasis_15_17_m) as INT_15_17,

				(inasis_18_22_h) as INH_18_22,
				(inasis_18_22_m) as INM_18_22,
				(inasis_18_22_h + inasis_18_22_m) as INT_18_22,

				(analfa_8_14_h) as ANH_8_14,
				(analfa_8_14_m) as ANM_8_14,
				(analfa_8_14_h + analfa_8_14_m) as ANT_8_14,

				(analfa_15_omas_h) as ANH_15_OM,
				(analfa_15_omas_m) as ANM_15_OM,
				(analfa_15_omas_h + analfa_15_omas_m) as ANT_15_OM

				FROM inegixmuni
				WHERE 1= 1 {$concat} and periodo='2015'

 ";
  // echo $query;
  // die();
 return $this->db->query($query)->result_array();
}// get_llenado_tabla8()

function getciclo_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
 $query = "SELECT DISTINCT ciclo FROM temp_estadistica
 	WHERE num_nivel='".$nivelid."' AND sostenimiento_desagregado='".$sostenimientoid."'
 	 AND num_zona_escolar='".$num_ze."' AND cct_zona_escolar='".$cct_ze."'
     and ciclo!='2014-2015-FIN' and ciclo!='2015-2016-FIN' and ciclo!='FIN-2017-2018'";
 return $this->db->query($query)->result_array();
}// getciclo_ze()

function get_llenado_tabla1_0_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
  $concat = "";

  $concat .= " AND num_nivel = '{$nivelid}'";

  $concat .= " AND sostenimiento_desagregado = '{$sostenimientoid}'";

  $concat .= " AND num_zona_escolar = '{$num_ze}'";

  $concat .= " AND cct_zona_escolar = '{$cct_ze}'";

 $query = "
 SELECT
   CASE nivel	 WHEN 'AYAYAI' THEN 'Total' ELSE 'Total (todos los niveles)' END AS Nivel_X,
   CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
   CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat}
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS nivel,
   CASE sostenimiento
     WHEN 'PUBLICO' 		THEN 'Público'
     WHEN 'AUTONOMO' 	THEN 'Autónomo'
     WHEN 'PRIVADO' 		THEN 'Privado'
   END AS sostenimiento,
   CASE modalidad
     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS modalidad,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
 GROUP BY nivel, sostenimiento
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE sostenimiento 	WHEN 'AYAYAI'	THEN 'Total'	ELSE 'Total'	END AS Sostenimiento_X,
   CASE modalidad 		WHEN 'AYAYAI' THEN 'Total' 	ELSE 'Total'
   END AS Modalidad_X,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
 GROUP BY nivel
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE sostenimiento
     WHEN 'PUBLICO' 		THEN 'Público'
     WHEN 'AUTONOMO' 	THEN 'Autónomo'
     WHEN 'PRIVADO' 		THEN 'Privado'
   END AS Sostenimiento_X,
   CASE modalidad
     WHEN 'CONAFE (COMUNITARIA)' 				THEN 'CONAFE (COMUNITARIA)'
     WHEN 'USAER' 				THEN 'USAER'
     WHEN 'CONAFE' 				THEN 'CONAFE'
     WHEN 'ND' 				THEN 'ND'
     WHEN 'CAM' 				THEN 'CAM'
     WHEN 'TECNICA' 				THEN 'Técnica'
     WHEN 'INICIAL' 				THEN 'Escolarizada'
     WHEN 'ESCOLARIZADA' 				THEN 'Escolarizada'
     WHEN 'NO ESCOLARIZADA' 				THEN 'No Escolarizada'
     WHEN 'NO ESCOLARIZADO' 				THEN 'No Escolarizada'
     WHEN 'INDIGENA' 					THEN 'Indígena'
     WHEN 'GENERAL' 						THEN 'General'
	WHEN 'INICIAL NO ESCOLARIZADA'  THEN 'Inicial No Escolarizada'
	WHEN 'INICIAL ESCOLARIZADA' 	THEN 'Inicial Escolarizada'
     WHEN 'TECNICA INDUSTRIAL' 			THEN 'Técnica Industrial'
     WHEN 'TECNICA AGROPECUARIA' 		THEN 'Técnica Agropecuaria'
     WHEN 'PARA TRABAJADORES' 			THEN 'Para Trabajadores'
     WHEN 'TELESECUNDARIA' 				THEN 'Telesecundaria'
     WHEN 'BACHILLERATO GENERAL' 		THEN 'Bachillerato General'
     WHEN 'BACHILLERATO TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
     WHEN 'TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
     WHEN 'PROFESIONAL TECNICO' 			THEN 'Profesional Técnico'
     WHEN 'LICENCIATURA UNIVERSITARIA' 	THEN 'Universitaria'
     WHEN 'LICENCIATURA' 	THEN 'Universitaria'
     WHEN 'POSGRADO' 	THEN 'Universitaria'
     WHEN 'LICENCIATURA NORMAL' 			THEN 'Normal'
     WHEN 'NORMAL' 			THEN 'Normal'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
     ELSE modalidad
   END AS Modalidad_X,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
 GROUP BY nivel, sostenimiento, modalidad
 ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
 FIELD(Sostenimiento_X,'Público','Autónomo','Privado'),
 FIELD(Modalidad_X,'Total','CAM','USAER','Escolarizada','General','Técnica Industrial','Técnica Agropecuaria',
 'Para Trabajadores','Telesecundaria','No Escolarizada','Inicial No Escolarizada','Inicial Escolarizada','Indígena','CONAFE (COMUNITARIA)','CONAFE','ND','Bachillerato General',
 'Bachillerato Tecnológico','Profesional Técnico','Universitaria','Normal','Rectorias')
 ";
 // echo $query;
 // die();
 return $this->db->query($query)->result_array();
}// get_llenado_tabla1_0_ze()

function get_llenado_tabla1_1_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
  $concat = "";

  $concat .= " AND num_nivel = '{$nivelid}'";

  $concat .= " AND sostenimiento_desagregado = '{$sostenimientoid}'";

  $concat .= " AND num_zona_escolar = '{$num_ze}'";

  $concat .= " AND cct_zona_escolar = '{$cct_ze}'";

 $query = "
 SELECT
   CASE nivel	     WHEN 'AYAYAI' THEN 'Total' ELSE 'Superior' END AS Nivel_X,
   CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
   CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE modalidad
     WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
     WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
     WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
     WHEN 'NORMAL' 	THEN 'Normal'
     WHEN 'POSGRADO' THEN 'Posgrado'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
   END AS Modalidad_X,
   CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
 GROUP BY nivel,modalidad
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE modalidad
     WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
     WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
     WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
     WHEN 'NORMAL' 	THEN 'Normal'
     WHEN 'POSGRADO' THEN 'Posgrado'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
   END AS Modalidad_X,
   CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
 GROUP BY nivel, modalidad, sostenimiento
 /*UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE modalidad
     WHEN 'UNIVERSITARIO Y TECNOLOGICO' 	THEN 'Universitario y Tecnológico'
     WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
     WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
     WHEN 'NORMAL' 						THEN 'Normal'
     WHEN 'POSGRADO' 					THEN 'Posgrado'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
   END AS Modalidad_X,
   CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado
     WHEN 'ESTATAL'	THEN 'Estatal'
     ELSE 'Federal'
   END AS sub_Sostenimiento,
   SUM(t_mujeres_alumnos)   AS Cant_alumnos_M,
   SUM(t_hombres_alumnos)   AS Cant_alumnos_H,
   SUM(t_alumnos)   AS Cant_alumnos_T,
   SUM(t1) AS Cant_alumnos_1_T,
   SUM(t2) AS Cant_alumnos_2_T,
   SUM(t3) AS Cant_alumnos_3_T,
   SUM(t4) AS Cant_alumnos_4_T,
   SUM(t5) AS Cant_alumnos_5_T,
   SUM(t6) AS Cant_alumnos_6_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR' AND sostenimiento='Publico'
 GROUP BY Nivel_X, Modalidad_X, Sostenimiento_X, sub_Sostenimiento='Estatal' */
 ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
   FIELD(Modalidad_X,'Total','Universitario y Tecnológico','Normal','Posgrado','Rectorias'),
  FIELD(Sostenimiento_X,'Total','Público','Autónomo','Privado'),
 FIELD(sub_Sostenimiento,'Total','Estatal','Federal','Rectorias')
 ";


 // echo $query;
 // die();
 return $this->db->query($query)->result_array();
}// get_llenado_tabla1_1_ze()

function get_llenado_tabla2_0_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
  $concat = "";

  $concat .= " AND num_nivel = '{$nivelid}'";

  $concat .= " AND sostenimiento_desagregado = '{$sostenimientoid}'";

  $concat .= " AND num_zona_escolar = '{$num_ze}'";

  $concat .= " AND cct_zona_escolar = '{$cct_ze}'";

 $query = "
 SELECT
   CASE nivel	 WHEN 'AYAYAI' THEN 'Total' ELSE 'Total (todos los niveles)' END AS Nivel_X,
   CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
   CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat}
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS nivel,
   CASE sostenimiento
     WHEN 'PUBLICO' 		THEN 'Público'
     WHEN 'AUTONOMO' 	THEN 'Autónomo'
     WHEN 'PRIVADO' 		THEN 'Privado'
   END AS sostenimiento,
   CASE modalidad
     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS modalidad,
     SUM(docente_m)   				AS Cant_docentes_M,
     SUM(docente_h)   				AS Cant_docentes_H,
     SUM(t_docente)   				AS Cant_docentes_T,
     SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
     SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
     SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
     SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
     SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
     SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
 GROUP BY nivel, sostenimiento
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE sostenimiento 	WHEN 'AYAYAI'	THEN 'Total'	ELSE 'Total'	END AS Sostenimiento_X,
   CASE modalidad 		WHEN 'AYAYAI' THEN 'Total' 	ELSE 'Total'
   END AS Modalidad_X,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
 GROUP BY nivel
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE sostenimiento
     WHEN 'PUBLICO' 		THEN 'Público'
     WHEN 'AUTONOMO' 	THEN 'Autónomo'
     WHEN 'PRIVADO' 		THEN 'Privado'
   END AS Sostenimiento_X,
   CASE modalidad
     WHEN 'CONAFE (COMUNITARIA)' 				THEN 'CONAFE (COMUNITARIA)'
     WHEN 'USAER' 				THEN 'USAER'
     WHEN 'CAM' 				THEN 'CAM'
     WHEN 'CONAFE' 				THEN 'CONAFE'
     WHEN 'ND' 				THEN 'ND'
     WHEN 'TECNICA' 				THEN 'Técnica'
     WHEN 'INICIAL' 				THEN 'Escolarizada'
     WHEN 'ESCOLARIZADA' 				THEN 'Escolarizada'
     WHEN 'NO ESCOLARIZADA' 				THEN 'No Escolarizada'
     WHEN 'NO ESCOLARIZADO' 				THEN 'No Escolarizada'
     WHEN 'INICIAL NO ESCOLARIZADA'  THEN 'Inicial No Escolarizada'
	 WHEN 'INICIAL ESCOLARIZADA' 	THEN 'Inicial Escolarizada'
     WHEN 'INDIGENA' 					THEN 'Indígena'
     WHEN 'GENERAL' 						THEN 'General'
     WHEN 'TECNICA INDUSTRIAL' 			THEN 'Técnica Industrial'
     WHEN 'TECNICA AGROPECUARIA' 		THEN 'Técnica Agropecuaria'
     WHEN 'PARA TRABAJADORES' 			THEN 'Para Trabajadores'
     WHEN 'TELESECUNDARIA' 				THEN 'Telesecundaria'
     WHEN 'BACHILLERATO GENERAL' 		THEN 'Bachillerato General'
     WHEN 'BACHILLERATO TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
     WHEN 'TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
     WHEN 'PROFESIONAL TECNICO' 			THEN 'Profesional Técnico'
     WHEN 'LICENCIATURA UNIVERSITARIA' 	THEN 'Universitaria'
     WHEN 'LICENCIATURA' 	THEN 'Universitaria'
     WHEN 'POSGRADO' 	THEN 'Universitaria'
     WHEN 'LICENCIATURA NORMAL' 			THEN 'Normal'
     WHEN 'NORMAL' 			THEN 'Normal'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
     ELSE modalidad
   END AS Modalidad_X,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
 GROUP BY nivel, sostenimiento, modalidad
 ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
 FIELD(Sostenimiento_X,'Público','Autónomo','Privado'),
 FIELD(Modalidad_X,'Total','CAM','USAER','Escolarizada','General','Técnica Industrial','Técnica Agropecuaria',
 'Para Trabajadores','Telesecundaria','No Escolarizada','Inicial No Escolarizada','Inicial Escolarizada','Indígena','CONAFE (COMUNITARIA)','CONAFE','ND','Bachillerato General',
 'Bachillerato Tecnológico','Profesional Técnico','Universitaria','Normal','Rectorias')
 ";
 // echo $query;
 // die();
 return $this->db->query($query)->result_array();
}// get_llenado_tabla2_0_ze()

function get_llenado_tabla2_1_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
  $concat = "";

  $concat .= " AND num_nivel = '{$nivelid}'";

  $concat .= " AND sostenimiento_desagregado = '{$sostenimientoid}'";

  $concat .= " AND num_zona_escolar = '{$num_ze}'";

  $concat .= " AND cct_zona_escolar = '{$cct_ze}'";

 $query = "
 SELECT
   CASE nivel	     WHEN 'AYAYAI' THEN 'Total' ELSE 'Superior' END AS Nivel_X,
   CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
   CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE modalidad
     WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
     WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
     WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
     WHEN 'NORMAL' 	THEN 'Normal'
     WHEN 'POSGRADO' THEN 'Posgrado'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
   END AS Modalidad_X,
   CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
 GROUP BY nivel, modalidad
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE modalidad
     WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
     WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
     WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
     WHEN 'NORMAL' 	THEN 'Normal'
     WHEN 'POSGRADO' THEN 'Posgrado'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
   END AS Modalidad_X,
   CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
 GROUP BY nivel, modalidad, sostenimiento
 UNION ALL
 SELECT
   CASE nivel
     WHEN 'ESPECIAL' 		THEN 'Especial'
     WHEN 'INICIAL' 			THEN 'Inicial'
     WHEN 'PREESCOLAR' 		THEN 'Preescolar'
     WHEN 'PRIMARIA' 		THEN 'Primaria'
     WHEN 'SECUNDARIA' 		THEN 'Secundaria'
     WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
     WHEN 'SUPERIOR'			THEN 'Superior'
   END AS Nivel_X,
   CASE modalidad
     WHEN 'UNIVERSITARIO Y TECNOLOGICO' 	THEN 'Universitario y Tecnológico'
     WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
     WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
     WHEN 'NORMAL' 						THEN 'Normal'
     WHEN 'POSGRADO' 					THEN 'Posgrado'
     WHEN 'RECTORIAS'       THEN 'Rectorias'
   END AS Modalidad_X,
   CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
   CASE sostenimiento_desagregado
     WHEN 'ESTATAL'	THEN 'Estatal'
     ELSE 'Federal'
   END AS sub_Sostenimiento,
   SUM(docente_m)   				AS Cant_docentes_M,
   SUM(docente_h)   				AS Cant_docentes_H,
   SUM(t_docente)   				AS Cant_docentes_T,
   SUM(directivo_con_grupo_m) 	AS Cant_directivos_con_grupo_M,
   SUM(directivo_con_grupo_h) 	AS Cant_directivos_con_grupo_H,
   SUM(t_directivo_con_grupo) 	AS Cant_directivos_con_grupo_T,
   SUM(directivo_sin_grupo_m) 	AS Cant_directivos_sin_grupo_M,
   SUM(directivo_sin_grupo_h) 	AS Cant_directivos_sin_grupo_H,
   SUM(t_directivo_sin_grupo) 	AS Cant_directivos_sin_grupo_T
 FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR' AND sostenimiento='Publico'
 GROUP BY Nivel_X, Modalidad_X, Sostenimiento_X, sub_Sostenimiento='Estatal'
 ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
 FIELD(Modalidad_X,'Total','Universitario y Tecnológico','Normal','Posgrado','Rectorias'),
 FIELD(Sostenimiento_X,'Total','Público','Autónomo','Privado'),
 FIELD(sub_Sostenimiento,'Total','Estatal','Federal')
 ";
 // echo $query;
 // die();
 return $this->db->query($query)->result_array();
}// get_llenado_tabla2_1_ze()

function get_llenado_tabla3_0_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
  $concat = "";

  $concat .= " AND num_nivel = '{$nivelid}'";

  $concat .= " AND sostenimiento_desagregado = '{$sostenimientoid}'";

  $concat .= " AND num_zona_escolar = '{$num_ze}'";

  $concat .= " AND cct_zona_escolar = '{$cct_ze}'";

$query = "
SELECT
  CASE nivel	 WHEN 'AYAYAI' THEN 'Total' ELSE 'Total (todos los niveles)' END AS Nivel_X,
  CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
  CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat}
UNION ALL
SELECT
  CASE nivel
    WHEN 'ESPECIAL' 		THEN 'Especial'
    WHEN 'INICIAL' 			THEN 'Inicial'
    WHEN 'PREESCOLAR' 		THEN 'Preescolar'
    WHEN 'PRIMARIA' 		THEN 'Primaria'
    WHEN 'SECUNDARIA' 		THEN 'Secundaria'
    WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
    WHEN 'SUPERIOR'			THEN 'Superior'
  END AS nivel,
  CASE sostenimiento
    WHEN 'PUBLICO' 		THEN 'Público'
    WHEN 'AUTONOMO' 	THEN 'Autónomo'
    WHEN 'PRIVADO' 		THEN 'Privado'
  END AS sostenimiento,
  CASE modalidad
    WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS modalidad,
    COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
GROUP BY nivel, sostenimiento
UNION ALL
SELECT
  CASE nivel
    WHEN 'ESPECIAL' 		THEN 'Especial'
    WHEN 'INICIAL' 			THEN 'Inicial'
    WHEN 'PREESCOLAR' 		THEN 'Preescolar'
    WHEN 'PRIMARIA' 		THEN 'Primaria'
    WHEN 'SECUNDARIA' 		THEN 'Secundaria'
    WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
    WHEN 'SUPERIOR'			THEN 'Superior'
  END AS Nivel_X,
  CASE sostenimiento 	WHEN 'AYAYAI'	THEN 'Total'	ELSE 'Total'	END AS Sostenimiento_X,
  CASE modalidad 		WHEN 'AYAYAI' THEN 'Total' 	ELSE 'Total'
  END AS Modalidad_X,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
GROUP BY nivel
UNION ALL
SELECT
  CASE nivel
    WHEN 'ESPECIAL' 		THEN 'Especial'
    WHEN 'INICIAL' 			THEN 'Inicial'
    WHEN 'PREESCOLAR' 		THEN 'Preescolar'
    WHEN 'PRIMARIA' 		THEN 'Primaria'
    WHEN 'SECUNDARIA' 		THEN 'Secundaria'
    WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
    WHEN 'SUPERIOR'			THEN 'Superior'
  END AS Nivel_X,
  CASE sostenimiento
    WHEN 'PUBLICO' 		THEN 'Público'
    WHEN 'AUTONOMO' 	THEN 'Autónomo'
    WHEN 'PRIVADO' 		THEN 'Privado'
  END AS Sostenimiento_X,
  CASE modalidad
    WHEN 'CONAFE (COMUNITARIA)' 				THEN 'CONAFE (COMUNITARIA)'
    WHEN 'USAER' 				THEN 'USAER'
    WHEN 'CONAFE' 				THEN 'CONAFE'
    WHEN 'ND' 				THEN 'ND'
    WHEN 'CAM' 				THEN 'CAM'
    WHEN 'TECNICA' 				THEN 'Técnica'
    WHEN 'INICIAL' 				THEN 'Escolarizada'
    WHEN 'ESCOLARIZADA' 				THEN 'Escolarizada'
    WHEN 'NO ESCOLARIZADA' 				THEN 'No Escolarizada'
    WHEN 'NO ESCOLARIZADO' 				THEN 'No Escolarizada'
    WHEN 'INICIAL NO ESCOLARIZADA'  THEN 'Inicial No Escolarizada'
	WHEN 'INICIAL ESCOLARIZADA' 	THEN 'Inicial Escolarizada'
    WHEN 'INDIGENA' 					THEN 'Indígena'
    WHEN 'GENERAL' 						THEN 'General'
    WHEN 'TECNICA INDUSTRIAL' 			THEN 'Técnica Industrial'
    WHEN 'TECNICA AGROPECUARIA' 		THEN 'Técnica Agropecuaria'
    WHEN 'PARA TRABAJADORES' 			THEN 'Para Trabajadores'
    WHEN 'TELESECUNDARIA' 				THEN 'Telesecundaria'
    WHEN 'BACHILLERATO GENERAL' 		THEN 'Bachillerato General'
    WHEN 'BACHILLERATO TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
    WHEN 'TECNOLOGICO' 	THEN 'Bachillerato Tecnológico'
    WHEN 'PROFESIONAL TECNICO' 			THEN 'Profesional Técnico'
    WHEN 'LICENCIATURA UNIVERSITARIA' 	THEN 'Universitaria'
    WHEN 'LICENCIATURA' 	THEN 'Universitaria'
    WHEN 'POSGRADO' 	THEN 'Universitaria'
    WHEN 'LICENCIATURA NORMAL' 			THEN 'Normal'
    WHEN 'NORMAL' 			THEN 'Normal'
    WHEN 'RECTORIAS'      THEN 'Rectorias'
    ELSE modalidad
  END AS Modalidad_X,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel!='SUPERIOR'
GROUP BY nivel, sostenimiento, modalidad
ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
FIELD(Sostenimiento_X,'Público','Autónomo','Privado'),
FIELD(Modalidad_X,'Total','CAM','USAER','Escolarizada','General','Técnica Industrial','Técnica Agropecuaria',
'Para Trabajadores','Telesecundaria','No Escolarizada','Inicial No Escolarizada','Inicial Escolarizada','Indígena','CONAFE (COMUNITARIA)','CONAFE','ND','Bachillerato General',
'Bachillerato Tecnológico','Profesional Técnico','Universitaria','Normal','Rectorias')
";
// echo $query;
// die();
return $this->db->query($query)->result_array();
}// get_llenado_tabla3_0_ze()

function get_llenado_tabla3_1_ze($nivelid, $sostenimientoid, $num_ze, $cct_ze)
{
  $concat = "";

  $concat .= " AND num_nivel = '{$nivelid}'";

  $concat .= " AND sostenimiento_desagregado = '{$sostenimientoid}'";

  $concat .= " AND num_zona_escolar = '{$num_ze}'";

  $concat .= " AND cct_zona_escolar = '{$cct_ze}'";

$query = "
SELECT
  CASE nivel	     WHEN 'AYAYAI' THEN 'Total' ELSE 'Superior' END AS Nivel_X,
  CASE modalidad     WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Modalidad_X,
  CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
  CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
UNION ALL
SELECT
  CASE nivel
    WHEN 'ESPECIAL' 		THEN 'Especial'
    WHEN 'INICIAL' 			THEN 'Inicial'
    WHEN 'PREESCOLAR' 		THEN 'Preescolar'
    WHEN 'PRIMARIA' 		THEN 'Primaria'
    WHEN 'SECUNDARIA' 		THEN 'Secundaria'
    WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
    WHEN 'SUPERIOR'			THEN 'Superior'
  END AS Nivel_X,
  CASE modalidad
    WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
    WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
    WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
    WHEN 'NORMAL' 	THEN 'Normal'
    WHEN 'POSGRADO' THEN 'Posgrado'
    WHEN 'RECTORIAS'      THEN 'Rectorias'
  END AS Modalidad_X,
  CASE sostenimiento WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS Sostenimiento_X,
  CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
GROUP BY nivel, modalidad
UNION ALL
SELECT
  CASE nivel
    WHEN 'ESPECIAL' 		THEN 'Especial'
    WHEN 'INICIAL' 			THEN 'Inicial'
    WHEN 'PREESCOLAR' 		THEN 'Preescolar'
    WHEN 'PRIMARIA' 		THEN 'Primaria'
    WHEN 'SECUNDARIA' 		THEN 'Secundaria'
    WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
    WHEN 'SUPERIOR'			THEN 'Superior'
  END AS Nivel_X,
  CASE modalidad
    WHEN 'UNIVERSITARIO Y TECNOLOGICO' THEN 'Universitario y Tecnológico'
    WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
    WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
    WHEN 'NORMAL' 	THEN 'Normal'
    WHEN 'POSGRADO' THEN 'Posgrado'
    WHEN 'RECTORIAS'      THEN 'Rectorias'
  END AS Modalidad_X,
  CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
  CASE sostenimiento_desagregado WHEN 'AYAYAI' THEN 'Total'	ELSE 'Total' END AS sub_Sostenimiento,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR'
GROUP BY nivel, modalidad, sostenimiento
UNION ALL
SELECT
  CASE nivel
    WHEN 'ESPECIAL' 		THEN 'Especial'
    WHEN 'INICIAL' 			THEN 'Inicial'
    WHEN 'PREESCOLAR' 		THEN 'Preescolar'
    WHEN 'PRIMARIA' 		THEN 'Primaria'
    WHEN 'SECUNDARIA' 		THEN 'Secundaria'
    WHEN 'MEDIA SUPERIOR' 	THEN 'Media Superior'
    WHEN 'SUPERIOR'			THEN 'Superior'
  END AS Nivel_X,
  CASE modalidad
    WHEN 'UNIVERSITARIO Y TECNOLOGICO' 	THEN 'Universitario y Tecnológico'
    WHEN 'EDUCACION SUPERIOR UNIVERSITARIA' THEN 'Universitario y Tecnológico'
    WHEN 'LICENCIATURA' THEN 'Universitario y Tecnológico'
    WHEN 'NORMAL' 						THEN 'Normal'
    WHEN 'POSGRADO' 					THEN 'Posgrado'
    WHEN 'RECTORIAS'      THEN 'Rectorias'
  END AS Modalidad_X,
  CASE sostenimiento WHEN 'PUBLICO' THEN 'Público' WHEN 'AUTONOMO' THEN 'Autónomo' WHEN 'PRIVADO' THEN 'Privado' END AS Sostenimiento_X,
  CASE sostenimiento_desagregado
    WHEN 'ESTATAL'	THEN 'Estatal'
    ELSE 'Federal'
  END AS sub_Sostenimiento,
  COUNT(escuela) AS escuelas,
   SUM(t_aulas_en_uso)   		AS Cant_aulas_en_uso,
   SUM(grupos_1)   			AS Cant_grupos_1,
   SUM(grupos_2)   			AS Cant_grupos_2,
   SUM(grupos_3)   			AS Cant_grupos_3,
   SUM(grupos_4)   			AS Cant_grupos_4,
   SUM(grupos_5)   			AS Cant_grupos_5,
   SUM(grupos_6)   			AS Cant_grupos_6,
   SUM(grupos_mas_de_un_grado) 	AS Cant_grupos_multigrado,
   SUM(t_grupos)   				AS Cant_grupos
FROM temp_estadistica WHERE 1= 1 {$concat} AND nivel='SUPERIOR' AND sostenimiento='Publico'
GROUP BY Nivel_X, Modalidad_X, Sostenimiento_X, sub_Sostenimiento='Estatal'
ORDER BY FIELD(Nivel_X,'Especial','Inicial','Preescolar','Primaria','Secundaria','Media Superior','Superior'),
FIELD(Modalidad_X,'Total','Universitario y Tecnológico','Normal','Posgrado','Rectorias'),
FIELD(Sostenimiento_X,'Total','Público','Autónomo','Privado'),
FIELD(sub_Sostenimiento,'Total','Estatal','Federal')
";
// echo $query;
// die();
return $this->db->query($query)->result_array();
}// get_llenado_tabla3_1_ze()


}
