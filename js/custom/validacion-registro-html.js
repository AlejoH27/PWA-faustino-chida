$(document).ready(function () {
    // Función para mostrar u ocultar las palomitas y cambiar clases de Bootstrap
    function togglePalomitas() {
        var nombreInput = $('#validationServer01');
        var palomitasContainer = $('#validacionNombre');

        var apellidoPInput = $('#validationServer02');
        var paloPContainer = $('#validacionApellidoP');

        var apellidoMInput = $('#validationServer03');
        var paloMContainer = $('#validacionApellidoM');

        var cueInput = $('#validationServerUsername');
        var cueContainer = $('#validacionCue');

        var matchInput = $('#validationServer04');
        var matchContainer = $('#validacionMatch');

        var fechaNacimientonput = $('#validationServer05');
        var fechaNacimientoContainer = $('#validacionFechanaCimiento');

        var lugarNacimientoInput = $('#validationServer06');
        var lugarNacimientoContainer = $('#validacionLugarNacimiento');

        var curpInput = $('#validationServer14');
        var curpContainer = $('#validacionCurp');

        var fotografiaInput = $('#validationServer07');
        var fotografiaContainer = $('#validacionFotografia');

        var ineDocInput = $('#validationServer08');
        var ineDocContainer = $('#validacionDocumentoIne');

        var curpDocInput = $('#validationServer09');
        var curpContainer = $('#validacionDocumentoCurp');

        var telefonoInput = $('#validationServer10');
        var telefonoContainer = $('#validacionTelefono');

        var ubicacionInput = $('#validationServer11');
        var ubicacionContainer = $('#validacionUbicacion');

        var compDomDocInput = $('#validationServer12');
        var compDocDocContainer = $('#validacionComprobanteDomicilio');

        var direccionInput = $('#validationServer13');
        var direccionContainer = $('#validacionDireccion');

        // Verifica si el campo de nombre está completo
        if (nombreInput.val().trim() !== '') {
            palomitasContainer.show();
            nombreInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            palomitasContainer.hide();
            nombreInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Repite el mismo proceso para otros campos

        // Verifica si el campo de Apellido paterno está completo
        if (apellidoPInput.val().trim() !== '') {
            paloPContainer.show();
            apellidoPInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            paloPContainer.hide();
            apellidoPInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Apellido materno está completo
        if (apellidoMInput.val().trim() !== '') {
            paloMContainer.show();
            apellidoMInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            paloMContainer.hide();
            apellidoMInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Cue está completo
        if (cueInput.val().trim() !== '') {
            cueContainer.show();
            cueInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            cueContainer.hide();
            cueInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Match está completo
        if (matchInput.val().trim() !== '') {
            matchContainer.show();
            matchInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            matchContainer.hide();
            matchInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Fecha de Nacimiento está completo
        if (fechaNacimientonput.val().trim() !== '') {
            fechaNacimientoContainer.show();
            fechaNacimientonput.removeClass('is-invalid').addClass('is-valid');
        } else {
            fechaNacimientoContainer.hide();
            fechaNacimientonput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Lugar de Nacimiento está completo
        if (lugarNacimientoInput.val().trim() !== '') {
            lugarNacimientoContainer.show();
            lugarNacimientoInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            lugarNacimientoContainer.hide();
            lugarNacimientoInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Fotografía está completo
        if (fotografiaInput.val().trim() !== '') {
            fotografiaContainer.show();
            fotografiaInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            fotografiaContainer.hide();
            fotografiaInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Documento INE está completo
        if (ineDocInput.val().trim() !== '') {
            ineDocContainer.show();
            ineDocInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            ineDocContainer.hide();
            ineDocInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Documento CURP está completo
        if (curpDocInput.val().trim() !== '') {
            curpContainer.show();
            curpDocInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            curpContainer.hide();
            curpDocInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Teléfono está completo
        if (telefonoInput.val().trim() !== '') {
            telefonoContainer.show();
            telefonoInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            telefonoContainer.hide();
            telefonoInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Ubicación está completo
        if (ubicacionInput.val().trim() !== '') {
            ubicacionContainer.show();
            ubicacionInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            ubicacionContainer.hide();
            ubicacionInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Comprobante de Domicilio está completo
        if (compDomDocInput.val().trim() !== '') {
            compDocDocContainer.show();
            compDomDocInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            compDocDocContainer.hide();
            compDomDocInput.removeClass('is-valid').addClass('is-invalid');
        }

        // Verifica si el campo de Dirección está completo
        if (direccionInput.val().trim() !== '') {
            direccionContainer.show();
            direccionInput.removeClass('is-invalid').addClass('is-valid');
        } else {
            direccionContainer.hide();
            direccionInput.removeClass('is-valid').addClass('is-invalid');
        }

      // Verifica si el campo de curp está completo
      if (curpInput.val().trim() !== '') {
          curpContainer.show();
          curpInput.removeClass('is-invalid').addClass('is-valid');
      } else {
          curpContainer.hide();
          curpInput.removeClass('is-valid').addClass('is-invalid');
      }
    }

    // Ejecuta la función al cargar la página y cada vez que cambie el contenido del campo
    togglePalomitas();
    $('#validationServer01, #validationServer02, #validationServer03, #validationServerUsername, #validationServer04, #validationServer05, #validationServer06, #validationServer07, #validationServer08, #validationServer09, #validationServer10, #validationServer11, #validationServer12, #validationServer13, #validationServer14').on('input', togglePalomitas);
});
