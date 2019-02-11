obj_message = new Message();
obj_mapa = new Mapa();

var alta_demanda =
[
  /*"21DJN0028Z","21DJN0032L","21DJN0081U","21DJN0098U","21DJN0113W","21DJN0132K","21DJN0151Z","21DJN0153X","21DJN0161F","21DJN0308I",
  "21DJN0332I","21DJN0337D","21DJN0347K","21DJN0360E","21DJN0717M","21DJN0718L","21DJN0761Z","21DJN0858L","21DJN0977Z","21DJN1180A","21DJN2206Z","21EJN0008K","21EJN0041S",
  "21EJN0045O","21EJN0050Z","21EJN0056U","21EJN0059R","21EJN0966S","21EJN1194C","21EJN1230R","21EJN1284V","21EJN1319U","21EJN1325E","21EJN1406P","21EJN1477J",
  "21DCC0694C","21DCC0695B","21DCC0697Z","21DCC0741X","21DCC0777L","21DCC0841W","21DCC0877K","21DCC0968B","21DCC1066T","21EJN0001R","21EJN0006M","21EJN0010Z",
  "21EJN0065B","21EJN0066A","21EJN0067Z","21EJN0068Z","21EJN0069Y","21EJN0070N","21EJN0071M","21EJN0089L","21EJN0091Z","21EJN0324Z","21EJN0470J","21EJN0471I",
  "21EJN0858K","21EJN0874B","21EJN1025H","21EJN1108Q","21EJN1132Q","21EJN1134O","21EJN1186U","21EJN1324F","21EJN1386S","21DPR0003G","21DPR0025S","21DPR0026R",
  "21DPR0042I","21DPR0054N","21DPR0067R","21DPR0191Q","21DPR0195M","21DPR0208Z","21DPR0221U","21DPR0251O","21DPR0256J","21DPR0259G","21DPR0265R","21DPR0272A",
  "21DPR0273Z","21DPR0274Z","21DPR0277W","21DPR0283G","21DPR0284F","21DPR0289A","21DPR0301F","21DPR0311M","21DPR0312L","21DPR0317G","21DPR0328M","21DPR0337U",
  "21DPR0343E","21DPR0353L","21DPR0357H","21DPR0383F","21DPR0390P","21DPR0423Q","21DPR0432Y","21DPR0433X","21DPR0467N","21DPR0476V","21DPR0477U","21DPR0519C",
  "21DPR0548Y","21DPR0552K","21DPR0554I","21DPR0571Z","21DPR0597G","21DPR0603A","21DPR0649W","21DPR0660S","21DPR0664O","21DPR0758C","21DPR0773V","21DPR0794H",
  "21DPR0917A","21DPR0921N","21DPR0926I","21DPR0927H","21DPR0935Q","21DPR0936P","21DPR0943Z","21DPR0949T","21DPR0953F","21DPR0958A","21DPR0964L","21DPR0982A",
  "21DPR0983Z","21DPR1003N","21DPR1012V","21DPR1020D","21DPR1026Y","21DPR1064A","21DPR1090Z","21DPR1117P","21DPR1204K","21DPR1214R","21DPR1216P","21DPR1228U",
  "21DPR1251V","21DPR1273G","21DPR1277C","21DPR1330H","21DPR1559K","21DPR1562Y","21DPR1565V","21DPR1575B","21DPR1754N","21DPR1773B","21DPR1774A","21DPR1819G",
  "21DPR1825R","21DPR1896L","21DPR1905C","21DPR1947B","21DPR1953M","21DPR2139H","21DPR2222G","21DPR2230P","21DPR2239G","21DPR2324D","21DPR2326B","21DPR2332M",
  "21DPR2338G","21DPR2366C","21DPR2367B","21DPR2394Z","21DPR2396X","21DPR2397W","21DPR2404P","21DPR2434J","21DPR2452Z","21DPR2467A","21DPR2478G","21DPR2503P",
  "21DPR2544P","21DPR2642Q","21DPR2650Z","21DPR2709H","21DPR2757R","21DPR2761D","21DPR2773I","21DPR2824Z","21DPR2875F","21DPR2876E","21DPR2922Z","21DPR2923Z",
  "21DPR3425I","21DPR3427G","21DPR3440A","21DPR3447U","21DPR3457A","21DPR3459Z","21DPR3478N","21DPR3505U","21DPR3509Q","21DPR3512D","21DPR3518Y","21DPR3525H",
  "21DPR3555B","21DPR3558Z","21DPR3587U","21DPR3635N","21DPR3642X","21DPR3650F","21DPR3673Q","21DPR3698Z","21DPR3699Y","21DPR3707Q","21DPR3724G","21EPR0003F",
  "21EPR0021V","21EPR0027P","21EPR0039U","21EPR0067Q","21EPR0069O","21EPR0071C","21EPR0127O","21EPR0145D","21EPR0175Y","21EPR0195L","21EPR0248Z","21EPR0251N",
  "21EPR0263S","21EPR0337T","21EPR0357G","21EPR0368M","21EPR0379S","21EPR0382F","21EPR0399F","21EPR0410L","21EPR0413I","21EPR0415G","21EPR0420S","21EPR0515F",
  "21EPR0519B","21EPR0565N","21EPR0711H","21EPR0722N","21EPR0723M","21EPR0729G","21EPR0793H","21EPR0804X","21EPR0814D","21EPR0815C","21EPR0817A","21EPR1510R",
  "21EPR1530E","21EPR1555N","21EPR1569Q","21EPR1572D","21EPR1577Z","21EPR1580M","21EPR1582K","21EPR1597F","21EPR1599K","21EPR1601I","21EPR1602H","21EPR1604F",
  "21EPR1618I","21EPR1619H","21DPB0596G","21DPB0608V","21DPB0610J","21DPB0634T","21DPB0709T","21DPB0790K","21DPB0804X","21DPB0915B","21EPR0143F","21EPR0162U",
  "21EPR0258G","21EPR0261U","21EPR0356H","21EPR0498F","21EPR0499E","21EPR0500D","21EPR0501C","21EPR0502B","21EPR0580F","21EPR0592K","21EPR0593J","21EPR0594I",
  "21EPR0615E","21EPR0641C","21EPR0642B","21EPR0643A","21EPR0650K","21EPR0718A","21EPR0752H","21EPR1501J","21EPR1513O","21EPR1527R","21EPR1528Q","21EPR1543I",
  "21EPR1549C","21EPR1576Z","21EPR1578Y","21DST0002T","21DST0003S","21DST0010B","21DST0019T","21DST0021H","21DST0032N","21DST0033M","21DST0034L","21DST0035K",
  "21DST0040W","21DST0043T","21DST0050C","21DST0051B","21DST0055Y","21DST0056X","21DST0058V","21DST0062H","21DST0065E","21DST0067C","21DST0070Q","21DST0072O",
  "21DST0074M","21DST0077J","21DST0079H","21DST0081W","21DST0083U","21DST0084T","21DST0086R","21DST0087Q","21DST0098W","21DST0100U","21DST0104Q","21DST0106O",
  "21DST0110A","21DST0112Z","21DST0128Z","21DST0129Z","21DST0136I","21DST0139F","21DST0152Z","21DST0153Z","21DES0001B","21DES0010J","21DES0016D","21DES0022O",
  "21DES0023N","21DES0041C","21DES0044Z","21DES0094H","21EES0096E","21EES0097D","21EES0246V","21EES0262M","21EES0284Y","21EES0285X","21EES0299Z","21EES0309Q",
  "21EES0331S","21EES0339K","21EES0358Z","21EES0362L","21EST0013Y","21DTV0005D","21DTV0008A","21DTV0031B","21DTV0047C","21DTV0079V","21DTV0082I","21DTV0163T",
  "21DTV0176X","21DTV0193N","21DTV0199H","21DTV0212L","21DTV0257H","21DTV0338S","21DTV0485B","21DTV0522P","21ETV0001G","21ETV0018G","21ETV0039T","21ETV0089A",
  "21ETV0122S","21ETV0123R","21ETV0127N","21ETV0133Y","21ETV0137U","21ETV0151N","21ETV0154K","21ETV0177V","21ETV0184E","21ETV0186C","21ETV0187B","21ETV0199G",
  "21ETV0203C","21ETV0204B","21ETV0211L","21ETV0212K","21ETV0216G","21ETV0217F","21ETV0221S","21ETV0222R","21ETV0223Q","21ETV0225O","21ETV0239R","21ETV0245B",
  "21ETV0255I","21ETV0256H","21ETV0258F","21ETV0259E","21ETV0260U","21ETV0263R","21ETV0267N","21ETV0271Z","21ETV0284D","21ETV0296I","21ETV0297H","21ETV0298G",
  "21ETV0301D","21ETV0311K","21ETV0314H","21ETV0316F","21ETV0318D","21ETV0321R","21ETV0334V","21ETV0347Z","21ETV0349X","21ETV0353J","21ETV0355H","21ETV0378S",
  "21ETV0426L","21ETV0437R","21ETV0457E","21ETV0462Q","21ETV0466M","21ETV0467L","21ETV0548W","21ETV0557D","21ETV0634S","21ETV0650J","21ETV0655E","21ETV0695F",
  "21ETV0784Z","21ETV0792H","21ETV0805V","21ETV0815B","21ETV0857A","21ETV0874R","21ETV0911E","21EES0010I","21EES0011H","21EES0012G","21EES0014E","21EES0016C",
  "21EES0017B","21EES0023M","21EES0109S","21EES0111G","21EES0178O","21EES0187W","21EES0200Z","21EES0240A","21EES0242Z","21EES0247U","21EES0248T","21EES0254D",
  "21EES0291H","21EES0293F","21EES0303W","21EES0305U","21EES0322K","21EES0324I","21EES0327F","21EES0336N","21EES0337M","21EES0340Z","21EES0341Z","21EES0363K",
  "21EES0364J","21EES0365I"*/
];

var estatusesc='';

var marker= Array();
var map;
var oms;
var URLactual = window.location;

var i;
var image;
var infowindow = null;
var pos;
var contentString;




$(function() {
  console.info( "ready mapa.js!" );
  document.title = 'Localiza tu escuela en el mapa';
  obj_mapa.ubicaPuebla();
  obj_mapa.leeJSON();
});



function Mapa(){
  tmp_mapa = this;


  this.ubicaPuebla = function(){
      console.info("Voy a ubicarlos en Puebla...");
      var mapCanvas = document.getElementById("map");
      var mapOptions = {
        center: new google.maps.LatLng( 19.282952 , -98.209877),
        zoom: 8,
        map_div: '#pestana',
        map_div: '#buscador',
        mapTypeControl: true,
        mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
          position: google.maps.ControlPosition.TOP_RIGHT
        },
        zoomControl: true,
        zoomControlOptions: {
          position: google.maps.ControlPosition.LEFT_TOP
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
          position: google.maps.ControlPosition.LEFT_TOP
        }
      }
      map = new google.maps.Map(mapCanvas, mapOptions);
       oms = new OverlappingMarkerSpiderfier(map);

       // Resize stuff...
       google.maps.event.addDomListener(window, "resize", function() {
         var center = map.getCenter();
         google.maps.event.trigger(map, "resize");
         map.setCenter(center);
       });
  }// ubicaPuebla()

  this.leeJSON = function(){
      $.getJSON(base_url+"../assets/js/escuela/mapa/json/catalogo220318.json", function(data){
      var html = [];

      console.info("leeJSON() -> data");
      //  loop through array
      $.each(data, function(index, catalogo){
          html[index] = [];
          html[index]['CLAVECCT'] = catalogo['CLAVECCT'];
          html[index]['TURNO'] = catalogo['TURNO'];
          html[index]['ZONA'] = catalogo['ZONA'];
          html[index]['NIVEL'] = catalogo['NIVEL'];
          html[index]['NOMBRECT'] = catalogo['NOMBRECT'];
          html[index]['DOMICILIO'] = catalogo['DOMICILIO'];
          html[index]['NOMBRELOC'] = catalogo['NOMBRELOC'];
          html[index]['NOMBREMUN'] = catalogo['NOMBREMUN'];
          html[index]['LATITUD'] = catalogo['LATITUD'];
          html[index]['LONGITUD'] = catalogo['LONGITUD'];
          html[index]['SOSTENIMIE'] = catalogo['SOSTENIMIE'];
          html[index]['programas_apoyo'] = catalogo['programas_apoyo'];
      });

      // console.info("leeJSON() -> html");
      // console.table(html);
      // Start for
      for (i = 0; i < html.length; i++){

        pos = new google.maps.LatLng(html[i]['LATITUD'], html[i]['LONGITUD']);

base_url+"../assets/js/escuela/mapa/json/catalogomiguel.json"

        if (html[i]['NIVEL']=='ESPECIAL') {image = base_url+'../assets/img/markets/marker1.png'};
        if (html[i]['NIVEL']=='INICIAL') {image = base_url+'../assets/img/markets/marker2.png'};
        if (html[i]['NIVEL']=='PREESCOLAR') {image = base_url+'../assets/img/markets/marker3.png'};
        if (html[i]['NIVEL']=='PRIMARIA') {image = base_url+'../assets/img/markets/marker4.png'};
        if (html[i]['NIVEL']=='SECUNDARIA') {image = base_url+'../assets/img/markets/marker5.png'};
        if (html[i]['NIVEL']=='MEDIA SUPERIOR') {image = base_url+'../assets/img/markets/marker6.png'};
        if (html[i]['NIVEL']=='SUPERIOR') {image = base_url+'../assets/img/markets/marker7.png'};
        if (html[i]['NIVEL']=='CAACITACION PARA TRABAJO') {image = base_url+'../assets/img/markets/marker8.png'};

        estatusesc='';

        for(j = 0; j < alta_demanda.length; j++){
            if (html[i]['CLAVECCT']==alta_demanda[j]) {estatusesc='ESCUELA DE ALTA DEMANDA';}
          }

          contentString = '<div class="container-fluid"><center>'+
          'NOMBRE ESCUELA: <b style="font-size: 150%;">'+html[i]['NOMBRECT']+'</b>'+
          '<br>CCT: <b>'+html[i]['CLAVECCT']+'</b>'+
          ', NIVEL: <b>'+html[i]['NIVEL']+'</b>'+
          ', SOSTENIMIENTO: <b>'+html[i]['SOSTENIMIE']+'</b>'+
          '<br> LOCALIDAD: <b>'+html[i]['NOMBRELOC']+'</b>'+
          ', MUNICIPIO: <b>'+html[i]['NOMBREMUN']+
          '<br></b> TURNO: <b>'+html[i]['TURNO']+'</b>'+
          ', ZONA: <b>'+html[i]['ZONA']+
          '<br> <b style="font-size: 120%; color:red;">'+estatusesc+'<b>'+
          ' <div class="row"><div class="col-xs-12 margin_top_7">'+
          '<input id="mostar_cercanas" onclick="funcionckct('+i+')"  type="button" value="Localice 5 escuelas más cercanas del mismo nivel educativo" class="btn btn-primary btn-block"/>'+
          ' </div></div> '+
          ' <div class="row"><div class="col-xs-12 margin_top_7">'+
          '<input id="mostar_cercanas_signv"  onclick="funcionckct_signv('+i+')" title="Ejem: 5 escuelas secundarias más cercanas a la primaria donde estudia mi hija(o)"  type="button"  value="Localice 5 escuelas más cercanas del siguiente nivel educativo" class="btn btn-primary btn-block"/>'+
          ' </div></div> '+
          ' <div class="row"><div class="col-xs-12 margin_top_7">'+
          '<form   id="formularioxx" action="#" >'+
          '<input style="display: none;"  type="text" name="a" id="21" value="21" >'+
          '<input style="display: none;" type="text" name="b"  id="letras" name="letras" value="'+html[i]['CLAVECCT'].substring(2, 5)+'" >'+
          '<input style="display: none;"  type="text" name="c"  id="num" name="num" value="'+html[i]['CLAVECCT'].substring(5, 9)+'" >'+
          '<input style="display: none;" type="text" name="d"  id="letra" name="letra" value="'+html[i]['CLAVECCT'].substring(9, 10)+'" >'+
          '<input  type="button" onclick="funcionjsonct('+i+')" id="estadistica" value="Conozca información relevante de esta escuela" class="btn btn-primary btn-block">'+
          '</form>'
          ' </div></div> '+
          '</div></center>';

        marker[i] = new google.maps.Marker({
          position: pos,
          map: map,
          contentString: contentString,
          icon: image,
          title:html[i]['CLAVECCT'],
          cct:html[i]['CLAVECCT'],
          turno:html[i]['TURNO'],
          sostenimiento:html[i]['SOSTENIMIE'],//////////////////
          nombre_escuela:html[i]['NOMBRECT'],//////////////////
          cad_prog_apoyo_fer:html[i]['programas_apoyo'],//////////////////
          //animation: google.maps.Animation.DROP
        });


        infowindow = new google.maps.InfoWindow({});
        oms.addMarker(marker[i]);

        marker[i].addListener('click', function() {
          if (infowindow) { infowindow.close();}
          infowindow.setContent(this.contentString);
          infowindow.open(map, this);
          // map.setCenter(this.getPosition());
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

        });
        marker[i].setMap(null);
      }// for
      // End for

    }); // Termine de leer JSON
  }// leeJSON()

}// Mapa



// 5 escuelas secundarias más cercanas a la primaria donde estudia mi hija(o)
function funcionckct_signv(obj) {
  var i;
  var at=0;
  var temp=1;
  var distancias = [];
  var temp_icon='';

    var ruta_markets = base_url+"../assets/img/markets/";
    console.info("ruta_markets: "+ruta_markets);
    if (marker[obj].getIcon()==ruta_markets+'marker1.png') {temp_icon=ruta_markets+'marker1.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker2.png') {temp_icon=ruta_markets+'marker3.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker3.png') {temp_icon=ruta_markets+'marker4.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker4.png') {temp_icon=ruta_markets+'marker5.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker5.png') {temp_icon=ruta_markets+'marker6.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker6.png') {temp_icon=ruta_markets+'marker7.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker7.png') {temp_icon=ruta_markets+'marker7.png';}
    else if (marker[obj].getIcon()==ruta_markets+'marker8.png') {temp_icon=ruta_markets+'marker8.png';}

  /*
  if (marker[obj].getIcon()=='public/img/marker1.png') {temp_icon='public/img/marker1.png';}
  else if (marker[obj].getIcon()=='public/img/marker2.png') {temp_icon='public/img/marker3.png';}
  else if (marker[obj].getIcon()=='public/img/marker3.png') {temp_icon='public/img/marker4.png';}
  else if (marker[obj].getIcon()=='public/img/marker4.png') {temp_icon='public/img/marker5.png';}
  else if (marker[obj].getIcon()=='public/img/marker5.png') {temp_icon='public/img/marker6.png';}
  else if (marker[obj].getIcon()=='public/img/marker6.png') {temp_icon='public/img/marker7.png';}
  else if (marker[obj].getIcon()=='public/img/marker7.png') {temp_icon='public/img/marker7.png';}
  else if (marker[obj].getIcon()=='public/img/marker8.png') {temp_icon='public/img/marker8.png';}
  */

  //alert(calcDistance(marker[obj].getPosition(),marker[12].getPosition()));

  for (i = 0; i < marker.length; i++) {

    if(getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng()) !=0 && temp_icon==marker[i].getIcon()){
                 distancias[i] = getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng());
                }
  }
  distancias.sort( comparar );
  distancias=eliminateDuplicates(distancias);
  //alert( distancias);
  //alert(marker[obj].getIcon());

  for (i = 0; i < marker.length; i++) {
    if (temp_icon==marker[i].getIcon()) {
      if (getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[0]  ||
                        getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[1]  ||
                        getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[2]  ||
                        getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[3]  ||
                        getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[4]) {
                            marker[i].setMap(map);
                        }
      else{
        marker[i].setMap(null);
      }

    }
    else{
      marker[i].setMap(null);
    }
  }
  marker[obj].setMap(map);

}// funcionckct_signv()


function funcionckct(obj) {
  var i;
  var at=0;
  var temp=1;
  var distancias = [];


  //alert(calcDistance(marker[obj].getPosition(),marker[12].getPosition()));

  for (i = 0; i < marker.length; i++) {


    if(getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng()) !=0 && marker[obj].getIcon()==marker[i].getIcon()){

                 distancias[i] = getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng());
                }

  }
  distancias.sort( comparar );
  distancias=eliminateDuplicates(distancias);
  //alert( distancias);
  //alert(marker[obj].getPosition());

  for (i = 0; i < marker.length; i++) {
    if (marker[obj].getIcon()==marker[i].getIcon()) {
      if (getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[0]  ||
                       getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[1]  ||
                       getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[2]  ||
                       getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[3]  ||
                       getKilometros(marker[obj].getPosition().lat(),marker[obj].getPosition().lng(),marker[i].getPosition().lat(),marker[i].getPosition().lng())==distancias[4]) {
                           marker[i].setMap(map);
                       }
      else{
        marker[i].setMap(null);
      }

    }
    else{
      marker[i].setMap(null);
    }

  }
  marker[obj].setMap(map);

}// funcionckct()


function eliminateDuplicates(arr) {
  var i,
  len=arr.length,
  out=[],
  obj={};

  for (i=0;i<len;i++) {
    obj[arr[i]]=0;
  }
  for (i in obj) {
    out.push(i);
  }
  return out;
}// eliminateDuplicates()


function comparar ( a, b ){
  return a - b;
}// comparar()

function getKilometros(lat1,lon1,lat2,lon2)
         {
         rad = function(x) {return x*Math.PI/180;}
        var R = 6378.137; //Radio de la tierra en km
         var dLat = rad( lat2 - lat1 );
         var dLong = rad( lon2 - lon1 );
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
         var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
         var d = R * c;
        return d.toFixed(3); //Retorna tres decimales
         }


function calcDistance(p1, p2) {
  return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000);
}// calcDistance()
