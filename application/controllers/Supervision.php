<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervision extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
		}

		public function index()
		{
			$data = array();
			Utilerias::pagina_basica($this, "supervision/supervision_escolar", $data);
		}

		public function supervision_en_el_mundo()
		{
			$data = array();
			Utilerias::pagina_basica($this, "supervision/supervision_en_el_mundo", $data);
		}

		public function consejos_tecnicos_escolares()
		{
			$data = array();
			Utilerias::pagina_basica($this, "supervision/consejos_tecnicos_escolares", $data);
		}

		public function programas_federales()
		{
			$data = array();
			Utilerias::pagina_basica($this, "supervision/programas_federales", $data);
		}

		public function trayecto_formativo()
		{
			$data = array();
			Utilerias::pagina_basica($this, "supervision/trayecto_formativo", $data);
		}

		// public function riesgo_abandono()
		// {
		// 	$data = array();
		// 	Utilerias::pagina_basica($this, "estadistica/riesgo_abandono", $data);
		// }

}
