function allowDrop(ev){
	ev.preventDefault();
}
var i = 0;
var copia;
function drag(ev){
	i++;
	copia = "<div class='caja' id="+ev.target.id+" style='background-color:"+ev.target.style.backgroundColor+";'><p>" + ev.target.childNodes[1].innerHTML + "</p><div class='opciones'><i id=op"+i+" class='icon-cog'></i><div class='menu'><a class='detalles'>Detalles</a><a class='eliminar'>Eliminar</a></div></div></div></div>";
	ev.dataTransfer.setData('text', copia);
}
function drop(ev){
	ev.preventDefault();
	ev.target.innerHTML = ev.dataTransfer.getData("text");
}
var bool = true;
$(document).on('click', '.icon-cog', function(e){
	document.querySelector('#'+e.target.id+" ~ .menu").classList.toggle('a');
});
$(document).on('click', '.detalles', function(e){
	console.log('le dio a los detalles');
});
$(document).on('click', '.eliminar', function(e){
	e.target.parentElement.parentElement.parentElement.parentElement.innerHTML= "";
});