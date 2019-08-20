<style type="text/css">

	#wrapper {clear:both; overflow:hidden;padding-top:1em;}
	.ocultar{display: none;}

	a.scroll-top {
	color: #fff;
	display: none;
	width: 40px;
	height: 40px;
	position: fixed;
	z-index: 1000;
	bottom: 50px;
	right: 30px;
	font-size: 25px;
	background: #5bc0de;
	border-radius: 3px !important;
	text-align: center;
	border: 1px solid hsla(0, 0%, 78%, 0.3)
}
a.scroll-top i {
	position: relative;
	top: 2px;
}
</style>

<!-- <section> -->
	<div class="container" style="margin-bottom: 25px">
		<div class="row">
			<div class="col-sm-12">
				<div id="div_particulares_opciones">
					<div class="row">
						<div class="col-sm-12">
							<center>
								<div class="h3"> <strong> Portafolio Único de Información Escolar</strong>
								</div>
							</center>
						</div>
						<div class="col-sm-12">
							<center class="">
								<p>Con el propósito de reducir de forma drástica la carga administrativa de las escuelas, se revisaron 196 requerimientos de información de las escuelas de educación básica, de los cuales se acordó eliminar 86 de ellos, por lo que a continuación se presenta el primer avance de 110 requerimientos de información (entre formatos y sistemas automatizados) aplicables al ciclo escolar 2019-2020.</p>
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
						$id = 1;
						$ce = 0;
						$tema_titulo = " ";
						$m_files = glob('escuelapoblana_pdfs/portafolio_unico/txt/*.{txt}', GLOB_BRACE);
						foreach ($m_files as $file_nivel) {
						//print_r($file_nivel);

							$ni_array = explode( '/', $file_nivel );
							$file_ni = substr($ni_array[3], 0, -4);
							$file_niv = substr($file_ni, -8);

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
								$especial[] = $file_nivel;
								$id++;
							}
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 6, 1) == 0){
								$especial[] = $file_nivel;
								$ce++;
							}
							if (substr_compare($data_nivel[$file_nivel]['f_nivel'], "1", 7, 1) == 0){
								$fisica[] = $file_nivel;
								$fi++;
							}


						}
						?>



						<div id="box_level">
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-6 col align-self-center">
									<div class="panel">

										<div col=" center-block" >
											<!-- <button type="button" class="btn  btn-success btn-block" id="btn_ver_todo" onclick="" ><i class='fa fa-eye'></i> Ver todo</button> -->
										</div>

									</div>
								</div>
								<div class="col-sm-3"></div>
							</div>
							<div class="col-sm-12">

							</div>
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
										<img  src="<?php echo base_url(); ?>assets/img/portafolio/box8.jpg" class="card-img-top" alt="...">
									</div>
									<div class="panel-body">
										Educación Indígena:  <span class="text-primary"><?php echo $id;?></span>

									</div>
									<ul class="list-group">
										<li class="list-group-item">
											<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_eduInd" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-custom">
									<div class="inner">
										<img  src="<?php echo base_url(); ?>assets/img/portafolio/box7.jpg" class="card-img-top" alt="...">
									</div>
									<div class="panel-body">
										Centros Escolares:  <span class="text-primary"><?php echo $ce;?></span>

									</div>
									<ul class="list-group">
										<li class="list-group-item">
											<button type="button" class="btn btn-sm btn-info btn-block" id="btn_consulta_cenEsc" onclick="" ><i class='fa fa-eye'></i> Consultar</button>
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


					<div class="card card-style-1"  id="dv_cont">
						<div class="card-header bg-primary text-center">
							<span class="second-txt" id="titulo_tabla">Catálogo de Documentos por Tema</span>
						</div>
						<div class="card-body">
							<div id="dv_botones" class="margin-button: 12px;">
								<center>
									<button type="button" class="btn btn-sm btn-primary">
										<i class="fa fa-file"></i>
									</button>
									Ver documento
									<button type="button" class="btn btn-sm btn-info">
										<i class="fa fa-eye"></i>
									</button>
									Ver detalle
									<button type="button" class="btn btn-sm btn-success">
										<i class="fa fa-address-card">
										</i>
									</button>
									Ver contacto
								</center>
								<br>
							</div>

							<div class="accordion accordion-style-1 text-light" id="accordionDocs">
								<?php

						//print_r($m_files);
								$data = array();
								$tf_current = " ";
								$i = 0;
								$flag = 0;
								$tema_titulo = "";

								foreach ($m_files as $filename) {
							// print_r($m_files);

									$m_array = explode( '/', $filename );
									$file_n = substr($m_array[3], 0, -4);
									$file_t = substr($m_array[3], 0, 2);
									$file_niv = substr($file_n, -6);

									$data[$filename] = array('f_name' => $file_n, 't_tema' => $file_t);
							// print_r($data[$filename]['t_tema']. ",");

									$total = 0;
							// print_r($m_array);die();

									if ($data[$filename]['t_tema'] != $tf_current and $flag == 1){
										$flag = 2;
									}

									if ($data[$filename]['t_tema'] != $tf_current and $flag == 0) {
										$flag = 1;

										$tf_current = $data[$filename]['t_tema'];
										switch ($tf_current) {
											case "AD":
											$tema_titulo = "Administración Escolar / ";
											break;
											case "CE":
											$tema_titulo = "Control Escolar / ";
											break;
											case "CO":
											$tema_titulo = "Cooperativas y Tiendas Escolares / ";
											break;
											case "ED":
											$tema_titulo = "Educación Inicial / ";
											break;
											case "ES":
											$tema_titulo = "Estadísticas / ";
											break;
											case "PC":
											$tema_titulo = "Protección Civil / ";
											break;
											case "PF":
											$tema_titulo = "Programas Federales / ";
											break;
											case "PS":
											$tema_titulo = "Participción Social / ";
											break;
											case "RH":
											$tema_titulo = "Recursos Humanos / ";
											break;
											case "RM":
											$tema_titulo = "Recursos Materiales / ";
											break;
										}


										?>


										<div class="card">
											<div class="card-header collapsed" id="heading<?php echo $data[$filename]['t_tema']?>"  data-toggle="collapse" data-target="#collapse<?php echo $data[$filename]['t_tema']?>" aria-expanded="false" aria-controls="collapse<?php echo $data[$filename]['t_tema']?>" style="cursor: pointer;"  >
												<i class="fas fa-clipboard-list mr-2"></i>
												<span class="text-primary"><?php echo $tema_titulo ?><b id='titulo<?php echo $data[$filename]['t_tema']?>'></b></span>
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
																	echo "<td>". $n_array[3]."</td>";
																	echo "<td>". $n_array[6] ."</td>";
																	echo "<td>". $n_array[10] ."</td>";
																	echo "<td nowrap>";
																	echo "<span data-toggle='modal' data-target='#Modal_pdf' data-id='".$data[$filename]['f_name']."' class='open-Modal-pdf'><button type='button' class='btn btn-sm btn-primary' title='Ver documento'><i class='fa fa-file'></i></button></span>";

																	echo "<button type='button' class='btn btn-sm btn-info' onclick=verDetalle('".$data[$filename]['f_name']."') ><i class='fa fa-eye' title='Ver detalle'></i></button>";
																	echo "<button type='button' class='btn btn-sm btn-success' onclick=verContacto('".$data[$filename]['f_name']."') ><i class='fa fa-address-card' title='Ver contacto'></i></button>";

																	echo "</td>";
																	echo "</tr>";



																} elseif($data[$filename]['t_tema'] != $tf_current and $flag == 2){
																	$tf_current = " ";
																	$flag = 0;
																	$i = 0;
																	$tema_titulo = " ";
																	echo "</tbody>";
																	echo "</table>";
																	echo "</div></div></div></div>";
																	?>


																	<?php
																}else{
																	// print_r('hola');
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
<a href="#" class="scroll-top" title="Ir arriba">
    <i class="fa fa-angle-up"></i>
</a>
<br>
<div class="col-sm-12">
	<center class="">
		<p>Nota: Algunos requerimientos son aplicables sólo a escuelas beneficiadas por algún programa educativo, o que son de alguna modalidad o sostenimiento específico, según se señala en lo descrito en el detalle de cada requerimiento.</p>
		<p>¿Alguna duda con referencia al Portafolio Único? Manda un mensaje a <a href="mailto:portafoliounico@seppue.gob.mx">portafoliounico@seppue.gob.mx </a> o en el dato de contacto para cada requerimiento.</p>
	</center>
</div>
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
		$('#dv_cont').addClass('ocultar');
		$('#titulo_tabla').addClass('ocultar');
		$('#dv_botones').addClass('ocultar');
		$('#headingAD').addClass('ocultar');
		$('#headingCO').addClass('ocultar');
		$('#headingED').addClass('ocultar');
		$('#headingES').addClass('ocultar');
		$('#headingPC').addClass('ocultar');
		$('#headingPS').addClass('ocultar');
		$('#headingRH').addClass('ocultar');
		$('#headingRM').addClass('ocultar');
		$('#headingCE').addClass('ocultar');
		$('#headingPF').addClass('ocultar');

		$(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
        $('a.scroll-top').fadeIn('slow');
    } else {
        $('a.scroll-top').fadeOut('slow');
    }
});
$('a.scroll-top').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, 600);
});

		// $('#tituloAD').text(filtrarTabla('', 'tabla_AD'));
		// $('#tituloCO').text(filtrarTabla('', 'tabla_CO'));
		// $('#tituloED').text(filtrarTabla('', 'tabla_ED'));
		// $('#tituloES').text(filtrarTabla('', 'tabla_ES'));
		// $('#tituloPC').text(filtrarTabla('', 'tabla_PC'));
		// $('#tituloPS').text(filtrarTabla('', 'tabla_PS'));
		// $('#tituloRH').text(filtrarTabla('', 'tabla_RH'));
		// $('#tituloRM').text(filtrarTabla('', 'tabla_RM'));
		// $('#tituloCE').text(filtrarTabla('', 'tabla_CE'));
		// $('#tituloPF').text(filtrarTabla('', 'tabla_PF'));


		// var aObj=document.getElementById('box_level').getElementsByTagName('button');
		// var i=aObj.length;
		// while(i--) {
		// 	aObj[i].count = i;
		// 	aObj[i].onclick=function() {return showHide(this);};
		// 	showHide(aObj[i]);
		// }

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

		// var sPDF = "http://qual-edu.org/pruebas_qualedu/escuelapoblana/escuelapoblana_pdfs/portafolio_unico/pdf/" + file_pdfId + ".pdf";
		var sPDF = "http://escuelapoblana.org/escuelapoblana_pdfs/portafolio_unico/pdf/" + file_pdfId + ".pdf";

		// var sPDF = "http://localhost/escuelapoblana_pdfs/portafolio_unico/pdf/ADE01-11111110.pdf";
		// console.info(sPDF);

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
	data: {"idDoc": idDoc, 'identificador':1},
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

function verContacto(idDoc) {
//alert(idDoc);

$.ajax({
	url: base_url+'PortafolioUnico/verDetalle',
	type: 'POST',
	dataType: 'json',
	data: {"idDoc": idDoc, 'identificador':2},
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
  id = 0;
   /**
   * A partir de aquí no estoy segura de qué estoy programando jejeje
   */

   cadena = filter.split(',');
   console.log(cadena.length);
   for (var i = 0; i < cadena.length; i++) {

   	console.log(cadena[i].trim());

   	for (i = 0; i < tr.length; i++) {
   		td = tr[i].getElementsByTagName("td")[3];
   		if (td) {
   			txtValue = td.textContent || td.innerText;
   			if (txtValue.toUpperCase().indexOf(cadena) > -1 || txtValue.toUpperCase().indexOf("TODOS LOS NIVELES") > -1) {
   				id++;
   				tr[i].getElementsByTagName("td")[0].innerHTML = id;
   				tr[i].style.display = "";
   			} else {
   				tr[i].style.display = "none";
   			}
   		} else {
   			if (txtValue == '') {
   				id++;
   			}
   		}
   	}

   }
  	// console.log(cadena);

  /**
   * Hasta aquí no estoy segura de qué estoy programando jejeje
   */

  // Loop through all table rows, and hide those who don't match the search query
  // id = 0;
  // for (i = 0; i < tr.length; i++) {
  //   td = tr[i].getElementsByTagName("td")[3];
  //   if (td) {
  //     txtValue = td.textContent || td.innerText;
  //     if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue.toUpperCase().indexOf("TODOS LOS NIVELES") > -1) {
  //     	id++;
  //     	tr[i].getElementsByTagName("td")[0].innerHTML = id;
  //       tr[i].style.display = "";
  //     } else {
  //       tr[i].style.display = "none";
  //     }
  //   } else {
  //   	if (txtValue == '') {
  //   		id++;
  //   	}
  //   }
  // }
  return id;

}


$('#btn_consulta_eduIni').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
	$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Inicial');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').addClass('ocultar');
	$('#headingED').removeClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').addClass('ocultar');

	$('#tituloAD').text(filtrarTabla('Inicial', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Inicial', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('Inicial', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Inicial', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Inicial', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Inicial', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Inicial', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Inicial', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('Inicial', 'tabla_PF'));
	$('#tituloCO').text(filtrarTabla('Inicial', 'tabla_CO'));



});
$('#btn_consulta_pree').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Preescolar ');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').addClass('ocultar');
	$('#headingED').addClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloAD').text(filtrarTabla('Preescolar', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Preescolar', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('Preescolar', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Preescolar', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Preescolar', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Preescolar', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Preescolar', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Preescolar', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('preescolar', 'tabla_PF'));
	$('#tituloCO').text(filtrarTabla('preescolar', 'tabla_CO'));
});
$('#btn_consulta_prim').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Primaria ');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').removeClass('ocultar');
	$('#headingED').addClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloCO').text(filtrarTabla('primaria', 'tabla_CO'));
	$('#tituloAD').text(filtrarTabla('primaria', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('primaria', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('primaria', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('primaria', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('primaria', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('primaria', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('primaria', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('primaria', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('primaria', 'tabla_PF'));
});
$('#btn_consulta_sec').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Secundaria ');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').removeClass('ocultar');
	$('#headingED').addClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloCO').text(filtrarTabla('Secundarias Técnicas', 'tabla_CO'));
	$('#tituloAD').text(filtrarTabla('Secundarias Técnicas', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Secundarias Técnicas', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('Secundarias Técnicas', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Secundarias Técnicas', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Secundarias Técnicas', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Secundarias Generales', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Secundarias Técnicas', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Secundarias Técnicas', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('Secundarias Técnicas', 'tabla_PF'));

});
$('#btn_consulta_eduEsp').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Especial');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').addClass('ocultar');
	$('#headingED').addClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloAD').text(filtrarTabla('Educación Especial', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Educación Especial', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('Educación Especial', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Educación Especial', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Educación Especial', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Educación Especial', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Educación Especial', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Educación Especial', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('Educación Especial', 'tabla_PF'));
	$('#tituloCO').text(filtrarTabla('Educación Especial', 'tabla_CO'));
});
$('#btn_consulta_eduFis').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Física');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').addClass('ocultar');
	$('#headingED').addClass('ocultar');
	$('#headingES').addClass('ocultar');
	$('#headingPC').addClass('ocultar');
	$('#headingPS').addClass('ocultar');
	$('#headingRH').addClass('ocultar');
	$('#headingRM').addClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').addClass('ocultar');


	$('#tituloAD').text(filtrarTabla('Educación Física', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Educación Física', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('Educación Física', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Educación Física', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Educación Física', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Educación Física', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Educación Física', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Educación Física', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('Educación Física', 'tabla_PF'));
	$('#tituloCO').text(filtrarTabla('Educación Física', 'tabla_CO'));

});
$('#btn_consulta_eduInd').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Educación Indígena');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').removeClass('ocultar');
	$('#headingED').removeClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloAD').text(filtrarTabla('Educación Indígena', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Educación Indígena', 'tabla_ED'));
	$('#tituloCO').text(filtrarTabla('Educación Indígena', 'tabla_CO'));
	$('#tituloES').text(filtrarTabla('Educación Indígena', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Educación Indígena', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Educación Indígena', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Educación Indígena', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Educación Indígena', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Educación Indígena', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('Educación Indígena', 'tabla_PF'));
	$('#tituloCO').text(filtrarTabla('Educación Indígena', 'tabla_CO'));
});
$('#btn_consulta_cenEsc').click(function() {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema / Centros Escolares');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').removeClass('ocultar');
	$('#headingED').removeClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloAD').text(filtrarTabla('Centros Escolares', 'tabla_AD'));
	$('#tituloED').text(filtrarTabla('Centros Escolares', 'tabla_ED'));
	$('#tituloCO').text(filtrarTabla('Centros Escolares', 'tabla_CO'));
	$('#tituloES').text(filtrarTabla('Centros Escolares', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('Centros Escolares', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('Centros Escolares', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('Centros Escolares', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('Centros Escolares', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('Centros Escolares', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('Centros Escolares', 'tabla_PF'));
	$('#tituloCO').text(filtrarTabla('Centros Escolares', 'tabla_CO'));

});
$('#btn_ver_todo').click(function(event) {
	$('html,body').animate({scrollTop: 1000},"slow");
	$('#dv_cont').removeClass('ocultar');
$('#titulo_tabla').removeClass('ocultar');
	$('#titulo_tabla').text('Catálogo de Documentos por Tema');
	$('#dv_botones').removeClass('ocultar');
	$('#headingAD').removeClass('ocultar');
	$('#headingCO').removeClass('ocultar');
	$('#headingED').removeClass('ocultar');
	$('#headingES').removeClass('ocultar');
	$('#headingPC').removeClass('ocultar');
	$('#headingPS').removeClass('ocultar');
	$('#headingRH').removeClass('ocultar');
	$('#headingRM').removeClass('ocultar');
	$('#headingCE').removeClass('ocultar');
	$('#headingPF').removeClass('ocultar');

	$('#tituloAD').text(filtrarTabla('', 'tabla_AD'));
	$('#tituloCO').text(filtrarTabla('', 'tabla_CO'));
	$('#tituloED').text(filtrarTabla('', 'tabla_ED'));
	$('#tituloES').text(filtrarTabla('', 'tabla_ES'));
	$('#tituloPC').text(filtrarTabla('', 'tabla_PC'));
	$('#tituloPS').text(filtrarTabla('', 'tabla_PS'));
	$('#tituloRH').text(filtrarTabla('', 'tabla_RH'));
	$('#tituloRM').text(filtrarTabla('', 'tabla_RM'));
	$('#tituloCE').text(filtrarTabla('', 'tabla_CE'));
	$('#tituloPF').text(filtrarTabla('', 'tabla_PF'));
});
$(document).ready(

	// function cargar_todo() {
	// 	$('#titulo_tabla').text('Catálogo de Documentos por Tema');
	// 	$('#headingAD').removeClass('ocultar');
	// 	$('#headingCO').removeClass('ocultar');
	// 	$('#headingED').removeClass('ocultar');
	// 	$('#headingES').removeClass('ocultar');
	// 	$('#headingPC').removeClass('ocultar');
	// 	$('#headingPS').removeClass('ocultar');
	// 	$('#headingRH').removeClass('ocultar');
	// 	$('#headingRM').removeClass('ocultar');
	// 	$('#headingCE').removeClass('ocultar');
	// 	$('#headingPF').removeClass('ocultar');
	//
	// 	$('#tituloAD').text(filtrarTabla('', 'tabla_AD'));
	// 	$('#tituloCO').text(filtrarTabla('', 'tabla_CO'));
	// 	$('#tituloED').text(filtrarTabla('', 'tabla_ED'));
	// 	$('#tituloES').text(filtrarTabla('', 'tabla_ES'));
	// 	$('#tituloPC').text(filtrarTabla('', 'tabla_PC'));
	// 	$('#tituloPS').text(filtrarTabla('', 'tabla_PS'));
	// 	$('#tituloRH').text(filtrarTabla('', 'tabla_RH'));
	// 	$('#tituloRM').text(filtrarTabla('', 'tabla_RM'));
	// 	$('#tituloCE').text(filtrarTabla('', 'tabla_CE'));
	// 	$('#tituloPF').text(filtrarTabla('', 'tabla_PF'));
	// }

	);
</script>

<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/highcharts.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/data.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/drilldown.js"></script> <!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/informacion.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/graficos_1.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/js/particulares/escuelas_particulares.js"></script> -->
