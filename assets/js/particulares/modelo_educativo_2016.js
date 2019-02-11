path_home = "http://escuelapoblana.org/escuelapoblana_pdfs/";
$(function() {
  console.info( "ready!" );
  document.title = 'normatividad | Particulares | modeloeducativo2016';
});

$("#EP_modeloeducativo_fesxxi").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/modeloeducativo2016/1. Los_Fines_de_la_Educacion_en_el_Siglo_XXI.pdf";
  muestraPDF(pdf);
});
$("#EP_comunicados_me2016").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/modeloeducativo2016/2. Modelo_Educativo_2016.pdf";
  muestraPDF(pdf);
});
$("#EP_comunicados_pfme2016gf").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/modeloeducativo2016/3. Preguntas Frecuentes _ Modelo Educativo 2016 _ Gobierno _ gob.pdf";
  muestraPDF(pdf);
});
$("#EP_comunicados_pceo").click(function(e){
  e.preventDefault();
  pdf = path_home+"escuelas_particulares/modeloeducativo2016/4. Propuesta-Curricular-para-la-Educacion-Obligatoria-compressed.pdf";
  // pdf = path_home+"escuelas_particulares/modeloeducativo2016/4. Propuesta-Curricular-para-la-Educacion-Obligatoria.pdf";
  muestraPDF(pdf);
});

function muestraPDF(pdf){
  var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
  $('#RA_modal_visorpdf .modal-body').empty();
  $('#RA_modal_visorpdf .modal-body').html(dom);
  $('#RA_modal_visorpdf').modal("show");
}// muestraPDF()