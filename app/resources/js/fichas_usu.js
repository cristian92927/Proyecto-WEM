window.addEventListener('load', function() {
    /**
     * Se llama la función que mostrará la información de las fichas
     */
    mostrarFichas();
});

function mostrarFichas() {
    /** 
     * Esta función hace una petición ajax que trae la información de lo ambientes
    */
    var fichas = peticion("peticionesAjaxFicha&p=mostrar", "GET", null);
    let template = '';
    /** 
     * En este ciclo se recorre la constante que contiene un JSON
     */ 
    fichas.forEach(ficha => {
        /**
         * En esta variable se almacena el maquetado html que se quiere mostrar
         */
        template += `
        <div class="fichas" id=${ficha["id_fic"]}>
        <div class="numero_ficha">
        <h2>Ficha: ${ficha['num_ficha']} - ${ficha['id_programa']}</h2>
        <p>${ficha['nombre_gestor']}</p>
        </div>
        <div class="info">
        <p><a href="index.php?v=trimestre&n=${ficha["id_fic"]}" class="abrir">Abrir</a></p>
        </div>
        </div>`
    });
    /** 
     * Se agrega el html que se ejecuto en el forEach a el contenedor
    */
    $('#cont_fichas').html(template);
}
/** 
 * Se define la función donde se realizará la petición ajax, la cual recibe la url, el tipo y los datos
*/
function peticion(lugar, tipo, datos) {
    /** 
     * se define la variable que será retornada
    */
    let respuesta;
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=" + lugar,
        type: tipo,
        data: datos,
        async: false,
        success: function(response) {
            /** 
             * En caso de no haber respuesta, retornará false para poder usar el código general sin error
            */
            if (!response) {
                respuesta = false;
                return;
            }
            /** 
             * Se almacena la respuesta convertida en JSON en la ariable definida anteriormente
            */
            respuesta = JSON.parse(response);
        }
    });
    return respuesta;
}
