var data;
$(document).ready(function(){

	buscar();
	GetFicha();
	let ficha = document.getElementById("ficha");
	ficha.addEventListener('change', function(){
		$("#trimestre option").remove();
		let trimestre = document.getElementById('trimestre');
		var ficha = $("#ficha").val();
	    //Ciclo for para recorrer la variable global data, obtener las ciudades y añadirlas a una opcion de un select
	    for (var i in data[ficha]) {
	    	var option = document.createElement("option");
	    	option.text = data[ficha][i];
	    	option.value = data[ficha][i];
	    	trimestre.add(option);
	    }
});

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

function GetFicha() {
	let ficha = document.getElementById("ficha");
	//Se hace un peticion ajax a la url para obtener los datos y almacenarlos en la variable data
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=mostrar",
		type: "GET",
		success: function (response) {
			data = JSON.parse(response);
		//ciclo para recorrer los datos de la url, obtener los departamentos y asignarlos a una opción de un select
		for (var i = 0; i < data.length; i++) {
			var option = document.createElement("option");
			option.text = data[i].num_ficha;
			option.value = data[i].num_ficha;
			ficha.add(option);
		}
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

