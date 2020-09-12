var cont = document.querySelector('#cont_form');
let abierto = false;
window.addEventListener('load', function(){
	
	buscarFicha();
	buscarTrimestre();

	document.querySelector('#agregar').addEventListener('click', function(){
		mostrarForm();
	});

	$('#agregar_trimestre').submit(function(ev){
		ev.preventDefault();
		const datos = {
			trimestre: $('#nombre_trimestre').val(),
			fecha_inicio: $('#fecha_inicio').val(),
			fecha_fin: $('#fecha_fin').val(),
			id_ficha: $('.container').attr('id'),
			id: $('#id_trimestre').val()
		}
		$.ajax({
			url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxTrimestre&p=agregar",
			type: "POST",
			data: datos,
			success: function(response){
				buscarTrimestre();
				$('#agregar_trimestre').trigger('reset');
				cont.style.display = 'none';
				abierto = false;
			}
		});
	});
});

function buscarFicha(){
	let id = {id_fic: $(".container").attr('id')};
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=obtenerdatos",
		type: "POST",
		data: id,
		success: function(response){
			const ficha = JSON.parse(response);
			document.querySelector('#num_ficha').innerHTML = ficha[0].num_ficha;
		}
	});
}
function buscarTrimestre(){
	const datos = {
		id_ficha: $(".container").attr('id')
	};
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxTrimestre&p=mostrar",
		type: "POST",
		data: datos,
		success: function(response){
			const trimestres = JSON.parse(response);
			let template = '';
			trimestres.forEach(trimestre =>{
				template += `
				<div class="trimestres">
				<div class="nombre_trimestre">
				<h2>${trimestre['trimestre']}</h2>
				<p>${trimestre['fecha_inicio']} / ${trimestre['fecha_fin']}</p>
				</div>
				<div class="info">
				<p><a href="index.php?v=crud&n=${trimestre["id_ficha"]}&t=${trimestre['id_horario']}" class="abrir">Abrir</a></p>
				<p><a href="" class="detalles">Detalles</a></p>
				<p><a href="" class="eliminar">Eliminar</a></p>
				</div>
				</div>`

			});
			$('#cont_trimestres').html(template);
		}
	});
}
function mostrarForm(){
	cont.style.display = 'flex';
	abierto = true;
}
cont.addEventListener('click', function(e){
	if(abierto == true && ((e.target == cont) || (e.target == cerrar))){
		abierto = false;
		cont.style.display = 'none';
	}
});