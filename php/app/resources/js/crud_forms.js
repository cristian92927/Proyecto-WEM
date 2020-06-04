let cont = document.getElementsByClassName('container')[0];
let cerrar = document.getElementById('cerrar');
// variables del Enlace Crear //
let crear = document.getElementById('enlace-crear');
let btn_agregar = document.getElementById('agregar');
// variables del Enlace borrar //
let borrar = document.getElementById('enlace-borrar');
let btn_borrar = document.getElementById('eliminar');
// variables del Enlace modificar //
let modificar = document.getElementById('enlace-modificar');
let btn_modificar = document.getElementById('editar');

// variables de formularios
let form1 = document.getElementById('formulario1');
let form2 = document.getElementById('formulario2');
let form3 = document.getElementById('formulario3');
let abierto = false;
// Formulario crear //
crear.addEventListener('click', function(){
	cont.style.display = 'flex';
	form1.style.display = 'block';
	form2.style.display = 'none';
	form3.style.display = 'none';
	abierto = true;
	btn_agregar.addEventListener('click', function(ev){
		cont.style.display = 'none';
	});
	cerrar.addEventListener('click', function(){
		cont.style.display='none';
	});
});
// Formuario borrar //
borrar.addEventListener('click', function(){
	cont.style.display = 'flex';
	form2.style.display = 'block';
	form1.style.display = 'none';
	form3.style.display = 'none';
	abierto = true;
	btn_borrar.addEventListener('click', function(){
		cont.style.display = 'none';
		abierto = false;
	});
	cerrar.addEventListener('click', function(){
		cont.style.display='none';
		abierto = false;
	});
});
// Formuario modificar //
modificar.addEventListener('click', function(){
	cont.style.display = 'flex';
	form3.style.display = 'block';
	form1.style.display = 'none';
	form2.style.display = 'none';
	abierto = true;
	btn_modificar.addEventListener('click', function(ev){
		form3.style.display = 'none';
		abierto = false;
	});
	cerrar.addEventListener('click', function(){
		cont.style.display = 'none';
		abierto = false;
	});
});

// Contenedor de formularios //
cont.addEventListener('click', function(e){
	if(abierto == true && e.target == cont){
		abierto = false;
		cont.style.display = 'none';
	}
});