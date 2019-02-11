<link href="<?php echo base_url('assets/css/supervisores.css'); ?>" rel="stylesheet" media="screen">

    <div id="wrapper_contents grises">
      <div class="contents">
        <div class="top"><!-- Dibuja la parte superior del cuadro de contenido --></div>
        <div class="middle" style="height:900px">
            <!-- Aqui va nuestro contenido -->
            <div style="width:auto; height:260px; background-color:#E6E6E6; padding-top:1px; border-top-left-radius: 1em; border-top-right-radius: 1em;">
              <!-- <center><h1 style=" font-family:'trebuchet MS', 'Open Sans', sans-serif, 'Times New Romgia; font-size:32pt">Escuela Poblana</h1></center> -->
              <center><div style="font-family:'trebuchet MS', Arial;; font-size:16pt"><b><h2>SUPERVISIÓN ESCOLAR</h2></b></div></center>

              <div style="font-family:'trebuchet MS', Arial;; font-size:12pt"><b>La supervisión escolar es un componente de vital importancia para la implementación del Modelo Educativo Poblano: es la instancia sobre la que descansa el reto de lograr que las escuelas cumplan con los objetivos de atender a todos los niños y jóvenes; crear las condiciones para que concluyan al menos la educación media superior; y asegurar que todos ellos adquieran al menos las competencias básicas que establecen los planes y programas.</div><br>
              <div style="font-family:'trebuchet MS', Arial;; font-size:12pt"><b>Con la finalidad de apoyar el desempeño y fortalecimiento de las y los Supervisores Escolares, se ha creado este espacio en el cual podrán encontrar información sobre los siguientes temas, a los cuales también pueden tener acceso desde su celular por medio de la aplicación gratuita “Escuela Poblana” para Android (en Google Play) y para IPhone (en App Store).</div>
            </div>

            <div class="grises" id="btn0_eps"><p><center id="titulo_btn0s">Guía para supervisores</p>
              <img style="width:30%" src="<?php echo base_url('assets/img/portadaguiasuperv.jpg'); ?>" alt="">
              </center>
            </div>
            <div class="menueps">

              <div  class="grises"  id="btn1_eps"><p><center id="titulo_btn1s">Consejos técnicos escolares (CTE)</center></p></div>
              <div  class="grises" id="btn2_eps"><p><center id="titulo_btn2s">Programas federales</center></p></div>
              <br>
              <div  class="grises" id="btn3_eps"><p><center id="titulo_btn3s">Trayecto formativo para supervisores escolares</center></p></div>
              <div  class="grises" id="btn4_eps"><p><center id="titulo_btn4s">Bibliografía sobre "La supervisión escolar en el mundo"</center></p></div>

             <!--  <div id="btn4_ep"><p id="titulo_btn4">Contacto</p></div> -->
            </div>






        </div>
        <div class="bottom"><!-- Dibuja la parte inferior del cuadro de contenido --></div>
      </div><!-- End contents -->
    </div>

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

        <!-- Global site tag (gtag.js) - Google Analytics -->

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112793645-1');
</script>

            <script type="text/javascript">
      jQuery(document).ready(function() {


        $("#btn0_eps").click(function(e){
                            e.preventDefault();
                            var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/guias/ManSupervisores.pdf" width="100%" height="500" style="border: none;"></iframe>';
                            $('#RA_modal_visorpdf .modal-body').empty();
                                $('#RA_modal_visorpdf .modal-body').html(dom);

                                $('#RA_modal_visorpdf').modal("show");
                          });

        $("#btn1_eps").click(function(){
          window.location=base_url+'supervision/consejos_tecnicos_escolares';
        });

        $("#btn2_eps").click(function(){
          window.location=base_url+'supervision/programas_federales';
        });

        $("#btn3_eps").click(function(){
          window.location=base_url+'supervision/trayecto_formativo';
        });

        $("#btn4_eps").click(function(){


          window.location=base_url+"supervision/supervision_en_el_mundo";
          // class='fancybox fancybox.iframe';

        });





        $("#btn1_eps").hover(function(){
            $(this).css({ transform:'scale(1.1,1.1)'});
            $("#btn2_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn3_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn4_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            }, function(){
            $("#btn2_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn3_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn4_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $(this).css({ transform:'scale(1,1)'});
        });

        $("#btn2_eps").hover(function(){
            $(this).css({ transform:'scale(1.1,1.1)'});
            $("#btn1_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn3_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn4_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            }, function(){
            $("#btn1_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn3_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn4_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $(this).css({ transform:'scale(1,1)'});
        });

        $("#btn3_eps").hover(function(){
            $(this).css({ transform:'scale(1.1,1.1)'});
            $("#btn1_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn2_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn4_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            }, function(){
            $("#btn1_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn2_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn4_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $(this).css({ transform:'scale(1,1)'});
        });

        $("#btn4_eps").hover(function(){
            $(this).css({ transform:'scale(1.1,1.1)'});
            $("#btn1_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn2_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            $("#btn3_eps").css({ opacity: '0.6', transform:'scale(.8,.8)'});
            }, function(){
            $("#btn1_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn2_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $("#btn3_eps").css({ opacity: '1', transform:'scale(1,1)'});
            $(this).css({ transform:'scale(1,1)'});
        });

      })

    </script>
