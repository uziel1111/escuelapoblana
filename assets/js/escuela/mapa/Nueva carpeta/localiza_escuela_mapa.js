$(function() {
      obj_LE = new BuscaenMapa();
      obj_LE.getMunicipios();
      obj_LE.getNivelesMunicipio(1);
      obj_LE.getSostenimiento(1,"TODOS");
});

$("#LM_modal_btncancelar").click(function(e){
  e.preventDefault();
  window.location="index.php";
});

$("#LM_select_idmunicipio").change(function(){
      var id_municipio =  $("#LM_select_idmunicipio").val();
      console.info("id_municipio: "+id_municipio);
      obj_LE.getNivelesMunicipio(id_municipio);
});

$("#LM_select_nivel").change(function(){
      var id_municipio = $("#LM_select_idmunicipio").val();
      var id_nivel   = $("#LM_select_nivel").val();
      obj_LE.getSostenimiento(id_municipio, id_nivel);
});

$("#LM_modal_btnbuscar").click(function(e){
  e.preventDefault();
  obj_LE.validaCCT()
});

$("#LM_btn_rebuscar").click(function(e){
  e.preventDefault();
  window.location="localiza_escuela_mapa.php";
  /*
  obj_LE.reloadBusqueda();
  // $("#LM_modal").modal("show");
  obj_LE.getMunicipios();
  obj_LE.getNivelesMunicipio(1);
  obj_LE.getSostenimiento(1,"TODOS");
  */
});

$("#LM_text_CCT").keyup(function() {
  $("#LM_text_CCT").css({ 'text-transform':'uppercase' });
});

$("#LM_modal_busqueda_btnsalir").click(function(e){
  e.preventDefault();
  window.location="index.php";
});





function BuscaenMapa(){
  console.table(marker);
    tmp_mapa = this
    tmp_mapa.id_municipio = 1;

    this.getMunicipios = function(){
      var ruta = "app/controllers/lista_escuelas.inicial.php";
      $.ajax({
        url: ruta,
        method: 'POST',
        data: {'action':'municipio'},
        beforeSend: function( xhr ) {
          obj_message.loading("Descargando datos");
        }
      })
      .done(function( data ) {
        var html =data;
        // $("#le_totalRegistros").empty();
        $("#LM_text_escuela").val("");
        $("#LM_text_CCT").val("");
        $("#LM_select_idmunicipio").empty();
        $("#LM_select_idmunicipio").append(html);
        swal.close();
      })
      .fail(function(e) {
        console.error("Error in getMunicipios()"); console.table(e);
      });
    }// getMunicipios()


    this.getNivelesMunicipio = function(id_municipio){
        var ruta = "app/controllers/lista_escuelas.inicial.php";
        $.ajax({
          url: ruta,
          method: 'POST',
          // data: {'id_municipio':id_municipio},
          data: {'action':'nivel', 'id_municipio':id_municipio},
          beforeSend: function( xhr ) {
            obj_message.loading("Descargando datos");
          }
        })
        .done(function( data ) {
          var html =data;
          $("#LM_text_escuela").empty();
          $("#LM_text_CCT").empty();
          $("#LM_select_nivel").empty();
          $("#LM_select_nivel").append(html);
          swal.close();
        })
        .fail(function(e) {
          console.error("Error in getNivelesMunicipio()"); console.table(e);
        });
    }// getNivelesMunicipio()

    this.getSostenimiento = function(id_municipio, id_nivel){
            var ruta = "app/controllers/lista_escuelas.inicial.php";
            $.ajax({
              url: ruta,
              method: 'POST',
              data: {'action':'sostenimiento','id_municipio':id_municipio, 'id_nivel':id_nivel},
              beforeSend: function( xhr ) {
                obj_message.loading("Descargando datos");
              }
            })
            .done(function( data ) {
              var html =data;
              $("#LM_select_sostenimiento").empty();
              $("#LM_select_sostenimiento").append(html); // añadimos a la tabla
              swal.close();
              $("#LM_modal").modal("show");
            })
            .fail(function(e) {
              console.error("Error in getSostenimiento()"); console.table(e);
            });
    }// getSostenimiento()

    this.validaCCT = function(){
      var cct =  $("#LM_text_CCT").val();
      cct = cct.toUpperCase();
        if(cct.trim().length>0){ // Si el usuario escribio CCT
             if(RE_CCT(cct)){ // Verificamos que cumpla con la expresión regular
                $("#LM_modal").modal("hide");
                $("#LM_resultados_busqueda").text("CCT: "+cct);
                obj_LE.posicionaenCCT(cct); // Paso la validación, vamos a la función que lo va a colocar directamente en la escuela
              }else{
               obj_message.notification("","el CCT no cumple el formato, si no está seguro(a) de cómo escribirlo por favor deje el campo en blanco","error");
             }
        }else{
            obj_LE.validaBusqueda();
            $("#LM_modal").modal("hide");
        }
    }// validaCCT()

    this.validaBusqueda = function(){
        var id_municipio     = $("#LM_select_idmunicipio").val();
        var nombre_municipio = $("#LM_select_idmunicipio option:selected").text();
        var id_nivel         = $("#LM_select_nivel").val();
        var nombre_nivel     = $("#LM_select_nivel option:selected").text();
        var id_sostenimiento = $("#LM_select_sostenimiento").val();
        var sostenimiento    = $("#LM_select_sostenimiento option:selected").text();
        var nombre_escuela   = $("#LM_text_escuela").val();

        var escuela = (nombre_escuela.trim().length>0)?nombre_escuela:"No especificado";
        $("#LM_resultados_busqueda").text("Municipio: "+nombre_municipio+",  Nivel: "+nombre_nivel+",  Sostenimiento: "+sostenimiento+",  Escuela: "+escuela);

        var cct =  $("#LM_text_CCT").val();
        obj_LE.localizaEscuelasMapa(id_municipio,nombre_municipio,id_nivel,nombre_nivel,sostenimiento,nombre_escuela,cct);
    }// validaBusqueda()

    this.localizaEscuelasMapa = function(id_municipio,nombre_municipio,id_nivel,nombre_nivel,sostenimiento,nombre_escuela,cct){
        obj_LE.posicionaEnMunicipio(id_municipio);
        obj_LE.posicionaEnNivel(nombre_nivel,sostenimiento, function(result){
                obj_LE.posicionaEnSostenimiento(result,sostenimiento, function(result2){
                      obj_LE.posicionaEnNombreEscuela(result2,nombre_escuela,function(result3){
                          obj_LE.posicionaFinal(result3);
                      });
                });
        });
    }// localizaEscuelasMapa()

    this.posicionaEnMunicipio = function(id_municipio){
      console.info("posicionaEnMunicipio()->id_municipio: "+id_municipio);
                  if (id_municipio==0)        {  map.setCenter( new google.maps.LatLng(19.282952 , -98.209877  ));map.setZoom(8);}
          else if (id_municipio==1)       {  map.setCenter( new google.maps.LatLng(19.105729   ,-97.942942  ));map.setZoom(15);}
          else if (id_municipio==2)       {  map.setCenter( new google.maps.LatLng(20.130106   ,-97.209029  ));map.setZoom(15);}
          else if (id_municipio==3)       { map.setCenter( new google.maps.LatLng(18.20192   ,-98.048443  ));map.setZoom(15);}
          else if (id_municipio==4)       { map.setCenter( new google.maps.LatLng(18.980637   ,-97.784272  ));map.setZoom(15);}
          else if (id_municipio==5)       { map.setCenter( new google.maps.LatLng(18.764897   ,-98.714741  ));map.setZoom(15);}
          else if (id_municipio==6)       { map.setCenter( new google.maps.LatLng(20.006317   ,-97.858593  ));map.setZoom(15);}
          else if (id_municipio==7)       { map.setCenter( new google.maps.LatLng(18.571152   ,-98.256539  ));map.setZoom(15);}
          else if (id_municipio==8)       { map.setCenter( new google.maps.LatLng(20.044323   ,-98.161821  ));map.setZoom(15);}
          else if (id_municipio==9)       { map.setCenter( new google.maps.LatLng(18.214532   ,-98.218919  ));map.setZoom(15);}
          else if (id_municipio==10)    { map.setCenter( new google.maps.LatLng(18.378158   ,-97.259125  ));map.setZoom(15);}
          else if (id_municipio==11)    { map.setCenter( new google.maps.LatLng(18.017047   ,-98.541033  ));map.setZoom(15);}
          else if (id_municipio==12)    { map.setCenter( new google.maps.LatLng(19.09775   ,-97.531763  ));map.setZoom(15);}
          else if (id_municipio==13)    { map.setCenter( new google.maps.LatLng(18.36936   ,-97.298222  ));map.setZoom(15);}
          else if (id_municipio==14)    { map.setCenter( new google.maps.LatLng(20.047034   ,-97.799005  ));map.setZoom(15);}
          else if (id_municipio==15)    { map.setCenter( new google.maps.LatLng(19.042459   ,-98.041063  ));map.setZoom(15);}
          else if (id_municipio==16)    { map.setCenter( new google.maps.LatLng(19.796965   ,-97.935903  ));map.setZoom(15);}
          else if (id_municipio==17)    { map.setCenter( new google.maps.LatLng(19.837959   ,-97.456444  ));map.setZoom(15);}
          else if (id_municipio==18)    { map.setCenter( new google.maps.LatLng(18.399528   ,-97.736683  ));map.setZoom(15);}
          else if (id_municipio==19)    { map.setCenter( new google.maps.LatLng(18.913123   ,-98.429389  ));map.setZoom(15);}
          else if (id_municipio==20)    { map.setCenter( new google.maps.LatLng(18.82083   ,-97.912987  ));map.setZoom(15);}
          else if (id_municipio==21)    { map.setCenter( new google.maps.LatLng(18.543829   ,-98.554332  ));map.setZoom(15);}
          else if (id_municipio==22)    { map.setCenter( new google.maps.LatLng(18.824342   ,-98.583355  ));map.setZoom(15);}
          else if (id_municipio==23)    { map.setCenter( new google.maps.LatLng(18.897608   ,-97.325998  ));map.setZoom(15);}
          else if (id_municipio==24)    { map.setCenter( new google.maps.LatLng(18.18821   ,-98.389831  ));map.setZoom(15);}
          else if (id_municipio==25)    { map.setCenter( new google.maps.LatLng(20.096373   ,-97.410325  ));map.setZoom(15);}
          else if (id_municipio==26)    { map.setCenter( new google.maps.LatLng(19.10476   ,-98.465011  ));map.setZoom(15);}
          else if (id_municipio==27)    { map.setCenter( new google.maps.LatLng(18.182366   ,-97.47993  ));map.setZoom(15);}
          else if (id_municipio==28)    { map.setCenter( new google.maps.LatLng(20.037488   ,-97.75661  ));map.setZoom(15);}
          else if (id_municipio==29)    { map.setCenter( new google.maps.LatLng(20.063359   ,-97.606506  ));map.setZoom(15);}
          else if (id_municipio==30)    { map.setCenter( new google.maps.LatLng(20.059733   ,-97.731571  ));map.setZoom(15);}
          else if (id_municipio==31)    { map.setCenter( new google.maps.LatLng(18.614657   ,-98.172921  ));map.setZoom(15);}
          else if (id_municipio==32)    { map.setCenter( new google.maps.LatLng(18.206046   ,-98.80558  ));map.setZoom(15);}
          else if (id_municipio==33)    { map.setCenter( new google.maps.LatLng(18.78397   ,-98.719825  ));map.setZoom(15);}
          else if (id_municipio==34)    { map.setCenter( new google.maps.LatLng(19.120191   ,-98.306943  ));map.setZoom(15);}
          else if (id_municipio==35)    { map.setCenter( new google.maps.LatLng(18.265544   ,-97.150376  ));map.setZoom(15);}
          else if (id_municipio==36)    { map.setCenter( new google.maps.LatLng(18.279844   ,-96.987861  ));map.setZoom(15);}
          else if (id_municipio==37)    { map.setCenter( new google.maps.LatLng(18.402396   ,-97.832862  ));map.setZoom(15);}
          else if (id_municipio==38)    { map.setCenter( new google.maps.LatLng(18.918911   ,-97.825917  ));map.setZoom(15);}
          else if (id_municipio==39)    { map.setCenter( new google.maps.LatLng(19.915121   ,-97.794969  ));map.setZoom(15);}
          else if (id_municipio==40)    { map.setCenter( new google.maps.LatLng(18.954221   ,-98.017461  ));map.setZoom(15);}
          else if (id_municipio==41)    { map.setCenter( new google.maps.LatLng(19.096634   ,-98.272463  ));map.setZoom(15);}
          else if (id_municipio==42)    { map.setCenter( new google.maps.LatLng(18.479959   ,-98.185768  ));map.setZoom(15);}
          else if (id_municipio==43)    { map.setCenter( new google.maps.LatLng(20.017635   ,-97.52337  ));map.setZoom(15);}
          else if (id_municipio==44)    { map.setCenter( new google.maps.LatLng(19.601789   ,-97.621089  ));map.setZoom(15);}
          else if (id_municipio==45)    { map.setCenter( new google.maps.LatLng(18.9854  ,-97.44449  ));map.setZoom(15);}
          else if (id_municipio==46)    { map.setCenter( new google.maps.LatLng(18.959881   ,-98.17662  ));map.setZoom(15);}
          else if (id_municipio==47)    { map.setCenter( new google.maps.LatLng(18.299696   ,-98.60214  ));map.setZoom(15);}
          else if (id_municipio==48)    { map.setCenter( new google.maps.LatLng(19.205611   ,-98.467713  ));map.setZoom(15);}
          else if (id_municipio==49)    { map.setCenter( new google.maps.LatLng(20.094863   ,-97.937985  ));map.setZoom(15);}
          else if (id_municipio==50)    { map.setCenter( new google.maps.LatLng(19.199513   ,-97.067103  ));map.setZoom(15);}
          else if (id_municipio==51)    { map.setCenter( new google.maps.LatLng(18.520631   ,-98.578243  ));map.setZoom(15);}
          else if (id_municipio==52)    { map.setCenter( new google.maps.LatLng(18.645492   ,-98.075078  ));map.setZoom(15);}
          else if (id_municipio==53)    { map.setCenter( new google.maps.LatLng(19.838377   ,-98.031208  ));map.setZoom(15);}
          else if (id_municipio==54)    { map.setCenter( new google.maps.LatLng(19.812614   ,-97.388819  ));map.setZoom(15);}
          else if (id_municipio==55)    { map.setCenter( new google.maps.LatLng(17.971258   ,-97.861185  ));map.setZoom(15);}
          else if (id_municipio==56)    { map.setCenter( new google.maps.LatLng(18.107468   ,-98.483165  ));map.setZoom(15);}
          else if (id_municipio==57)    { map.setCenter( new google.maps.LatLng(20.238568   ,-98.212511  ));map.setZoom(15);}
          else if (id_municipio==58)    { map.setCenter( new google.maps.LatLng(19.253692   ,-97.183541  ));map.setZoom(15);}
          else if (id_municipio==59)    { map.setCenter( new google.maps.LatLng(18.20257   ,-98.26343  ));map.setZoom(15);}
          else if (id_municipio==60)    { map.setCenter( new google.maps.LatLng(19.138847   ,-98.453425  ));map.setZoom(15);}
          else if (id_municipio==61)    { map.setCenter( new google.maps.LatLng(18.501123   ,-96.952908  ));map.setZoom(15);}
          else if (id_municipio==62)    { map.setCenter( new google.maps.LatLng(18.644639   ,-98.369409  ));map.setZoom(15);}
          else if (id_municipio==63)    { map.setCenter( new google.maps.LatLng(18.857998   ,-97.373542  ));map.setZoom(15);}
          else if (id_municipio==64)    { map.setCenter( new google.maps.LatLng(20.732904   ,-97.850084  ));map.setZoom(15);}
          else if (id_municipio==65)    { map.setCenter( new google.maps.LatLng(18.993883   ,-97.706978  ));map.setZoom(15);}
          else if (id_municipio==66)    { map.setCenter( new google.maps.LatLng(18.088834   ,-98.120308  ));map.setZoom(15);}
          else if (id_municipio==67)    { map.setCenter( new google.maps.LatLng(19.287238   ,-97.343554  ));map.setZoom(15);}
          else if (id_municipio==68)    { map.setCenter( new google.maps.LatLng(20.120751   ,-97.743655  ));map.setZoom(15);}
          else if (id_municipio==69)    { map.setCenter( new google.maps.LatLng(18.76834   ,-98.541797  ));map.setZoom(15);}
          else if (id_municipio==70)    { map.setCenter( new google.maps.LatLng(18.682533   ,-98.046257  ));map.setZoom(15);}
          else if (id_municipio==71)    { map.setCenter( new google.maps.LatLng(20.1757   ,-98.062886  ));map.setZoom(15);}
          else if (id_municipio==72)    { map.setCenter( new google.maps.LatLng(20.116667   ,-97.633333  ));map.setZoom(15);}
          else if (id_municipio==73)    { map.setCenter( new google.maps.LatLng(18.373401   ,-98.690048  ));map.setZoom(15);}
          else if (id_municipio==74)    { map.setCenter( new google.maps.LatLng(19.158945   ,-98.404716  ));map.setZoom(15);}
          else if (id_municipio==75)    { map.setCenter( new google.maps.LatLng(19.882566   ,-97.445486  ));map.setZoom(15);}
          else if (id_municipio==76)    { map.setCenter( new google.maps.LatLng(19.940103   ,-97.289566  ));map.setZoom(15);}
          else if (id_municipio==77)    { map.setCenter( new google.maps.LatLng(20.026341   ,-97.698029  ));map.setZoom(15);}
          else if (id_municipio==78)    { map.setCenter( new google.maps.LatLng(19.970597   ,-97.693514  ));map.setZoom(15);}
          else if (id_municipio==79)    { map.setCenter( new google.maps.LatLng(18.770536   ,-97.881722  ));map.setZoom(15);}
          else if (id_municipio==80)    { map.setCenter( new google.maps.LatLng(20.012966   ,-97.623923  ));map.setZoom(15);}
          else if (id_municipio==81)    { map.setCenter( new google.maps.LatLng(18.031589   ,-98.696157  ));map.setZoom(15);}
          else if (id_municipio==82)    { map.setCenter( new google.maps.LatLng(18.458685   ,-97.831356  ));map.setZoom(15);}
          else if (id_municipio==83)    { map.setCenter( new google.maps.LatLng(19.622331   ,-97.814904  ));map.setZoom(15);}
          else if (id_municipio==84)    { map.setCenter( new google.maps.LatLng(20.024364   ,-97.645591  ));map.setZoom(15);}
          else if (id_municipio==85)    { map.setCenter( new google.maps.LatLng(18.599125   ,-98.467785  ));map.setZoom(15);}
          else if (id_municipio==86)    { map.setCenter( new google.maps.LatLng(20.477424   ,-97.94258  ));map.setZoom(15);}
          else if (id_municipio==87)    { map.setCenter( new google.maps.LatLng(18.320166   ,-98.843339  ));map.setZoom(15);}
          else if (id_municipio==88)    { map.setCenter( new google.maps.LatLng(20.030676   ,-97.575386  ));map.setZoom(15);}
          else if (id_municipio==89)    { map.setCenter( new google.maps.LatLng(20.162844   ,-97.692798  ));map.setZoom(15);}
          else if (id_municipio==90)    { map.setCenter( new google.maps.LatLng(19.106853   ,-98.326406  ));map.setZoom(15);}
          else if (id_municipio==91)    { map.setCenter( new google.maps.LatLng(20.209869   ,-98.000482  ));map.setZoom(15);}
          else if (id_municipio==92)    { map.setCenter( new google.maps.LatLng(18.543683   ,-97.772748  ));map.setZoom(15);}
          else if (id_municipio==93)    { map.setCenter( new google.maps.LatLng(19.296038   ,-97.296882  ));map.setZoom(15);}
          else if (id_municipio==94)    { map.setCenter( new google.maps.LatLng(19.468203   ,-97.684657  ));map.setZoom(15);}
          else if (id_municipio==95)    { map.setCenter( new google.maps.LatLng(18.758452   ,-98.100684  ));map.setZoom(15);}
          else if (id_municipio==96)    { map.setCenter( new google.maps.LatLng(19.118824   ,-97.701265  ));map.setZoom(15);}
          else if (id_municipio==97)    { map.setCenter( new google.maps.LatLng(18.903057   ,-97.896368  ));map.setZoom(15);}
          else if (id_municipio==98)    { map.setCenter( new google.maps.LatLng(18.738162   ,-97.911042  ));map.setZoom(15);}
          else if (id_municipio==99)    { map.setCenter( new google.maps.LatLng(18.736306   ,-97.422913  ));map.setZoom(15);}
          else if (id_municipio==100)  { map.setCenter( new google.maps.LatLng(20.232296   ,-98.106983  ));map.setZoom(15);}
          else if (id_municipio==101)  { map.setCenter( new google.maps.LatLng(19.960788   ,-97.603735  ));map.setZoom(15);}
          else if (id_municipio==102)  { map.setCenter( new google.maps.LatLng(19.048275   ,-98.426938  ));map.setZoom(15);}
          else if (id_municipio==103)  { map.setCenter( new google.maps.LatLng(18.61458   ,-97.306155  ));map.setZoom(15);}
          else if (id_municipio==104)  { map.setCenter( new google.maps.LatLng(19.216929   ,-97.825268  ));map.setZoom(15);}
          else if (id_municipio==105)  { map.setCenter( new google.maps.LatLng(19.552846   ,-97.647114  ));map.setZoom(15);}
          else if (id_municipio==106)  { map.setCenter( new google.maps.LatLng(18.941654   ,-98.319795  ));map.setZoom(15);}
          else if (id_municipio==107)  { map.setCenter( new google.maps.LatLng(20.101114   ,-97.684142  ));map.setZoom(15);}
          else if (id_municipio==108)  { map.setCenter( new google.maps.LatLng(19.366667   ,-97.616667  ));map.setZoom(15);}
          else if (id_municipio==109)  { map.setCenter( new google.maps.LatLng(20.276934   ,-98.150161  ));map.setZoom(15);}
          else if (id_municipio==110)  { map.setCenter( new google.maps.LatLng(18.83592   ,-97.549097  ));map.setZoom(15);}
          else if (id_municipio==111)  { map.setCenter( new google.maps.LatLng(20.520016   ,-97.938857  ));map.setZoom(15);}
          else if (id_municipio==112)  { map.setCenter( new google.maps.LatLng(18.083116   ,-97.917926  ));map.setZoom(15);}
          else if (id_municipio==113)  { map.setCenter( new google.maps.LatLng(18.197635   ,-98.25465  ));map.setZoom(15);}
          else if (id_municipio==114)  { map.setCenter( new google.maps.LatLng(19.041307   ,-98.206193  ));map.setZoom(15);}
          else if (id_municipio==115)  { map.setCenter( new google.maps.LatLng(18.95545   ,-97.657524  ));map.setZoom(15);}
          else if (id_municipio==116)  { map.setCenter( new google.maps.LatLng(19.252592   ,-97.137146  ));map.setZoom(15);}
          else if (id_municipio==117)  { map.setCenter( new google.maps.LatLng(19.227786   ,-97.804954  ));map.setZoom(15);}
          else if (id_municipio==118)  { map.setCenter( new google.maps.LatLng(18.94634   ,-97.806009  ));map.setZoom(15);}
          else if (id_municipio==119)  { map.setCenter( new google.maps.LatLng(19.037801   ,-98.300709  ));map.setZoom(15);}
          else if (id_municipio==120)  { map.setCenter( new google.maps.LatLng(18.510381   ,-97.291104  ));map.setZoom(15);}
          else if (id_municipio==121)  { map.setCenter( new google.maps.LatLng(18.810983   ,-98.331035  ));map.setZoom(15);}
          else if (id_municipio==122)  { map.setCenter( new google.maps.LatLng(19.23467   ,-98.50117  ));map.setZoom(15);}
          else if (id_municipio==123)  { map.setCenter( new google.maps.LatLng(20.090866   ,-97.796471  ));map.setZoom(15);}
          else if (id_municipio==124)  { map.setCenter( new google.maps.LatLng(18.326135   ,-97.348573  ));map.setZoom(15);}
          else if (id_municipio==125)  { map.setCenter( new google.maps.LatLng(19.021677   ,-98.350165  ));map.setZoom(15);}
          else if (id_municipio==126)  { map.setCenter( new google.maps.LatLng(19.037675   ,-98.41294  ));map.setZoom(15);}
          else if (id_municipio==127)  { map.setCenter( new google.maps.LatLng(18.22273   ,-97.910265  ));map.setZoom(15);}
          else if (id_municipio==128)  { map.setCenter( new google.maps.LatLng(19.238842   ,-97.767715  ));map.setZoom(15);}
          else if (id_municipio==129)  { map.setCenter( new google.maps.LatLng(18.291561   ,-97.289566  ));map.setZoom(15);}
          else if (id_municipio==130)  { map.setCenter( new google.maps.LatLng(19.0857   ,-97.539792  ));map.setZoom(15);}
          else if (id_municipio==131)  { map.setCenter( new google.maps.LatLng(18.745775   ,-98.023791  ));map.setZoom(15);}
          else if (id_municipio==132)  { map.setCenter( new google.maps.LatLng(19.284383   ,-98.434873  ));map.setZoom(15);}
          else if (id_municipio==133)  { map.setCenter( new google.maps.LatLng(18.651929   ,-98.346217  ));map.setZoom(15);}
          else if (id_municipio==134)  { map.setCenter( new google.maps.LatLng(19.322261   ,-98.499193  ));map.setZoom(15);}
          else if (id_municipio==135)  { map.setCenter( new google.maps.LatLng(18.002526   ,-97.773774  ));map.setZoom(15);}
          else if (id_municipio==136)  { map.setCenter( new google.maps.LatLng(19.166942   ,-98.307277  ));map.setZoom(15);}
          else if (id_municipio==137)  { map.setCenter( new google.maps.LatLng(19.163435   ,-97.55095  ));map.setZoom(15);}
          else if (id_municipio==138)  { map.setCenter( new google.maps.LatLng(19.071195   ,-98.485618  ));map.setZoom(15);}
          else if (id_municipio==139)  { map.setCenter( new google.maps.LatLng(18.124038   ,-98.085664  ));map.setZoom(15);}
          else if (id_municipio==140)  { map.setCenter( new google.maps.LatLng(19.056865   ,-98.305237  ));map.setZoom(15);}
          else if (id_municipio==141)  { map.setCenter( new google.maps.LatLng(18.117134   ,-98.077108  ));map.setZoom(15);}
          else if (id_municipio==142)  { map.setCenter( new google.maps.LatLng(19.130426   ,-97.638537  ));map.setZoom(15);}
          else if (id_municipio==143)  { map.setCenter( new google.maps.LatLng(19.268544   ,-98.516506  ));map.setZoom(15);}
          else if (id_municipio==144)  { map.setCenter( new google.maps.LatLng(18.915066   ,-97.776988  ));map.setZoom(15);}
          else if (id_municipio==145)  { map.setCenter( new google.maps.LatLng(18.404155   ,-96.849458  ));map.setZoom(15);}
          else if (id_municipio==146)  { map.setCenter( new google.maps.LatLng(18.61559   ,-98.081122  ));map.setZoom(15);}
          else if (id_municipio==147)  { map.setCenter( new google.maps.LatLng(18.412491   ,-98.016952  ));map.setZoom(15);}
          else if (id_municipio==148)  { map.setCenter( new google.maps.LatLng(18.992496   ,-98.377875  ));map.setZoom(15);}
          else if (id_municipio==149)  { map.setCenter( new google.maps.LatLng(18.54804   ,-97.443544  ));map.setZoom(15);}
          else if (id_municipio==150)  { map.setCenter( new google.maps.LatLng(18.736247   ,-98.165576  ));map.setZoom(15);}
          else if (id_municipio==151)  { map.setCenter( new google.maps.LatLng(18.890465   ,-97.866394  ));map.setZoom(15);}
          else if (id_municipio==152)  { map.setCenter( new google.maps.LatLng(19.124189   ,-97.71723  ));map.setZoom(15);}
          else if (id_municipio==153)  { map.setCenter( new google.maps.LatLng(18.902238   ,-97.974209  ));map.setZoom(15);}
          else if (id_municipio==154)  { map.setCenter( new google.maps.LatLng(18.88191   ,-97.732726  ));map.setZoom(15);}
          else if (id_municipio==155)  { map.setCenter( new google.maps.LatLng(18.107887   ,-98.313155  ));map.setZoom(15);}
          else if (id_municipio==156)  { map.setCenter( new google.maps.LatLng(18.466506   ,-97.40038  ));map.setZoom(15);}
          else if (id_municipio==157)  { map.setCenter( new google.maps.LatLng(18.329705   ,-98.275853  ));map.setZoom(15);}
          else if (id_municipio==158)  { map.setCenter( new google.maps.LatLng(20.17035   ,-97.405473  ));map.setZoom(15);}
          else if (id_municipio==159)  { map.setCenter( new google.maps.LatLng(18.713651   ,-98.262277  ));map.setZoom(15);}
          else if (id_municipio==160)  { map.setCenter( new google.maps.LatLng(18.469048   ,-98.778355  ));map.setZoom(15);}
          else if (id_municipio==161)  { map.setCenter( new google.maps.LatLng(18.553792   ,-97.560532  ));map.setZoom(15);}
          else if (id_municipio==162)  { map.setCenter( new google.maps.LatLng(20.003906   ,-97.797189  ));map.setZoom(15);}
          else if (id_municipio==163)  { map.setCenter( new google.maps.LatLng(19.077874   ,-97.972909  ));map.setZoom(15);}
          else if (id_municipio==164)  { map.setCenter( new google.maps.LatLng(18.965955   ,-97.899376  ));map.setZoom(15);}
          else if (id_municipio==165)  { map.setCenter( new google.maps.LatLng(18.732748   ,-98.628679  ));map.setZoom(15);}
          else if (id_municipio==166)  { map.setCenter( new google.maps.LatLng(18.720316   ,-98.446888  ));map.setZoom(15);}
          else if (id_municipio==167)  { map.setCenter( new google.maps.LatLng(19.966938   ,-97.841566  ));map.setZoom(15);}
          else if (id_municipio==168)  { map.setCenter( new google.maps.LatLng(18.643996   ,-98.690161  ));map.setZoom(15);}
          else if (id_municipio==169)  { map.setCenter( new google.maps.LatLng(18.579223   ,-97.927321  ));map.setZoom(15);}
          else if (id_municipio==170)  { map.setCenter( new google.maps.LatLng(19.489913   ,-97.491242  ));map.setZoom(15);}
          else if (id_municipio==171)  { map.setCenter( new google.maps.LatLng(18.813888   ,-97.877146  ));map.setZoom(15);}
          else if (id_municipio==172)  { map.setCenter( new google.maps.LatLng(19.811584   ,-97.809604  ));map.setZoom(15);}
          else if (id_municipio==173)  { map.setCenter( new google.maps.LatLng(19.858776   ,-97.45698  ));map.setZoom(15);}
          else if (id_municipio==174)  { map.setCenter( new google.maps.LatLng(19.816011   ,-97.357058  ));map.setZoom(15);}
          else if (id_municipio==175)  { map.setCenter( new google.maps.LatLng(19.01773   ,-98.462299  ));map.setZoom(15);}
          else if (id_municipio==176)  { map.setCenter( new google.maps.LatLng(18.593815   ,-98.553919  ));map.setZoom(15);}
          else if (id_municipio==177)  { map.setCenter( new google.maps.LatLng(18.681626   ,-97.648318  ));map.setZoom(15);}
          else if (id_municipio==179)  { map.setCenter( new google.maps.LatLng(20.325817   ,-98.06854  ));map.setZoom(15);}
          else if (id_municipio==180)  { map.setCenter( new google.maps.LatLng(19.112816   ,-97.419209  ));map.setZoom(15);}
          else if (id_municipio==180)  { map.setCenter( new google.maps.LatLng(19.336704   ,-98.582436  ));map.setZoom(15);}
          else if (id_municipio==181)  { map.setCenter( new google.maps.LatLng(19.170585   ,-98.342286  ));map.setZoom(15);}
          else if (id_municipio==182)  { map.setCenter( new google.maps.LatLng(18.864503   ,-97.888619  ));map.setZoom(15);}
          else if (id_municipio==183)  { map.setCenter( new google.maps.LatLng(20.136417   ,-97.921296  ));map.setZoom(15);}
          else if (id_municipio==184)  { map.setCenter( new google.maps.LatLng(20.122503   ,-97.851357  ));map.setZoom(15);}
          else if (id_municipio==185)  { map.setCenter( new google.maps.LatLng(18.695746   ,-98.533676  ));map.setZoom(15);}
          else if (id_municipio==186)  { map.setCenter( new google.maps.LatLng(19.846355   ,-97.497198  ));map.setZoom(15);}
          else if (id_municipio==187)  { map.setCenter( new google.maps.LatLng(20.421227   ,-98.028791  ));map.setZoom(15);}
          else if (id_municipio==188)  { map.setCenter( new google.maps.LatLng(18.890555   ,-98.572554  ));map.setZoom(15);}
          else if (id_municipio==189)  { map.setCenter( new google.maps.LatLng(18.836533   ,-97.820479  ));map.setZoom(15);}
          else if (id_municipio==190)  { map.setCenter( new google.maps.LatLng(18.223482   ,-97.855448  ));map.setZoom(15);}
          else if (id_municipio==191)  { map.setCenter( new google.maps.LatLng(18.043023   ,-98.439269  ));map.setZoom(15);}
          else if (id_municipio==192)  { map.setCenter( new google.maps.LatLng(20.06627   ,-97.575285  ));map.setZoom(15);}
          else if (id_municipio==193)  { map.setCenter( new google.maps.LatLng(18.840523   ,-98.047  ));map.setZoom(15);}
          else if (id_municipio==194)  { map.setCenter( new google.maps.LatLng(20.50833   ,-97.672446  ));map.setZoom(15);}
          else if (id_municipio==195)  { map.setCenter( new google.maps.LatLng(18.542195   ,-97.197133  ));map.setZoom(15);}
          else if (id_municipio==196)  { map.setCenter( new google.maps.LatLng(18.238905   ,-97.975506  ));map.setZoom(15);}
          else if (id_municipio==197)  { map.setCenter( new google.maps.LatLng(20.278621   ,-97.964259  ));map.setZoom(15);}
          else if (id_municipio==198)  { map.setCenter( new google.maps.LatLng(18.060722   ,-98.524912  ));map.setZoom(15);}
          else if (id_municipio==199)  { map.setCenter( new google.maps.LatLng(19.792927   ,-97.324964  ));map.setZoom(15);}
          else if (id_municipio==200)  { map.setCenter( new google.maps.LatLng(19.820327   ,-97.658768  ));map.setZoom(15);}
          else if (id_municipio==201)  { map.setCenter( new google.maps.LatLng(18.650472   ,-98.340331  ));map.setZoom(15);}
          else if (id_municipio==202)  { map.setCenter( new google.maps.LatLng(19.968745   ,-97.629045  ));map.setZoom(15);}
          else if (id_municipio==203)  { map.setCenter( new google.maps.LatLng(18.702371   ,-97.777055  ));map.setZoom(15);}
          else if (id_municipio==204)  { map.setCenter( new google.maps.LatLng(19.876013   ,-97.465505  ));map.setZoom(15);}
          else if (id_municipio==205)  { map.setCenter( new google.maps.LatLng(18.795868   ,-97.662949  ));map.setZoom(15);}
          else if (id_municipio==206)  { map.setCenter( new google.maps.LatLng(18.595941   ,-98.065647  ));map.setZoom(15);}
          else if (id_municipio==207)  { map.setCenter( new google.maps.LatLng(19.872777   ,-97.588068  ));map.setZoom(15);}
          else if (id_municipio==208)  { map.setCenter( new google.maps.LatLng(19.944086   ,-97.959799  ));map.setZoom(15);}
          else if (id_municipio==209)  { map.setCenter( new google.maps.LatLng(18.3311   ,-97.469383  ));map.setZoom(15);}
          else if (id_municipio==210)  { map.setCenter( new google.maps.LatLng(20.001977   ,-97.714209  ));map.setZoom(15);}
          else if (id_municipio==211)  { map.setCenter( new google.maps.LatLng(19.769325   ,-97.554514  ));map.setZoom(15);}
          else if (id_municipio==212)  { map.setCenter( new google.maps.LatLng(19.712644   ,-97.671748  ));map.setZoom(15);}
          else if (id_municipio==213)  { map.setCenter( new google.maps.LatLng(20.253177   ,-97.887127  ));map.setZoom(15);}
          else if (id_municipio==214)  { map.setCenter( new google.maps.LatLng(20.253177   ,-97.887127  ));map.setZoom(15);}
          else if (id_municipio==215)  { map.setCenter( new google.maps.LatLng(19.978708   ,-97.726688  ));map.setZoom(15);}
          else if (id_municipio==216)  { map.setCenter( new google.maps.LatLng(20.009741   ,-97.595898  ));map.setZoom(15);}
          else if (id_municipio==217)  { map.setCenter( new google.maps.LatLng(18.333595   ,-97.018057  ));map.setZoom(15);}
    }// posicionaEnMunicipio()



    this.posicionaEnNivel = function(nivel, sostenimiento,callback){
            console.info("posicionaEnNivel()->nivel: "+nivel);

            var markers_aux = Array();

            if(nivel=="TODOS"){
                  for (i = 0; i < marker.length; i++) {
                            markers_aux.push(  marker[i]);
                  }
            }

            if(nivel=="ESPECIAL"){
                      for (var i = 0; i < marker.length; i++) {
                          if (marker[i].getIcon()=='public/img/marker1.png') { markers_aux.push(  marker[i]); }
                      }
            }
            else if(nivel=="INICIAL"){
              for (var i = 0; i < marker.length; i++) {
                  if (marker[i].getIcon()=='public/img/marker2.png') { markers_aux.push(  marker[i]); }
              }
          }
          else if(nivel=="PREESCOLAR"){
                    for (var i = 0; i < marker.length; i++) {
                        if (marker[i].getIcon()=='public/img/marker3.png') { markers_aux.push(  marker[i]); }
                    }
          }

        else if(nivel=="PRIMARIA"){
                    for (var i = 0; i < marker.length; i++) {
                        if (marker[i].getIcon()=='public/img/marker4.png') { markers_aux.push(  marker[i]); }
                    }
          }


          else if(nivel=="SECUNDARIA"){
                    for (var i = 0; i < marker.length; i++) {
                        if (marker[i].getIcon()=='public/img/marker5.png') { markers_aux.push(  marker[i]); }
                    }
          }
          else if(nivel=="MEDIA SUPERIOR" || nivel=="BACHILLERATO"){
                    for (var i = 0; i < marker.length; i++) {
                        if (marker[i].getIcon()=='public/img/marker6.png') { markers_aux.push(  marker[i]); }
                    }
          }
          else if(nivel=="SUPERIOR" || nivel=="PROFESIONAL TECNICO"){
                  for (var i = 0; i < marker.length; i++) {
                        if (marker[i].getIcon()=='public/img/marker7.png') { markers_aux.push(  marker[i]); }
                }
          }
          else if(nivel=="FORMACION PARA TRABAJO" || nivel=="CAPACITACION PARA EL TRABAJO"){
                    for (var i = 0; i < marker.length; i++) {
                        if (marker[i].getIcon()=='public/img/marker8.png') { markers_aux.push(  marker[i]); }
                    }
          }

          return callback(markers_aux);
    }// posicionaEnNivel()

    this.posicionaEnSostenimiento = function(arr_nivel, sostenimiento,callback){
            console.info("posicionaEnSostenimiento()->sostenimiento: "+sostenimiento);

            var markers_aux2 = Array();

            if(sostenimiento=="TODOS"){
                    for (var i = 0; i < arr_nivel.length; i++) {
                          markers_aux2.push(arr_nivel[i]);
                    }
            }

            if(sostenimiento=="PRIVADO"){
                    for (var i = 0; i < arr_nivel.length; i++) {
                        if ("PRIVADO" == arr_nivel[i]['sostenimiento']) { markers_aux2.push(arr_nivel[i]); }
                    }
            }

            if(sostenimiento=="PUBLICO"){
                for (var i = 0; i < arr_nivel.length; i++) {
                    if ("PUBLICO" == arr_nivel[i]['sostenimiento']) { markers_aux2.push(arr_nivel[i]); }
                }
            }
          return callback(markers_aux2);
    }// posicionaEnSostenimiento()

    this.posicionaEnNombreEscuela = function(arr_nivel_sostenimiento, nombre_escuela_,callback){
          console.info("posicionaEnNombreEscuela()->nombre_escuela: "+nombre_escuela_);

          var markers_aux3 = Array();

          var nombre_escuela = nombre_escuela_.toUpperCase();
          if(nombre_escuela.trim().length==0 || nombre_escuela=="" ){
              for (var i = 0; i < arr_nivel_sostenimiento.length; i++) {
                    markers_aux3.push(arr_nivel_sostenimiento[i]);
              }
          }else{
              for (var i = 0; i < arr_nivel_sostenimiento.length; i++) {
                  if( arr_nivel_sostenimiento[i]['nombre_escuela'].indexOf(nombre_escuela)!=-1){ markers_aux3.push(arr_nivel_sostenimiento[i]); }
              }
          }

        return callback(markers_aux3);
    }// posicionaEnSostenimiento()



    this.posicionaenCCT = function(cct_){
        var cct = "21"+cct_;
        cct=cct.toUpperCase();
        console.info("posicionaenCCT()->cct: "+cct);
            $('html,body').animate({ scrollTop: 450 }, 'slow');
            for (i = 0; i < marker.length; i++) {
              if (cct==marker[i].getTitle()) {
                marker[i].setMap(map);
                map.setCenter( new google.maps.LatLng(marker[i].getPosition().lat(), marker[i].getPosition().lng() ));
                map.setZoom(15);
                // var infowindow = new google.maps.InfoWindow({ content: marker[i].contentString });
                infowindow = new google.maps.InfoWindow({ content: marker[i].contentString });
                infowindow.open(map, marker[i]);
                  google.maps.event.addListener(map, 'click', function() {
                  infowindow.close();
                  //marker[i].open = false;
                });
                $("#mostar_cercanas_signv").click(function(){
                  infowindow.close();
                });

                $("#mostar_cercanas").click(function(){
                  infowindow.close();
                });
              }
              else{
                marker[i].setMap(null);
              }
            }
    }// posicionaenCCT()

    this.posicionaFinal = function(markers){
          swal.close();
            for (var i=0;i<markers.length;i++) {
              markers[i].setMap(map);
            }
      }// posicionaFinal()


this.reloadBusqueda = function(){

  if (infowindow) {
      infowindow.close();
  }
  infowindow = new google.maps.InfoWindow();
  obj_mapa.ubicaPuebla();

}// reloadBusqueda()

}// BuscaenMapa



// Cambié la forma de mostrar la info, ahora es en una ventana modal de bootstrap
function clearModalInfo(id_modal){
  $("#le_modal_infoescuela .modal-body").empty();
  $("#"+id_modal).modal("hide");
}// clearModal()


$("#IE_btn_exportaExcel").click(function(e){
  e.preventDefault();
  alert("PENDIENTE");
});

$("#le_modal_infoescuela_btnsalir").click(function(e){
  e.preventDefault();
  clearModalInfo("le_modal_infoescuela");
});

function funcionjsonct(obj_arr) {
  // var obj = obj_arr[1];
  // var turno = obj_arr[2];
  var obj = obj_arr;
  console.info("funcionjsonct() -> obj");
  console.info(marker[obj]);

  var string_obj=marker[obj].getTitle();

  /*alert("string_obj: "+string_obj+" string_turno:"+marker[obj]['turno']);
  return false;
  var b=string_obj.substring(2, 5);
  var c=string_obj.substring(5, 9);
  var d=string_obj.substring(9, 10);
  getInfoEscuela(b,c,d);*/
  getInfoEscuela(string_obj, marker[obj]['turno']);

}// funcionjsonct()

function getInfoEscuela(cct, turno){
  $("#le_modal_cct").val(cct);
  $("#le_modal_turno").val(turno);
  var ruta = "app/controllers/info_escuela.inc.php";
  $.ajax({
    url: ruta,
    method: 'POST',
    data: {
      'cct':cct,
      'turno':turno,
      'action':'mapa'
    },
    beforeSend: function( xhr ) {
      obj_message.loading("Descargando datos");
    }
  })
  .done(function( data ) {
    var result = JSON.parse(data);
    var html = result.html;
    var total = result.total;
    var mensaje = result.mensaje;
    var arr_graficas = result.array_graficas;
    var nivel_g = result.nivel;

    //console.info(nivel_g);
    //console.info(arr_graficas);


    concatena_dom(html, function(result){
                  if(result==1){
                      hace_graficas(arr_graficas, nivel_g, function(result2){
                          if(result2==1){
                              infoEscuela();
                          }
                      });
                  }
              });




    swal.close();
    //infoEscuela(html);

  })
  .fail(function(e) {
    console.error("Error in getInfoEscuela()"); console.table(e);
  });
}// getInfoEscuela()

function concatena_dom(html,callback){
            var aux = 1;
            $("#le_modal_infoescuela .modal-body").empty();
            $("#le_modal_infoescuela .modal-body").append(html); // añadimos a la tabla
            return callback(aux);
      }// concatena_dom()

function hace_graficas(arr_graficas, nivel_g, callback){
        var aux = 0;
        var graf = new HaceGraficas(arr_graficas);

        switch(nivel_g) {
        case "PREESCOLAR":
                graf.GraficoEstadisticaPreescolar();
                aux=1;
        break;
        case "PRIMARIA":
                graf.GraficoEstadisticaPrimaria();
                graf.TablaPieGraficaBarPrimaria();
                aux=1;
        break;
        case "SECUNDARIA":
                graf.GraficoEstadisticaSecundaria();
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




function infoEscuela(){
  $("#le_modal_infoescuela").modal("show");
}// infoEscuela()
