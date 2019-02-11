<?php

class Municipio_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

     function get_all()
     {
       $str_query = "SELECT m.id_municipio, m.nombre_municipio FROM municipio m";
       return $this->db->query($str_query)->result_array();
     }// get_all()


}
