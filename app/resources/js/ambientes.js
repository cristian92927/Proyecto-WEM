window.addEventListener('load', function(){
	mostrarAmbientes();	
});
function mostrarAmbientes(){
	// Este ajax hará la consulta de lo ambientes
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=mostrar",
		type: "GET",
		success: function(response){
			// Se toma la respuesta en una const y se convierte en JSON
			const ambientes = JSON.parse(response);
			let template = '';
			// En este ciclo se recorre la constante que contiene un JSON
			ambientes.forEach(ambiente =>{
				// En esta variable se almacena el maquetado html que se quiere mostrar
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
			// Se agrega el html que se ejecuto en el forEach a el contenedor
			$('#cont_ambientes').html(template);
		}
	});
}