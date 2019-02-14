$(document).ready(function(){
    // Para los tooltips de bootstrap
    $('[data-toggle="tooltip"]').tooltip({html:true});


$("#modelo_edhtml").click(function(e){
  e.preventDefault();
  //alert("FUNCIONA");
  var body = "<br><center><h2><b>I. OBJETIVOS</b></h2></center><p id='parrafo'>Nuestra política educativa estatal se orienta por tres objetivos que son el sustento para diseñar, implementar, acompañar y/o evaluar acciones y programas educativos en el Estado:</p><div style='padding-left:20px'><li><p id='parrafo'><b>ASISTENCIA.</b> Que todas las niñas y niños de entre 3 y 17 años asistan a la escuela</p></li><li><p id='parrafo'><b>PERMANENCIA.</b> Que todos los estudiantes concluyan la educación media superior </p></li><li><p id='parrafo'><b>APRENDIZAJE.</b> Lograr que cada alumna y alumno adquiera cuando menos los conocimientos básicos de los planes y programas de estudio </p></li></div><br><center><h2><b>II. ESTRATEGIAS:</b></h2></center><p id='parrafo'>Dos estrategias permiten que las posibilidades de éxito del quehacer educativo se incrementen sensiblemente:</p><p><h5><b>&nbsp;&nbsp;&nbsp;&nbsp;1. FOCALIZACIÓN</b></h5></p><p>La <b>equidad</b> no se logra dando lo mismo a todos; lo verdaderamente equitativo es intensificar los esfuerzos entre las regiones, escuelas, docentes y/o alumnos que más los requieren, de modo que se reduzcan las brechas.</p><p>Ante los insuficientes recursos (personas, fondos y demás apoyos), es indispensable identificar un universo de atención que asegure el apoyo a donde hay mayores carencias, pero en una cantidad que asegure que nuestros esfuerzos tendrán un impacto real.</p><p><h5><b>&nbsp;&nbsp;&nbsp;&nbsp;2. ARTICULACIÓN</b></h5></p><p>Los recursos de distinto origen y naturaleza en el sistema educativo, así como las acciones de apoyo a escuelas, docentes y alumnos, requieren de asegurar su mutua <b>compatibilidad</b> y <b>complementariedad</b> para incrementar sus posibilidades de éxito. Por ello procuramos articular:</p><div style='padding-left:20px;''><p id='parrafo'>a. Entre <b>programas y acciones</b>, sean federales o estatales</p><p id='parrafo'>b. Entre <b>niveles educativos</b>, desde el nivel inicial y preescolar hasta la educación media superior</p><p id='parrafo'>c. Entre <b>instancias y personas</b> de dentro y fuera del sector educativo</p></div><center><h2><b>III. INDICADORES</b></h2></center><p id='parrafo'>El seguimiento de los objetivos del Modelo se apoya en los siguientes indicadores, según se trate de valorar a la escuela, a la zona escolar o al Estado como unidad de medida:</p><center><table style='color: black'><tr><td style='border: 1px solid black; text-align:center'><strong>OBJETIVO</strong></td><td style='border: 1px solid black; text-align:center' colspan='2'><strong>INDICADOR</strong></td></tr><tr><td style='border: 1px solid black; text-align:center' rowspan='5'>Asistencia&nbsp;&nbsp;&nbsp;(Atención a la demanda)</td><td style='border: 1px solid black; text-align:center'>&nbsp;&nbsp;Escuela ó Zona escolar&nbsp;&nbsp;</td><td style='border: 1px solid black; text-align:center'>&nbsp;&nbsp;Estado&nbsp;&nbsp;</td></tr><tr><td style='border: 1px solid black; text-align:center' colspan='2'>Matrícula Total</td></tr><tr><td style='border: 1px solid black; text-align:center'>&nbsp;&nbsp;Matrícula 1er ingreso&nbsp;&nbsp;</td><td style='border: 1px solid black; text-align:center'>&nbsp;&nbsp;Tasa de Absorción&nbsp;&nbsp;</td></tr><tr><td style='border: 1px solid black;'>&nbsp;&nbsp;Cupo total</td><td style='border: 1px solid black; text-align:center' rowspan='2'>&nbsp;&nbsp;Tasa de Cobertura&nbsp;&nbsp;</td></tr><tr><td style='border: 1px solid black;'>&nbsp;&nbsp;Cupo de 1er ingreso</td></tr><tr><td style='border: 1px solid black; text-align:center' rowspan='3'>&nbsp;Permanencia&nbsp;&nbsp;&nbsp;(Eficiencia académica)</td><td style='border: 1px solid black; text-align:center' colspan='2'>Tasa de retención</td></tr><tr><td style='border: 1px solid black; text-align:center' colspan='2'>Tasa de aprobación</td></tr><tr><td style='border: 1px solid black; text-align:center' colspan='2'>Eficiencia terminal</td></tr><tr><td style='border: 1px solid black; text-align:center' rowspan='3'>Aprendizaje&nbsp;&nbsp;&nbsp;(Calidad)</td><td style='border: 1px solid black; text-align:center' colspan='2'>Puntaje promedio de PLANEA</td></tr><tr><td style='border: 1px solid black; text-align:center' colspan='2'>% de Insuficiencia en Español</td></tr><tr><td style='border: 1px solid black; text-align:center' colspan='2'>% de Insuficiencia en Matemáticas</td></tr></table></center></br>";
  $("#modal_din .modal-title").empty();
  $("#modal_din .modal-title").append("Modelo educativo");
  $("#modal_din .modal-body").empty();
  $("#modal_din .modal-body").append(body);
  $("#modal_din").modal("show");
});

$("#close_din").click(function(e){
  e.preventDefault();
  $("#modal_din").modal("hide");
});

path_home_Lin = "escuelapoblana.org/escuelapoblana_pdfs/index/";

$("#modelo_ed").click(function(e){
      e.preventDefault();
      pdf = path_home_Lin+"Modelo_Educativo_poblano.pdf";
      muestraPDF(pdf);
});

$("#modelo_ed1").click(function(e){
      e.preventDefault();
      pdf = path_home_Lin+"Modelo_Educativo_poblano.pdf";
      muestraPDF(pdf);
});


$("#sismo_esc_sup").click(function(e){
      e.preventDefault();

      pdf = path_home_Lin+"sismo/INSTITUCIONES_SUPERIOR_REANUDAN.pdf";
      muestraPDF(pdf);
});

$("#sismo_esc_sup1").click(function(e){
      e.preventDefault();
      $("#md_sismo_md").modal("hide");
      pdf = path_home_Lin+"sismo/INSTITUCIONES_SUPERIOR_REANUDAN.pdf";
      muestraPDF(pdf);
});

$("#herraminetas_dy_s").click(function(e){
              e.preventDefault();
              $("#modal_din_hdys").modal("show");
  });

  $("#herraminetas_dy_s1").click(function(e){
                e.preventDefault();
                $("#md_sismo_md").modal("hide");
                $("#modal_din_hdys").modal("show");
    });

  $("#apoyo_psico_s1").click(function(e){
                e.preventDefault();
                $("#modal_din_hdys").modal("hide");
                var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/apoyo_psicoemocional.pdf" width="100%" height="500" style="border: none;"></iframe>';
                $('#RA_modal_visorpdf .modal-body').empty();
                    $('#RA_modal_visorpdf .modal-body').html(dom);
                    $("#md_sismo_md").modal("hide");
                    $('#RA_modal_visorpdf').modal("show");
    });



    $("#por_1er_lugar").click(function(e){
                e.preventDefault();
                $("#modal_din_hdys").modal("hide");
                var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/primerlugar.html" width="100%" height="500" style="border: none;"></iframe>';
                $('#RA_modal_visorpdf .modal-body').empty();
                    $('#RA_modal_visorpdf .modal-body').html(dom);

                    $('#RA_modal_visorpdf').modal("show");
              });
              $("#por_1er_lugar1").click(function(e){
                          e.preventDefault();
                          $("#modal_din_hdys").modal("hide");
                          var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/primerlugar.html" width="100%" height="500" style="border: none;"></iframe>';
                          $('#RA_modal_visorpdf .modal-body').empty();
                              $('#RA_modal_visorpdf .modal-body').html(dom);

                              $('#RA_modal_visorpdf').modal("show");
                        });

  $("#hdys_esqreg_clase").click(function(e){
              e.preventDefault();
              $("#modal_din_hdys").modal("hide");
              var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/regresoaclases-sismo.html" width="100%" height="500" style="border: none;"></iframe>';
              $('#RA_modal_visorpdf .modal-body').empty();
                  $('#RA_modal_visorpdf .modal-body').html(dom);

                  $('#RA_modal_visorpdf').modal("show");
            });
  $("#est_reu_clase").click(function(e){
              e.preventDefault();
              $("#modal_din_hdys").modal("hide");
              var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/ESTRATEGIA DE REUBICACIÓN.pdf" width="100%" height="500" style="border: none;"></iframe>';
              $('#RA_modal_visorpdf .modal-body').empty();
                  $('#RA_modal_visorpdf .modal-body').html(dom);

                  $('#RA_modal_visorpdf').modal("show");
            });
$("#part_sup_clase").click(function(e){
            e.preventDefault();
            $("#modal_din_hdys").modal("hide");
            var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/Participación Lucero Nava Bolaños supervisores.pdf" width="100%" height="500" style="border: none;"></iframe>';
            $('#RA_modal_visorpdf .modal-body').empty();
                $('#RA_modal_visorpdf .modal-body').html(dom);

                $('#RA_modal_visorpdf').modal("show");
          });

$("#pdtcl_clase").click(function(e){
            e.preventDefault();
            $("#modal_din_hdys").modal("hide");
            var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/Previsión documentación y transparencia Claudia Luna.pdf" width="100%" height="500" style="border: none;"></iframe>';
            $('#RA_modal_visorpdf .modal-body').empty();
                $('#RA_modal_visorpdf .modal-body').html(dom);

                $('#RA_modal_visorpdf').modal("show");
          });

  $("#uni_dida_todos_clase").click(function(e){
              e.preventDefault();
              $("#modal_din_hdys").modal("hide");
              var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/sismo/Unidades didácticas para Secundaria y Media Superior.pdf" width="100%" height="500" style="border: none;"></iframe>';
              $('#RA_modal_visorpdf .modal-body').empty();
                  $('#RA_modal_visorpdf .modal-body').html(dom);

                  $('#RA_modal_visorpdf').modal("show");
            });
      $("#modal_estadis_const1").click(function(e){
                          e.preventDefault();
                          $("#md_construc").modal("show");
              });
      $("#modal_estadis_const").click(function(e){
                          e.preventDefault();
                          $("#md_construc").modal("show");
              });
              $("#btn_spd").click(function(e){
                                    e.preventDefault();
                                    $("#modal_din_spd").modal("show");
                        });
                        $("#btn_spd1").click(function(e){
                                              e.preventDefault();
                                              $("#modal_din_spd").modal("show");
                                  });

    $("#btn_calendarios").click(function(e){
                          e.preventDefault();
                          $("#modal_din_cal").modal("show");
              });
              $("#btn_calendarios1").click(function(e){
                                    e.preventDefault();
                                    $("#modal_din_cal").modal("show");
                        });
              $("#btn_preinscripciones").click(function(e){
                                              e.preventDefault();
                                              $("#modal_preinscr").modal("show");
                                  });

              $("#guias_pf").click(function(e){
                                    e.preventDefault();
                                    $("#modal_guias_pf").modal("show");
                        });
                        $("#md_sismo").click(function(e){
                                              e.preventDefault();
                                              $("#md_sismo_md").modal("show");
                                  });
                                  $("#md_sismo1").click(function(e){
                                                        e.preventDefault();
                                                        $("#md_sismo_md").modal("show");
                                            });



                        $("#guias_pf1").click(function(e){
                                              e.preventDefault();
                                              $("#modal_guias_pf").modal("show");
                                  });
                        $("#gpppp").click(function(e){
                                    e.preventDefault();
                                    $("#modal_guias_pf").modal("hide");
                                    var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/guias/GPadres_Primaria_Press.pdf" width="100%" height="500" style="border: none;"></iframe>';
                                    $('#RA_modal_visorpdf .modal-body').empty();
                                        $('#RA_modal_visorpdf .modal-body').html(dom);

                                        $('#RA_modal_visorpdf').modal("show");
                                  });
                          $("#gppsms").click(function(e){
                                              e.preventDefault();
                                              $("#modal_guias_pf").modal("hide");
                                              var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/guias/GPadres_Secundaria_Press.pdf" width="100%" height="500" style="border: none;"></iframe>';
                                              $('#RA_modal_visorpdf .modal-body').empty();
                                                  $('#RA_modal_visorpdf .modal-body').html(dom);

                                                  $('#RA_modal_visorpdf').modal("show");
                                            });
$("#enlaces").click(function(e){
            e.preventDefault();
            $("#modal_din_spd").modal("hide");
            var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/enlaces_SPD.pdf" width="100%" height="500" style="border: none;"></iframe>';
            $('#RA_modal_visorpdf .modal-body').empty();
                $('#RA_modal_visorpdf .modal-body').html(dom);

                $('#RA_modal_visorpdf').modal("show");
          });
          $("#eami").click(function(e){
                      e.preventDefault();
                      $("#modal_din_spd").modal("hide");
                      var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/index/PPI_EAMI_2019_OK.pdf" width="100%" height="500" style="border: none;"></iframe>';
                      $('#RA_modal_visorpdf .modal-body').empty();
                          $('#RA_modal_visorpdf .modal-body').html(dom);

                          $('#RA_modal_visorpdf').modal("show");
                    });
$("#cal185").click(function(e){
            e.preventDefault();
            $("#modal_din_cal").modal("hide");
            var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/calendarios/2018-2019_calendario_185_dias.pdf" width="100%" height="500" style="border: none;"></iframe>';
            $('#RA_modal_visorpdf .modal-body').empty();
                $('#RA_modal_visorpdf .modal-body').html(dom);

                $('#RA_modal_visorpdf').modal("show");
          });

          $("#cal195").click(function(e){
                      e.preventDefault();
                      $("#modal_din_cal").modal("hide");
                      var dom = '<iframe src="http://escuelapoblana.org/escuelapoblana_pdfs/calendarios/2018-2019_calendario_185_dias.pdf" width="100%" height="500" style="border: none;"></iframe>';
                      $('#RA_modal_visorpdf .modal-body').empty();
                          $('#RA_modal_visorpdf .modal-body').html(dom);

                          $('#RA_modal_visorpdf').modal("show");
                    });








function muestraPDF(pdf){
        var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';

        $('#RA_modal_visorpdf .modal-body').empty();
        $('#RA_modal_visorpdf .modal-body').html(dom);

        $('#RA_modal_visorpdf').modal("show");
}// muestraPDF()

});
