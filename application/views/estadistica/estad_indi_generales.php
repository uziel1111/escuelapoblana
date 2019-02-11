<style type="text/css">
  .td_blue{
    background : #428bca;
    width: "100%";
    /*font-weight: bold;*/
    color: #FFFFFF;
    padding: 10px;
    cursor: pointer;
    font-size: 16px;
}
.td_red{
    background : #d9534f;
    width: "100%";
    /*font-weight: bold;*/
    color: #FFFFFF;
    padding: 20px;
    cursor: pointer;
    font-size: 16px;
}
.dv_flotante{
  font-size: 1.5vh;

}
.margintop{
  margin-top: 100px;
}
.well_{
  text-align: center;
}

.table {
  text-align: center;
  border-collapse: separate;
  border-spacing: 0;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 0;
  border: 2px solid #0191b3;
    margin-bottom: 0px;
}
.informa {
    text-align: center;
    background-color: #0191b3;
    color: #fff;
    font-weight: bold;
}

.pie_tabla {
  text-align: center;
  font-size: 12px;
  color: white;
    width: 310px;
    height: 40px;
    float: right;
    right: 0%;
    position: relative;
    border-top-left-radius: 3px;
    border-top-right-radius: 0;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    background-color: #0191b3;
}
.pointer_viw{
  cursor: pointer;
}

.dv_flotante{
  cursor: pointer;
}

.cd-top:hover {
  opacity: 1 !important;
}
.ft-responsive-sm{
  font-size: 1.5vh;
}







</style>

<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-fluid">
      <div id="iddv_flotante_new" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dv_flotante_new grises" style="z-index: 100; width:100%; height:auto; background-color:#ffffff; border: 2px solid #ccc;">
        <div class="row"><!-- div de encabezado -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <center class="txtBold">
              <div class="h5">  <strong><label id="LE_title_est_ind"></label> </strong></div>

            </center>
          </div>
        </div><!-- div de encabezado -->
        <div class="row container-fluid ft-responsive-sm">
          <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" >
            <span style="background-color: yellow;" id="id_glyph" class="glyphicon glyphicon-filter"></span>
            <label style="background-color: yellow;" id="LE_resultados_busqueda"></label>
          </div>
          <div  id="busqueda">
              <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel')); ?>
              <input type="hidden" name="in_est_muni" id="in_est_muni" value="">
              <input type="hidden" name="in_est_muniN" id="in_est_muniN" value="">
              <input type="hidden" name="in_nivel" id="in_nivel" value="">
              <input type="hidden" name="in_sost" id="in_sost" value="">
              <input type="hidden" name="in_modalidad" id="in_modalidad" value="">
              <input type="hidden" name="in_ciclo" id="in_ciclo" value="">
              <input type="hidden" name="action" id="" value="estadistica_e_indicadores_grid">
              <button type='submit' id='btn_gen_excel'  class='col-xs-6 col-sm-6 col-md-1 col-lg-1 btn btn-info btn-xs'>Generar excel <span class="glyphicon glyphicon-save-file" aria-hidden="true"> </span></button>
              <button id="le_btn_rebuscar" type="button" class="col-xs-6 col-sm-6 col-md-1 col-lg-1 btn btn-info btn-xs">Buscar otra vez</button>
            </form>
          </div>

        </div>
        <center>
        <div id="inst">
          <p style="font-size:1.5vh" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 insclic" rowspan="3">
            Haz clic sobre el signo "<span class="chevron_toggleable glyphicon glyphicon-chevron-down"></span>" para desplegar la información del nivel educativo por modalidad y sostenimiento.
          </p>
        </div>
      </center>
      </div>


  <br>
  <div class="container-fluid margintop grises">
    <div class="row table-condensed table-responsive table-hover tabla_border_blue">
      <div class="col-sm-12">
        <div>


          <div style="overflow-x:auto;">
          <table class="table" id="tabla_estadistica_final">
          	<thead>
          		<tr class="informa">
          			<th class="informa" rowspan="3">Nivel Educativo</th>
          			<th class="informa" colspan="21">Alumnos</th>
          		</tr>
          		<tr class="informa">
          			<th class="informa"  colspan="3">Total</th>
          			<th class="informa"  rowspan="2">1°</th>
          			<th class="informa" rowspan="2">2°</th>
          			<th class="informa" rowspan="2">3°</th>
          			<th class="informa" rowspan="2">4°</th>
          			<th class="informa" rowspan="2">5°</th>
          			<th class="informa" rowspan="2">6°</th>
          		</tr>
          		<tr class="informa">
          			<th class="informa">H</th>
          			<th class="informa">M</th>
          			<th class="informa">T</th>
          		</tr>
          	</thead>
          	<tbody  id="contenedor_tablas">
              <a  href='#top'><img id="btn_topscll" class="cd-top" border='0' style="visibility: hidden; opacity: 0.5; height: 60px; width: 60px; position: fixed; bottom: 80px; right: 4%; z-index:1000;"  src="<?php echo base_url('assets/img/arrow-up-on-a-black-circle-background.svg'); ?>" title="Ir arriba" /></a>
          </tbody>
          			</table>

          			<div class="pie_tabla">
          			        <div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
          			</div>
        </div>
        </div>
        <br>
        <div>

              <div style="overflow-x:auto;">
          <table class="table" id="tabla_estadistica_final2">
          	<thead>
          		<tr>
          	    	<th class="informa" rowspan="2">Nivel educativo</th>
          	    	<th class="informa" colspan="3">Docentes</th>
          	    	<th class="informa" colspan="3">Directivo con grupo</th>
          	    	<th class="informa" colspan="3">Directivo sin grupo</th>
          	    </tr>
          	    <tr class="informa">
          	    	<th class="informa">Hombres</th>
          	    	<th class="informa">Mujeres</th>
          	    	<th class="informa">Total</th>
          	    	<th class="informa">Hombres</th>
          	    	<th class="informa">Mujeres</th>
          	    	<th class="informa">Total</th>
          	    	<th class="informa">Hombres</th>
          	    	<th class="informa">Mujeres</th>
          	    	<th class="informa">Total</th>
          	    </tr>
          	</thead>
          	<tbody  id="contenedor_tablas2">
          </tbody>
          			</table>

          			<div class="pie_tabla">
          			        <div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
          			</div>
        </div>
        </div>
        <div>
          <div class="well_">
                <a name="Infraestructura" style="text-decoration:none; color:black;">
                  <h3 id="well_">Infraestructura</h3>
                </a>
              </div>
          		<div style="overflow-x:auto;">
          <table class="table" id="infraestructura_t1">
          	<thead>


          		  	<tr class="informa">
          	    	<th class="informa" rowspan="2">Nivel Educativo</th>
          	    	<th class="informa" rowspan="2">Escuelas</th>
          	    	<th class="informa" rowspan="2">Aulas en uso</th>
          	    	<th class="informa" colspan="8">Grupos</th>
          	    </tr>

          		<tr class="informa">
          		  	<th class="informa">1°</th>
          		  	<th class="informa">2°</th>
          		  	<th class="informa">3°</th>
          		  	<th class="informa">4°</th>
          		  	<th class="informa">5°</th>
          		  	<th class="informa">6°</th>
          		  	<th class="informa">Multigrado</th>
          		  	<th class="informa">Total</th>
          		</tr>
          	</thead>
          	<tbody  id="contenedor_tablas3">
            </tbody>
          			</table>

          			<div class="pie_tabla">
          			        <div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
          			</div>

        </div>
        </div>
        <div id="tb_ind_asis">
          <div class="well_">
                <a name="Indicadores de Permanencia'.$ciclonomb.' de Cursos" style="text-decoration:none; color:black;">
                  <h3 id="well_">Indicadores de Asistencia <p id="ind_asist_lb"></p> </h3>
                </a>
              </div>
          		<div style="overflow-x:auto;">
          		<table class="table table-bordered">
          			<thead>
          			 	<tr class="informa">
          				    <th class="informa" rowspan="2">Nivel Educativo</th>
          				    <th class="informa pointer_viw" colspan="2" title="Información de Cobertura" id="cobertura_clk_modal">Cobertura</th>
          				    <th class="informa pointer_viw" colspan="2" title="Información de Absorción" id="absorcion_clk_modal">Absorción</th>
          				</tr>
          				<tr class="informa">
          				    <th class="informa">Tasa</th>
          				    <th class="informa pointer_viw" id="posicion_clk_modal">Posición</th>
          				    <th class="informa">Tasa</th>
          				    <th class="informa pointer_viw" id="posicion_clk_modal2">Posición</th>
          				 </tr>
          			</thead>
          			<tbody id="contenedor_tablas4">

                </tbody>


                </div>
          			</table>

          			<div class="pie_tabla">
          			        <div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
          			</div>
        </div>

        <div id="tb_ind_perma">
          <div class="well_">
                <a name="Indicadores de Permanencia'.$ciclonomb.' de Cursos" style="text-decoration:none; color:black;">
                  <h3 id="well_">Indicadores de Permanencia <p id="ind_perma_lb"></p></h3>
                </a>
              </div>
              <div style="overflow-x:auto;">
          		<table class="table table-bordered">
          	<thead>
          		<tr class="informa">
          			<th class="informa" rowspan="2">Nivel Educativo</th>
          			<th class="informa pointer_viw" colspan="1" title="Información Retención" id="retencion_id">Retención</th>
          			<th class="informa pointer_viw" colspan="1" title="Información Aprobación" id="aprobacion_id">Aprobación</th>
          			<th class="informa pointer_viw" colspan="1" title="Información Eficiencia Terminal" id="et_id">Eficiencia Terminal</th>
          		</tr>

          	</thead>
          	<tbody id="contenedor_tablas5">

          	</tbody>
          	</table>

          			<div class="pie_tabla">
          			        <div id="fuentes_pie">Fuente: SEP Puebla con base en el Formato 911.</div>
          			</div>';
        </div>
        </div>
        <div id="contenedor_tablas6"></div>
        <div id="contenedor_tablas7"></div>
        <div id="contenedor_tablas8"></div>

      </div>
      <div class="col-sm-1">
        <div id="">Notas:</div>
      </div>
      <br>
      <div class="col-sm-11">
        <label><b>La estadística solo incluye las escuelas que presentaron su información al inicio del ciclo escolar&nbsp;</b></label><label id="LE_cicloestadis"></label>
      </div>

    </div>
  </div>


  </div><!-- CONTAINER -->

  <div id="modal_din_retencion" class="modal fade modal100 grises" role="dialog" >
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header modal_head">
      <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
        X
      </button>
    <h4 class="modal-title titulo_none" id="title_din">
      Retención:
    </h4>
    </div>
    <div class="modal-body">
            <p>Porcentaje de alumnos que permanecen en la escuela entre ciclos escolares consecutivos antes de concluir el nivel educativo de referencia, por cada cien alumnos matriculados al inicio del ciclo escolar.
  <br>(INEE)</p>
    </div><!-- modal body -->
  </div>
  </div>
  </div>

  <div id="modal_din_aprobacion" class="modal fade modal100 grises" role="dialog" >
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header modal_head">
      <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
        X
      </button>
    <h4 class="modal-title titulo_none" id="title_din">
      Aprobación:
    </h4>
    </div>
    <div class="modal-body">
            <p>Porcentaje de alumnos aprobados de un determinado grado, por cada cien alumnos que están matriculados al final del ciclo escolar.
  <br>(INEE)</p>
    </div><!-- modal body -->
  </div>
  </div>
  </div>

  <div id="modal_din_et" class="modal fade modal100 grises" role="dialog" >
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header modal_head">
      <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
        X
      </button>
    <h4 class="modal-title titulo_none" id="title_din">
      Eficiencia Terminal:
    </h4>
    </div>
    <div class="modal-body">
            <p>Porcentaje de alumnos que egresan de cierto nivel o tipo educativo en un determinado ciclo escolar por cada cien alumnos de nuevo ingreso, inscritos tantos ciclos escolares atrás como dure el nivel o tipo educativo en cuestión.
  <br>(INEE)</p>
    </div><!-- modal body -->
  </div>
  </div>
  </div>

<div id="modal_din_cobertura" class="modal fade modal100 grises" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header modal_head">
    <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
      X
    </button>
  <h4 class="modal-title titulo_none" id="title_din">
    Cobertura:
  </h4>
  </div>
  <div class="modal-body">
          <p>Porcentaje de alumnos en edades idóneas o típica para cursar educación básica, media superior y superior, inscritos en el nivel o tipo educativo correspondiente al inicio del ciclo escolar, por cada cien personas de la población en esas edades.
<br>(INEE)</p>
  </div><!-- modal body -->
</div>
</div>
</div>

<div id="modal_din_absorcion" class="modal fade modal100 grises" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header modal_head">
    <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
      X
    </button>
  <h4 class="modal-title titulo_none" id="title_din">
    Absorción:
  </h4>
  </div>
  <div class="modal-body">
          <p>Porcentaje de alumnos de nuevo ingreso al primer grado de secundaria, media superior o superior en un determinado ciclo escolar por cada cien egresados del nivel educativo precedente del ciclo escolar previo.
<br>(INEE)</p>
  </div><!-- modal body -->
</div>
</div>
</div>

<div id="modal_din_posicion" class="modal fade modal100 grises" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header modal_head">
    <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
      X
    </button>
  <h4 class="modal-title titulo_none" id="title_din">
    Posición:
  </h4>
  </div>
  <div class="modal-body">
          <p>La posición aplica para los municipios, y se refiere al lugar que ocupa el municipio seleccionado entre los 217 municipios del estado con base en el desempeño del indicador.
<br>(INEE)</p>
  </div><!-- modal body -->
</div>
</div>
</div>



  <div id="le_modal" class="modal fade grises" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header modal_head">

                <span class="modal-title ft-responsive-modal">Seleccione el tipo de búsqueda e ingrese los campos</span>
                <button type="button"  id="close_destin" class=" close bold_white"  aria-label="Close">
                  X
                </button>

              </div>
              <div class="modal-body body_DarkGray">
                <fieldset id="LA_tipo_busqueda" name="LA_tipo_busqueda" class="row margenFila allToUpperCaseBold ft-responsive-modal">
                        <ul class="buttons">
                              <li>
                                  <input id="radiobtn_1" class="radiobtn" name="LA_tipo_busqueda" type="radio" value="LE_busqueda_tipo_1" tabindex="1">
                                  <span></span>
                                  <label for="radiobtn_1"> Por estado / municipio:</label>
                              </li>
                              <li>
                                  <input id="radiobtn_3" class="radiobtn" name="LA_tipo_busqueda" type="radio" value="LE_busqueda_tipo_2" tabindex="3">
                                  <span></span>
                                  <label for="radiobtn_3"> Por zona escolar:</label>
                              </li>
                         </ul>
                    </fieldset>



                <div class="panel  margin2_greyblue ft-responsive-modal-sm" id="LE_busqueda_tipo_1"> <!-- Panel 1-->
                  <div class="panel-body">
                        <div class="row margenFila">
                            <form class="form-horizontal ">
                                <div class="form-group">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_formunicipio">Estado / municipios:</span>
                                    <div class="col-sm-10">
                                      <select id="le_select_idmunicipio_ei" class="form-control input-sm ft-responsive-modal-sm"></select>
                                    </div>
                                </div>
                                <div class="form-group" id="div_nivel">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_nivel">Nivel: </span>
                                    <div class="col-sm-10">
                                      <select id="le_select_nivel_ei" class="form-control input-sm ft-responsive-modal-sm"></select>
                                    </div>
                                </div>
                                <div class="form-group" id="div_sostenimiento">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento" id="sostmuni">Sostenimiento: </span>
                                    <div class="col-sm-10">
                                      <select id="le_select_sostenimiento_ei" class="form-control input-sm ft-responsive-modal-sm"></select>
                                    </div>
                                </div>

                                <div class="form-group" id="div_modalidad">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_modalidad" id="modamuni">Modalidad: </span>
                                    <div class="col-sm-10">
                                      <select id="le_select_modalidad_ei" class="form-control input-sm ft-responsive-modal-sm"></select>
                                    </div>
                                </div>

                                <div class="form-group" id="div_ciclo">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento">Ciclo Escolar: </span>
                                    <div class="col-sm-10">
                                      <select id="ciclo" class="form-control input-sm ft-responsive-modal-sm"></select>
                                    </div>
                                </div>

                                <br>
                                </form>
                          </div><!-- row -->
                  </div>
              </div><!-- End Panel 1-->




                    <div class="panel  margin2_greyblue ft-responsive-modal-sm"  id="LE_busqueda_tipo_2"> <!-- Panel 2-->
                      <div class="panel-body">
                        <div class="row margenFila">
                            <form class="form-horizontal ">
                        <div class="form-group" id="div_nivel_ze">
                            <span class="control-label col-sm-2 textBold13" for="le_select_nivel_ze">Nivel: </span>
                            <div class="col-sm-10">
                              <select id="le_select_nivel_ze" class="form-control input-sm ft-responsive-modal-sm"></select>
                            </div>
                        </div>
                        <div class="form-group" id="div_sostenimiento_ze">
                            <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento_ze" id="sostmuni_ze">Sostenimiento: </span>
                            <div class="col-sm-10">
                              <select id="le_select_sostenimiento_ze" class="form-control input-sm ft-responsive-modal-sm"></select>
                            </div>
                        </div>

                        <div class="form-group" id="div_num_zona_ze">
                            <span class="control-label col-sm-2 textBold13" for="le_select_num_zona_ze" id="num_zona_ze">Número de zona escolar: </span>
                            <div class="col-sm-10">
                              <select id="le_select_num_zona_ze" class="form-control input-sm ft-responsive-modal-sm"></select>
                            </div>
                        </div>

                        <div class="form-group" id="div_clv_zona_ze">
                            <span class="control-label col-sm-2 textBold13" for="le_select_clv_zona_ze" id="clv_zona_ze">Clave de zona escolar: </span>
                            <div class="col-sm-10">
                              <select id="le_select_clv_zona_ze" class="form-control input-sm ft-responsive-modal-sm"></select>
                            </div>
                        </div>

                        <div class="form-group" id="lb_ciclo_ze">
                                <span class="control-label col-sm-2 textBold13" for="ciclo_ze" >Ciclo Escolar: </span>
                                <div class="col-sm-10">
                                  <select id="ciclo_ze" class="form-control input-sm ft-responsive-modal-sm"></select>
                                </div>
                            </div>
                            <br>
                            </form>
                      </div><!-- row -->


                      </div>
                    </div>  <!-- End Panel 2-->


              </div><!-- modal body -->

            </div>
          </div>
        </div><!-- End modal -->

<!-- Global site tag (gtag.js) - Google Analytics -->

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112793645-1');
</script>

<script src="<?php echo base_url('assets/js/est_e_ind/est_e_ind_g.js'); ?>"></script>
