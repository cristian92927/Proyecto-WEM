

// function allowDrop(ev){ // Función que permite la caída del elemento al ser arrastrado
// 	ev.preventDefault();
// }
// var i = 0;
// var copia;
// Función que define la información que se pasará al otro lugar(El mismo elemento o un elemento creado desde js)
// function drag(ev){
//     // var obj = {
//     //     document.querySelector('#instructor').value,
//     //     document.querySelector('#ficha').value,
//     //     document.querySelector('#ambiente').value
//     // }
//     // $.ajax({
//     //     url: ,
//     //     data: obj,
//     //     async: false,
//     //     success: function(response){

//     //     }
//     // });

    
//     i++; // contador para darle un id diferente a la opción de herramientas de cada elemento arrastrado
//     copia = "<div class='caja' id="+ev.target.id+" style='background-color:"+ev.target.style.backgroundColor+";'><p>" + ev.target.childNodes[1].innerHTML + "</p><div class='opciones'><i id=op"+i+" class='icon-cog'></i><div class='menu'><a class='detalles'>Detalles</a><a class='eliminar'>Eliminar</a></div></div></div></div>";
//     ev.dataTransfer.setData('text', copia); // Se envían los datos a la variable text
// }

// function drop(ev){ // Función que toma los datos de la función drag
// 	ev.preventDefault();
//     // Se insertan los datos en el lugar sobre el que se suelta elemento
// 	ev.target.innerHTML = ev.dataTransfer.getData("text");
// }

var celdaId;
// Evento de click para mostrar las opciones detalles y eliminar de cada elemento arrastrado a la tabla
$(document).on('click', '.icon-cog', function(e){
    // La función toggle inserta o elimina una clase dependiendo de si existe o no
	document.querySelector('#'+e.target.id+" ~ .menu").classList.toggle('a');
    console.log(e.target);
});
// Evento click sobre la opción detalles que mostrar la información del elemento arrastrado
$(document).on('click', '.detalles', function(e){
	console.log('le dio a los detalles');
});
// Evento click que eliminará el elemento arrastrado de la tabla
$(document).on('click', '.eliminar', function(e){
	e.target.parentElement.parentElement.parentElement.parentElement.innerHTML= "";
});
var td = document.querySelectorAll('td');
var cont = document.querySelector('#cont_form');
let abierto = false;
window.addEventListener('load', function(){
    datosFicha();
    mostrarDatos();
    buscarHorario();

    for (var i = 0; i < td.length; i++) {
        td[i].addEventListener('dblclick', mostrarForm);
    }

    // Función tipo submit para el envío de los datos para guardar el horario
    $('#form_competencia').submit(function(ev){
        ev.preventDefault();
        var celda_select = document.querySelector("#"+celdaId);
        const datos = {
            dia: celda_select.getAttribute('data-dia'),
            hora_inicio: celda_select.parentElement.getAttribute('data-inicio'),
            hora_fin: celda_select.parentElement.getAttribute('data-fin'),
            id_Ambiente: $('#select_ambiente').val(),
            id_Competencia: $('#select_competencia').val(),
            id_Instructor: $('#select_instructor').val(),
            id_Horario: $('table')[0].id,
            id_Usuario: $('main').attr('data-user')
        };
        console.log(datos);
        $.ajax({
            url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxDetallesHorario&p=agregar",
            type: "POST",
            data: datos,
            success: function(response){
                cont.style.display = 'none';
                $("#form_competencia").trigger('reset');
                buscarHorario();
            }
        });
        // var array = document.querySelectorAll('.drops');
        // array.forEach(ar =>{
        //     if((ar.dataset.dia == 'Viernes') && (ar.parentElement.dataset.inicio == '06:00:00')){
        //         $("#"+ar.id).html("<p>Hola</p>");
        //     }
        // })
            
        
    });
});
// Se defina la función que hace una petición de los datos de la ficha
function datosFicha(){
    let id_fic = $('.table').attr("id");
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=obtenerdatos",
        type: "POST",
        data: {id_fic},
        success: function (response) {
            const nombre = JSON.parse(response);
            // Se inserta el numero de la ficha en el título de la tabla
            $('#num_ficha').html("<h3>Ficha: "+nombre[0].num_ficha+"</h3>");
        }
    });
}
function mostrarForm(ev){ // Se define la función que se encarga de mostrar el formulario
    cont.style.display = 'flex'; // Se muestra el formulario
    abierto = true; // Se le da el valor true a la variable bandera
    celdaId = ev.target.id;
}
function mostrarDatos(){
    let select_instructor=document.querySelector('#select_instructor');
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjax&p=mostrar",
        type: "GET",
        success: function (response) {
            const instructores = JSON.parse(response);
            instructores.forEach(instructor =>{
                let option = document.createElement("option");
                option.text = instructor['nombres'];
                option.value = instructor['id'];
                select_instructor.add(option);
            });
        }
    });
    let select_competencia = document.querySelector('#select_competencia');
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxCompetencia&p=mostrar",
        type: "GET",
        success: function (response) {
            const competencias = JSON.parse(response);
            competencias.forEach(competencia =>{
                let option = document.createElement("option");
                option.text = competencia['nombre_comp'];
                option.value = competencia['id_comp'];
                select_competencia.add(option);
            });
        }
    });
    let select_ambiente = document.querySelector('#select_ambiente');
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxAmbiente&p=mostrar",
        type: "GET",
        success: function (response) {
            const ambientes = JSON.parse(response);
            ambientes.forEach(ambiente =>{
                let option = document.createElement("option");
                option.text = ambiente['nombre_ambiente'];
                option.value = ambiente['id_amb'];
                select_ambiente.add(option);
            });
        }
    });
}
var horario;
function buscarHorario(){
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxDetallesHorario&p=mostrar",
        type: "GET",
        success: function(response){
            horarios = JSON.parse(response);
            let template = '';
            var array = document.querySelectorAll('.drops');
            horarios.forEach(horario=>{
                template = `
                    <div class='caja' style='background-color:${horario['color']};'>
                    <h3>${horario['instructor']}</h3>
                    <p>${horario['competencia']}</p>
                    <p>${horario['ambiente']}</p>
                    <div class='opciones'>
                    <i id=op${horario['id']} data-id=${horario['id']} class='icon-cog'></i>
                    <div class='menu'>
                    <a class='detalles'>Detalles</a>
                    <a class='eliminar'>Eliminar</a>
                    </div>
                    </div>
                    </div>
                    </div>
                 `;
                array.forEach(ar =>{
                    if((ar.dataset.dia == horario['dia']) && (ar.parentElement.dataset.inicio == horario['hora_inicio'])){
                        $("#"+ar.id).html(template);
                    }
                });
            });
        }
    });
}
cont.addEventListener('click', function(e){ // Evento para esconder el formulario según donde se de clic
    // condición para cerrar el form si se da por fuera de este o en la X
    if(abierto == true && ((e.target == cont) || (e.target == cerrar))){
        abierto = false; // Se declara la variable como false para cerrar el form
        cont.style.display = 'none'; // Se esconde el form
    }
});