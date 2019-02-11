<?php

class RiesgoxMuni_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_alldesert($id_municipio, $id_nivel, $id_bimestre, $id_ce)
    {
      $concat = "";

      if($id_nivel=='PRIMARIA')
      {
        $tabla_desertores="estatusbprimb".$id_bimestre."c".substr($id_ce,2,2).substr($id_ce,9,2);
      }
      else
      {
        $tabla_desertores="estatusbsecub".$id_bimestre."c".substr($id_ce,2,2).substr($id_ce,9,2);
      }


      if($id_municipio!="0" || $id_municipio!=0){
       $concat .= " AND t1.id_municipio={$id_municipio}";
     }
     $concat .= " AND t3.MOTIVO!='FALLECIMIENTO'";



     $query = "

     SELECT  COUNT(t3.CCT) as total_alumnos_desertaron  FROM escuela t1

    INNER JOIN turno t2 ON t1.id_turno=t2.id_turno
    INNER JOIN $tabla_desertores t3 ON t1.clave_ct=t3.CCT AND t2.nombre_turno=t3.TURNO

    WHERE 1= 1 {$concat}
 ";

     return $this->db->query($query)->result_array();
    }// get_alldesert()


     function get_allprim($id_municipio, $id_nivel, $id_bimestre, $id_ce)
     {
       $concat = "";
       $tabla_riesgo="munixriesgoprimc".substr($id_ce,2,2).substr($id_ce,9,2);
       if($id_municipio!="0" || $id_municipio!=0){
        $concat .= " AND clave_muni = {$id_municipio}";
      }

        $concat .= " AND bimestre = {$id_bimestre}";


      $query = "
      SELECT
                    SUM(total_alumnos) total_alumnos,
                    SUM(zombies) zombies,
                    SUM(muyalto_riesgo) muyalto_riesgo,
                    SUM(alto_riesgo) alto_riesgo,
                    SUM(medio_riesgo) medio_riesgo,
                    SUM(bajo_riesgo) bajo_riesgo,

                    SUM(zombies1) zombies1,
                    SUM(zombies2) zombies2,
                    SUM(zombies3) zombies3,
                    SUM(zombies4) zombies4,
                    SUM(zombies5) zombies5,
                    SUM(zombies6) zombies6,
                    SUM(muyalto_riesgo1) muyalto_riesgo1,
                    SUM(muyalto_riesgo2) muyalto_riesgo2,
                    SUM(muyalto_riesgo3) muyalto_riesgo3,
                    SUM(muyalto_riesgo4) muyalto_riesgo4,
                    SUM(muyalto_riesgo5) muyalto_riesgo5,
                    SUM(muyalto_riesgo6) muyalto_riesgo6,

                    SUM(alto_riesgo1) alto_riesgo1,
                    SUM(alto_riesgo2) alto_riesgo2,
                    SUM(alto_riesgo3) alto_riesgo3,
                    SUM(alto_riesgo4) alto_riesgo4,
                    SUM(alto_riesgo5) alto_riesgo5,
                    SUM(alto_riesgo6) alto_riesgo6,
                    SUM(medio_riesgo1) medio_riesgo1,
                    SUM(medio_riesgo2) medio_riesgo2,
                    SUM(medio_riesgo3) medio_riesgo3,
                    SUM(medio_riesgo4) medio_riesgo4,
                    SUM(medio_riesgo5) medio_riesgo5,
                    SUM(medio_riesgo6) medio_riesgo6,

                    SUM(bajo_riesgo1) bajo_riesgo1,
                    SUM(bajo_riesgo2) bajo_riesgo2,
                    SUM(bajo_riesgo3) bajo_riesgo3,
                    SUM(bajo_riesgo4) bajo_riesgo4,
                    SUM(bajo_riesgo5) bajo_riesgo5,
                    SUM(bajo_riesgo6) bajo_riesgo6

FROM ".$tabla_riesgo."
WHERE 1= 1 {$concat}
      ";

      return $this->db->query($query)->result_array();
     }// get_all()

     function get_allsec($id_municipio, $id_nivel, $id_bimestre, $id_ce)
     {
       $concat = "";
       $tabla_riesgo="munixriesgosecuc".substr($id_ce,2,2).substr($id_ce,9,2);
       if($id_municipio!="0" || $id_municipio!=0){
        $concat .= " AND clave_muni = {$id_municipio}";
      }

        $concat .= " AND bimestre = {$id_bimestre}";

      $query = "
      SELECT
              SUM(total_alumnos) total_alumnos,
              SUM(zombies) zombies,
              SUM(muyalto_riesgo) muyalto_riesgo,
              SUM(alto_riesgo) alto_riesgo,
              SUM(medio_riesgo) medio_riesgo,
              SUM(bajo_riesgo) bajo_riesgo,

              SUM(zombies1) zombies1,
              SUM(zombies2) zombies2,
              SUM(zombies3) zombies3,
              SUM(muyalto_riesgo1) muyalto_riesgo1,
              SUM(muyalto_riesgo2) muyalto_riesgo2,
              SUM(muyalto_riesgo3) muyalto_riesgo3,

              SUM(alto_riesgo1) alto_riesgo1,
              SUM(alto_riesgo2) alto_riesgo2,
              SUM(alto_riesgo3) alto_riesgo3,
              SUM(medio_riesgo1) medio_riesgo1,
              SUM(medio_riesgo2) medio_riesgo2,
              SUM(medio_riesgo3) medio_riesgo3,

              SUM(bajo_riesgo1) bajo_riesgo1,
              SUM(bajo_riesgo2) bajo_riesgo2,
              SUM(bajo_riesgo3) bajo_riesgo3

FROM ".$tabla_riesgo."
WHERE 1= 1 {$concat}
      ";

      return $this->db->query($query)->result_array();
     }// get_allsec()


}
