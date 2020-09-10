window.addEventListener('load', function(){
	mostrarFichas();	
});
function mostrarFichas(){
	// Este ajax hará la consulta de lo ambientes
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=mostrar",
		type: "GET",
		success: function(response){
			// Se toma la respuesta en una const y se convierte en JSON
			const fichas = JSON.parse(response);
			let template = '';
			// En este ciclo se recorre la constante que contiene un JSON
			fichas.forEach(ficha =>{
				// En esta variable se almacena el maquetado html que se quiere mostrar
				template += `
				<div class="fichas">
				<div class="numero_ficha">
				<h2>${ficha['num_ficha']}</h2>
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
	});
}