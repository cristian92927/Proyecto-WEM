window.addEventListener('load', function(){
	mostrarAmbientes();	

	$(document).on('click', '.abrir', function(ev){
		let element = $(this)[0].parentElement.parentElement;
		console.log(element);
		$.ajax({
			url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=eliminar",
			type: "POST",
			data: {id_amb},
			success: function(response){
				buscar_ambiente();
			}
		});
	});
});
function mostrarAmbientes(){
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=mostrar",
		type: "GET",
		success: function(response){
			const ambientes = JSON.parse(response);
			let template = '';
			ambientes.forEach(ambiente =>{
				template += `
				<div class="ambientes">
				<div class="nombre_Ambiente">
				<h2>${ambiente['nombre_ambiente']}</h2>
				</div>
				<div class="info">
				<p><a href="index.php?v=crud&n=${ambiente["id_amb"]}" class="abrir">Abrir</a></p>
				<p><a href="" class="detalles">Detalles</a></p>
				<p><a href="" class="eliminar">Eliminar</a></p>
				</div>
				</div>`
			});

			$('#cont_ambientes').html(template);
		}
	});
}