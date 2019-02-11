<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nivel extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Nivel_model');
			$this->load->library('Utilerias');
		}

		public function getNiveles(){
		$id_municipio = $this->input->post("id_municipio");
		$html = "";
		$html .= "<option value=0>TODOS</option>";

		$niveles = $this->Nivel_model->getNiveles($id_municipio);
		foreach ($niveles as $row) {
			$html .= "<option value=".$row['id_nivel'].">".$row['nombre_nivel']."</option>";
		}
		$response = array(
			'result'=>$html
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

}
