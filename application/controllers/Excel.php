<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->library('Utilerias');
			$this->load->library('My_PHPExcel');
			$this->load->model('Excel_model');
			$this->load->model('Escuela_model');
			$this->load->model('Estadistica_model');
			$this->ciclo_escolar_programas = "16_17";
        	$this->ciclo_escolar_estadistica = "Inicio_2016-2017";
        	$this->ciclo_escolar_ipermanencia = "15_16";

					$this->styleArray_encabezado = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'fill' => array(
              'type'  => PHPExcel_Style_Fill::FILL_SOLID,
              'color' => array(
                    'rgb' => 'F4FCFC')
          ),
          'font' => array(
              'name'  => 'Arial',
              'bold'  => true,
              'color' => array(
                  'rgb' => '000000'
              )
          )
        );
        $this->styleArray_contenido = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
              )
          ),
          'fill' => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'font' => array(
            'name'  => 'Arial',
            // 'bold'  => true,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'alignment' =>  array(
            'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
            // 'wrap'      => TRUE
        )
      );

      $this->styleArray_titulo = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'fill' => array(
          'type'  => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array(
                'rgb' => 'DFF5F5')
      ),
      'font' => array(
          'name'  => 'Arial',
          'bold'  => true,
          'color' => array(
              'rgb' => '000000'
          )
      ),
      'alignment' =>  array(
          'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
          // 'wrap'      => TRUE
      )
    );

      $this->resalta_nivel = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'fill' => array(
          'type'  => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array(
                'rgb' => 'FF8000')
      ),
      'font' => array(
          'name'  => 'Arial',
          'bold'  => true,
          'color' => array(
              'rgb' => '000000'
          )
      ),
      'alignment' =>  array(
          'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
          // 'wrap'      => TRUE
      )
    );

      $this->resalta_sostenimiento = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'fill' => array(
          'type'  => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array(
                'rgb' => 'FAAC58')
      ),
      'font' => array(
          'name'  => 'Arial',
          'bold'  => true,
          'color' => array(
              'rgb' => '000000'
          )
      ),
      'alignment' =>  array(
          'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
          // 'wrap'      => TRUE
      )
    );

      $this->resalta_modalidad = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'fill' => array(
          'type'  => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array(
                'rgb' => 'F5D0A9')
      ),
      'font' => array(
          'name'  => 'Arial',
          'bold'  => true,
          'color' => array(
              'rgb' => '000000'
          )
      ),
      'alignment' =>  array(
          'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
          // 'wrap'      => TRUE
      )
    );

      $this->style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    );



			$this->styleArray_encabezado = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
              )
          ),
          'fill' => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array(
                  'rgb' => 'F4FCFC')
        ),
        'font' => array(
            'name'  => 'Arial',
            'bold'  => true,
            'color' => array(
                'rgb' => '000000'
            )
        )
      );
      $this->styleArray_contenido = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        ),
        'fill' => array(
          'type'  => PHPExcel_Style_Fill::FILL_SOLID,
          'color' => array(
                'rgb' => 'FFFFFF')
      ),
      'font' => array(
          'name'  => 'Arial',
          // 'bold'  => true,
          'color' => array(
              'rgb' => '000000'
          )
      ),
      'alignment' =>  array(
          'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
          // 'wrap'      => TRUE
      )
    );
    $this->styleArray_titulo = array(
      'borders' => array(
          'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
          )
      ),
      'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
              'rgb' => 'DFF5F5')
    ),
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        // 'wrap'      => TRUE
    )
    );
		}

		public function exportar_excel()
		{
			// $data = array();
			// echo "<pre>";
			// print_r($_POST);
			// die();



			$action = $this->input->post('action');
			if($action=="estadistica_e_indicadores_grid"){

			  $esta_muni =  $this->input->post('in_est_muni');
			  $esta_muniN = $this->input->post('in_est_muniN');
			  $nivel = $this->input->post('in_nivel');
			  $sost = $this->input->post('in_sost');
			  $modalidad = $this->input->post('in_modalidad');
			  $ciclo = $this->input->post('in_ciclo');

				$this->crea_excel_ei_grid($esta_muniN, $esta_muni, $nivel, $sost, $modalidad, $ciclo);



			}
			if($action=="lista_escuelas"){
			  $id_escuela = $this->input->post('id_escuela');
			  $this->creaExcel($id_escuela);
			}# lista_escuelas

			if($action=="mapa_escuelas"){
			  $cct   = $_POST['cct'];
			  $turno = $_POST['turno'];

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
				// $this->crea_excel_grid($id_municipio,$id_nivel,$sostenimiento,$clave);

			  // $query = "SELECT id_escuela FROM escuela WHERE clave_ct='".$cct."' AND id_turno=".$id_turno;
			  // echo $query; die();
			  // $obj_db = new Querys();
			  // $result = $obj_db->select($query);
			  // $row = mysqli_fetch_array($result);
			  // echo "<pre>"; print_r($row); die();
			  // $id_escuela = $row['id_escuela'];

			  // $obj_exporta = new ExportarExcel($id_escuela);
			  // $obj_exporta->creaExcel();
				$this->creaExcel($id_escuela);
			}# mapa_escuelas
			if($action=="lista_escuelas_grid"){
			  $id_municipio  = $this->input->post('LE_id_municipio');
			  $id_nivel      = $this->input->post('LE_id_nivel');
			  $sostenimiento = $this->input->post('LE_sostenimiento');
			  $clave         = $this->input->post('LE_clave');

			  // $obj_exporta = new ExportarExcel();
			  $this->crea_excel_grid($id_municipio,$id_nivel,$sostenimiento,$clave);
			}
		}

		public function crea_excel_grid($id_municipio,$id_nivel,$sostenimiento,$clave){
		    $concat  = "";
				if($id_municipio != "0" || $id_municipio !=0){
					$concat .= " AND e.id_municipio = ".$id_municipio;
				}
				if($id_nivel != "0" || $id_nivel !=0){
					$concat .= " AND n.id_nivel = ".$id_nivel;
				}
				if($sostenimiento != "0" || $sostenimiento !=0){
					$concat .= " AND s.id_sostenimiento = ".$sostenimiento;
				}
				if($clave != "" || strlen(trim($clave)) >0){
					$concat .= " AND e.nombre_ct LIKE '%" . $clave . " %' ";
				}


		    $result = $this->Excel_model->excel_grid($concat);
		    $objPHPExcel = new PHPExcel();

		    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Lista de escuelas');
		    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'CCT');
		    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Turno');
		    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Nombre');
		    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Nivel');
		    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Municipio');
		    $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Localidad');
		    $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Domicilio');

		    $objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
		    $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($this->styleArray_titulo);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		    $objPHPExcel->getActiveSheet()->getStyle('A2:G2')->applyFromArray($this->styleArray_encabezado);

		    $aux = 3;
		    foreach ($result as $row) {
		      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$aux, utf8_encode($row['cct']) );
		      $objPHPExcel->getActiveSheet()->SetCellValue('B'.$aux, utf8_encode($row['nombre_turno']) );
		      $objPHPExcel->getActiveSheet()->SetCellValue('C'.$aux, utf8_encode($row['nombre']) );
		      $objPHPExcel->getActiveSheet()->SetCellValue('D'.$aux, utf8_encode($row['nivel']) );
		      $objPHPExcel->getActiveSheet()->SetCellValue('E'.$aux, utf8_encode($row['nombre_municipio']) );
		      $objPHPExcel->getActiveSheet()->SetCellValue('F'.$aux, utf8_encode($row['nombre_localidad']) );
		      $objPHPExcel->getActiveSheet()->SetCellValue('G'.$aux, utf8_encode($row['domicilio']) );
		      $objPHPExcel->getActiveSheet()->getStyle('A'.$aux.':G'.$aux)->applyFromArray($this->styleArray_contenido);
		      $aux++;
			}# foreach

		    $nombre_excel = "escuelapoblana_listaescuelas.xlsx";
		    header('Content-Type: application/vnd.ms-excel');
		    header('Content-Disposition: attachment;filename='.$nombre_excel);
		    header('Cache-Control: max-age=0');
		    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		    $objWriter->save('php://output');

		    exit;

		}// crea_excel_grid()1

		public function crea_excel_ei_grid($esta_muniN, $esta_muni, $nivel, $sost, $modalidad, $ciclo){
			// ob_start();
      $nivelnomb='TODOS';

				$result = $this->Estadistica_model->get_llenado_tabla1_0($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);


		    $objPHPExcel = new PHPExcel();





			$objPHPExcel->getActiveSheet()->SetCellValue('A1','Estadística general');

      $objPHPExcel->getActiveSheet()->mergeCells('A1:N1');

      $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Estado/Municipio: '.$esta_muni.', nivel: '.$nivel);
      $objPHPExcel->getActiveSheet()->SetCellValue('A4', 'Ciclo escolar: '.$ciclo.'.');
      $objPHPExcel->getActiveSheet()->mergeCells('A3:N3');
      $objPHPExcel->getActiveSheet()->mergeCells('A4:N4');

			$objPHPExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($this->styleArray_titulo);
      $objPHPExcel->getActiveSheet()->getStyle('A3:N3')->applyFromArray($this->styleArray_titulo);
      $objPHPExcel->getActiveSheet()->getStyle('A4:N4')->applyFromArray($this->styleArray_titulo);


      $objPHPExcel->getActiveSheet()->SetCellValue('A6','Alumnos');
      $objPHPExcel->getActiveSheet()->mergeCells('A6:N6');
      $objPHPExcel->getActiveSheet()->getStyle('A6:N6')->applyFromArray($this->styleArray_contenido);


      $objPHPExcel->getActiveSheet()->SetCellValue('A7','Nivel Educativo');
      $objPHPExcel->getActiveSheet()->mergeCells('A7:B7');

      $objPHPExcel->getActiveSheet()->SetCellValue('C7','Sostenimiento');
      $objPHPExcel->getActiveSheet()->SetCellValue('D7','Modalidad');
      $objPHPExcel->getActiveSheet()->SetCellValue('E7','Sub sostenimiento');

      $objPHPExcel->getActiveSheet()->SetCellValue('F7','Mujeres');
      $objPHPExcel->getActiveSheet()->SetCellValue('G7','Hombres');
      $objPHPExcel->getActiveSheet()->SetCellValue('H7','Total');

      $objPHPExcel->getActiveSheet()->SetCellValue('I7','1°');
      $objPHPExcel->getActiveSheet()->SetCellValue('J7','2°');
      $objPHPExcel->getActiveSheet()->SetCellValue('K7','3°');
      $objPHPExcel->getActiveSheet()->SetCellValue('L7','4°');
      $objPHPExcel->getActiveSheet()->SetCellValue('M7','5°');
      $objPHPExcel->getActiveSheet()->SetCellValue('N7','6°');
      $objPHPExcel->getActiveSheet()->getStyle('A6:N7')->applyFromArray($this->style);
      $objPHPExcel->getActiveSheet()->getStyle('A6:N7')->applyFromArray($this->styleArray_encabezado);


			$result = $this->Estadistica_model->get_llenado_tabla1_0($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
			$i=8;
      // echo "<pre>";
      // print_r($result);
      foreach ($result as $row) {

          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel_X']);
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['Sostenimiento_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['Modalidad_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['Cant_alumnos_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['Cant_alumnos_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['Cant_alumnos_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['Cant_alumnos_1_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['Cant_alumnos_2_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['Cant_alumnos_3_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['Cant_alumnos_4_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['Cant_alumnos_5_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $row['Cant_alumnos_6_T']);
          if (strtoupper($row['Nivel_X'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
          }
          $i++;
        }

				$result = $this->Estadistica_model->get_llenado_tabla1_1($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
				foreach ($result as $row) {

          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel_X']);
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['Sostenimiento_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['Modalidad_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['sub_Sostenimiento']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['Cant_alumnos_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['Cant_alumnos_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['Cant_alumnos_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['Cant_alumnos_1_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['Cant_alumnos_2_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['Cant_alumnos_3_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['Cant_alumnos_4_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['Cant_alumnos_5_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $row['Cant_alumnos_6_T']);
          if (strtoupper($row['Nivel_X'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
          }
          $i++;
        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A8:N'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;
        $tabla2_cont=$i;

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Docentes y directivos');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':N'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->style);
        $i++;
        $aux=$i+1;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Nivel Educativo');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$aux);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Sostenimiento');
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':C'.$aux);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Modalidad');
        $objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':D'.$aux);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Sub sostenimiento');
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$i.':E'.$aux);

        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Docentes');
        $objPHPExcel->getActiveSheet()->mergeCells('F'.$i.':H'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$aux,'Mujeres');
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$aux,'Hombres');
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$aux,'Total');

        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i,'Directivo con Grupo');
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':K'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$aux,'Mujeres');
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$aux,'Hombres');
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$aux,'Total');

        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i,'Directivo sin Grupo');
        $objPHPExcel->getActiveSheet()->mergeCells('L'.$i.':N'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$aux,'Mujeres');
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$aux,'Hombres');
        $objPHPExcel->getActiveSheet()->SetCellValue('N'.$aux,'Total');

        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$aux)->applyFromArray($this->style);

        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla2_cont.':N'.$aux)->applyFromArray($this->styleArray_encabezado);

        $i++;$i++;
        $tabla3_cont=$i;

				$result = $this->Estadistica_model->get_llenado_tabla2_0($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
				foreach ($result as $row) {
					$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel_X']);
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['Sostenimiento_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['Modalidad_X']);

          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['Cant_docentes_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['Cant_docentes_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['Cant_docentes_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['Cant_directivos_con_grupo_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['Cant_directivos_con_grupo_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['Cant_directivos_con_grupo_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['Cant_directivos_sin_grupo_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['Cant_directivos_sin_grupo_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $row['Cant_directivos_sin_grupo_T']);
          if (strtoupper($row['Nivel_X'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
          }
          $i++;
        }

				$result = $this->Estadistica_model->get_llenado_tabla2_1($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
				foreach ($result as $row) {
					$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel_X']);
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['Sostenimiento_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['Modalidad_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['sub_Sostenimiento']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['Cant_docentes_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['Cant_docentes_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['Cant_docentes_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['Cant_directivos_con_grupo_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['Cant_directivos_con_grupo_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['Cant_directivos_con_grupo_T']);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['Cant_directivos_sin_grupo_M']);
          $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['Cant_directivos_sin_grupo_H']);
          $objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $row['Cant_directivos_sin_grupo_T']);
          if (strtoupper($row['Nivel_X'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
          }
          $i++;
        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla3_cont.':N'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;
        $tabla4_cont=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Infraestructura');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':N'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->style);
        $i++;

        $aux=$i+1;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Nivel Educativo');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':A'.$aux);

        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i,'Sostenimiento');
        $objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':B'.$aux);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Modalidad');
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':C'.$aux);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Sub sostenimiento');
        $objPHPExcel->getActiveSheet()->mergeCells('D'.$i.':D'.$aux);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Escuelas');
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$i.':E'.$aux);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Aulas en uso');
        $objPHPExcel->getActiveSheet()->mergeCells('F'.$i.':F'.$aux);

        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i,'Grupos');
        $objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':N'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$aux,'1°');
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$aux,'2°');
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$aux,'3°');
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$aux,'4°');
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$aux,'5°');
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$aux,'6°');
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$aux,'Multigrado');
        $objPHPExcel->getActiveSheet()->SetCellValue('N'.$aux,'Total');

        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$aux)->applyFromArray($this->style);

        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla4_cont.':N'.$aux)->applyFromArray($this->styleArray_encabezado);
        $i++;$i++;
        $tabla4_cont=$i;

				$result = $this->Estadistica_model->get_llenado_tabla3_0($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
				foreach ($result as $row) {
					$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel_X']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $row['Sostenimiento_X']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['Modalidad_X']);

				 $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['escuelas']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['Cant_aulas_en_uso']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['Cant_grupos_1']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['Cant_grupos_2']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['Cant_grupos_3']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['Cant_grupos_4']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['Cant_grupos_5']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['Cant_grupos_6']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['Cant_grupos_multigrado']);
				 $objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $row['Cant_grupos']);
				 if (strtoupper($row['Nivel_X'])==$nivel) {
					 # code...
					 $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
				 }
				 $i++;
			 }

			 $tabla5_cont=$i;

			 $result = $this->Estadistica_model->get_llenado_tabla3_1($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
			 foreach ($result as $row) {

				 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, $row['Sostenimiento_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['Modalidad_X']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['sub_Sostenimiento']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['escuelas']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['Cant_aulas_en_uso']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['Cant_grupos_1']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['Cant_grupos_2']);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['Cant_grupos_3']);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['Cant_grupos_4']);
          $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['Cant_grupos_5']);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['Cant_grupos_6']);
          $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['Cant_grupos_multigrado']);
          $objPHPExcel->getActiveSheet()->SetCellValue('N'.$i, $row['Cant_grupos']);
          if (strtoupper($row['Nivel_X'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
          }
          $i++;
        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla4_cont.':N'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;

        $tabla6_cont=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Indicadores de asistencia');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':F'.$i)->applyFromArray($this->style);
        $i++;

        $aux=$i+1;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Nivel Educativo');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$aux);



        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Cobertura');
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':D'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Absorción');
        $objPHPExcel->getActiveSheet()->mergeCells('E'.$i.':F'.$i);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$aux,'Tasa');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$aux,'Posición');

        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$aux,'Tasa');
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$aux,'Posición');


        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':F'.$aux)->applyFromArray($this->style);

        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla6_cont.':F'.$aux)->applyFromArray($this->styleArray_encabezado);

///INDICADORES
        $i++;$i++;
        $tabla7_cont=$i;

				$result = $this->Estadistica_model->get_llenado_tabla4($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
 			 foreach ($result as $row) {
				 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['nivel']);
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['cobertura']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['cpos']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['absorcion']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['apos']);
          if (strtoupper($row['nivel'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':F'.$i)->applyFromArray($this->resalta_modalidad);
          }

          $i++;
        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla7_cont.':F'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;

        $tabla6_cont=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Indicadores de permanencia');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':E'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($this->style);
        $i++;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Nivel Educativo');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Retención');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Aprobación');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Eficiencia Terminal');


        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($this->style);

        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla6_cont.':E'.$i)->applyFromArray($this->styleArray_encabezado);

				$i++;
				$result = $this->Estadistica_model->get_llenado_tabla5($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
        // echo "<pre>";
        // print_r($result);
 			 foreach ($result as $row) {

				 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Primaria');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['retencion_primaria']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['aprobacion_primaria']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['eficiencia_terminal_primaria']);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($this->styleArray_contenido);
          $i++;

					$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Secundaria');
           $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
           $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['retencion_secundaria']);
           $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['aprobacion_secundaria']);
           $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['eficiencia_terminal_secundaria']);
					 $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($this->styleArray_contenido);
           $i++;

					 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Media Superior');
	          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
	          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['retencion_media_superior']);
	          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['aprobacion_media_superior']);
	          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['eficiencia_terminal_media_superior']);
						$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($this->styleArray_contenido);
	          $i++;
        }
        $i++;


        $tabla6_cont=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Indicadores de Aprendizaje');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':N'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->style);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->styleArray_encabezado);
        $i++;
        $aux1=$i+1;
        $aux2=$i+2;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Nivel');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$aux2);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, 'Lenguaje y Comunicación');
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':H'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, 'Matemáticas');
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$i.':N'.$i);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$aux1, 'Nivel de dominio');
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$aux1.':F'.$aux1);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$aux1, 'Nivel de dominio');
        $objPHPExcel->getActiveSheet()->mergeCells('I'.$aux1.':L'.$aux1);

        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$aux1, 'Porcentaje de alumnos con nivel bueno y excelente');
        $objPHPExcel->getActiveSheet()->mergeCells('G'.$aux1.':H'.$aux2);
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$aux1, 'Porcentaje de alumnos con nivel bueno y excelente');
        $objPHPExcel->getActiveSheet()->mergeCells('M'.$aux1.':N'.$aux2);

        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$aux2, 'I');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$aux2, 'II');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$aux2, 'III');
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$aux2, 'IV');
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$aux2, 'I');
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$aux2, 'II');
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$aux2, 'III');
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$aux2, 'IV');


        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$aux2)->applyFromArray($this->style);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$aux2)->applyFromArray($this->styleArray_encabezado);

        $i++;$i++;$i++;
        $tabla7_cont=$i;

				$result = $this->Estadistica_model->get_llenado_tabla6($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
 			  // echo "<pre>";
      //   print_r($result);
       foreach ($result as $row) {

				 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, $row['Nivel']);
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['lyc_I']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['lyc_II']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['lyc_III']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['lyc_IV']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['lyc_III_mas_IV']);
          $objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':H'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $row['mat_I']);
          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, $row['mat_II']);
          $objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, $row['mat_III']);
          $objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, $row['mat_IV']);
          $objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, $row['mat_III_mas_IV']);
          $objPHPExcel->getActiveSheet()->mergeCells('M'.$i.':N'.$i);
          if (strtoupper($row['Nivel'])==$nivel) {
            # code...
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($this->resalta_modalidad);
          }
          $i++;
        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla7_cont.':N'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;

        $tabla6_cont=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Rezago educativo');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':H'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':H'.$i)->applyFromArray($this->style);
        $i++;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Inasistencia escolar');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Población total');
        $objPHPExcel->getActiveSheet()->mergeCells('C'.$i.':E'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Población que no asiste a la escuela');
        $objPHPExcel->getActiveSheet()->mergeCells('F'.$i.':H'.$i);
        $i++;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Población por grupo de edad que no asiste a la escuela');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Mujeres');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Hombres');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Total');
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i,'Mujeres');
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i,'Hombres');
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i,'Total');

        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla6_cont.':H'.$i)->applyFromArray($this->style);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla6_cont.':H'.$i)->applyFromArray($this->styleArray_encabezado);
        $i++;
        $tabla7_cont=$i;

				$result = $this->Estadistica_model->get_llenado_tabla7($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
 			  // echo "<pre>";
      //   print_r($result);
       foreach ($result as $row) {

				 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, '3 a 5 años');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['TM_3_5']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['TH_3_5']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['TT_3_5']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['INM_3_5']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['INH_3_5']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['INT_3_5']);
          $i++;
          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, '6 a 11 años');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['TM_6_11']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['TH_6_11']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['TT_6_11']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['INM_6_11']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['INH_6_11']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['INT_6_11']);
          $i++;
          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, '12 a 14 años');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['TM_12_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['TH_12_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['TT_12_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['INM_12_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['INH_12_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['INT_12_14']);
          $i++;
          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, '15 a 17 años');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['TM_15_17']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['TH_15_17']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['TT_15_17']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['INM_15_17']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['INH_15_17']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['INT_15_17']);
          $i++;
          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, '18 a 22 años');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['TM_18_22']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['TH_18_22']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['TT_18_22']);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, $row['INM_18_22']);
          $objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, $row['INH_18_22']);
          $objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, $row['INT_18_22']);
          $i++;
        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla7_cont.':H'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;

        $tabla6_cont=$i;
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i,'Analfabetismo');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':E'.$i);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i)->applyFromArray($this->style);
        $i++;
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i,'Mujeres');
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i,'Hombres');
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i,'Total');

        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla6_cont.':E'.$i)->applyFromArray($this->style);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla6_cont.':E'.$i)->applyFromArray($this->styleArray_encabezado);
        $i++;
        $tabla7_cont=$i;

				$result = $this->Estadistica_model->get_llenado_tabla8($esta_muniN, $esta_muni, $nivel, $nivelnomb, $sost, $modalidad, $ciclo);
 			  // echo "<pre>";
      //   print_r($result);
       foreach ($result as $row) {

				 $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Población de 8 a 14 años que no saben leer ni escribir');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['ANM_8_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['ANH_8_14']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['ANT_8_14']);
          $i++;
          $objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, 'Población mayor de 15 años que no saben leer ni escribir');
          $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':B'.$i);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, $row['ANM_15_OM']);
          $objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $row['ANH_15_OM']);
          $objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, $row['ANT_15_OM']);
          $i++;

        }
        $i--;
        $objPHPExcel->getActiveSheet()->getStyle('A'.$tabla7_cont.':E'.$i)->applyFromArray($this->styleArray_contenido);
        $i++;$i++;




      foreach(range('A','N') as $columnID) {
      $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}


		    $nombre_excel = "escuelapoblana_estadisticas_indicadores.xlsx";
		    // header('Content-Type: application/vnd.ms-excel');
		    // header('Content-Disposition: attachment;filename='.$nombre_excel);
		    // header('Cache-Control: max-age=0');
       
		    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        ob_end_clean();
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$nombre_excel);
		    $objWriter->save('php://output');

		    exit;

		}// crea_excel_ei_grid()1

		public function creaExcel($id_escuela){

		    // $obj_db = new Querys();
			$objPHPExcel = new PHPExcel();
		      $html="";
		      // $ciclo_escolar_programas = "16_17";


		      $result = $this->Excel_model->excel1($id_escuela);
		      $nivel_datos_escuela='';
		      $cct_global = "";
		      $turno_global = "";

		      ################################################  LLENAMOS LA TABLA 1
		      ################################################  LLENAMOS LA TABLA 1 Datos de la Escuela
		      ################################################  LLENAMOS LA TABLA 1

		      $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Datos de la escuela');
		      if (count($result) >= 1){
		      	$row = $result[0];
		          $global_claveCT      =  $row['clave_ct']; // echo "<pre>"; print_r($row); die();
		          $id_turno_global     =  $row['id_turno'];
		          $nombre_turno_global =  $row['nombre_turno'];
		          $nivel_global        =  $row['nombre_nivel'];
		          $nivel_datos_escuela = $row['nombre_nivel'];

		          //Escribimos en la hoja en la celda B1
		          $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Nivel');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Modalidad');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B4', 'Sostenimiento');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B5', 'Clave del Centro de Trabajo');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Nombre');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B7', 'Turno');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B8', 'Domicilio');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B9', 'Municipio');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B10', 'Localidad');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B11', 'CORDE');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B12', 'Sector');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B13', 'Zona Escolar');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B14', 'Nombre del Director');

		          $objPHPExcel->getActiveSheet()->SetCellValue('C2', $row['nombre_nivel']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C3', $row['nombre_modalidad']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C4', $row['nombre_sostenimiento']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C5', $row['clave_ct']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C6', $row['nombre_ct']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C7', $row['nombre_turno']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C8', $row['domicilio']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C9', $row['nombre_municipio']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C10', $row['nombre_localidad']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C11', $row['nombre_corde']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C12', $row['sector']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C13', $row['zona']);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C14', utf8_encode($row['nombre_director']));

		          $objPHPExcel->getActiveSheet()->mergeCells('B1:C1');

		          $objPHPExcel->getActiveSheet()->getStyle('B1:C1')->applyFromArray($this->styleArray_titulo);
		          $objPHPExcel->getActiveSheet()->getStyle('B2:B14')->applyFromArray($this->styleArray_encabezado);
		          $objPHPExcel->getActiveSheet()->getStyle('C2:C14')->applyFromArray($this->styleArray_contenido);



		        }# if
		        else {}





		      ################################################  LLENAMOS LA TABLA 2
		      ################################################  LLENAMOS LA TABLA 2 Estatus de la Escuela
		      ################################################  LLENAMOS LA TABLA 2
		      $objPHPExcel->getActiveSheet()->SetCellValue('B16', 'Estatus de la Escuela');

		      $objPHPExcel->getActiveSheet()->mergeCells('B16:C16');
		      $objPHPExcel->getActiveSheet()->SetCellValue('B17', 'Estatus');
		      $objPHPExcel->getActiveSheet()->SetCellValue('B18', 'Fecha de creación');
		      $objPHPExcel->getActiveSheet()->SetCellValue('B19', 'Última actualización');
		      $objPHPExcel->getActiveSheet()->SetCellValue('B20', 'Fecha de cierre');

		      $objPHPExcel->getActiveSheet()->SetCellValue('C17', $row['nombre_estatus']);
		      $objPHPExcel->getActiveSheet()->SetCellValue('C18', $row['fecha_alta']);
		      $objPHPExcel->getActiveSheet()->SetCellValue('C19', $row['fecha_actualizacion']);
		      $objPHPExcel->getActiveSheet()->SetCellValue('C20', $row['fecha_clausura']);

		      $objPHPExcel->getActiveSheet()->getStyle('B16:C16')->applyFromArray($this->styleArray_titulo);
		      $objPHPExcel->getActiveSheet()->getStyle('B17:B20')->applyFromArray($this->styleArray_encabezado);
		      $objPHPExcel->getActiveSheet()->getStyle('C17:C20')->applyFromArray($this->styleArray_contenido);



		        ################################################  LLENAMOS LA TABLA 3
		        ################################################  LLENAMOS LA TABLA 3 Programas Federales de Apoyo (Ciclo 2016 - 2017)
		        ################################################  LLENAMOS LA TABLA 3

		        $resultp = $this->Excel_model->excel2($global_claveCT, $id_turno_global, $this->ciclo_escolar_programas);
		        if (count($resultp) >= 1){
		        	$row = $resultp[0];

		          $objPHPExcel->getActiveSheet()->SetCellValue('B22', 'Programas Federales de Apoyo (Ciclo 2016 - 2017)');

		          $objPHPExcel->getActiveSheet()->mergeCells('B22:C22');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B23', 'PROGRAMA PARA LA INCLUSIÓN Y LA EQUIDAD EDUCATIVA (PIEE)');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B24', 'PROGRAMA DE FORTALECIMIENTO DE LA CALIDAD EDUCATIVA (PFCE)');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B25', 'PROGRAMA NACIONAL DE CONVIVENCIA ESCOLAR (PNCE)');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B26', 'PROGRAMA ESCUELAS DE TIEMPO COMPLETO (PETC)');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B27', 'PROGRAMA NACIONAL DE INGLÉS (PRONI)');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B28', 'PROGRAMA ALIMENTACIÓN');
		          $objPHPExcel->getActiveSheet()->SetCellValue('B29', 'PROGRAMA ESCUELAS AL CIEN');

		          $piee       = ($row['PIEE']=="X")?"SI":"NO";
		          $pfce       = ($row['PFCE']=="X")?"SI":"NO";
		          $pnce       = ($row['PNCE']=="X")?"SI":"NO";
		          $petc       = ($row['PETC']=="X")?"SI":"NO";
		          $proni      = ($row['PRONI']=="X")?"SI":"NO";
		          $pro_alim   = ($row['PRO_ALIM']=="X")?"SI":"NO";
		          $pro_alcien = ($row['PRO_ALCIEN']=="X")?"SI":"NO";

		          $objPHPExcel->getActiveSheet()->SetCellValue('C23',$piee);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C24',$pfce);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C25',$pnce);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C26',$petc);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C27',$proni);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C28',$pro_alim);
		          $objPHPExcel->getActiveSheet()->SetCellValue('C29',$pro_alcien);

		          $objPHPExcel->getActiveSheet()->getStyle('B22:C22')->applyFromArray($this->styleArray_titulo);
		          $objPHPExcel->getActiveSheet()->getStyle('B23:B29')->applyFromArray($this->styleArray_encabezado);
		          $objPHPExcel->getActiveSheet()->getStyle('C23:C29')->applyFromArray($this->styleArray_contenido);
		      }
		      else{}





		      ################################################  LLENAMOS LA TABLA 4
		      ################################################  LLENAMOS LA TABLA 4 Estadística
		      ################################################  LLENAMOS LA TABLA 4

		      $result_e = $this->Excel_model->excel3($global_claveCT, $id_turno_global, $this->ciclo_escolar_estadistica);
		      if (count($result_e) >= 1){
		      	$row = $result_e[0];
		            $objPHPExcel->getActiveSheet()->SetCellValue('B31', 'Estadística');
		            $objPHPExcel->getActiveSheet()->SetCellValue('C32', 'Total');
		            $objPHPExcel->getActiveSheet()->SetCellValue('D32', 'Grados');
		            $objPHPExcel->getActiveSheet()->SetCellValue('D33', '1°');
		            $objPHPExcel->getActiveSheet()->SetCellValue('E33', '2°');
		            $objPHPExcel->getActiveSheet()->SetCellValue('F33', '3°');
		            $objPHPExcel->getActiveSheet()->SetCellValue('G33', '4°');
		            $objPHPExcel->getActiveSheet()->SetCellValue('H33', '5°');
		            $objPHPExcel->getActiveSheet()->SetCellValue('I33', '6°');

		            $objPHPExcel->getActiveSheet()->SetCellValue('B34', 'Alumnos');
		            $objPHPExcel->getActiveSheet()->SetCellValue('C34', $row['alumnos_total']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('D34', $row['alumnos_total1']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('E34', $row['alumnos_total2']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('F34', $row['alumnos_total3']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('G34', $row['alumnos_total4']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('H34', $row['alumnos_total5']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('I34', $row['alumnos_total6']);

		            $objPHPExcel->getActiveSheet()->SetCellValue('B35', 'Grupos');
		            $objPHPExcel->getActiveSheet()->SetCellValue('C35', $row['grupos_total']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('D35', $row['grupos_1']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('E35', $row['grupos_2']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('F35', $row['grupos_3']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('G35', $row['grupos_4']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('H35', $row['grupos_5']);
		            $objPHPExcel->getActiveSheet()->SetCellValue('I35', $row['grupos_6']);


		            $objPHPExcel->getActiveSheet()->SetCellValue('B36', 'Docentes');
		            $objPHPExcel->getActiveSheet()->SetCellValue('C36', $row['total_docentes']);


		            $objPHPExcel->getActiveSheet()->mergeCells('B31:I31');

		            $objPHPExcel->getActiveSheet()->mergeCells('B32:B33');
		            $objPHPExcel->getActiveSheet()->mergeCells('C32:C33');

		            $objPHPExcel->getActiveSheet()->mergeCells('D32:I32');

		            $objPHPExcel->getActiveSheet()->getStyle('B31:I31')->applyFromArray($this->styleArray_titulo);
		            $objPHPExcel->getActiveSheet()->getStyle('B32:B33')->applyFromArray($this->styleArray_encabezado);
		            $objPHPExcel->getActiveSheet()->getStyle('C32:C33')->applyFromArray($this->styleArray_encabezado);
		            $objPHPExcel->getActiveSheet()->getStyle('B32:I32')->applyFromArray($this->styleArray_encabezado);
		            $objPHPExcel->getActiveSheet()->getStyle('D33:I33')->applyFromArray($this->styleArray_encabezado);
		            $objPHPExcel->getActiveSheet()->getStyle('B34:I34')->applyFromArray($this->styleArray_contenido);
		            $objPHPExcel->getActiveSheet()->getStyle('B35:I35')->applyFromArray($this->styleArray_contenido);
		            $objPHPExcel->getActiveSheet()->getStyle('B36:I36')->applyFromArray($this->styleArray_contenido);

		        }else{}


		          ################################################  LLENAMOS LA TABLA 5
		          ################################################  LLENAMOS LA TABLA 5 Indicadores de Permanencia
		          ################################################  LLENAMOS LA TABLA 5

		          $result_ip = $this->Excel_model->excel4($global_claveCT, $id_turno_global, $this->ciclo_escolar_estadistica);

		          if (count($result_ip)){
		          	$row = $result_ip[0];
		            $ret    = ($row['retencion']!="")?$row['retencion']:"El sistema no cuenta con esta información";
		            $aprob  = ($row['aprobacion']!="")?$row['aprobacion']:"El sistema no cuenta con esta información";
		            $ef_ter = ($row['eficiencia_terminal']!="")?$row['eficiencia_terminal']:"El sistema no cuenta con esta información";

		            $objPHPExcel->getActiveSheet()->SetCellValue('B38', 'Indicadores de Permanencia');
		            $objPHPExcel->getActiveSheet()->mergeCells('B38:D38');

		            $objPHPExcel->getActiveSheet()->SetCellValue('B39', 'Retención');
		            $objPHPExcel->getActiveSheet()->SetCellValue('C39', 'Aprobación');
		            $objPHPExcel->getActiveSheet()->SetCellValue('D39', 'Eficiencia Terminal');

		            $objPHPExcel->getActiveSheet()->SetCellValue('B40', $ret);
		            $objPHPExcel->getActiveSheet()->SetCellValue('C40', $aprob);
		            $objPHPExcel->getActiveSheet()->SetCellValue('D40', $ef_ter);

		            $objPHPExcel->getActiveSheet()->getStyle('B38:D38')->applyFromArray($this->styleArray_titulo);
		            $objPHPExcel->getActiveSheet()->getStyle('B39:D39')->applyFromArray($this->styleArray_encabezado);
		            $objPHPExcel->getActiveSheet()->getStyle('B40:D40')->applyFromArray($this->styleArray_contenido);

		          }else{}



		            ################################################  LLENAMOS LA TABLA 6
		            ################################################  LLENAMOS LA TABLA 6 Indicadores de Aprendizaje
		            ################################################  LLENAMOS LA TABLA 6


		              $objPHPExcel->getActiveSheet()->SetCellValue('B42', 'Indicadores de Aprendizaje');
		              $objPHPExcel->getActiveSheet()->SetCellValue('B43', 'Resultados de la prueba Planea');
		              $objPHPExcel->getActiveSheet()->SetCellValue('C43', 'Lenguaje y Comunicación');
		              $objPHPExcel->getActiveSheet()->SetCellValue('H43', 'Matemáticas');

		              $objPHPExcel->getActiveSheet()->SetCellValue('B45', 'Nivel');
		              $objPHPExcel->getActiveSheet()->SetCellValue('C44', 'Nivel de dominio');
		              $objPHPExcel->getActiveSheet()->SetCellValue('C45', 'I');
		              $objPHPExcel->getActiveSheet()->SetCellValue('D45', 'II');
		              $objPHPExcel->getActiveSheet()->SetCellValue('E45', 'III');
		              $objPHPExcel->getActiveSheet()->SetCellValue('F45', 'IV');

		              $objPHPExcel->getActiveSheet()->SetCellValue('H44', 'Nivel de dominio');
		              $objPHPExcel->getActiveSheet()->SetCellValue('L45', 'Porcentaje de alumnos con nivel bueno y excelente');
		              $objPHPExcel->getActiveSheet()->SetCellValue('H45', 'I');
		              $objPHPExcel->getActiveSheet()->SetCellValue('I45', 'II');
		              $objPHPExcel->getActiveSheet()->SetCellValue('J45', 'III');
		              $objPHPExcel->getActiveSheet()->SetCellValue('K45', 'IV');

		              $objPHPExcel->getActiveSheet()->mergeCells('B42:L42');
		              $objPHPExcel->getActiveSheet()->mergeCells('B43:B44');
		              $objPHPExcel->getActiveSheet()->mergeCells('C43:G43');
		              $objPHPExcel->getActiveSheet()->mergeCells('H43:L43');
		              $objPHPExcel->getActiveSheet()->mergeCells('C44:F44');
		              $objPHPExcel->getActiveSheet()->mergeCells('H44:K44');

		              // $objPHPExcel->getActiveSheet()->mergeCells('G44:G45');

		              $objPHPExcel->getActiveSheet()->SetCellValue('G45', 'Porcentaje de alumnos con nivel bueno y excelente');

		              $objPHPExcel->getActiveSheet()->getStyle('B42:L42')->applyFromArray($this->styleArray_titulo);

		              $objPHPExcel->getActiveSheet()->getStyle('B43:L43')->applyFromArray($this->styleArray_encabezado);
		              $objPHPExcel->getActiveSheet()->getStyle('B44:L44')->applyFromArray($this->styleArray_encabezado);
		              $objPHPExcel->getActiveSheet()->getStyle('B45:L45')->applyFromArray($this->styleArray_encabezado);
		              $objPHPExcel->getActiveSheet()->getStyle('B46:L46')->applyFromArray($this->styleArray_contenido);


		              $result_ipe = $this->Excel_model->excel5($nivel_global, $global_claveCT, $id_turno_global, $this->ciclo_escolar_ipermanencia);

		              if (count($result_ipe) >= 1){
		              	$row = $result_ipe[0];
		                $lco_bueno = (double)$row['IIILC']+(double)$row['IVLC'];
		                $mat_bueno = (double)$row['IIIMAT']+(double)$row['IVMAT'];

		                $objPHPExcel->getActiveSheet()->SetCellValue('B46', $row['nivel']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('C46', $row['ILC']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('D46', $row['IILC']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('E46', $row['IIILC']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('F46', $row['IVLC']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('G46', $lco_bueno);
		                $objPHPExcel->getActiveSheet()->SetCellValue('H46', $row['IMAT']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('I46', $row['IIMAT']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('J46', $row['IIIMAT']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('K46', $row['IVMAT']);
		                $objPHPExcel->getActiveSheet()->SetCellValue('L46', $mat_bueno);
		              }else{}

		              $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		              $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		              $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		              $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		              $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		              $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		              // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


		              $nombre_excel = "escuelapoblana_".$global_claveCT."_".$nombre_turno_global.".xlsx";
		              /*
		              $objWriter->save("../../public/excel_tmp/".$nombre_excel);
		              echo json_encode($nombre_excel);
		              */

		              // header('Content-Type: application/vnd.ms-excel');
		              // header('Content-Disposition: attachment;filename='.$nombre_excel);
		              // header('Cache-Control: max-age=0');

		              // $objWriter=PHPExcel_IOFactory::createWriter($this->objPHPExcel,'Excel2007');
		              // $objWriter->save('php://output');
		              // exit;

		              // $nombre_excel = "escuelapoblana_listaescuelas.xlsx";
					    header('Content-Type: application/vnd.ms-excel');
					    header('Content-Disposition: attachment;filename='.$nombre_excel);
					    header('Cache-Control: max-age=0');
					    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
					    $objWriter->save('php://output');

					    exit;


		}# creaExcel()



}
