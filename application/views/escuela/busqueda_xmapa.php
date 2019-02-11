<style type="text/css">


.margintop{
  margin-top: 150px;
}
.scroll_modal{
  overflow: scroll;
}

.modal80{
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

.panel-heading .fa-chevron {
    content: '\f078';
}
.panel-heading .fa-chevron:after {
    content: '\f078';
}
.panel-heading.collapsed .fa-chevron:after {
    content: '\f054';
}


</style>

<div class="container-fluid grises">
  <div class="panel panel-default panel_content">
    <div class="panel-heading panel_head">Identifique el nivel de la escuela según el color del marcador</div>
    <div class="panel-body">

      <div class="row">
        <div class="col-sm-12">
                <center class="txtBold">
                  <span style="color:#000000;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Especial </label>&nbsp;&nbsp;
                  <span style="color:#800000;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Inicial </label>&nbsp;&nbsp;
                  <span style="color:#0000FF;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Preescolar </label>&nbsp;&nbsp;
                  <span style="color:#6B8E23;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Primaria </label>&nbsp;&nbsp;
                  <span style="color:#32CD32;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Secundaria </label>&nbsp;&nbsp;
                  <span style="color:#9370DB;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Media Superior </label>&nbsp;&nbsp;
                  <span style="color:#FF8C00;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Superior </label>&nbsp;&nbsp;
                  <!-- <span style="color:#FF0000;" class="glyphicon glyphicon-map-marker"></span>&nbsp; Formación para el trabajo </label>&nbsp;&nbsp; -->
                </center>
              </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-10 col-lg-10">
              <span style="background-color: yellow;" id="id_glyph" class="glyphicon glyphicon-filter"></span>
              <label style="background-color: yellow;" id="LM_resultados_busqueda"></label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
              <!-- <b class="pull-right"> -->
              <!-- data-toggle="tooltip" title=" <img src='<?php echo base_url('assets/img/reload.svg'); ?>' " -->
                <button id="LM_btn_rebuscar" type="button" class="btn btn-info btn-block btn-sm"  alt='...' class='img-responsive img_icono'/>
                   Buscar otra vez
                </button>
              <!-- </b> -->
            </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
              <center><div class="">Click  sobre el <span class="glyphicon glyphicon-map-marker"></span> para obtener mayor información de cada escuela</div></center>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <center><div class="">¡La ubicación geográfica de las escuelas podría no ser exacta, por favor verifique el domicilio!</div></center>
            </div>
        </div> <!-- row -->

    </div>
  </div>
</div><!-- container -->


<div class="container-fluid grises">
  <div class="row">
    <div class="col-sm-12">
      <div id="map" style="width:100%;height:700px; index-z:-1"></div>
    </div>
  </div> <!-- row -->
</div>

<div id="LM_modal" class="modal fade grises" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title titulo_none">Localiza tu escuela en el mapa</span>
        <button id="LM_modal_busqueda_btnsalir" type="button" class="close bold_white"  aria-label="Close">
          X
        </button>
      </div>
      <div class="modal-body">

          <div class="container-fluid">
            <div class="row margin_top_7">
              <form class="form-horizontal ">
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="LM_select_idmunicipio">Municipio:</span>
                  <div class="col-sm-10">
                    <select id="LM_select_idmunicipio" class="form-control input-sm"></select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="LM_select_nivel">Nivel: </span>
                  <div class="col-sm-10">
                    <select id="LM_select_nivel" class="form-control input-sm">
                      <option value="0">TODOS</option>
                      <option value="1">ESPECIAL</option>
                      <option value="2">INICIAL</option>
                      <option value="3">PREESCOLAR</option>
                      <option value="4">PRIMARIA</option>
                      <option value="5">SECUNDARIA</option>
                      <option value="6">MEDIA SUPERIOR</option>
                      <option value="7">SUPERIOR</option>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="LM_select_sostenimiento">Sostenimiento: </span>
                  <div class="col-sm-10">
                    <select id="LM_select_sostenimiento" class="form-control input-sm"></select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="LM_select_fpa">Programas Federales de Apoyo: </span>
                  <div class="col-sm-10">
                    <select id="LM_select_fpa" class="form-control input-sm">
                    <option value="0">NO OCUPAR ESTE FILTRO</option>
                    <option value="1">TODOS LOS PROGRAMAS</option>
                    <option value="2">PROGRAMA PARA LA INCLUSIÓN Y LA EQUIDAD EDUCATIVA (PIEE)</option>
                    <option value="3">PROGRAMA NACIONAL DE CONVIVENCIA ESCOLAR (PNCE)</option>
                    <option value="4">PROGRAMA NACIONAL DE INGLÉS (PRONI)</option>
                    <option value="5">PROGRAMA DE FORTALECIMIENTO DE LA CALIDAD EDUCATIVA (PFCE)</option>
                    <option value="6">PROGRAMA ESCUELAS DE TIEMPO COMPLETO (PETC)</option>
                    <option value="7">PROGRAMA ALIMENTACIÓN</option>
                    <!-- <option value="8">PROGRAMA ESCUELAS AL CIEN</option> -->
                    </select>
                  </div>
                </div>
              </form>
            </div><!-- row -->

            <form id="LM_modal_form">
              <div class="row margin_top_7">
                <div class="form-group">
                  <span class="control-label  textBold13" for="LM_text_escuela">Nombre de la escuela (opcional): </span>
                  <input type = "text" id="LM_text_escuela" class="form-control input-sm" placeholder="Escriba parte del nombre de la escuela">
                </div>
              </div>
              <div class="row margin_top_7">
                <div class="form-group">
                  <span class="control-label  textBold13" for="LM_text_CCT">Clave de Centro de Trabajo (opcional): </span>
                  <div class="input-group">
                    <span class="input-group-addon">21</span>
                    <input type = "text" id="LM_text_CCT" class="form-control input-sm" placeholder="Escriba la CCT en el formato especificado AAA####A">
                  </div>
                </div>
              </div><!-- row -->
            </form>

            <div class="row">

              <div class="col-sm-2">
                <button id="LM_modal_btnayuda" type="button" class="btn btn-info btn-block" data-toggle="tooltip" title="Ayuda"><center> <!-- data-toggle="modal" data-target="#LM_ayuda"-->
                  <!-- <span class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span> -->
                  <img src="<?php echo base_url('assets/img/help.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                </button>
              </div>
              <div class="col-sm-6"></div>
              <!-- <div class="col-sm-2">
                <button id="LM_modal_btncancelar" type="button" class="btn btn-default" >Cancelar</button>
              </div> -->
              <div class="col-sm-2">
                <!-- <button id="LM_modal_btnbuscar" type="button" class="btn btn-primary" >Buscar</button> -->
                <button id="LM_modal_btncancelar" type="button" class="btn btn-danger btn-block" data-toggle="tooltip" title="Cancelar">
                  <center><img src="<?php echo base_url('assets/img/cancel.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                </button>
              </div>
              <div class="col-sm-2">
                <!-- <button id="LM_modal_btnbuscar" type="button" class="btn btn-primary" >Buscar</button> -->
                <button id="LM_modal_btnbuscar" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Buscar">
                  <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
                </button>
              </div>
            </div>

          </div>
        <!-- </div> -->

      </div>
    </div>
  </div>
</div><!-- End modal -->

<!-- Modal -->
<div id="LM_ayuda" class="modal fade grises" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title">Ayuda</span>
        <button type="button"  class="close bold_white " data-dismiss="modal">
          X
        </button>
      </div>
      <!-- <div class="modal-header modal_head">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ayuda</h4>
      </div> -->
      <div class="modal-body">
        <p>
          1.- Usted puede localizar en el mapa la ubicación geográfica de las escuelas, únicamente seleccione el municipio, la opción
          del nivel educativo deseado y el sostenimiento. Adicional puede escribir parte del nombre de la escuela, éste último no es
          obligatorio.
        </p>
        <p>
          2.- Si captura la Clave del Centro de Trabajo  y la escuela es encontrada en la base de datos el mapa ubicará automáticamente un marcador <span class="glyphicon glyphicon-map-marker"></span> para usted, de lo contrario no habrá ningún marcador.
          NOTA: En caso de escribir la CCT cuide que el formato sea el correcto, si no está seguro(a) de cómo escribirla por favor no la escriba.
        </p>
      </div>
    </div>

  </div>
</div><!-- LM_ayuda -->

<!--2. Para mostrar la información de la escuela -->
<div id="le_modal_infoescuela" class="modal fade grises" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal80">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title ft-responsive-modal">Información de la escuela</span>
        <button type="button" class="btn_txt_blue close bold_white" id="le_modal_infoescuela_btn_salir">
           X
        </button>
        <div class='row'>
          <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel2')); ?>
            <input type="hidden" name="cct"   id="le_modal_cct" value="">
            <input type="hidden" name="turno" id="le_modal_turno" value="">
            <input type="hidden" name="action" id="" value="mapa_escuelas">
            <div class='col-xs-12 col-sm-12 col-md-1 col-lg-1'>
              <!-- <button id="" type="submit" class="btn btn-info btn-block" data-toggle="tooltip" title="Exportar reporte a excel">
                <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
              </button> -->
              <!-- <button type='submit' id=''  class='btn_txt_blue btn btn-default btn-sm btn-block'>Exportar reporte a excel <span class="glyphicon glyphicon-save-file" aria-hidden="true"> </span></button> -->
            </div>
            <div class='col-xs-12 col-sm-12 col-md-10 col-lg-10'>
            </div>
          </form>
        </div><!---row -->
      </div>
      <div class="modal-body"> </div><!-- modal body -->
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

<!-- Llamada para cargar highcharts-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/highcharts.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/data.js"></script> <!--Problemas con esta versión <script src="https://code.highcharts.com/modules/data.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/modules/drilldown.js"></script> <!--Problemas con esta versión<script src="https://code.highcharts.com/modules/drilldown.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/escuela/informacion.js"></script>
<script  src="<?php echo base_url(); ?>assets/js/escuela/progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/graficos_1.js"></script>

<!--  JS para los mapas -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBORp5ivGEk1dyiq2_6K5c85IbDOzuYymQ&callback=myMap&libraries=geometry"></script>
<script src="<?php echo base_url('assets/js/escuela/mapa/mapa.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/escuela/mapa/oms.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/escuela/mapa/ubicador.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/escuela/mapa/localiza_escuela_mapa.js'); ?>"></script>
