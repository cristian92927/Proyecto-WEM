var etiqueta = document.querySelectorAll('.menu > a');

for(var i = 0; i < etiqueta.length; i++){
	etiqueta[i].addEventListener('click', cambiar);
}

function cambiar(ev){
	document.querySelector('.active').classList.remove('active');
	ev.target.className = 'active';
	document.querySelector('.show').classList.remove('show');
	document.querySelector('#'+ev.target.getAttribute('data-class')).classList.toggle('show');
}