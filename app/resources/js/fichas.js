var cont = document.querySelector('#cont_form');
let abierto = false;
window.addEventListener('load', function(){
	mostrarFichas();
	document.querySelector('#agregar').addEventListener('click', function(){
		mostrarForm();
		buscar_programaformacion();
	});
	$('#agregar_ficha').submit(function(ev){
		ev.preventDefault();
		const datos = {
			nombre_gestor: $('#nombre_gestor').val(),
			num_ficha: $('#num_ficha').val(),
			id_programa: parseInt($('#nombre_prog').val()),
			id_fic:$('#id_fic').val()
		};
		
		peticion("peticionesAjaxFicha&p=agregar", "POST", datos);
		mostrarFichas();
		$(this).trigger('reset');
	});
});
function mostrarFichas(){
	// Este ajax hará la consulta de lo ambientes
	var fichas = peticion("peticionesAjaxFicha&p=mostrar", "GET", null);
	let template = '';
	// En este ciclo se recorre la constante que contiene un JSON
	fichas.forEach(ficha =>{
		// En esta variable se almacena el maquetado html que se quiere mostrar
		template += `
		<div class="fichas">
		<div class="numero_ficha">
		<h2>Ficha: ${ficha['num_ficha']} - ${ficha['id_programa']}</h2>
		<p>${ficha['nombre_gestor']}</p>
		</div>
		<div class="info">
		<p><a href="index.php?v=trimestre&n=${ficha["id_fic"]}" class="abrir">Abrir</a></p>
		<p><a href="" class="detalles">Detalles</a></p>
		<p><a href="" class="eliminar">Eliminar</a></p>
		</div>
		</div>`
	});
	// Se agrega el html que se ejecuto en el forEach a el contenedor
	$('#cont_fichas').html(template);
	
}
function peticion(lugar, tipo, datos){
	let respuesta;
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=" + lugar,
		type: tipo,
		data: datos,
		async: false,
		success: function(response){
			if(!response){
				respuesta = false;
				return;
			}
			respuesta = JSON.parse(response);
			// funcion();
			// $('#'+idform).trigger('reset');
		}
	});
	return respuesta;
}
let select_programa=document.querySelector('#nombre_prog');
function nombre_programa(array=[]){
	$("#nombre_prog option").remove();
	let optionDefault = document.createElement("option");
	optionDefault.text = "Seleccione alguno";
	select_programa.add(optionDefault);
	for(var i = 0; i < array.length ; i++){
		let option = document.createElement("option");
		option.text = array[i]['nombre_programa'];
		option.value = array[i]['id_pf'];
		select_programa.add(option);
	}
}
function buscar_programaformacion(){
	var programasformaciones = peticion("peticionesAjaxProgramaFormacion&p=mostrar", "GET", null);
	let template = '';
	nombre_programa(programasformaciones);
	programasformaciones.forEach(programaformacion =>{
		template += `
		<tr data-id="${programaformacion['id_pf']}">
		<td>${programaformacion['id_pf']}</td>
		<td>${programaformacion['nombre_programa']}</td>
		<td>${programaformacion['descripcion_programa']}</td>
		<td class="cont_boton">
		<div class="editar"><i class="icon-pencil"></i></div>
		<div class="borrar"><i class="icon-bin"></i></div>
		</td>
		</tr>`;

	});
	$('#lista_programa').html(template);
}
function mostrarForm(){
	cont.style.display = 'flex';
	abierto = true;
	cerrar.addEventListener('click', function(){
		cont.style.display='none';
	});
}
cont.addEventListener('click', function(e){
	if(abierto == true && e.target == cont){
		abierto = false;
		cont.style.display = 'none';
	}
});
