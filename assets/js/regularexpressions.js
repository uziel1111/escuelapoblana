function RE_CCT(cct){ // i	Insensitive (ignora las mayúsculas y minúsculas).
  // if(cct.match(/^([a-z]{4})([0-9]{6})([a-z]{6})([0-9]{2})$/i)){}
    if(cct.match(/^([a-z]{3})([0-9]{4})([a-z]{1})$/i)){//AAAA######AAAAAA##
      return true; // alert('cct válida!');
    }else{
      return false;// alert('cct incorrecta!');1
    }
}// validaCCT()

/*
function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
      return false;
    }else{
      return true;
    }
}
*/

/*
function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
      return false;
    }else{
      return true;
    }
}
*/
/*
function RE_EMAIL(email){
    if(email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)){
      return true;
    }else{
      return false;
    }
}// RE_EMAIL()
*/

function RE_EMAIL(email){
  // alert("validar_email: "+email);
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}// RE_EMAIL
