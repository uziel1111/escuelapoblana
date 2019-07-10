<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortafolioUnico extends CI_Controller {
function __construct() {
parent::__construct();
			$this->load->helper('form');
			$this->load->library('Utilerias');

}

public function index()
{

$data = array();
Utilerias::pagina_basica($this, "portafolio_unico/index", $data);
}

public function verDetalle()
{
	$i = 0;
	$idDoc = $this->input->post("idDoc");
	//echo $idDoc;
	$dir = "escuelapoblana_pdfs/portafolio_unico/txt/";
	$i++;							
	$n_file = fopen($dir.$idDoc.".txt" , "r");
	$n_name = fread($n_file,filesize($dir.$idDoc.".txt"));								
	$n_array = explode ("|", $n_name);	

	$html = "<h3><span class='fa-lg' style=''><i class='fa fa-circle pull-left fa-file-text text-muted'></i></span> $n_array[3]</h3><hr/>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[2]</div>";
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[4]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[5]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[6]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[7]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[8]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[9]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nivel:</strong> $n_array[10]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[11]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[12]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[13]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[14]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[15]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[16]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array[17]</div>";		

	$response = array(
		'status' => 'OK',
		'result' => $html
	);
	Utilerias::enviaDataJson(200, $response, $this);
	exit;
}	

	
public function verDetNivel()
{
	$i = 0;
	$idDocNiv = $this->input->post("idDocNiv");
	//echo $idDoc;
	
	$n_file_niv = fopen($idDocNiv , "r");
	$n_name_niv = fread($n_file_niv,filesize($idDocNiv));								
	$n_array_niv = explode ("|", $n_name_niv);	

	$html = "<h3><span class='fa-lg' style=''><i class='fa fa-circle pull-left fa-file-text text-muted'></i></span> $n_array_niv[3]</h3><hr/>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[2]</div>";
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[4]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[5]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[6]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[7]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[8]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[9]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[10]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[11]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[12]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[13]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[14]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[15]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[16]</div>";	
	$html .= "<div class='alert alert-warning' style='margin-bottom:5px;' role='alert'><strong>Nombre:</strong> $n_array_niv[17]</div>";		

	$response = array(
		'status' => 'OK',
		'result' => $html
	);
	Utilerias::enviaDataJson(200, $response, $this);
	exit;
}	
	
}
?>