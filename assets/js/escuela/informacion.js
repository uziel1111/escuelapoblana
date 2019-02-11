function init_show_hide(opcion){
  $("#div_programas").hide();
  $("#div_estadistica_escolar").hide();

  $("#div_indicadores_permanencia").hide();
  $("#div_abandono_escolar").hide();
  $("#div_indicadores_aprendizaje").hide();
  $("#div_abandono_escolar").hide();
}




function show_hide(opcion){
switch (opcion) {
    case 1:
      $("#div_programas").show();
      $("#div_estadistica_escolar").show();

      $("#div_indicadores_permanencia").hide();
      $("#div_abandono_escolar").hide();
      $("#div_indicadores_aprendizaje").hide();

    break;
    case 2:
      $("#div_indicadores_permanencia").show();
      $("#div_abandono_escolar").show();

      $("#div_programas").hide();
      $("#div_estadistica_escolar").hide();
      $("#div_indicadores_aprendizaje").hide();
    break;
    case 3:
      $("#div_indicadores_aprendizaje").show();

      $("#div_programas").hide();
      $("#div_estadistica_escolar").hide();
      $("#div_indicadores_permanencia").hide();
      $("#div_abandono_escolar").hide();
    break;
}
}
