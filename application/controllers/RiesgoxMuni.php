<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiesgoxMuni extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('Utilerias');
		$this->load->model('RiesgoxMuni_model');
	}

	public function get_all()
	{
		$data = array();
		$id_municipio = $this->input->post('param_muni');
		$id_nivel = $this->input->post('param_nvl');
		$id_bimestre = $this->input->post('param_bim');
		$id_ce = $this->input->post('param_ce');

		// $html = "";
		// $result = $this->RiesgoxMuni_model->get_all($id_municipio, $id_nivel, $id_bimestre, $id_ce);
		//
		// $html .= "<option value=0> TODOS </option>";
		// foreach ($result as $res) {
		// 	$html .= "<option value=".$res['id_municipio'].">".utf8_encode($res['nombre_municipio'])."</option>";
		// }

		$html="";


      $total_alumnos=  0;
      $muyalto=  0;
      $alto=  0;
      $medio=  0;
      $bajo=  0;
      $total1=  0;
      $total2=  0;
      $total3=  0;
      $total4=  0;
      $total5=  0;
      $total6=  0;

      $muyalto1 =  0;
        $muyalto2 =  0;
        $muyalto3 =  0;
        $muyalto4 =  0;
        $muyalto5 =  0;
        $muyalto6 =  0;
        $alto1 =  0;
        $alto2 =  0;
        $alto3 =  0;
        $alto4 =  0;
        $alto5 =  0;
        $alto6 =  0;
        $medio1 =  0;
        $medio2 =  0;
        $medio3 =  0;
        $medio4 =  0;
        $medio5 =  0;
        $medio6 =  0;
        $bajo1 =  0;
        $bajo2 =  0;
        $bajo3 =  0;
        $bajo4 =  0;
        $bajo5 =  0;
        $bajo6 =  0;
				$total_alumnos_desertaron= 0;

				$result = $this->RiesgoxMuni_model->get_alldesert($id_municipio, $id_nivel, $id_bimestre, $id_ce);

    foreach ($result as $row) {


                $total_alumnos_desertaron =  $row['total_alumnos_desertaron'];



            }

      if ($id_nivel=='PRIMARIA') {


				$result = $this->RiesgoxMuni_model->get_allprim($id_municipio, $id_nivel, $id_bimestre, $id_ce);

    foreach ($result as $row) {


                $total_alumnos =  $row['total_alumnos'];
                $muyalto = $row['muyalto_riesgo'];
                $alto =  $row['alto_riesgo'] ;
                $medio =  $row['medio_riesgo'];
                $bajo =  $row['bajo_riesgo'];
                $muyalto1 =  $row['muyalto_riesgo1'];
                $muyalto2 =  $row['muyalto_riesgo2'];
                $muyalto3 =  $row['muyalto_riesgo3'];
                $muyalto4 =  $row['muyalto_riesgo4'];
                $muyalto5 =  $row['muyalto_riesgo5'];
                $muyalto6 =  $row['muyalto_riesgo6'];
                $alto1 =  $row['alto_riesgo1'];
                $alto2 =  $row['alto_riesgo2'];
                $alto3 =  $row['alto_riesgo3'];
                $alto4 =  $row['alto_riesgo4'];
                $alto5 =  $row['alto_riesgo5'];
                $alto6 =  $row['alto_riesgo6'];
                $medio1 =  $row['medio_riesgo1'];
                $medio2 =  $row['medio_riesgo2'];
                $medio3 =  $row['medio_riesgo3'];
                $medio4 =  $row['medio_riesgo4'];
                $medio5 =  $row['medio_riesgo5'];
                $medio6 =  $row['medio_riesgo6'];
                $bajo1 =  $row['bajo_riesgo1'];
                $bajo2 =  $row['bajo_riesgo2'];
                $bajo3 =  $row['bajo_riesgo3'];
                $bajo4 =  $row['bajo_riesgo4'];
                $bajo5 =  $row['bajo_riesgo5'];
                $bajo6 =  $row['bajo_riesgo6'];

                $total1= $muyalto1 + $alto1 + $medio1;
                $total2= $muyalto2 + $alto2 + $medio2;
                $total3= $muyalto3 + $alto3 + $medio3;
                $total4= $muyalto4 + $alto4 + $medio4;
                $total5= $muyalto5 + $alto5 + $medio5;
                $total6= $muyalto6 + $alto6 + $medio6;

            }
        # code...
    }
    else{
			$result = $this->RiesgoxMuni_model->get_allsec($id_municipio, $id_nivel, $id_bimestre, $id_ce);

	foreach ($result as $row) {


                $total_alumnos =  $row['total_alumnos'];
                $muyalto = $row['muyalto_riesgo'];
                $alto =  $row['alto_riesgo'] ;
                $medio =  $row['medio_riesgo'];
                $bajo =  $row['bajo_riesgo'];
                $muyalto1 =  $row['muyalto_riesgo1'];
                $muyalto2 =  $row['muyalto_riesgo2'];
                $muyalto3 =  $row['muyalto_riesgo3'];
                $alto1 =  $row['alto_riesgo1'];
                $alto2 =  $row['alto_riesgo2'];
                $alto3 =  $row['alto_riesgo3'];
                $medio1 =  $row['medio_riesgo1'];
                $medio2 =  $row['medio_riesgo2'];
                $medio3 =  $row['medio_riesgo3'];
                $bajo1 =  $row['bajo_riesgo1'];
                $bajo2 =  $row['bajo_riesgo2'];
                $bajo3 =  $row['bajo_riesgo3'];

                $total1= $muyalto1 + $alto1 + $medio1;
                $total2= $muyalto2 + $alto2 + $medio2;
                $total3= $muyalto3 + $alto3 + $medio3;

            }
    }











            $html = '<div>';
$html .= '';
$html .= '                <div class="row contenedorfila">';
$html .= '                  <div class="col-sm-6">';
$html .= '                    <div id="containerpiechartRiesgo" style="height:400px; margin:0 auto;"></div>';
$html .= '                  </div>';
$html .= '                  <div class="col-sm-6">';
$html .= '                    <div id="containerbarchartRiesgo" style="height: 400px; margin:0 auto;"></div>';
$html .= '                  </div>';
$html .= '                </div>';
$html .= '                <div class="row contenedorfila">';
$html .= '                  <div class="col-sm-6">';
$html .= '                    <table id="tabla_pie_info" class="table table-gray table-hover">';
$html .= '                      <thead>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Total</th>';
$html .= '                          <th class="text-center">Muy Alto</th>';
$html .= '                          <th class="text-center">Alto</th>';
$html .= '                          <th class="text-center">Medio</th>';
$html .= '                          <th class="text-center">Bajo</th>';
$html .= '                        </tr>';
$html .= '                      </thead>';
$html .= '                      <tbody>';
$html .= '                        <tr>';
$html .= '                          <td class="text-center" style="font-size:1.2em; font-weight:500;">'.number_format($total_alumnos).'</td>';
$html .= '                          <td class="text-center" style="background-color:#FF0000; color:white; font-size:1.2em; font-weight:600;">'.number_format($muyalto).'</td>';
$html .= '                          <td class="text-center" style="background-color:#FF9900; font-size:1.2em; font-weight:500;">'.number_format($alto).'</td>';
$html .= '                          <td class="text-center" style="background-color:#FFFF00; font-size:1.2em; font-weight:500;">'.number_format($medio).'</td>';
$html .= '                          <td class="text-center" style="background-color:#3CB371; font-size:1.2em; font-weight:500;">'.number_format($bajo).'</td>';
$html .= '                        </tr>';
$html .= '                      </tbody>';
$html .= '                    </table>';

$html .= '
								<div class="col-sm-12">

							<table id="tabla_desertores" class="table table-hover text-center">
								<thead>
									<tr>
									<th width="20%">Alumnos que posiblemente han abandonado la escuela</th>

									</tr>
								</thead>
								<tbody>
									<tr id="total">
										<td id="mis_td">'.number_format($total_alumnos_desertaron).'</td>
									</tr>
								</tbody>
							</table>
							</div>';

$html .= '                  </div>';





              if($id_nivel=='PRIMARIA'){


$html .= '<div class="col-sm-6">';
$html .= '                    <table id="tabla_bar_info" class="table table-gray table-hover">';
$html .= '                      <thead>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center"></th>';
$html .= '                          <th class="text-center">1°</th>';
$html .= '                          <th class="text-center">2°</th>';
$html .= '                          <th class="text-center">3°</th>';
$html .= '                          <th class="text-center">4°</th>';
$html .= '                          <th class="text-center">5°</th>';
$html .= '                          <th class="text-center">6°</th>';
$html .= '                        </tr>';
$html .= '                      </thead>';
$html .= '                      <tbody>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Total</th>';
$html .= '                          <td class="text-center">'.number_format($total1).'</td>';
$html .= '                          <td class="text-center">'.number_format($total2).'</td>';
$html .= '                          <td class="text-center">'.number_format($total3).'</td>';
$html .= '                          <td class="text-center">'.number_format($total4).'</td>';
$html .= '                          <td class="text-center">'.number_format($total5).'</td>';
$html .= '                          <td class="text-center">'.number_format($total6).'</td>';
$html .= '                        </tr>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Muy Alto</th>';
$html .= '                          <td class="text-center">'.number_format($muyalto1).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto2).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto3).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto4).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto5).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto6).'</td>';
$html .= '                        </tr>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Alto</th>';
$html .= '                          <td class="text-center">'.number_format($alto1).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto2).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto3).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto4).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto5).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto6).'</td>';
$html .= '                        </tr>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Medio</th>';
$html .= '                          <td class="text-center">'.number_format($medio1).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio2).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio3).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio4).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio5).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio6).'</td>';
$html .= '                        </tr>';
$html .= '                      </tbody>';
$html .= '                    </table>';
$html .= '';
$html .= '                  </div>';


       }
      else{

$html .= '<div class="col-sm-6">';
$html .= '                    <table id="tabla_bar_info" class="table table-gray table-hover">';
$html .= '                      <thead>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center"></th>';
$html .= '                          <th class="text-center">1°</th>';
$html .= '                          <th class="text-center">2°</th>';
$html .= '                          <th class="text-center">3°</th>';
$html .= '                        </tr>';
$html .= '                      </thead>';
$html .= '                      <tbody>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Total</th>';
$html .= '                          <td class="text-center">'.number_format($total1).'</td>';
$html .= '                          <td class="text-center">'.number_format($total2).'</td>';
$html .= '                          <td class="text-center">'.number_format($total3).'</td>';
$html .= '                        </tr>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Muy Alto</th>';
$html .= '                          <td class="text-center">'.number_format($muyalto1).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto2).'</td>';
$html .= '                          <td class="text-center">'.number_format($muyalto3).'</td>';
$html .= '                        </tr>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Alto</th>';
$html .= '                          <td class="text-center">'.number_format($alto1).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto2).'</td>';
$html .= '                          <td class="text-center">'.number_format($alto3).'</td>';
$html .= '                        </tr>';
$html .= '                        <tr>';
$html .= '                          <th class="text-center">Medio</th>';
$html .= '                          <td class="text-center">'.number_format($medio1).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio2).'</td>';
$html .= '                          <td class="text-center">'.number_format($medio3).'</td>';
$html .= '                        </tr>';
$html .= '                      </tbody>';
$html .= '                    </table>';
$html .= '';
$html .= '                  </div>';




 }






      $html .= "</div>"; # Exportar a excel
      $num_rows = 0;




      $array_estadistica = array(
                                'a_g1' => '0',
                                'a_g2' => '0',
                                'a_g3' => '0',
                                'a_g4' => '0',
                                'a_g5' => '0',
                                'a_g6' => '0',
                                'g_g1' => '0',
                                'g_g2' => '0',
                                'g_g3' => '0',
                                'g_g4' => '0',
                                'g_g5' => '0',
                                'g_g6' => '0',
                                'g_mg' => '0',
                                't_docentes' => '0',
                                't_alumnos' => '0',
                                't_grupos' => '0'
                              );
      $array_ind_perma = array(
                                'valor_retencion' => '0',
                                'valor_aprobacion' => '0',
                                'valor_et' => '0'
                              );

      $array_planea = array(
                                'ILC' => '0',
                                'IILC' => '0',
                                'IIILC' => '0',
                                'IVLC' => '0',
                                'IMAT' => '0',
                                'IIMAT' => '0',
                                'IIIMAT' => '0',
                                'IVMAT' => '0',
                                'ILC15' => '0',
                                'IILC15' => '0',
                                'IIILC15' => '0',
                                'IVLC15' => '0',
                                'IMAT15' => '0',
                                'IIMAT15' => '0',
                                'IIIMAT15' => '0',
                                'IVMAT15' => '0'
                              );


        $array_riesgo = array(
                                'total_alumnos' => '0',
                                'muyalto' => '0',
                                'alto' => '0',
                                'medio' => '0',
                                'bajo' => '0'
                              );


        $array_riesgot = array(
                                'total1' => '0',
                                'total2' => '0',
                                'total3' => '0',
                                'total4' => '0',
                                'total5' => '0',
                                'total6' => '0'
                              );
        $array_btnnewriesgo = array(

                                'cct' => '0',
                                'turno' => '0',
                                'nivel' => '0'
                              );




      $array_riesgo = array(
                                'total_alumnos' => $total_alumnos,
                                'muyalto' => $muyalto,
                                'alto' => $alto,
                                'medio' => $medio,
                                'bajo' => $bajo
                              );


        $array_riesgot = array(
                                'total1' => $total1,
                                'total2' => $total2,
                                'total3' => $total3,
                                'total4' => $total4,
                                'total5' => $total5,
                                'total6' => $total6
                              );

        $array_graficas = array(
                              'estadistica' => $array_estadistica,
                              'ind_perma' => $array_ind_perma,
                              'planea' => $array_planea,
                              'riesgo' => $array_riesgo,
                              'riesgot' => $array_riesgot,
                              'btnnewriesgo'=> $array_btnnewriesgo
                              );


      $respuesta = array(
                        'html' => $html,
                          'array_graficas' => $array_graficas
                        );


		Utilerias::enviaDataJson(200, $respuesta, $this);
		exit;
	}// get_all()

}
