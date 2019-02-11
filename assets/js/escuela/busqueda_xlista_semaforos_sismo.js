$(function() {
      console.info( "ready!" );

      $("#LE_busqueda_tipo_2").hide();
      $("#LE_busqueda_tipo_1").hide();

      $("#LE_panel2_cctTurno").hide();
      $("#LE_panel2_botones").hide();


      document.title = 'Catálogo de escuelas';
      obj_message = new Message();
      obj_escuela = new EscuelaLista();
    $("#le_modal").modal("show");
      obj_escuela.getMunicipios();
      obj_escuela.getNivelesMunicipio(1); // cuando entramos el primer index de municipios es ACAJETE con id_municipio 1, por eso buscamos sus niveles
      obj_escuela.getSostenimiento(1, 0);
});

$('#LA_tipo_busqueda input[type=radio]').change(function(){
      switch($(this).val()) {
            case 'LE_busqueda_tipo_1' :
                $("#LE_busqueda_tipo_1").show();
                $("#LE_busqueda_tipo_2").hide();
            break;
            case 'LE_busqueda_tipo_2' :
                $("#LE_busqueda_tipo_1").hide();
                $("#LE_busqueda_tipo_2").show();
            break;
      }//  switch
  });

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    var position=600;
    if (scroll > position) {
      $("#btn_topscll").css("visibility","visible");
    } else {
      $("#btn_topscll").css("visibility","hidden");
    }

  });

$("#le_modal_btncancelar_1").click(function(e){
  e.preventDefault();
  window.location=base_url;
});

$("#le_modal_busqueda_btnsalir").click(function(e){
  e.preventDefault();
  window.location=base_url;
});



$("#le_modal_btncancelar_2").click(function(e){
  e.preventDefault();
  window.location=base_url;
});


$("#le_text_CCT").keyup(function() {
  $("#le_text_CCT").css({ 'text-transform':'uppercase' });
});



$("#le_select_nivel").change(function(){
      var id_municipio = $("#le_select_idmunicipio").val();
      var id_nivel   = $("#le_select_nivel").val();
      obj_escuela.getSostenimiento(id_municipio, id_nivel);
});

$("#le_btn_rebuscar").click(function(e){
  e.preventDefault();
  $("#LE_resultados_busqueda").text("");
  obj_escuela.clearTable();
  obj_escuela.getMunicipios();
  obj_escuela.getNivelesMunicipio(1);
  obj_escuela.getSostenimiento(1,0);
});

$("#LE_modal_btnbuscar_1").click(function(e){
  e.preventDefault();
  obj_escuela.getEscuelas_1();
});



$( "#le_text_CCT" ).keyup(function() {
  obj_escuela.validaCCT();
});

$("#LE_modal_btnbuscar_2").click(function(e){
  e.preventDefault();
  obj_escuela.getEscuelas_1_una();
  //obj_escuela.getEscuelasCCT();
});

$("#le_select_idmunicipio").change(function(){
      var id_municipio =  $("#le_select_idmunicipio").val();
      obj_escuela.getNivelesMunicipio(id_municipio);
});


$("#LE_btn_buscar").click(function(e){
    e.preventDefault();
      var txt_buscar = ($("#le_txt_buscadorAvanzado").val()).toUpperCase();
      $("#le_txt_buscadorAvanzado").val("");
      obj_escuela.buscarenGrid(txt_buscar);
});




$("#le_modal_infoescuela_btn_salir").click(function(e){
  e.preventDefault();
  obj_escuela.clearModal("le_modal");
  obj_escuela.clearModalInfo("le_modal_infoescuela");
});


$("#LE_btn_importante").click(function(e){
  e.preventDefault();
  obj_message.notification("","LAS ESCUELAS QUE APARECEN EN COLOR ROJO SON DE ALTA DEMANDA","info");
});








function EscuelaLista(){
    tmp_EL = this;
    tmp_EL.id_escuela = 0;

    tmp_EL.id_municipioGlobal     = 0;
    tmp_EL.id_nivelGlobal         = 0;
    tmp_EL.id_sostenimientoGlobal = 0;
    tmp_EL.nombreescuelaGlobal    = "";

    this.getMunicipios = function(){
          var ruta = base_url+"Municipio/get_solomuni";
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
            $("#le_totalRegistros").empty();
            $("#le_text_escuela").empty();
            $("#le_text_CCT").empty();
            $("#le_select_idmunicipio").empty();
            $("#le_select_idmunicipio").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getMunicipios()"); console.table(e);
          });
    }// getMunicipios()

    this.getNivelesMunicipio = function(id_municipio){
          var ruta = base_url+"nivel/getNiveles";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'nivel', 'id_municipio':id_municipio},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            var html =data;
            $("#le_select_nivel").empty();
            $("#le_select_nivel").append(html.result);
            swal.close();
          })
          .fail(function(e) {
            console.error("Error in getNivelesMunicipio()"); console.table(e);
          });
    }// getNivelesMunicipio()

    this.getSostenimiento = function(id_municipio, id_nivel){
            var ruta = base_url+"sostenimiento/get_xmunicipio_xnivel";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'sostenimiento','id_municipio':id_municipio, 'id_nivel':id_nivel},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#le_select_sostenimiento").empty();
              $("#le_select_sostenimiento").append(html.result); // añadimos a la tabla
              swal.close();
              $("#le_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getNiveles()"); console.table(e);
            });
    }// getSostenimiento()


    this.getEscuelas_1 = function(){
      var id_municipio     =  $("#le_select_idmunicipio").val();
      var nombre_municipio =  $("#le_select_idmunicipio option:selected").text();
      var id_nivel         =  $("#le_select_nivel").val();
      var nombre_nivel     =  $("#le_select_nivel option:selected").text();
      var sostenimiento    =  $("#le_select_sostenimiento").val();
      var nombre_escuela   =  $("#le_text_escuela").val();

      id_municipio_global = id_municipio;
      id_nivel_global = id_nivel;
      sostenimiento_global = sostenimiento;
      nombre_escuela_global = nombre_escuela;

      $("#LE_id_municipio").val(id_municipio_global);
      $("#LE_id_nivel").val(id_nivel_global);
      $("#LE_sostenimiento").val(sostenimiento_global);
      $("#LE_clave").val(nombre_escuela_global);


      var escuela          = (nombre_escuela.trim().length>0)?nombre_escuela:"No especificado";
      $("#LE_resultados_busqueda").text("Municipio: "+nombre_municipio+",  Nivel: "+nombre_nivel+",  Sostenimiento: "+sostenimiento+",  Escuela: "+escuela);

      var ruta = base_url+"escuela_sismo/getEscuelas_sismo";
      $.ajax({
        url: ruta,
        method: 'POST',
        data: {'action':'modal_escuela','id_municipio':id_municipio, 'id_nivel':id_nivel,'sostenimiento':sostenimiento, 'clave':nombre_escuela},
        beforeSend: function( xhr ) {
          obj_message.loading("Descargando datos");
        }
      })
      .done(function( data ) {
        var result = data;
        swal.close();
        var html = result.html;
        var total = result.total;
        var mensaje = result.mensaje;
        if( mensaje.trim().length==0 && mensaje==""){ // NO escribió cct y el servidor regresa vació el string de mensaje
              $("#le_tabla_listaEscuelas tbody").empty();
              if(html == '') { html = '<tr><td colspan="6">No se encontraron registros...</td></tr>'; }
              $("#le_totalRegistros").empty();
              $("#le_totalRegistros").text(result.total);
              $("#le_tabla_listaEscuelas tbody").append(html); // añadimos a la tabla
              swal.close();
              obj_escuela.clearModal("le_modal");
        }
      })
      .fail(function(e) {
        console.error("Error in getNiveles()"); console.table(e);
      });
    }// getEscuelas_1()

    this.getEscuelas_1_una = function(){

        var id_municipio     =  15;
        var nombre_municipio =  'ACAJETE';
        var id_nivel         =  4;
        var nombre_nivel     =  'PREESCOLAR';
        var sostenimiento    =  0;
        var nombre_escuela   =  '';
        var cct   = $("#le_text_CCT").val(); ;

        id_municipio_global = id_municipio;
        id_nivel_global = id_nivel;
        sostenimiento_global = sostenimiento;
        nombre_escuela_global = nombre_escuela;

        $("#LE_id_municipio").val(id_municipio_global);
        $("#LE_id_nivel").val(id_nivel_global);
        $("#LE_sostenimiento").val(sostenimiento_global);
        $("#LE_clave").val(nombre_escuela_global);


        var escuela          = (nombre_escuela.trim().length>0)?nombre_escuela:"No especificado";
        $("#LE_resultados_busqueda").text("Municipio: "+nombre_municipio+",  Nivel: "+nombre_nivel+",  Sostenimiento: "+sostenimiento+",  Escuela: "+escuela);

        var ruta = base_url+"escuela_sismo/getEscuelas_sismo_una";
        $.ajax({
          url: ruta,
          method: 'POST',
          data: {'action':'modal_escuela', 'cct':cct},
          beforeSend: function( xhr ) {
            obj_message.loading("Descargando datos");
          }
        })
        .done(function( data ) {
          var result = data;
          swal.close();
          var html = result.html;
          var total = result.total;
          var mensaje = result.mensaje;
          if( mensaje.trim().length==0 && mensaje==""){ // NO escribió cct y el servidor regresa vació el string de mensaje
                $("#le_tabla_listaEscuelas tbody").empty();
                if(html == '') { html = '<tr><td colspan="6">No se encontraron registros...</td></tr>'; }
                $("#le_totalRegistros").empty();
                $("#le_totalRegistros").text(result.total);
                $("#le_tabla_listaEscuelas tbody").append(html); // añadimos a la tabla
                swal.close();
                obj_escuela.clearModal("le_modal");
          }
        })
        .fail(function(e) {
          console.error("Error in getNiveles()"); console.table(e);
        });
    }// getEscuelas_1_una()

    this.validaCCT = function(){
        var cct =  $("#le_text_CCT").val();
        console.info("validaCCT()->cct: "+cct);
        if( cct.length == 8 ){
            if(RE_CCT(cct)){
              tmp_EL.getTurnoCCT(cct);
            }else{
              obj_message.notification("","La clave CT no cumple con el formato","error");
              $("#LE_panel2_cctTurno").hide();
              $("#LE_panel2_botones").hide();
            }
        }
    }// validaCCT()

    this.getTurnoCCT = function(cct){
      console.info("getTurnoCCT()");
      if(RE_CCT(cct)){
          // var ruta = "app/controllers/lista_escuelas.inicial.php";
          var ruta = base_url+"escuela/getTurno";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'turno','cct':cct},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
              swal.close();
              var html = data.html;
              $("#LE_cct_turno").empty();
              if(html == "no_hay_turnos"){
                obj_message.notification("","la clave CT no existe","error");
                $("#LE_panel2_cctTurno").hide();
                $("#LE_panel2_botones").hide();
              }else{
                $("#LE_cct_turno").append(html);
                $("#LE_panel2_cctTurno").show();
                $("#LE_panel2_botones").show();
              }



          })
          .fail(function(e) {
              console.error("Error in getTurnoCCT()"); console.table(e);
          });

      }else{
        $("#LE_panel2_cctTurno").hide();
        $("#LE_panel2_botones").hide();
      }
    }// getTurnoCCT()


    this.getEscuelasCCT = function(){
        var id_escuela =  $("#LE_cct_turno").val();
        obj_escuela.getInfoEscuela(id_escuela)
    }// getEscuelasCCT()


    this.buscarenGrid = function(valorabuscar){

        if(valorabuscar.trim().length==0){
            obj_message.notification("","Escriba parte del nombre de la escuela o la clave de centro de trabajo","error");
        }else{
              //////////////////////////////////
              var ruta = base_url+"escuela/buscagrid";
              $.ajax({
                url: ruta,
                method: 'POST',
                data: {'action':'buscagrid','valorabuscar':valorabuscar,
                            'id_municipio_global': id_municipio_global, 'id_nivel_global':id_nivel_global,
                            'sostenimiento_global': sostenimiento_global, 'nombre_escuela_global':nombre_escuela_global
                          },
                beforeSend: function( xhr ) {
                  obj_message.loading("Descargando datos");
                }
              })
              .done(function( data ) {
                    var result = data;
                    var html = result.html;
                    var mensaje = result.mensaje;
                    if( mensaje.trim().length!=0 && mensaje=="voy_diferente"){
                          $("#le_tabla_listaEscuelas tbody").empty(html);
                          if(html == '') { html = '<tr><td colspan="6">No se encontraron registros...</td></tr>'; }
                          $("#le_totalRegistros").empty();
                          $("#le_totalRegistros").text(result.total);
                          $("#le_tabla_listaEscuelas tbody").append(html); // añadimos a la tabla
                          swal.close();
                          obj_escuela.clearModal("le_modal");
                    }
              })
              .fail(function(e) {
                console.error("Error in buscarenGrid()"); console.table(e);
              });
              /////////////////////////////////
          }// else
      }// buscarenGrid()

      this.getInfoEscuela = function(id_escuela){
          tmp_EL.id_escuela = id_escuela;
          // tmp_EL.id_escuela = id_escuela;
          $("#le_modal_id_escuela").val(tmp_EL.id_escuela);
          // var ruta = "app/controllers/info_escuela.inc.php";
          var ruta = base_url+"escuela/info_escuela";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'id_escuela':id_escuela,'action':'busqueda_xlista'},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
              var result = data.respuesta;
              var html = result.html;
              var total = result.total;
              var mensaje = result.mensaje;
              var arr_graficas = result.array_graficas;
              var nivel_g = result.nivel;
              // console.info("arr_graficas");
              // console.table(arr_graficas);
              // console.info("Sólo preescolar");
              // console.info(arr_graficas['preescolar']);
              // console.info("Sólo primaria");
              // console.info(arr_graficas['primaria']);
              // return false;

              obj_escuela.concatena_dom(html, function(result){
                  if(result==1){
                      obj_escuela.hace_graficas(arr_graficas, nivel_g, function(result2){
                          if(result2==1){
                              obj_escuela.infoEscuela();
                          }
                      });
                  }
              });
              // obj_escuela.infoEscuela(html);
              swal.close();
          })
          .fail(function(e) {
              console.error("Error in getInfoEscuela()"); console.table(e);
          });
      }// getInfoEscuela()


      this.concatena_dom = function(html,callback){
            var aux = 1;
            $("#le_modal_infoescuela .modal-body").empty();
            $("#le_modal_infoescuela .modal-body").append(html); // añadimos a la tabla
            return callback(aux);
      }// concatena_dom()

    this.hace_graficas = function(arr_graficas, nivel_g, callback){
            var aux = 0;
            var graf = new HaceGraficas(arr_graficas);

            switch(nivel_g) {
            case "PREESCOLAR":
                    graf.GraficoEstadisticaPreescolar();
                    aux=1;
            break;
            case "PRIMARIA":
                    graf.GraficoEstadisticaPrimaria();
                    graf.TablaPieGraficaBarPrimaria();
                    aux=1;
            break;
            case "SECUNDARIA":
                    graf.GraficoEstadisticaSecundaria();
                    graf.TablaPieGraficaBarSecundaria();
                    aux=1;
            break;

            default:
                    graf.GraficoEstadisticaOtros();
                    aux=1;
            break;

            }

            graf.click_riesgo();

            graf.DibujarRadialProgressBarR();
            graf.DibujarRadialProgressBarA();
            graf.DibujarRadialProgressBarET();
            graf.PieDrilldownPlanea05y06();

            graf.TablaPieGraficaPie();
          // GraficoEstadisticaPreescolar(arr_graficas['preescolar']);
          return callback(aux);
    }// posicionaEnNivel()

      this.infoEscuela = function(){
            $("#le_modal_infoescuela").modal("show");
      }// infoEscuela()

      this.clearTable = function(){
          $("#le_tabla_listaEscuelas tbody").empty();
      }// clearTable()

      this.clearModalInfo = function(id_modal){
          $("#le_modal_infoescuela .modal-body").empty();
          $("#"+id_modal).modal("hide");
      }// clearModalInfo()

    this.clearModal = function(id_modal){
          $("#"+id_modal).modal("hide");
          $("#le_text_escuela").val("");
          $("#le_text_CCT").val("");
          $("#LE_cct_turno").empty(); // El select para los turnos
          $("#LE_panel2_cctTurno").hide(); // el div que contiene al select de turnos
      }// clearModal()


}// EscuelaLista



function tdclick(e, id_escuela){
        if (!e) var e = window.event;   // Get the window event
        e.cancelBubble = true;            // IE Stop propagation
        if (e.stopPropagation) e.stopPropagation();  // Other Broswers
        console.info('td clicked, id asociado: '+id_escuela);
        obj_escuela.getInfoEscuela(id_escuela);
};
