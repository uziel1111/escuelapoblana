


function HaceGraficas(arr_datos){
    obj_graficas = this;
    obj_graficas.arr_estadistica = [];
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
    var valor_bim =  '';
    var valor_cic =  '';


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

    var valor_retencion  = parseFloat(valor_retencion);
    var valor_aprobacion = parseFloat(valor_aprobacion);
    var valor_et = parseFloat(valor_et);

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

    var lyc1_16  = parseFloat(obj_graficas.array_planea['ILC']);
    var lyc2_16  = parseFloat(obj_graficas.array_planea['IILC']);
    var lyc3_16  = parseFloat(obj_graficas.array_planea['IIILC']);
    var lyc4_16  = parseFloat(obj_graficas.array_planea['IVLC']);
    var mat1_16  = parseFloat(obj_graficas.array_planea['IMAT']);
    var mat2_16  = parseFloat(obj_graficas.array_planea['IIMAT']);
    var mat3_16  = parseFloat(obj_graficas.array_planea['IIIMAT']);
    var mat4_16  = parseFloat(obj_graficas.array_planea['IVMAT']);




  this.GraficoEstadisticaPreescolar = function(){
      Highcharts.theme = {
            colors: ['#3C5AA2','#ECC462','#D5831C','#E50016','#25383C','#A52A2A','#3CB371','#64E572', '#24CBE5', '#006080',
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
      var defaultSubtitle = "Haz clic en las columnas para ver el desagregado por grado."
      var estadPreescolar = new Highcharts.chart('div_grafico1', {
          lang: {
              drillUpText: '◁ Regresar a {series.name}'
          },
          credits: {
              enabled: false
          },
          chart: {
              type: 'column',
              events: {
                    drilldown: function(e) {
                        if(e.point.name=='Grupos' && g_mg>1)
                        {
                          estadPreescolar.setSubtitle({ text: "Este preescolar tiene "+g_mg+" grupos multigrado",  style: {color: '#E68A00', fontSize: '16px', fontWeight: 'bold'} });
                        }
                        else if(e.point.name=='Grupos' && g_mg==1)
                        {
                          estadPreescolar.setSubtitle({ text: "Este preescolar tiene "+g_mg+" grupo multigrado",  style: {color: '#E68A00', fontSize: '16px', fontWeight: 'bold'} });
                        }
                        else
                        {
                          estadPreescolar.setSubtitle({ text: "" });
                        }

                    },
                    drillup: function(e) {
                        estadPreescolar.setSubtitle({ text: defaultSubtitle, style: {color: '#404040', fontSize: '14px', fontWeight: 'normal'} });
                    }
                }
          },
          title: {
              text: ''
          },
          subtitle: {
              text: defaultSubtitle
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
          }],
          drilldown: {
              series: [{
                  name: 'Alumnos',
                  id: 'Alumnos',
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
              }, {
                  name: 'Grupos',
                  id: 'Grupos',
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
                      ]/*,
                      [
                          'Multigrado',
                          g_mg
                      ]*/
                  ]
              }]
          }
      });

      $(".highcharts-background").css("fill","#FFF");
  }// GraficoEstadisticaPreescolar()


 this.GraficoEstadisticaPrimaria = function(){
      Highcharts.theme = {
            colors: ['#3C5AA2','#ECC462','#D5831C','#e50016','#25383C','#A52A2A','#3CB371','#64E572', '#24CBE5', '#006080',
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
      var defaultSubtitle = "Haz clic en las columnas para ver el desagregado por grado."
      var estadPrimaria = new Highcharts.chart('div_grafico1', {
          lang: {
              drillUpText: '◁ Regresar a {series.name}'
          },
          credits: {
              enabled: false
          },
          chart: {
              type: 'column',
              events: {
                    drilldown: function(e) {
                        if(e.point.name=='Grupos' && g_mg>1)
                        {
                          estadPrimaria.setSubtitle({ text: "Esta primaria tiene "+g_mg+" grupos multigrado",  style: {color: '#E68A00', fontSize: '16px', fontWeight: 'bold'} });
                        }
                        else if(e.point.name=='Grupos' && g_mg==1)
                        {
                          estadPrimaria.setSubtitle({ text: "Esta primaria tiene "+g_mg+" grupo multigrado",  style: {color: '#E68A00', fontSize: '16px', fontWeight: 'bold'} });
                        }
                        else
                        {
                          estadPrimaria.setSubtitle({ text: "" });
                        }

                    },
                    drillup: function(e) {
                        estadPrimaria.setSubtitle({ text: defaultSubtitle, style: {color: '#404040', fontSize: '14px', fontWeight: 'normal'} });
                    }
                }
          },
          title: {
              text: ''
          },
          subtitle: {
              text: defaultSubtitle
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
          }],
          drilldown: {
              series: [{
                  name: 'Alumnos',
                  id: 'Alumnos',
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
              }, {
                  name: 'Grupos',
                  id: 'Grupos',
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
          }
      });

      $(".highcharts-background").css("fill","#FFF");
    }

     this.GraficoEstadisticaSecundaria = function(){
      Highcharts.theme = {
            colors: ['#3C5AA2','#ECC462','#D5831C','#E50016','#25383C','#A52A2A','#3CB371','#64E572', '#24CBE5', '#006080',
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
      Highcharts.chart('div_grafico1', {
          lang: {
              drillUpText: '◁ Regresar a {series.name}'
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
              text: 'Haz clic en las columnas para ver el desagregado por grado.'
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
          }],
          drilldown: {
              series: [{
                  name: 'Alumnos',
                  id: 'Alumnos',
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
              }, {
                  name: 'Grupos',
                  id: 'Grupos',
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
          }
      });

      $(".highcharts-background").css("fill","#FFF");
    }

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
      Highcharts.chart('div_grafico1', {
          lang: {
              drillUpText: '◁ Regresar a {series.name}'
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
              text: 'Haz clic en las columnas para ver el desagregado por grado.'
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
          circle.setText(value+'%');
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(valor_retencion/100);  // Number from 0.0 to 1.0
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
          circle.setText(value+'%');
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(valor_aprobacion/100);  // Number from 0.0 to 1.0
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
          circle.setText(value+'%');
        }

      }
    });
    bar.text.style.fontFamily = '"Arial", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(valor_et/100);  // Number from 0.0 to 1.0
  }


  this.PieDrilldownPlanea05y06 = function(){
        Highcharts.theme = {
            colors: ['#ECC462','#D5831C','#E60000','#CCCC00','#FF9900','#3C5AA2'],
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

        var chartp2015 = new Highcharts.chart('containerpiedrilldown01', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Lenguaje y Comunicación'
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

            }]
        });


        // Dibujamos un grafico tipo pie-drilldown planea 2016
        // Create the chart
        var defaultTitle="Resultados PLANEA 2016 ";
        var defaultSubtitle="Haz clic para ver los porcentajes por área.";
        var drilldownTitle = "Matemáticas";
        var chartp2016 = new Highcharts.chart('containerpiedrilldown02', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Matemáticas'
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



        // Apply background-color
        $(".highcharts-background").css("fill","#FFF");

    }

    this.TablaPieGraficaPie = function(){
        //Mandamos a cargar el contenido de la tabla_pie con los resultados de la busqueda
        //$.get("conexion/Consultas/info_escuela/cargar_tabla_pieX.php",{param_c:valor_cct, param_n:valor_nvl, param_b:valor_bim, param_x:valor_cic})
         //         .done(function(data){
         //             $("#tabla_pie_info").html(data);

          // Almacenamos el valor de las celdas muy_alto, alto, medio y bajo para pasarselos a la gráfica
          // y de esta manera dibujar el piechart correspondiente al municipio seleccionado.
          //var q1 = parseInt($('#muy_alto').html());
          //var q2 = parseInt($('#alto').html());
          //var q3 = parseInt($('#medio').html());
          //var q4 = parseInt($('#bajo').html());

          // Dibujamos un grafico tipo pie para mostrar riesgo de abandono escolar de la escuela en cuestion
          // Create the chart
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

          // Build the chart
          Highcharts.chart('containerpiechartRiesgo', {
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
                  text: 'Proporciones de acuerdo a matrícula escolar'
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
        Highcharts.chart('containerbarchartRiesgo', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Distribución por grado'
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
        Highcharts.chart('containerbarchartRiesgo', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Distribución por grado'
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

      }
      
      this.click_riesgo= function(){
        
        

        $("#btnBuscarCT").click(function(e){
          e.preventDefault();
          var valor_bim = $("#select_opcbimestre").val();
          var xciclo = $("#select_opcciclo").val();
          var valor_ciclo=xciclo.substr(2,2)+xciclo.substr(7,2);

          var tabla_riesgo = '';

            if (valor_nvl=='PRIMARIA') {
              tabla_riesgo = "riesgoprimb"+valor_bim+"c"+valor_ciclo;
            }
            else{
              tabla_riesgo = "riesgosecub"+valor_bim+"c"+valor_ciclo;
            }
          //alert("Entro al click"+tabla_riesgo);

          var ruta = "app/controllers/info_escuela_riesgo.inc.php";
          $.ajax({
            url: ruta,
            method: 'POST',
            data: {'valor_cct':valor_cct,'valor_tno':valor_tno,'valor_nvl':valor_nvl,'tabla_riesgo':tabla_riesgo},
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            
              var result = JSON.parse(data);
              //console.info(result);
              //return false;

             q1 =  parseInt(result.variables['muyalto']);
             q2 =  parseInt(result.variables['alto']);
             q3 =  parseInt(result.variables['medio']);
             q4 =  parseInt(result.variables['bajo']);


             t1 =  parseInt(result.variables['total1']);
             t2 =  parseInt(result.variables['total2']);
             t3 =  parseInt(result.variables['total3']);
             t4 =  parseInt(result.variables['total4']);
             t5 =  parseInt(result.variables['total5']);
             t6 =  parseInt(result.variables['total6']);
              
              
              $("#contenedor_riesgo").empty();
              $("#contenedor_riesgo").append(result.html);

              if (valor_nvl=='PRIMARIA') {
              obj_graficas.TablaPieGraficaBarPrimaria();
            }
            else{
              obj_graficas.TablaPieGraficaBarSecundaria();
            }
              obj_graficas.TablaPieGraficaPie();
              

              //alert("ya paso...");
              // console.info("arr_graficas");
              // console.table(arr_graficas);
              // console.info("Sólo preescolar");
              // console.info(arr_graficas['preescolar']);
              // console.info("Sólo primaria");
              // console.info(arr_graficas['primaria']);
              // return false;

              
              // obj_escuela.infoEscuela(html);
              swal.close();
          })
          .fail(function(e) {
              console.error("Error in getInfoEscuela()"); console.table(e);
          });


        });
      }

      
    
      



}// HaceGraficas()


