


function HaceGraficas(arr_datos, otro){

    obj_graficas = this;

    var valor_bim =  '';
    var valor_cic =  '';

    obj_graficas.arr_estadistica = [];
    if(otro){
        obj_graficas.arr_riesgo = [];
        obj_graficas.arr_riesgo = arr_datos['riesgo'];
        var q1 = parseInt(obj_graficas.arr_riesgo['muyalto']);
        var q2 = parseInt(obj_graficas.arr_riesgo['alto']);
        var q3 = parseInt(obj_graficas.arr_riesgo['medio']);
        var q4 = parseInt(obj_graficas.arr_riesgo['bajo']);

        obj_graficas.arr_riesgot = [];
        obj_graficas.arr_riesgot = arr_datos['riesgot'];
        var t1 = parseInt(obj_graficas.arr_riesgot['total1']);
        var t2 = parseInt(obj_graficas.arr_riesgot['total2']);
        var t3 = parseInt(obj_graficas.arr_riesgot['total3']);
        var t4 = parseInt(obj_graficas.arr_riesgot['total4']);
        var t5 = parseInt(obj_graficas.arr_riesgot['total5']);
        var t6 = parseInt(obj_graficas.arr_riesgot['total6']);
    }else{
      init_show_hide();
      obj_graficas.arr_estadistica = arr_datos['estadistica'];
      obj_graficas.arr_riesgo = [];
      obj_graficas.arr_riesgo = arr_datos['riesgo'];
      obj_graficas.arr_riesgot = [];
      obj_graficas.arr_riesgot = arr_datos['riesgot'];
      obj_graficas.arr_btnnewriesgo = [];
      obj_graficas.arr_btnnewriesgo = arr_datos['btnnewriesgo'];

      var valor_cct =  obj_graficas.arr_btnnewriesgo['cct'];
      var valor_nvl =  obj_graficas.arr_btnnewriesgo['nivel'];
      var valor_tno =  obj_graficas.arr_btnnewriesgo['turno'];
      /* Obtenemos el valor de los select correspondientes a riesgo de abandono*/


    // Variables para guardar las cifras correspondiente a estadísticas de alumnos, grupos y docentes.
    var a_g1 =  parseInt(obj_graficas.arr_estadistica['a_g1']) ;//5;
    var a_g2 =  parseInt(obj_graficas.arr_estadistica['a_g2']);//5;
    var a_g3 =  parseInt(obj_graficas.arr_estadistica['a_g3']);//7;
    var a_g4 =  parseInt(obj_graficas.arr_estadistica['a_g4']);//8;
    var a_g5 =  parseInt(obj_graficas.arr_estadistica['a_g5']);//8;
    var a_g6 =  parseInt(obj_graficas.arr_estadistica['a_g6']);//8;

    var g_g1 =  parseInt(obj_graficas.arr_estadistica['g_g1']);//3;
    var g_g2 =  parseInt(obj_graficas.arr_estadistica['g_g2']);//3;
    var g_g3 =  parseInt(obj_graficas.arr_estadistica['g_g3']);//3;
    var g_g4 =  parseInt(obj_graficas.arr_estadistica['g_g4']);//3;
    var g_g5 =  parseInt(obj_graficas.arr_estadistica['g_g5']);//3;
    var g_g6 =  parseInt(obj_graficas.arr_estadistica['g_g6']);//3;

    var d_g1 =  parseInt(obj_graficas.arr_estadistica['d_g1']);//3;
    var d_g2 =  parseInt(obj_graficas.arr_estadistica['d_g2']);//3;
    var d_g3 =  parseInt(obj_graficas.arr_estadistica['d_g3']);//3;
    var d_g4 =  parseInt(obj_graficas.arr_estadistica['d_g4']);//3;
    var d_g5 =  parseInt(obj_graficas.arr_estadistica['d_g5']);//3;
    var d_g6 =  parseInt(obj_graficas.arr_estadistica['d_g6']);//3;

    var g_mg =  parseInt(obj_graficas.arr_estadistica['g_mg']);//3;

    var t_docentes =  parseInt(obj_graficas.arr_estadistica['t_docentes']);//10;
    var t_alumnos  =  parseInt(obj_graficas.arr_estadistica['t_alumnos']);//10;
    var t_grupos   =  parseInt(obj_graficas.arr_estadistica['t_grupos']);//10;

    var q1 = parseInt(obj_graficas.arr_riesgo['muyalto']);
    var q2 = parseInt(obj_graficas.arr_riesgo['alto']);
    var q3 = parseInt(obj_graficas.arr_riesgo['medio']);
    var q4 = parseInt(obj_graficas.arr_riesgo['bajo']);


    var t1 = parseInt(obj_graficas.arr_riesgot['total1']);
    var t2 = parseInt(obj_graficas.arr_riesgot['total2']);
    var t3 = parseInt(obj_graficas.arr_riesgot['total3']);
    var t4 = parseInt(obj_graficas.arr_riesgot['total4']);
    var t5 = parseInt(obj_graficas.arr_riesgot['total5']);
    var t6 = parseInt(obj_graficas.arr_riesgot['total6']);

    var cadena_nivel = '';

    obj_graficas.arr_ind_perma = [];
    obj_graficas.arr_ind_perma = arr_datos['ind_perma'];

    var valor_retencion =  obj_graficas.arr_ind_perma['valor_retencion'];
    var valor_aprobacion =  obj_graficas.arr_ind_perma['valor_aprobacion'];
    var valor_et =  obj_graficas.arr_ind_perma['valor_et'];
    var valor_ete =  obj_graficas.arr_ind_perma['valor_ete'];

    var valor_retencion  = parseFloat(valor_retencion);
    var valor_aprobacion = parseFloat(valor_aprobacion);
    var valor_et = parseFloat(valor_et);
    var valor_ete = parseFloat(valor_ete);

    obj_graficas.array_planea = [];
    obj_graficas.array_planea = arr_datos['planea'];


    var lyc1_15  = parseFloat(obj_graficas.array_planea['ILC15']);
    var lyc2_15  = parseFloat(obj_graficas.array_planea['IILC15']);
    var lyc3_15  = parseFloat(obj_graficas.array_planea['IIILC15']);
    var lyc4_15  = parseFloat(obj_graficas.array_planea['IVLC15']);
    var mat1_15  = parseFloat(obj_graficas.array_planea['IMAT15']);
    var mat2_15  = parseFloat(obj_graficas.array_planea['IIMAT15']);
    var mat3_15  = parseFloat(obj_graficas.array_planea['IIIMAT15']);
    var mat4_15  = parseFloat(obj_graficas.array_planea['IVMAT15']);

    var lyc1_17  = parseFloat(obj_graficas.array_planea['ILC17']);
    var lyc2_17  = parseFloat(obj_graficas.array_planea['IILC17']);
    var lyc3_17  = parseFloat(obj_graficas.array_planea['IIILC17']);
    var lyc4_17  = parseFloat(obj_graficas.array_planea['IVLC17']);
    var mat1_17  = parseFloat(obj_graficas.array_planea['IMAT17']);
    var mat2_17  = parseFloat(obj_graficas.array_planea['IIMAT17']);
    var mat3_17  = parseFloat(obj_graficas.array_planea['IIIMAT17']);
    var mat4_17  = parseFloat(obj_graficas.array_planea['IVMAT17']);

    var lyc1_16  = parseFloat(obj_graficas.array_planea['ILC']);
    var lyc2_16  = parseFloat(obj_graficas.array_planea['IILC']);
    var lyc3_16  = parseFloat(obj_graficas.array_planea['IIILC']);
    var lyc4_16  = parseFloat(obj_graficas.array_planea['IVLC']);
    var mat1_16  = parseFloat(obj_graficas.array_planea['IMAT']);
    var mat2_16  = parseFloat(obj_graficas.array_planea['IIMAT']);
    var mat3_16  = parseFloat(obj_graficas.array_planea['IIIMAT']);
    var mat4_16  = parseFloat(obj_graficas.array_planea['IVMAT']);

}



 this.GraficoEstadisticaPrimaria_alumn = function(){
      Highcharts.theme = {
            colors: ['#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2', '#3C5AA2', '#3C5AA2',
                     '#3C5AA2', '#3C5AA2', '#3C5AA2'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 0, 0],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(255, 255, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 18px'
                }
            },
            subtitle: {
                style: {
                    color: 'blue',
                    font: 'bold 20px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
      };

      // Apply the theme
      Highcharts.setOptions(Highcharts.theme);

      // Codigo para graficar la seccion estadistica de la escuela
      // Create the chart
      var defaultSubtitle = "Total de alumnos: "+t_alumnos
      var estadPrimaria = new Highcharts.chart('div_grafico1', {
          lang: {
              drillUpText: ''
          },
          credits: {
              enabled: false
          },
          chart: {
              type: 'column',
              events: {

                }
          },
          title: {
              text: 'Alumnos'
          },
          subtitle: {
              text: defaultSubtitle
          },
          xAxis: {
              type: 'category',
              title: {
                  text: 'Grados'
              }
          },
          yAxis: {
              title: {
                  text: 'Número de alumnos'
              }

          },
          legend: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y}'
                  }
              }
          },

          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
          },

          series: [{
              name: 'Número de alumnos en',
              colorByPoint: true,
              data: [
                      [
                          '1º',
                          a_g1
                      ],
                      [
                          '2º',
                          a_g2
                      ],
                      [
                          '3º',
                          a_g3
                      ],
                      [
                          '4º',
                          a_g4
                      ],
                      [
                          '5º',
                          a_g5
                      ],
                      [
                          '6º',
                          a_g6
                      ]
                  ]
          }]

      });

      $(".highcharts-background").css("fill","#FFF");
      if (screen.width<600){
        estadPrimaria.setSize(
            ($(document).width()/10)*5,
            400,
           false
        );
      }
      else {
        estadPrimaria.setSize(
            ($(document).width()/10)*7,
            400,
           false
        );
      }

    }//GraficoEstadisticaPrimaria_alumn

  this.GraficoEstadisticaPrimaria_grupos = function(){
         Highcharts.theme = {
               colors: ['#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462', '#ECC462', '#ECC462',
                        '#ECC462', '#ECC462', '#ECC462'],
               chart: {
                   backgroundColor: {
                       linearGradient: [0, 0, 0, 0],
                       stops: [
                           [0, 'rgb(255, 255, 255)'],
                           [1, 'rgb(255, 255, 255)']
                       ]
                   },
               },
               title: {
                   style: {
                       color: '#000',
                       font: 'bold 18px'
                   }
               },
               subtitle: {
                   style: {
                       color: 'blue',
                       font: 'bold 20px'
                   }
               },

               legend: {
                   itemStyle: {
                       font: '9pt',
                       color: 'black'
                   },
                   itemHoverStyle:{
                       color: 'gray'
                   }
               }
         };

         // Apply the theme
         Highcharts.setOptions(Highcharts.theme);

         // Codigo para graficar la seccion estadistica de la escuela
         // Create the chart
         var defaultSubtitle = "Total de grupos: "+t_grupos
         var estadPrimaria = new Highcharts.chart('div_grafico2', {
             lang: {
                 drillUpText: ''
             },
             credits: {
                 enabled: false
             },
             chart: {
                 type: 'column',
                 events: {

                   }
             },
             title: {
                 text: 'Grupos'
             },
             subtitle: {
                 text: defaultSubtitle
             },
             xAxis: {
                 type: 'category',
                 title: {
                     text: 'Grados'
                 }
             },
             yAxis: {
                 title: {
                     text: 'Número de grupos'
                 }

             },
             legend: {
                 enabled: false
             },
             plotOptions: {
                 series: {
                     borderWidth: 0,
                     dataLabels: {
                         enabled: true,
                         format: '{point.y}'
                     }
                 }
             },

             tooltip: {
                 headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                 pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
             },

             series: [{
                 name: 'Número de grupos en',
                 colorByPoint: true,
                 data: [
                      [
                          '1º',
                          g_g1
                      ],
                      [
                          '2º',
                          g_g2
                      ],
                      [
                          '3º',
                          g_g3
                      ],
                      [
                          '4º',
                          g_g4
                      ],
                      [
                          '5º',
                          g_g5
                      ],
                      [
                          '6º',
                          g_g6
                      ]/*,
                      [
                          'Multigrado',
                          g_mg
                      ]*/
                  ]
             }]

         });

         $(".highcharts-background").css("fill","#FFF");
         if (screen.width<600){
           estadPrimaria.setSize(
               ($(document).width()/10)*5,
               400,
              false
           );
         }
         else {
           estadPrimaria.setSize(
               ($(document).width()/10)*7,
               400,
              false
           );
         }
       }//GraficoEstadisticaPrimaria_grupos

       this.GraficoEstadisticaPrimaria_docentes = function(){
            Highcharts.theme = {
                  colors: ['#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C', '#D5831C', '#D5831C',
                           '#D5831C', '#D5831C', '#D5831C'],
                  chart: {
                      backgroundColor: {
                          linearGradient: [0, 0, 0, 0],
                          stops: [
                              [0, 'rgb(255, 255, 255)'],
                              [1, 'rgb(255, 255, 255)']
                          ]
                      },
                  },
                  title: {
                      style: {
                          color: '#000',
                          font: 'bold 18px'
                      }
                  },
                  subtitle: {
                      style: {
                          color: 'blue',
                          font: 'bold 20px'
                      }
                  },

                  legend: {
                      itemStyle: {
                          font: '9pt',
                          color: 'black'
                      },
                      itemHoverStyle:{
                          color: 'gray'
                      }
                  }
            };

            // Apply the theme
            Highcharts.setOptions(Highcharts.theme);

            // Codigo para graficar la seccion estadistica de la escuela
            // Create the chart
            var defaultSubtitle = "Total de docentes: "+t_grupos
            var estadPrimaria = new Highcharts.chart('div_grafico3', {
                lang: {
                    drillUpText: ''
                },
                credits: {
                    enabled: false
                },
                chart: {
                    type: 'column',
                    events: {

                      }
                },
                title: {
                    text: 'Docentes'
                },
                subtitle: {
                    text: defaultSubtitle
                },
                xAxis: {
                    type: 'category',
                    title: {
                        text: 'Grados'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Número de docentes'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                },

                series: [{
                    name: 'Número de docentes en',
                    colorByPoint: true,
                    data: [
                         [
                             '1º',
                             d_g1
                         ],
                         [
                             '2º',
                             d_g2
                         ],
                         [
                             '3º',
                             d_g3
                         ],
                         [
                             '4º',
                             d_g4
                         ],
                         [
                             '5º',
                             d_g5
                         ],
                         [
                             '6º',
                             d_g6
                         ]/*,
                         [
                             'Multigrado',
                             g_mg
                         ]*/
                     ]
                }]

            });

            $(".highcharts-background").css("fill","#FFF");
            if (screen.width<600){
              estadPrimaria.setSize(
                  ($(document).width()/10)*5,
                  400,
                 false
              );
            }
            else {
              estadPrimaria.setSize(
                  ($(document).width()/10)*7,
                  400,
                 false
              );
            }
          }//GraficoEstadisticaPrimaria_docentes



          this.GraficoEstadisticaSecundaria_alumn = function(){
               Highcharts.theme = {
                     colors: ['#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2','#3C5AA2', '#3C5AA2', '#3C5AA2',
                              '#3C5AA2', '#3C5AA2', '#3C5AA2'],
                     chart: {
                         backgroundColor: {
                             linearGradient: [0, 0, 0, 0],
                             stops: [
                                 [0, 'rgb(255, 255, 255)'],
                                 [1, 'rgb(255, 255, 255)']
                             ]
                         },
                     },
                     title: {
                         style: {
                             color: '#000',
                             font: 'bold 18px'
                         }
                     },
                     subtitle: {
                         style: {
                             color: 'blue',
                             font: 'bold 20px'
                         }
                     },

                     legend: {
                         itemStyle: {
                             font: '9pt',
                             color: 'black'
                         },
                         itemHoverStyle:{
                             color: 'gray'
                         }
                     }
               };

               // Apply the theme
               Highcharts.setOptions(Highcharts.theme);

               // Codigo para graficar la seccion estadistica de la escuela
               // Create the chart
               var defaultSubtitle = "Total de alumnos: "+t_alumnos
               var estadPrimaria = new Highcharts.chart('div_grafico1', {
                   lang: {
                       drillUpText: ''
                   },
                   credits: {
                       enabled: false
                   },
                   chart: {
                       type: 'column',
                       events: {

                         }
                   },
                   title: {
                       text: 'Alumnos'
                   },
                   subtitle: {
                       text: defaultSubtitle
                   },
                   xAxis: {
                       type: 'category',
                       title: {
                           text: 'Grados'
                       }
                   },
                   yAxis: {
                       title: {
                           text: 'Número de alumnos'
                       }

                   },
                   legend: {
                       enabled: false
                   },
                   plotOptions: {
                       series: {
                           borderWidth: 0,
                           dataLabels: {
                               enabled: true,
                               format: '{point.y}'
                           }
                       }
                   },

                   tooltip: {
                       headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                       pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                   },

                   series: [{
                       name: 'Número de alumnos en',
                       colorByPoint: true,
                       data: [
                               [
                                   '1º',
                                   a_g1
                               ],
                               [
                                   '2º',
                                   a_g2
                               ],
                               [
                                   '3º',
                                   a_g3
                               ]
                           ]
                   }]

               });

               $(".highcharts-background").css("fill","#FFF");
               if (screen.width<600){
                 estadPrimaria.setSize(
                     ($(document).width()/10)*5,
                     400,
                    false
                 );
               }
               else {
                 estadPrimaria.setSize(
                     ($(document).width()/10)*7,
                     400,
                    false
                 );
               }
             }//GraficoEstadisticaSecundaria_alumn

           this.GraficoEstadisticaSecundaria_grupos = function(){
                  Highcharts.theme = {
                        colors: ['#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462','#ECC462', '#ECC462', '#ECC462',
                                 '#ECC462', '#ECC462', '#ECC462'],
                        chart: {
                            backgroundColor: {
                                linearGradient: [0, 0, 0, 0],
                                stops: [
                                    [0, 'rgb(255, 255, 255)'],
                                    [1, 'rgb(255, 255, 255)']
                                ]
                            },
                        },
                        title: {
                            style: {
                                color: '#000',
                                font: 'bold 18px'
                            }
                        },
                        subtitle: {
                            style: {
                                color: 'blue',
                                font: 'bold 20px'
                            }
                        },

                        legend: {
                            itemStyle: {
                                font: '9pt',
                                color: 'black'
                            },
                            itemHoverStyle:{
                                color: 'gray'
                            }
                        }
                  };

                  // Apply the theme
                  Highcharts.setOptions(Highcharts.theme);

                  // Codigo para graficar la seccion estadistica de la escuela
                  // Create the chart
                  var defaultSubtitle = "Total de grupos: "+t_grupos
                  var estadPrimaria = new Highcharts.chart('div_grafico2', {
                      lang: {
                          drillUpText: ''
                      },
                      credits: {
                          enabled: false
                      },
                      chart: {
                          type: 'column',
                          events: {

                            }
                      },
                      title: {
                          text: 'Grupos'
                      },
                      subtitle: {
                          text: defaultSubtitle
                      },
                      xAxis: {
                          type: 'category',
                          title: {
                              text: 'Grados'
                          }
                      },
                      yAxis: {
                          title: {
                              text: 'Número de grupos'
                          }

                      },
                      legend: {
                          enabled: false
                      },
                      plotOptions: {
                          series: {
                              borderWidth: 0,
                              dataLabels: {
                                  enabled: true,
                                  format: '{point.y}'
                              }
                          }
                      },

                      tooltip: {
                          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                      },

                      series: [{
                          name: 'Número de grupos en',
                          colorByPoint: true,
                          data: [
                               [
                                   '1º',
                                   g_g1
                               ],
                               [
                                   '2º',
                                   g_g2
                               ],
                               [
                                   '3º',
                                   g_g3
                               ]
                           ]
                      }]

                  });

                  $(".highcharts-background").css("fill","#FFF");
                  if (screen.width<600){
                    estadPrimaria.setSize(
                        ($(document).width()/10)*5,
                        400,
                       false
                    );
                  }
                  else {
                    estadPrimaria.setSize(
                        ($(document).width()/10)*7,
                        400,
                       false
                    );
                  }
                }//GraficoEstadisticaSecundaria_grupos

                this.GraficoEstadisticaSecundaria_docentes = function(){
                     Highcharts.theme = {
                           colors: ['#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C','#D5831C', '#D5831C', '#D5831C',
                                    '#D5831C', '#D5831C', '#D5831C'],
                           chart: {
                               backgroundColor: {
                                   linearGradient: [0, 0, 0, 0],
                                   stops: [
                                       [0, 'rgb(255, 255, 255)'],
                                       [1, 'rgb(255, 255, 255)']
                                   ]
                               },
                           },
                           title: {
                               style: {
                                   color: '#000',
                                   font: 'bold 18px'
                               }
                           },
                           subtitle: {
                               style: {
                                   color: 'blue',
                                   font: 'bold 20px'
                               }
                           },

                           legend: {
                               itemStyle: {
                                   font: '9pt',
                                   color: 'black'
                               },
                               itemHoverStyle:{
                                   color: 'gray'
                               }
                           }
                     };

                     // Apply the theme
                     Highcharts.setOptions(Highcharts.theme);

                     // Codigo para graficar la seccion estadistica de la escuela
                     // Create the chart
                     var defaultSubtitle = "Total de docentes: "+t_grupos
                     var estadPrimaria = new Highcharts.chart('div_grafico3', {
                         lang: {
                             drillUpText: ''
                         },
                         credits: {
                             enabled: false
                         },
                         chart: {
                             type: 'column',
                             events: {

                               }
                         },
                         title: {
                             text: 'Docentes'
                         },
                         subtitle: {
                             text: defaultSubtitle
                         },
                         xAxis: {
                             type: 'category',
                             title: {
                                 text: 'Grados'
                             }
                         },
                         yAxis: {
                             title: {
                                 text: 'Número de docentes'
                             }

                         },
                         legend: {
                             enabled: false
                         },
                         plotOptions: {
                             series: {
                                 borderWidth: 0,
                                 dataLabels: {
                                     enabled: true,
                                     format: '{point.y}'
                                 }
                             }
                         },

                         tooltip: {
                             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                             pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
                         },

                         series: [{
                             name: 'Número de docentes en',
                             colorByPoint: true,
                             data: [
                                  [
                                      '1º',
                                      d_g1
                                  ],
                                  [
                                      '2º',
                                      d_g2
                                  ],
                                  [
                                      '3º',
                                      d_g3
                                  ]
                              ]
                         }]

                     });

                     $(".highcharts-background").css("fill","#FFF");
                     if (screen.width<600){
                       estadPrimaria.setSize(
                           ($(document).width()/10)*5,
                           400,
                          false
                       );
                     }
                     else {
                       estadPrimaria.setSize(
                           ($(document).width()/10)*7,
                           400,
                          false
                       );
                     }
                   }//GraficoEstadisticaSecundaria_docentes






this.GraficoEstadisticaOtros = function(){
      Highcharts.theme = {
            //colors: ['#50B432', '#07A4B5', '#ED561B', '#006080', '#24CBE5', '#64E572',
            //colors: ['#50B432', '#ED561B', '#8B4513', '#006080', '#24CBE5', '#64E572',
            colors: ['#3C5AA2','#ECC462','#D5831C','#ECC462','#25383C','#A52A2A','#3CB371','#64E572', '#24CBE5', '#006080',
                     '#FF9655', '#FFF263', '#058DC7'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 0, 0],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(255, 255, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 14px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
      };

      // Apply the theme
      Highcharts.setOptions(Highcharts.theme);

      // Codigo para graficar la seccion estadistica de la escuela
      // Create the chart
      var estadPrimaria = new Highcharts.chart('div_grafico1', {
          lang: {
              drillUpText: ''
          },
          credits: {
              enabled: false
          },
          chart: {
              type: 'column'
          },
          title: {
              text: ''
          },
          subtitle: {
              text: ''
          },
          xAxis: {
              type: 'category'
          },
          yAxis: {
              title: {
                  text: 'Cantidad'
              }

          },
          legend: {
              enabled: false
          },
          plotOptions: {
              series: {
                  borderWidth: 0,
                  dataLabels: {
                      enabled: true,
                      format: '{point.y}'
                  }
              }
          },

          tooltip: {
              headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
              pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
          },

          series: [{
              name: 'Estadística',
              colorByPoint: true,
              data: [{
                  name: 'Alumnos',
                  y: t_alumnos,
                  drilldown: 'Alumnos'
              }, {
                  name: 'Grupos',
                  y: t_grupos,
                  drilldown: 'Grupos'
              }, {
                  name: 'Docentes',
                  y: t_docentes,
                  drilldown: 'Docentes'
              }]
          }]
      });

      $(".highcharts-background").css("fill","#FFF");
      if (screen.width<600){
        estadPrimaria.setSize(
            ($(document).width()/10)*5,
            400,
           false
        );
      }
      else {
        estadPrimaria.setSize(
            ($(document).width()/10)*7,
            400,
           false
        );
      }
    }



this.DibujarRadialProgressBarR = function(){
    //  Dibujamos el radial progress bar para Retención
    var bar = new ProgressBar.Circle(containerRPB01, {
      color: '#888888',
      strokeWidth: 8,
      trailWidth: 5,
      easing: 'easeInOut',
      duration: 9400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#D6DADC', width: 5 },
      to: { color: '#3C5AA2', width: 8 }, //#07A4B5
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        if(circle.value()==1.0){
          var value = Math.round(circle.value() * 100);
        }
        else {
          var value = circle.value() * 100;
        value = value.toFixed(2);
        }
        if (value === 0) {
          circle.setText('');
        } else {
          if (value>1) {
            circle.setText(valor_retencion+'%');
          }
          else {
            circle.setText(value+'%');
          }

        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(Math.min(valor_retencion/100, 1));  // Number from 0.0 to 1.0
  }

  this.DibujarRadialProgressBarAete = function(){
      // Dibujamos el radial progress bar para Eficiencia Terminal
      var bar = new ProgressBar.Circle(containerRPB03ete, {
        color: '#888888',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 5,
        easing: 'easeInOut',
        duration: 7400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#FFA500', width: 5 },
        to: { color: '#ECC462', width: 8 },
        // Set default step function for all animate calls
        step: function(state, circle) {
          circle.path.setAttribute('stroke', state.color);
          circle.path.setAttribute('stroke-width', state.width);

          if(circle.value()==1.0){
            var value = Math.round(circle.value() * 100);
          }
          else {
            var value = circle.value() * 100;
          value = value.toFixed(2);
          }
          if (value === 0) {
            circle.setText('');
          } else {
            if (value>1) {
              circle.setText(valor_ete.toFixed(2)+'%');
            }
            else {
              circle.setText(value+'%');
            }
          }

        }
      });
      bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
      bar.text.style.fontSize = '2rem';

      bar.animate(Math.min(valor_ete/100, 1));  // Number from 0.0 to 1.0
    }

  this.DibujarRadialProgressBarA = function(){
    // Dibujamos el radial progress bar para Aprobación
    var bar = new ProgressBar.Circle(containerRPB02, {
      color: '#888888',
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 8,
      trailWidth: 5,
      easing: 'easeInOut',
      duration: 6400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#D6DADC', width: 5 },
      to: { color: '#FF9900', width: 8 }, /*e50016 rojo negativo para el usuario*/
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        if(circle.value()==1.0){
          var value = Math.round(circle.value() * 100);
        }
        else {
          var value = circle.value() * 100;
        value = value.toFixed(2);
        }
        if (value === 0) {
          circle.setText('');
        } else {
          if (value>1) {
            circle.setText(valor_aprobacion+'%');
          }
          else {
            circle.setText(value+'%');
          }
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(Math.min(valor_aprobacion/100, 1));  // Number from 0.0 to 1.0
  }
  this.DibujarRadialProgressBarET = function(){
    // Dibujamos el radial progress bar para Eficiencia Terminal
    var bar = new ProgressBar.Circle(containerRPB03, {
      color: '#888888',
      // This has to be the same size as the maximum width to
      // prevent clipping
      strokeWidth: 8,
      trailWidth: 5,
      easing: 'easeInOut',
      duration: 7400,
      text: {
        autoStyleContainer: false
      },
      from: { color: '#D6DADC', width: 5 },
      to: { color: '#ECC462', width: 8 },
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        if(circle.value()==1.0){
          var value = Math.round(circle.value() * 100);
        }
        else {
          var value = circle.value() * 100;
        value = value.toFixed(2);
        }
        if (value === 0) {
          circle.setText('');
        } else {
          if (value>1) {
            circle.setText(valor_et+'%');
          }
          else {
            circle.setText(value+'%');
          }
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(Math.min(valor_et/100, 1));  // Number from 0.0 to 1.0
  }


  this.PieDrilldownPlanea05y06 = function(){

        Highcharts.theme = {
            colors: ['#ECC462','#D5831C','#935116','#CCCC00','#FF9900','#3C5AA2'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 0, 0],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(255, 255, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 14px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
        };

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

        // Dibujamos un grafico tipo pie-drilldown planea 2015
        // Creamos la gráfica
        var defaultTitle="Resultados PLANEA 2015 " ;
        var defaultSubtitle="Haz clic para ver los porcentajes por área.";
        var drilldownTitle = "Matemáticas";
        var global_nivel = $("#global_nivel").val();
        //alert(global_nivel);
        if (global_nivel=="MEDIA"  || global_nivel=="SECUNDARIA") {
          var chartp2015 = new Highcharts.chart('containerpiedrilldown01', {
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'column'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">Lenguaje y Comunicación</b>'
              },
              legend: {
                  enabled: false
              },
              subtitle: {
                  //text: 'PLANEA 2015 y PLANEA 2016 ('+cadena_nivel+')'
              },
              xAxis: {
                  categories: [
                      'I <br> Insuficiente',
                      'II <br> Elemental',
                      'III <br> Bueno',
                      'IV <br>Excelente'
                  ],
                  crosshair: true
              },
              yAxis: {
                  min: 0,
                  title: {
                      text: 'Nivel de logro (%)'
                  }
              },
              plotOptions: {
                  series: {
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                  }
              },
              tooltip: {
                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
              },
              series: [{
                  name: 'Leng. y comunicación 2015',
                  data: [lyc1_15, lyc2_15, lyc3_15, lyc4_15]

              }, {
                  name: 'Leng. y comunicación 2016',
                  data: [lyc1_16, lyc2_16, lyc3_16, lyc4_16]

              },{
                  name: 'Leng. y comunicación 2017',
                  data: [lyc1_17, lyc2_17, lyc3_17, lyc4_17]

              },]
          });
        }
        else {
          var chartp2015 = new Highcharts.chart('containerpiedrilldown01', {
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'column'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">Lenguaje y Comunicación</b>'
              },
              legend: {
                  enabled: false
              },
              subtitle: {
                  //text: 'PLANEA 2015 y PLANEA 2016 ('+cadena_nivel+')'
              },
              xAxis: {
                  categories: [
                      'I <br> Insuficiente',
                      'II <br> Elemental',
                      'III <br> Bueno',
                      'IV <br>Excelente'
                  ],
                  crosshair: true
              },
              yAxis: {
                  min: 0,
                  title: {
                      text: 'Nivel de logro (%)'
                  }
              },
              plotOptions: {
                  series: {
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                  }
              },
              tooltip: {
                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
              },
              series: [{
                  name: 'Leng. y comunicación 2015',
                  data: [lyc1_15, lyc2_15, lyc3_15, lyc4_15]

              }, {
                  name: 'Leng. y comunicación 2016',
                  data: [lyc1_16, lyc2_16, lyc3_16, lyc4_16]

              },]
          });
        }




        // Dibujamos un grafico tipo pie-drilldown planea 2016
        // Create the chart
        var defaultTitle="Resultados PLANEA 2016 ";
        var defaultSubtitle="Haz clic para ver los porcentajes por área.";
        var drilldownTitle = "Matemáticas";
        var global_nivel = $("#global_nivel").val();

        if (global_nivel=="MEDIA"  || global_nivel=="SECUNDARIA") {
        var chartp2016 = new Highcharts.chart('containerpiedrilldown02', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vh;">Matemáticas</b>'
            },
            legend: {
                enabled: false
            },
            subtitle: {
                //text: 'PLANEA 2015 y PLANEA 2016 ('+cadena_nivel+')'
            },
            xAxis: {
                categories: [
                    'I <br> Insuficiente',
                    'II <br> Elemental',
                    'III <br> Bueno',
                    'IV <br>Excelente'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nivel de logro (%)'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                },
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            series: [{
                name: 'Matemáticas 2015',
                data: [mat1_15, mat2_15, mat3_15, mat4_15]

            }, {
                name: 'Matemáticas 2016',
                data: [mat1_16, mat2_16, mat3_16, mat4_16]

            }, {
                name: 'Matemáticas 2017',
                data: [mat1_17, mat2_17, mat3_17, mat4_17]

            }]
        });
      }
      else {
        var chartp2016 = new Highcharts.chart('containerpiedrilldown02', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vh;">Matemáticas</b>'
            },
            legend: {
                enabled: false
            },
            subtitle: {
                //text: 'PLANEA 2015 y PLANEA 2016 ('+cadena_nivel+')'
            },
            xAxis: {
                categories: [
                    'I <br> Insuficiente',
                    'II <br> Elemental',
                    'III <br> Bueno',
                    'IV <br>Excelente'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nivel de logro (%)'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                },
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            series: [{
                name: 'Matemáticas 2015',
                data: [mat1_15, mat2_15, mat3_15, mat4_15]

            }, {
                name: 'Matemáticas 2016',
                data: [mat1_16, mat2_16, mat3_16, mat4_16]

            }]
        });
      }



        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");
        if (screen.width<600){
          chartp2015.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          chartp2015.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }

        if (screen.width<600){
          chartp2016.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          chartp2016.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }


    }

    this.TablaPieGraficaPie = function(){

          Highcharts.theme = {
              //colors: ['#50B432', '#07A4B5', '#ED561B', '#006080', '#24CBE5', '#64E572',
              colors: ['#FF0000', '#FF9900', '#FFFF00', '#3CB371', '#24CBE5', '#64E572',
                       '#FF9655', '#FFF263', '#058DC7'],
              chart: {
                  backgroundColor: {
                      linearGradient: [0, 0, 500, 500],
                      stops: [
                          [0, 'rgb(255, 255, 255)'],
                          [1, 'rgb(240, 240, 255)']
                      ]
                  },
              },
              title: {
                  style: {
                      color: '#000',
                      font: 'bold 12px'
                  }
              },
              subtitle: {
                  style: {
                      color: '#666666',
                      font: 'bold 12px'
                  }
              },

              legend: {
                  itemStyle: {
                      font: '9pt',
                      color: 'black'
                  },
                  itemHoverStyle:{
                      color: 'gray'
                  }
              }
          };

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);

          // Build the chart
          estadPrimaria= new Highcharts.chart('containerpiechartRiesgo', {
              credits: {
                  enabled: false
              },
              chart: {
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false,
                  type: 'pie'
              },
              title: {
                  text: '<b style="font-size: 2.3vw;"><br>Proporciones de acuerdo a matrícula escolar</b>'
              },
              tooltip: {
                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
              },
              plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                          enabled: true,
                          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                          style: {
                              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                          }
                      },
                      showInLegend: false /*Ocultamos o Muy ALto  o Alto o Medio o Bajo*/
                  }
              },
              series: [{
                  name: 'Porcentaje',
                  colorByPoint: true,
                  data: [{
                      name: 'Muy alto',
                      y: q1,
                      sliced: true,
                      selected: true
                  }, {
                      name: 'Alto',
                      y: q2
                  }, {
                      name: 'Medio',
                      y: q3
                  }, {
                      name: 'Bajo',
                      y: q4
                  }]
              }]
          });

          $(".highcharts-background").css("fill","#FFF");
          if (screen.width<600){
            estadPrimaria.setSize(
                ($(document).width()/10)*5,
                400,
               false
            );
          }
          else {
            estadPrimaria.setSize(
                ($(document).width()/10)*7,
                400,
               false
            );
          }

        }




this.TablaPieGraficaBarPrimaria= function(){

        Highcharts.theme = {
            colors: ['#DAA520','#228B22','#696969','#8B008B','#228B22','#DAA520',
                     '#FF9655', '#FFF263', '#058DC7'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 500, 500],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(240, 240, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 12px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
        };

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

        // Gráfica opcion 2 para distribucion por grado Riesgo de abandono escolar
        estadPrimaria = new Highcharts.chart('containerbarchartRiesgo', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vw;"><br>Distribución por grado</b>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    '1er °',
                    '2do °',
                    '3er °',
                    '4to °',
                    '5to °',
                    '6to °'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Alumnos'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    showInLegend: false /*Ocultamos a la vista del usuario   o Alumnos*/
                }
            },
            series: [{
                name: 'Alumnos',
                data: [t1,t2,t3,t4,t5,t6]
            }]
        });

        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");
        if (screen.width<600){
          estadPrimaria.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          estadPrimaria.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }

      }



this.TablaPieGraficaBarSecundaria= function(){

        Highcharts.theme = {
            colors: ['#DAA520','#228B22','#696969','#8B008B','#228B22','#DAA520',
                     '#FF9655', '#FFF263', '#058DC7'],
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 500, 500],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(240, 240, 255)']
                    ]
                },
            },
            title: {
                style: {
                    color: '#000',
                    font: 'bold 16px'
                }
            },
            subtitle: {
                style: {
                    color: '#666666',
                    font: 'bold 12px'
                }
            },

            legend: {
                itemStyle: {
                    font: '9pt',
                    color: 'black'
                },
                itemHoverStyle:{
                    color: 'gray'
                }
            }
        };

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

        // Gráfica opcion 2 para distribucion por grado Riesgo de abandono escolar
        estadPrimaria = new Highcharts.chart('containerbarchartRiesgo', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: '<b style="font-size: 2.3vw;">Distribución por grado</b>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    '1er °',
                    '2do °',
                    '3er °'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Alumnos'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    showInLegend: false
                }
            },
            series: [{
                name: 'Alumnos',
                data: [t1,t2,t3]
            }]
        });

        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");
        if (screen.width<600){
          estadPrimaria.setSize(
              ($(document).width()/10)*5,
              400,
             false
          );
        }
        else {
          estadPrimaria.setSize(
              ($(document).width()/10)*7,
              400,
             false
          );
        }

      }



      this.click_riesgo = function(){
      }


      
      $("#select_opcciclo").change(function(){
            // get_riesgo_abandono();
        // console.log("select ciclo");
        var opciones = {'opc1':'opcion 1','opc2':'opcion 2','opc3':'opcion 3'};
        // console.log("ciclo: "+$("#select_opcciclo").val());
        if($("#select_opcciclo").val()=='2018-2019'){
          $("#select_opcbimestre").empty();
          $('#select_opcbimestre').append('<option value="1">1er Periodo</option>');
          $('#select_opcbimestre').append('<option value="2">2do Periodo</option>');
          $('#select_opcbimestre').append('<option value="3">3er Periodo</option>');
         
        }else{
          $("#select_opcbimestre").empty();
          $('#select_opcbimestre').append('<option value="1">1er Bimestre</option>');
          $('#select_opcbimestre').append('<option value="2">2do Bimestre</option>');
          $('#select_opcbimestre').append('<option value="3">3er Bimestre</option>');
          $('#select_opcbimestre').append('<option value="4">4to Bimestre</option>');
          $('#select_opcbimestre').append('<option value="5">5to Bimestre</option>');
        }

       });


      this.get_riesgo_abandono = function(){
          var bimes = $("#select_opcbimestre").val();
          var ciclo = $("#select_opcciclo").val();
          // console.log("ciclo:"+ciclo);
          var global_cct = $("#global_cct").val();
          var global_nombre_turno = $("#global_nombre_turno").val();
          var global_nivel = $("#global_nivel").val();
          if ((bimes==2 || bimes==3) && ciclo=='2018-2019') {
            alert("AUN NO DISPONIBLE");

          }else if((bimes==4 || bimes==5) && ciclo=='2017-2018'){
            alert("AUN NO DISPONIBLE");
          }else {

          var ruta = base_url+"escuela/info_escuela_riesgoabandono";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'bimestre':bimes,'ciclo':ciclo,
                   'global_cct':global_cct, 'global_nombre_turno':global_nombre_turno,
                   'global_nivel':global_nivel},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
              swal.close();
              var result = data.respuesta;
              var html = result.html;
              $("#div_info_riesgoabandono").empty();
              $("#div_info_riesgoabandono").append(html);

              var arr_graficas = result.array_graficas;
              obj_graficas.hace_graficas(arr_graficas, global_nivel, function(result2){
                  if(result2==1){
                  }
              });
          })
          .fail(function(e) {
              console.error("Error in get_riesgo_abandono()"); console.table(e);
          });
        }
      }// get_riesgo_abandono()






      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      //////////////////////////////////////////////////////////// Por Unidades de Análisis
      this.graficoplanea_ud_prim_lyc = function(arr_lyc){
        // console.info(arr_lyc);
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*15
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue'
                    }
                },

                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };

          var arr_lyc_aux = new Array();;
          for (var i = 0; i < arr_lyc.length; i++){
             arr_lyc_aux.push({'name': arr_lyc[i]['contenidos'],'y': arr_lyc[i]['porcen_alum_respok'],'drilldown': arr_lyc[i]['total_rea_xua']});
          }

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_lyc', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2018</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_lyc[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },

                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"lyc","prim");
                               }
                           }
                       }
                   }
                  //
              },

              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'
              },

              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_lyc_aux
              }],

          });

          $(".highcharts-background").css("fill","#FFF");
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }
      }// graficoplanea_ud_prim_lyc()

      this.graficoplanea_ud_prim_mate = function(arr_mate){
        // console.info(arr_mate);
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*12
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };
          var arr_mate_aux = new Array();;
          for (var i = 0; i < arr_mate.length; i++){
             arr_mate_aux.push({'name': arr_mate[i]['contenidos'],'y': arr_mate[i]['porcen_alum_respok'],'drilldown': arr_mate[i]['total_rea_xua']});
          }
          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_mate', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
                  // width: 1000
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2018</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_mate[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                 //console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"mat", "prim");
                               }
                           }
                       }
                   }
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_mate_aux
              }],
          });

          $(".highcharts-background").css("fill","#FFF");
          // $("#container_chartFreqAtaTailNum").highcharts().setSize(200, 200, false);
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_prim_mate()

      this.graficoplanea_ud_secu_lyc = function(arr_lyc){
        // console.info(arr_lyc);
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                  /*
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                },
                */
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    },
                    text: '<b style="font-size: 2.3vh;">PLANEA 2017</b>'
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    },
                    text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_lyc[0]['alumnos_evaluados']+'</b>'
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    },
                    enabled: false
                }
          };

          Highcharts.setOptions(Highcharts.theme);

          var arr_lyc_aux = new Array();;
          for (var i = 0; i < arr_lyc.length; i++){
             arr_lyc_aux.push({'name': arr_lyc[i]['contenidos'],'y': arr_lyc[i]['porcen_alum_respok'],'drilldown': arr_lyc[i]['total_rea_xua']});
          }

          // Apply the theme

          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_lyc', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              /*
              chart: {
                  type: 'bar'
              },
              */
              chart: {
                  type: 'bar',
                  backgroundColor: {
                      linearGradient: [0, 0, 0, 0],
                      stops: [
                          [0, 'rgb(255, 255, 255)'],
                          [1, 'rgb(255, 255, 255)']
                      ]
                  },
                  width: ($(document).width()/10)*6,
                  height: ($(document).width()/10)*12
              },
              /*
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2016</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_lyc[0]['alumnos_evaluados']+'</b>'
              },
              */
              xAxis: {
                  type: 'category'
              },

              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                      // text: '<div>Porcentaje de alumnos con respuestas correctas</div>'
                  },
                  /*
                  labels: {
                      overflow: 'justify'
                  }
                  */
              },
              /*
              legend: {
                  enabled: false
              },
              */
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
                     },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'

                      }
                  },

                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"lyc", "secu");
                               }
                           }
                       }
                   }
                  //
              },

              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'
              },

              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_lyc_aux
              }],

          });


          $(".highcharts-background").css("fill","#FFF");
          /*
          if (screen.width<600){
            estadPreescolar.setSize(
                ($(document).width()/10)*5,
                500,
               false
            );
          }
          else {
            estadPreescolar.setSize(
                ($(document).width()/10)*7,
                900,
               false
            );
          }
          */
      }// graficoplanea_ud_secu_lyc()

      this.graficoplanea_ud_secu_mate = function(arr_mate){
        // console.info(arr_mate);
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*12
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };
          var arr_mate_aux = new Array();;
          for (var i = 0; i < arr_mate.length; i++){
             arr_mate_aux.push({'name': arr_mate[i]['contenidos'],'y': arr_mate[i]['porcen_alum_respok'],'drilldown': arr_mate[i]['total_rea_xua']});
          }
          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          // Create the chart
          var defaultSubtitle = "Total de alumnos evaluados: "+arr_mate[0]['alumnos_evaluados']
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_mate', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
                  // width: 1000
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2017</b>'
              },
              subtitle: {
                  text:  '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_mate[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                 //console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"mat","secu");
                               }
                           }
                       }
                   }
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_mate_aux
              }],
          });

          $(".highcharts-background").css("fill","#FFF");
          // $("#container_chartFreqAtaTailNum").highcharts().setSize(200, 200, false);
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_secu_mate()

      this.graficoplanea_ud_ms_lyc = function(arr_lyc){
        // console.info(arr_lyc);


          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900',
                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*12
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },

                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };
          var arr_lyc_aux = new Array();;
          for (var i = 0; i < arr_lyc.length; i++){
             arr_lyc_aux.push({'name': arr_lyc[i]['contenidos'],'y': arr_lyc[i]['porcen_alum_respok'],'drilldown': arr_lyc[i]['total_rea_xua']});
          }
          //console.log( arr_lyc );

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_lyc', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2017</b>'
              },
              subtitle: {
                  text: '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_lyc[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },

                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"lyc", "ms");
                               }
                           }
                       }
                   }
                  //
              },

              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'
              },


              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_lyc_aux
              }],

          });

          $(".highcharts-background").css("fill","#FFF");
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       500,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1400,
          //      false
          //   );
          // }
      }// graficoplanea_ud_ms_lyc()



      this.graficoplanea_ud_ms_mate = function(arr_mate){
        // console.info(arr_mate);
          Highcharts.theme = {
                colors: ['#FF0000','#FF0000', '#FF0000', '#FF0000','#FF0000',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',
                 '#FF9900','#FF9900','#FF9900','#FF9900','#FF9900',

                  '#3CB371','#3CB371','#3CB371','#3CB371','#3CB371'],
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 0],
                        stops: [
                            [0, 'rgb(255, 255, 255)'],
                            [1, 'rgb(255, 255, 255)']
                        ]
                    },
                    width: ($(document).width()/10)*6,
                    height: ($(document).width()/10)*10
                },
                title: {
                    style: {
                        color: '#000',
                        font: 'bold 18px'
                    }
                },
                subtitle: {
                    style: {
                        color: 'blue',
                        font: 'bold 20px'
                    }
                },
                legend: {
                    itemStyle: {
                        font: '9pt',
                        color: 'black'
                    },
                    itemHoverStyle:{
                        color: 'gray'
                    }
                }
          };

          var arr_mate_aux = new Array();;
          for (var i = 0; i < arr_mate.length; i++){
             arr_mate_aux.push({'name': arr_mate[i]['contenidos'],'y': arr_mate[i]['porcen_alum_respok'],'drilldown': arr_mate[i]['total_rea_xua']});
          }

          // Apply the theme
          Highcharts.setOptions(Highcharts.theme);
          // Codigo para graficar la seccion estadistica de la escuela
          var estadPreescolar = new Highcharts.chart('containerbar_unidad_analisis_mate', {
              lang: {
                  //drillUpText: '◁ Regresar a {series.name}'
              },
              credits: {
                  enabled: false
              },
              chart: {
                  type: 'bar'
                  // width: 1000
              },
              title: {
                  text: '<b style="font-size: 2.3vh;">PLANEA 2017</b>'
              },
              subtitle: {
                  text:  '<b style="font-size: 1.5vh;"> Total de alumnos evaluados: '+arr_mate[0]['alumnos_evaluados']+'</b>'
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: '<div style="font-size: 1.1vh;">Porcentaje de alumnos con respuestas correctas</div>'
                  }
              },
              legend: {
                  enabled: false
              },
              plotOptions: {
                  series: {
                    events: {
                      click: function (event) {
                        // nada...
                      }
              },
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                          format: '{point.y:.1f}%'
                      }
                  },
                  // agregamos a la columna la propiedad para el clik y enviar el nombre a una función
                  bar :{
                       point:{
                           events:{
                               click:function(){
                                // console.info(this);
                                  obj_graficas.get_reactivos_xunidad_de_analisis(this.name,"mat","ms");
                               }
                           }
                       }
                   }
              },
              tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><b>{point.y}%</b><br>',
                pointFormat: '<span style="font-size:11px">Total de preguntas en el contenido temático: </span><b>{point.drilldown}</b><br><span style="color:{point.color}">{point.name}</span>'

              },
              series: [{
                  name: 'Porcentaje de alumnos con respuestas correctas: ',
                  colorByPoint: true,
                  data: arr_mate_aux
              }],
          });

          $(".highcharts-background").css("fill","#FFF");
          // $("#container_chartFreqAtaTailNum").highcharts().setSize(200, 200, false);
          // if (screen.width<600){
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*5,
          //       600,
          //      false
          //   );
          // }
          // else {
          //   estadPreescolar.setSize(
          //       ($(document).width()/10)*7,
          //       1000,
          //      false
          //   );
          // }

      }// graficoplanea_ud_ms_mate()


      this.hace_graficas = function(arr_graficas, nivel_g, callback){
          var aux = 0;
          var graf = new HaceGraficas(arr_graficas,true);
          switch(nivel_g) {
              case "PREESCOLAR":
              break;
              case "PRIMARIA":
                  graf.TablaPieGraficaBarPrimaria();

              break;
              case "SECUNDARIA":
                  graf.TablaPieGraficaBarSecundaria();
              break;
              default:
              break;
          }
          graf.TablaPieGraficaPie();
          return callback(aux);
      }// hace_graficas()

      this.get_reactivos_xunidad_de_analisis = function(nombre,opcion,nvl){
          var global_cct = $("#global_cct").val();
          var global_nombre_turno = $("#global_nombre_turno").val();

          var ruta = base_url+"escuela/info_escuela_get_reactivos_xunidad_de_analisis";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: { 'nombre':nombre,'opcion':opcion,
                    'global_cct':global_cct, 'global_nombre_turno':global_nombre_turno,'nvl':nvl
                  },
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
              swal.close();
              var result = data.respuesta;

              var html = "<div style='text-align:left !important;'><ul>";
              if (result.length==0) {
                html += "<p><li>En este contenido temático más del 50% los alumnos contestaron en forma correcta las preguntas.</li></p><br>";
              }
              else {
                html += "<p><label>Reactivos donde al menos el 50% de los alumnos de esta escuela no contestaron o lo hicieron en forma incorrecta.</label><br>";
                for (var i = 0; i < result.length; i++) {
                  html += "<p><li>"+result[i]['descripcion']+"</li></p>";
                }
              }


              html += "</ul></div>";

              $('#modal_visor_reactivos .modal-body #div_reactivos').empty();
              $('#modal_visor_reactivos .modal-body #div_reactivos').html(html);

              $("#modal_reactivos_title").empty();
              $("#modal_reactivos_title").html("Contenido temático: "+nombre);

              $("#modal_visor_reactivos").modal("show");

          })
          .fail(function(e) {
              console.error("Error in get_reactivos_xunidad_de_analisis()"); console.table(e);
          });
      }// get_reactivos_xunidad_de_analisis()





}// HaceGraficas()






function get_riesgo_abandono(){
    obj_graficas.get_riesgo_abandono();
}
