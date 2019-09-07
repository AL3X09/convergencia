/**
 * 
 */
$(document).ready(function() {
    $("#formregistro").validate({
        rules: {
            nombres: {
                required: true,
                minlength: 4
            },
            apellidos: {
                required: true,
                minlength: 3
            },
            correo: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },

        },
        messages: {
            nombres: {
                required: "El campo nombres es obligatorio",
                minlength: "El campo nombres debe tener mínimo cuatro caracteres"
            },
            apellidos: {
                required: "El campo apellidos es obligatorio",
                minlength: "El campo nombres debe tener mínimo cuatro caracteres"
            },
            correo: {
                required: "El campo correo es obligatorio",
                email: "El correo debe cumplir el formato: abc@domain.com"
            },
            localidad: {
                required: "El campo localidad es obligatorio",
            },
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