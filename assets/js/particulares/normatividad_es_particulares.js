$(function() {
      console.info( "ready!" );
      document.title = 'normatividad | particulares';
});

  jQuery(document).ready(function() {

    $("#btn1_nep").click(function(){
      window.location = base_url+'escuela/normatividad';
    });

    $("#btn2_nep").click(function(){
      alert("PENDIENTE");
      // window.location = 'normatividad_particulares/basica.php';
    });

    $("#btn3_nep").click(function(){
      alert("PENDIENTE");
      // window.location = 'normatividad_particulares/mediasuperior.php';
    });

    $("#btn4_nep").click(function(){
      window.location = base_url+'escuela/tramites_especificos';
    });

    $("#btn5_nep").click(function(){
      window.location = base_url+'escuela/actas_de_visitas';
    });

    $("#btn6_nep").click(function(){
      window.location = base_url+'escuela/comunicados';
    });

    $("#btn7_nep").click(function(){
      // alert("PENDIENTE");
      window.location = base_url+'escuela/modelo_educativo_2016';
    });

    // Normatividad
    $("#btn1_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn2_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn3_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn4_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn5_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn6_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn7_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $(this).css({ transform:'scale(1,1)'});
        $("#btn2_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn3_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn4_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn5_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn6_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn7_nep").css({ opacity: '1', transform:'scale(1,1)'});
    });

    $("#btn2_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn1_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn3_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn4_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn5_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn6_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn7_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $("#btn1_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn3_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn4_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn5_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn6_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn7_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $(this).css({ transform:'scale(1,1)'});
    });

    $("#btn3_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn1_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn2_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn4_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn5_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn6_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn7_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $("#btn1_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn2_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn4_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn5_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn6_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn7_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $(this).css({ transform:'scale(1,1)'});
    });

    $("#btn4_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn1_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn2_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn3_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn5_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn6_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn7_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $("#btn1_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn2_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn3_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn5_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn6_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn7_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $(this).css({ transform:'scale(1,1)'});
    });

    $("#btn5_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn1_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn2_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn3_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn4_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn6_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn7_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $("#btn1_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn2_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn3_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn4_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn6_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn7_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $(this).css({ transform:'scale(1,1)'});
    });

    $("#btn6_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn1_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn2_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn3_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn4_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn5_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn7_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $("#btn1_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn2_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn3_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn4_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn5_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn7_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $(this).css({ transform:'scale(1,1)'});
    });

    $("#btn7_nep").hover(function(){
        $(this).css({ transform:'scale(1.1,1.1)'});
        $("#btn1_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn2_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn3_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn4_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn5_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        $("#btn6_nep").css({ opacity: '0.6', transform:'scale(.8,.8)'});
        }, function(){
        $("#btn1_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn2_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn3_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn4_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn5_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $("#btn6_nep").css({ opacity: '1', transform:'scale(1,1)'});
        $(this).css({ transform:'scale(1,1)'});
    });


  });