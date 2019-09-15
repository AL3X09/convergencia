/**
 * 
 */
$(document).ready(function() {
    listarPregunas();

    /*$("#formrespuestas").on("submit", function() {
        return false;
        EnviarRespuesta();
    })*/

});

//eliminar
function listarTemaNombrexx(callback) {
    //co
    $.ajax({
        url: base_url + 'tema/listarTemasXNombreXUsuario',
        method: 'GET',
        data: { pkusuario: pkusuario },
        success: function(response) {

            $.each(response, function(i, v) {
                test(v.id);

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


function listarPregunas() {

    var pkusuario = $("#pkusuario").val();

    var lista = $("#formrespuestas");
    count2 = 0;
    //var conte = '<form id="formrespuestas" onsubmit="validar()">';

    var conte = '<div class="row">';
    conte += '<div class="col-md-12">';
    conte += '<div class="card">';
    conte += '<div class="card-header card-header-danger">';
    conte += '<div class="nav-tabs-navigation">';
    conte += '<div class="nav-tabs-wrapper">';
    conte += '<ul class="nav nav-tabs nav-tabs-neutral justify-content-center" data-background-color="orange">';
    $.ajax({
        url: base_url + 'pregunta/listarPreguntasXUsuario',
        method: 'POST',
        data: { pkusuario: pkusuario },
        success: function(response) {

            //########################################LISTAR TEMAS #########################################
            count2 = count2 + 1
            $.each(response, function(i, v) {
                if (count2 == 1) {
                    //console.log("entro");
                    conte += '<li class="nav-item">';
                    // ACA  pinta el primer enlace 'Active'
                    // conte += '<a class="nav-link active" href="#'+v.nombre+'" data-toggle="tab">'+v.nombre+'</a>';
                    conte += '<a class="nav-link" href="#' + v.nombre + '" data-toggle="tab">' + v.nombre + '</a>';
                    conte += '</li>';
                }
            })
            conte += '</ul>';
            conte += '</div>';
            conte += '</div>';
            conte += '</div>';
            conte += '<div class="card-body">';
            conte += '<div class="tab-content text-left">';
            //##############################################################################################  

            //RECORRER PREGUNTAS
            $.each(response, function(ie, vr) {
                conte += '<div class="tab-pane" id="' + vr.nombre + '">';
                //RECORRER RESPUESTAS
                $.each(vr.preguntas, function(ip, p) {
                    //console.log(p);
                    //conte += '<div class="tab-pane active" id="'+v.nombre+'">';       

                    conte += '<p>' + p.pregunta + '</p>';
                    $.each(p.respuestas, function(iq, q) {
                        //console.log(iq);
                        conte += '<div class="form-check form-check-radio">' +
                            '<label class="form-check-label">' +
                            '<input class="form-check-input" type="radio" name="' + p.id + '" id="exampleRadios' + q.id + '" value="' + q.id + '" required>' +
                            '<span class="form-check-sign"></span>' +
                            q.respuesta +
                            '</label>' +
                            '</div>' +
                            '<br>';
                    })

                })
                conte += '</div>';
            })
            conte += '</div>';
            conte += '</div>';
            conte += '</div>';
            conte += '<div class="card-footer text-center">';
            conte += '<div class="pull-left">';
            conte += '<div id="errores"></div>';
            conte += '</div>';
            conte += '</div>';
            conte += '<div class="input-group no-border input-lg">';
            conte += '<input name="pkusuario" id="pkusuario" type="hidden" class="form-control" value="' + pkusuario + '" required/>';
            conte += '</div>';
            conte += '<button type="submit" class="btn btn-primary btn-lg">Ver Resultado</button>';
            conte += '</div>';
            conte += '</div>';
            conte += '</div>';
            conte += '</form>';
            lista.append(conte);
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

function validarresp() {


    /*$("#formrespuestas").validate({
        rules: {

        },
        messages: {
            //'checkTema[]': {
            required: "Debe seleccionar completar todas las respuestas",
            //},
        },
        errorElement: 'label',
        errorPlacement: function(error, element) {
            var type = $(element).attr("type");
            error.addClass("form-error-message mb-0");
            error.appendTo($("#errores"));
        },
        submitHandler: function() {
            EnviarRespuesta();
        }
    });*/

}


//envio respuestas
function EnviarRespuesta() {
    console.log('entra');
    //co
    $.ajax({
        url: base_url + 'Pregunta/InsertarXusuario',
        method: 'POST',
        data: $("#formrespuestas").serialize(),
        success: function(response) {

            $.each(response, function(i, v) {
                //test(v.id);

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