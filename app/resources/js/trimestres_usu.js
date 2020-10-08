window.addEventListener('load', function() {
    buscarFicha();
    buscarTrimestre();
});
function buscarFicha() {
    let id = {
        id_fic: $(".container").attr('id')
    };
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxFicha&p=obtenerdatos",
        type: "POST",
        data: id,
        success: function(response) {
            const ficha = JSON.parse(response);
            document.querySelector('#num_ficha').innerHTML = ficha[0].num_ficha;
        }
    });
}

function buscarTrimestre() {
    const datos = {
        id_ficha: $(".container").attr('id')
    };
    $.ajax({
        url: "http://localhost/Proyecto-WEM/index.php?v=peticionesAjaxTrimestre&p=mostrar",
        type: "POST",
        data: datos,
        success: function(response) {
            const trimestres = JSON.parse(response);
            let template = '';
            trimestres.forEach(trimestre => {
                template += `
                <div class="trimestres" id=${trimestre['id_horario']}>
                <div class="nombre_trimestre">
                <h2>${trimestre['trimestre']}</h2>
                <p>${trimestre['fecha_inicio']} / ${trimestre['fecha_fin']}</p>
                </div>
                <div class="info">
                <p><a href="index.php?v=crud&n=${trimestre["id_ficha"]}&t=${trimestre['id_horario']}" class="abrir">Abrir</a></p>
                </div>
                </div>`
            });
            $('#cont_trimestres').html(template);
        }
    });
}
