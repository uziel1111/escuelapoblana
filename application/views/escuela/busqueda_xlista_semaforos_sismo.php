<style type="text/css">


.margintop{
  margin-top: 150px;
}
.dv_flotante{
  font-size: 12px;

}


.modal80{
  width: 80% !important;
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
.cd-top:hover {
  opacity: 1 !important;
}
</style>
<div  class="container-fluid">
  <div class="row">
      <div class="dv_flotante" style="top:auto; position: fixed; width:100%; height:auto; background-color:#ffffff; border: 2px solid #ccc; padding:10px;">
        <div class="row"><!-- div de encabezado -->
          <div class="col-sm-12">
            <center class="txtBold">
              <div class="h4">  <strong>Condición de tu escuela en relación con el sismo del 19 de septiembre. </strong></div>
            </center>
          </div>
        </div><!-- div de encabezado -->

        <?php echo form_open('excel/exportar_excel', array('id' => 'form_excel')); ?>
        <div class="container-fluid">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 margin_top_7">
                  <span style="background-color: yellow;" id="id_glyph" class="glyphicon glyphicon-filter"></span>
                  <label style="background-color: yellow;" id="LE_resultados_busqueda"></label>
                </div>

                <input type="hidden" name="LE_id_municipio" id="LE_id_municipio" value="">
                <input type="hidden" name="LE_id_nivel" id="LE_id_nivel" value="">
                <input type="hidden" name="LE_sostenimiento" id="LE_sostenimiento" value="">
                <input type="hidden" name="LE_clave" id="LE_clave" value="">
                <input type="hidden" name="action" id="" value="lista_escuelas_grid">

                <!-- <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 margin_top_7">
                  <button id="LE_btn_importante" type="button" class="btn btn-info btn-block">Importante <span class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span></button>
                </div> -->

                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 margin_top_7">
                    <button id="le_btn_rebuscar" type="button" class="btn btn-info btn-block">Buscar otra vez</button>
                </div>

                <!-- <div class="col-xs-6 col-sm-6 col-md-1 col-lg-1 margin_top_7">
                  <button id="" type="submit" class="btn btn-info btn-block" data-toggle="tooltip" title="Exportar reporte a excel">
                    <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
                  </button>
                </div> -->


             </div><!-- row -->
          </div><!---  container -->
          </form>

          <!-- <div class="row">
            <div  class="col-xs-7 margin_top_7">
              <b  class="pull-left"><label id="le_totalRegistros">0</label> escuelas encontradas</b>
            </div>
            <div class="col-xs-4 margin_top_7">
              <input type="text" id="le_txt_buscadorAvanzado" class="form-control input-sm titulo_none pull-right" placeholder="Use este campo para buscar una escuela dentro de la tabla de resultados, ingrese parte del nombre de la escuela" >
            </div>
            <div  class="col-xs-1 margin_top_7">
              <button id="LE_btn_buscar" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Buscar" >
                <center><img src="<?php echo base_url('assets/img/search.svg'); ?>" alt="..." class="img-responsive img_icono" /></center>
              </button>
            </div>
          </div> -->
          <div class="row">
            <div  class="col-xs-2">
            <p><img style="width: 20px;" src="<?php echo base_url('assets/img/sismo/rojo.png'); ?>" alt="Escuela con Daños." class="iconsismo"><strong> Escuela con Daños. </strong></p>
            </div>
            <div  class="col-xs-2">
            <p><img style="width: 20px;" src="<?php echo base_url('assets/img/sismo/azul.png'); ?>" alt="Instalaciones provisionales." class="iconsismo"><strong> Instalaciones provisionales. </strong></p>
            </div>
            <div  class="col-xs-2">
            <p><img style="width: 20px;" src="<?php echo base_url('assets/img/sismo/blanco.png'); ?>" alt="En proceso de revisión." class="iconsismo"><strong> En proceso de revisión. </strong></p>
            </div>
            <div  class="col-xs-10">
            <p><img style="width: 20px;" src="<?php echo base_url('assets/img/sismo/verde.png'); ?>" alt="Escuela segura, sin daños o con daños mínimos que no ponen en riesgo a los ocupantes del plantel" class="iconsismo"> <strong> Escuela segura, sin daños o con daños mínimos que no ponen en riesgo a los ocupantes del plantel. </strong></p>
            </div>
          </div>
        </div>
      </div>
  </div>



  <br><br><br><br><br><br><br>
  <div class="container-fluid margintop">
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
              <td class="informa">Condición </td>
              <td class="informa">Regreso a clases </td>
              <td class="informa">Lugar de regreso </td>
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
<div id="le_modal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span class="modal-title">Seleccione el tipo de búsqueda</span>
        <button type="button"  id="le_modal_busqueda_btnsalir" class="btn_txt_blue close bold_white "  aria-label="Close">
          X
        </button>
      </div>
      <div class="modal-body">

        <fieldset id="LA_tipo_busqueda" name="LA_tipo_busqueda" class="row margenFila allToUpperCaseBold">
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
          </ul>
        </fieldset>
        <!-- </div> -->


        <div id="LE_busqueda_tipo_1" class=""> <!-- Panel 1-->
          <div class="panel-body">
            <div class="row margenFila">
              <form class="form-horizontal ">
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="le_select_idmunicipio">Municipio:</span>
                  <div class="col-sm-10">
                    <select id="le_select_idmunicipio" class="form-control input-sm"></select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="le_select_nivel">Nivel: </span>
                  <div class="col-sm-10">
                    <select id="le_select_nivel" class="form-control input-sm"></select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento">Sostenimiento: </span>
                  <div class="col-sm-10">
                    <select id="le_select_sostenimiento" class="form-control input-sm"></select>
                  </div>
                </div>
                <br>
              </form>
            </div><!-- row -->
            <div class="row margenFila">
              <div class="form-group">
                <!-- <span class="control-label  textBold13" for="le_text_escuela">Nombre de la escuela (opcional): </span> -->
                <input type="hidden" type = "text" id="le_text_escuela" class="form-control input-sm" placeholder="Escriba parte del nombre de la escuela">
              </div>
            </div>
            <div class="row margenFila">
              <div class="col-xs-0 col-sm-0 col-md-6 col-lg-6"></div>
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <button id="le_modal_btncancelar_1" type="button" class="btn btn-danger btn-block" data-toggle="tooltip" title="Cancelar">
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
                <span class="control-label textBold13" for="le_text_CCT">Clave de Centro de Trabajo: </span>
                <div class="input-group">
                  <span class="input-group-addon">21</span>
                  <input type = "text" id="le_text_CCT" class="form-control input-sm titulo_none" placeholder="Escriba la CCT en el formato especificado AAA####A" maxlength="8">
                </div>
              </div>
            </div><!-- row -->

            <div class="row margenFila" id="LE_panel2_cctTurno">
              <div class="form-group">
                <span class="control-label col-sm-2 textBold13" for="LE_cct_turno">Turno: </span>
                <div class="col-sm-10">
                  <select id="LE_cct_turno" class="form-control input-sm"></select>
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
<div id="le_modal_infoescuela" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal80">
    <div class="modal-content">
      <div class="modal-header modal_head">
        <span id="" class="modal-title"></span>
        <button type="button" class="btn_txt_blue close bold_white" id="le_modal_infoescuela_btn_salir">
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

              <button id="" type="submit" class="btn btn-info btn-block" data-toggle="tooltip" title="Exportar reporte a excel">
                <center><img src="<?php echo base_url('assets/img/xlsx.svg'); ?>" alt="..." class="img-responsive img_icono"/></center>
              </button>


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

<script src="<?php echo base_url(); ?>assets/js/escuela/busqueda_xlista_semaforos_sismo.js"></script>
