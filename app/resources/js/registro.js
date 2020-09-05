//Función para la validación de que las contraseñas coincidan
function validatePassword() {
  var pass1 = document.getElementById("pw").value;
  var pass2 = document.getElementById("pw2").value;
  pass1 != pass2 
  ? document.getElementById("pw2").setCustomValidity("Las contraseñas no coinciden") 
  : document.getElementById("pw2").setCustomValidity('');
}
document.getElementsByName("registrar")[0].addEventListener('click', function(e){
  e.preventDefault();
  validatePassword();
  validateForm();
});

function call(id, mensaje){
  cambiarColor(id);
  // mostramos le mensaje de alerta
   mostraAlerta(mensaje);
  $("#"+id).focus();
}
function validateForm() {
  // declarion de variables
  var nombre = $("#name").val();
  var apellido = $("#lastname").val();
  var correo = $("#email").val();
  var contrasena1 = $("#pw").val();
  var contrasena2 = $("#pw2").val();

  const expresionNombApell = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
  const expresionCorreo = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  const expresionContrasena = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$/;

  if(nombre == "" || nombre == null){
    call("name", "Campo Obligatorio");
    return false;
  }else if(!expresionNombApell.test(nombre)){
    call("name", "Ingrese un nombre válido");
    return false;
  }else{
    colorDefault("name");
  }

  if (apellido == "" || apellido == null) {
    call("lastname", "Campo Obligatorio");
    return false;
  }else if(!expresionNombApell.test(apellido)){
    call("lastname", "Ingrese un apellido válido");
    return false;
  }else{
    colorDefault("lastname");
    }

    if (correo == "" || correo == null) {
       call("email", "Campo Obligatorio");
    return false;
  }else if(!expresionCorreo.test(correo)){
    call("email", "Ingrese un email válido");
    return false;
  }else{
    colorDefault("email");
    }

  if (contrasena1 == "" || contrasena1 == null) {
      call("pw", "Campo Obligatorio");
    return false;
  }else if(!expresionContrasena.test(contrasena1)){
    call("pw", "Ingrese una contraseña válida");
    return false;
  }else{
    colorDefault("pw");
  }

  if (contrasena2 == "" || contrasena2 == null) {
    call("pw2", "Campo Obligatorio");
    return false;
  }else{
    colorDefault("pw");
  }

  $("form").submit();
  return true;
}

function cleana() {
  $("input").focus(function () {
      $(".alerta").css({display: "none"});
  });
  colorDefault("name");
  colorDefault("lastname");
  colorDefault("email");
  colorDefault("pw");
}

// creamos un funcion de color por defecto a los bordes de los inputs
function colorDefault(dato) {
    document.querySelector("#"+dato).style.border = "none";
    document.querySelector("#"+dato).style.borderBottom = "3px solid rgb(252, 115, 35)";
}

// creamos una funcio para cambiar de color a su bordes de los input
function cambiarColor(dato) {
    document.querySelector("#"+dato).style.border = '3px solid red';
}

// funcion para mostrar la alerta
function mostraAlerta(texto) {
    document.querySelector("#alerta").style.display = "block";
    document.querySelector("#alerta").innerHTML = texto;
}