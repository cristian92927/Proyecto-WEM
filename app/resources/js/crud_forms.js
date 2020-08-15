$(document).ready(function(){

buscar();

function buscar(){
	$.ajax({
		url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=mostrar",
		type: "GET",
		success: function(response){
			const instructores = JSON.parse(response);
			let template = '';
			instructores.forEach(instructor =>{
				template += `
				<div class="caja" docid="${instructor['documento']}" id="${instructor['id']}" style="background-color:${instructor['color']}" draggable="true" ondragstart="drag(event)">
				<p>${instructor['nombres']}</p>
				</div>`
			});
			$('#lugar').html(template);
		}
	})
}
})