<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('Utilerias');
		}

	public function index()
	{
		$data = array();
		Utilerias::pagina_basica($this, "index", $data);
	}
}
