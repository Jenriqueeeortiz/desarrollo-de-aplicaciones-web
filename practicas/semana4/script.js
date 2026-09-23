// ================================
// VARIABLES
// ================================

let nombre = "";
let servicio = "";
let fecha = "";


// ================================
// FUNCIÓN DE BIENVENIDA
// ================================

function mostrarBienvenida() {
    let mensaje = document.getElementById("mensajeBienvenida");

    mensaje.textContent = "¡Bienvenido al sistema de citas del salón!";
}


// ================================
// EVENTO AL CARGAR LA PÁGINA
// ================================

document.addEventListener("DOMContentLoaded", function() {

    mostrarBienvenida();

    let formulario = document.getElementById("formularioCita");

    formulario.addEventListener("submit", function(event) {

        let nombreCampo = document.getElementById("nombre");
        let telefonoCampo = document.getElementById("telefono");
        let emailCampo = document.getElementById("email");
        let servicioCampo = document.getElementById("servicio");
        let fechaCampo = document.getElementById("fecha");

        let mensaje = document.getElementById("mensaje");

        nombre = nombreCampo.value.trim();
        servicio = servicioCampo.value;
        fecha = fechaCampo.value;

        let telefono = telefonoCampo.value.trim();
        let email = emailCampo.value.trim();

        // Limpiar mensaje anterior
        mensaje.textContent = "";
        mensaje.className = "";


        // ================================
        // VALIDAR NOMBRE
        // ================================

        if (nombre === "") {
            event.preventDefault();

            mensaje.textContent = "El nombre es obligatorio.";
            mensaje.classList.add("mensaje-error");

            nombreCampo.focus();
            return;
        }

        if (nombre.length < 3) {
            event.preventDefault();

            mensaje.textContent = "El nombre debe tener al menos 3 caracteres.";
            mensaje.classList.add("mensaje-error");

            nombreCampo.focus();
            return;
        }


        // ================================
        // VALIDAR TELÉFONO
        // ================================

        if (telefono === "") {
            event.preventDefault();

            mensaje.textContent = "El teléfono es obligatorio.";
            mensaje.classList.add("mensaje-error");

            telefonoCampo.focus();
            return;
        }

        if (telefono.length !== 10) {
            event.preventDefault();

            mensaje.textContent = "El teléfono debe tener 10 números.";
            mensaje.classList.add("mensaje-error");

            telefonoCampo.focus();
            return;
        }


        // ================================
        // VALIDAR CORREO
        // ================================

        let expresionCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            event.preventDefault();

            mensaje.textContent = "El correo electrónico es obligatorio.";
            mensaje.classList.add("mensaje-error");

            emailCampo.focus();
            return;
        }

        if (!expresionCorreo.test(email)) {
            event.preventDefault();

            mensaje.textContent = "Ingresa un correo electrónico válido.";
            mensaje.classList.add("mensaje-error");

            emailCampo.focus();
            return;
        }


        // ================================
        // VALIDAR SERVICIO
        // ================================

        if (servicio === "") {
            event.preventDefault();

            mensaje.textContent = "Debes seleccionar un servicio.";
            mensaje.classList.add("mensaje-error");

            servicioCampo.focus();
            return;
        }


        // ================================
        // VALIDAR FECHA
        // ================================

        if (fecha === "") {
            event.preventDefault();

            mensaje.textContent = "Debes seleccionar una fecha.";
            mensaje.classList.add("mensaje-error");

            fechaCampo.focus();
            return;
        }

        let hoy = new Date();
        hoy.setHours(0, 0, 0, 0);

        let fechaSeleccionada = new Date(fecha + "T00:00:00");

        if (fechaSeleccionada <= hoy) {
            event.preventDefault();

            mensaje.textContent = "La fecha debe ser posterior a la fecha de hoy.";
            mensaje.classList.add("mensaje-error");

            fechaCampo.focus();
            return;
        }


        // ================================
        // DATOS CORRECTOS
        // ================================

        mensaje.textContent = "Datos correctos. Registrando cita...";
        mensaje.classList.add("mensaje-exito");

    });


    // ================================
    // MOSTRAR / OCULTAR INFORMACIÓN
    // ================================

    let botonInformacion = document.getElementById("btnMostrar");
    let informacion = document.getElementById("informacion");

    botonInformacion.addEventListener("click", function() {

        if (informacion.style.display === "none") {
            informacion.style.display = "block";
            botonInformacion.textContent = "Ocultar información";
        } else {
            informacion.style.display = "none";
            botonInformacion.textContent = "Mostrar información";
        }

    });

});