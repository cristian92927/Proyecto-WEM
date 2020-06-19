let cont = document.getElementsByClassName('container')[0];
let cerrar = document.getElementById('cerrar');
// variables del Enlace Crear //
let crear = document.getElementById('enlace-crear');
// variables de formularios
let form1 = document.getElementById('agregar');
let form2 = document.getElementById('editar');
let abierto = false;
// Formulario crear //


$(document).ready(function(){

buscar();
	crear.addEventListener('click', function(){
		cont.style.display = 'flex';
		form1.style.display = 'block';
		form2.style.display = 'none';
		abierto = true;
		cerrar.addEventListener('click', function(){
			cont.style.display='none';
		});
	});
// Contenedor de formularios //
cont.addEventListener('click', function(e){
	if(abierto == true && e.target == cont){
		abierto = false;
		cont.style.display = 'none';
	}
});

function buscar(){
	$.ajax({
		url: "mostrar.php",
		type: "GET",
		success: function(response){
			const instructores = JSON.parse(response);
			let template = '';
			instructores.forEach(instructor =>{
				template += `
				<div class="caja" docid="${instructor['documento']}" id="${instructor['id']}" style="background-color:${instructor['color']}" draggable="true" ondragstart="drag(event)">
				<p>${instructor['nombres']}</p>
				<div class="button">
				<div class="editar"><i class="icon-pencil"></i></div>
				<div class="borrar"><i class="icon-bin"></i></div>
				</div>
				</div>`
			});
			$('#lugar').html(template);
		}
	})
}

$('#agregar').submit(function(ev){
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
		url: "agregar.php",
		type: "POST",
		data: datos,
		success: function(response){
			buscar();
			$('#agregar').trigger('reset');
        	$('.container').css('display', 'none');
        	$('#editar').css('display', 'none');
		}
	});
});
$(document).on('click', '.borrar', function(){
	if(confirm('Está seguro de eliminar este instructor?')){
		let elementId = $(this)[0].parentElement.parentElement.id;
		$.ajax({
			url: "eliminar.php",
			type: "POST",
			data: {elementId},
			success: function(response){
				buscar();
			}
		});
	}
});
$(document).on("click", ".editar", function(){
	const elemento = $(this)[0].parentElement.parentElement.id;
	$('.container').css('display', 'flex');
	$('#editar').css('display', 'block');
	$('#agregar').css('display', 'none');
	abierto = true;
	cerrar.addEventListener('click', function () {
		$('.container').css('display', 'none');
	});
	console.log(elemento);
        //En este ajax se insertan los valores de la base de datos en los diferentes input
        //Que tiene el formulario4, con una peticion de consulta que se hace en el servlet obtenerId
        $.ajax({
        	url: "obtenerDatos.php",
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
        	url: "editar.php",
        	type: "POST",
        	data: postData,
        	success: function (response) {
        		buscar();
        		$('.container').css('display', 'none');
        		$('#editar').css('display', 'none');
        	}
        });
    });
})