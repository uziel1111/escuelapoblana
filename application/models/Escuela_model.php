<?php

class Escuela_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_xcct_turno($cct,$id_turno){
    $str_query = "SELECT id_escuela FROM escuela WHERE clave_ct='".$cct."' AND id_turno=".$id_turno;
    return $this->db->query($str_query)->result_array();
  }

  function getEscuelas($id_municipio = "", $nivel = "", $sostenimiento = "", $clave = "", $mensaje = "", $valorabuscar=""){
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
      $concat .= " AND e.nombre_ct LIKE '%" . $clave . "%' ";
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
      l.nombre_localidad
      FROM escuela e
      INNER JOIN turno t ON t.id_turno = e.id_turno
      INNER JOIN nivel n ON n.id_nivel = e.id_nivel
      INNER JOIN municipio m ON m.id_municipio = e.id_municipio
      INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
      INNER JOIN localidad l ON (l.id_localidad = e.id_localidad AND  m.id_municipio = l.id_municipio)
      WHERE  1=1 AND ( e.nombre_ct LIKE '%".$valorabuscar."%' OR e.nombre_ct LIKE '%".$valorabuscar."%') AND ( 1= 1 ".$concat.")
      GROUP BY e.id_escuela
      ORDER BY e.clave_ct, n.nombre_nivel";
      // echo $query;
      // die();
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
      l.nombre_localidad
      FROM escuela e
      INNER JOIN turno t ON t.id_turno = e.id_turno
      INNER JOIN nivel n ON n.id_nivel = e.id_nivel
      INNER JOIN municipio m ON m.id_municipio = e.id_municipio
      INNER JOIN sostenimiento s ON s.id_sostenimiento = e.id_sostenimiento
      left JOIN localidad l ON (l.id_localidad_a = e.id_localidad AND m.id_municipio = l.id_municipio)
      WHERE 1 = 1". $concat ."
      ORDER BY e.clave_ct, n.nombre_nivel";
      // echo $query;
      // die();
    }#  else

     //echo $query; die();

    ## Ya tenemos completo el string para la consulta, ejecutamos.
    return $this->db->query($query)->result_array();
  }# getEscuelas()

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

    $d_g1 =  0;
    $d_g2 =  0;
    $d_g3 =  0;
    $d_g4 =  0;
    $d_g5 =  0;
    $d_g6 =  0;

    $g_mg = 0;

    $t_docentes =  0;
    $t_alumnos  =  0;
    $t_grupos   =  0;
    $valor_retencion =  0;
    $valor_aprobacion =  0;
    $valor_et =  0;
    $valor_ete =  0;

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

    $arr_analisis_lyc  = array();
    $arr_analisis_mate = array();

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
    INNER JOIN localidad l ON (l.id_localidad_a = e.id_localidad )
    WHERE id_escuela='".$id_escuela."'
    ";

    //echo "<pre>";print_r($query);die();
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
    $html .= "<div class='panel-heading panel_head ft-responsive'>Datos generales</div>";
    $html .= "<div class='panel-body ft-responsive'>";


    if (count($result) >= 1){
      $row = $result[0];

      $global_claveCT      =  $row['clave_ct']; // echo "<pre>"; print_r($row); die();
      $id_turno_global     =  $row['id_turno'];
      $nombre_turno_global =  $row['nombre_turno'];
      $nivel_global        =  $row['nombre_nivel'];

      $html .= "<div class='row'>";
      $html .= "<input id='global_cct' type='hidden' value=$global_claveCT >";
      $html .= "<input id='global_nombre_turno' type='hidden' value=$nombre_turno_global >";
      $html .= "<input id='global_nivel' type='hidden' value=$nivel_global >";
      $html .= "</div>";

      $nivel_datos_escuela = $row['nombre_nivel'];
      $html .= "<div class='row'>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-sm'> Nombre del centro de trabajo: <b>".utf8_encode($row['nombre_ct'])."</b></div>";
      $html .= "</div>";

      $html .= "<div class='row'>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> CCT: <b>".$row['clave_ct']."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> Turno: <b> ".$row['nombre_turno']."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> Nivel: <b> ".$row['nombre_nivel']."</b></div>";
      $nivel = $row['nombre_nivel'];
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> </b></div>";
      $html .= "</div>";
      $html .= "<div class='row'>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> Modalidad: <b>".$row['nombre_modalidad']."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> Sostenimiento: <b>".$row['nombre_sostenimiento']. "</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> Corde: <b> ".($row['nombre_corde'] )."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 ft-responsive-sm'> </b></div>";
      $html .= "</div>";
      $html .= "<div class='row'>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm'> Domicilio: <b> ".($row['domicilio'])."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm'> Localidad: <b> ". ($row['nombre_localidad'])."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm'> Municipio: <b> ".( $row['nombre_municipio'])."</b></div>";
      $html .= "</div>";
      $html .= "<div class='row'>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-8 col-lg-8 ft-responsive-sm'> Nombre del Director: <b> ".($row['nombre_director'])."</b></div>";
      $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm'> Estatus de la escuela: <b>".utf8_encode($row['nombre_estatus'])."</b></div>";
      $html .= "</div>";


    }# if
    else {
      $html .= "<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive'>No se encontraron registros...</div></div>";
    }
    // $html .= "</fieldset>";
    $html .= "</div><!-- panel body -->";
    $html .= "</div><!-- panel-heading -->";
    $html .= "</div><!-- container -->";
    // echo $nivel_global."\n";

      if($nivel_global=='PRIMARIA'){
          $ciclo_escolar_ipermanencia = "17_18";
      }else{
          $ciclo_escolar_ipermanencia = "15_16";
      }



    /////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
    $html .= '
        <div class="container">
        <div class="row margenFila">
        <center>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 ft-responsive-xg";>
        <b>Consulta los indicadores del Modelo Educativo Poblano:</b>
        </div>
        <center>
        </div>

          <div class="row margenFila">
          <center>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10";
                <div class="btn-group">

                <div class="col-xs-10 col-sm-10 col-md-4 col-lg-4 tooltip1">
                  <button id="btn_info_asistencia" type="button" class="btn div_herramientas_naranja tooltip2  ft-responsive-sm" onclick="show_hide(1)">
                  <span style="font-size: 24px;">A</span>sistencia
                  </button>
                  <span class="tooltiptext1"><p> Que todas las niñas y niños de entre 3 y 17 años asistan a la escuela.</p></span>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-4 col-lg-4 tooltip1">
                  <button id="btn_info_permanencia" type="button" class="btn div_herramientas_rojo  ft-responsive-sm" onclick="show_hide(2)">
                  <span style="font-size: 24px;">P</span>ermanencia
                  </button>
                  <span class="tooltiptext1"><p> Que todos los estudiantes concluyan la educación media superior.</p></span>
                </div>
                <div class="col-xs-10 col-sm-10 col-md-4 col-lg-4 tooltip1">
                  <button type="button" class="btn div_herramientas_azul  ft-responsive-sm" onclick="show_hide(3)">
                  <span style="font-size: 24px;">A</span>prendizaje
                  </button>
                  <span class="tooltiptext1"><p> Lograr que cada alumna y alumno adquiera cuando menos los conocimientos básicos de los planes y programas de estudio.</p></span>
                </div>

                </div>
            </div>
            </center>
          </div>
        </div>
        <br> <br>
      ';

  /////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////

    ################################################  LLENAMOS LA TABLA 3



                  ################################################  LLENAMOS LA TABLA 4
                  ################################################  LLENAMOS LA TABLA 4 Estadística
                  ################################################  LLENAMOS LA TABLA 4

                  $query_e = "SELECT
									IFNULL(t_alumnos, 0) AS alumnos_total, IFNULL(t1, 0) AS alumnos_total1,IFNULL(t2, 0) AS alumnos_total2,IFNULL(t3, 0) AS alumnos_total3,
                  IFNULL(t4, 0) AS alumnos_total4, IFNULL(t5, 0) AS alumnos_total5, IFNULL(t6, 0) AS alumnos_total6,
                  IFNULL(t_grupos, 0) AS grupos_total,IFNULL(grupos_1, 0) AS grupos_1,IFNULL(grupos_2, 0) AS grupos_2,IFNULL(grupos_3, 0) AS grupos_3,IFNULL(grupos_4, 0) AS grupos_4,IFNULL(grupos_5, 0) AS grupos_5,IFNULL(grupos_6, 0) AS grupos_6,
                  IFNULL(doc1, 0) AS docentes_1,IFNULL(doc2, 0) AS docentes_2,IFNULL(doc3, 0) AS docentes_3,IFNULL(doc4, 0) AS docentes_4,IFNULL(doc5, 0) AS docentes_5,IFNULL(doc6, 0) AS docentes_6,
                  IFNULL(t_docente, 0) AS total_docentes
                  FROM estadistica_e_indicadoresxesc
                  WHERE escuela='".$global_claveCT."'
                  AND id_turno ='".$id_turno_global."'
                  AND ciclo='2018-2019-INICIO'
                  ";
                   // echo $query_e; die();
                  // $result_e = $obj_db->select($query_e);
                  $result_e = $this->db->query($query_e)->result_array();

                  if (count($result_e)>=1){
                    $row = $result_e[0];
                    // $html .= "<fieldset class='fieldset1'>";
                    // $html .= "<legend class='legend1'>Estadística escolar: Alumnos, Grupos y Docentes.</legend>";
                    $html .= "<div id='div_estadistica_escolar'>";


                    $html .= "<div class='container-fluid'>";
                    $html .= "<div class='panel panel-default panel_content'>";
                    $html .= "<div class='panel-heading panel_head ft-responsive' role='button' data-toggle='collapse' data-target='#demo2' title='Clic para desplegar'><i class='fa fa-chevron fa-fw' ></i>Estadística escolar: alumnos, grupos y docentes</div>";
                    $html .= "<div id='demo2' class='collapse panel-body'>";

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

                    $d_g1 =  $row['docentes_1'];
                    $d_g2 =  $row['docentes_2'];
                    $d_g3 =  $row['docentes_3'];
                    $d_g4 =  $row['docentes_4'];
                    $d_g5 =  $row['docentes_5'];
                    $d_g6 =  $row['docentes_6'];

                    $t_docentes =  $row['total_docentes'];
                    $t_alumnos  = $a_g1+$a_g2+$a_g3+$a_g4+$a_g5+$a_g6 ;
                    $t_grupos   =  $row['grupos_total'];

                    $html .= "<div id='container'>";
                    $html .= "</div>";#contenedor de grafica
                    $html .= "<div class='row margenFila col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-sm'>";

                    $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm' id='div_grafico1' style='height: 400px; margin: 0 auto; width:auto;'></div>";
                    $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm' id='div_grafico2' style='height: 400px; margin: 0 auto; width:auto;'></div>";
                    $html .= "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 ft-responsive-sm' id='div_grafico3' style='height: 400px; margin: 0 auto; width:auto;'></div>";

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
                    $html .= "<div class='col-sm-12' id='div_grafico2' style='Display: none !important; '></div>";
                    $html .= "<div class='col-sm-12' id='div_grafico3' style='Display: none !important; '></div>";

                    $html .= "</div>";/*<div class='col-sm-8'>No se encontraron registros en Estadística escolar: Alumnos, Grupos y Docentes.</div>*/
                    $html .= "<div class='row'></div>";

                  }


                  $html .= "</div>"; // div_estadistica_escolar


                  ################################################  LLENAMOS LA TABLA 3 Programas Federales de Apoyo (Ciclo 2016 - 2017)
                  ################################################  LLENAMOS LA TABLA 3



                  $queryp = " SELECT PIEE,PFCE,PNCE,PETC,PRONI,PRO_ALIM,PRO_ALCIEN
                  FROM programas_de_apoyo_esc_17_18
                  WHERE clave_ct='".$global_claveCT."'
                  AND turno ='".$id_turno_global."'

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


                    // $html .= "<fieldset class='fieldset1'>";
                    // $html .= "<legend class='legend1'>Programas Federales de Apoyo (Ciclo 2016 - 2017)</legend>";
                    $html .= "<div id='div_programas'>";

                    $html .= "<div class='container-fluid'>";
                    $html .= "<div class='panel panel-default panel_content'>";
                    $html .= "<div class='panel-heading panel_head ft-responsive' id='btncolapse_infoesc' role='button' data-toggle='collapse' data-target='#demo' title='Clic para desplegar'><i class='fa fa-chevron fa-fw' ></i>Programas federales de apoyo (ciclo 2017 - 2018)</div>";
                    $html .= "<div id='demo' class='collapse panel-body'>";

                    $html .= "<div class='row margenFila'>";
                    // $html .= "<div>";
                    $html .= "<center>";
                    $html .= "<span class='td_paloma_verde'>[&#x2714;]  </span><label> = Programas vigentes en la escuela</label>";
                    $html .= "</center>";
                    // $html .= "</div>";

                    if ($piee || $pfce || $pnce || $petc || $proni || $pro_alim || $pro_alcien){

                      if ( $piee=='X') {
                        $html .= "<div class='row'>";
                        $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label> Programa para la Inclusión y la Equidad Educativa (PIEE)</label> ";

                        $html .= "</div>";
                      }else{ $html .= "<div class='row'>";
                        $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label> Programa para la Inclusión y la Equidad Educativa (PIEE)</label> ";
                        $html .= "</div>";}
                        if ( $pfce=='X') {
                          $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label>Programa de Fortalecimiento de la Calidad Educativa (PFCE)</label> ";

                          $html .= "</div>";
                          $html .= "</div>";
                        }else{ $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label>Programa de Fortalecimiento de la Calidad Educativa (PFCE)</label> ";
                          $html .= "</div>";
                          $html .= "</div>";}
                          if ( $pnce=='X') {
                            $html .= "<div class='row'>";
                            $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label>Programa Nacional de Convivencia Escolar (PNCE)</label> ";
                            $html .= "";
                            $html .= "</div>";
                          }else{ $html .= "<div class='row'>";
                            $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label>Programa Nacional de Convivencia Escolar (PNCE)</label> ";
                            $html .= "</div>";}
                            if ($petc=='X') {
                              $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label>Programa Escuelas de Tiempo Completo (PETC)</label> ";
                              $html .= "";
                              $html .= "</div>";
                              $html .= "</div>";
                            }else{ $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label>Programa Escuelas de Tiempo Completo (PETC)</label> ";
                              $html .= "</div>";
                              $html .= "</div>";}
                              if ($proni=='X') {
                                $html .= "<div class='row'>";
                                $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label>Programa Nacional de Inglés (PRONI)</label> ";
                                $html .= "";
                                $html .= "</div>";
                              }else{ $html .= "<div class='row'>";
                                $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label>Programa Nacional de Inglés (PRONI)</label> ";
                                $html .= "</div>";}
                                if ($pro_alim=='X') {
                                  $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label>Programa Alimentación</label> ";
                                  $html .= "";
                                  $html .= "</div>";
                                  $html .= "</div>";
                                }else{ $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label>Programa Alimentación</label> ";
                                  $html .= "</div>";
                                  $html .= "</div>";}
                                  if ($pro_alcien=='X') {
                                    $html .= "<div class='row'>";
                                    $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&#x2714;] </span><label>Programa Escuelas al Cien</label> ";
                                    $html .= "";
                                    $html .= "</div>";
                                    $html .= "</div>";
                                  }else{
                                    // $html .= "<div class='row'>";
                                    // $html .= "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 ft-responsive-sm'><span class='td_paloma_verde'> [&nbsp; ] </span><label>Programa Escuelas al Cien</label> ";
                                    // $html .= "</div>";
                                    // $html .= "</div>";
                                  }

                                  }
                                  // $html .= "</fieldset>";
                                  $html .= "</div><!-- panel body -->";
                                  $html .= "</div><!-- panel-content -->";
                                  $html .= "</div><!-- container -->";
                                  $html .= "<br>";
                                }
                                else{
                                  /*<div class='col-sm-12'>No se encontraron registros en Programas Federales de Apoyo (Ciclo 2016 - 2017)</div>*/
                                  $html .= "<div class='row'></div>";
                                }

                                $html .= "</div>";
                                $html .= "</div>"; // div programas


                  ////////////////////RIESGO DE abandono
                  $bim=1;
                  $titulo_planea="";
                  $titulo_planea2="";
                  $ciclo_es="";
                  $ciclo_e="";
                  if($nivel_global=='PRIMARIA')
                  {
                    $tabla_riesgo = "riesgoprimp".$bim."c1819";
                    $titulo_planea="PLANEA 2018";
                    $titulo_planea2="PLANEA 2016";
                    $ciclo_es='15_16';
                    $ciclo_e='17_18';

                  }
                  else
                  {
                    $tabla_riesgo = "riesgosecp".$bim."c1819";
                    $titulo_planea="PLANEA 2016";
                    $titulo_planea2="PLANEA 2015";
                    $ciclo_es='14_15';
                    $ciclo_e='15_16';
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
                      // $html .= "<fieldset class='fieldset1'>";
                      // $html .= "<legend class='legend1'>Riesgo de Abandono Escolar.</legend>";

                      $html .= "<div id='div_abandono_escolar'>";
                      $html .= "<div class='container-fluid'>";
                      $html .= "<div class='panel panel-default panel_content'>";
                      $html .= "<div class='panel-heading panel_head' role='button' data-toggle='collapse' data-target='#demo3' title='Clic para desplegar'><i class='fa fa-chevron fa-fw' ></i>Riesgo de abandono escolar.</div>";
                      $html .= "<div id='demo3' class='collapse panel-body'>";


                      /************************************************************************************************************************/
                      $html .= "<div id='div_info_riesgoabandono'>";
                      /************************************************************************************************************************/
                      // echo $ciclo_escolar_estadistica;
                      // die();
                      $html .= '          <div class="row">';
                      $html .= '            <form id="form_riesgoporct" name="form_riesgoporct">';
                      $html .= '              <div class="col-sm-2"> </div>';
                      $html .= '              <div class="col-sm-3">';
                      $html .= '                <div class="form-group">';
                      $html .= '                  <label>Bimestre: </label>';
                      if($ciclo_escolar_estadistica=='2018-2019-Inicio'){
                        $html .= '                  <select id="select_opcbimestre" name="select_opcbimestre" class="form-control">';
                        $html .= '                    <option value="1" selected="selected">1er Periodo</option>';
                        $html .= '                    <option value="2">2do Periodo</option>';
                        $html .= '                    <option value="3">3er Periodo</option>';
                        $html .= '                  </select>';
                      }else{
                        $html .= '                  <select id="select_opcbimestre" name="select_opcbimestre" class="form-control">';
                        $html .= '                    <option value="1">1er Bimestre</option>';
                        $html .= '                    <option value="2">2do Bimestre</option>';
                        $html .= '                    <option value="3" selected="selected">3er Bimestre</option>';
                        $html .= '                    <option value="4">4to Bimestre</option>';
                        $html .= '                    <option value="5">5to Bimestre</option>';
                        $html .= '                  </select>';
                      }
                      


                      $html .= '                </div>';
                      $html .= '              </div>';
                      $html .= '              <div class="col-sm-3">';
                      $html .= '                <div class="form-group">';
                      $html .= '                  <label>Ciclo Escolar:</label>';
                      $html .= '                  <select id="select_opcciclo" name="select_opcciclo" class="form-control">';
                      $html .= '                    <option value="2016-2017">2016 - 2017</option>';
                      $html .= '                    <option value="2017-2018">2017 - 2018</option>';
                      $html .= '                    <option value="2018-2019" selected="selected">2018 - 2019</option>';

                      $html .= '                  </select>';
                      $html .= '                </div>';
                      $html .= '              </div>';
                      $html .= '            </form>';
                      $html .= '            <div class="col-sm-2">';
                      $html .= '              <div style="margin-top:23px;">';
                      $html .= '                <button style="color: white; background-color: #3C5AA2;" id="btnBuscarCT" type="button"  class="btn" onclick="get_riesgo_abandono()">Consultar</button>';
                      $html .= '              </div>';
                      $html .= '            </div>';
                      $html .= '           <div class="col-sm-2"> </div>';
                      $html .= '          </div>';

                      $total_alumnos =  $row['total_alumnos'];
                      $muyalto =  $row['muyalto_riesgo'] + $row['zombies'];
                      $alto =  $row['alto_riesgo'];
                      $medio =  $row['medio_riesgo'];
                      $bajo =  $row['bajo_riesgo'];

                      $html .= '       <div id="contenedor_riesgo">';
                      $html .= '        <div class="row contenedorfila">';
                      $html .= '            <div class="col-sm-6" id="containerpiechartRiesgo" style="height: 400px; margin: 0 auto; width:auto;"></div>';

                      $html .= '            <div class="col-sm-6" id="containerbarchartRiesgo" style="height: 400px; margin: 0 auto; width:auto;"></div>';

                      $html .= '        </div>';
                      $html .= '        <div class="row contenedorfila">';
                      $html .= '          <div class="col-sm-6">';
                      $html .= '            <table id="tabla_pie_info" class="table table-gray table-hover">';
                      $html .= '              <thead>';
                      $html .= '                <tr>';
                      $html .= '                  <th  class="text-center tbt-responsive-xw">Total</th>';
                      $html .= '                  <th  class="text-center tbt-responsive-xw">Muy Alto</th>';
                      $html .= '                  <th  class="text-center tbt-responsive-xw">Alto</th>';
                      $html .= '                  <th  class="text-center tbt-responsive-xw">Medio</th>';
                      $html .= '                  <th  class="text-center tbt-responsive-xw">Bajo</th>';
                      $html .= '                </tr>';
                      $html .= '              </thead>';
                      $html .= '              <tbody>';
                      $html .= '                <tr>';
                      $html .= '                  <td class="text-center tbt-responsive-xw tbt-responsive-xw" style=" font-weight:500;">'.$total_alumnos.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw tbt-responsive-xw" style="background-color:#FF0000; color:white;  font-weight:600;">'.$muyalto.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw tbt-responsive-xw" style="background-color:#FF9900;  font-weight:500;">'.$alto.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw tbt-responsive-xw" style="background-color:#FFFF00;  font-weight:500;">'.$medio.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw tbt-responsive-xw" style="background-color:#3CB371;  font-weight:500;">'.$bajo.'</td>';
                      $html .= '                </tr>';
                      $html .= '              </tbody>';
                      $html .= '            </table>';


                      if($nivel_global=='PRIMARIA')
                      {
                        $tabla_estatusb= "estatusbprimp".$bim."c1819";;
                      }
                      else
                      {
                        $tabla_estatusb= "estatusbsecp".$bim."c1819";;
                      }


                      $query_desertor =     "
                      SELECT COUNT(CCT) AS desertores FROM  $tabla_estatusb WHERE MOTIVO!='FALLECIMIENTO' AND CCT='$global_claveCT' AND TURNO='$nombre_turno_global'
                      ";

                      // $result_riesgot = $obj_db->select($query_riesgot);
                      $result_desertor = $this->db->query($query_desertor)->result_array();

                      if (count($result_desertor) >=1){
                        $row = $result_desertor[0];

                        $desertores =  $row['desertores'];

                      }

                      $html .= '
                                      <div class="col-sm-12">

                                    <table id="tabla_desertores" class="table table-hover text-center">
                                      <thead>
                                        <tr>
                                        <th width="20%">Alumnos que posiblemente han abandonado la escuela</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr id="total">
                                          <td id="mis_td">'.$desertores.'</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    </div>';




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
                        $html .= '                  <th class="text-center tbt-responsive-xw"></th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">1°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">2°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">3°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">4°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">5°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">6°</th>';
                        $html .= '                </tr>';
                        $html .= '              </thead>';
                        $html .= '              <tbody>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Total</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total6.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Muy Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto6.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto6.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Medio</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio6.'</td>';
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
                        $html .= '                  <th class="text-center tbt-responsive-xw"></th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">1°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">2°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">3°</th>';
                        $html .= '                </tr>';
                        $html .= '              </thead>';
                        $html .= '              <tbody>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Total</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total3.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Muy Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto3.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto3.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Medio</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio3.'</td>';
                        $html .= '                </tr>';
                        $html .= '              </tbody>';
                        $html .= '            </table>';

                        $html .= '          </div>';

                      }



                      $html .= '        </div>';
                      $html .= '        </div>';

                      /************************************************************************************************************************/
                      $html .= "</div>";
                      /************************************************************************************************************************/


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


                  $html .= "</div>"; // div_abandono_escolar


                  ################################################  LLENAMOS LA TABLA 5
                  ################################################  LLENAMOS LA TABLA 5 Indicadores de Permanencia
                  ################################################  LLENAMOS LA TABLA 5



                  $query_ip = "SELECT
									IF(retencion='No Aplica' OR retencion='N/D' ,0,ROUND(retencion*100,2)) AS retencion,
                  IF(aprobacion='No Aplica' OR aprobacion='N/D',0,ROUND(aprobacion*100,2)) AS aprobacion,
                  IF(`eficiencia terminal`='No Aplica' OR `eficiencia terminal`='N/D',0,ROUND(`eficiencia terminal`*100,2)) AS eficiencia_terminal
                  FROM estadistica_e_indicadoresxesc
                  WHERE escuela='".$global_claveCT."'
                  AND id_turno ='".$id_turno_global."'
                  AND ciclo='2016-2017-INICIO'
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

                    // $html .= "<fieldset class='fieldset1'>";
                    // $html .= "<legend class='legend1'>Indicadores de Permanencia.</legend>";
                    $html .= "<div id='div_indicadores_permanencia'>";
                    $html .= "<div class='container-fluid'>";
                    $html .= "<div class='panel panel-default panel_content'>";
                    $html .= "<div class='panel-heading panel_head' role='button' data-toggle='collapse' data-target='#demo4' title='Clic para desplegar'><i class='fa fa-chevron fa-fw' ></i>Indicadores de Permanencia</div>";
                    $html .= "<div id='demo4' class='collapse panel-body'>";

                    $html .= "<div class='row'>";
                    $html .= "<div class='col-sm-4'>";
                    $html .= "<div id='containerRPB01'></div>";
                    $html .= " <center>
                                  <div class='tooltip2' style='cursor:default; font-size:1.5em;'>
                                    Retención
                                    <span class='tooltiptext2'><p>Porcentaje de alumnos que permanecen en la escuela entre ciclos escolares consecutivos antes de concluir el nivel educativo de referencia, por cada cien alumnos matriculados al inicio del ciclo escolar.</p><i>- (INEE)</i></span>
                                  </div>
                                </center>
                              </div>
                              <div class='col-sm-4'>
                              <div id='containerRPB02'  style='Display: none !important; '></div>
                              </div> <!-- col-4 -->
                              <div class='col-sm-4'>
                              <div id='containerRPB03'></div>
                              <center><div class='tooltip2' style='cursor:default; font-size:1.5em;'>  Eficiencia Terminal
                                <span class='tooltiptext2'><p>Porcentaje de alumnos que egresan de cierto nivel o tipo educativo en un determinado ciclo escolar por cada cien alumnos de nuevo ingreso, inscritos tantos ciclos escolares atrás como dure el nivel o tipo educativo en cuestión.</p><i>- (INEE)</i></span>
                              </div></center>
                              </div> <!-- col-4 -->
                                ";

                    $html .= "</div><!-- row -->";
                    $html .= "</div><!-- panel body -->";
                    $html .= "</div><!-- panel_content -->";
                    $html .= "</div><!-- container -->";
                    $html .= "<br>";
                    // <div id='containerRPB02'></div>
                    // <center>
                    //   <div class='tooltip2' style='cursor:default; font-size:1.5em;'>
                    //   Aprobación
                    //   <span class='tooltiptext2'><p>Porcentaje de alumnos aprobados de un determinado grado, por cada cien alumnos que están matriculados al final del ciclo escolar.</p><i>- (INEE)</i></span>
                    //   </div>
                    // </center>


                  }else{
                    //$html .= "<br>";
                    $html .= "<div id='containerRPB01' style='Display: none !important; '></div>";
                    $html .= "<div id='containerRPB02' style='Display: none !important; '></div>";
                    $html .= "<div id='containerRPB03' style='Display: none !important; '></div>";/*<div class='col-sm-8'>No se encontraron registros en Indicadores de Permanencia.</div>*/
                    $html .= "<div class='row'></div>";

                  }

                  $html .= "</div>"; // div_indicadores_permanencia




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
                  $ILC17 =0;
                  $IILC17 =0;
                  $IIILC17 =0;
                  $IVLC17 =0;
                  $IMAT17 =0;
                  $IIMAT17 =0;
                  $IIIMAT17 =0;
                  $IVMAT17 =0;
                  $ILC15est =0;
                  $IILC15est =0;
                  $IIILC15est =0;
                  $IVLC15est =0;
                  $IMAT15est =0;
                  $IIMAT15est =0;
                  $IIIMAT15est =0;
                  $IVMAT15est =0;
                  $ILC16est =0;
                  $IILC16est =0;
                  $IIILC16est =0;
                  $IVLC16est =0;
                  $IMAT16est =0;
                  $IIMAT16est =0;
                  $IIIMAT16est =0;
                  $IVMAT16est =0;
                  $ILC17est =0;
                  $IILC17est =0;
                  $IIILC17est =0;
                  $IVLC17est =0;
                  $IMAT17est =0;
                  $IIMAT17est =0;
                  $IIIMAT17est =0;
                  $IVMAT17est =0;

                  $ILC15nac =0;
                  $IILC15nac =0;
                  $IIILC15nac =0;
                  $IVLC15nac =0;
                  $IMAT15nac =0;
                  $IIMAT15nac =0;
                  $IIIMAT15nac =0;
                  $IVMAT15nac =0;
                  $ILC16nac =0;
                  $IILC16nac =0;
                  $IIILC16nac =0;
                  $IVLC16nac =0;
                  $IMAT16nac =0;
                  $IIMAT16nac =0;
                  $IIIMAT16nac =0;
                  $IVMAT16nac =0;
                  $ILC17nac =0;
                  $IILC17nac =0;
                  $IIILC17nac =0;
                  $IVLC17nac =0;
                  $IMAT17nac =0;
                  $IIMAT17nac =0;
                  $IIIMAT17nac =0;
                  $IVMAT17nac =0;
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
                  AND ciclo_escolar = '".$ciclo_es."'
                  ";

                  $query_ipe17 =     "SELECT

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
                  AND ciclo_escolar = '16_17'
                  ";

                  // echo $query_ipe17."\n";

                  $result_ipe17 = $this->db->query($query_ipe17)->result_array();

                  if (count($result_ipe17)>=1){
                    $row = $result_ipe17[0];
                    $lco_bueno17 = (double)$row['IIILC']+(double)$row['IVLC'];
                    $mat_bueno17 = (double)$row['IIIMAT']+(double)$row['IVMAT'];

                    $ILC17 =  $row['ILC'];
                    $IILC17 =  $row['IILC'];
                    $IIILC17 =  $row['IIILC'];
                    $IVLC17 =  $row['IVLC'];

                    $IMAT17 =  $row['IMAT'];
                    $IIMAT17 =  $row['IIMAT'];
                    $IIIMAT17 =  $row['IIIMAT'];
                    $IVMAT17 =  $row['IVMAT'];
                  }

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

                  $query_ipest15 =     "
                  SELECT
                  lyc_I, lyc_II, lyc_III,lyc_IV, mat_I, mat_II, mat_III, mat_IV
                  FROM planea_x_muni
                  WHERE Nivel='".$nivel_global."' AND Num_Municipio=0 AND Periodo='".$ciclo_es."'
                  ";

                  // echo $query_ipest15."\n";
                  $result_ipest15 = $this->db->query($query_ipest15)->result_array();

                  if (count($result_ipest15)>=1){
                    $row = $result_ipest15[0];

                    $ILC15est =  $row['lyc_I'];
                    $IILC15est =  $row['lyc_II'];
                    $IIILC15est =  $row['lyc_III'];
                    $IVLC15est =  $row['lyc_IV'];

                    $IMAT15est =  $row['mat_I'];
                    $IIMAT15est =  $row['mat_II'];
                    $IIIMAT15est =  $row['mat_III'];
                    $IVMAT15est =  $row['mat_IV'];
                  }

                  $query_ipest16 =     "
                  SELECT
                  lyc_I, lyc_II, lyc_III,lyc_IV, mat_I, mat_II, mat_III, mat_IV
                  FROM planea_x_muni
                  WHERE Nivel='".$nivel_global."' AND Num_Municipio=0 AND Periodo='".$ciclo_e."'
                  ";
                  // echo $query_ipest16;
                  // die();
                  $result_ipest16 = $this->db->query($query_ipest16)->result_array();

                  if (count($result_ipest16)>=1){
                    $row = $result_ipest16[0];

                    $ILC16est =  $row['lyc_I'];
                    $IILC16est =  $row['lyc_II'];
                    $IIILC16est =  $row['lyc_III'];
                    $IVLC16est =  $row['lyc_IV'];

                    $IMAT16est =  $row['mat_I'];
                    $IIMAT16est =  $row['mat_II'];
                    $IIIMAT16est =  $row['mat_III'];
                    $IVMAT16est =  $row['mat_IV'];
                  }

                  $query_ipest17 =     "
                  SELECT
                  lyc_I, lyc_II, lyc_III,lyc_IV, mat_I, mat_II, mat_III, mat_IV
                  FROM planea_x_muni
                  WHERE Nivel='".$nivel_global."' AND Num_Municipio=0 AND Periodo='16_17'
                  ";

                  $result_ipest17 = $this->db->query($query_ipest17)->result_array();

                  if (count($result_ipest17)>=1){
                    $row = $result_ipest17[0];

                    $ILC17est =  $row['lyc_I'];
                    $IILC17est =  $row['lyc_II'];
                    $IIILC17est =  $row['lyc_III'];
                    $IVLC17est =  $row['lyc_IV'];

                    $IMAT17est =  $row['mat_I'];
                    $IIMAT17est =  $row['mat_II'];
                    $IIIMAT17est =  $row['mat_III'];
                    $IVMAT17est =  $row['mat_IV'];
                  }

                  $query_ipenac15 =     "
                  SELECT
                  lyc_I, lyc_II, lyc_III,lyc_IV, mat_I, mat_II, mat_III, mat_IV
                  FROM planea_nacionalxnivel
                  WHERE nivel='".$nivel_global."' AND periodo='15_16'
                  ";

                  $result_ipenac15 = $this->db->query($query_ipenac15)->result_array();

                  if (count($result_ipenac15)>=1){
                    $row = $result_ipenac15[0];

                    $ILC15nac =  $row['lyc_I'];
                    $IILC15nac =  $row['lyc_II'];
                    $IIILC15nac =  $row['lyc_III'];
                    $IVLC15nac =  $row['lyc_IV'];

                    $IMAT15nac =  $row['mat_I'];
                    $IIMAT15nac =  $row['mat_II'];
                    $IIIMAT15nac =  $row['mat_III'];
                    $IVMAT15nac =  $row['mat_IV'];
                  }

                  $query_ipenac16 =     "
                  SELECT
                  lyc_I, lyc_II, lyc_III,lyc_IV, mat_I, mat_II, mat_III, mat_IV
                  FROM planea_nacionalxnivel
                  WHERE nivel='".$nivel_global."' AND periodo='15_16'
                  ";

                  $result_ipenac16 = $this->db->query($query_ipenac16)->result_array();

                  if (count($result_ipenac16)>=1){
                    $row = $result_ipenac16[0];

                    $ILC16nac =  $row['lyc_I'];
                    $IILC16nac =  $row['lyc_II'];
                    $IIILC16nac =  $row['lyc_III'];
                    $IVLC16nac =  $row['lyc_IV'];

                    $IMAT16nac =  $row['mat_I'];
                    $IIMAT16nac =  $row['mat_II'];
                    $IIIMAT16nac =  $row['mat_III'];
                    $IVMAT16nac =  $row['mat_IV'];
                  }

                  $query_ipenac17 =     "
                  SELECT
                  lyc_I, lyc_II, lyc_III,lyc_IV, mat_I, mat_II, mat_III, mat_IV
                  FROM planea_nacionalxnivel
                  WHERE nivel='".$nivel_global."' AND periodo='16_17'
                  ";

                  $result_ipenac17 = $this->db->query($query_ipenac17)->result_array();

                  if (count($result_ipenac17)>=1){
                    $row = $result_ipenac17[0];

                    $ILC17nac =  $row['lyc_I'];
                    $IILC17nac =  $row['lyc_II'];
                    $IIILC17nac =  $row['lyc_III'];
                    $IVLC17nac =  $row['lyc_IV'];

                    $IMAT17nac =  $row['mat_I'];
                    $IIMAT17nac =  $row['mat_II'];
                    $IIIMAT17nac =  $row['mat_III'];
                    $IVMAT17nac =  $row['mat_IV'];
                  }

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
                  AND ciclo_escolar = '".$ciclo_es."'
                  ";





                  // $result_ipe = $obj_db->select($query_ipe);
                  // echo $query_ipe;
                  // die();
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


                    // $html .= "<fieldset class='fieldset1'>";
                    // $html .= "<legend class='legend1'>Indicadores de Aprendizaje.</legend>";
                    $html .= "<div id='div_indicadores_aprendizaje'>";

                    $html .= "<div class='container-fluid'>";

                                        $html .= '
                                        <div class="panel panel-default">
                                            <div class="panel-heading panel_head" role="button" data-toggle="collapse" data-target="#demo51" title="Clic para desplegar">
                                              <i class="fa fa-chevron fa-fw" ></i>PLANEA por contenido temático<br>Lenguaje y Comunicación
                                            </div>
                                            <div class="panel-body collapse" id="demo51">
                                            <center>
                                            <div class="row margintop10">

                                                      <div class="row">
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-xg"></div>
                                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-xg">
                                                            <p style="1.9vh;">Presiona clic en cada barra para conocer las preguntas en las que hubo más errores<p>
                                                          </div>
                                                     </div>

                                                     <div class="row">
                                                        <div class="col-sm-12">
                                                          <div id="containerbar_unidad_analisis_lyc"></div>
                                                        </div>
                                                      </div>

                                             </div>
                                            </center>
                                          </div>
                                        </div>

                                         <br>
                                          ';


                                          $html .= '
                                          <div class="panel panel-default">
                                              <div class="panel-heading panel_head" role="button" data-toggle="collapse" data-target="#demo52" title="Clic para desplegar">
                                                <i class="fa fa-chevron fa-fw" ></i>PLANEA por contenido temático<br>Matemáticas
                                              </div>
                                              <div class="panel-body collapse" id="demo52">
                                              <center>
                                              <div class="row margintop10">

                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-xg"></div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-xg">
                                                              <p style="1.9vh;">Presiona clic en cada barra para conocer las preguntas en las que hubo más errores<p>
                                                            </div>
                                                       </div>

                                                       <div class="row">
                                                          <div class="col-sm-12">
                                                            <div id="containerbar_unidad_analisis_mate"></div>
                                                          </div>
                                                        </div>

                                               </div>
                                              </center>
                                            </div>
                                          </div>

                                           <br>
                                            ';


                    $html .= "<div class='panel-heading panel_head' role='button' data-toggle='collapse' data-target='#demo53' title='Clic para desplegar'><i class='fa fa-chevron fa-fw' ></i>PLANEA por niveles de logro</div>";
                    $html .= '<div id="demo53" class="collapse panel-body">';
                    $html .= '<br><div class="row margintop10">';
                    $html .= '<div class="row">';

                    $html .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-xg">';
                    $html .= '  <center><h3 id="containertitulo" style="margin:0 auto;"></h3></center>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '<div class="row">';
                    $html .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                    $html .= '  <center>';
                    if ($nivel_global=='MEDIA SUPERIOR' || $nivel_global=='SECUNDARIA') {
                      $html .= '    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">';
                      $html .= '      <div style="display:inline-block; width:20px; height:20px; background-color:#ECC462; border: 1px solid black;"></div>';
                      $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2015</p>';
                      $html .= '    </div>';
                      $html .= '    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">';
                      $html .= '       <div style="display:inline-block; margin-left:30px; width:20px; height:20px; background-color:#D5831C; border: 1px solid black;"></div>';
                      $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2016</p>';
                      $html .= '    </div>';
                      $html .= '    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">';
                      $html .= '       <div style="display:inline-block; margin-left:30px; width:20px; height:20px; background-color:#935116; border: 1px solid black;"></div>';
                      $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2017</p>';
                      $html .= '    </div>';
                    }
                    else {
                      $html .= '    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">';
                      $html .= '      <div style="display:inline-block; width:20px; height:20px; background-color:#ECC462; border: 1px solid black;"></div>';
                      $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2016</p>';
                      $html .= '    </div>';
                      $html .= '    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">';
                      $html .= '       <div style="display:inline-block; margin-left:30px; width:20px; height:20px; background-color:#D5831C; border: 1px solid black;"></div>';
                      $html .= '      <p style="display:inline-block; font-size:1.5em; margin-left:10px;">2018</p>';
                      $html .= '    </div>';
                    }

                    $html .= '  </center>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                    $html .= '<div class="row"> ';

                    $html .= '  <div class="col-sm-6" id="containerpiedrilldown01" style="height: 400px; margin: 0 auto; width:auto;" ></div>';


                    $html .= '  <div class="col-sm-6" id="containerpiedrilldown02" style="height: 400px; margin: 0 auto; width:auto;" ></div>';

                    $html .= '</div>';


                    $html .= '<div class="row"> ';
                    $html .= "<div class='table-responsive col-sm-12'  style='whith:80%;'>";

                    $html .= "<table id='tabla_planea' class='table table-gray table-hover'>";
                    $html .= "<thead>  ";
                    $html .= "<tr>    ";
                    $html .= "<th class='text-center' rowspan='2'></th>    ";
                    $html .= "<th class='text-center' colspan='4'>Lenguaje y Comunicación</th>   ";
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

                    if ($nivel_global=='MEDIA SUPERIOR' || $nivel_global=='SECUNDARIA') {

                    $html .= "<tr><td colspan='9' style='background-color:silver;'>PLANEA 2017";
                    $html .= "</td></tr>  <tr>    <th class='text-center'>Tu escuela";
                    $html .= "</th>    <td id='lycI_16' class='text-center'>".$ILC17."%";
                    $html .= "</td>    <td id='lycII_16' class='text-center'>".$IILC17."%";
                    $html .= "</td>    <td id='lycIII_16' class='text-center'>".$IIILC17."%";
                    $html .= "</td>    <td id='lycIV_16' class='text-center'>".$IVLC17."%";
                    $html .= "</td>    <td id='matI_16' class='text-center'>".$IMAT17."%";
                    $html .= "</td>    <td id='matII_16' class='text-center'>".$IIMAT17."%";
                    $html .= "</td>    <td id='matIII_16' class='text-center'>".$IIIMAT17."%";
                    $html .= "</td>    <td id='matIV_16' class='text-center'>".$IVMAT17."%";

                    $html .= "</td>  </tr>  <tr>    <th class='text-center'>Estado de Puebla";
                    $html .= "</th>";
                    $html .= "<td class='text-center'>".$ILC17est."</td>    ";
                    $html .= "<td class='text-center'>".$IILC17est."</td>    ";
                    $html .= "<td class='text-center'>".$IIILC17est."</td>    ";
                    $html .= "<td class='text-center'>".$IVLC17est."</td>    ";
                    $html .= "<td class='text-center'>".$IMAT17est."</td>    ";
                    $html .= "<td class='text-center'>".$IIMAT17est."</td>    ";
                    $html .= "<td class='text-center'>".$IIIMAT17est."</td>    ";
                    $html .= "<td class='text-center'>".$IVMAT17est."</td></tr>  ";
                    $html .= "<tr>    <th class='text-center'>Nacional";
                    $html .= "</th>";
                    $html .= "<td class='text-center'>".$ILC17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IILC17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IIILC17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IVLC17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IMAT17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IIMAT17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IIIMAT17nac."</td>    ";
                    $html .= "<td class='text-center'>".$IVMAT17nac."</td></tr>  ";

                    $html .= "</td>  </tr> ";
                    $html .= "</th>";
                  }

                  $html .= "<tr><td colspan='9' style='background-color:silver;'>".$titulo_planea;
                  $html .= "</td></tr>  <tr>    <th class='text-center'>Tu escuela";
                  $html .= "</th>    <td id='lycI_16' class='text-center'>".$ILC."%";
                  $html .= "</td>    <td id='lycII_16' class='text-center'>".$IILC."%";
                  $html .= "</td>    <td id='lycIII_16' class='text-center'>".$IIILC."%";
                  $html .= "</td>    <td id='lycIV_16' class='text-center'>".$IVLC."%";
                  $html .= "</td>    <td id='matI_16' class='text-center'>".$IMAT."%";
                  $html .= "</td>    <td id='matII_16' class='text-center'>".$IIMAT."%";
                  $html .= "</td>    <td id='matIII_16' class='text-center'>".$IIIMAT."%";
                  $html .= "</td>    <td id='matIV_16' class='text-center'>".$IVMAT."%";
                  $html .= "</td>  </tr>  <tr>    <th class='text-center'>Estado de Puebla";
                  $html .= "</th>";
                  $html .= "<td class='text-center'>".$ILC16est."</td>    ";
                  $html .= "<td class='text-center'>".$IILC16est."</td>    ";
                  $html .= "<td class='text-center'>".$IIILC16est."</td>    ";
                  $html .= "<td class='text-center'>".$IVLC16est."</td>    ";
                  $html .= "<td class='text-center'>".$IMAT16est."</td>    ";
                  $html .= "<td class='text-center'>".$IIMAT16est."</td>    ";
                  $html .= "<td class='text-center'>".$IIIMAT16est."</td>    ";
                  $html .= "<td class='text-center'>".$IVMAT16est."</td></tr>  ";
                  $html .= "<tr>    <th class='text-center'>Nacional";
                  $html .= "</th>";
                  $html .= "<td class='text-center'>".$ILC16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IILC16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IIILC16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IVLC16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IMAT16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IIMAT16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IIIMAT16nac."</td>    ";
                  $html .= "<td class='text-center'>".$IVMAT16nac."</td></tr>  ";

                    $html .= "<tr>";
                    $html .= "<td colspan='9' style='background-color:silver;'>".$titulo_planea2."</td></tr><tr>   ";
                    $html .= "<th class='text-center'>Tu escuela</th>    ";
                    $html .= "<td id='lycI_15' class='text-center'>".$ILC15."%</td>    ";
                    $html .= "<td id='lycII_15' class='text-center'>".$IILC15."%</td>    ";
                    $html .= "<td id='lycIII_15' class='text-center'>".$IIILC15."%</td>    ";
                    $html .= "<td id='lycIV_15' class='text-center'>".$IVLC15."%</td>    ";
                    $html .= "<td id='matI_15' class='text-center'>".$IMAT15."%</td>    ";
                    $html .= "<td id='matII_15' class='text-center'>".$IIMAT15."%</td>    ";
                    $html .= "<td id='matIII_15' class='text-center'>".$IIIMAT15."%</td>    ";
                    $html .= "<td id='matIV_15' class='text-center'>".$IVMAT15."%</td></tr><tr>    ";
                    $html .= "<th class='text-center'>Estado de Puebla</th>    ";
                    $html .= "<td class='text-center'>".$ILC15est."</td>    ";
                    $html .= "<td class='text-center'>".$IILC15est."</td>    ";
                    $html .= "<td class='text-center'>".$IIILC15est."</td>    ";
                    $html .= "<td class='text-center'>".$IVLC15est."</td>    ";
                    $html .= "<td class='text-center'>".$IMAT15est."</td>    ";
                    $html .= "<td class='text-center'>".$IIMAT15est."</td>    ";
                    $html .= "<td class='text-center'>".$IIIMAT15est."</td>    ";
                    $html .= "<td class='text-center'>".$IVMAT15est."</td></tr>  ";
                    $html .= "<tr>    ";
                    $html .= "<th class='text-center'>Nacional";
                    $html .= "</th>    ";
                    $html .= "<td class='text-center'>".$ILC15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IILC15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IIILC15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IVLC15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IMAT15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IIMAT15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IIIMAT15nac."</td>    ";
                    $html .= "<td class='text-center'>".$IVMAT15nac."</td></tr>  ";




                    $html .= "</tbody>";
                    $html .= "</table>";
                    $html .= "</div>";



                    $html .= '</div></div></div></div><br>';


                    $query_ipete = "SELECT IF(ete='No Aplica' OR ete='N/D',0,ete) AS eficiencia_terminal_efectiva
                    FROM etexesc
                    WHERE cct='".$global_claveCT."'
                    AND turno ='".$nombre_turno_global."'
                    ";
                    // echo $query_ipete; die();
                    // $result_ip = $obj_db->select($query_ip);
                    $result_ipete = $this->db->query($query_ipete)->result_array();
                    // echo "<pre>";
                    // print_r($result_ip);
                    // die();

                    if (count($result_ipete) >= 1){
                      $row = $result_ipete[0];
                      // 	echo "<pre>";
                      // print_r($row);
                      // die();

                      $ete = ($row['eficiencia_terminal_efectiva']!="")?$row['eficiencia_terminal_efectiva']:"El sistema no cuenta con esta información";


                      $valor_ete =   $row['eficiencia_terminal_efectiva'];



                      $html .= "<div class='panel-heading panel_head' role='button' data-toggle='collapse' data-target='#demo54' title='Clic para desplegar'><i class='fa fa-chevron fa-fw' ></i>Eficiencia Terminal Efectiva</div>";
                      $html .= '<div id="demo54" class="collapse panel-body">';
                      $html .= '<br><div class="row margintop10">';
                      $html .= '<div class="row">';

                      $html .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-xg"><center>E.T.E. 2016</center></div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center><p style="1em;">
                        <b>De quienes inician el nivel educativo,
                         ¿Qué porcentaje lo termina y además aprende lo esencial?</b></p>
                         <br>
                         <p style="0.5em;">A esta pregunta responde el nuevo indicador de Eficiencia Terminal Efectiva (ETE), que toma como base la eficiencia terminal tradicional y le aplica el porcentaje de estudiantes que supera el nivel I en PLANEA.
                         </p></center>
                      </div>


                      ';

                    $html .= "<div class='col-sm-4'>
                              </div>
                              <div class='col-sm-4'>
                              <div id='containerRPB03ete'></div>
                              <center>
                              <div class='tooltip2' style='cursor:default; font-size:1.5em;'>  Eficiencia Terminal Efectiva
                                <span class='tooltiptext2'><p>Porcentaje de alumnos egresados con aprendizajes suficientes.</p><i>- (SEP)</i></span>
                              </div>
                              </center>
                              </div>
                              <div class='col-sm-4'>
                              </div></div></div></div></div>
                                ";
                              }
                              else{
                                //$html .= "<br>";

                                $html .= "<div id='containerRPB03' style='Display: none !important; '></div>";/*<div class='col-sm-8'>No se encontraron registros en Indicadores de Permanencia.</div>*/
                                $html .= "<div class='row'></div>";

                              }

                              $html .= "</div>";

                    // echo $nivel_global; die();
                    if($nivel_global=="PRIMARIA"){

                    // Lo querys para traer los datos
                    $query_ua1 =  "SELECT DISTINCT p.contenidos,
                              (SELECT COUNT(*) FROM planea_primxconreactivo WHERE contenidos=p.contenidos) as total_reac_xua
                              FROM planea_primxconreactivo p
                              WHERE campos_disciplinares
                              LIKE '%Lenguaje y Comunicación%' AND p.ciclo_escolar='17_18'
                    ";

                    $result_ua1 = $this->db->query($query_ua1)->result_array();
                    foreach ($result_ua1 as $row) {
                      $string_reactivos = "";
                      $query_ua2 = "SELECT N_reactivo
                                    FROM planea_primxconreactivo
                                    WHERE contenidos = '{$row['contenidos']}' AND ciclo_escolar='17_18'
                      ";

                      $result_reactivos = $this->db->query($query_ua2)->result_array();
                      $num_rea_xua=0;
                      foreach ($result_reactivos as $row2) {
                        $string_reactivos .= $row2['N_reactivo'].",";
                        $num_rea_xua++;
                      }

                      $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final
                      $arr_analisis['contenidos'] = $row['contenidos'];
                      $arr_analisis['reactivos'] = $string_reactivos;
                      $arr_analisis['total_reac_xua'] = $row['total_reac_xua'];
                      $arr_analisis['total'] = 0;
                      $arr_analisis['alumnos_evaluados'] = 0;
                      $arr_analisis_lyc[] = $arr_analisis;
                    }
                    $indice = 0;
                    foreach ($arr_analisis_lyc as $row) {
                      $total = 0;
                      $arr_react = explode(",", $row['reactivos']);
                      $tmp_r_rea_xua = $row['total_reac_xua'];
                      foreach ($arr_react as $row) {
                        $num_reactivo = $row;
                        // echo $num_reactivo;
                        // die();
                        
                        $campo = "R".$num_reactivo."_lyc";
                        // echo $campo;
                        if($campo=='R1_lyc' || $campo=='R2_lyc' || $campo=='R3_lyc'|| $campo=='R4_lyc' || $campo=='R5_lyc' || $campo=='R6_lyc' || $campo=='R7_lyc' || $campo=='R8_lyc' || $campo=='R9_lyc'){
                          $campo = "R0".$num_reactivo."_lyc";
                        }
                        // die();
                        $query_ua3 = "SELECT {$campo}, n_alumn_eval_lyc
                                      FROM planea_primxreactivo
                                      WHERE clave_ct LIKE '%{$global_claveCT}%'
                                      AND nombre_turno LIKE '%{$nombre_turno_global}%' 
                                      AND ciclo_escolar='17_18' 
                        ";
                        // echo $query_ua3; die();
                        $result_num_alumno = $this->db->query($query_ua3)->result_array();
                        if (empty($result_num_alumno)) {
                          $total = $total + 0;
                          $arr_analisis_lyc[$indice]['total'] = $total;
                          $arr_analisis_lyc[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                          $arr_analisis_lyc[$indice]['alumnos_evaluados'] = 0;
                          $arr_analisis_lyc[$indice]['porcen_alum_respok'] = 0;

                        }
                        else {
                          $total = $total + (int)$result_num_alumno[0][$campo];
                          $arr_analisis_lyc[$indice]['total'] = $total;
                          $arr_analisis_lyc[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                          $arr_analisis_lyc[$indice]['alumnos_evaluados'] = (int)$result_num_alumno[0]['n_alumn_eval_lyc'];
                          $arr_analisis_lyc[$indice]['porcen_alum_respok'] = round((((($total/((int)$result_num_alumno[0]['n_alumn_eval_lyc']*$tmp_r_rea_xua))*100)*1000)/1000), 1);

                        }
                        }

                      $indice++;
                    }



                    $query_ua1 =  "SELECT DISTINCT p.contenidos,
                    (SELECT COUNT(*) FROM planea_primxconreactivo WHERE contenidos=p.contenidos) as total_reac_xua
                              FROM planea_primxconreactivo p
                              WHERE campos_disciplinares
                              LIKE '%Matemáticas%' AND p.`ciclo_escolar`='17_18'
                    ";
                    $result_ua1 = $this->db->query($query_ua1)->result_array();
                    foreach ($result_ua1 as $row) {
                      // echo "<pre>"; print_r($row); die();
                      $string_reactivos = "";
                      $query_ua2 = "SELECT N_reactivo
                                    FROM planea_primxconreactivo
                                    WHERE contenidos = '{$row['contenidos']}' AND ciclo_escolar='17_18'
                      ";

                      $result_reactivos = $this->db->query($query_ua2)->result_array();
                      foreach ($result_reactivos as $row2) {
                        $string_reactivos .= $row2['N_reactivo'].",";
                      }
                      $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final

                      $arr_analisis['contenidos'] = $row['contenidos'];
                      $arr_analisis['reactivos'] = $string_reactivos;
                      $arr_analisis['total_reac_xua'] = $row['total_reac_xua'];
                      $arr_analisis['total'] = 0;
                      $arr_analisis['alumnos_evaluados'] = 0;
                      $arr_analisis_mate[] = $arr_analisis;
                    }
                    $indice = 0;
                    foreach ($arr_analisis_mate as $row) {
                      $total = 0;
                      $arr_react = explode(",", $row['reactivos']);
                      $tmp_r_rea_xua = $row['total_reac_xua'];

                      foreach ($arr_react as $row) {
                        $num_reactivo = $row;
                        $campo = "R".$num_reactivo."_mat";
                        $query_ua3 = "SELECT {$campo}, n_alumn_eval_mat
                                      FROM planea_primxreactivo
                                      WHERE clave_ct LIKE '%{$global_claveCT}%'
                                      AND nombre_turno LIKE '%{$nombre_turno_global}%' 
                                      AND ciclo_escolar='17_18'
                        ";
                        // echo $query_ua3; die();
                        $result_num_alumno = $this->db->query($query_ua3)->result_array();
                        if (empty($result_num_alumno)) {
                          $total = $total + 0;
                          $arr_analisis_mate[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                          $arr_analisis_mate[$indice]['total'] = $total;
                          $arr_analisis_mate[$indice]['alumnos_evaluados'] = 0;
                          $arr_analisis_mate[$indice]['porcen_alum_respok'] = 0;

                        }
                        else {
                          $total = $total + (int)$result_num_alumno[0][$campo];
                          $arr_analisis_mate[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                          $arr_analisis_mate[$indice]['total'] = $total;
                          $arr_analisis_mate[$indice]['alumnos_evaluados'] = (int)$result_num_alumno[0]['n_alumn_eval_mat'];
                          $arr_analisis_mate[$indice]['porcen_alum_respok'] = round((((($total/((int)$result_num_alumno[0]['n_alumn_eval_mat']*$tmp_r_rea_xua))*100)*1000)/1000), 1);

                        }
                        }
                      $indice++;
                    }

                  }// if  PRIMARIA

                  // echo $nivel_global; die();
                  if($nivel_global=="SECUNDARIA"){

                  // Lo querys para traer los datos
                  $query_ua1 =  "SELECT DISTINCT p.contenidos,
                            (SELECT COUNT(*) FROM planea_secuxconreactivo WHERE contenidos=p.contenidos AND ciclo_escolar='16_17') as total_reac_xua
                            FROM planea_secuxconreactivo p
                            WHERE p.ciclo_escolar='16_17' AND campos_disciplinares
                            LIKE '%Lenguaje y Comunicación%'
                  ";

                  $result_ua1 = $this->db->query($query_ua1)->result_array();
                  foreach ($result_ua1 as $row) {
                    $string_reactivos = "";
                    $query_ua2 = "SELECT N_reactivo
                                  FROM planea_secuxconreactivo
                                  WHERE ciclo_escolar='16_17' AND contenidos = '{$row['contenidos']}'
                    ";

                    $result_reactivos = $this->db->query($query_ua2)->result_array();
                    $num_rea_xua=0;
                    foreach ($result_reactivos as $row2) {
                      $string_reactivos .= $row2['N_reactivo'].",";
                      $num_rea_xua++;
                    }

                    $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final
                    $arr_analisis['contenidos'] = $row['contenidos'];
                    $arr_analisis['reactivos'] = $string_reactivos;
                    $arr_analisis['total_reac_xua'] = $row['total_reac_xua'];
                    $arr_analisis['total'] = 0;
                    $arr_analisis['alumnos_evaluados'] = 0;
                    $arr_analisis_lyc[] = $arr_analisis;
                  }
                  $indice = 0;
                  foreach ($arr_analisis_lyc as $row) {
                    $total = 0;
                    $arr_react = explode(",", $row['reactivos']);
                    $tmp_r_rea_xua = $row['total_reac_xua'];
                    foreach ($arr_react as $row) {
                      $num_reactivo = $row;
                      $campo = "R".$num_reactivo."_lyc";
                      $query_ua3 = "SELECT {$campo}, n_alumn_eval_lyc
                                    FROM planea_secuxreactivo
                                    WHERE ciclo_escolar='16_17' AND clave_ct LIKE '%{$global_claveCT}%'
                                    AND nombre_turno LIKE '%{$nombre_turno_global}%'
                      ";
                      // echo $query_ua3; die();
                      $result_num_alumno = $this->db->query($query_ua3)->result_array();
                      if (empty($result_num_alumno)) {
                        $total = $total + 0;
                        $arr_analisis_lyc[$indice]['total'] = $total;
                        $arr_analisis_lyc[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                        $arr_analisis_lyc[$indice]['alumnos_evaluados'] = 0;
                        $arr_analisis_lyc[$indice]['porcen_alum_respok'] = 0;

                      }
                      else {
                        $total = $total + (int)$result_num_alumno[0][$campo];
                        $arr_analisis_lyc[$indice]['total'] = $total;
                        $arr_analisis_lyc[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                        $arr_analisis_lyc[$indice]['alumnos_evaluados'] = (int)$result_num_alumno[0]['n_alumn_eval_lyc'];
                        $arr_analisis_lyc[$indice]['porcen_alum_respok'] = round((((($total/((int)$result_num_alumno[0]['n_alumn_eval_lyc']*$tmp_r_rea_xua))*100)*1000)/1000), 1);

                      }
                      }

                    $indice++;
                  }


                  $query_ua1 =  "SELECT DISTINCT p.contenidos,
                  (SELECT COUNT(*) FROM planea_secuxconreactivo WHERE ciclo_escolar='16_17' AND contenidos=p.contenidos) as total_reac_xua
                            FROM planea_secuxconreactivo p
                            WHERE p.ciclo_escolar='16_17' AND campos_disciplinares
                            LIKE '%Matemáticas%'
                  ";
                  $result_ua1 = $this->db->query($query_ua1)->result_array();
                  foreach ($result_ua1 as $row) {
                    // echo "<pre>"; print_r($row); die();
                    $string_reactivos = "";
                    $query_ua2 = "SELECT N_reactivo
                                  FROM planea_secuxconreactivo
                                  WHERE ciclo_escolar='16_17' AND contenidos = '{$row['contenidos']}'
                    ";

                    $result_reactivos = $this->db->query($query_ua2)->result_array();
                    foreach ($result_reactivos as $row2) {
                      $string_reactivos .= $row2['N_reactivo'].",";
                      //echo "<pre>"; print_r($row2); die();
                    }
                    $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final

                    $arr_analisis['contenidos'] = $row['contenidos'];
                    $arr_analisis['reactivos'] = $string_reactivos;
                    $arr_analisis['total_reac_xua'] = $row['total_reac_xua'];
                    $arr_analisis['total'] = 0;
                    $arr_analisis['alumnos_evaluados'] = 0;
                    $arr_analisis_mate[] = $arr_analisis;
                  }
                  $indice = 0;
                  foreach ($arr_analisis_mate as $row) {
                    $total = 0;
                    $arr_react = explode(",", $row['reactivos']);
                    $tmp_r_rea_xua = $row['total_reac_xua'];

                    foreach ($arr_react as $row) {
                      $num_reactivo = $row;
                      $campo = "R".$num_reactivo."_mat";
                      $query_ua3 = "SELECT {$campo}, n_alumn_eval_mat
                                    FROM planea_secuxreactivo
                                    WHERE ciclo_escolar='16_17' AND clave_ct LIKE '%{$global_claveCT}%'
                                    AND nombre_turno LIKE '%{$nombre_turno_global}%'
                      ";
                      // echo $query_ua3; die();
                      $result_num_alumno = $this->db->query($query_ua3)->result_array();
                      if (empty($result_num_alumno)) {
                        $total = $total + 0;
                        $arr_analisis_mate[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                        $arr_analisis_mate[$indice]['total'] = $total;
                        $arr_analisis_mate[$indice]['alumnos_evaluados'] = 0;
                        $arr_analisis_mate[$indice]['porcen_alum_respok'] = 0;

                      }
                      else {
                        $total = $total + (int)$result_num_alumno[0][$campo];
                        $arr_analisis_mate[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                        $arr_analisis_mate[$indice]['total'] = $total;
                        $arr_analisis_mate[$indice]['alumnos_evaluados'] = (int)$result_num_alumno[0]['n_alumn_eval_mat'];
                        $arr_analisis_mate[$indice]['porcen_alum_respok'] = round((((($total/((int)$result_num_alumno[0]['n_alumn_eval_mat']*$tmp_r_rea_xua))*100)*1000)/1000), 1);

                      }
                      }
                    $indice++;
                  }

                }// if  SECUNDARIA

                if($nivel_global=="MEDIA SUPERIOR"){

                // Lo querys para traer los datos
                $query_ua1 =  "SELECT DISTINCT p.contenidos,
                          (SELECT COUNT(*) FROM planea_msxconreactivo WHERE contenidos=p.contenidos) as total_reac_xua
                          FROM planea_msxconreactivo p
                          WHERE campos_disciplinares
                          LIKE '%Lenguaje y Comunicación%'
                ";

                $result_ua1 = $this->db->query($query_ua1)->result_array();
                foreach ($result_ua1 as $row) {
                  $string_reactivos = "";
                  $query_ua2 = "SELECT N_reactivo
                                FROM planea_msxconreactivo
                                WHERE contenidos = '{$row['contenidos']}'
                  ";

                  $result_reactivos = $this->db->query($query_ua2)->result_array();
                  $num_rea_xua=0;
                  foreach ($result_reactivos as $row2) {
                    $string_reactivos .= $row2['N_reactivo'].",";
                    $num_rea_xua++;
                  }

                  $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final
                  $arr_analisis['contenidos'] = $row['contenidos'];
                  $arr_analisis['reactivos'] = $string_reactivos;
                  $arr_analisis['total_reac_xua'] = $row['total_reac_xua'];
                  $arr_analisis['total'] = 0;
                  $arr_analisis['alumnos_evaluados'] = 0;
                  $arr_analisis_lyc[] = $arr_analisis;
                }
                $indice = 0;
                foreach ($arr_analisis_lyc as $row) {
                  $total = 0;
                  $arr_react = explode(",", $row['reactivos']);
                  $tmp_r_rea_xua = $row['total_reac_xua'];
                  foreach ($arr_react as $row) {
                    $num_reactivo = $row;
                    $campo = "R".$num_reactivo."_lyc";
                    $query_ua3 = "SELECT {$campo}, n_alumn_eval_lyc
                                  FROM planea_msxreactivo
                                  WHERE clave_ct LIKE '%{$global_claveCT}%'
                                  AND nombre_turno LIKE '%{$nombre_turno_global}%'
                    ";
                     //echo $query_ua3; die();
                    $result_num_alumno = $this->db->query($query_ua3)->result_array();
                    if (empty($result_num_alumno)) {
                      $total = $total + 0;
                      $arr_analisis_lyc[$indice]['total'] = $total;
                      $arr_analisis_lyc[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                      $arr_analisis_lyc[$indice]['alumnos_evaluados'] = 0;
                      $arr_analisis_lyc[$indice]['porcen_alum_respok'] = 0;

                    }
                    else {
                      $total = $total + (int)$result_num_alumno[0][$campo];
                      $arr_analisis_lyc[$indice]['total'] = $total;
                      $arr_analisis_lyc[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                      $arr_analisis_lyc[$indice]['alumnos_evaluados'] = (int)$result_num_alumno[0]['n_alumn_eval_lyc'];
                      $arr_analisis_lyc[$indice]['porcen_alum_respok'] = round((((($total/((int)$result_num_alumno[0]['n_alumn_eval_lyc']*$tmp_r_rea_xua))*100)*1000)/1000), 1);

                    }

                  }

                  $indice++;
                }



                $query_ua1 =  "SELECT DISTINCT p.contenidos,
                (SELECT COUNT(*) FROM planea_msxconreactivo WHERE contenidos=p.contenidos) as total_reac_xua
                          FROM planea_msxconreactivo p
                          WHERE campos_disciplinares
                          LIKE '%Matemáticas%'
                ";
                $result_ua1 = $this->db->query($query_ua1)->result_array();
                foreach ($result_ua1 as $row) {
                  // echo "<pre>"; print_r($row); die();
                  $string_reactivos = "";
                  $query_ua2 = "SELECT N_reactivo
                                FROM planea_msxconreactivo
                                WHERE contenidos = '{$row['contenidos']}'
                  ";

                  $result_reactivos = $this->db->query($query_ua2)->result_array();
                  foreach ($result_reactivos as $row2) {
                    $string_reactivos .= $row2['N_reactivo'].",";
                    //echo "<pre>"; print_r($row2); die();
                  }
                  $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final

                  $arr_analisis['contenidos'] = $row['contenidos'];
                  $arr_analisis['reactivos'] = $string_reactivos;
                  $arr_analisis['total_reac_xua'] = $row['total_reac_xua'];
                  $arr_analisis['total'] = 0;
                  $arr_analisis['alumnos_evaluados'] = 0;
                  $arr_analisis_mate[] = $arr_analisis;
                }
                $indice = 0;
                foreach ($arr_analisis_mate as $row) {
                  $total = 0;
                  $arr_react = explode(",", $row['reactivos']);
                  $tmp_r_rea_xua = $row['total_reac_xua'];

                  foreach ($arr_react as $row) {
                    $num_reactivo = $row;
                    $campo = "R".$num_reactivo."_mat";
                    $query_ua3 = "SELECT {$campo}, n_alumn_eval_mat
                                  FROM planea_msxreactivo
                                  WHERE clave_ct LIKE '%{$global_claveCT}%'
                                  AND nombre_turno LIKE '%{$nombre_turno_global}%'
                    ";
                    // echo $query_ua3; die();
                    $result_num_alumno = $this->db->query($query_ua3)->result_array();
                    if (empty($result_num_alumno)) {
                      $total = $total + 0;
                      $arr_analisis_mate[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                      $arr_analisis_mate[$indice]['total'] = $total;
                      $arr_analisis_mate[$indice]['alumnos_evaluados'] = 0;
                      $arr_analisis_mate[$indice]['porcen_alum_respok'] = 0;

                    }
                    else {
                      $total = $total + (int)$result_num_alumno[0][$campo];
                      $arr_analisis_mate[$indice]['total_rea_xua'] = $tmp_r_rea_xua;
                      $arr_analisis_mate[$indice]['total'] = $total;
                      $arr_analisis_mate[$indice]['alumnos_evaluados'] = (int)$result_num_alumno[0]['n_alumn_eval_mat'];
                      $arr_analisis_mate[$indice]['porcen_alum_respok'] = round((((($total/((int)$result_num_alumno[0]['n_alumn_eval_mat']*$tmp_r_rea_xua))*100)*1000)/1000), 1);

                    }

                  }
                  $indice++;
                }

              }// if  MEDIA SUPERIRO
                    $html .= "</div></div>";
                    $html .= "</div>";
                    $html .= "<br>";
                  }
                  else{
                    //$html .= "<br>";
                    $html .= '  <div id="containerpiedrilldown01" style="Display: none !important; " ></div>';
                    $html .= '  <div id="containerpiedrilldown02"  style="Display: none !important; "></div>';
                    /*<div class='col-sm-8'>No se encontraron registros en Indicadores de Aprendizaje.</div>*/
                    $html .= "<div class='row'></div>";

                  }

                  $html .= "</div>"; // div_indicadores_aprendizaje





                  $html .= "</div>"; # Exportar a excel
                  $html .= "<a  id='top_modal'> <img id='btn_topsclla' border='0' style='visibility: hidden; opacity: 0.5; height: 60px; width: 60px; position: fixed; bottom: 80px; right: 1%; z-index:1000;'  src='". base_url('assets/img/arrow-up-on-a-black-circle-background.svg')."' title='Ir arriba' /></a>";

                  $num_rows = 0;

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
                    'd_g1' => $d_g1,
                    'd_g2' => $d_g2,
                    'd_g3' => $d_g3,
                    'd_g4' => $d_g4,
                    'd_g5' => $d_g5,
                    'd_g6' => $d_g6,
                    'g_mg' => $g_mg,
                    't_docentes' => $t_docentes,
                    't_alumnos' => $t_alumnos,
                    't_grupos' => $t_grupos
                  );
                  $array_ind_perma = array(
                    'valor_retencion' => $valor_retencion,
                    'valor_aprobacion' => $valor_aprobacion,
                    'valor_et' => $valor_et,
                    'valor_ete' => $valor_ete
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
                    'IVMAT15' => $IVMAT15,
                    'ILC17' => $ILC17,
                    'IILC17' => $IILC17,
                    'IIILC17' => $IIILC17,
                    'IVLC17' => $IVLC17,
                    'IMAT17' => $IMAT17,
                    'IIMAT17' => $IIMAT17,
                    'IIIMAT17' => $IIIMAT17,
                    'IVMAT17' => $IVMAT17
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
                    'btnnewriesgo'=> $array_btnnewriesgo,
                    'graph_unidad_analisis_lyc'=>$arr_analisis_lyc,
                    'graph_unidad_analisis_mate'=>$arr_analisis_mate
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



                function get_riesco_cct($nivel,$id_municipio,$sost,$mensaje,$clave=""){
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
                    INNER JOIN localidad l ON (l.id_localidad_a = e.id_localidad AND m.id_municipio = l.id_municipio)
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
                    INNER JOIN localidad l ON (l.id_localidad_a = e.id_localidad AND m.id_municipio = l.id_municipio)
                    WHERE e.id_sostenimiento = 2 " .$concat. "
                    ORDER BY e.clave_ct, n.nombre_nivel
                    ";
                  }#  else
                  // echo $str_query; die();
                  return $this->db->query($str_query)->result_array();
                }// get_riesco_cct()


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
                    INNER JOIN localidad l ON (l.id_localidad_a = e.id_localidad AND m.id_municipio = l.id_municipio)
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
                    INNER JOIN localidad l ON (l.id_localidad_a = e.id_localidad AND m.id_municipio = l.id_municipio)
                    WHERE e.id_sostenimiento = 2 " .$concat. "
                    ORDER BY e.clave_ct, n.nombre_nivel
                    ";
                  }#  else
                  // echo $str_query; die();
                  return $this->db->query($str_query)->result_array();
                }// get_particulares()




                public function get_info_riesgoabandono($tabla_riesgo, $bimestre, $ciclo, $global_claveCT, $nombre_turno_global, $nivel_global){
                  // echo $bimestre."\n";
                  // echo $ciclo;
                  $query_riesgo = " SELECT COUNT(CCT) total_alumnos,
                                    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND INASISTENCIAS >10 AND CALIFICACIONESPANOL=0 AND CALIFICACIONMATEMATICAS=0) ) zombies,
                                    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO >=3) ) muyalto_riesgo,
                                    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =2) ) alto_riesgo,
                                    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =1) ) medio_riesgo,
                                    (SELECT COUNT(CCT) FROM $tabla_riesgo WHERE (CCT='$global_claveCT' and  TURNO='$nombre_turno_global' AND  SEMAFORO =0) ) bajo_riesgo
                                    FROM $tabla_riesgo WHERE CCT='$global_claveCT' AND TURNO='$nombre_turno_global'
                                  ";
                  $result_riesgo = $this->db->query($query_riesgo)->result_array();
                  $select1="";
                  $select2="";
                  $select3="";
                  $select_bim1="";
                  $select_bim2="";
                  $select_bim3="";
                  $select_bim4="";
                  $select_bim5="";
                  if (count($result_riesgo)>=1){
                    $row = $result_riesgo[0];
                    if ($row['total_alumnos']!='0') {

                      /************************************************************************************************************************/
                      /************************************************************************************************************************/
                      $html = "";
                      $html .= '          <div class="row">';
                      $html .= '            <form id="form_riesgoporct" name="form_riesgoporct">';
                      $html .= '              <div class="col-sm-3">';
                      $html .= '              </div>';
                      $html .= '              <div class="col-sm-2">';
                      $html .= '                <div class="form-group">';
                      $html .= '                  <label>Bimestre: </label>';
                      if($ciclo=='2018-2019-INICIO' || $ciclo=='2018-2019'){
                        $select1='selected="selected"';
                      }else if($ciclo=='2017-2018'){
                        $select2='selected="selected"';
                      }else if($ciclo=='2016-2017'){
                        $select3='selected="selected"';
                      }

                      if($ciclo=='2016-2017' || $ciclo=='2017-2018'){
                        if($bimestre==1){
                          $select_bim1='selected="selected"';
                        }else if($bimestre==2){
                          $select_bim2='selected="selected"';
                        }else if($bimestre==3){
                          $select_bim3='selected="selected"';
                        }else if($bimestre==4){
                          $select_bim4='selected="selected"';
                        }else if($bimestre==5){
                          $select_bim5='selected="selected"';
                        }
                      }

                      if($ciclo=='2018-2019-INICIO'  || $ciclo=='2018-2019'){
                        $html .= '                  <select id="select_opcbimestre" name="select_opcbimestre" class="form-control">';
                        $html .= '                    <option value="1" selected="selected">1er Periodo</option>';
                        $html .= '                    <option value="2">2do Periodo</option>';
                        $html .= '                    <option value="3">3er Periodo</option>';
                        $html .= '                  </select>';
                      }else{
                        $html .= '                  <select id="select_opcbimestre" name="select_opcbimestre" class="form-control">';
                        $html .= '                    <option value="1" '.$select_bim1.'>1er Bimestre</option>';
                        $html .= '                    <option value="2" '.$select_bim2.'>2do Bimestre</option>';
                        $html .= '                    <option value="3" '.$select_bim3.'>3er Bimestre</option>';
                        $html .= '                    <option value="4" '.$select_bim4.'>4to Bimestre</option>';
                        $html .= '                    <option value="5" '.$select_bim5.'>5to Bimestre</option>';
                        $html .= '                  </select>';
                      }
                      

                      $html .= '                </div>';
                      $html .= '              </div>';
                      $html .= '              <div class="col-sm-2">';
                      $html .= '                <div class="form-group">';
                      $html .= '                  <label>Ciclo Escolar:</label>';
                      $html .= '                  <select id="select_opcciclo" name="select_opcciclo" class="form-control">';
                      $html .= '                    <option value="2016-2017" '.$select3.'>2016 - 2017</option>';
                      $html .= '                    <option value="2017-2018" '.$select2.'>2017 - 2018</option>';
                      $html .= '                    <option value="2018-2019" '.$select1.'>2018 - 2019</option>';
                      $html .= '                  </select>';
                      $html .= '                </div>';
                      $html .= '              </div>';
                      $html .= '            </form>';
                      $html .= '            <div class="col-sm-2">';
                      $html .= '              <div style="margin-top:23px;">';
                      $html .= '                <button style="color: white; background-color: #3C5AA2;" id="btnBuscarCT" type="button"  class="btn" onclick="get_riesgo_abandono()">Consultar</button>';
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
                      $html .= '            <div class="col-sm-6" id="containerpiechartRiesgo" style="height: 400px; margin: 0 auto; width:auto;"></div>';

                      $html .= '            <div class="col-sm-6" id="containerbarchartRiesgo" style="height: 400px; margin: 0 auto; width:auto;"></div>';

                      $html .= '        </div>';
                      $html .= '        <div class="row contenedorfila">';
                      $html .= '          <div class="col-sm-6">';
                      $html .= '            <table id="tabla_pie_info" class="table table-gray table-hover">';
                      $html .= '              <thead>';
                      $html .= '                <tr>';
                      $html .= '                  <th class="text-center tbt-responsive-xw">Total</th>';
                      $html .= '                  <th class="text-center tbt-responsive-xw">Muy Alto</th>';
                      $html .= '                  <th class="text-center tbt-responsive-xw">Alto</th>';
                      $html .= '                  <th class="text-center tbt-responsive-xw">Medio</th>';
                      $html .= '                  <th class="text-center tbt-responsive-xw">Bajo</th>';
                      $html .= '                </tr>';
                      $html .= '              </thead>';
                      $html .= '              <tbody>';
                      $html .= '                <tr>';
                      $html .= '                  <td class="text-center tbt-responsive-xw" style=" font-weight:500;">'.$total_alumnos.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw" style="background-color:#FF0000; color:white;  font-weight:600;">'.$muyalto.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw" style="background-color:#FF9900;  font-weight:500;">'.$alto.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw" style="background-color:#FFFF00;  font-weight:500;">'.$medio.'</td>';
                      $html .= '                  <td class="text-center tbt-responsive-xw" style="background-color:#3CB371;  font-weight:500;">'.$bajo.'</td>';
                      $html .= '                </tr>';
                      $html .= '              </tbody>';
                      $html .= '            </table>';

                      if($nivel_global=='PRIMARIA')
                      {
                        $tabla_estatusb= "estatusbprimb".$bimestre."c".substr($ciclo,2,2).substr($ciclo,7,2);
                      }
                      else
                      {
                        $tabla_estatusb= "estatusbsecub".$bimestre."c".substr($ciclo,2,2).substr($ciclo,7,2);
                      }

                      if($nivel_global=='PRIMARIA' and $ciclo=='2018-2019')
                      {
                        $tabla_estatusb= "estatusbprimp".$bimestre."c".substr($ciclo,2,2).substr($ciclo,7,2);
                      }elseif($nivel_global=='SECUNDARIA' and $ciclo=='2018-2019'){
                        $tabla_estatusb= "estatusbsecp".$bimestre."c".substr($ciclo,2,2).substr($ciclo,7,2);
                      }


                      $query_desertor =     "
                      SELECT COUNT(CCT) AS desertores FROM  $tabla_estatusb WHERE MOTIVO!='FALLECIMIENTO' AND CCT='$global_claveCT' AND TURNO='$nombre_turno_global'
                      ";

                      // $result_riesgot = $obj_db->select($query_riesgot);
                      $result_desertor = $this->db->query($query_desertor)->result_array();

                      if (count($result_desertor) >=1){
                        $row = $result_desertor[0];

                        $desertores =  $row['desertores'];

                      }

                      $html .= '
                                      <div class="col-sm-12">

                                    <table id="tabla_desertores" class="table table-hover text-center">
                                      <thead>
                                        <tr>
                                        <th width="20%">Alumnos que posiblemente han abandonado la escuela</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr id="total">
                                          <td id="mis_td">'.$desertores.'</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    </div>';

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
                        $html .= '                  <th class="text-center tbt-responsive-xw"></th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">1°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">2°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">3°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">4°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">5°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">6°</th>';
                        $html .= '                </tr>';
                        $html .= '              </thead>';
                        $html .= '              <tbody>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Total</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total6.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Muy Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto6.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto6.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Medio</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio3.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio4.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio5.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio6.'</td>';
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
                        $html .= '                  <th class="text-center tbt-responsive-xw"></th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">1°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">2°</th>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">3°</th>';
                        $html .= '                </tr>';
                        $html .= '              </thead>';
                        $html .= '              <tbody>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Total</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$total3.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Muy Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$muyalto3.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Alto</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$alto3.'</td>';
                        $html .= '                </tr>';
                        $html .= '                <tr>';
                        $html .= '                  <th class="text-center tbt-responsive-xw">Medio</th>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio1.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio2.'</td>';
                        $html .= '                  <td class="text-center tbt-responsive-xw">'.$medio3.'</td>';
                        $html .= '                </tr>';
                        $html .= '              </tbody>';
                        $html .= '            </table>';

                        $html .= '          </div>';

                      }



                      $html .= '        </div>';
                      $html .= '        </div>';

                      /************************************************************************************************************************/
                      /************************************************************************************************************************/
                    }
                    else{
                      $html .= '            <div id="containerpiechartRiesgo" style="Display: none !important; height:400px; margin:0 auto;"></div>';
                      $html .= '            <div id="containerbarchartRiesgo" style="Display: none !important; height: 400px; margin:0 auto;"></div>';
                    }
                  }


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

                  $array_graficas = array(
                    'riesgo' => $array_riesgo,
                    'riesgot' => $array_riesgot
                  );

                  $respuesta = array(
                    'html' => $html,
                    'array_graficas' => $array_graficas
                  );

                  return $respuesta;
                }// get_info_riesgoabandono()

                public function get_info_reactivos_xunidad_de_analisis($nombre, $opcion, $global_cct, $global_nombre_turno, $nvl){

                    // echo "$global_cct"; die();
                    $name_table = $opcion;
                    // echo $opcion; die();
                    $arr_reactivos_down = array();
                    $string_reactivos = "";
                    $query_ua2 = "SELECT N_reactivo, contenido_reactivo
                                  FROM planea_{$nvl}xconreactivo
                                  WHERE contenidos='{$nombre}'
                    ";

                    $result_reactivos = $this->db->query($query_ua2)->result_array();
                    foreach ($result_reactivos as $row2) {
                        $num_reactivo = $row2['N_reactivo'];
                        // echo $num_reactivo; die();
                        $campo = "R".$num_reactivo."_".$opcion;
                        if($campo=='R1_lyc' || $campo=='R2_lyc' || $campo=='R3_lyc'|| $campo=='R4_lyc' || $campo=='R5_lyc' || $campo=='R6_lyc' || $campo=='R7_lyc' || $campo=='R8_lyc' || $campo=='R9_lyc'){
                           $campo = "R0".$num_reactivo."_".$opcion;
                        }
                        $n_alumnos = "n_alumn_eval_".$opcion; //n_alumn_eval_lyc n_alumn_eval_mat
                        $query_ua3 = "SELECT {$campo}, {$n_alumnos}
                                      FROM planea_{$nvl}xreactivo
                                      WHERE clave_ct LIKE '%{$global_cct}%'
                                      AND nombre_turno LIKE '%{$global_nombre_turno}%'
                        ";
                        // echo $query_ua3; die();
                        $result_num_alumno = $this->db->query($query_ua3)->result_array();
                        // echo "<pre>"; print_r($result_num_alumno); die();
                        if (empty($result_num_alumno)) {
                          $total = 0;
                          // echo $total. " ";
                          $total_alumnos = 0;
                          $mitad = 0;
                        }
                        else {
                          $total = (int)$result_num_alumno[0][$campo];
                          // echo $total. " ";
                          $total_alumnos = (int)$result_num_alumno[0][$n_alumnos];
                          $mitad = $total_alumnos/2;
                        }


                        // echo $total_alumnos."        1/2: ".$mitad; die();
                        if($total > $mitad){
                        }else{
                            $aux = array();
                            $aux['reactivo'] = $num_reactivo;
                            $aux['descripcion'] = $row2['contenido_reactivo'];
                            $aux['numero_contestaron'] = $total;

                            array_push($arr_reactivos_down,$aux);
                        }
                    }

                    return $arr_reactivos_down;
                    // die();
                    // echo "<pre>"; print_r($arr_reactivos_down); die();
                    /*
                    $campo = "R".$num_reactivo."_lyc";
                    $query_ua3 = "SELECT {$campo}, n_alumn_eval_lyc
                                  FROM planea_primxreactivo
                                  WHERE clave_ct LIKE '%{$global_claveCT}%'
                                  AND nombre_turno LIKE '%{$nombre_turno_global}%'
                    ";
                    */
                    // echo $query_ua3; die();
                    // $result_num_alumno = $this->db->query($query_ua3)->result_array();


                    // $string_reactivos = substr($string_reactivos, 0, -1);  // quita 1 caracter al final


                    // echo $string_reactivos; die();

                }// get_info_reactivos_xunidad_de_analisis()

              }
