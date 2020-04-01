
let crear = document.getElementById('enlace-crear');
let borrar = document.getElementById('enlace-borrar');
let modificar = document.getElementById('enlace-modificar');
let cont = document.getElementsByClassName('container')[0];
let button = document.getElementById('agregar');
crear.addEventListener('click', function(){
	crearInstructores(event);
})
let a = 1;
function crearInstructores(ev){
	cont.style.display = 'flex';
	document.getElementsByTagName('body')[0].style.overflow = 'hidden';
	button.addEventListener('click', function(){
		let nomb = document.getElementById('nombres').value;
		var newDiv = document.createElement("div");
		newDiv.className = "caja";
		newDiv.draggable="true";
		newDiv.innerHTML = nomb;
		var currentDiv = document.getElementById("caja"+a);
		document.getElementsByClassName('cajas')[0].appendChild(newDiv,currenDiv);
		cont.style.display = 'none';
		a++;
	});
}

cont.addEventListener('click', function(e){
	let box = document.getElementById('form');
	let input = document.getElementById('formulario')[0];
	if(e.target == cont){
		cont.style.display = 'none';
		document.getElementsByTagName('body')[0].style.removeProperty('overflow');
	}
});
for (var i = 1; i <= 225; i++) {
	document.getElementById('drops'+i).addEventListener('drop', function(ev){
		ev.preventDefault();
		var data = ev.dataTransfer.getData('text');
		ev.target.appendChild(document.getElementById(data));
	});
	document.getElementById('drops'+i).addEventListener('dragover', function(ev){
		ev.preventDefault();
	});
}