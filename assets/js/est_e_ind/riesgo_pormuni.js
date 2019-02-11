/** Funciones para cargar municipios y ciclos escolares. **/

$(function() {
      console.info( "ready!" );


      document.title = 'Riesgo de abandono escolar';
      obj_message = new Message();
      obj_riesgo = new riesgo_muni();

      $("#le_modal").modal("show");

      obj_riesgo.getMunicipios();




});

$("#le_modal_btncancelar_1").click(function(e){
  e.preventDefault();
  window.location=base_url;
});

$("#le_modal_busqueda_btnsalir").click(function(e){
  e.preventDefault();
  window.location=base_url;
});


$("#le_btn_rebuscar").click(function(e){

      clearModal();
      swal.close();
      $("#le_modal").modal("show");
});

function clearModal(){

            $("#Municipios").prop({"disabled":false, "value":"0"});
            $('#nivelmunicipios').prop({"disabled":false, "value":"0"});
            $('#bimestremuni').prop({"disabled":false, "value":"0"});
            $('#modalidadmuni').prop({"disabled":false, "value":"0"});
            $('#ciclo').prop({"disabled":false, "value":"0"});


      }



  $("#close_destin").click(function(e){
  e.preventDefault();
  window.location="index.php";
});
$("#le_modal_btncancelar_2").click(function(e){
  e.preventDefault();
  window.location="index.php";
});


$("document").ready(function(){


      $("#LE_busqueda_tipo_1").show();


      $('tr.hide-ini').hide();

      //$("#Municipios").load( "app/controllers/est_indica/municipios.php" );

      $("#Municipios").change(function(){
            var municipioid =  $("#Municipios").val();
            $('#div_nivel').css("display","");

      });

      $("#nivelmunicipios").change(function(){
            var municipioid = $("#Municipios").val();
            var nivelmuni   = $("#nivelmunicipios").val();
            var modalidad   = $("#modalidadmuni").val();


            if(nivelmuni=='TODOS')
            {
                  $('#div_ciclo').css("display","");


                  $("#modalidadmuni").prop({"disabled":true, "value":""});
                  $("#bimestremuni").prop({"disabled":true, "value":""});
                  $("#modamuni").css({"text-decoration":"line-through", "text-decoration-color":"red"});
                  $("#bimestremuni").css({"text-decoration":"line-through", "text-decoration-color":"red"});
            }
            else
            {
                  $('#div_bimestre').css("display","");


                  $("#bimestremuni").prop("disabled", false);
                  $("#modalidadmuni").prop("disabled", false);
                  $("#modamuni").css({"text-decoration":"none", "text-decoration-color":"black"});
                  $("#bimestremuni").css({"text-decoration":"none", "text-decoration-color":"black"});
            }
      });

      $("#bimestremuni").change(function(){
            var municipioid = $("#Municipios").val();
            var nivelmuni   = $("#nivelmunicipios").val();
            var bimestre   = $("#bimestremuni").val();
            $('#div_ciclo').css("display","");



      });

      $("#modalidadmuni").change(function(){
            var nivelmuni = $("#nivelmunicipios").val();

            $('#div_ciclo').css("display","");


      });

      obj_message = new Message();





      //---------------------------------------------------------------------------
      //------------- Llenado de tabla estadistica estado/municipio ---------------
      //---------------------------------------------------------------------------
      $("#LE_modal_btnbuscar_1").click(function(){

        var municipio = $("#Municipios").val();
        var nivel = $("#nivelmunicipios").val();
        var bimestre  = $("#bimestremuni").val();
        var ce    = $("#ciclo").val();

        if (nivel=='0') {
          obj_message.notification("","Seleccione un nivel educativo","error");
        }
        else if (bimestre=='0') {
          obj_message.notification("","Seleccione un bimestre del ciclo escolar","error");
        }
        else if (ce=='0') {
          obj_message.notification("","Seleccione un ciclo escolar","error");
        }
        else {

          if (ce=='2017 - 2018' && (bimestre=='4'|| bimestre=='5')) {
            obj_message.notification("","Periodo seleccionado aun no disponible","error");
          }
          else{
            $("#le_modal").modal('hide');
            $("#excel").css("display","");

            $('tr.hide-ini').hide();


            $("#LE_resultados_busqueda").text(
                  "Estado/Municipio: "+$("#Municipios option:selected").text()+
                  ",  Nivel: "+nivel+
                  ",  Bimestre: "+bimestre+
                  ",  Ciclo Escolar: "+ce);


                  var ruta = base_url+"RiesgoxMuni/get_all";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'param_muni':municipio, 'param_nvl':nivel, 'param_bim':bimestre, 'param_ce':ce},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var result = data;
              var html = result.html;
              var arr_graficas = result.array_graficas;

              $("#contenedor_tablas").html(html);

            var graf = new HaceGraficas(arr_graficas);
            //console.info(arr_graficas);
            switch(nivel) {
            case "PRIMARIA":
                    graf.TablaPieGraficaBarPrimaria();
            break;
            case "SECUNDARIA":
                    graf.TablaPieGraficaBarSecundaria();
            break;

            }

            graf.TablaPieGraficaPie();



              // obj_escuela.infoEscuela(html);
              swal.close();
          })
          .fail(function(e) {
              console.error("Error in riesgo"); console.table(e);
          });
          }


        }








      });








});

function riesgo_muni(){
    tmp_EL = this;


    this.getMunicipios = function(){
          var ruta = base_url+"Municipio/get_all";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'municipio'},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;

            $("#Municipios").empty();
            $("#Municipios").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getMunicipios()"); console.table(e);
          });
    }// getMunicipios()

  }// riesgo_muni
