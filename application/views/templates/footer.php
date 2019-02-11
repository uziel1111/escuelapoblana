<style>
.footer_div_gray{
  margin-top: 0px;
  background-color: #1C2545;
  width: 100%;
  /*position: absolute;*/
  /*bottom: 50px;*/
  border-top: 1px solid #999999;
  -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3),0 0 40px rgba(0, 0, 0, 0.1) inset;
  -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
  box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}

.footer_div_blue{
  background-color: #0378BD;
  width: 100%;
  height: 50px;
  padding: 15px;
  text-align: center;
  font-weight: normal;
  position: absolute;
  /*bottom: 0;*/
  color: #FFFFFF;
}

.footer_img{
  height: auto !important;
}
</style>

<footer>
  <div class="footer_div_gray grises">
    <div class="container">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="color:white;">
        <center>
        <h3 style="font-size:1.9vw;">Sentlamachtilistli Tlayekanko</h3>
        <h4 style="font-size:1.3vw;">Secretaría de Educación Pública de Puebla</h4>
          <p style="font-size:1.1vw;">
              Calle Jesús Reyes Heroles S/N entre 35 y 37 Norte
              Col. Nueva Aurora
              Puebla, Pue.
            </p>
      </center>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <center>

      </center>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <center>
          <a href="http://www.sep.pue.gob.mx/" target="_blank">
        <!-- <img src="<?php echo base_url('assets/img/sep_pueblablue.png'); ?>" alt="..." class="img-responsive footer_img"> -->
      </a>
      </center>
      </div>
    </div>
  </div>

  <div class="footer_div_blue grises">
    Algunos derechos reservados © escuelapoblana.org 2019
  </div>
</footer>


<div id="modal_visor_calendarios" class="modal fade modal100 grises" role="dialog" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header modal_head">
            <span id="modal_visor_calendarios_title" class="modal-title"></span>
            <button type="button"  id="" class="close bold_white "  aria-label="Close"  data-dismiss="modal">
              X
            </button>
          </div>
          <div class="modal-body"></div>
        </div>
    </div>
</div>

<!-- Desde el modal de info, en la sección de Por Unidades de Análisis -->
<div id="modal_visor_reactivos" class="modal fade modal100 grises" role="dialog" data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header modal_head">
            <span class="modal-title" id="modal_reactivos_title"></span>
            <button type="button"  id="btn_reactivos_close" class="close  bold_white "  aria-label="Close">
              X
            </button>
          </div>
          <div class="modal-body">
            <center style="fontSize:24px;">

              <!-- <label id="lbl_unidad_de_analisis"></label></p> -->
           </center>

            <div id="div_reactivos"></div>
          </div>
        </div>
    </div>
</div>


<script>
  var path_home = "escuelapoblana.org/escuelapoblana_pdfs/"
  $("#cal1718_195").click(function(e){
              e.preventDefault();
              $("#modal_visor_calendarios_title").empty();
              $("#modal_visor_calendarios_title").html("195 días 2017-2018 ");
              pdf = path_home+"calendarios/2017-2018_calendario_195_dias.pdf";
              muestraPDF(pdf);
  });

  $("#cal1718_185").click(function(e){
              e.preventDefault();
              $("#modal_visor_calendarios_title").empty();
              $("#modal_visor_calendarios_title").html("185 días 2017-2018 ");
              pdf = path_home+"calendarios/2017-2018_calendario_185_dias.pdf";
              muestraPDF(pdf);
  });

  function muestraPDF(pdf){
              var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
              $('#modal_visor_calendarios .modal-body').empty();
              $('#modal_visor_calendarios .modal-body').html(dom);

              $('#modal_visor_calendarios').modal("show");
  }// muestraPDF()

  $("#btn_reactivos_close").click(function(e){
    e.preventDefault();
    $('#modal_visor_reactivos .modal-body #div_reactivos').empty();
    $("#modal_visor_reactivos").modal("hide");

    $('#le_modal_infoescuela').addClass("scroll_modal");


  });



</script>

</body>
</html>
