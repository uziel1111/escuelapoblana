
<!-- <section> -->
<div  class="container" style="margin-bottom: 25px">
  <div class="row">
    <div class="col-sm-12">
      <div id="div_particulares_opciones">
          <div class="row">
            <div class="col-sm-12">
              <center>
                <div class="h3">  <strong> Portafolio Único</strong></div>
              </center>
            </div>
            <div class="col-sm-12">
              <center class="">
                <p >Inicial, Preescolar, Primaria, Secundaria, Secundaria Técnica, Capacitación para el trabajo, Técnico, Técnico Profesional, Bachillerato General, Tecnológico y no Escolarizado.</p>
              </center>
            </div>
          </div> <!-- row -->
<div class="card card-style-1">
  <div class="card-header bg-primary text-center">
    <span class="second-txt">Catálogo de Documentos por Tema</span>
  </div>
  <div class="card-body">
<?php
		$dir = "escuelapoblana_pdfs/portafolio_unico/txt/";
		$dirn = "./nota.php";
	
		$file = glob ('escuelapoblana_pdfs/portafolio_unico/txt/*.{txt}', GLOB_BRACE);
		natsort($file);
		//print_r($file);
	  
		$total = count($file);
	  
		foreach ($file as $dirm) 
		{ 
			$m_array = explode ('/', $dirm);
			print_r($m_array);
			$file_n = $m_array[3];
			//$file_n = substr($file_n,0,-4);
 			echo $file_n;
				$code_array = explode ('-', $file_n);
				//print_r($code_array);
				$type_array = array(substr($code_array[0],0,2));
/*				sort($type_array);
				print_r($type_array);
				$file_t = $type_array[0];
				$file_t = substr($file_t,0,2);
			    print_r($type_array);
				sort($t_array, SORT_STRING);
				echo $file_t;
				echo "<br>";*/

		}	      
	  
?>	  
<div class="accordion accordion-style-1" id="accordionDocs">
  <div class="card">
    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="cursor: pointer;">
       <i class="fas fa-clipboard-list mr-2"></i> <span class="text-primary">tema</span> 
		<span class="float-right badge badge-danger h4 text-light"><?php echo $total;?></span>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionDocs">
      <div class="card-body p-0">		  

                    <div class="col">		  
<?php

		echo "<table class='table table-striped table-hover'>";
		echo "<thead>";  
		echo "<tr>";    
		echo "<th scope='col'>#</th>";      
		echo "<th scope='col'>Nombre del documento</th>";      
		echo "<th scope='col'>Área concentradora</th>";      
		echo "<th scope='col'>Opciones</th>";      
		echo "<tr>";    
		echo "<thead>";  
		echo "<tbody>";  
		$i = 0;
		foreach ($file as $f) 
		{ 
		  if ($f !== '.' and $f !== '..')
		  {
			$i++;
		    echo "<tr>";
				$n_file = fopen($f , "r");
				$n_name = fread($n_file,filesize($f));
				$n_array = explode ("|", $n_name);
			   // print_r($n_array);
			    echo "<th scope='row'>";
			    echo $i ."</th>";
				echo "<td>". $n_array[3] ."</span></td>";
				echo "<td>". $n_array[6] ."</span></td>";
				echo "<td nowrap>";
			    echo "<span data-toggle='modal' data-target='#capturaModal'><button type='button' class='btn btn-sm btn-primary'><i class='fa fa-file'></i></button></span>";
			    echo "<span data-toggle='modal' data-target='#capturaModal'><button type='button' class='btn btn-sm btn-info'><i class='fa fa-eye'></i></button></span>";
			    echo "<span data-toggle='modal' data-target='#capturaModal'><button type='button' class='btn btn-sm btn-success'><i class='fa fa-address-card'></i></button></span>";			  
				echo "</td>";
			echo "</tr>";
			fclose($n_file);
		  } 
		}

 echo "</tbody>";
echo "</table>";	
			
	
/*$a_dir = glob ("escuelapoblana_pdfs/portafolio_unico/txt/*.txt", GLOB_BRACE);
	foreach ($a_dir as $filename){
		$filename = basename($filename);
		
		echo $filename;
		echo "<br/>";
	}*/


?>
</div>
</div>	
</div>
</div>	
</div>
	  
</div>	
</div>	
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  

      </div><!-- div_particulares_opciones -->
  </div> <!-- col-xs-12 -->
  </div> <!-- row -->
</div><!-- container -->

<!-- Modal Comercializacion -->
		<div id="modalComercializacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-style-1">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open" aria-hidden="true"></i> Comercialización de servicios educativos y pagos de derechos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

					</div>
					<div class="modal-body">
			<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del documento</th>
      <th scope="col">Tipo de Archivo</th>
      <th scope="col">Descargar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Acuerdo Información para la comercialización de los servicios educativos de particulares</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Comercialización de servicios educativos y pagos de derechos/Acuerdo_Informaciyn_para_la_comercializaciyn_de_los_servicios_educativos_que_prestan_los_particulares.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Ley de Ingresos del Estado de Puebla para el Ejercicio Fiscal 2018</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Comercialización de servicios educativos y pagos de derechos/Ley_de_Ingresos_del_Estado_de_Puebla_para_el_Ejercicio_Fiscal_2018.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
  </tbody>
</table>
					</div>
				</div>
			</div>
		</div>

<!-- Modal Basica -->
		<div id="modalBasica" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-style-1">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open" aria-hidden="true"></i> Educación Básica</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

					</div>
					<div class="modal-body">
			<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del documento</th>
      <th scope="col">Tipo de Archivo</th>
      <th scope="col">Descargar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Acuerdo Específico de Educación Preescolar SEP Puebla 2016</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/3_Acuerdo_Especyfico_de_Educaciyn_Preescolar_SEP_Puebla_2016.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Acuerdo Específico de Educación Primaria SEP Puebla 2016</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/4_Acuerdo_Especyfico_de_Educaciyn_Primaria__SEP_Puebla_2016 (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Acuerdo Específico de Educación Secundaria SEP Puebla 2016</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/5_Acuerdo_Especyfico_de_Educaciyn_Secundaria_SEP_Puebla_2016.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Circular de Actividades Extraescolares</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Circular_de_Actividades_Extraescolares (2).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Circular de Cursos de Verano 2018</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Circular_de_Cursos_de_Verano_2018 (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Información Jurídico Administrativa de Educación Básica</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Informaciyn_Jurydico_Administrativa_de_Educaciyn_ByAsica.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Profesiograma de Educación Básica</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Profesiograma_de_Educaciyn_ByAsica.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>	  
  </tbody>
</table>
					</div>
				</div>
			</div>
		</div>

<!-- Modal Inicial -->
		<div id="modalInicial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-style-1">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open" aria-hidden="true"></i> Educación Inicial</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

					</div>
					<div class="modal-body">
			<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del documento</th>
      <th scope="col">Tipo de Archivo</th>
      <th scope="col">Descargar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Acuerdo Específico de Educación Inicial SEP Puebla 2016</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Inicial/2_Acuerdo_Especyfico_de_Educaciyn_Inicial_SEP_Puebla_2016.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Información Jurídico Administrativa de Educación Inicial</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Inicial/Informacion_Jurydico_Administrativa_de_Educaciyn_Inicial.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Modelo de Atención con Enfoque Integral para la Educación Inicial</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Inicial/Modelo_de_Atenciyn_con_Enfoque_Integral_para_la_Educaciyn_Inicial.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
 
  </tbody>
</table>
					</div>
				</div>
			</div>
		</div>

<!-- Modal Generales -->
		<div id="modalGenerales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-style-1">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open" aria-hidden="true"></i> Generales</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

					</div>
					<div class="modal-body">
			<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del documento</th>
      <th scope="col">Tipo de Archivo</th>
      <th scope="col">Descargar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Acuerdo Específico de Educación Inicial SEP Puebla 2016</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/1_Acuerdo_Bases_Generales_SEP_Puebla_2016 (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Información Jurídico Administrativa de Educación Inicial</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/Acuerdo_Cambio_de_domicilio_temporal_-_Periydico_Oficial.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Circular Lineamientos para la protección de los derechos humanos de los educandos</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/Circular_Lineamientos_para_la_protecciyn_de_los_derechos_humanos_de_los_educandos_en_situaciones_o_conflictos_de_violenci~1.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
     <tr>
      <th scope="row">4</th>
      <td>Circular sobre Entrega de Certificados, Constancias y Diplomas Escolares</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/Circular_sobre_Entrega_de_Certificados_Constancias_y_Diplomas_Escolares.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
  </tbody>
</table>
					</div>
				</div>
			</div>
		</div>

<!-- Modal Media Superior -->
		<div id="modalMS" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-style-1">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open" aria-hidden="true"></i> Media Superior</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

					</div>
					<div class="modal-body">
			<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre del documento</th>
      <th scope="col">Tipo de Archivo</th>
      <th scope="col">Descargar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Acuerdo 243 RVOE</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_243_RVOE.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Acuerdo 286 Estudios Realizados en el Extranjero</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_286_Estudios_Realizados_en_el_Extranjero (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Acuerdo 444 Marco Curricular Común</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_444_Marco_Curricular_Comyn.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
     <tr>
      <th scope="row">4</th>
      <td>Acuerdo 445 Modalidad</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_445_Modalidad.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Acuerdo 447 Competencias Docentes de Educación Media Superior</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_447_Competencias_Docentes_de_Educaciyn_Media_Superior (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
     <tr>
      <th scope="row">6</th>
      <td>Acuerdo 449 Competencias Director Educación Media Superior</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_449_Competencias_Director_Educaciyn_Media_Superior.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Acuerdo 450 Lineamientos Particulares Educación Media Superior</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_450_Lineamientos_Particulares_Educaciyn_Media_Superior (2).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
     <tr>
      <th scope="row">8</th>
      <td>Acuerdo Específico de Educación Media Superior SEP Puebla 2016 con Profesiograma</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_Especyfico_de_Educaciyn_Media_Superior_SEP_Puebla_2016_con_Profesiograma.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Acuerdo Específico de Educación Media Superior SEP Puebla 2016 sin Profesiograma</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_Especyfico_de_Educaciyn_Media_Superior_SEP_Puebla_2016_sin_Profesiograma.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
     <tr>
      <th scope="row">10</th>
      <td>Acuerdo para la obtención de Título Profesional Diploma de Especialidad y Grados Académicos</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_para_la_obtenciyn_de_Tytulo_Profesional_Diploma_de_Especialidad_y_Grados_Acadymicos.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <th scope="row">11</th>
      <td>Información Jurídico Administrativa de Educación Media Superior</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Informaciyn_Jurydico_Administrativa_de_Educaciyn_Media_Superior (4).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>
     <tr>
      <th scope="row">12</th>
      <td>Profesiograma de Educación Media Superior</td>
      <td>PDF</td>
      <td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Profesiograma_de_Educaciyn_Media_Superior.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
    </tr>	  
  </tbody>
</table>
					</div>
				</div>
			</div>
		</div>


<input type="hidden" id="EP_escuela_hidden" value=""/><input type="hidden" id="EP_nivel_hidden" value="0"/><input type="hidden" id="EP_municipio_hidden" value="0"/>


<!-- <script type="text/javascript" src="public/js/escuelas_particulares.js"></script> -->

<!-- Global site tag (gtag.js) - Google Analytics -->

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112793645-1');
</script>


<script>
path_home = "http://escuelapoblana.org/escuelapoblana_pdfs/";

$("#EP_a_cat_ep").click(function(){
  window.location = 'http://escuelapoblana.org/escuelapoblana_pdfs/escuelas_particulares/1. Catálogo_de_Nombres_Enero_2018.xlsx';
});


$("#EP_btn_manualusuario").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/5. Manual del usuario.pdf');?>";
  muestraPDF(pdf);
});

$("#EP_btn_preguntasfrecuentes").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/4. Preguntas frecuentes ante la Ventanilla 2017.pdf');?>";
  muestraPDF(pdf);
});



function muestraPDF(pdf){
  var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
  $('#RA_modal_visorpdf .modal-body').empty();
  $('#RA_modal_visorpdf .modal-body').html(dom);
  $('#RA_modal_visorpdf').modal("show");
}// muestraPDF()


</script>

<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/highcharts.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/data.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/drilldown.js"></script> <!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/informacion.js"></script>
<script  src="<?php echo base_url(); ?>assets/js/escuela/progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/graficos_1.js"></script>

<script src="<?php echo base_url(); ?>assets/js/particulares/escuelas_particulares.js"></script>
