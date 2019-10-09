/**
 * 
 */
var numerico = 0;
$(document).ready(function() {
    GetCandidatosSeleccion();


});

function GetCandidatosSeleccion() {
    var pkusuario = $("#pkusuario").val();
    var conser = $("#conser").val();

    $.ajax({
        url: base_url + 'hojaVidaCandidato/listarCandidatoSeleccion',
        method: 'POST',
        data: { pkusuario: pkusuario, conser: conser },
        success: function(response) {

            $.each(response, function(i, v) {

                $('#listadocandidato').append(

                    '<div class="card" style="width: 22rem;height:20rem;">' +
                    '<div class="card-body">' +
                    '<img src="' + base_url + 'orm/public/uploads/_/originals/' + v.filename + '" alt="candidato" class="rounded mx-auto d-block" style="width: 60%; height: 50%">' +
                    '<h3 class="card-title text-dark">' + v.nombres + ' ' + v.apellidos + '</h3>' +
                    '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="DataCandidato(' + v.fk_candidato + ')">Ver Más</button>' +
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

    ValDataCandidatosSeleccion();
}

function ValDataCandidatosSeleccion() {
    var pkusuario = $("#pkusuario").val();
    var conser = $("#conser").val();

    $.ajax({
        url: base_url + 'hojaVidaCandidato/listarValCandidatoSeleccion',
        method: 'POST',
        data: { pkusuario: pkusuario, conser: conser },
        success: function(response) {

            $.each(response, function(i, v) {

                $('#listadodinamico').append(


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

function DataCandidato(id) {


    $.ajax({
        url: base_url + 'hojaVidaCandidato/getCandidato',
        method: 'POST',
        data: { fk_candidato: id },
        success: function(response) {

            $.each(response, function(i, v) {

                $('#contenidoModal').html(


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