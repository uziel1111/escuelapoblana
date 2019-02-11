<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sostenimiento extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('Utilerias');
		$this->load->model('Sostenimiento_model');
	}

	public function get_xmunicipio_xnivel()
	{

		$id_municipio = $this->input->post('id_municipio');
		$id_nivel = $this->input->post('id_nivel');

		$html = "";
		$result = $this->Sostenimiento_model->get_xmunicipio_xnivel($id_municipio, $id_nivel);

		$html .= "<option value=0>TODOS</option>";
		foreach ($result as $res) {
			$html .= "<option value=".$res['id_sostenimiento'].">".$res['nombre_sostenimiento']."</option>";
		}

		$response = array(
			'status' => 'OK',
			'result'=>$html
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// get_xmunicipio_xnivel()

}
