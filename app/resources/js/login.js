var recuperar = document.getElementById('recuperar');
var volver = document.getElementById('volver');
var containerRecuperar = document.getElementById('containerRecuperar');
var containerSesion = document.getElementById('containerSesion');

recuperar.addEventListener('click', function(){
	containerRecuperar.style.display = 'block';
	containerSesion.style.display = 'none';
});
volver.addEventListener('click', function(){
	containerRecuperar.style.display = 'none';
	containerSesion.style.display = 'block';
});