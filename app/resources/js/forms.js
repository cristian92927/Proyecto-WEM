

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
				<tr instructorId="${instructor['id']}">
					<td>${instructor['nombres']}</td>
					<td>${instructor['apellidos']}</td>
					<td>${instructor['documento']}</td>
					<td>${instructor['correo']}</td>
					<td>${instructor['horas']}</td>
					<td>${instructor['color']}</td>
					<td class="cont_boton">
						<div class="editar"><i class="icon-pencil"></i></div>
						<div class="borrar"><i class="icon-bin"></i></div>
					</td>
				</tr>`
			});
			$('#lista').html(template);
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
		color: $('#color').val()
	};
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=agregar",
		type: "POST",
		data: datos,
		success: function(response){
			buscar();
			$('#agregar_instructor').trigger('reset');
		}
	});
});
$(document).on('click', '.borrar', function(ev){
	let elementId = ev.target;
	console.log(ev.target[0]);
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=eliminar",
		type: "POST",
		data: {elementId},
		success: function(response){
			buscar();
		}
	});
});
$(document).on("click", ".editar", function(){
	const elemento = $(this)[0].parentElement.parentElement.id;
	console.log(elemento);
        //En este ajax se insertan los valores de la base de datos en los diferentes input
        //Que tiene el formulario4, con una peticion de consulta que se hace en el servlet obtenerId
        $.ajax({
        	url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=obtenerdatos",
        	type: "POST",
        	data: {elemento},
        	success: function (response) {
        		const instructores = JSON.parse(response);
        		$('#id').val(instructores[0].id);
        		$('#Nnombres').val(instructores[0].nombres);
        		$('#Napellidos').val(instructores[0].apellidos);
        		$('#Ncorreo').val(instructores[0].correo);
        		$('#Ncantidad_horas').val(instructores[0].horas);
        		$('#Ncolor').val(instructores[0].color);
        	}
        });
    });
$('#editar').submit(e => {
	e.preventDefault();
        //Se crean los name que tendrán los valores del formulario
        const postData = {
        	id: $('#id').val(),
        	nombres: $('#Nnombres').val(),
        	apellidos: $('#Napellidos').val(),
        	correo: $('#Ncorreo').val(),
        	cantidadHoras: $('#Ncantidad_horas').val(),
        	color: $('#Ncolor').val()
        };
        // Este ajax envía la informacion modificada mediante el Servlet Editar 
        $.ajax({
        	url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=editar",
        	type: "POST",
        	data: postData,
        	success: function (response) {
        		buscar();
        	}
        });
    });
});