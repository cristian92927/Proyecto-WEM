function allowDrop(ev){
	ev.preventDefault();
}
var copia;
function drag(ev){
	copia = "<div class='caja' id="+ev.target.id+" style='background-color:"+ev.target.style.backgroundColor+";'><p>" + ev.target.childNodes[1].innerHTML + "</p><div class='opciones'><i class='icon-cog'></i></div><div class='menu c'><a class='detalles'>Detalles</a><a class='eliminar'>Eliminar</a></div></div>";
	ev.dataTransfer.setData('text', copia);
	console.log(ev.target.getAttribute('id'));
}
function drop(ev){
	ev.preventDefault();
	ev.target.innerHTML = ev.dataTransfer.getData("text");
	console.log(ev);
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


var guardar = document.getElementById('enlace-guardar');

guardar.addEventListener('click', function(e){
	console.log(e);
/*
	var array = [];
	var dia = [];
	for(var i = 0; i < 25; i++){
		if(document.getElementById('drop'+(i+1)).firstChild != null){
			array[i] = document.getElementById('drop'+(i+1)).firstChild.id;
		}
		dia[i] = document.getElementById('drop'+(i+1)).getAttribute('data-dia');
	}

	var horas = document.querySelectorAll('.horas');
	

	console.log(array);
	console.log(horas);
	console.log(dia);
	*/
	var array = [];
	for(var i = 0; i < 25; i++){
		var objeto = {
			dia: "",
			hora: "",
			instructor: "",
			trimestre: spanT.innerHTML,
			lugar: spanA.innerHTML
		};

		if(document.getElementById('drop'+(i+1)).firstChild != null){
			objeto.instructor = document.getElementById('drop'+(i+1)).firstChild.id;
			objeto.hora = document.getElementById('drop'+(i+1)).firstChild.parentElement.parentElement.childNodes[1].innerHTML;
		}
		objeto.dia = document.getElementById('drop'+(i+1)).getAttribute('data-dia');
		
		array[i] = objeto;
	}
	/*$.ajax({
		type: "POST",
		data: array,
		success: function(response){
			console.log(response);
		}
	});*/
	console.log(array);
});