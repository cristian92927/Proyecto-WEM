var data;
$(document).ready(function(){

	buscar();

});
// Se define la función que traerá los datos de los instructores
function buscar(){
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=mostrar",
		type: "GET",
		success: function(response){
			const instructores = JSON.parse(response);
			let template = '';
			instructores.forEach(instructor =>{
				// Se les asigna información y se les da unos estilos según los datos traidos 
				template += `
				<div class="caja" docid="${instructor['documento']}" id="${instructor['id']}" style="background-color:${instructor['color']}" draggable="true" ondragstart="drag(event)">
				<p>${instructor['nombres']}</p>
				</div>`
			});
			// Se insertan el formato html en una caja del documento 
			$('#lugar').html(template);
		}
	});
}
