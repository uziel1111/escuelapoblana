<style type="text/css">

#wrapper {clear:both; overflow:hidden;padding-top:1em;}
.ocultar{display: none;}
</style>

<!-- <section> -->
<div class="container" style="margin-bottom: 25px">
	<div class="row">
		<div class="col-sm-12">
			<div id="div_particulares_opciones">
				<div class="row">
					<div class="col-sm-12">
						<center>
							<div class="h3"> <strong> Portafolio Único</strong>
							</div>
						</center>
					</div>
					<div class="col-sm-12">
						<center class="">
							<p>Inicial, Preescolar, Primaria, Secundaria, Secundaria Técnica, Capacitación para el trabajo, Técnico, Técnico Profesional, Bachillerato General, Tecnológico y no Escolarizado.</p>
						</center>
					</div>
				</div>
				<!-- row -->
				<div class="row">
								
				<?php
						$dir = "escuelapoblana_pdfs/portafolio_unico/txt/";
						$dirn = "./nota.php";
							$in = 0;
							$tp = 0;
							$pr = 0;
							$se = 0;
							$es = 0;
							$fi = 0;					
					$tema_titulo = " ";
						$m_files = glob('escuelapoblana_pdfs/portafolio_unico/txt/*.{txt}', GLOB_BRACE);		
						foreach ($m_files as $file_nivel) {
						//print_r($file_nivel);
							
							$ni_array = explode( '/', $file_nivel );
							$file_ni = substr($ni_array[3], 0, -4);
							$file_niv = substr($file_ni, -6);

							//echo $file_niv;
							
							$data_nivel[$file_nivel] = array('f_nivel' => $file_niv);							
							//print_r($data_nivel[$file_nivel]['f_nivel']);
							//$nivel_chk = substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 2, 1); 

							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 0, 1) == 0){						
								$inicial[] = $file_nivel; 
								$in++;				
							}
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 1, 1) == 0){
								$preescolar[] = $file_nivel; 
								$tp++;				
							}
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 2, 1) == 0){
								$primaria[] = $file_nivel; 
								$pr++;				
							}	
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 3, 1) == 0){
								$secundaria[] = $file_nivel; 
								$se++;				
							}
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 4, 1) == 0){
								$especial[] = $file_nivel; 
								$es++;				
							}
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 5, 1) == 0){
								$fisica[] = $file_nivel; 
								$fi++;				
							}							
						
						}					
						?>
					<div>
						 <button type="button" class="btn btn-sm btn-info btn-block" id="btn_ver_todo" onclick="" ><i class='fa fa-eye'></i> Ver todo</button>
					</div>
					<div id="box_level">
						<div class="col-sm-4">
							<div class="panel panel-custom">
							  <div class="inner">
								<img  src="<?php echo base_url(); ?>assets/img/portafolio/box1.jpg" class="card-img-top" alt="...">
							  </div>
							  <div class="panel-body">
								Educación Inicial:  <span class="text-primary"><?php echo $in; ?></span>
								  
							  </div>
							  <ul class="list-group">
								<li class="list-group-item">
								  <button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_eduIni" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
								  </li>
							  </ul>							
							</div>					
						</div>
						<div class="col-sm-4">
							<div class="panel panel-custom">
							  <div class="inner">
								<img  src="<?php echo base_url(); ?>assets/img/portafolio/box2.jpg" class="card-img-top" alt="...">
							  </div>
							  <div class="panel-body">
								Preescolar:  <span class="text-primary"><?php echo $tp;?></span>
								 
							  </div>
							  <ul class="list-group">
								<li class="list-group-item">
									<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_pree" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
								  </li>
							  </ul>							
							</div>					
						</div>
						<div class="col-sm-4">
							<div class="panel panel-custom">
							  <div class="inner">
								<img  src="<?php echo base_url(); ?>assets/img/portafolio/box3.jpg" class="card-img-top" alt="...">
							  </div>
							  <div class="panel-body">
								Primaria:  <span class="text-primary"><?php echo $pr;?></span>
								  
							  </div>
							  <ul class="list-group">
								<li class="list-group-item">
									<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_prim" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
								  </li>
							  </ul>							
							</div>					
						</div>
						<div class="col-sm-4">
							<div class="panel panel-custom">
							  <div class="inner">
								<img  src="<?php echo base_url(); ?>assets/img/portafolio/box4.jpg" class="card-img-top" alt="...">
							  </div>
							  <div class="panel-body">
								Secundaria:  <span class="text-primary"><?php echo $se;?></span>
								  
							  </div>
							  <ul class="list-group">
								<li class="list-group-item">
									<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_sec" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
								  </li>
							  </ul>							
							</div>					
						</div>
						<div class="col-sm-4">
							<div class="panel panel-custom">
							  <div class="inner">
								<img  src="<?php echo base_url(); ?>assets/img/portafolio/box5.jpg" class="card-img-top" alt="...">
							  </div>
							  <div class="panel-body">
								Educación Especial:  <span class="text-primary"><?php echo $es;?></span>
								  
							  </div>
							  <ul class="list-group">
								<li class="list-group-item">
									<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_eduEsp" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
								  </li>
							  </ul>							
							</div>					
						</div>
						<div class="col-sm-4">
							<div class="panel panel-custom">
							  <div class="inner">
								<img  src="<?php echo base_url(); ?>assets/img/portafolio/box6.jpg" class="card-img-top" alt="...">
							  </div>
							  <div class="panel-body">
								Educación Física:  <span class="text-primary"><?php echo $fi;?></span>
								  
							  </div>
							  <ul class="list-group">
								<li class="list-group-item">
									<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_eduFis" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
								  </li>
							  </ul>							
							</div>					
						</div>					
					</div>
				</div>	
					
						
				<div class="card card-style-1">
					<div class="card-header bg-primary text-center">
						<span class="second-txt" id="titulo_tabla">Catálogo de Documentos por Tema</span>
					</div>
					<div class="card-body">
						<div class="accordion accordion-style-1" id="accordionDocs">
						<?php

						//print_r($m_files);
						$data = array();
						$tf_current = " ";
						$i = 0;
						$flag = 0;
						$tema_titulo = "";
						foreach ($m_files as $filename) {

							$m_array = explode( '/', $filename );
							$file_n = substr($m_array[3], 0, -4);
							$file_t = substr($m_array[3], 0, 2);
							$file_niv = substr($file_n, -6);

							$data[$filename] = array('f_name' => $file_n, 't_tema' => $file_t);
							// print_r($data);
								
							$total = 0;								
							//print_r($m_array);						
							
							if ($data[$filename]['t_tema'] != $tf_current and $flag == 1){
								$flag = 2;
							}
													
							if ($data[$filename]['t_tema'] != $tf_current and $flag == 0) { 
							$flag = 1;
								
							$tf_current = $data[$filename]['t_tema'];
								
							switch ($tf_current) {
								case "AD":
									$tema_titulo = "Administración Escolar";
									break;
								case "CE":
									$tema_titulo = "Control Escolar";
									break;
								case "CO":
									$tema_titulo = "Cooperativas y Tiendas Escolares";
									break;
								case "ED":
									$tema_titulo = "Educación Inicial";
									break;
								case "ES":
									$tema_titulo = "Estadísticas";
									break;
								case "PC":
									$tema_titulo = "Protección Civil";
									break;
								case "PS":
									$tema_titulo = "Participción Social";
									break;
								case "RH":
									$tema_titulo = "Recursos Humanos";
									break;
								case "RM":
									$tema_titulo = "Recursos Materiales";
									break;									
							}	
								

							?>  

									<?php 
									$n_file = fopen($dir.$data[$filename]['f_name'].".txt" , "r");
				$n_name = fread($n_file,filesize($dir.$data[$filename]['f_name'].".txt"));								
				$n_array = explode ("|", $n_name);
				$nivel_tabla = trim($n_array[10]); 

									 ?>					  
									
							<div class="card">
								<div class="card-header collapsed" id="heading<?php echo $data[$filename]['t_tema']?>"  data-toggle="collapse" data-target="#collapse<?php echo $data[$filename]['t_tema']?>" aria-expanded="false" aria-controls="collapse<?php echo $data[$filename]['t_tema']?>" style="cursor: pointer;"  >
									<i class="fas fa-clipboard-list mr-2"></i> <span class="text-primary" id='titulo<?php echo $data[$filename]['t_tema']?>'><?php echo $tema_titulo ?></span>
<!--									<span class="float-right badge badge-danger h4 text-light">
										<?php // echo $i;?>
									</span> -->
								</div>

								<div id="collapse<?php echo $data[$filename]['t_tema']?>" class="collapse" aria-labelledby="heading<?php echo $data[$filename]['t_tema']?>" data-parent="#accordionDocs">
									<div class="card-body p-0">
										<div class="col">
											
		<table class='table table-striped table-hover' id="tabla_<?=$data[$filename]['t_tema']?>">
		<thead>  
		<tr>   
		<th scope='col'>#</th>      
		<th scope='col'>Nombre del documento</th>      
		<th scope='col'>Área concentradora</th> 
		<th scope='col'>Nivel</th> 				
		<th scope='col'>Opciones</th>
		<tr>
		<thead>  
		<tbody>											
										<?php

										}
										if ($data[$filename]['t_tema'] == $tf_current and $flag == 1) {
				
				$i++;							
				$n_file = fopen($dir.$data[$filename]['f_name'].".txt" , "r");
				$n_name = fread($n_file,filesize($dir.$data[$filename]['f_name'].".txt"));								
				$n_array = explode ("|", $n_name);	
				// print_r("row_{$i}_{$data[$filename]['t_tema']}");
				echo "<tr'>";		
			    echo "<td scope='row' style='font-weight: bold;'>";
			    echo $i."</td>";
				echo "<td>". $n_array[3] ."</td>";
				echo "<td>". $n_array[6] ."</td>";
				echo "<td>". $n_array[10] ."</td>";											
				echo "<td nowrap>";
			    echo "<span data-toggle='modal' data-target='#Modal_pdf' data-id='".$data[$filename]['f_name']."' class='open-Modal-pdf'><button type='button' class='btn btn-sm btn-primary'><i class='fa fa-file'></i></button></span>";
											
			    echo "<button type='button' class='btn btn-sm btn-info' onclick=verDetalle('".$data[$filename]['f_name']."') ><i class='fa fa-eye'></i></button>";
			    echo "<button type='button' class='btn btn-sm btn-success' onclick=verContacto('".$data[$filename]['f_name']."') ><i class='fa fa-address-card'></i></button>";			    
	  
				echo "</td>";
			echo "</tr>";


											
										} elseif($data[$filename]['t_tema'] != $tf_current and $flag == 2){
											$tf_current = " ";
											$flag = 0;
											$i = 0;
											echo "</tbody>";
											echo "</table>";
											echo "</div></div></div></div>";
										?>	
											
											
										<?php 	
										}else{
											echo "</tbody>";
											echo "</table>";
											echo "</div></div></div></div>";
											
										}
									} //main foreach;
										?>
										</tbody>
										</table>
										</div>
									</div>
								</div>
							</div>						
							
						</div><!--accordion-->
					</div><!--card body -->
				</div><!--card-->

			</div>
			<!-- div_particulares_opciones -->
		</div>
		<!-- col-xs-12 -->
	</div>
	<!-- row -->
</div> <!-- container -->

<!-- Modal Ver Documento PDF -->
<div id="Modal_pdf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-style-1">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open" aria-hidden="true"></i> Vista de documento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>

<!-- Modal Ver Detalle -->
<div id="Modal_detalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-style-1">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="exampleModalLabel">Detalle del documento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<div class="modal-body">
				<input name="docId" id="docId" />
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
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/3_Acuerdo_Especyfico_de_Educaciyn_Preescolar_SEP_Puebla_2016.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Acuerdo Específico de Educación Primaria SEP Puebla 2016</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/4_Acuerdo_Especyfico_de_Educaciyn_Primaria__SEP_Puebla_2016 (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Acuerdo Específico de Educación Secundaria SEP Puebla 2016</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/5_Acuerdo_Especyfico_de_Educaciyn_Secundaria_SEP_Puebla_2016.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>Circular de Actividades Extraescolares</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Circular_de_Actividades_Extraescolares (2).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>Circular de Cursos de Verano 2018</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Circular_de_Cursos_de_Verano_2018 (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">6</th>
							<td>Información Jurídico Administrativa de Educación Básica</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Informaciyn_Jurydico_Administrativa_de_Educaciyn_ByAsica.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">7</th>
							<td>Profesiograma de Educación Básica</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Básica/Profesiograma_de_Educaciyn_ByAsica.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
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
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Inicial/2_Acuerdo_Especyfico_de_Educaciyn_Inicial_SEP_Puebla_2016.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Información Jurídico Administrativa de Educación Inicial</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Inicial/Informacion_Jurydico_Administrativa_de_Educaciyn_Inicial.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Modelo de Atención con Enfoque Integral para la Educación Inicial</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Educación Inicial/Modelo_de_Atenciyn_con_Enfoque_Integral_para_la_Educaciyn_Inicial.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
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
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/1_Acuerdo_Bases_Generales_SEP_Puebla_2016 (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Información Jurídico Administrativa de Educación Inicial</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/Acuerdo_Cambio_de_domicilio_temporal_-_Periydico_Oficial.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Circular Lineamientos para la protección de los derechos humanos de los educandos</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/Circular_Lineamientos_para_la_protecciyn_de_los_derechos_humanos_de_los_educandos_en_situaciones_o_conflictos_de_violenci~1.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>Circular sobre Entrega de Certificados, Constancias y Diplomas Escolares</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Generales/Circular_sobre_Entrega_de_Certificados_Constancias_y_Diplomas_Escolares.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
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
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_243_RVOE.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Acuerdo 286 Estudios Realizados en el Extranjero</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_286_Estudios_Realizados_en_el_Extranjero (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Acuerdo 444 Marco Curricular Común</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_444_Marco_Curricular_Comyn.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>Acuerdo 445 Modalidad</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_445_Modalidad.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>Acuerdo 447 Competencias Docentes de Educación Media Superior</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_447_Competencias_Docentes_de_Educaciyn_Media_Superior (1).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">6</th>
							<td>Acuerdo 449 Competencias Director Educación Media Superior</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_449_Competencias_Director_Educaciyn_Media_Superior.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">7</th>
							<td>Acuerdo 450 Lineamientos Particulares Educación Media Superior</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_450_Lineamientos_Particulares_Educaciyn_Media_Superior (2).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">8</th>
							<td>Acuerdo Específico de Educación Media Superior SEP Puebla 2016 con Profesiograma</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_Especyfico_de_Educaciyn_Media_Superior_SEP_Puebla_2016_con_Profesiograma.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">9</th>
							<td>Acuerdo Específico de Educación Media Superior SEP Puebla 2016 sin Profesiograma</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_Especyfico_de_Educaciyn_Media_Superior_SEP_Puebla_2016_sin_Profesiograma.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">10</th>
							<td>Acuerdo para la obtención de Título Profesional Diploma de Especialidad y Grados Académicos</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Acuerdo_para_la_obtenciyn_de_Tytulo_Profesional_Diploma_de_Especialidad_y_Grados_Acadymicos.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">11</th>
							<td>Información Jurídico Administrativa de Educación Media Superior</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Informaciyn_Jurydico_Administrativa_de_Educaciyn_Media_Superior (4).pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<th scope="row">12</th>
							<td>Profesiograma de Educación Media Superior</td>
							<td>PDF</td>
							<td><a href="<?php echo base_url('escuelapoblana_pdfs/escuelasparticulares/normatividad/Normatividad Media Superior/Profesiograma_de_Educaciyn_Media_Superior.pdf');?>" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i></a>
							</td>
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

<script src="<?php echo base_url('assets/js/jquery-3.1.2.min.js'); ?>"></script>
						
						
<script type="text/javascript">
window.onload=function() {
var aObj=document.getElementById('box_level').getElementsByTagName('button');
var i=aObj.length; 
while(i--) { 
    aObj[i].count = i; 
    aObj[i].onclick=function() {return showHide(this);};
    showHide(aObj[i]); 
}
	
};

function showHide(obj) {
var aDiv=document.getElementById('wrapper').getElementsByClassName('card-style-1');

if (typeof showHide.counter == 'undefined' ) { 
    showHide.counter = 0; 
    }
aDiv[showHide.counter].style.display = 'none'; 
aDiv[obj.count].style.display = 'block'; 
showHide.counter = obj.count; 
return false; 
}
</script>

				
	
<script>
$(document).on("click", ".open-Modal-pdf", function () {
     var file_pdfId = $(this).data('id');
     $(".modal-body #pdfId").val( file_pdfId );
	
	var htmlString_pdf = '';
	
	var sPDF = "//localhost/escuelapoblana/escuelapoblana_pdfs/portafolio_unico/pdf/" + file_pdfId + ".pdf";
	htmlString_pdf += '<p><a href="' + sPDF + '" class="btn btn-success" role="button" aria-pressed="true" download><i class="fa fa-download" aria-hidden="true"></i> Descargar</a></p>';
	htmlString_pdf += '<iframe width="100%" height="400px" id="pdfId" class="embed-responsive-item" src="' + sPDF + '" allowfullscreen/></iframe>';
	
		$( '#Modal_pdf .modal-body' ).empty();
		$( '#Modal_pdf .modal-body' ).html( htmlString_pdf );
		$( '#Modal_pdf' ).modal( "show" );

});	
	
</script>
	
	
	
	
	
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push( arguments );
	}
	gtag( 'js', new Date() );

	gtag( 'config', 'UA-112793645-1' );
</script>

						
						
						

<script>
//// TEMAS ////	
function verDetalle(idDoc) {
//alert(idDoc);
		
		
$.ajax({
url: base_url+'PortafolioUnico/verDetalle',
type: 'POST',
dataType: 'json',
data: {"idDoc": idDoc},
beforeSend: function(xhr) {
            $("#wait").modal("show");
          },
})
.done(function(data) {
$("#wait").modal("hide");
//alert(data.result);
		$( '#Modal_detalle .modal-body' ).empty();
		$( '#Modal_detalle .modal-body' ).html( data.result );
		$( '#Modal_detalle' ).modal( "show" ); 	
})
.fail(function() {
console.log("error");
})
.always(function() {
});
		
		
}; 
	
//// NIVELES ////	
function verDetNivel(idDocNiv) {
//alert(idDoc);
			
$.ajax({
url: base_url+'PortafolioUnico/verDetalle',
type: 'POST',
dataType: 'json',
data: {"idDocNiv": idDocNiv},
beforeSend: function(xhr) {
            $("#wait").modal("show");
          },
})
.done(function(data) {
$("#wait").modal("hide");
//alert(data.result);
		$( '#Modal_detalle .modal-body' ).empty();
		$( '#Modal_detalle .modal-body' ).html( data.result );
		$( '#Modal_detalle' ).modal( "show" ); 	
})
.fail(function() {
console.log("error");
})
.always(function() {
});
		
		
	}; 	
	
	
	path_home = "http://escuelapoblana.org/escuelapoblana_pdfs/";
	
	$( "#EP_a_cat_ep" ).click( function () {
		window.location = 'http://escuelapoblana.org/escuelapoblana_pdfs/escuelas_particulares/1. Catálogo_de_Nombres_Enero_2018.xlsx';
	} );


	$( "#EP_btn_manualusuario" ).click( function ( e ) {
		e.preventDefault();
		pdf = path_home + "escuelas_particulares/5. Manual del usuario.pdf');?>";
		muestraPDF( pdf );
	} );

	$( "#EP_btn_preguntasfrecuentes" ).click( function ( e ) {
		e.preventDefault();
		pdf = path_home + "escuelas_particulares/4. Preguntas frecuentes ante la Ventanilla 2017.pdf');?>";
		muestraPDF( pdf );
	} );



	function muestraPDF( pdf ) {
		var dom = '<iframe src="https://docs.google.com/viewer?url=' + pdf + '&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
		$( '#RA_modal_visorpdf .modal-body' ).empty();
		$( '#RA_modal_visorpdf .modal-body' ).html( dom );
		$( '#RA_modal_visorpdf' ).modal( "show" );
	} // muestraPDF()

	function filtrarTabla(filtro, idtabla) {
		
  // Declare variables 
  var filter, table, tr, td, i, txtValue;
  filter = filtro.toUpperCase();
  table = document.getElementById(idtabla);
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  id = 0;
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue.toUpperCase().indexOf("TODOS LOS NIVELES") > -1) {
      	id++;
      	tr[i].getElementsByTagName("td")[0].innerHTML = id;
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
  return id;
}

	
	$('#btn_consulta_eduIni').click(function() {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Inicial');
		$('#headingED').removeClass('ocultar');
		$('#headingCO').addClass('ocultar');
		$('#tituloAD').text('Administración Escolar /'+ filtrarTabla('Inicial', 'tabla_AD'));
		$('#tituloED').text('Educación Inicial /'+filtrarTabla('Inicial', 'tabla_ED'));
		$('#tituloES').text('Estadísticas /'+filtrarTabla('Inicial', 'tabla_ES'));
		$('#tituloPC').text('Protección Civil /'+filtrarTabla('Inicial', 'tabla_PC'));
		$('#tituloPS').text('Participación Social /'+filtrarTabla('Inicial', 'tabla_PS'));
		$('#tituloRH').text('Recursos Humanos /'+filtrarTabla('Inicial', 'tabla_RH'));
		$('#tituloRM').text('Recursos Materiales /'+filtrarTabla('Inicial', 'tabla_RM'));

		
	});
	$('#btn_consulta_pree').click(function() {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema / Preescolar ');
		$('#headingED').addClass('ocultar');
		$('#headingCO').addClass('ocultar');

		$('#tituloAD').text('Administración Escolar /'+filtrarTabla('Preescolar', 'tabla_AD'));
		$('#tituloED').text('Educación Inicial /'+filtrarTabla('Preescolar', 'tabla_ED'));
		$('#tituloES').text('Estadísticas /'+filtrarTabla('Preescolar', 'tabla_ES'));
		$('#tituloPC').text('Protección Civil /'+filtrarTabla('Preescolar', 'tabla_PC'));
		$('#tituloPS').text('Participación Social /'+filtrarTabla('Preescolar', 'tabla_PS'));
		$('#tituloRH').text('Recursos Humanos /'+filtrarTabla('Preescolar', 'tabla_RH'));
		$('#tituloRM').text('Recursos Materiales /'+filtrarTabla('Preescolar', 'tabla_RM'));
	});
	$('#btn_consulta_prim').click(function() {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema / Primaria ');
		$('#headingED').addClass('ocultar');
		$('#headingCO').removeClass('ocultar');
		$('#tituloCO').text('Cooperativas y Tiendas Escolares/ 16');		
		$('#tituloAD').text('Administración Escolar /'+filtrarTabla('primaria', 'tabla_AD'));
		$('#tituloED').text('Educación Inicial /'+filtrarTabla('primaria', 'tabla_ED'));
		$('#tituloES').text('Estadísticas /'+filtrarTabla('primaria', 'tabla_ES'));
		$('#tituloPC').text('Protección Civil /'+filtrarTabla('primaria', 'tabla_PC'));
		$('#tituloPS').text('Participación Social /'+filtrarTabla('primaria', 'tabla_PS'));
		$('#tituloRH').text('Recursos Humanos /'+filtrarTabla('primaria', 'tabla_RH'));
		$('#tituloRM').text('Recursos Materiales /'+filtrarTabla('primaria', 'tabla_RM'));
	});
	$('#btn_consulta_sec').click(function() {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema / Secundaria ');
		$('#headingED').addClass('ocultar');
		$('#headingCO').removeClass('ocultar');
		$('#tituloCO').text('Cooperativas y Tiendas Escolares/ 16');
		$('#tituloAD').text('Administración Escolar /'+filtrarTabla('secundaria', 'tabla_AD'));
		$('#tituloED').text('Educación Inicial /'+filtrarTabla('secundaria', 'tabla_ED'));
		$('#tituloES').text('Estadísticas /'+filtrarTabla('secundaria', 'tabla_ES'));
		$('#tituloPC').text('Protección Civil /'+filtrarTabla('secundaria', 'tabla_PC'));
		$('#tituloPS').text('Participación Social /'+filtrarTabla('secundaria', 'tabla_PS'));
		$('#tituloRH').text('Recursos Humanos /'+filtrarTabla('secundaria', 'tabla_RH'));
		$('#tituloRM').text('Recursos Materiales /'+ filtrarTabla('secundaria', 'tabla_RM'));
	});
	$('#btn_consulta_eduEsp').click(function() {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Especial');
		$('#headingED').addClass('ocultar');
		$('#headingCO').addClass('ocultar');

		$('#tituloAD').text('Administración Escolar /'+filtrarTabla('Educación Especial', 'tabla_AD'));
		$('#tituloED').text('Educación Inicial /'+filtrarTabla('Educación Especial', 'tabla_ED'));
		$('#tituloES').text('Estadísticas /'+filtrarTabla('Educación Especial', 'tabla_ES'));
		$('#tituloPC').text('Protección Civil /'+filtrarTabla('Educación Especial', 'tabla_PC'));
		$('#tituloPS').text('Participación Social /'+filtrarTabla('Educación Especial', 'tabla_PS'));
		$('#tituloRH').text('Recursos Humanos /'+filtrarTabla('Educación Especial', 'tabla_RH'));
		$('#tituloRM').text('Recursos Materiales /'+filtrarTabla('Educación Especial', 'tabla_RM'));
	});
	$('#btn_consulta_eduFis').click(function() {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Física');
		$('#headingED').addClass('ocultar');
		$('#headingCO').addClass('ocultar');

		$('#tituloAD').text('Administración Escolar /'+filtrarTabla('Educación FIsica', 'tabla_AD'));
		$('#tituloED').text('Educación Inicial /'+filtrarTabla('Educación FIsica', 'tabla_ED'));
		$('#tituloES').text('Estadísticas /'+filtrarTabla('Educación FIsica', 'tabla_ES'));
		$('#tituloPC').text('Protección Civil /'+filtrarTabla('Educación FIsica', 'tabla_PC'));
		$('#tituloPS').text('Participación Social /'+filtrarTabla('Educación FIsica', 'tabla_PS'));
		$('#tituloRH').text('Recursos Humanos /'+filtrarTabla('Educación FIsica', 'tabla_RH'));
		$('#tituloRM').text('Recursos Materiales /'+filtrarTabla('Educación FIsica', 'tabla_RM'));

	});
	$('#btn_ver_todo').click(function(event) {
		
		$('#titulo_tabla').text('Catálogo de Documentos por Tema');
		$('#headingED').removeClass('ocultar');
		$('#headingCO').removeClass('ocultar');
	});
</script>

<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/highcharts.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/data.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/drilldown.js"></script> <!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/informacion.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/graficos_1.js"></script>

<script src="<?php echo base_url(); ?>assets/js/particulares/escuelas_particulares.js"></script>