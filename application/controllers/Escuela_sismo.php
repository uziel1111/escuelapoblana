<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escuela_sismo extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('Utilerias');
			$this->load->model('Escuela_sismo_model');
			$this->alta_demanda = array(); // La indicación fue no mostrar escuelas en rojo (ALTA DEMANDA). Cuando se habilite SE DEBE actualizar el array
		}

		public function busqueda_xlista()
		{
			$data = array();
			Utilerias::pagina_basica($this, "escuela/busqueda_xlista", $data);
		}

		public function busqueda_xmapa()
		{
			$data = array();
			Utilerias::pagina_basica($this, "escuela/busqueda_xmapa", $data);
		}

		public function escuelas_particulares()
		{
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/index", $data);
		}

		public function normatividad_tramites_com(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/normatividad_tramites_com", $data);
		}

		public function altas_bajas_rec_y_cal(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/altas_bajas_rec_y_cal", $data);
		}

		public function normatividad(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/normatividad", $data);
		}

		public function tramites_especificos(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/tramites_especificos", $data);
		}

		public function modelo_educativo_2016(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/modelo_educativo_2016", $data);
		}

		public function comunicados(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/comunicados", $data);
		}

		public function actas_de_visitas(){
			$data = array();
			Utilerias::pagina_basica($this, "escuelas_particulares/actas_de_visitas", $data);
		}

		public function escuelas_semaforos_sismos()
		{
			$data = array();
			Utilerias::pagina_basica($this, "escuela/busqueda_xlista_semaforos_sismo", $data);
		}

		public function getEscuelas_sismo(){
		  $id_municipio  = $this->input->post('id_municipio');
          $id_nivel      = $this->input->post('id_nivel');
          $sostenimiento = $this->input->post('sostenimiento');
          $clave         = $this->input->post('clave');
          $mensaje       = "";
          $valorabuscar  = "";

          // $obj_le = new lista_escuelas($id_municipio, $id_nivel, $sostenimiento,$clave,$mensaje);
          $escuelas = $this->Escuela_sismo_model->getEscuelas_sismo($id_municipio, $id_nivel, $sostenimiento, $clave, $mensaje, $valorabuscar);
          // echo "<pre>";
          // print_r($escuelas);
          // die();
          $html = "";

          $num_rows = count($escuelas);
	        foreach ($escuelas as $row) {
				$cct_ = $row['cct'];
				$w = 'searchbyfiltering';

				$html.="<tr id='".$row['id_escuela']."'>";
				// $html.="<tr id='".$cct_."'>";

				$html.="<td class='' id='".$row['id_escuela']."'>$cct_</td>";
				$html.="<td id='nombre_turno'>" . $row['nombre_turno'] ."</td>";
				$html.="<td>" .  $row['nombre'] ."</td>";
				$html.="<td>" .  $row['nivel'] ."</td>";
				$html.="<td>" .  $row['nombre_municipio'] ."</td>";
				$html.="<td>" .  $row['nombre_localidad']."</td>";
				$html.= "<td>".  $row['domicilio']."</td>";
				$html.= "<td><img style='width: 20px;'' src='http://escuelapoblana.org/iconos_sismo/".$row['color'].".png' alt='Escuela con Daños.' class='iconsismo'></td>";
				$html.= "<td>".  $row['regreso_clases']."</td>";
				$html.= "<td>".  $row['lugar_regreso']."</td>";
				$html.="</tr>";
			}# foreach

			$response = array(
				'html'    => $html,
				'total'   => $num_rows,
				'mensaje' => $mensaje
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function getEscuelas_sismo_una(){
 				 $cct         = $this->input->post('cct');
 				 $mensaje       = "";
 				 $valorabuscar  = "";

 				 // $obj_le = new lista_escuelas($id_municipio, $id_nivel, $sostenimiento,$clave,$mensaje);
 				 $escuelas = $this->Escuela_sismo_model->getEscuelas_sismo_una( $cct );
 				 // echo "<pre>";
 				 // print_r($escuelas);
 				 // die();
 				 $html = "";

 				 $num_rows = count($escuelas);
 				 foreach ($escuelas as $row) {
 			 $cct_ = $row['cct'];
 			 $w = 'searchbyfiltering';

 			 $html.="<tr id='".$row['id_escuela']."'>";
 			 // $html.="<tr id='".$cct_."'>";

 			 $html.="<td class='' id='".$row['id_escuela']."'>$cct_</td>";
 			 $html.="<td id='nombre_turno'>" . $row['nombre_turno'] ."</td>";
 			 $html.="<td>" .  $row['nombre'] ."</td>";
 			 $html.="<td>" .  $row['nivel'] ."</td>";
 			 $html.="<td>" .  $row['nombre_municipio'] ."</td>";
 			 $html.="<td>" .  $row['nombre_localidad']."</td>";
 			 $html.= "<td>".  $row['domicilio']."</td>";
 			 $html.= "<td><img style='width: 20px;'' src='http://escuelapoblana.org/iconos_sismo/".$row['color'].".png' alt='Escuela con Daños.' class='iconsismo'></td>";
 			 $html.= "<td>".  $row['regreso_clases']."</td>";
 			 $html.= "<td>".  $row['lugar_regreso']."</td>";
 			 $html.="</tr>";
 		 }# foreach

 		 $response = array(
 			 'html'    => $html,
 			 'total'   => $num_rows,
 			 'mensaje' => $mensaje
 		 );

 		 Utilerias::enviaDataJson(200, $response, $this);
 		 exit;
		}





		public function buscagrid(){
			$valorabuscar = $this->input->post('valorabuscar');
            $id_municipio_global = $this->input->post('id_municipio_global');
            $id_nivel_global = $this->input->post('id_nivel_global');
            $sostenimiento_global = $this->input->post('sostenimiento_global');
            $nombre_escuela_global = $this->input->post('nombre_escuela_global');
            $mensaje ="voy_diferente";


            $escuelas = $this->Escuela_model->getEscuelas($id_municipio_global, $id_nivel_global, $sostenimiento_global, $nombre_escuela_global, $mensaje, $valorabuscar);

            $html = "";
          	$num_rows = count($escuelas);
	        foreach ($escuelas as $row) {
				$cct_ = $row['cct'];
				$w = 'searchbyfiltering';

				$html.="<tr id='".$row['id_escuela']."'>";
				// $html.="<tr id='".$cct_."'>";
				if (in_array($row['cct'], $this->alta_demanda)) {
					$html .= "
					<td  id='".$row['id_escuela']." '>
					<center> $cct_ </center>
					</td>
					";
				}else {
					$html .= "
					<td  id='".$row['id_escuela']."'>
					<center> $cct_ </center>
					</td>
					";
				}# else

				$html.="<td id='nombre_turno'>" . $row['nombre_turno'] ."</td>";
				$html.="<td>" .  $row['nombre'] ."</td>";
				$html.="<td>" .  $row['nivel'] ."</td>";
				$html.="<td>" .  $row['nombre_municipio'] ."</td>";
				$html.="<td>" .  $row['nombre_localidad']."</td>";
				$html.= "<td>".  $row['domicilio']."</td>";
				$html.="</tr>";
			}# foreach

			$response = array(
				'html'    => $html,
				'total'   => $num_rows,
				'mensaje' => $mensaje
			);

			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}


		public function getTurno(){
			$cct = $this->input->post('cct');
			$cct = "21".$cct;
			$html = "";
			$rows = $this->Escuela_model->getTurno($cct);
			if(count($rows) >= 1){
				foreach ($rows as $row) {
					$html .= "<option value=".$row['id_escuela'].">".utf8_encode($row['nombre_turno'])."</option>";
				}
				$response = array(
					'html'    => $html,
				);
			}
			else{
				$response = array(
					'html'    => 'no_hay_turnos',
				);
			}
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}

		public function info_escuela(){
			// $html = "";
			$action = $this->input->post('action');
			switch ($action) {
				case 'busqueda_xlista':
						$id_escuela = $this->input->post('id_escuela');
					  $mensaje = '';
					  $ciclo_escolar_programas = "16_17";
					  $ciclo_escolar_estadistica = "Inicio_2016-2017";
					  $ciclo_escolar_ipermanencia = "15_16";
					  $turno = "";
					 	if(strlen($id_escuela)>0){
							  $mensaje ="se_encontro_cct";
						      $respuesta = $this->Escuela_model->getInfoEscuela($id_escuela, $mensaje, $ciclo_escolar_programas, $ciclo_escolar_estadistica, $ciclo_escolar_ipermanencia);
						      $response = array(
									'respuesta'    => $respuesta,
								);
						      Utilerias::enviaDataJson(200, $response, $this);
								exit;
					 	}
				break;
				case 'busqueda_xmapa':
				// echo "busqueda_xmapa"; die();
						$cct = $this->input->post('cct');
						$turno = $this->input->post('turno');
						if($turno == "MATUTINO"){
              $id_turno = 1;
            }
            elseif ($turno == "VESPERTINO") {
              $id_turno = 2;
            }
            elseif ($turno == "NOCTURNO") {
              $id_turno = 3;
            }
            elseif ($turno == "DISCONTINUO") {
              $id_turno = 4;
            }
            elseif ($turno == "CONTINUO") {
              $id_turno = 5;
            }

						$result = $this->Escuela_model->get_xcct_turno($cct,$id_turno);
						// echo "<pre>"; print_r($result); die();
						$id_escuela = $result[0]['id_escuela'];
						$mensaje ="se_encontro_cct";

						$respuesta = $this->Escuela_model->getInfoEscuela($id_escuela, $mensaje, "16_17", "Inicio_2016-2017", "15_16");
						$response = array(
						'respuesta'    => $respuesta,
						);
						Utilerias::enviaDataJson(200, $response, $this);
						exit;
						// echo "id_escuela: ".$id_escuela; die();

				break;

			}

		}// info_escuela()



		//***************************************************************************************************** BUSCADOR DE ESCUELAS PARTICULARES
		//***************************************************************************************************** BUSCADOR DE ESCUELAS PARTICULARES
		public function get_particulares(){
			$subaction = $this->input->post('subaction');
			switch ($subaction) {
						case 'opcion1':
									$id_municipio  = "0";
									$id_nivel      = "0";
									$sostenimiento = "0";
									$clave         = $this->input->post('clave');
									$mensaje       = "modal_particulares";

									$escuelas = $this->Escuela_model->get_particulares($id_nivel, $id_municipio, $sostenimiento, $mensaje, $clave);
									$num_rows = count($escuelas);
									$html = $this->arma_tbody_particulares($escuelas);
									$response = array(
										'html'    => $html,
										'total'   => $num_rows,
										'mensaje' =>  $mensaje
									);
									Utilerias::enviaDataJson(200, $response, $this);
									exit;
						 break;
						 case 'opcion2':
						       $id_nivel = $this->input->post('id_nivel');
						       $id_municipio = $this->input->post('id_municipio');
						       $sostenimiento = "0";
						       $clave        = '';
						       $mensaje       = "modal_particulares";

						       $escuelas = $this->Escuela_model->get_particulares($id_nivel, $id_municipio, $sostenimiento, $mensaje, $clave);
						       $num_rows = count($escuelas);
									 $html =$this->arma_tbody_particulares($escuelas);
						      $response = array(
						        'html'    => $html,
						        'total'   => $num_rows,
						        'mensaje' =>  $mensaje
						      );
						      Utilerias::enviaDataJson(200, $response, $this);
						      exit;
						  break;
				 }
		}// get_particulares()
		public function busca_grid_particulares(){
			$valorabuscar = $this->input->post('valorabuscar');
			$id_municipio_global = $this->input->post('id_municipio_global');
			$id_nivel_global = $this->input->post('id_nivel_global');
			$nombre_escuela_global = $this->input->post('nombre_escuela_global');
			$sostenimiento_global ="0";
			$mensaje ="voy_diferente";

			$escuelas = $this->Escuela_model->get_particulares($id_nivel_global, $id_municipio_global, $sostenimiento_global, $mensaje, $valorabuscar);
			$num_rows = count($escuelas);
			$html =$this->arma_tbody_particulares($escuelas);

			$response = array(
				'html'    => $html,
				'total'   => $num_rows,
				'mensaje' =>  $mensaje
			);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}// busca_grid_particulares()

		function arma_tbody_particulares($arr_escuelas){
			$html ="";
			foreach ($arr_escuelas as $row) {
					$cct_ = $row['cct'];
					$w = 'searchbyfiltering';

					$html.="<tr id='".$row['id_escuela']."'>";
					// $html.="<tr id='".$cct_."'>";
					if (in_array($row['cct'], $this->alta_demanda)) {
						$html .= "
						<td  class= 'td_red' onclick='tdclick(event, this.id)' id='".$row['id_escuela']." '>
						<center> $cct_ </center>
						</td>
						";
					}else {
						$html .= "
						<td class='td_blue'  onclick='tdclick(event, this.id)' id='".$row['id_escuela']."'>
						<center> $cct_ </center>
						</td>
						";
					}

					$html.="<td id='nombre_turno'>" . $row['nombre_turno'] ."</td>";
					$html.="<td>" .  $row['nombre']. "</td>";
					$html.="<td>" .  $row['nivel']. "</td>";
					$html.="<td>" .  $row['nombre_municipio']. "</td>";
					$html.="<td>" .  $row['nombre_localidad']. "</td>";
					$html.= "<td>".  $row['domicilio']. "</td>";
					$html.="</tr>";

			}
			return $html;
		}// arma_tbody_particulares()

}
