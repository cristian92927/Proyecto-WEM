//Validación del input email
let email = document.querySelector('#email');
email.setAttribute('pattern', "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
email.setAttribute('required', true);
email.setAttribute('title', 'Ingresa un correo válido');
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