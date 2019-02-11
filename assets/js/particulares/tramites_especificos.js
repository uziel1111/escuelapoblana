path_home = "http://escuelapoblana.org/escuelapoblana_pdfs/";
                  path_home_pdf_L2 = "http://escuelapoblana.org/escuelapoblana_pdfs/";
                  $(function() {
                        console.info( "ready!" );
                        document.title = 'normatividad | Particulares | Inicial';
                  });


                  $("#EP_tramitesespecificos_fpftd").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/3.0.FormatoProgramasFormacionTrabajoDAST_0617.docx';
                  });

                  $("#EP_tramitesespecificos_mcosd").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/3.1.Mapa curricular _OFICIAL_SEP_DAST_2017_0617.docx';
                        // window.open( 'escuelapoblana.org/escuelapoblana_pdfs/escuelas_particulares/tramites_especificos/3.1.Mapa%20curricular%20_OFICIAL_SEP_DAST_2017_0617.docx','_blank');
                  });

                  $("#EP_tramitesespecificos_fcc17").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/3.2.Formato de Cbio de Capac17.docx';
                  });

                  $("#EP_tramitesespecificos_fcamp17").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/3.3.Formato Cbio Alta Mat Proped17.docx';
                  });
                  $("#EP_tramitesespecificos_fac17").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/3.4.Formato Alta de Capac17.docx';
                  });


                  $("#EP_tramitesespecificos_appe17").click(function(e){
                        e.preventDefault();
                        pdf = path_home_pdf_L2+"escuelas_particulares/tramites_especificos/Acuerdo Plan y Programa Enfermería 2017.pdf";
                        muestraPDF(pdf);
                  });

                  $("#EP_tramitesespecificos_mce").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/Mapa Curricular Enfermería.docx';
                  });

                  $("#EP_tramitesespecificos_pee").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/Plan de Estudios Enfermería.docx';
                  });

                  $("#EP_tramitesespecificos_pps").click(function(e){
                        e.preventDefault();
                        window.location.href = path_home_pdf_L2+'escuelas_particulares/tramites_especificos/Programas por Semestre.zip';
                  });

    

                function muestraPDF(pdf){
                        var dom = '<iframe src="https://docs.google.com/viewer?url='+pdf+'&embedded=true" width="100%" height="500" style="border: none;"></iframe>';
                        $('#RA_modal_visorpdf .modal-body').empty();
                        $('#RA_modal_visorpdf .modal-body').html(dom);
                        $('#RA_modal_visorpdf').modal("show");
                }// muestraPDF()