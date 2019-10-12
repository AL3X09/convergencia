/**
 * 
 */
var numerico = 0;
$(document).ready(function() {
    GetCandidatosSeleccion();
    parallaxIt();

});

// makes the parallax elements
function parallaxIt() {

    // create variables
    var $fwindow = $(window);
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // on window scroll event
    $fwindow.on('scroll resize', function() {
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    });

    // for each of content parallax element
    $('[data-type="content"]').each(function(index, e) {
        var $contentObj = $(this);
        var fgOffset = parseInt($contentObj.offset().top);
        var yPos;
        var speed = ($contentObj.data('speed') || 1);

        $fwindow.on('scroll resize', function() {
            yPos = fgOffset - scrollTop / speed;

            $contentObj.css('top', yPos);
        });
    });

    // for each of background parallax element
    $('[data-type="background"]').each(function() {
        var $backgroundObj = $(this);
        var bgOffset = parseInt($backgroundObj.offset().top);
        var yPos;
        var coords;
        var speed = ($backgroundObj.data('speed') || 0);

        $fwindow.on('scroll resize', function() {
            yPos = -((scrollTop - bgOffset) / speed);
            coords = '40% ' + yPos + 'px';

            $backgroundObj.css({ backgroundPosition: coords });
        });
    });

    // triggers winodw scroll for refresh
    $fwindow.trigger('scroll');
};

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

    ValDataCandidatosSeleccion(pkusuario, conser);
}

function ValDataCandidatosSeleccion(pkusuario, conser) {


    //   var Anombres = [];
    // var Adatos = [];
    //var data2;


    $.ajax({
        url: base_url + 'hojaVidaCandidato/listarValCandidatoSeleccion',
        method: 'POST',
        data: { pkusuario: pkusuario, conser: conser },
        success: function(response) {

            $.each(response.datos, function(i, v) {
                //Adatos.push(v);
            });



            // chart colors
            var colors = ['#ff3333', '#8e5ea2', '#f15f3b ', '#003d9b'];
            data = {

                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: colors.slice(0, 4),
                    borderWidth: 0,
                    data: response.datos
                }],
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: response.nombres
            };


            /* 3 donut charts */
            var donutOptions = {
                responsive: true,
                cutoutPercentage: 85,
                legend: {
                    position: 'bottom',
                    padding: 5,
                    labels: {
                        pointStyle: 'circle',
                        usePointStyle: true
                    }
                }
            };

            var chDonut1 = document.getElementById("datacandidato");
            if (chDonut1) {
                new Chart(chDonut1, {
                    type: 'polarArea',
                    data: data,
                    options: donutOptions
                });
            }

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
    $('#contenidoModal').empty();

    $.ajax({
        url: base_url + 'hojaVidaCandidato/getCandidato',
        method: 'POST',
        data: { fk_candidato: id },
        success: function(response) {

            //console.log(response[0]['id']);
            var conte = '<div>';


            conte += '<div class="page-header clear-filter page-header-small" filter-color="orange">';
            conte += '<div class="page-header-image" data-parallax="true" style="background-image: url(&quot;' + base_url + 'orm/public/uploads/_/originals/' + response[0]['foto'] + '&quot;); transform: translate3d(0px, 38.3333px, 0px);">';
            conte += '</div>';
            conte += '<div class="container">';
            conte += '<div class="row">';
            conte += '<div class="col-md-4">';
            conte += '</div>';
            conte += '<div class="col-4">';
            conte += '<img src="' + base_url + 'orm/public/uploads/_/originals/' + response[0]['foto'] + '" alt="candidato" class="rounded mx-auto d-block" style="width: 60%; height: 50%">';
            conte += '<a href="' + response[0]['link_pagina'] + '" target="_blank"><h3 class="title text-white">' + response[0]['nombres'] + ' ' + response[0]['apellidos'] + '</h3></a> ';
            conte += '</div>'; //col
            conte += '</div>'; //row
            conte += '</div>'; //container
            conte += '</div>'; //page header

            conte += '<div class="section">';
            conte += '<div class="container">';
            conte += '<div class="button-container">';

            conte += '<div class="card-header">';
            conte += '<ul class="nav nav-tabs justify-content-center" role="tablist">';
            conte += '          <li class="nav-item">';
            conte += '              <a class="nav-link active" data-toggle="tab" href="#coali" role="tab"';
            conte += '                  aria-selected="true">';
            conte += '                  <i class="now-ui-icons design_app"></i>';
            conte += '                  Coalición';
            conte += '              </a>';
            conte += '          </li>';
            conte += '          <li class="nav-item">';
            conte += '              <a class="nav-link" data-toggle="tab" href="#hv" role="tab"';
            conte += '                  aria-selected="false">';
            conte += '                  <i class="now-ui-icons education_paper"></i>';
            conte += '                  Hoja de Vida';
            conte += '              </a>';
            conte += '          </li>';
            conte += '          <li class="nav-item">';
            conte += '              <a class="nav-link" data-toggle="tab" href="#csdf" role="tab"';
            conte += '                  aria-selected="false">';
            conte += '                  <i class="now-ui-icons users_circle-08"></i>';
            conte += '                  ¿ Cómo se define ?';
            conte += '              </a>';
            conte += '          </li>';
            conte += '          <li class="nav-item">';
            conte += '              <a class="nav-link" data-toggle="tab" href="#oalca" role="tab"';
            conte += '                  aria-selected="false">';
            conte += '                  <i class="now-ui-icons ui-2_settings-90"></i>';
            conte += '                  opinión con la actual alcaldia';
            conte += '              </a>';
            conte += '      </ul>';
            conte += '          </li>';

            conte += '      </ul>';
            conte += '  </div>';

            conte += '            <div class="card-body">';
            conte += '      <!-- Tab panes -->';

            conte += '      <div class="tab-content text-center">';
            conte += '          <div class="tab-pane active" id="coali" role="tabpanel">';

            $.each(response, function(i, v) {

                conte += '              <div class="row">';
                conte += '                  <div class="col-md-4">';
                conte += '                  </div>';
                conte += '                  <div class="col-md-4">';
                conte += '                      <div style="max-width: 100%;">';
                conte += '<img src="' + base_url + 'orm/public/uploads/_/originals/' + v.pfoto + '" alt="partido" class="rounded mx-auto d-block" style="width: 60%; height: 50%">';
                conte += '                  </div>';
                conte += '                  </div>';
                conte += '              </div>'; //row
                conte += '              <br>';

            });

            conte += '          </div>'; //tab1
            conte += '          <div class="tab-pane" id="hv" role="tabpanel">';
            conte += response[0]['descripcion'];
            conte += '          </div>'; //tab2
            conte += '          <div class="tab-pane" id="csdf" role="tabpanel">';
            conte += response[0]['como_se_define'];
            conte += '          </div>'; //tab3
            conte += '          <div class="tab-pane" id="oalca" role="tabpanel">';
            conte += response[0]['opi_act_admin'];
            conte += '          </div>'; //tab4
            conte += '                 </div>';
            conte += '            </div>';
            conte += '        </div>';
            conte += '    </div>';
            conte += '</div>'; //section


            conte += '</div>';

            $('#contenidoModal').append(conte);



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