<style>

.id_glyph{
  font-size:20px;
  padding-top:8px;
  padding-left:15px;
  color:#337ab7;
}



.divCitas{
  background : #F3f3f3;
  width: "100%";
  height: 50px;
  text-align: center;
  font-size: 28px;
  margin: 5px;

  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;

  -webkit-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  -moz-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);

}
.divCitas a {
  text-decoration: none;
  cursor: pointer;
  font-weight: bold;
}

.divCitas:hover{
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.divbuscador{
  background : #004E7D;
  width: "100%";
  height: 100px;
  text-align: center;
  font-size: 28px;
  margin: 5px;


  /* centrado X  Y */
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;
  /*
  -webkit-box-shadow: -1px 0px 11px 2px rgba(165,209,207,1);
  -moz-box-shadow: -1px 0px 11px 2px rgba(165,209,207,1);
  box-shadow: -1px 0px 11px 2px rgba(165,209,207,1);
  */
}
.divbuscador a {
  text-decoration: none;
  cursor: pointer;
  color: #FFFFFF;
  font-weight: bold;
}
.divbuscador:hover{
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.cat_ep{
  background : #FCD12C;
  width: "100%";
  height: 100px;
  text-align: center;
  font-size: 20px;
  /*margin: 5px;*/
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;
  /*
  -webkit-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  -moz-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  */
}
.cat_ep a {
  text-decoration: none;
  cursor: pointer;
  font-weight: bold;
  color: #FFF;
}
.cat_ep:hover{
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.norm_tra{
  background : #EB7923;
  width: "100%";
  height: 100px;
  text-align: center;
  font-size: 20px;
  /*margin: 5px;*/
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;
  -webkit-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  -moz-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
}
.norm_tra a {
  text-decoration: none;
  cursor: pointer;
  font-weight: bold;
  color: #FFF;
}
.norm_tra:hover{
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.altas_ba{
  background : #0092B3;
  width: "100%";
  height: 100px;
  text-align: center;
  font-size: 20px;
  /*margin: 5px;*/
  display: flex;
  justify-content: center;
  align-content: center;
  flex-direction: column;

  -webkit-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  -moz-box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);
  box-shadow: -2px 6px 5px 2px rgba(219,210,219,0.83);

}
.altas_ba a {
  text-decoration: none;
  cursor: pointer;
  font-weight: bold;
  color: #FFF;
}
.altas_ba:hover{
  -webkit-transform: scale(1.05);
  transform: scale(1.05);
}

.margen_columna{
  margin-bottom: 5px;
}

.margin_top_pFixed{
  margin-top: 150px;
}

.table {
  text-align: center;
  border-collapse: separate;
  border-spacing: 0;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 0;
  border: 2px solid #225D99;
    margin-bottom: 0px;
}
.informa {
    text-align: center;
    background-color: #225D99;
    color: #fff;
    font-weight: bold;
}
.clr_tr_tableb{
  cursor: pointer;
  background-color: white;
}
.clr_tr_tableg{
  cursor: pointer;
  background-color: #DCDCDC;
}

.clr_tr_tableg:hover{
  cursor: pointer;
  background-color: #5bc0de;
}
.clr_tr_tableb:hover{
  cursor: pointer;
  background-color: #5bc0de;
}
.tooltip1 {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip1 .tooltiptext1 {
    visibility: hidden;
    width: 180px;
    background-color: black;
    color: #fff;
    font-size: 12px;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
    top: 100%;
    left: 30px;
}

.tooltip1:hover .tooltiptext1 {
    visibility: visible;
}

.tooltip2 {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip2 .tooltiptext2 {
    visibility: hidden;
    width: 180px;
    background-color: black;
    color: #fff;
    font-size: 12px;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
    top: 100%;
    left: -30px;
    margin-left: 0px;
}

.tooltip2:hover .tooltiptext2 {
    visibility: visible;
}
.td_paloma_verde{
  color: green;
}
.graf_div_ajust{
  Display: none !important;
}
.cd-top:hover {
  opacity: 1 !important;
}

.div_herramientas_naranja{
  background-color: #FF9800;
  width: 100%;
  padding-top: 10px;
  padding-bottom: 10px;

  margin-top: 10px;
  margin-bottom: 20px;
  color: #FFFFFF;
  cursor: pointer;
}
.div_herramientas_amarillo{
  background-color: #F5C716;
  width: 100%;
  padding-top: 10px;
  padding-bottom: 10px;

  margin-top: 10px;
  margin-bottom: 20px;
  color: #FFFFFF;
  cursor: pointer;
}
.div_herramientas_azul{
  background-color: #0277BD;
  width: 100%;
  padding-top: 10px;
  padding-bottom: 10px;

  margin-top: 10px;
  margin-bottom: 20px;
  color: #FFFFFF;
  cursor: pointer;
}
.div_herramientas_rojo{
  background-color: #F44336;
  width: 100%;
  padding-top: 10px;
  padding-bottom: 10px;

  margin-top: 10px;
  margin-bottom: 20px;
  color: #FFFFFF;
  cursor: pointer;
}

.scroll_modal{
  overflow: scroll;
}
</style>




<!-- <section> -->
<div  class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div id="div_particulares_opciones">
          <div class="row">
            <div class="col-sm-12">
              <center>
                <div class="h3">  <strong> Escuelas Particulares</strong></div>
              </center>
            </div>
            <div class="col-sm-12">
              <center class="">
                <p >Inicial, Preescolar, Primaria, Secundaria, Secundaria Técnica, Capacitación para el trabajo, Técnico, Técnico Profesional, Bachillerato General, Tecnológico y no Escolarizado.</p>
              </center>
            </div>
          </div> <!-- row -->

          <div class="well">
            <p> <b>Padre de familia:</b> en este sitio encontrarás información referente a los planteles educativos que ofertan servicios particulares y que están reconocidos por SEP Puebla. Te recomendamos revisar el estatus de la escuela antes de inscribir a tu hijo.</p>
            <p> <b>Supervisor escolar o jefe de sector:</b> en este sitio podrá consultar y descargar la normatividad que regula a las Escuelas Particulares con Reconocimiento Oficial de SEP Puebla, podrá verificar quiénes cuentan con Acuerdo o Registro de Validez Oficial de Estudios (RVOE) y los distintos servicios que están dentro de la Educación Obligatoria.</p>
          </div>

          <div class="row">
            <div class="col-sm-12 ">
              <div class="divCitas">
                <a  href="http://citasenlinea.puebla.gob.mx" target="_blank"> Citas en línea </a>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 ">
              <div class="divbuscador">
                <a id="EP_buscador"> Buscador de escuelas particulares </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margen_columna">
              <div class="cat_ep">
                <a id="EP_a_cat_ep"> Catálogo de nombres de escuelas particulares </a>
              </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margen_columna">
              <div class="norm_tra">
                <a id="" href="<?php echo site_url('escuela/normatividad_tramites_com'); ?>"> Normatividad, trámites, comunicados y modelo educativo 2016 </a>
              </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margen_columna">
              <div class="altas_ba">
                <a id="" href="<?php echo site_url('escuela/altas_bajas_rec_y_cal'); ?>"> Altas, bajas recientes de escuelas particulares y calendario de 185 días </a>
              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margen_columna">
              <a href="http://goo.gl/forms/TrDQmJMhsYSUyzjn1" target="_blank" type="button" class="btn btn-default btn-block btn-lg">
                Ayúdanos a mejorar
              </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margen_columna">
              <a type="button" id="EP_btn_manualusuario"  class="btn btn-default btn-block btn-lg">
                Manual de usuario
              </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 margen_columna">
              <a type="button" id="EP_btn_preguntasfrecuentes" class="btn btn-default btn-block btn-lg">
                Preguntas más frecuentes
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <center>
                <p>DIRECCIÓN DE ESCUELAS PARTICULARES</p>
                <p>Avenida Reforma No 710. Col. Centro</p>
                <p>Puebla, Pue. C.P. 72000</p>
                <p>Tel: 222 – 2230995</p>
                <p>escuelasparticulares@puebla.gob.mx</p>
                <p>www.sep.pue.gob.mx</p>
              </center>
            </div>
          </div>

      </div><!-- div_particulares_opciones -->
  </div> <!-- col-xs-12 -->
  </div> <!-- row -->
</div><!-- container -->


      <div id="div_particulares_grid">
        <div  class="container-fluid">
          <div class="row">
              <div class="dv_flotante" style="top:auto; position: fixed; width:100%; height:auto; background-color:#ffffff; border: 2px solid #ccc; padding:10px;">
                <div class="row"><!-- div de encabezado -->
                  <div class="col-sm-12">
                    <center>
                      <strong> Conozca los datos de matrícula, maestros y desempeño de cada escuela al hacer clic en su CCT  </strong>
                    </center>
                  </div>
                </div><!-- div de encabezado -->
                <div class="row">
                  <!-- <div class="col-sm-12 margin_top_7"> -->
                    <!-- <div id="busqueda"> -->
                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 margin_top_7">
                        <span style="background-color: yellow;" id="id_glyph" class="glyphicon glyphicon-filter"></span>
                        <label style="background-color: yellow;" id="LE_resultados_busqueda"></label>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-1 col-lg-1 margin_top_7">
                        <!-- <form action="excel/exportar_excel" method="post"> -->
                        <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel')); ?>
                          <input type="hidden" name="LE_id_municipio" id="LE_id_municipio" value="">
                          <input type="hidden" name="LE_id_nivel" id="LE_id_nivel" value="">
                          <input type="hidden" name="LE_sostenimiento" id="LE_sostenimiento" value="">
                          <input type="hidden" name="LE_clave" id="LE_clave" value="">
                          <input type="hidden" name="action" id="" value="lista_escuelas_grid">
                          <!-- <b class="pull-right"><button id="" type="submit" class="btn btn-info btn-block btn-sm">Exportar reporte a excel</button></b> -->
                          <button id="" type="submit" class="btn btn-info btn-block" data-toggle="tooltip" title="Exportar reporte a excel">
                            <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                          </button>
                        </form>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-1 col-lg-1 margin_top_7">
                      <b class="pull-right"><button id="EP_btn_rebuscar" type="button" class="btn btn-info btn-block">Buscar otra vez</button></b>
                    </div>
                  </div><!-- row -->

                  <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 margin_top_7">
                        <b  class="pull-left"><label id="le_totalRegistros">0</label> escuelas encontradas</b>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 margin_top_7">
                        <button id="EP_btn_importante" type="button" class="btn btn-info btn-block">Importante <span class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span></button>
                      </div>

                      <div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 margin_top_7">
                        <input type="text" id="EP_txt_buscadorAvanzado" class="form-control pull-right" placeholder="Use este campo para buscar una escuela dentro de la tabla de resultados, ingrese parte del nombre de la escuela" >
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-1 col-lg-1 margin_top_7">
                        <!-- <button id="EP_btn_buscar" type="button" class="btn btn-block btn-sm btn_turquesa" ><span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button> -->

                          <button id="EP_btn_buscar" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Buscar">
                            <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
                          </button>

                      </div>
                  </div><!-- row -->


                  <!-- </div> -->
                <!-- </div> -->
              </div><!-- fixed-top -->
              </div><!-- row -->

              <div class="container-fluid">
                  <div id="mostrarResultado"></div>
                  <div class="row container-fluid margin_top_pFixed">
                        <table class='table' id='le_tabla_listaEscuelas'>
                          <thead>
                            <tr class='informa'>
                              <td>CCT</td>
                              <td>Turno </td>
                              <td>Nombre </td>
                              <td>Nivel </td>
                              <td>Municipio </td>
                              <td>Localidad </td>
                              <td>Domicilio </td>
                            </tr>
                          </thead>
                          <tbody class="tbody_white tbody_center">
                          </tbody>
                        </table>
                  </div>
            </div>
        </div>

    </div> <!-- div_particulares_grid -->




























<!-- Las ventanas modales -->
<div id="EP_aviso" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h4 class="modal-title">¡Urgente, cursos de verano 2017!</h4>
      </div>
      <div class="modal-body">
        <p>
          A todas las escuelas particulares que deseen ofertar cursos de verano, pueden consultar los lineamientos en la sección de Normatividad > Actas de Visita.
        </p>
        <p>
          A los supervisores que necesiten los documentos para la aprobación de cursos de verano, pueden descargarlos en la sección de Normatividad > Actas de Visita.
        </p>
      </div>
    </div>

  </div>
</div><!-- EP_aviso -->

<!--1. Para el formulario de busqueda -->
<div id="EP_modal_busqueda" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title">Escuelas particulares de educación obligatoria</span>
        <button type="button"  id="EP_modal_busqueda_btnsalir" class="close bold_white"  aria-label="Close">
          X
        </button>
      </div>
      <div class="modal-body">

        <p><b>Padre de familia:</b> en esta sección podrás localizar la escuela que buscas sólo <k>seleccione el tipo de búsqueda</k>,
          ingrese la información solicitada y da click en el botón <span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
        </p>



        <fieldset id="EP_tipo_busqueda" name="EP_tipo_busqueda" class="row margenFila allToUpperCaseBold">
          <ul class="buttons">
            <li>
              <input id="radiobtn_1" class="radiobtn" name="EP_tipo_busqueda" type="radio" value="EP_busqueda_tipo_1" tabindex="1">
              <span></span>
              <label for="radiobtn_1"> Por nombre y/o domicilio </label>
            </li>
            <li>
              <input id="radiobtn_2" class="radiobtn" name="EP_tipo_busqueda" type="radio" value="EP_busqueda_tipo_2" tabindex="3">
              <span></span>
              <label for="radiobtn_2"> Por ubicación </label>
            </li>
            <li>
              <input id="radiobtn_3" class="radiobtn" name="EP_tipo_busqueda" type="radio" value="EP_busqueda_tipo_3" tabindex="3">
              <span></span>
              <label for="radiobtn_3"> Por clave CT </label>
            </li>
          </ul>
        </fieldset>
        <p> <b> Las escuelas que no aparecen en esta lista no estan registradas ante la SEP </b></p>

        <!--
        <div class="row">
        <div class="col-xs-12">
        <center>
        <fieldset id="EP_tipo_busqueda" name="EP_tipo_busqueda" class="row margenFila allToUpperCaseBold">
        <b>Seleccione su tipo de búsqueda: </b>
        <div class="btn-group" data-toggle="buttons">
        <label class="btn btn btn-primary">
        <input type="radio" name="EP_tipo_busqueda"  value="EP_busqueda_tipo_1" autocomplete="off">por nombre y/o domicilio
      </label>
      <label class="btn btn btn-primary">
      <input type="radio" name="EP_tipo_busqueda"  value="EP_busqueda_tipo_2" autocomplete="off">  por ubicación
    </label>
    <label class="btn btn btn-primary">
    <input type="radio" name="EP_tipo_busqueda" value="EP_busqueda_tipo_3" autocomplete="off"> Por Clave CT
  </label>
</div>
</fieldset>
</center>
</div>
</div>
-->

<div id="EP_busqueda_tipo_1" class=""> <!-- Panel 1-->
  <div class="panel-body">
    <div class="row margenFila">
      <div class="form-group">
        <span class="control-label  textBold13" for="le_text_escuela"></span>
        <input type = "text" id="EP_text_escuela" class="form-control input-sm" placeholder="Ingrese nombre y/o parte del domicilio">
      </div>
    </div>
    <div class="row">
      <div class="col-xs-0 col-sm-0 col-md-8 col-lg-8"></div>
      <!--
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
      <button id="EP_modal_busqueda_btncancelar_1" type="button" class="btn btn-default btn-block" >Cancelar</button>
    </div>
  -->
  <!--
  <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
  <button id="EP_modal_busqueda_btnbuscar_1" type="button" class="btn btn-block btn_turquesa" ><span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button>
</div>
-->
<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
  <button id="EP_modal_busqueda_btncancelar_1" type="button" class="btn btn-danger btn-block margin_top_7" data-toggle="tooltip" title="Cancelar">
    <center><img src="<?php echo base_url('assets/img/cancel.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
  </button>
</div>
<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
  <button id="EP_modal_busqueda_btnbuscar_1" type="button" class="btn btn-primary btn-block margin_top_7" data-toggle="tooltip" title="Buscar">
    <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
  </button>
</div>

</div>
</div>
</div><!-- End Panel 1-->


<div id="EP_busqueda_tipo_2" class=""> <!-- Panel 1-->
  <div class="panel-body">
    <div class="row margenFila">
      <form class="form-horizontal ">
        <div class="form-group">
          <span class="control-label col-sm-2 textBold13" for="EP_select_idmunicipio">Municipio:</span>
          <div class="col-sm-10">
            <select id="EP_select_idmunicipio" class="form-control input-sm"></select>
          </div>
        </div>
        <div class="form-group">
          <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Nivel: </span>
          <div class="col-sm-10">
            <select id="EP_select_nivel" class="form-control input-sm"></select>
          </div>
        </div>
        <br>
      </form>
    </div><!-- row -->

    <div class="row margenFila">
      <div class="col-xs-0 col-sm-0 col-md-8 col-lg-8"></div>
    <!--
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <button id="EP_modal_busqueda_btncancelar_2" type="button" class="btn btn-default btn-block" >Cancelar</button>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
        <button id="EP_modal_busqueda_btnbuscar_2" type="button" class="btn btn-block btn_turquesa" ><span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button>
      </div>
    -->
    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
      <button id="EP_modal_busqueda_btncancelar_2" type="button" class="btn btn-danger btn-block margin_top_7" data-toggle="tooltip" title="Cancelar">
        <center><img src="<?php echo base_url('assets/img/cancel.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
      </button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
      <button id="EP_modal_busqueda_btnbuscar_2" type="button" class="btn btn-primary btn-block margin_top_7" data-toggle="tooltip" title="Buscar">
        <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
      </button>
    </div>
    </div>
  </div>
</div><!-- End Panel 1-->

<div id="EP_busqueda_tipo_3" class=""> <!-- Panel 2-->
  <div class="panel-body">

    <div class="row margenFila">
      <div class="form-group">
        <span class="control-label textBold13" for="EP_text_CCT">Clave de Centro de Trabajo: </span>
        <div class="input-group">
          <span class="input-group-addon">21</span>
          <input type = "text" id="EP_text_CCT" class="form-control input-sm titulo_none" placeholder="Escriba la CCT en el formato especificado AAA####A" maxlength="8">
        </div>
      </div>
    </div><!-- row -->

    <div class="row margenFila" id="EP_panel3_turno">
      <div class="form-group">
        <span class="control-label col-sm-2 textBold13" for="EP_cct_turno">Turno: </span>
        <div class="col-sm-10">
          <select id="EP_cct_turno" class="form-control input-sm"></select>
        </div>
      </div>
    </div><!-- row -->

    <div class="row margenFila" id="EP_panel3_botones">
      <div class="col-xs-0 col-sm-0 col-md-8 col-lg-8"></div>
      <!-- <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
      <button id="EP_modal_busqueda_btncancelar_3" type="button" class="btn btn-default btn-block" >Cancelar</button>
    </div> -->
    <!-- <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3"> -->
    <!-- <button id="EP_modal_busqueda_btnbuscar_3" type="button" class="btn btn-default btn-block active" >Buscar</button> -->
    <!-- <button id="EP_modal_busqueda_btnbuscar_3" type="button" class="btn btn-block btn_turquesa" ><span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button> -->
    <!-- </div> -->

    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
      <button id="EP_modal_busqueda_btncancelar_3" type="button" class="btn btn-danger btn-block margin_top_7" data-toggle="tooltip" title="Cancelar">
        <center><img src="<?php echo base_url('assets/img/cancel.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
      </button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
      <button id="EP_modal_busqueda_btnbuscar_3" type="button" class="btn btn-primary btn-block margin_top_7" data-toggle="tooltip" title="Buscar">
        <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
      </button>
    </div>

  </div>
</div>
</div>  <!-- End Panel 3-->
</div>
</div>

</div>
</div><!-- EP_modal_busqueda -->


<!--2. Para mostrar la información de la escuela -->
<div id="EP_modal_infoescuela" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal80">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <!-- <button type="button" class="pull-right" id="IE_btn_salir">&times;</button> -->
        <div class='row'>
          <div class='col-xs-0 col-sm-0 col-sm-12 col-lg-12'>
            <button id="EP_modal_infoescuela_btn_salir" type="button" class="close bold_white"  aria-label="Close">
              X
            </button>

            <!-- <button type="button" class="close" id="EP_modal_infoescuela_btn_salir">&times;</button> -->
          </div>
        </div>


        <div class='row'>
          <div class='col-xs-12 col-sm-12 col-sm-4 col-lg-4 margin_top_7'>
            <button type='button' id='EP_btn_reportari'  class='btn btn-default btn-block'> Reportar inconsistencias en la ubicación o datos </button>
          </div>
          <div class='col-xs-12 col-sm-12 col-sm-1 col-lg-1 margin_top_7'>
            <!--
            <button type='button' id='EP_btn_exportaExcel'  class='btn btn-default btn-sm btn-block'>Exportar Reporte a Excel</button>
          -->
          <!-- <form action="app/controllers/exportar_excel.class.php" method="post"> -->
          <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel2')); ?>
            <input type="hidden" name="id_escuela" id="EP_modal_id_escuela" value="">
            <input type="hidden" name="action" id="" value="lista_escuelas">
            <button id="" type="submit" class="btn btn-info btn-block" data-toggle="tooltip" title="Exportar reporte a excel">
              <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
            </button>

            <!-- <button type='submit' id=''  class='btn btn-default btn-sm btn-block'>Exportar reporte a excel <span class="glyphicon glyphicon-save-file" aria-hidden="true"> </span></button> -->
          </form>
        </div>
        <div class='col-xs-0 col-sm-0 col-sm-6 col-lg-6'></div>
      </div>
      <!-- <h4 class="modal-title">Detalle Escuela</h4> -->
    </div>
    <div class="modal-body"> </div><!-- modal body -->
  </div>
</div>
</div><!-- EP_modal_infoescuela -->


<div id="EP_aviso_no_escuela" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Sin resultados</h4>
      </div>
      <div class="modal-body">
        <p>
          La búsqueda por nombre y/o domicilio no arroja resultado alguno. Es posible que no escribió los datos correctamente o la institución que está buscando no cuente con autorización para impartir educación.
        </p>
        <center><p><b>
          ¿Desea reportar alguna anomalía?
        </b></p></center>
        <div class='row'>
          <div class='col-xs-12 col-sm-12 col-sm-6 col-lg-6 margin_top_7'>
            <button type='button' id='EP_aviso_no_escuela_btn_regresar'  class='btn btn-danger btn-sm btn-block'>Regresar </button>
          </div>
          <div class='col-xs-12 col-sm-12 col-sm-6 col-lg-6 margin_top_7'>
            <button type='button' id='EP_aviso_no_escuela_btn_reportar'  class='btn btn-primary btn-sm btn-block'> Reportar </button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div><!-- EP_aviso -->

<div id="EP_modal_reporte" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <button type="button" class="close bold_white" data-dismiss="modal">X</button>
        <h4 class="modal-title">Reporte</h4>
      </div>
      <div class="modal-body">
        <strong>
        <p>
          Este espacio está dedicado para que usted pueda reportar anomalías respecto a la ubicación o datos de alguna escuela particular
        </p>
        <p>
          Para un mejor seguimiento y una pronta respuesta, todos los campos son obligatorios con excepción de archivo(s) adjunto(s).
        </p>
      </strong>

        <div class="row">
          <div class="container-fluid">
          <form class="form-horizontal col-xs-12" id="someFormElement" name="someFormElement">
            <input type="hidden" value="reporte" name="action">
            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2" for="EP_select_nivel">Nombre: </span>
                <div class="col-sm-10 margin_top_7">
                  <input type = "text" id="EP_modal_reporte_nombre" name="EP_modal_reporte_nombre" class="form-control input-sm" placeholder="Ingrese su nombre">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Teléfono: </span>
                <div class="col-sm-10 margin_top_7">
                  <input type = "number" id="EP_modal_reporte_telefono" name="EP_modal_reporte_telefono" class="form-control input-sm" placeholder="Ingrese su número de teléfono">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Email: </span>
                <div class="col-sm-10">
                  <input type = "email" id="EP_modal_reporte_email" name="EP_modal_reporte_email" class="form-control input-sm" placeholder="Ingrese su email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Nombre de la escuela: </span>
                <div class="col-sm-10">
                  <input type = "email" id="EP_modal_reporte_nombree"  name="EP_modal_reporte_nombree" class="form-control input-sm" placeholder="Ingrese el nombre de la escuela">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Dirección de la escuela: </span>
                <div class="col-sm-10">
                  <input type = "email" id="EP_modal_reporte_direccione" name="EP_modal_reporte_direccione" class="form-control input-sm" placeholder="Ingrese la dirección de la escuela">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Motivo del reporte: </span>
                <div class="col-sm-10">
                  <input type = "email" id="EP_modal_reporte_motivo" name="EP_modal_reporte_motivo" class="form-control input-sm" placeholder="Ingrese el asunto">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_select_nivel">Mensaje: </span>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="5" id="EP_modal_reporte_mensaje" name="EP_modal_reporte_mensaje"></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="EP_modal_reporte_archivo">Si desea adjuntar algun archivo presione aqui: </span>
                <div class="col-sm-10">
                  <input type="file" id="EP_modal_reporte_archivo"  name="EP_modal_reporte_archivo" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-0 col-sm-0 col-md-10 col-lg-10"></div>
              <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <!-- <button id="EP_modal_reporte_btn_enviar" type="button" class="btn btn-default btn-block" >Enviar </button> -->
                <button id="EP_modal_reporte_btn_enviar" type="button" class="btn btn-info btn-block" data-toggle="tooltip" title="Enviar reporte por correo">
                  <center><img src="<?php echo base_url('assets/img/mail_send.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                </button>
              </div>
            </div>
          </div><!-- container -->
          </div>
        </form>


      </div><!-- row -->

    </div>
  </div>

</div> <!--  EP_modal_reporte -->


<div id="RA_modal_visorpdf" class="modal fade modal100" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button"  id="" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
          X
        </button>
      </div>
      <div class="modal-body">
        <!-- <embed src="hola.pdf" width="100%" height="500"></embed> -->
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
  pdf = path_home+"escuelas_particulares/5. Manual del usuario.pdf";
  muestraPDF(pdf);
});

$("#EP_btn_preguntasfrecuentes").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/4. Preguntas frecuentes ante la Ventanilla 2017.pdf";
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
