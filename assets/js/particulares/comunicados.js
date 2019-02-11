path_home = "http://escuelapoblana.org/escuelapoblana_pdfs/";
    $(function() {
      console.info( "ready!" );
      document.title = 'normatividad | Particulares | Comunicados';
    });

    $("#EP_comunicados_iass").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/Invitacion - Afiliacion seguro social.pdf";
          muestraPDF(pdf);
    });
    $("#EP_comunicados_css").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/1 Cooperación - SDU y SEP.pdf";
          muestraPDF(pdf);
    });
    $("#EP_comunicados_calend").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/Calendario general 2018_SEP_INEE_SPD.pdf";
          muestraPDF(pdf);
    });
    $("#EP_comunicados_ahi").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/2 AcuerdoHorario de Invierno.pdf";
          muestraPDF(pdf);
    });
    $("#EP_comunicados_os2378").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/3 OFICIO SEO 2378-2016.pdf";
          muestraPDF(pdf);
    });

    $("#EP_comunicados_oprso").click(function(e){
          e.preventDefault();
          window.location.href = 'http://escuelapoblana.org/escuelapoblana_pdfs/escuelas_particulares/comunicados/OFICIO_PRIMER_REQUERIMIENTO_SUPERVISOR.docx';
    });
    $("#EP_comunicados_osrso").click(function(e){
          e.preventDefault();
          window.location.href = 'http://escuelapoblana.org/escuelapoblana_pdfs/escuelas_particulares/comunicados/OFICIO_SEGUNDO_REQUERIMIENTO_SUPERVISOR.docx';
    });

    $("#EP_comunicados_brpad").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/Profesiograma_Basica.pdf";
          muestraPDF(pdf);
    });
    $("#EP_comunicados_pms").click(function(e){
          e.preventDefault();
          pdf = path_home+"escuelas_particulares/comunicados/6. PROFESIOGRAMA_MS.pdf";
          muestraPDF(pdf);
    });


    function muestraPDF(pdf){
            var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
            $('#RA_modal_visorpdf .modal-body').empty();
            $('#RA_modal_visorpdf .modal-body').html(dom);
            $('#RA_modal_visorpdf').modal("show");
    }// muestraPDF()