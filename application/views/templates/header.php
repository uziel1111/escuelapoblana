<?php if (!isset($titulo)) $titulo = ''; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Escuela Poblana </title>
  <!-- <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>"> -->
  <link href="<?php echo base_url('assets/bootstrap337/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/css/estilos-master.css'); ?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/css/style.light-blue-800.css'); ?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen">
  <link href="<?php echo base_url('assets/css/header.css'); ?>" rel="stylesheet" media="screen">
  <script src="<?php echo base_url('assets/jquery-3.2.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/jquery.validate.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap337/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/sweetalert2/sweetalert2.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/messages.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/regularexpressions.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/load.js'); ?>"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112793645-1"></script> -->
  <script>
  $(document).ready(function () {
    base_url = live_url = "<?php echo base_url(); ?>";
    base_url = base_url+"index.php/";

    if (screen.width<1024)
    $('#omg_hd_idx').css("display", "none");
else
   if (screen.width<1280)
      $('#omg_hd_idx').css("display", "");
   else
    $('#omg_hd_idx').css("display", "");

    // Calculating the distance from the top of the page to the initial position of the navbar, and store it in a variable
                 var navbarOffest = $('.navbar').offset().top;


                 $(window).on('scroll', function () {

                     var navbarHeight = $('.navbar').outerHeight();

                     if ( $(window).scrollTop() >= navbarOffest ) {
                         $('.navbar').addClass('navbar-fixed-top');
                         $('body').css('padding-top', navbarHeight + 'px');
                          $('.dv_flotante').css('top','40px');


                     } else {
                         $('.navbar').removeClass('navbar-fixed-top');
                         $('body').css('padding-top', '0');
                         $('.dv_flotante').css('top','12em');
                     }
                 });

  });
  </script>

</head>

<body>
<style>
BODY{


  font-family: 'Open Sans',sans-serif;


}
.navbar_master{
  border-radius:0px !important;
  padding-right:0px !important;
  margin-right:0px !important;
  z-index:99 important;
}


.dropdown-submenu {
  position: relative;
  margin-top:
}
.dropdown-submenu > .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
}
.dropdown-submenu:hover > .dropdown-menu {
  display: block;
}
.dropdown-submenu:hover > a:after {
  border-left-color: #fff;
}

.dropdown-submenu.pull-left {
  float: none;
}
.dropdown-submenu.pull-left > .dropdown-menu {
  left: -100%;
  margin-left: 10px;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 1s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.navbar-toggle-my {
    position: relative;
    float: right;
    padding: 9px 10px;
    margin-top: 8px;
    margin-bottom: 8px;
    background-color: transparent;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
  }

.line {
  width: 100%;
  height: 5px;
    background: #29c0d4;
    background-color: #29c0d4;
}
.lineOne {
    width: 5%;
    height: 5px;
    background-color: #003D6A;
    float: left;
}
.lineTwo {
    width: 8%;
    height: 5px;
    background-color: #00A1BA;
    float: left;
}

.lineThree {
    width: 12%;
    background-color: #EB751C;
    height: 5px;
    float: left;
}
.lineFour {
    width: 20%;
    background-color: #F6CA30;
    height: 5px;
    float: left;
}





</style>

<!-- Header Logo -->
        <div class="headerlogo grises">
          <div class="container">
             <div class="row">
                 <div id="omg_hd_idx" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                 <center>
                   <a href="http://www.puebla.gob.mx/" target="_blank">
                     <img src="<?php echo base_url('assets/img/escudo-puebla-blanco.png'); ?>" style="width:50%; height:45%;" class="img-responsive pull-left" title="Ir a Portal del Gobierno del Estado de Puebla">
                   </a>
                  </center>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          					  <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 ">
          					   <h2 class="text-left" style="color: white; font-size:5vh;">Escuela Poblana</h2>
          					  </div>
          					  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
          					   <div style="border-left-style: solid; border-left-color: white;"><p class="text-left" style="padding-left: 20px; color: white; font-size:3vh">Portal del Servicio de Asistencia Técnica a la Escuela de Puebla<br> (SATEP)</p></div>
          					  </div>
          					</div>


                   </div>
                   <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 hidden-xs hidden-sm">

                   </div>

          </div>
            </div>
        </div>
        <!-- Header Logo END -->
        <!-- NAVBAR -->
                <nav align="center" class="navbar ">
                      <div class="row hidden-md hidden-lg grises">
                        <div class="navbar-header hidden-md hidden-lg">

                            <button type="button" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navbar-toggle-my collapsed " data-toggle="collapse" data-target="#NavComponents" aria-expanded="false">
                                <i style="color:white;" class="fa fa-bars"></i>
                            </button>

                        </div>
                        </div>

                        <div class="collapse navbar-collapse" id="NavComponents">
                            <!-- Navbar Links -->
                            <ul style="float: none !important;"  class=" nav navbar-nav">


                              <li class="col-xs-12 col-sm-12 col-md-1 col-lg-1 dropdown">

                                  <a  href="<?php echo site_url('Index/index'); ?>" title="Ir a la página de inicio"  aria-haspopup="true" aria-expanded="false"><i style="font-size:4vh;" class="fa fa-home"></i>

                                </a>

                              </li>

                                <li class="col-xs-12 col-sm-12 col-md-5 col-lg-5 dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estadísticas e indicadores
                                        <span class="caret"></span>
                                    </a>
                                    <ul align="center" class="dropdown-menu grises">  <!--  -->
                                        <li><a type="button" id="modal_estadis_const_old" href="<?php echo site_url('Estadistica/estad_indi_generales'); ?>">Estadística por estado, municipio y zona</a></li>
                                        <li><a href="<?php echo site_url('Estadistica/estad_indi_xescuela'); ?>">Estadística por escuela</a></li>
                                        <li><a href="<?php echo site_url('Escuela/busqueda_xmapa'); ?>">Localiza tu escuela en el mapa</a></li>
                                        <li><a href="<?php echo site_url('Estadistica/riesgo_abandono'); ?>">Riesgo de abandono escolar</a></li>
                                    </ul>
                                </li>
                                <li class=" col-xs-12 col-sm-12 col-md-3 col-lg-3 dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu grises">
                                        <!-- <li><a href="http://dsate.mx/cursos/" target="_blank">Oferta de formación continua</a></li> -->
                                        <!-- href="http://spdpuebla.net/" target="_blank"-->
                                        <!-- href="http://escuelapoblana.org/escuelas_particulares/"-->
                                        <!-- href="<?php echo site_url('supervision/index'); ?>"-->
                                        <li><a href="http://sep.puebla.gob.mx/2019-02-19-17-24-35/servicio-profesional-docente" target="_blank">Servicio Profesional Docente</a></li>
                                        <li><a  >Supervisión</a></li>
                                        <li><a  >Escuelas  particulares</a></li>
                                        <!-- http://escuelapoblana.org/escuelas_particulares/ -->
                                        <!-- <li><a href="http://sisep.puebla.gob.mx/sicepconsulta/" target="_blank">Consulta calificaciones y certificados</a></li> -->

                                    </ul>
                                </li>

                                <!-- <li class=" col-xs-12 col-sm-12 col-md-3 col-lg-3 dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Información
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu grises">
                                        <li><a type="button" href="#" id="md_sismo">Sismo</a></li>
                                        <li><a type="button" href="#" id="guias_pf">Guía para padres de familia</a></li>
                                        <!-- <li><a type="button" href="#" id="por_1er_lugar">¿Por qué Puebla es primer lugar nacional?</a></li>
                                        <li><a type="button" href="http://pueblaconvive.mx/" target="_blank" >Puebla Convive</a></li>
                                        <li><a type="button" href="http://www.primerainfanciapuebla.mx/" target="_blank" >Primera Infancia</a></li> -->
                                    </ul>
                                </li> -->
                                <!-- <li class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i> Comunidad educativa
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                      <li class="dropdown-submenu">
                                        <a class="test" tabindex="-1" href="#">Padres de familia <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                          <li><a tabindex="-1" href="http://sisep.puebla.gob.mx/sicepconsulta/">Consulta boletas y certificados</a></li>
                                        </ul>
                                      </li>
                                      <li class="dropdown-submenu">
                                        <a class="test" tabindex="-1" href="#">Docentes <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="http://dsate.mx/cursos/">ABC del proceso de evaluaci&oacute;n del desempe&ntilde;o 2017</a></li>
                                          <li><a tabindex="-1" href="http://spdpuebla.net/">Servicio profesional docente</a></li>
                                        </ul>
                                      </li>
                                      <li class="dropdown-submenu">
                                        <a class="test" tabindex="-1" href="#">Supervisores escolares <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="<?php echo site_url("supervision/index")?>">Supervisi&oacute;n escolar</a></li>
                                          <!-- <li><a tabindex="-1" href="#">Iniciar sesi&oacute;n</a></li> -->
                                        <!-- </ul>
                                      </li>
                                    </ul>
                                  </li>  -->
                                <!-- <li class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sismo
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url("Escuela/escuelas_semaforos_sismos")?>">B&uacute;squeda de escuelas de educaci&oacute;n obligatoria (inicial hasta bachillerato)</a></li>
                                        <li><a id="sismo_esc_sup" href="#" >Instituciones de educaci&oacute;n superior</a></li>
                                        <li><a id="herraminetas_dy_s" href="#" >Herramientas para directores y supervisores en zonas afectadas</a></li>
                                        <li><a href="http://www.aprende.edu.mx/Canal/Sismo/index.html" target="_blank">&iquest;Qu&eacute; hacer despu&eacute;s del sismo?</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </div>

                    <div class="lineOne grises"></div>
                    <div class="lineTwo grises"></div>
                    <div class="lineThree grises"></div>
                    <div class="lineFour grises"></div>

                    <div class="lineOne grises"></div>
                    <div class="lineTwo grises"></div>
                    <div class="lineThree grises"></div>
                    <div class="lineFour grises"></div>


                    <div class="lineTwo grises"></div>
                </nav>
                <!-- NAVBAR END -->

                <!-- MODAL MODELO EDUCATIVO -->
                <div id="modal_din" class="modal fade grises" role="dialog" >
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header modal_head">
                    <button type="button" class="close bold_white" id="close_din">&times;</button>
                    <h4 class="modal-title titulo_none" id="title_din"></h4>
                    </div>
                    <div class="modal-body">
                    </div><!-- modal body -->
                  </div>
                  </div>
                </div><!-- MODAL MODELO EDUCATIVO -->

                <div id="RA_modal_visorpdf" class="modal fade modal100 grises" role="dialog" data-keyboard="false" data-backdrop="static">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header modal_head">
                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                            <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                              X
                            </button>
                          </div>
                          <div class="modal-body">
                            <!-- <embed src="hola.pdf" width="100%" height="500"></embed> -->
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="modal_din_hdys" class="modal fade modal100 grises" role="dialog" >
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header modal_head">
                      <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                        X
                      </button>
                    <h4 class="modal-title titulo_none" id="title_din">
                      Herramientas para directores escolares y supervisores en zonas afectadas
                    </h4>
                    </div>
                    <div class="modal-body">
                            <a href="#" id="hdys_esqreg_clase" ><p>- Esquema de regreso a clases.</p></a>
                            <a href='http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/Formato Seguimiento escuelas en ROJO final.xlsx'><p>- Formato de seguimiento para el regreso a clases.</p></a>
                            <a href="#" id="est_reu_clase" ><p>- Estrategia de reubicación.</p></a>
                            <a href="#" id="part_sup_clase" ><p>- Participación Lucero Nava Bolaños supervisores.</p></a>
                            <a href="#" id="pdtcl_clase" ><p>- Previsión documentación y transparencia Claudia Luna.</p></a>
                            <a href="#" id="uni_dida_todos_clase" ><p>- Unidades didácticas para todos.</p></a>
                    </div><!-- modal body -->
                  </div>
                  </div>
                </div>
                <div id="modal_din_spd" class="modal fade modal100 grises" role="dialog" >
              <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header modal_head">
                  <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                    X
                  </button>
                <h4 class="modal-title titulo_none" id="title_din">
                  Servicio Profesional Docente.
                </h4>
                </div>
                <div class="modal-body">
                  <a  href="https://www.inee.edu.mx/images/stories/2019/spd/Calendario-SPD2019.pdf" target="_blank"><img src="assets/img/calendario_2019.png" class="img-responsive" alt="Cinque Terre"></a>
                        <a href="#" id="enlaces" ><p>- Directorio de servicios.</p></a>
                        <a href="#" id="eami" ><p>- Enlace de interés.</p></a>
                </div><!-- modal body -->
              </div>
              </div>
            </div>

                <div id="modal_din_cal" class="modal fade modal100 grises" role="dialog" >
              <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header modal_head">
                  <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                    X
                  </button>
                <h4 class="modal-title titulo_none" id="title_din">
                  Calendarios escolares vigentes en el estado de Puebla.
                </h4>
                </div>
                <div class="modal-body">

                        <a href="#" id="cal185" ><p>- Calendario escolar 2018-2019 185 días.</p></a>
                        <a href="#" id="cal195" ><p>- Calendario escolar 2018-2019 195 días.</p></a>
                </div><!-- modal body -->
              </div>
              </div>
            </div>

            <div id="alert_genero" class="modal fade modal100 grises" role="dialog" >
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal_head">
              <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                X
              </button>
            <h4 class="modal-title titulo_none" id="title_din">
              Alerta de género.
            </h4>
            </div>
            <div class="modal-body">
                    <a href="#" id="pacvg" ><p>- Protocolos de atención a casos de violencia de género.</p></a>
                    <a href="#" id="inf" ><p>- Infografías.</p></a>
                    <a href="#" id="melv" ><p>- Manual de entrenamiento para escuela libres de violencia.</p></a>
            </div><!-- modal body -->
          </div>
          </div>
        </div>

            <div id="modal_preinscr" class="modal fade modal100 grises" role="dialog" >
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal_head">
              <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                X
              </button>
            <h4 class="modal-title titulo_none" id="title_din">
              Preinscripciones 2018 - 2019 en el estado de Puebla.
            </h4>
            </div>
            <div class="modal-body">

                    <p>Disponible a partir del día jueves 01 de febrero del presente año.</p>
            </div><!-- modal body -->
          </div>
          </div>
        </div>


            <div id="modal_guias_pf" class="modal fade modal100 grises" role="dialog" >
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal_head">
              <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
                X
              </button>
            <h4 class="modal-title titulo_none" id="title_din">
              Guía para padres de familia.
            </h4>
            </div>
            <div class="modal-body">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a href="#" id="gpppp" ><p>- Guía para padres de alumnos en preescolar y primaria.</p>
                      <img style="width:70%" src="<?php echo base_url('assets/img/portadaguiapp.jpg'); ?>" alt="">
                    </a>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a href="#" id="gppsms" ><p>- Guía para padres de alumnos en secundaria y media superior.</p>
                      <img style="width:70%" src="<?php echo base_url('assets/img/portadaguiasms.jpg'); ?>" alt="">
                    </a>
                    </div>
              </div>
              <br><br><br><br><br><br><br><br><br><br><br><br>
            </div><!-- modal body -->
          </div>
          </div>
        </div>

        <div id="modal_aviso_elect" class="modal fade modal100 grises" role="dialog" >
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header modal_head">
              <h3>AVISO IMPORTANTE <button type="button"  id="RA_modal_visorpdf_btnsalir_aviso" class="close bold_white " data-dismiss="modal"  aria-label="Close">X</button></h3>

            </div>
            <div class="modal-body">
                <center>
                  <img style="width:100%" src="<?php echo base_url('assets/img/evaluacion_interna.png'); ?>" alt="">

                <center>
            </div><!-- modal body -->
          </div>
          </div>
        </div>


        <div id="md_sismo_md" class="modal fade modal100 grises" role="dialog" >
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal_head">
          <button type="button"  id="RA_modal_visorpdf_btnsalir" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
            X
          </button>
        <h4 class="modal-title titulo_none" id="title_din">
          Sismo
        </h4>
        </div>
        <div class="modal-body">
          <center><b style="">
      Tu seguridad es nuestra prioridad
      <br>
      Han regresado el 100% de las escuelas a clases en el estado de Puebla.
    </b>
        </center>
        <br>
        <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <a href="<?php echo site_url("Escuela/escuelas_semaforos_sismos")?>">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_azul">
            <span class="span_titulo">B&uacute;squeda de escuelas de educaci&oacute;n obligatoria (inicial hasta bachillerato)</span>

          </div>
          </a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <a id="sismo_esc_sup1" href="#" >
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_azul">
            <span class="span_titulo">Instituciones de educaci&oacute;n superior</span>
          </div>
          </a>
        </div> -->


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <a id="herraminetas_dy_s1" href="#" >
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_azul">
            <span class="span_titulo">Herramientas para directores y supervisores en zonas afectadas</span>
          </div>
          </a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <a href="http://www.aprende.edu.mx/Canal/Sismo/index.html" target="_blank">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_azul">
            <span class="span_titulo">&iquest;Qu&eacute; hacer despu&eacute;s del sismo?</span>
          </div>
          </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <a id="apoyo_psico_s1" href="#">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_azul">
            <span class="span_titulo">Apoyo psicoemocional niñas, niños y adolescentes después de un terremoto</span>
          </div>
          </a>
        </div>
        <br>
        <br>
        <br>
        <br>

        </div><!-- modal body -->
      </div>
      </div>
    </div>


<div id="md_construc" class="modal fade modal100 grises" role="dialog" >
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal_head">
          <button type="button"  id="RA_md_construc" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
            X
          </button>
        <h4 class="modal-title titulo_none" id="title_din">
          Sección en construcción
        </h4>
        </div>
        <div class="modal-body">
          <center><b style="">
      Esta sección se encuentra en proceso de mantenimiento.
      <br>

    </b>
        </center>
        <br>



        <br>
        <br>
        <br>
        <br>

        </div><!-- modal body -->
      </div>
      </div>
    </div>
