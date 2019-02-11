<style type="text/css">


.margintop{
  margin-top: 150px;
}


.modal80{
  /* width: 80% !important; */
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
  font-size: 24px;
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

.ft-responsive-sm{
  font-size: 1.9vh;
}
.ft-responsive-xg{
  font-size: 2.5vh;
}
.tbt-responsive-xw{
  font-size: 1.3em;
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


<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container-fluid grises">
  <div class="row">
      <div id="iddv_flotante_new" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dv_flotante_new" style="z-index: 100; width:100%; height:auto; background-color:#ffffff; border: 2px solid #ccc;">
        <div class="row"><!-- div de encabezado -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ft-responsive-sm">
            <center class="txtBold">
              <div class="h5">  <strong>Conozca los datos de matrícula, maestros y desempeño de cada escuela al hacer clic en su CCT  </strong></div>
            </center>
          </div>
        </div><!-- div de encabezado -->

        <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel')); ?>
        <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 margin_top_7 ft-responsive-sm">
                  <span style="background-color: yellow;" id="id_glyph" class="glyphicon glyphicon-filter"></span>
                  <label style="background-color: yellow;" id="LE_resultados_busqueda"></label>
                </div>

                <input type="hidden" name="LE_id_municipio" id="LE_id_municipio" value="">
                <input type="hidden" name="LE_id_nivel" id="LE_id_nivel" value="">
                <input type="hidden" name="LE_sostenimiento" id="LE_sostenimiento" value="">
                <input type="hidden" name="LE_clave" id="LE_clave" value="">
                <input type="hidden" name="action" id="" value="lista_escuelas_grid">

                <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 margin_top_7 ft-responsive-sm">
                  <button id="LE_btn_importante" type="button" class="btn btn-info btn-xs">Importante <span class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span></button>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2 margin_top_7">
                    <button id="le_btn_rebuscar" type="button" class="btn btn-info btn-xs">Buscar otra vez</button>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-1 col-lg-1 margin_top_7 ">
                  <button id="" type="submit" class="btn btn-info btn-xs pull-right" data-toggle="tooltip" title="Exportar reporte a excel">
                    <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                  </button>
                </div>

             </div><!-- row -->
          </div><!---  container -->
          </form>

          <div class="row">
            <div  class="col-xs-2 col-sm-2 col-md-2 col-lg-2 margin_top_7 margin_top_7 ft-responsive-sm">
              <b  class="pull-left"><label id="le_totalRegistros">0</label> escuelas encontradas</b>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 margin_top_7 margin_top_7 ft-responsive-sm">
              <input type="text" id="le_txt_buscadorAvanzado" class="form-control input-sm titulo_none pull-right" placeholder="Use este campo para buscar una escuela dentro de la tabla de resultados, ingrese parte del nombre de la escuela" >
            </div>
            <div  class="col-xs-2 col-sm-2 col-md-2 col-lg-2 margin_top_7 margin_top_7 ft-responsive-sm">
              <button id="LE_btn_buscar" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="Buscar" >
                <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
              </button>
            </div>
          </div>
        </div>
      </div>
  </div>



  <div class="container-fluid margintop grises">
    <div class="row container-fluid">
      <div class="table-condensed table-responsive table-hover tabla_border_blue">
        <table class='table' id='le_tabla_listaEscuelas'><!-- EL id se usa en el JS, no quitar -->
          <thead>
            <tr class='informa'>
              <td class="informa">CCT</td>
              <td class="informa">Turno </td>
              <td class="informa">Nombre </td>
              <td class="informa">Nivel </td>
              <td class="informa">Municipio </td>
              <td class="informa">Localidad </td>
              <td class="informa">Domicilio </td>
            </tr>
          </thead>
          <tbody class="tbody_white tbody_center">
            <a  href='#top'><img id="btn_topscll" class="cd-top" border='0' style="visibility: hidden; opacity: 0.5; height: 60px; width: 60px; position: fixed; bottom: 80px; right: 4%; z-index:1000;"  src="<?php echo base_url('assets/img/arrow-up-on-a-black-circle-background.svg'); ?>" title="Ir arriba" /></a>

          </tbody>
        </table>
      </div>
    </div>
  </div>




<!-- Las ventanas modales -->
<!--1. Para el formulario de busqueda -->
<div id="le_modal" class="modal fade grises" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title ft-responsive-modal">Seleccione el tipo de búsqueda</span>
        <button type="button"  id="le_modal_busqueda_btnsalir" class="close bold_white "aria-label="Close"  data-dismiss="modal">
          X
        </button>
      </div>
      <div class="modal-body">

        <fieldset id="LA_tipo_busqueda" name="LA_tipo_busqueda" class="row margenFila allToUpperCaseBold ft-responsive-modal">
          <ul class="buttons">
            <li>
              <input id="radiobtn_1" class="radiobtn" name="LA_tipo_busqueda" type="radio" value="LE_busqueda_tipo_1" tabindex="1">
              <span></span>
              <label for="radiobtn_1"> Por municipio, nivel, sostenimiento o nombre</label>
            </li>
            <li>
              <input id="radiobtn_3" class="radiobtn" name="LA_tipo_busqueda" type="radio" value="LE_busqueda_tipo_2" tabindex="3">
              <span></span>
              <label for="radiobtn_3"> Por Clave de Centro de Trabajo </label>
            </li>
          </fieldset>
          </ul>
        <!-- </div> -->


        <div id="LE_busqueda_tipo_1" class="panel  margin2_greyblue ft-responsive-modal-sm"> <!-- Panel 1-->
          <div class="panel-body">
            <div class="row margenFila">
              <form class="form-horizontal ">
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="le_select_idmunicipio">Municipio:</span>
                  <div class="col-sm-10">
                    <select id="le_select_idmunicipio" class="form-control input-sm ft-responsive-modal-sm"></select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="le_select_nivel">Nivel: </span>
                  <div class="col-sm-10">
                    <select id="le_select_nivel" class="form-control input-sm ft-responsive-modal-sm"></select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento">Sostenimiento: </span>
                  <div class="col-sm-10">
                    <select id="le_select_sostenimiento" class="form-control input-sm ft-responsive-modal-sm"></select>
                  </div>
                </div>
                <br>
              </form>
            </div><!-- row -->
            <div class="row margenFila">
              <div class="form-group">
                <span class="control-label  textBold13" for="le_text_escuela">Nombre de la escuela (opcional): </span>
                <input type = "text" id="le_text_escuela" class="form-control input-sm" placeholder="Escriba parte del nombre de la escuela">
              </div>
            </div>
            <div class="row margenFila">
              <div class="col-xs-0 col-sm-0 col-md-6 col-lg-6"></div>
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <button id="le_modal_btncancelar_1" type="button" class="btn btn-danger btn-block " data-toggle="tooltip" title="Cancelar">
                  <center><img src="<?php echo base_url('assets/img/cancel.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                </button>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <!-- <button id="LE_modal_btnbuscar_1" type="button" class="btn btn-primary btn-block active btn_turquesa" ><span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button> -->
                <button id="LE_modal_btnbuscar_1" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Buscar" >
                  <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
                </button>
              </div>
            </div>
          </div>
        </div>





        <div id="LE_busqueda_tipo_2" class=""> <!-- Panel 2-->
          <div class="panel-body">

            <div class="row margenFila">
              <div class="form-group">
                <span class="control-label textBold13 ft-responsive-modal-sm" for="le_text_CCT">Clave de Centro de Trabajo: </span>
                <div class="input-group">
                  <span class="input-group-addon ft-responsive-modal-sm">21</span>
                  <input type = "text" id="le_text_CCT" class="form-control input-sm titulo_none ft-responsive-modal-sm" placeholder="Escriba la CCT en el formato especificado AAA####A" maxlength="8">
                </div>
              </div>
            </div><!-- row -->

            <div class="row margenFila" id="LE_panel2_cctTurno">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13 ft-responsive-modal-sm" for="LE_cct_turno">Turno: </span>
                <div class="col-sm-10">
                  <select id="LE_cct_turno" class="form-control input-sm ft-responsive-modal-sm"></select>
                </div>
              </div>
            </div><!-- row -->
            <br>
            <div class="row margenFila" id="LE_panel2_botones">
              <div class="col-xs-0 col-sm-0 col-md-8 col-lg-8"></div>
              <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                <!-- <button id="le_modal_btncancelar_2" type="button" class="btn_txt_blue btn btn-default btn-block" >Cancelar</button> -->
                <button id="le_modal_btncancelar_2" type="button" class="btn btn-danger btn-block margin_top_7" data-toggle="tooltip" title="Cancelar">
                  <center><img src="<?php echo base_url('assets/img/cancel.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                </button>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                <!-- <button id="LE_modal_btnbuscar_2" type="button" class="btn btn-default btn-block active" >Buscar</button> -->
                <!-- <button id="LE_modal_btnbuscar_2" type="button" class="btn_txt_blue btn btn-block btn_turquesa" ><span class="glyphicon glyphicon-search" aria-hidden="true"> </span></button> -->
                <button id="LE_modal_btnbuscar_2" type="button" class="btn btn-primary btn-block margin_top_7" data-toggle="tooltip" title="Buscar">
                  <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
                </button>
              </div>
            </div>
          </div>
        </div>  <!-- End Panel 2-->


      </div><!-- modal body -->

    </div>
  </div>
</div><!-- End modal -->
<!--2. Para mostrar la información de la escuela -->
<div id="le_modal_infoescuela" class="modal fade grises" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal80">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title ft-responsive-modal">Información de la escuela</span>
        <button type="button" class="close bold_white" id="le_modal_infoescuela_btn_salir" aria-label="Close"  data-dismiss="modal">
           X
        </button>

        <div class='row'>
          <!-- <form action="app/controllers/exportar_excel.class.php" method="post"> -->
          <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel2')); ?>
            <input type="hidden" name="id_escuela" id="le_modal_id_escuela" value="">
            <input type="hidden" name="action" id="" value="lista_escuelas">
            <div class='col-xs-12 col-sm-12 col-md-1 col-lg-1'>
              <!-- <button type='button' id='IE_btn_exportaExcel'  class='btn btn-default btn-sm btn-block'>Exportar reporte a excel <span class="glyphicon glyphicon-save-file" aria-hidden="true"> </span></button> -->
              <!-- <button type='submit' id=''  class='btn_txt_blue btn btn-default btn-sm btn-block'>Exportar reporte a excel <span class="glyphicon glyphicon-save-file" aria-hidden="true"> </span></button> -->

              <!-- <button id="" type="submit" class="btn btn-info btn-block" data-toggle="tooltip" title="Exportar reporte a excel">
                <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
              </button> -->


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
<script  src="<?php echo base_url(); ?>assets/js/escuela/progressbar.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/escuela/informacion.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/graficos_1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/escuela/busqueda_xlista.js"></script>
