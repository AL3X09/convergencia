/**
 * 
 */
$(document).ready(function() {
    //orm/public/_/items/tema
    //public\uploads\_\originals
    listarTemas();
});

function listarTemas() {
    var comillaSimple ="'";
    $.ajax({
      url: base_url+'tema/listarTemas',
      method: 'GET',
      success: function (response) {

        $.each(response, function (i, v) {
        
        $('#listadodinamico').append(

        
        '<div id="tema'+v.id+'" class="card" onclick ="colorCambiar('+comillaSimple+'tema'+v.id+comillaSimple+','+comillaSimple+'checkTema'+v.id+comillaSimple+')" style="width: 20rem;-webkit-filter:grayscale(100%)">'+
        '<div style="width: 320px; height: 180px;">'+
        '<img src="'+base_url+'orm/public/uploads/_/originals/'+ v.filename+'" alt="Card image cap" style="width: 100%; height: 100%">'+
        '</div>'+
        '<div class="card-body">'+
          '<h4 class="card-title">'+v.nombre+'</h4>'+
            '<p class="card-text">'+
                v.descripcion+
            '</p>'+
              '<div class="form-check">'+
               '<label class="form-check-label">'+
                '<input id="checkTema'+v.id+'" class="form-check-input" type="checkbox" value="'+v.id+'">'+
                'Seleccionar'+
                '<span class="form-check-sign">'+
                    '<span class="check"></span>'+
                '</span>'+
               '</label>'+
              '</div>'+
              '</div>'+
        '</div>'
        )

    });

}
}).fail(function (jqXHR, textStatus, errorThrown) {
//si retorna un error es por que el correo no existe imprimo en consola y recargo pagina de inicio de sesión    console.error(textStatus, errorThrown); 
//console.error(textStatus, errorThrown); // Algo fallo
Swal.fire(
    '',
    "Error al intertar traer los datos del tablero de control",
    'error'
);

});

  }
