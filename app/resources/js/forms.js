

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
	var etiqueta = document.querySelectorAll('.menu > a');
	let edit = false;	

	for(var i = 0; i < etiqueta.length; i++){
		etiqueta[i].addEventListener('click', cambiar);
	}

	function cambiar(ev){
		document.querySelector('.active').classList.remove('active');
		ev.target.className = 'active';
		document.querySelector('.show').classList.remove('show');
		document.querySelector('#'+ev.target.getAttribute('data-class')).classList.toggle('show');
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
    	let lugar = edit === false ? 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=agregar' : 'http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=editar';
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
	$(document).on('click', '.borrar', function(ev){
		if(confirm("Are you sure you want to delete it?")){
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('data-id');
			console.log(id);
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
	$(document).on("click", ".editar", function(){
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
      			edit = true;
        	}
        });
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
		});
	}
