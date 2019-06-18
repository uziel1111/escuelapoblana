<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EscuelasParticulares extends CI_Controller {
function __construct() {
parent::__construct();
			$this->load->helper('form');
			$this->load->library('Utilerias');

}

public function index()
{

	$data = array();
Utilerias::pagina_basica($this, "escuelas_particulares/index", $data);
}


}
?>