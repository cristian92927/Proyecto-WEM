var cont = document.querySelector('#cont_form');
let abierto = false;
window.addEventListener('load', function() {
    var edit_ficha = false;
    // Se llama la función que mostrará la información de las fichas
    mostrarFichas();
    buscar_programaformacion();
    // Se define el evento click para el elemento con el + para agregar fichas
    document.querySelector('#agregar').addEventListener('click', function() {
        // Se muestra el formulario para registrar la ficha
        mostrarForm();
        // Se llama la función que buscará los programas de formación para la ficha que se registrará
    });
    // Se define la función submit para el formulario de agregar ficha
    $('#form_ficha').submit(function(ev) {
        ev.preventDefault();
        // Se toman los datos de los inputs en un objeto
        const datos = {
            nombre_gestor: $('#nombre_gestor').val(),
            num_ficha: $('#num_ficha').val(),
            id_programa: parseInt($('#nombre_prog').val()),
            id_fic: $('#id_fic').val()
        };
        let lugar = edit_ficha === false ? "peticionesAjaxFicha&p=agregar" : "peticionesAjaxFicha&p=editar";
        // Se llama la función que hará la petición ajax con los datos anteriores y la respectiva url
        peticion(lugar, "POST", datos);
        mostrarFichas();
        // Se reinicia el formulario
        $(this).trigger('reset');
        // Se esconde el formulario
        cont.style.display = 'none';
        edit_ficha = false;
    });
    $('.fichas').on('click', '.editar', function() {
        var id_fic = {
            id_fic: $(this)[0].parentElement.parentElement.parentElement.id
        };
        mostrarForm();
        var ficha = peticion("peticionesAjaxFicha&p=obtenerdatos", "POST", id_fic);
        $('#id_fic').val(ficha[0].id_fic);
        $('#nombre_gestor').val(ficha[0].nombre_gestor);
        $('#num_ficha').val(ficha[0].num_ficha);
        $('#nombre_prog').val(ficha[0].id_programa);
        edit_ficha = true;
    });
    $(".fichas").on('click', '.eliminar', function(ev) {
        if (confirm("Está seguro que desea eliminar esto?")) {
            let id_fic = {
                id_fic: $(this)[0].parentElement.parentElement.parentElement.id
            };
            peticion("peticionesAjaxFicha&p=eliminar", "POST", id_fic);
            mostrarFichas();
        }
    });
});
var inputs = document.querySelectorAll('.input');
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keyup', function() {
        if (this.value.length >= 1) {
            this.nextElementSibling.classList.add('fijar');
        } else {
            this.nextElementSibling.classList.remove('fijar');
        }
    });
}

function mostrarFichas() {
    // Esta función hace una petición ajax que trae la información de lo ambientes
    var fichas = peticion("peticionesAjaxFicha&p=mostrar", "GET", null);
    let template = '';
    // En este ciclo se recorre la constante que contiene un JSON
    fichas.forEach(ficha => {
        // En esta variable se almacena el maquetado html que se quiere mostrar
        template += `
        <div class="fichas" id=${ficha["id_fic"]}>
        <div class="numero_ficha">
        <h2>Ficha: ${ficha['num_ficha']} - ${ficha['id_programa']}</h2>
        <p>${ficha['nombre_gestor']}</p>
        </div>
        <div class="info">
        <p><a href="index.php?v=trimestre&n=${ficha["id_fic"]}" class="abrir">Abrir</a></p>
        <p><a class="editar">Editar</a></p>
        <p><a class="eliminar">Eliminar</a></p>
        </div>
        </div>`
    });
    // Se agrega el html que se ejecuto en el forEach a el contenedor
    $('#cont_fichas').html(template);
}
// Se define la función donde se realizará la petición ajax, la cual recibe la url, el tipo y los datos
function peticion(lugar, tipo, datos) {
    // se define la variable que será retornada
    let respuesta;
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=" + lugar,
        type: tipo,
        data: datos,
        async: false,
        success: function(response) {
            // En caso de no haber respuesta, retornará false para poder usar el código general sin error
            if (!response) {
                respuesta = false;
                return;
            }
            // Se almacena la respuesta convertida en JSON en la ariable definida anteriormente
            respuesta = JSON.parse(response);
        }
    });
    return respuesta;
}
// Se toma el select donde se mostrarán los programas mediante opciones
let select_programa = document.querySelector('#nombre_prog');
// se define función que recibe el array de la funcion buscar_programaformacion
function nombre_programa(array = []) {
    $("#nombre_prog option").remove(); // Se eliminan las opciones del select
    let optionDefault = document.createElement("option"); // se crea el elemento option
    optionDefault.text = "Seleccione un programa"; // se le envía el primer valor
    select_programa.add(optionDefault); // se agrega en el select
    for (var i = 0; i < array.length; i++) { // ciclo que recorre el array que llega por parametro
        let option = document.createElement("option"); // Se crea la opcion
        option.text = array[i]['nombre_programa']; // Se le agrega el nombre de programa como texto
        option.value = array[i]['id_pf']; // y el id se agrega como value
        select_programa.add(option); // se agrega el valor en el select
    }
}

function buscar_programaformacion() { // se define la funcion que busca los programas registrados
    // Se hace la petición ajax que trae los datos y se almacenan en una variable
    var programasformaciones = peticion("peticionesAjaxProgramaFormacion&p=mostrar", "GET", null);
    let template = ''; // Variable para la plantilla que será agregada en el documento
    nombre_programa(programasformaciones); // Se llama la función que agrega las funciones y se le pasa el array
}

function mostrarForm() { // Se define la función que se encarga de mostrar el formulario
    cont.style.display = 'flex'; // Se muestra el formulario
    abierto = true; // Se le da el valor true a la variable bandera
}
cont.addEventListener('click', function(e) { // Evento para esconder el formulario según donde se de clic
    // condición para cerrar el form si se da por fuera de este o en la X
    if (abierto == true && ((e.target == cont) || (e.target == cerrar))) {
        abierto = false; // Se declara la variable como false para cerrar el form
        cont.style.display = 'none'; // Se esconde el form
        $("#form_ficha").trigger('reset');
    }
});