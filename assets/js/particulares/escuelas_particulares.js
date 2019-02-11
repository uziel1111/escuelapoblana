$(function() {
      console.info( "ready!" );
      document.title = 'Escuela particulares';
      obj_message = new Message();

      $("#EP_busqueda_tipo_1").hide();
      $("#EP_busqueda_tipo_2").hide();
      $("#EP_busqueda_tipo_3").hide();

      $("#EP_panel3_turno").hide();
      $("#EP_panel3_botones").hide();
      $("#div_particulares_opciones").show();
      $("#div_particulares_grid").hide();
      // $("#EP_aviso").modal("hide"); // comentar
      obj_escuelap = new Escuelasparticulares();
      obj_escuelap.getMunicipios();
      obj_escuelap.getNivelesMunicipio(1);


      id_municipio_global   = "";
      id_nivel_global       = "";
      nombre_escuela_global = "";
});

$("#EP_text_CCT").keyup(function() {
  $("#EP_text_CCT").css({ 'text-transform':'uppercase' });
});

$("#EP_modal_busqueda_btnsalir").click(function(e){
    e.preventDefault();
    obj_escuelap.clearModal("EP_modal_busqueda");
    $("#EP_modal_busqueda").modal("hide");
});

$("#EP_buscador").click(function(e){
  e.preventDefault();
  $("#EP_modal_busqueda").modal("show");
});

$("#EP_modal_busqueda_btncancelar_1").click(function(e){
  e.preventDefault();
  obj_escuelap.clearModal("EP_modal_busqueda");
  $("#EP_modal_busqueda").modal("hide");
});

$("#EP_modal_busqueda_btncancelar_2").click(function(e){
  e.preventDefault();
  obj_escuelap.clearModal("EP_modal_busqueda");
  $("#EP_modal_busqueda").modal("hide");
});

$("#EP_modal_busqueda_btncancelar_3").click(function(e){
  e.preventDefault();
  obj_escuelap.clearModal("EP_modal_busqueda");
  $("#EP_modal_busqueda").modal("hide");
});

$("#EP_modal_busqueda_btnbuscar_1").click(function(e){
  e.preventDefault();
  obj_escuelap.getParticulares_1();
});
$("#EP_modal_busqueda_btnbuscar_2").click(function(e){
  e.preventDefault();
  obj_escuelap.getParticulares_2();
});
$("#EP_modal_busqueda_btnbuscar_3").click(function(e){
  e.preventDefault();
  obj_escuelap.getParticulares_3();
});


$("#EP_btn_rebuscar").click(function(e){
  e.preventDefault();
  $("#LE_resultados_busqueda").text("");

  obj_escuelap.clearTable();
  obj_escuelap.getMunicipios();
  obj_escuelap.getNivelesMunicipio(1);


  $("#div_particulares_opciones").show();
  $("#div_particulares_grid").hide();
  $("#EP_modal_busqueda").modal("show");
});




$("#EP_btn_buscar").click(function(e){
    e.preventDefault();
      var txt_buscar = ($("#EP_txt_buscadorAvanzado").val()).toUpperCase();
      $("#EP_txt_buscadorAvanzado").val("");
      obj_escuelap.buscarenGrid(txt_buscar);
});

$('#EP_tipo_busqueda input[type=radio]').change(function(){
      switch($(this).val()) {
            case 'EP_busqueda_tipo_1' :
                $("#EP_busqueda_tipo_1").show();
                $("#EP_busqueda_tipo_2").hide();
                $("#EP_busqueda_tipo_3").hide();
            break;
            case 'EP_busqueda_tipo_2' :
                $("#EP_busqueda_tipo_1").hide();
                $("#EP_busqueda_tipo_2").show();
                $("#EP_busqueda_tipo_3").hide();
            break;
            case 'EP_busqueda_tipo_3' :
                $("#EP_busqueda_tipo_1").hide();
                $("#EP_busqueda_tipo_2").hide();
                $("#EP_busqueda_tipo_3").show();
            break;
      }//  switch
  });

  $("#EP_select_idmunicipio").change(function(){
        var id_municipio =  $("#EP_select_idmunicipio").val();
        obj_escuelap.getNivelesMunicipio(id_municipio);
  });



  $("#EP_modal_infoescuela_btn_salir").click(function(e){
    e.preventDefault();
    obj_escuelap.clearModal("EP_modal_busqueda");
    obj_escuelap.clearModalInfo("EP_modal_infoescuela");
  });

  $( "#EP_text_CCT" ).keyup(function() {
    obj_escuelap.validaCCT();
  });


  $("#EP_btn_exportaExcel").click(function(e){
    e.preventDefault();
    alert("PENDIENTE");
  });

  $("#EP_btn_reportari").click(function(e){
    e.preventDefault();
      $("#EP_modal_reporte").modal("show");
  });

  $("#EP_aviso_no_escuela_btn_regresar").click(function(e){
    e.preventDefault();
    obj_escuelap.clearModal("EP_modal_busqueda");
    $("#EP_modal_busqueda").modal("show");
    $("#EP_aviso_no_escuela").modal("hide");
  });

  $("#EP_aviso_no_escuela_btn_reportar").click(function(e){
    e.preventDefault();
    document.getElementById("someFormElement").reset();
    $("#EP_modal_reporte").modal("show");
  });

  // Envío de correo reporte
  $("#EP_modal_reporte_btn_enviar").click(function(e){
    e.preventDefault();
    var nombrep    = $("#EP_modal_reporte_nombre").val();
    var telefonop  = $("#EP_modal_reporte_telefono").val();
    var emailp     = $("#EP_modal_reporte_email").val();
    var nombree    = $("#EP_modal_reporte_nombree").val();
    var direccione = $("#EP_modal_reporte_direccione").val();
    var asunto     = $("#EP_modal_reporte_motivo").val();
    var mensaje    = $("#EP_modal_reporte_mensaje").val();

    if(validarFormularioReporte(nombrep,telefonop,emailp,nombree,direccione,asunto,mensaje)){
      enviarReporte(nombrep,telefonop,emailp,nombree,direccione,asunto,mensaje);
    }

  });


  $("#EP_btn_importante").click(function(e){
    e.preventDefault();
    // alert("PENDIENTE");
    obj_message.notification("","LAS ESCUELAS QUE APARECEN EN COLOR ROJO SON DE ALTA DEMANDA","info");
  });


function validarFormularioReporte(nombrep,telefonop,emailp,nombree,direccione,asunto,mensaje){
  if(nombrep.trim().length==0){
    obj_message.notification("","Ingrese su nombre","error");
    return false;
  }else {
    if(telefonop.trim().length==0){
        obj_message.notification("","Ingrese su número de teléfono","error");
        return false;
    }else {
      if(emailp.trim().length==0){
          obj_message.notification("","Ingrese su email","error");
          return false;
      }else {
        if(nombree.trim().length==0){
            obj_message.notification("","Ingrese el nombre de la escuela","error");
            return false;
        }else {
          if(direccione.trim().length==0){
              obj_message.notification("","Ingrese la direccion de la escuela","error");
              return false;
          }else {
            if(asunto.trim().length==0){
                obj_message.notification("","Ingrese el asunto del reporte","error");
                return false;
            }else {
              if(mensaje.trim().length==0){
                  obj_message.notification("","Ingrese el mensaje del reporte","error");
                  return false;
              }else {
                if( RE_EMAIL(emailp.trim()) == false ){
                    obj_message.notification("","El email no es valido","error");
                    return false;
                }else {
                  return true;
                }
              }
            }
          }
        }
      }
    }
  }
}// validarFormularioReporte()

function enviarReporte(nombrep,telefonop,emailp,nombree,direccione,asunto,mensaje){

      var formElement = document.getElementById("someFormElement");
      var formData = new FormData(formElement);

      // var ruta = "app/controllers/reporte.inc.php";
      var ruta = base_url+"Contacto/set_reporte_escuelas_particulares";
      $.ajax({
          url: ruta,
          method: 'POST',
          contentType:false,
          data: formData,
          processData:false,
          cache:false,
        beforeSend: function( xhr ) {
          obj_message.loading("Enviando reporte");
        }
      })
      .done(function( data ) {
          swal.close();
          var result = JSON.parse(data);
          if(result=="ok"){
              obj_message.notification("","El reporte se ha enviado de manera satisfactoria, nos estaremos poniendo en contacto con usted a la brevedad posible","success");
              $("#EP_modal_reporte").modal("hide");
              $("#EP_aviso_no_escuela").modal("hide");

              document.getElementById("someFormElement").reset();
          }
          else if(result=="error"){
              obj_message.notification("","Error enviando el reporte, reintente por favor y si sigue teniendo este error reportelo con el administrador del sistema","error");
          }

      })
      .fail(function(e) {
        console.error("Error in enviarReporte()"); console.table(e);
      });
}// enviarReporte()






  function Escuelasparticulares(){
        tmp_EP = this;
        this.getMunicipios = function(){
              // var ruta = "app/controllers/lista_escuelas.inicial.php";
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
                var html = data.result;
                $("#EP_select_idmunicipio").empty();
                $("#EP_select_idmunicipio").append(html);
                swal.close();
              })
              .fail(function(e) {
                console.error("Error in getMunicipios()"); console.table(e);
              });
        }// getMunicipios()

        this.getNivelesMunicipio = function(id_municipio){
              // var ruta = "app/controllers/lista_escuelas.inicial.php";
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
                var html = data.result;
                $("#EP_select_nivel").empty();
                $("#EP_select_nivel").append(html);
                swal.close();
              })
              .fail(function(e) {
                console.error("Error in getNivelesMunicipio()"); console.table(e);
              });
        }// getNivelesMunicipio()

        // BÚSQUEDA POR NOMBRE Y/O DOMICILIO
        this.getParticulares_1 = function(){
          var nombre_escuela  =  $("#EP_text_escuela").val();
          nombre_escuela_global = nombre_escuela;
          $("#LE_id_municipio").val("0");
          $("#LE_id_nivel").val("0");
          $("#LE_sostenimiento").val(2);
          $("#LE_clave").val(nombre_escuela_global);

          $("#EP_escuela_hidden").val(nombre_escuela_global);
          $("#EP_nivel_hidden").val("0");
          $("#EP_municipio_hidden").val("0");

          var escuela = (nombre_escuela.trim().length>0)?nombre_escuela:"No especificado";
          $("#LE_resultados_busqueda").text("Búsqueda por nombre y/o domicilio: "+escuela);

          var ruta = base_url+"Escuela/get_particulares";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'modal_particulares', 'subaction':'opcion1', 'clave':nombre_escuela},
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
            if(total == 0){
               obj_escuelap.clearModal("EP_modal_busqueda");
               $("#EP_modal_busqueda").modal("hide");
               $("#EP_aviso_no_escuela").modal("show");
            }else{
                if( mensaje.trim().length>=0 && mensaje=="modal_particulares"){ // NO escribió cct y el servidor regresa vació el string de mensaje
                      $("#le_tabla_listaEscuelas tbody").empty();
                      if(html == '') { html = '<tr><td colspan="6">No se encontraron registros...</td></tr>'; }
                      $("#le_totalRegistros").empty();
                      $("#le_totalRegistros").text(result.total);
                      $("#le_tabla_listaEscuelas tbody").append(html); // añadimos a la tabla
                      swal.close();

                      $("#EP_modal_busqueda").modal("hide");
                      $("#div_particulares_opciones").hide();
                      $("#div_particulares_grid").show();
                      obj_escuelap.clearModal("EP_modal_busqueda");
                }
            }// else
          })
          .fail(function(e) {
            console.error("Error in getParticulares_1()"); console.table(e);
          });
        }// getParticulares_1()


        // BÚSQUEDA POR UBICACIÓN
        this.getParticulares_2 = function(){
          var id_municipio     =  $("#EP_select_idmunicipio").val();
          var nombre_municipio =  $("#EP_select_idmunicipio option:selected").text();
          var id_nivel         =  $("#EP_select_nivel").val();
          var nombre_nivel     =  $("#EP_select_nivel option:selected").text();

          id_municipio_global = id_municipio;
          id_nivel_global     = id_nivel;

          $("#LE_id_municipio").val(id_municipio_global);
          $("#LE_id_nivel").val(id_nivel_global);
          $("#LE_sostenimiento").val(2);
          $("#LE_clave").val("");

          $("#EP_escuela_hidden").val("");
          $("#EP_nivel_hidden").val(id_nivel_global);
          $("#EP_municipio_hidden").val(id_municipio_global);

          $("#LE_resultados_busqueda").text("Búsqueda por ubicación: municipio "+ nombre_municipio+", nivel "+nombre_nivel);

          // var ruta = "app/controllers/lista_escuelas.inc.php";
          var ruta = base_url+"Escuela/get_particulares";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'action':'modal_particulares', 'subaction':'opcion2', 'id_municipio':id_municipio,  'id_nivel':id_nivel},
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
            if( mensaje.trim().length>=0 && mensaje=="modal_particulares"){ // NO escribió cct y el servidor regresa vació el string de mensaje
                  $("#le_tabla_listaEscuelas tbody").empty();
                  if(html == '') { html = '<tr><td colspan="6">No se encontraron registros...</td></tr>'; }
                  $("#le_totalRegistros").empty();
                  $("#le_totalRegistros").text(result.total);
                  $("#le_tabla_listaEscuelas tbody").append(html); // añadimos a la tabla
                  swal.close();

                  $("#EP_modal_busqueda").modal("hide");
                  $("#div_particulares_opciones").hide();
                  $("#div_particulares_grid").show();
                  obj_escuelap.clearModal("EP_modal_busqueda");
            }
          })
          .fail(function(e) {
            console.error("Error in getNiveles()"); console.table(e);
          });
        }// getParticulares_2()

        this.getParticulares_3 = function(){
           obj_escuelap.validaCCT();
        }// getParticulares_2()

        this.validaCCT = function(){
            var cct =  $("#EP_text_CCT").val();
            console.info("validaCCT()->cct: "+cct);
            if( cct.length == 8 ){
                if(RE_CCT(cct)){
                  obj_escuelap.getTurnoCCT(cct);
                }else{
                  obj_message.notification("","La clave CT no cumple con el formato","error");
                  $("#LE_panel2_cctTurno").hide();
                  $("#LE_panel2_botones").hide();
                }
            }else{
              $("#EP_cct_turno").empty();
              $("#EP_panel3_turno").hide();
              $("#EP_panel3_botones").hide();
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
                data: {'action':'turno_particulares','cct':cct},
                beforeSend: function( xhr ) {
                  obj_message.loading("Descargando datos");
                }
              })
              .done(function( data ) {
                  swal.close();
                  // var html = data;
                  var html = data.html;
                  $("#EP_cct_turno").empty();
                  if(html == "no_hay_turnos"){
                    obj_message.notification("","la clave CT no existe","error");
                    $("#EP_cct_turno").empty();
                    $("#EP_panel3_turno").hide();
                    $("#EP_panel3_botones").hide();
                  }else{
                    $("#EP_cct_turno").append(html);
                    $("#EP_panel3_turno").show();
                    $("#EP_panel3_botones").show();
                  }

                  if($('#EP_cct_turno option').length == 1){
                      obj_escuelap.getEscuelasCCT();
                  }

              })
              .fail(function(e) {
                  console.error("Error in getTurnoCCT()"); console.table(e);
              });

          }else{
            $("#EP_cct_turno").empty(); // El select para los turnos
            $("#EP_panel3_turno").hide(); // el div que contiene al select de turnos
            $("#EP_panel3_botones").hide();
          }
        }// getTurnoCCT()

        this.getEscuelasCCT = function(){
            var id_escuela =  $("#EP_cct_turno").val();
            obj_escuelap.getInfoEscuela(id_escuela)
        }// getEscuelasCCT()

        this.getInfoEscuela = function(id_escuela){
            tmp_EP.id_escuela = id_escuela;
            // tmp_EL.id_escuela = id_escuela;
            $("#le_modal_id_escuela").val(tmp_EP.id_escuela);
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


                obj_escuelap.concatena_dom(html, function(result){
                    if(result==1){
                      obj_escuelap.hace_graficas(arr_graficas, nivel_g, function(result2){
                          if(result2==1){

                                  obj_escuelap.infoEscuela();
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
              $("#EP_modal_infoescuela .modal-body").empty();
              $("#EP_modal_infoescuela .modal-body").append(html); // añadimos a la tabla
              return callback(aux);
        }// concatena_dom()

      this.hace_graficas = function(arr_graficas, nivel_g, callback){
              var aux = 0;
              var graf = new HaceGraficas(arr_graficas);

              switch(nivel_g) {
                case "PREESCOLAR":
                          graf.GraficoEstadisticaSecundaria_alumn();
                          graf.GraficoEstadisticaSecundaria_grupos();
                          graf.GraficoEstadisticaSecundaria_docentes();
                        aux=1;
                break;
                case "PRIMARIA":
                        graf.GraficoEstadisticaPrimaria_alumn();
                        graf.GraficoEstadisticaPrimaria_grupos();
                        graf.GraficoEstadisticaPrimaria_docentes();
                        graf.TablaPieGraficaBarPrimaria();
                        graf.graficoplanea_ud_prim_lyc(arr_graficas['graph_unidad_analisis_lyc']); // Por Unidades de Análisis lyc
                        graf.graficoplanea_ud_prim_mate(arr_graficas['graph_unidad_analisis_mate']); // Por Unidades de Análisis mate
                        aux=1;
                break;
                case "SECUNDARIA":
                        graf.GraficoEstadisticaSecundaria_alumn();
                        graf.GraficoEstadisticaSecundaria_grupos();
                        graf.GraficoEstadisticaSecundaria_docentes();
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
              $("#EP_modal_infoescuela").modal("show");
              $("#top_modal").click(function(e){
                e.preventDefault();
                $('#EP_modal_infoescuela').scrollTop(0);
              });

              $('#EP_modal_infoescuela').scroll(function(){
                  if ($('#EP_modal_infoescuela').scrollTop() > 400) {
                      $("#btn_topsclla").css("visibility","visible");
                  } else {
                      $("#btn_topsclla").css("visibility","hidden");
                  }
              });
        }// infoEscuela()


        this.clearModal = function(id_modal){
            $("#EP_text_escuela").val("");

            // $("#EP_select_idmunicipio").empty();
            // $("#EP_select_nivel").empty();


            $("#EP_text_CCT").val("");
            $("#EP_cct_turno").empty(); // El select para los turnos
            $("#EP_panel3_turno").hide(); // el div que contiene al select de turnos
            $("#EP_panel3_botones").hide();
          }// clearModal()
          this.clearTable = function(){
              $("#le_tabla_listaEscuelas tbody").empty();
          }// clearTable()
          this.clearModalInfo = function(id_modal){
              $("#"+id_modal+" .modal-body").empty();
              $("#"+id_modal).modal("hide");
          }// clearModalInfo()


          this.buscarenGrid = function(valorabuscar){

            var nombre_escuela_hidden = $("#EP_escuela_hidden").val();
            var id_nivel_hidden       = $("#EP_nivel_hidden").val();
            var id_municipio_hidden   = $("#EP_municipio_hidden").val();

              if(valorabuscar.trim().length==0){
                  obj_message.notification("","Escriba parte del nombre de la escuela o la clave de centro de trabajo","error");
              }else{
                    //////////////////////////////////
                    // var ruta = "app/controllers/lista_escuelas.inc.php";
                    var ruta = base_url+"escuela/busca_grid_particulares";
                    $.ajax({
                      url: ruta,
                      method: 'POST',
                      data: {'action':'buscagrid_particulares','valorabuscar':valorabuscar,
                                  'id_municipio_global': id_municipio_hidden, 'id_nivel_global':id_nivel_hidden, 'nombre_escuela_global':nombre_escuela_hidden
                                },
                      beforeSend: function( xhr ) {
                        obj_message.loading("Descargando datos");
                      }
                    })
                    .done(function( data ) {
                          // var result = JSON.parse(data);
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
                                // obj_escuelap.clearModal("le_modal");
                          }

                    })
                    .fail(function(e) {
                      console.error("Error in buscarenGrid()"); console.table(e);
                    });
                    /////////////////////////////////

                }// else
            }// buscarenGrid()


    }// Escuelasparticulares


    function tdclick(e, id_escuela){
            if (!e) var e = window.event;   // Get the window event
            e.cancelBubble = true;            // IE Stop propagation
            if (e.stopPropagation) e.stopPropagation();  // Other Broswers
            console.info('td clicked, id asociado: '+id_escuela);
            obj_escuelap.getInfoEscuela(id_escuela);
    };
