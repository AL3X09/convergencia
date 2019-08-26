/**
 * 
 */
$(document).ready(function() {

    listarPregunas();
});

function listarTemaNombrexx(callback) {
    //co
    $.ajax({
        url: base_url + 'tema/listarTemasXNombre',
        method: 'GET',
        success: function(response) {

            $.each(response, function(i, v) {
                test(v.id);
                /*
                cont = i + 1;
                console.log(cont);
                $('#listapreguntas').append(

                    '<div class="accordion" id="accordion_' + cont + '">' +
                    '<div class="card">' +
                    '<div class="card-header" id="heading_' + cont + '">' +
                    '<h2 class="mb-0">' +
                    '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_' + cont + '" aria-expanded="false" aria-controls="collapse_' + cont + '">' +
                    v.nombre +
                    '</button>' +
                    '</h2>' +
                    '</div>' +
                    '<div id="collapse_' + cont + '" class="collapse" aria-labelledby="heading_' + cont + '" data-parent="#listapreguntas">' +
                    '<div class="card-body" id="tema_' + v.id + '">' +
                    //
                    '</div>' +
                    '</div>' +
                    '</div>'
                )
                */

            });

        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        //si retorna un error es por que el correo no existe imprimo en consola y recargo pagina de inicio de sesión    console.error(textStatus, errorThrown); 
        //console.error(textStatus, errorThrown); // Algo fallo
        Swal.fire(
            '',
            "Error al intertar traer los datos del tablero de control",
            'error'
        );

    });
}

function listarPregunas(temaid) {
    //co
    $.ajax({
        url: base_url + 'pregunta/listarPreguntasXTema',
        method: 'GET',
        success: function(response) {

            $.each(response, function(i, v) {
                console.log(v);
                cont = i + 1;
                //fk_tema
                $("#listapreguntas").append(

                    '<div class="accordion" id="accordion_' + cont + '">' +
                    '<div class="card">' +
                    '<div class="card-header" id="heading_' + cont + '">' +
                    '<h2 class="mb-0">' +
                    '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_' + cont + '" aria-expanded="false" aria-controls="collapse_' + cont + '">' +
                    v.nombre +
                    '</button>' +
                    '</h2>' +
                    '</div>' +
                    '<div id="collapse_' + cont + '" class="collapse" aria-labelledby="heading_' + cont + '" data-parent="#listapreguntas">' +
                    '<div class="card-body" id="tema_' + v.id + '">' +
                    //
                    v[i]['pregunta'] +
                    '</div>' +
                    '</div>' +
                    '</div>'
                )

            });

        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        //si retorna un error es por que el correo no existe imprimo en consola y recargo pagina de inicio de sesión    console.error(textStatus, errorThrown); 
        //console.error(textStatus, errorThrown); // Algo fallo
        Swal.fire(
            '',
            "Error al intertar traer los datos del tablero de control",
            'error'
        );

    });
}