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

// function listarPregunas(temaid) {
//     //co
    
//     var lista = $("#listapreguntas");
    
//     count2=0;
//     var conte = '<div class="card card-nav-tabs card-plain id="card_Preguntas">';
//      conte += '<div class="nav-tabs-navigation">';
//      conte += '<div class="nav-tabs-wrapper">';
//      conte += '<ul class="nav nav-tabs" data-tabs="tabs">';

//     $.ajax({
//         url: base_url + 'pregunta/listarPreguntasXTema',
//         method: 'GET',
//         success: function(response) {

//             count2=count2+1
//              $.each(response, function(a, vr) {
//                  console.log(response);
//                // console.log(count2);
//                 if (count2==1) {
//                 //console.log("entro");
//                 conte += '<li class="nav-item">';
//                 conte += '<a class="nav-link active" href="#'+vr.nombre+'" data-toggle="tab">'+vr.nombre+'</a>';
//                 conte += '</li>';
//                 }       
//              })

//              conte += '</ul>';
//              conte += '</div>';
//              conte += '</div>';
//              conte += '</div>'; 
//              conte += '<div class="card-body ">';
//              conte += '<div class="tab-content text-center">';   

//             $.each(response, function(i, v) {
//                 cont = i + 1;
//                 //rrecorro preguntas
//                 $.each(v.preguntas, function(ip, p) {
//                     //console.log(p);
//                     conte += '<div class="tab-pane active" id="'+v.nombre+'">';                
//                     conte += '<label for="' + p.pregunta + '">' + p.pregunta + '</label>';

//                     $.each(p.respuestas, function(iq, q) {
//                         //console.log(p.pregunta);
//                         conte += '<div class="form-check form-check-radio">' +
//                             '<label class="form-check-label">' +
//                             '<input class="form-check-input" type="radio" name="' + p.pregunta + '" id="exampleRadios' + q + '" value="option1" >' +
//                             '<span class="form-check-sign"></span>' +
//                             q.respuesta +
//                             '</label>' +
//                             '</div>' +
//                             '</div>';

//                     })
//                 })
//                 conte += '</div>';
//                 conte += '</div>';
//                 conte += '</div>';
//                 lista.append(conte);
//             });


//         }
//     }).fail(function(jqXHR, textStatus, errorThrown) {
//         //si retorna un error es por que el correo no existe imprimo en consola y recargo pagina de inicio de sesión    console.error(textStatus, errorThrown); 
//         //console.error(textStatus, errorThrown); // Algo fallo
//         Swal.fire(
//             '',
//             "Error al intertar traer los datos del tablero de control",
//             'error'
//         );

//     });
// }

function listarPregunas(temaid) {
      
     var lista = $("#listapreguntas");
     count2=0;
     var conte = '<div class="card card-nav-tabs card-plain">';
     conte += ' <div class="card-header card-header-danger">';
     conte += '<div class="nav-tabs-navigation">';
     conte += '<div class="nav-tabs-wrapper">';
     conte += '<ul class="nav nav-tabs" data-tabs="tabs">';
    $.ajax({
        url: base_url + 'pregunta/listarPreguntasXTema',
        method: 'GET',
        success: function(response) {

             //########################################LISTAR TEMAS #########################################
            count2=count2+1
             $.each(response, function(i, v) {
                if (count2==1) {
                //console.log("entro");
                conte += '<li class="nav-item">';
                // ACA  pinta el primer enlace 'Active'
                // conte += '<a class="nav-link active" href="#'+v.nombre+'" data-toggle="tab">'+v.nombre+'</a>';
                conte += '<a class="nav-link" href="#'+v.nombre+'" data-toggle="tab">'+v.nombre+'</a>';
                conte += '</li>';
                }       
             })
             conte += '</ul>';
             conte += '</div>';
             conte += '</div>';
             conte += '</div>'; 
             conte += '<div class="card-body">';
             conte += '<div class="tab-content text-center">'; 
             //##############################################################################################  
             
             //RECORRER PREGUNTAS
             $.each(response, function(ie, vr) {
                conte += '<div class="tab-pane" id="'+vr.nombre+'">';    
                //RECORRER RESPUESTAS
                $.each(vr.preguntas, function(ip, p) {
                console.log(p);
                    //conte += '<div class="tab-pane active" id="'+v.nombre+'">';       
                                         
                    conte += '<p>'+ p.pregunta + '</p>';
                    $.each(p.respuestas, function(iq, q) {
                             conte += '<div class="form-check form-check-radio">' +
                             '<label class="form-check-label">' +
                             '<input class="form-check-input" type="radio" name="' + p.pregunta + '" id="exampleRadios' + q + '" value="option1" >' +
                             '<span class="form-check-sign"></span>' +
                             q.respuesta +
                             '</label>' +
                             '</div>' ;
                     })
                    

                 })
                 conte += '</div>';
            })
           conte += '</div>';
           conte += '</div>';
           conte += '</div>';
           conte += '</div>';
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