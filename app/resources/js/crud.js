function allowDrop(ev){
	ev.preventDefault();
}
var i = 0;
var copia;
function drag(ev){
    console.log(ev);
    // var obj = {
    //     document.querySelector('#instructor').value,
    //     document.querySelector('#ficha').value,
    //     document.querySelector('#ambiente').value
    // }
    // $.ajax({
    //     url: ,
    //     data: obj,
    //     async: false,
    //     success: function(response){

    //     }
    // });
    i++;
    copia = "<div class='caja' id="+ev.target.id+" style='background-color:red;'><p>" + ev.target.childNodes[1].innerHTML + "</p><div class='opciones'><i id=op"+i+" class='icon-cog'></i><div class='menu'><a class='detalles'>Detalles</a><a class='eliminar'>Eliminar</a></div></div></div></div>";
    ev.dataTransfer.setData('text', copia);
}

function drop(ev){
	ev.preventDefault();
	ev.target.innerHTML = ev.dataTransfer.getData("text");
}

function addSchedule() {

}

var bool = true;
$(document).on('click', '.icon-cog', function(e){
	document.querySelector('#'+e.target.id+" ~ .menu").classList.toggle('a');
});
$(document).on('click', '.detalles', function(e){
	console.log('le dio a los detalles');
});
$(document).on('click', '.eliminar', function(e){
	e.target.parentElement.parentElement.parentElement.parentElement.innerHTML= "";
});

window.addEventListener('load', function(){
    datosAmbiente();
});

function datosAmbiente(){
    let id_amb = $('.table').attr("id");
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=obtenerdatos",
        type: "POST",
        data: {id_amb},
        success: function (response) {
            const nombre = JSON.parse(response);
            $('#nombre_ambiente').html("<h3>"+nombre[0].nombre_ambiente+"</h3>");
        }
    });
}


