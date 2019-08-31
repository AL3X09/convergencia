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
    var lista = $("#listapreguntas");
    $.ajax({
        url: base_url + 'pregunta/listarPreguntasXTema',
        method: 'GET',
        success: function(response) {

            $.each(response, function(i, v) {


                cont = i + 1;
                var conte = '<div class="accordion" id="accordion_' + cont + '">';
                conte += '<div class="card">';
                conte += '<div class="card-header" id="heading_' + cont + '">';
                conte += '<h2 class="mb-0">';
                conte += '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_' + cont + '" aria-expanded="false" aria-controls="collapse_' + cont + '">';
                conte += v.nombre;
                conte += '</button>';
                conte += '</h2>';
                conte += '</div>';
                conte += '<div id="collapse_' + cont + '" class="collapse" aria-labelledby="heading_' + cont + '" data-parent="#listapreguntas">';
                conte += '<div class="card-body" id="tema_' + v.id + '">';
                //rrecorro preguntas
                $.each(v.preguntas, function(ip, p) {
                    //console.log(p);
                    conte += '<div class="form-group">' +
                        '<label for="' + p.pregunta + '">' + p.pregunta + '</label>' +

                        '</div>';

                    $.each(p.respuestas, function(iq, q) {
                        //console.log(p.pregunta);
                        conte += '<div class="form-check form-check-radio">' +
                            '<label class="form-check-label">' +
                            '<input class="form-check-input" type="radio" name="' + p.pregunta + '" id="exampleRadios' + q + '" value="option1" >' +
                            '<span class="form-check-sign"></span>' +
                            q.respuesta +
                            '</label>' +
                            '</div>' +
                            '</div>';

                    })
                })
                conte += '</div>';
                conte += '</div>';
                conte += '</div>';
                lista.append(conte);
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