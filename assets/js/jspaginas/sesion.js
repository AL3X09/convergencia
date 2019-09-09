/**
 * 
 */
$(document).ready(function() {
    $("#formsesion").validate({
        rules: {
            usuario: {
                required: true,
                minlength: 1
            },
            password: {
                required: true,
                minlength: 8
            },

        },
        messages: {
            usuario: {
                required: "El campo usuario es obligatorio",
                minlength: "El campo usuario debe tener mínimo cuatro caracteres"
            },
            password: {
                required: "El campo contraseña es obligatorio",
                minlength: "El campo contraseña debe tener mínimo ocho caracteres"
            },
        },
        errorElement: 'label',
        errorPlacement: function(error, element) {
            var type = $(element).attr("type");
            error.addClass("form-error-message mb-0");
            error.appendTo($("#errores"));
        },


    });
});