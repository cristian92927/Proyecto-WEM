var data;
$(document).ready(function(){

	buscar();

});

function buscar(){
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=mostrar",
		type: "GET",
		success: function(response){
			const instructores = JSON.parse(response);
			let template = '';
			instructores.forEach(instructor =>{
				template += `
				<div class="caja" docid="${instructor['documento']}" id="${instructor['id']}" style="background-color:${instructor['color']}" draggable="true" ondragstart="drag(event)">
				<p>${instructor['nombres']}</p>
				</div>`
			});
			$('#lugar').html(template);
		}
	});
}


var guardar = document.getElementById('enlace-guardar');

guardar.addEventListener('click', function(e){
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
			trimestre: "",
			lugar: ""
		};
		if(document.getElementById('drop'+(i+1)).firstChild != null){
			objeto.instructor = document.getElementById('drop'+(i+1)).firstChild.id;
			objeto.hora = document.getElementById('drop'+(i+1)).firstChild.parentElement.parentElement.childNodes[1].innerHTML;
		}
		objeto.dia = document.getElementById('drop'+(i+1)).getAttribute('data-dia');

		array[i] = objeto;
		
	}
	console.log(array);
	/*$.ajax({
		type: "POST",
		data: array,
		success: function(response){
			console.log(response);
		}
	});*/
});

