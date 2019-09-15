/**
 * 
 */
$(document).ready(function() {

    listarTemas();

    $("#formtema").on("submit", function() {
        //Code: Action (like ajax...)
        // validar();
        return false;
    })

});

function listarTemas() {
    var comillaSimple = "'";
    $.ajax({
        url: base_url + 'tema/listarTemas',
        method: 'GET',
        success: function(response) {

            $.each(response, function(i, v) {

                $('#listadodinamico').prepend(

                    '<div id="tema' + v.id + '" class="card" onclick ="colorCambiar(' + comillaSimple + 'tema' + v.id + comillaSimple + ',' + comillaSimple + 'checkTema' + v.id + comillaSimple + ')" style="width: 20rem;-webkit-filter:grayscale(100%)">' +
                    '<div style="width: 320px; height: 180px;">' +
                    '<img src="' + base_url + 'orm/public/uploads/_/originals/' + v.filename + '" alt="Card image cap" style="width: 100%; height: 100%">' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<h4 class="card-title">' + v.nombre + '</h4>' +
                    '<p class="card-text">' +
                    //v.descripcion +
                    '</p>' +
                    '<div class="form-check">' +
                    '<label class="form-check-label">' +
                    '<input type="checkbox" name="checkTema[]" id="checkTema' + v.id + '" class="form-check-input" value="' + v.id + '">' +
                    'Seleccionar' +
                    '<span class="form-check-sign">' +
                    '<span class="check"></span>' +
                    '</span>' +
                    '</label>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                )

            });

        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        //si retorna un error es por que el correo no existe imprimo en consola y recargo pagina de inicio de sesión    console.error(textStatus, errorThrown); 
        console.error(textStatus, errorThrown); // Algo fallo
        alertify.error("Error al intertar traer los temas", function() {
            alertify.message('OK');
        });
    });

}

function validar() {

    $("#formtema").validate({
        rules: {
            'checkTema[]': {
                required: true,
                minlength: 5
            }
        },
        messages: {
            'checkTema[]': {
                required: "Debe seleccionar cinco temas",
                maxlength: "Debe seleccionar maximo {0} temas"
            },
        },
        errorElement: 'label',
        errorPlacement: function(error, element) {
            var type = $(element).attr("type");
            error.addClass("form-error-message mb-0");
            error.appendTo($("#errores"));
        },
        submitHandler: function() {
            enviarDatos();
        }
    });

}


function enviarDatos() {

    $.ajax({
        type: "POST",
        url: base_url + "Tema/insertar",
        data: $('#formtema').serialize(),
        beforeSend: function(xhr) {
            alertify.alert('Espere', 'Almacenando Información!');
        }
    }).done(function(data) {

        if (data.tipo = "success") {

            setTimeout(function() {
                document.location.href = base_url + "Pregunta/"
            }, 2000);

        } else {
            alertify.alert(data.msg, function() {
                location.reload();
            });
        }
    });

}