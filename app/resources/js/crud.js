function allowDrop(ev){
	ev.preventDefault();
}
var a = 0;
var copia;
function drag(ev){
	copia = "<div class='caja' style='background-color:"+ev.target.style.backgroundColor+";'><p>" + ev.target.childNodes[1].innerHTML + "</p><div class='opciones'><i class='icon-cog'></i></div><div class='menu c'><a class='detalles'>Detalles</a><a class='eliminar'>Eliminar</a></div></div>";
	ev.dataTransfer.setData('text', copia);
	console.log(ev.target.getAttribute('id'));
};
function drop(ev){
	ev.preventDefault();
	ev.target.innerHTML = ev.dataTransfer.getData("text");
}
var bin;
var trimestre = document.getElementById('trimestre');
var aula = document.getElementById('aula');

aula.addEventListener('dblclick', function(){
	bin = 1;
	texto();
});
trimestre.addEventListener('dblclick', function(){
	bin = 0;
	texto();
});

function texto(){
	if(bin == 0){
		var val = prompt('Ingrese el trimestre');
		if (val == null) {
			trimestre.innerHTML = "Trimestre:";
		}else{
			trimestre.innerHTML = "Trimestre: "+val;
		}
	}else if(bin == 1){
		var val = prompt('Ingrese el lugar');
		if (val == null) {
			aula.innerHTML = "Lugar:";
		}else{
			aula.innerHTML = "Lugar: "+val;
		}
	}
}
var bool = true;
$(document).on('click', '.opciones', function(e){
	if(bool){
		$('.menu').css('top', e.pageY);
		$('.menu').css('left', e.pageX);
		$('.menu').removeClass('c');
		$('.menu').addClass('a');
		bool = false;
	}else{
		$('.menu').removeClass('a');
		$('.menu').addClass('c');
		bool = true;
	}
	$(document).on('click', '.eliminar', function(e){
		console.log(e.target.parentElement);
	});
});
