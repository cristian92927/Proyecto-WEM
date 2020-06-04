function validatePassword() {
  var pass1 = document.getElementById("pw").value;
  var pass2 = document.getElementById("pw2").value;
  pass1 != pass2 
  ? document.getElementById("pw2").setCustomValidity("Las contraseñas no coinciden") 
  : document.getElementById("pw2").setCustomValidity('');
}
document.getElementsByName("registrar")[0].onclick = validatePassword;

function validarText(event) { 
  var permitidos = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";  

  var teclas_especiales = [8, 37, 39, 46, 13];   
  var evento = event || window.event; 
  var codigoCaracter = evento.keyCode;  
  var caracter = String.fromCharCode(codigoCaracter);   
  var tecla_especial = false;   
  for(var i in teclas_especiales) { 
    if(codigoCaracter == teclas_especiales[i]) 
    {     
      tecla_especial = true;      
    }
  }
 return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
function msg(){
  document.getElementsByName("nombres").setCustomValidity("Este campo solo permite texto");
}
document.getElementsByName("nombres")[0].onkeypress = validarText; 