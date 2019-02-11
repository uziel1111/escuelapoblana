
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

.margintop{
  margin-top: 70px;
}
.well{
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

</style>

<div  class="container-fluid grises">
  <div class="row">
    <div class="dv_flotante"  style="z-index: 100; top:auto; position: fixed; width:100%; height:auto; background-color:#ffffff; border: 2px solid #ccc; padding:10px;" >
          <div id="busqueda">
              <div class="container-fluid">
              <br>
              <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 contenedorFiltros">
                <span style="background-color: yellow;" id="id_glyph" class="glyphicon glyphicon-filter"></span>
                <label style="background-color: yellow;" id="LE_resultados_busqueda"></label>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-1 col-lg-1 contenedorFiltros_btn">
                <b class="pull-right"><button id="le_btn_rebuscar" type="button" class="btn btn-info btn-block btn-sm">Buscar otra vez</button></b>
              </div>

                <div class="panel-heading">

                </div>
              </div>
          </div>
    </div>
  </div> <!-- row -->

<br>
<div class="container-fluid margintop">
  <div class="row margenFila">
      <div class="col-sm-12">
        <div id="contenedor_tablas"></div>
      </div>
  </div>
</div>
</div><!-- CONTAINER -->

  <!-- Las ventanas modales -->
        <!--1. Para el formulario de busqueda -->
        <div id="le_modal" class="modal fade grises" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header modal_head">

                <span class="modal-title ft-responsive-modal">Seleccione opciones para mostar Riesgo de Abandono Escolar</span>
                <button type="button"  id="le_modal_busqueda_btnsalir" class="btn_txt_blue close bold_white "  aria-label="Close">
                  X
                </button>


              </div>
              <div class="modal-body body_DarkGray">

                <div class="panel margin2_greyblue" id="LE_busqueda_tipo_1"> <!-- Panel 1-->
                  <div class="panel-body">
                        <div class="row margenFila">
                            <form class="form-horizontal ">
                                <div class="form-group">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_idmunicipio">Estado / Municipios:</span>
                                    <div class="col-sm-10">
                                      <select id="Municipios" class="form-control input-sm"></select>
                                    </div>
                                </div>
                                <div class="form-group" id="div_nivel">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_nivel">Nivel: </span>
                                    <div class="col-sm-10">
                                      <select id="nivelmunicipios" class="form-control input-sm">
                                      <option value="0">ELIGE NIVEL</option>
                                      <option value="PRIMARIA">PRIMARIA</option>
                                      <option value="SECUNDARIA">SECUNDARIA</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group" id="div_bimestre">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento" id="sostmuni">Bimestre: </span>
                                    <div class="col-sm-10">
                                      <select id="bimestremuni" class="form-control input-sm">
                                        <option value="0">ELIGE BIMESTRE</option>
                                      <option value="1">1er Bimestre</option>
                                      <option value="2">2do Bimestre</option>
                                      <option value="3">3er Bimestre</option>
                                      <option value="4">4to Bimestre</option>
                                      <option value="5">5to Bimestre</option>
                                      </select>
                                    </div>
                                </div>



                                <div class="form-group" id="div_ciclo">
                                    <span class="control-label col-sm-2 textBold13" for="le_select_sostenimiento">Ciclo Escolar: </span>
                                    <div class="col-sm-10">
                                      <select id="ciclo" class="form-control input-sm">
                                        <option value="0">ELIGE CICLO ESCOLAR</option>
                                      <option value="2016 - 2017">2016 - 2017</option>
                                      <option value="2017 - 2018">2017 - 2018</option>
                                      </select>
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

                                <br>
                                </form>
                          </div><!-- row -->
                  </div>
              </div><!-- End Panel 1-->


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

<script src="<?php echo base_url(); ?>assets/js/escuela/5.0.3/highcharts.js"></script>
<script src="<?php echo base_url('assets/js/est_e_ind/graficos_1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/est_e_ind/riesgo_pormuni.js'); ?>"></script>
