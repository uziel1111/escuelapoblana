  <style>
  .margintop{
    margin-top: 10px;
  }

  }.bg-slideshow, .bg-slideshow:after {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: -9999;
    list-style: none;
  }
  .bg-slideshow:after {
    background: top left;
  }
  .bg-slideshow li span {
    width: 100%;
    height: 80%;
    position: absolute;

    left: 0;
    background: 50% 50% none;
    opacity: 0;
    z-index: -9999;
    -webkit-backface-visibility: hidden;
    -webkit-animation: imageAnimation 36s linear infinite 0s;
    -moz-animation: imageAnimation 36s linear infinite 0s;
    -o-animation: imageAnimation 36s linear infinite 0s;
    -ms-animation: imageAnimation 36s linear infinite 0s;
    animation: imageAnimation 36s linear infinite 0s;
  }

  .bg-slideshow li:nth-child(1) span {
    /*background-image: url(//static.phalconphp.com/www/images/1.jpg);*/
    /*background-image: url(../assets/img/img_idx/marcoSlider01.jpg);*/
    background-image: url("<?php echo base_url('assets/img/img_idx/marcoSlider01.jpg'); ?>");
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
  }
  .bg-slideshow li:nth-child(2) span {
    /*background-image: url(//static.phalconphp.com/www/images/2.jpg);*/
    /*background-image: url(../assets/img/img_idx/marcoSlider02.jpg);*/
    background-image: url("<?php echo base_url('assets/img/img_idx/marcoSlider02.jpg'); ?>");
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -webkit-animation-delay: 6s;
    -moz-animation-delay: 6s;
    -o-animation-delay: 6s;
    -ms-animation-delay: 6s;
    animation-delay: 6s;
  }
  .bg-slideshow li:nth-child(3) span {
    /*background-image: url(//static.phalconphp.com/www/images/3.jpg);*/
    /*background-image: url(assets/img/img_idx/marcoSlider03.jpg);*/
    background-image: url("<?php echo base_url('assets/img/img_idx/marcoSlider03.jpg'); ?>");
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -webkit-animation-delay: 12s;
    -moz-animation-delay: 12s;
    -o-animation-delay: 12s;
    -ms-animation-delay: 12s;
    animation-delay: 12s;
  }
  .bg-slideshow li:nth-child(4) span {
    /*background-image: url(assets/img/img_idx/marcoSlider04.jpg);*/
    background-image: url("<?php echo base_url('assets/img/img_idx/marcoSlider04.jpg'); ?>");
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -webkit-animation-delay: 18s;
    -moz-animation-delay: 18s;
    -o-animation-delay: 18s;
    -ms-animation-delay: 18s;
    animation-delay: 18s;
  }
  .bg-slideshow li:nth-child(5) span {
    /*background-image: url(assets/img/img_idx/marcoSlider05.jpg);*/
    background-image: url("<?php echo base_url('assets/img/img_idx/marcoSlider05.jpg'); ?>");
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -webkit-animation-delay: 24s;
    -moz-animation-delay: 24s;
    -o-animation-delay: 24s;
    -ms-animation-delay: 24s;
    animation-delay: 24s;
  }
  /* .bg-slideshow li:nth-child(6) span { */
    /*background-image: url(assets/img/img_idx/marcoSlider06.jpg);*/
    /* background-image: url("<?php echo base_url('assets/img/img_idx/marcoSlider06.jpg'); ?>");
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -webkit-animation-delay: 30s;
    -moz-animation-delay: 30s;
    -o-animation-delay: 30s;
    -ms-animation-delay: 30s;
    animation-delay: 30s;
  } */


  @-webkit-keyframes imageAnimation {
    0% {
      opacity: 0;
      -webkit-animation-timing-function: ease-in;
    }
    8% {
      opacity: 1;
      -webkit-transform: scale(1.05);
      -webkit-animation-timing-function: ease-out;
    }
    17% {
      opacity: 1;
      -webkit-transform: scale(1.1);
    }
    22% {
      opacity: 0;
      -webkit-transform: scale(1.1) translateY(-20%);
    }
    25% {
      opacity: 0;
      -webkit-transform: scale(1.1) translateY(-100%);
    }
    100% {
      opacity: 0;
    }
    }@-moz-keyframes imageAnimation {
      0% {
        opacity: 0;
        -moz-animation-timing-function: ease-in;
      }
      8% {
        opacity: 1;
        -moz-transform: scale(1.05);
        -moz-animation-timing-function: ease-out;
      }
      17% {
        opacity: 1;
        -moz-transform: scale(1.1);
      }
      22% {
        opacity: 0;
        -webkit-transform: scale(1.1) translateY(-20%);
      }
      25% {
        opacity: 0;
        -moz-transform: scale(1.1) translateY(-100%);
      }
      100% {
        opacity: 0;
      }
      }@-o-keyframes imageAnimation {
        0% {
          opacity: 0;
          -o-animation-timing-function: ease-in;
        }
        8% {
          opacity: 1;
          -o-transform: scale(1.05);
          -o-animation-timing-function: ease-out;
        }
        17% {
          opacity: 1;
          -o-transform: scale(1.1);
        }
        22% {
          opacity: 0;
          -webkit-transform: scale(1.1) translateY(-20%);
        }
        25% {
          opacity: 0;
          -o-transform: scale(1.1) translateY(-100%);
        }
        100% {
          opacity: 0;
        }
        }@-ms-keyframes imageAnimation {
          17%, 8% {
            opacity: 1;
          }
          0%, 100%, 22%, 25% {
            opacity: 0;
          }
          0% {
            -ms-animation-timing-function: ease-in;
          }
          8% {
            -ms-transform: scale(1.05);
            -ms-animation-timing-function: ease-out;
          }
          17% {
            -ms-transform: scale(1.1);
          }
          22% {
            -webkit-transform: scale(1.1) translateY(-20%);
          }
          25% {
            -ms-transform: scale(1.1) translateY(-100%);
          }
          }@keyframes imageAnimation {
            0% {
              opacity: 0;
              animation-timing-function: ease-in;
            }
            8% {
              opacity: 1;
              transform: scale(1.05);
              animation-timing-function: ease-out;
            }
            17% {
              opacity: 1;
              transform: scale(1.1);
            }
            22% {
              opacity: 0;
              -webkit-transform: scale(1.1) translateY(-20%);
            }
            25% {
              opacity: 0;
              -transform: scale(1.1) translateY(-100%);
            }
            100% {
              opacity: 0;
            }
            }.no-cssanimations .bg-slideshow li span {
              opacity: 1;
            }

            .bg-slideshow li{
              list-style:none !important;
            }


            .div_tipe_btn{

            }


            /* AVISO IMPORTANTE */
            .btn_b-index {
              height: auto;
              text-align: center;
              padding: 5px;
            }
            .btn_b-index_azulblack {
              background: rgb(19, 49, 80);

            }


            .btn_b-5bk {

              color: #fff;
              height: 70px;
              min-width: 240px;
              line-height: 24px;
              font-size: 12px;
              overflow: hidden;
              margin-bottom: 15px;
              -webkit-backface-visibility: hidden;
              -moz-backface-visibility: hidden;
              backface-visibility: hidden;
            }

            .btn_b-5bk:active {
              background: #fff;
              top: 2px;
              opacity: 0.3;
            }

            .btn_b-5bk span {
              display: inline-block;
              width: 100%;
              height: 100%;
              -webkit-transition: all 0.3s;
              -webkit-backface-visibility: hidden;
              -moz-transition: all 0.3s;
              -moz-backface-visibility: hidden;
              transition: all 0.3s;
              backface-visibility: hidden;
            }

            .btn_b-5bk:before {
              position: absolute;
              height: 100%;
              width: 100%;
              line-height: 2.5;
              font-size: 180%;
              -webkit-transition: all 0.3s;
              -moz-transition: all 0.3s;
              transition: all 0.3s;
            }

            .btn_b-5bk:active:before {
              color: #fff;
              opacity: 0.3;
            }
            /**/
            .div_herramientas{
              background-color: #133449;
              width: 100%;
            }
            .div_herramientas a{
              color: #FFFFFF !important;
              text-decoration:none !important;
            }

            .div_herramientas .span_normal{
              font-weight:normal !important;
            }
            .div_herramientas .span_titulo{
              /* font-weight:bold !important; */
            }

            .div_herramientas_turquesa{
              font-size: 1.1em;
              border-radius: 14px;
              background-color: #3FA535;
              width: 100%;
              color: #FFFFFF;
              cursor: pointer;
              padding: 0px !important;
              text-align: center;
              vertical-align: middle;
              margin-bottom: 15px;
              height: 90px;
              display: flex;
              justify-content: center;
              align-items: center;
            }

            .div_herramientas_amarillo{
              font-size: 1.1em;
              border-radius: 14px;
              background-color: #F6CA30;
              width: 100%;
              color: #FFFFFF;
              cursor: pointer;
              padding: 0px !important;
              text-align: center;
              vertical-align: middle;
              margin-bottom: 15px;
              height: 90px;
              display: flex;
              justify-content: center;
              align-items: center;
            }
            .dv_img_{
              right: 15px;

            }
            .dv_txt_{

            }

            .div_herramientas_naranja{
              font-size: 1.1em;
              border-radius: 14px;
              background-color: #FF9800;
              width: 100%;
              color: #FFFFFF;
              cursor: pointer;
              padding: 0px !important;
              text-align: center;
              vertical-align: middle;
              margin-bottom: 15px;
              height: 90px;
              display: flex;
              justify-content: center;
              align-items: center;
            }


            .div_herramientas_azul{
              font-size: 1.1em;
              border-radius: 14px;
              background-color: #0277BD;
              width: 100%;
              color: #FFFFFF;
              cursor: pointer;
              padding: 0px !important;
              text-align: center;
              vertical-align: middle;
              margin-bottom: 15px;
              height: 90px;
              display: flex;
              justify-content: center;
              align-items: center;
            }

            .div_herramientas_rojo{
              font-size: 1.1em;
              border-radius: 14px;
              background-color: #F44336;
              width: 100%;
              color: #FFFFFF;
              cursor: pointer;
              padding: 0px !important;
              text-align: center;
              vertical-align: middle;
              margin-bottom: 15px;
              height: 90px;
              display: flex;
              justify-content: center;
              align-items: center;
            }


            .div_noticias{
              background-color: #FFFFFF;
              width: 100%;
              padding-top: 20px;
            }
            .txt_white{
              color: #FFFFFF !important;
              padding-top: -40px !important;

            }


            .img_icon{
            height: 50px;
            max-width:none !important;
            /*opacity: 0.4;*/
            }

            .ms-list-text{
              color: #FFFFFF;
            }
            .ms-list-text:hover{
              color: #00BAD1;
            }

            .div_aviso_importante{
              background-color: #133150;
              color: #FFFFFF;
              border: 1px solid #FFFFFF;
              font-size: 12px;
              /*padding: 15px;*/
              padding-left: 5px;
              padding-right: 5px;
              padding-top: 10px;
              padding-bottom: 10px;
              height: 70px;
              text-align: center;
            }
            /* ADVISE 1*/

  .advise1-panel{
      font-family: Roboto, Noto Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
      border-radius: 14px;
      background: rgba(255, 255, 255, 0.8);
      padding-bottom:15px !important;
      border: 0px;
      padding: 10px;
      box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);
  }
  .advise1-panel .advise1-header{
      border-radius: 7px;
      background: rgba(237, 141, 0, 0.8);
  }
  .advise1-panel .advise1-header h3{
      color: #fff;
      font-size: 3.3vh;
      font-weight: 400;
      margin: 0px;
  }
  .advise1-panel .advise1-header h3 span.badge{
      background: rgba(255, 255, 255, 0.8);
      font-size: 2vh;
      font-weight: 400;
      margin: 0 10px 0 0;
  }
  .advise1-panel .advise1-header h3 span.badge i{
      color: #e58800;
      font-size: 2vh;
      font-weight: 400;
      margin: 10px;
  }
  .advise1-panel .advise1-body {
      border-radius: 7px;
      background: rgba(237, 141, 0, 0.8);
      margin-top: 10px;
      padding: 5px 0 0 0;
  }
  .advise1-panel .advise1-body p {
      color: #fff;
      font-size: 1.9vh;
      font-weight: 400;
      text-align: center;
  }
  .advise1-panel .advise1-body .alert1-box a{
      background: rgba(2, 119, 189, 0.8);
      margin:5px;
      border-radius: 7px;
      border: 0;
  }
  .advise1-panel .advise1-body .alert1-box a:hover{
      background: rgba(0, 100, 160, 0.8);
  }
  .advise1-panel .advise1-body .alert1-box a h4{
      color: #fff;
      font-size: 1.6vh;
      font-weight: 400;
  }
  .fiel_estilo_idxfieldset_sismo {
    border:1px double white;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    font-family: Verdana, Geneva, sans-serif;
  background-color: rgba(237, 141, 0, 0.9);
  }


  .fiel_estilo_idxfieldset {
    border:1px double white;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    font-family: Verdana, Geneva, sans-serif;

  }
  .fiel_estilo_idxlegend {
    width:auto;
    text-align:left;
    font-weight:bold;
    font-size:14pt;
    color:white;
  }

            </style>

            <ul class="bg-slideshow ">
              <li><span class="grises">Image 01</span></li>
              <li><span class="grises">Image 02</span></li>
              <li><span class="grises">Image 03</span></li>
              <li><span class="grises">Image 04</span></li>
              <li><span class="grises">Image 05</span></li>
              <li><span class="grises">Image 06</span></li>
            </ul>

            <!--  -->
            <div  class="ms-hero ms-hero-material grises">
              <span  class="ms-hero-bg"></span>
              <div style=""  class="container">

                <div  class="row">
                  <fieldset class="fiel_estilo_idxfieldset">
                    <legend class="fiel_estilo_idxlegend">Estadísticas e indicadores</legend>

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                      <a type="button" id="modal_estadis_const1OUT" href="<?php echo site_url('Estadistica/estad_indi_generales'); ?>"><!--  -->
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_naranja grises">
                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                            <img src="<?php echo base_url('assets/img/bar_chart.svg'); ?>" alt="..." class="img_icon" />
                          </div>
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                            <span class="span_titulo">Estadística por estado, municipio y zona</span>
                          </div>
                        </div>
                      </a>
                    </div>

                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="<?php echo site_url('Escuela/busqueda_xlista'); ?>">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_naranja grises">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/school.svg'); ?>" alt="..." class=" img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span class="span_titulo">Estadística por escuela</span>
                        </div>
                    </div>
                    </a>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="<?php echo site_url('Escuela/busqueda_xmapa'); ?>">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_naranja grises">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/map_marker.svg'); ?>" alt="..." class=" img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span class="span_titulo">Localiza tu escuela en el mapa</span>
                        </div>
                    </div>
                    </a>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="<?php echo site_url('Estadistica/riesgo_abandono'); ?>">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_rojo grises">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/traffic-lights.svg'); ?>" alt="..." class="img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span class="span_titulo">Riesgo de abandono</span>
                        </div>
                    </div>
                    </a>
                  </div>
                </fieldset>
                </div>

                <div   class="row">
                  <fieldset class="fiel_estilo_idxfieldset">
                    <legend class="fiel_estilo_idxlegend">Servicios</legend>

                    <!-- http://localhost/escuelapoblana/index.php/PortafolioUnico -->

                 <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a type="button" href="<?php echo site_url('PortafolioUnico'); ?>">
                    <!-- <a type="button" href="#" id="btn_spd1"> -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  div_herramientas_turquesa grises" id="spd_id">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/briefcase.svg'); ?>" alt="..." class="img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span  class="span_titulo">Portafolio Único de Información Escolar</span>
                        </div>
                    </div>
                    </a>
                  </div>


                  <div  class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="http://www.dsate.mx/" target="_blank">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_turquesa grises">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/certificate.svg'); ?>" alt="..." class=" img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span class="span_titulo">Oferta de formación continua</span>
                        </div>
                    </div>
                    <!-- </a> -->
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="http://sep.puebla.gob.mx/2019-02-19-17-24-35/servicio-profesional-docente" target="_blank">
                    <!-- <a type="button" href="#" id="btn_spd1"> -->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_turquesa grises" id="spd_id">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/open-book.svg'); ?>" alt="..." class="img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span  class="span_titulo">Servicio Profesional Docente</span>
                        </div>
                    </div>
                    </a>
                  </div>

                   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="<?php echo site_url('supervision/index'); ?>">
                    <div style="" class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_turquesa grises">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/woman-going-to-work.svg'); ?>" alt="..." class="img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span  class="span_titulo">Supervisión</span>
                        </div>
                    </div>
                    </a>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <a href="<?php echo site_url('EscuelasParticulares/index'); ?>">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 div_herramientas_turquesa grises">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                          <img src="<?php echo base_url('assets/img/mountain.svg'); ?>" alt="..." class="img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <span class="span_titulo">Escuelas  particulares</span>
                        </div>
                    </div>
                    </a>
                  </div>


                </fieldset>
                </div>


                <div class="row">
                <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-6">

                  <fieldset class="fiel_estilo_idxfieldset">
                    <legend class="fiel_estilo_idxlegend">Otros</legend>

                    <!-- http://localhost/escuelapoblana/index.php/PortafolioUnico -->

                  <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a type="button" href="<?php// echo site_url('PortafolioUnico'); ?>"> -->
                    <!-- <a type="button" href="#" id="btn_spd1"> -->
                   <!--  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 div_herramientas_amarillo grises" id="spd_id">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                          <img src="<?php// echo base_url('assets/img/briefcase.svg'); ?>" alt="..." class="img_icon" />
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                        <span  class="span_titulo">Portafolio Único de Formatos</span>
                        </div>
                    </div>
                    </a>
                  </div>
 -->

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <a href="http://sisep.puebla.gob.mx/sicepconsulta/" target="_blank">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 div_herramientas_amarillo grises">
                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                            <img src="<?php echo base_url('assets/img/medal.svg'); ?>" alt="..." class="img_icon" />
                          </div>
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
                          <span class="span_titulo">Consulta calificaciones y certificados</span>
                          </div>
                      </div>
                      </a>
                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <!-- <a type="button" href="#" id="btn_calendarios1"> -->
                    <a href="https://www.gob.mx/sep?tab=Calendario%20escolar%202019-2020" target="_blank">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 div_herramientas_amarillo grises">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
                          <img src="<?php echo base_url('assets/img/calendar.svg'); ?>" alt="..." class=" img_icon" />
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                        <span class="span_titulo">Calendario escolar</span>
                        </div>
                    </div>
                    </a>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <a type="button" href="<?php echo site_url('AlertaGenero/index'); ?>">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 div_herramientas_amarillo grises">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                          <img src="<?php echo base_url('assets/img/alerta-genero-1.png'); ?>" alt="..." class=" img_icon" />
                        </center>
                      </div>
                      <!-- <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 "> -->
                      <!-- <span class="span_titulo">Alerta de género</span> -->
                      <!-- </div> -->
                  </div>
                  </a>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <a type="button" href="#" id="btn_alert_aviso">
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 div_herramientas_amarillo grises">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <span class="span_titulo">Semana Estatal de la Evaluación Diagnóstica Educación Básica y Media Superior</span>
                      </div>
                  </div>
                  </a>
                </div>

                  </fieldset>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                  <fieldset class="fiel_estilo_idxfieldset">
                    <legend class="fiel_estilo_idxlegend">Sección de novedades educativas</legend>

                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <center>
                      <div class="fb-page" data-href="https://www.facebook.com/SEPGobPue/" data-tabs="timeline" hide_cover="true" small_header="true" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/sep.puebla/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sep.puebla/">Secretaría de Educación Pública del Estado de Puebla</a></blockquote></div>
                      <!-- <div class="fb-page" data-href="https://www.facebook.com/Escuela-Poblana-105983586839543/" data-tabs="timeline" hide_cover="true" small_header="true" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"> -->

                  </div>
                </center>
                    <br>
                    <br>

                  </div>


                </fieldset>
                </div>
                </div>

              </div>
            </div><!--- ms-hero ms-hero-material -->
  <!-- <div id="fb-root"></div> -->
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=150246222139156&autoLogAppEvents=1';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>


    <!--         <script>

              $("#modal_aviso_elect").modal("show");
              $("#spd_id").click(function(e){
                e.preventDefault();
                $("#modal_aviso_elect").modal("show");
              });
              $("#modal_spd").click(function(e){
                e.preventDefault();
                $("#modal_aviso_elect").modal("show");
              });

              </script> -->
