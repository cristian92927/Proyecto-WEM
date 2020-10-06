window.addEventListener('load', function() {
    //Función de click para el botón del formulario
    //para asegurarnos de que no se envíe si no cumple con las validaciones
    document.getElementById("ingresar").addEventListener('click', function(e) {
        //Este comando evita recargar la página
        e.preventDefault();
        validateForm1();
    });
    document.getElementById("enviar").addEventListener('click', function(e) {
        //Este comando evita recargar la página
        // e.preventDefault();
        validateForm2();
    });
    //Resetear o vaciar el formulario cuando el módulo cargue
    $("#containerSesion").trigger("reset");
    $("#containerRecuperar").trigger("reset");
});
var inputs = document.querySelectorAll('.input');
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keyup', function() {
        if (this.value.length >= 1) {
            this.nextElementSibling.classList.add('fijar');
        } else {
            this.nextElementSibling.classList.remove('fijar');
        }
    });
}
var recuperar = document.getElementById('recuperar');
var volver = document.getElementById('volver');
var containerRecuperar = document.getElementById('containerRecuperar');
var containerSesion = document.getElementById('containerSesion');
recuperar.addEventListener('click', function() {
    containerRecuperar.style.display = 'block';
    containerSesion.style.display = 'none';
});
volver.addEventListener('click', function() {
    containerRecuperar.style.display = 'none';
    containerSesion.style.display = 'block';
});
//Función para las diferentes validciones del formulario de REGISTRO
function  validateForm1()  {
    // declarion de variables
    var  correo1  =  $("#email1").val();
    var  contrasena  =  $("#pw").val();
    // declaración de expresiones regulares para las diferentes validaciones
    const expresionCorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const expresionContrasena = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$/;
    //Validación del campo correo no esté vacío
    if  (correo1  ==  ""  ||  correo1  ==  null)  {
        call("email1", "El campo del email es obligatorio.");
        return  false;
        //Validación del campo correo que cumpla con el formato example_12@example.com
    } else if (!expresionCorreo.test(correo1)) {
        call("email1", "Ingresa un email válido como: example@example.com");
        return false;
    } else {
        colorDefault("email1");
    }
    //Validación del campo contrasena no esté vacío
    if  (contrasena ==  ""  ||  contrasena  ==  null)  {  
        call("pw", "El campo de la contraseña es obligatorio.");
        return  false;
        //Validación del campo contrasena que cumpla con: de 8 a 16 caracteres, 
        //una minúscula, una mayúscula y un número
    } else if (!expresionContrasena.test(contrasena)) {
        call("pw", "Ingrese una contraseña válida. (De 8 a 16 caracteres, al menos una letra minúscula, una mayúscula y un número)");
        return false;
    } else {
        colorDefault("pw");
    }
    $('#containerSesion').submit();
    return  true;
}

function validateForm2() {
    var  correo2  =  $("#email2").val();
    const expresionCorreo2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //Validación del campo correo no esté vacío
    if  (correo2  ==  ""  ||  correo2  ==  null)  {
        call("email2", "El campo del email es obligatorio.");
        return  false;
        //Validación del campo correo que cumpla con el formato example_12@example.com
    } else {
        colorDefault("email2");
    }
    $('#containerRecuperar').submit();
    return  true;
}
//Función que hace el llamado a las demás funciones (Especialmente para ahorrar código)
//Recibe el id del input y el mensaje que será mostrado según el caso
function call(id, mensaje) {
    cambiarColor(id);
    mostraAlerta(mensaje);
    //Hacerle focus al input que no cumpla con las validaciones especificadas
    $("#" + id).focus();
}
// creamos un funcion de color por defecto a los bordes de los inputs
function  colorDefault(dato)  {
    document.querySelector("#" + dato).style.border =  "none";
    document.querySelector("#" + dato).style.borderBottom =  "3px solid rgb(252, 115, 35)";
}
// creamos una funcio para cambiar de color a su bordes de los input
function  cambiarColor(dato)  {
    document.querySelector("#" + dato).style.border = '3px solid red';
}
// funcion para mostrar la alerta
function  mostraAlerta(texto)  {
    document.querySelector("#alerta").style.display = "flex";
    document.querySelector("#alerta").value = texto;
    document.querySelector("#alerta").innerHTML = texto;
}