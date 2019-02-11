path_home_L3 = "http://escuelapoblana.org/escuelapoblana_pdfs/";
  $(function() {
    console.info( "ready!" );
    document.title = 'normatividad | Particulares | actas de visitas';
  });

  $("#EP_actavisitas_vietn").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/Visita Extraordinaria con Instructivo DEC 2017.docx';
  });
  $("#EP_actavisitas_ottn").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.2. Opinion Tecnica _Todos los Niveles.docx';
  });
  $("#EP_actavisitas_avinei").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/1. Formato - Acta de Visita Inicial - Nivel inicial.docx';
  });
  $("#EP_actavisitas_aionei").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.4. Acta de Insp Ord _Nivel Educacion Inicial.docx';
  });
  $("#EP_actavisitas_avinpre").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2. Formato - Acta de Visita Inicial - Nivel Preescolar.docx';
  });
  $("#EP_actavisitas_aionp").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.6. Acta de Insp Ord_Nivel Preescolar.docx';
  });
  $("#EP_actavisitas_avinpri").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/3. Formato - de Visita Inicial - Nivel Primaria.docx';
  });
  $("#EP_actavisitas_airnpri").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.8. Acta de Insp Ord_Nivel Primaria.docx';
  });
  $("#EP_actavisitas_avinsg").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/4. Formato - de Visita Inicial - Nivel Secundaria General.docx';
  });
  $("#EP_actavisitas_aiong").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.10. Acta de Insp Ord_Nivel Secundaria General.docx';
  });
  $("#EP_actavisitas_avinst").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/5. Formato - de Visita Inicial - Nivel Secundaria Técnica.docx';
  });
  $("#EP_actavisitas_aionst").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.12. Acta de Insp Ord_Nivel Secundaria Tecnica.docx';
  });
  $("#EP_actavisitas_vinmsb").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/6. Formato - de Visita Inicial - Bachillerato Escolarizados y No Escolarizados.docx';
  });
  $("#EP_actavisitas_vionsb").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.14. Visita de inspeccion Ord_Nivel Media Superior Bachilleratos.docx';
  });
  $("#EP_actavisitas_vinmsc").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/7. Formato - de Visita Inicial - Nivel Media Superior - Capacitación para el trabajo.docx';
  });
  $("#EP_actavisitas_vionmsc").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/2.16. Visita de inspeccion Ord_Nivel Media Superior Capacitacion.docx';
  });
  $("#EP_actavisitas_avcv").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/Acta de Validación de Cursos de Verano.docx';
  });
  $("#EP_actavisitas_cdr").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/Carta de Deslinde de Responsabilidad.docx';
  });
  $("#EP_actavisitas_crpt").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/Carta Responsiva para Padres o Tutores.docx';
  });
  $("#EP_actavisitas_iviacv").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/Instrumento de Visita Inicial - Aprobación de Curso de Verano.docx';
  });
  $("#EP_actavisitas_lecmficv").click(function(e){
    e.preventDefault();
    pdf = path_home_L3+"escuelas_particulares/acta_visitas/Lineamientos que establecen los criterios mínimos de funcionamiento para impartir cursos de verano.pdf";
    muestraPDF(pdf);
  });
  $("#EP_actavisitas_shcr").click(function(e){
        e.preventDefault();
        window.location.href = path_home_L3+'escuelas_particulares/acta_visitas/Segunda hoja de la Carta Responsiva.xls';
  });
  $("#EP_actavisitas_acv2017").click(function(e){
    e.preventDefault();
    pdf = path_home_L3+"escuelas_particulares/acta_visitas/Acuerdo Cursos de Verano 2017.pdf";
    muestraPDF(pdf);
  });
  $("#EP_eaicv_16_17").click(function(e){
                  e.preventDefault();
                  pdf = path_home_L3+"escuelas_particulares/altas_bajas_recientes/Escuelas aprobadas para impartir Cursos de Verano 2017.pdf";
                  muestraPDF(pdf);
            });

  function muestraPDF(pdf){
    var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
    $('#RA_modal_visorpdf .modal-body').empty();
    $('#RA_modal_visorpdf .modal-body').html(dom);
    $('#RA_modal_visorpdf').modal("show");
  }// muestraPDF()
