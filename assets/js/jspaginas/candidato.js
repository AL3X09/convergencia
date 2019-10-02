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
                console.log(numerico);
                if (v.val > numerico) {
                    numerico = v.val;
                    console.log('1-' + numerico);
                    console.log('es mayor');

                } else if (v.val === numerico) {
                    console.log('2-' + numerico);
                    console.log('es igual');
                } else {
                    console.log('es menor');
                }

                $('#listadodinamico').append(

                    '<div class="col-md-4">' +
                    '<div id="tema1" class="card" onclick ="colorCambiar(' + v.id + ', checkTema_' + v.id + ')" style="width: 20rem;-webkit-filter:grayscale(100%)">' +
                    '<img class="card-img-top" src="' + base_url + 'orm/public/uploads/_/originals/' + v.filename + '" alt="Card image cap">' +
                    '<div class="card-body">' +
                    '<h4 class="card-title">' + v.nombre + '</h4>' +
                    '<p class="card-text">' +
                    v.descripcion +
                    '</p>' +
                    '<div class="form-check">' +
                    '<label class="form-check-label">' +
                    '<input id="checkTema' + v.id + '" class="form-check-input" type="checkbox" value="' + v.id + '">' +
                    'Seleccionar' +
                    '<span class="form-check-sign">' +
                    '<span class="check"></span>' +
                    '</span>' +
                    '</label>' +
                    '</div>' +
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