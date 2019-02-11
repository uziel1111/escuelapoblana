<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('Utilerias');
		$this->load->model('Municipio_model');
	}

	public function get_solomuni()
	{
		$data = array();
		$html = "";
		$result = $this->Municipio_model->get_all();

		
		foreach ($result as $res) {
			$html .= "<option value=".$res['id_municipio'].">".utf8_encode($res['nombre_municipio'])."</option>";
		}

		$response = array(
			'status' => 'OK',
			'result'=>$html
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// get_all()

	public function get_all()
	{
		$data = array();
		$html = "";
		$result = $this->Municipio_model->get_all();

		$html .= "<option value=0> TODOS </option>";
		foreach ($result as $res) {
			$html .= "<option value=".$res['id_municipio'].">".utf8_encode($res['nombre_municipio'])."</option>";
		}

		$response = array(
			'status' => 'OK',
			'result'=>$html
		);

		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}// get_solomuni()

}
