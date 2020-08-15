

/*document.getElementById('mostrarLista').addEventListener('click', function(){
	var html ="<td>Hola 2</td><td>Hola 2</td><td>Hola 2</td><td>Hola 2</td><td>Hola 2</td><td>Hola 2</td>";
	appendHtml(document.querySelector('#lista'), html); 
});
var template="";

function appendHtml(el, str) {
	template += `
	<tr>
		<td>Hola</td>
		<td>Hola</td>
		<td>Hola</td>
		<td>Hola</td>
		<td>Hola</td>
		<td>Hola</td>
	</tr>`;
	$('#lista').html(template);
}*/
$(document).ready(function(){
	buscar();
	buscar_ambiente();
	buscar_ficha();
	buscar_programaformacion();
	var etiqueta = document.querySelectorAll('.menu > a');
	let edit_instructor = false;
	let edit_ambiente = false;
	let edit_ficha = false;
	let edit_programaformacion = false;

	for(var i = 0; i < etiqueta.length; i++){
		etiqueta[i].addEventListener('click', cambiar);
	}

	function cambiar(ev){
		document.querySelector('.active').classList.remove('active');
		ev.target.className = 'active';
		document.querySelector('.show').classList.remove('show');
		document.querySelector('#'+ev.target.getAttribute('data-class')).classList.toggle('show');
	}

	function buscar(){
		$.ajax({
			url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=mostrar",
			type: "GET",
			success: function(response){
				const instructores = JSON.parse(response);
				let template = '';
				instructores.forEach(instructor =>{
					template += `
					<tr data-id="${instructor['id']}">
					<td>${instructor['id']}</td>
					<td>${instructor['nombres']}</td>
					<td>${instructor['apellidos']}</td>
					<td>${instructor['documento']}</td>
					<td>${instructor['correo']}</td>
					<td>${instructor['horas']}</td>
					<td style="background-color:${instructor['color']}; color: black;">${instructor['color']}</td>
					<td class="cont_boton">
					<div class="editar"><i class="icon-pencil"></i></div>
					<div class="borrar"><i class="icon-bin"></i></div>
					</td>
					</tr>`
				});
				$('#lista_instructor').html(template);
			}
		})
	}
	
	$('#agregar_instructor').submit(function(ev){
		ev.preventDefault();
		const datos = {
			nombres: $('#nombres').val(),
			apellidos: $('#apellidos').val(),
			documento: $('#documento').val(),
			correo: $('#correo').val(),
			horas: $('#horas').val(),
			color: $('#color').val(),
			id: $('#id').val()
		};
    	let lugar = edit_instructor=== false ? 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=agregar' : 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=editar';
		$.ajax({
			url: lugar,
			type: "POST",
			data: datos,
			success: function(response){
				buscar();
				$('#agregar_instructor').trigger('reset');
			}
		});
	});
	$("#registrar_instructor").on('click', '.borrar', function(ev){
		if(confirm("Are you sure you want to delete it?")){
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('data-id');
			$.ajax({
				url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=eliminar",
				type: "POST",
				data: {id},
				success: function(response){
					buscar();
				}
			});
		}
	});
	$("#registrar_instructor").on("click", ".editar", function(){
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('data-id');
        //En este ajax se insertan los valores de la base de datos en los diferentes input
        //Que tiene el formulario4, con una peticion de consulta que se hace en el servlet obtenerId
        $.ajax({
        	url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=obtenerdatos",
        	type: "POST",
        	data: {id},
        	success: function (response) {
        		const instructores = JSON.parse(response);
        		$('#id').val(instructores[0].id);
        		$('#nombres').val(instructores[0].nombres);
        		$('#apellidos').val(instructores[0].apellidos);
        		$('#documento').val(instructores[0].documento);
        		$('#correo').val(instructores[0].correo);
        		$('#horas').val(instructores[0].horas);
        		$('#color').val(instructores[0].color);
      			edit_instructor = true;
        	}
        });
	});
	




	function buscar_ambiente(){
		$.ajax({
			url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=mostrar",
			type: "GET",
			success: function(response){
				const ambientes = JSON.parse(response);
				let template = '';
				ambientes.forEach(ambiente =>{
					template += `
					<tr data-id="${ambiente['id_amb']}">
					<td>${ambiente['id_amb']}</td>
					<td>${ambiente['nombre_ambiente']}</td>
					<td>${ambiente['descripcion_ambiente']}</td>
					<td class="cont_boton">
					<div class="editar"><i class="icon-pencil"></i></div>
					<div class="borrar"><i class="icon-bin"></i></div>
					</td>
					</tr>`
				});
				$('#lista_ambiente').html(template);
			}
		})
	}

	$('#agregar_ambiente').submit(function(ev){
		ev.preventDefault();
		const datos = {
			nombre_ambiente: $('#nombre_ambiente').val(),
			descripcion_ambiente: $('#descripcion_ambiente').val(),
			id_amb:$('#id_amb').val()
		};
		let lugar = edit_ambiente === false ? 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=agregar' : 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=editar';
		$.ajax({
			url: lugar,
			type: "POST",
			data: datos,
			success: function(response){
				buscar_ambiente();
				$('#agregar_ambiente').trigger('reset');
			}
		});
	});
	$("#registrar_ambiente").on('click', '.borrar', function(ev){
		if(confirm("Are you sure you want to delete it?")){
			let element = $(this)[0].parentElement.parentElement;
			let id_amb = $(element).attr('data-id');
			$.ajax({
				url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=eliminar",
				type: "POST",
				data: {id_amb},
				success: function(response){
					buscar_ambiente();
				}
			});
		}
	});
	$("#registrar_ambiente").on("click", ".editar", function(){
		let element = $(this)[0].parentElement.parentElement;
		let id_amb = $(element).attr('data-id');
        //En este ajax se insertan los valores de la base de datos en los diferentes input
        //Que tiene el formulario4, con una peticion de consulta que se hace en el servlet obtenerId
        $.ajax({
        	url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=obtenerdatos",
        	type: "POST",
        	data: {id_amb},
        	success: function (response) {
        		const ambiente = JSON.parse(response);
        		$('#id_amb').val(ambiente[0].id_amb);
        		$('#nombre_ambiente').val(ambiente[0].nombre_ambiente);
        		$('#descripcion_ambiente').val(ambiente[0].descripcion_ambiente);
      			edit_ambiente = true;
        	}
        });
	});




	function buscar_ficha(){
		$.ajax({
			url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=mostrar",
			type: "GET",
			success: function(response){
				const fichas = JSON.parse(response);
				let template = '';
				fichas.forEach(ficha =>{
					template += `
					<tr data-id="${ficha['id_fic']}">
					<td>${ficha['id_fic']}</td>
					<td>${ficha['nombre_gestor']}</td>
					<td>${ficha['num_ficha']}</td>
					<td>${ficha['id_programa']}</td>
					<td class="cont_boton">
					<div class="editar"><i class="icon-pencil"></i></div>
					<div class="borrar"><i class="icon-bin"></i></div>
					</td>
					</tr>`
				});
				$('#lista_ficha').html(template);
			}
		})
	}

	$('#agregar_ficha').submit(function(ev){
		ev.preventDefault();
		const datos = {
			nombre_gestor: $('#nombre_gestor').val(),
			num_ficha: $('#num_ficha').val(),
			id_fic:$('#id_fic').val()
		};
		let lugar = edit_ficha === false ? 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=agregar' : 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=editar';
		$.ajax({
			url: lugar,
			type: "POST",
			data: datos,
			success: function(response){
				buscar_ficha();
				$('#agregar_ficha').trigger('reset');
			}
		});
	});
	$("#registrar_ficha").on('click', '.borrar', function(ev){
		if(confirm("Are you sure you want to delete it?")){
			let element = $(this)[0].parentElement.parentElement;
			let id_fic = $(element).attr('data-id');
			$.ajax({
				url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=eliminar",
				type: "POST",
				data: {id_fic},
				success: function(response){
					buscar_ficha();
				}
			});
		}
	});
	$("#registrar_ficha").on("click", ".editar", function(){
		let element = $(this)[0].parentElement.parentElement;
		let id_fic = $(element).attr('data-id');
        //En este ajax se insertan los valores de la base de datos en los diferentes input
        //Que tiene el formulario4, con una peticion de consulta que se hace en el servlet obtenerId
        $.ajax({
        	url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=obtenerdatos",
        	type: "POST",
        	data: {id_fic},
        	success: function (response) {
        		const ficha = JSON.parse(response);
        		$('#id_fic').val(ficha[0].id_fic);
        		$('#nombre_gestor').val(ficha[0].nombre_gestor);
				$('#num_ficha').val(ficha[0].num_ficha);
				$('#id_programa').val(ficha[0].id_programa);
      			edit_ficha = true;
        	}
        });
	});






	function buscar_programaformacion(){
		$.ajax({
			url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxProgramaFormacion&p=mostrar",
			type: "GET",
			success: function(response){
				const programasformaciones = JSON.parse(response);
				let template = '';
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
					</tr>`
				});
				$('#lista_programa').html(template);
			}
		})
	}

	$('#agregar_programaformacion').submit(function(ev){
		ev.preventDefault();
		const datos = {
			nombre_programa: $('#nombre_programa').val(),
			descripcion_programa: $('#descripcion_programa').val(),
			id_pf:$('#id_pf').val()
		};
		let lugar = edit_programaformacion === false ? 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxProgramaFormacion&p=agregar' : 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxProgramaFormacion&p=editar';
		$.ajax({
			url: lugar,
			type: "POST",
			data: datos,
			success: function(response){
				buscar_programaformacion();
				$('#agregar_programaformacion').trigger('reset');
			}
		});
	});
	$("#registrar_programa").on('click', '.borrar', function(ev){
		if(confirm("Are you sure you want to delete it?")){
			let element = $(this)[0].parentElement.parentElement;
			let id_pf = $(element).attr('data-id');
			$.ajax({
				url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxProgramaFormacion&p=eliminar",
				type: "POST",
				data: {id_pf},
				success: function(response){
					buscar_programaformacion();
				}
			});
		}
	});
	$("#registrar_programa").on("click", ".editar", function(){
		let element = $(this)[0].parentElement.parentElement;
		let id_pf = $(element).attr('data-id');
        //En este ajax se insertan los valores de la base de datos en los diferentes input
        //Que tiene el formulario4, con una peticion de consulta que se hace en el servlet obtenerId
        $.ajax({
        	url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxProgramaFormacion&p=obtenerdatos",
        	type: "POST",
        	data: {id_pf},
        	success: function (response) {
        		const programaformacion = JSON.parse(response);
        		$('#id_pf').val(programaformacion[0].id_pf);
        		$('#nombre_programa').val(programaformacion[0].nombre_programa);
        		$('#descripcion_programa').val(programaformacion[0].descripcion_programa);
      			edit_programaformacion = true;
        	}
        });
	});
});

