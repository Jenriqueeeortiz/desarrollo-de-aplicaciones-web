
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("buscarCita");
    const boton = document.getElementById("btnBuscarCitas");
    const estado = document.getElementById("estadoBusqueda");
    const cuerpo = document.getElementById("cuerpoCitas");
    const sinCitas = document.getElementById("sinCitas");

    if (!input || !boton || !estado || !cuerpo || !sinCitas) {
        return;
    }

    function crearCelda(fila, valor) {
        const celda = document.createElement("td");
        celda.textContent = valor ?? "";
        fila.appendChild(celda);
        return celda;
    }

    function crearAcciones(cita) {
        const celda = document.createElement("td");

        if (!CONFIG_CITAS.esAdmin) {
            celda.textContent = "Solo lectura";
            return celda;
        }

        // Enlace para editar
        const enlace = document.createElement("a");
        enlace.className = "btn-editar";
        enlace.href = "editar.php?id=" +
            encodeURIComponent(cita.id);
        enlace.textContent = "Editar";

        celda.appendChild(enlace);

        // Formulario para eliminar
        const formulario = document.createElement("form");
        formulario.action = "eliminar.php";
        formulario.method = "POST";
        formulario.className = "form-eliminar";

        formulario.addEventListener("submit", evento => {
            if (!confirm("¿Seguro que deseas eliminar esta cita?")) {
                evento.preventDefault();
            }
        });

        const id = document.createElement("input");
        id.type = "hidden";
        id.name = "id";
        id.value = cita.id;

        const csrf = document.createElement("input");
        csrf.type = "hidden";
        csrf.name = "csrf_token";
        csrf.value = CONFIG_CITAS.csrfToken;

        const eliminar = document.createElement("button");
        eliminar.type = "submit";
        eliminar.className = "btn-eliminar";
        eliminar.textContent = "Eliminar";

        formulario.appendChild(id);
        formulario.appendChild(csrf);
        formulario.appendChild(eliminar);

        celda.appendChild(formulario);

        return celda;
    }

    async function buscarCitas() {
        const busqueda = input.value.trim();

        boton.disabled = true;
        estado.textContent = "Buscando citas...";

        try {
            const url = "api/listar_citas.php?buscar=" +
                encodeURIComponent(busqueda);

            const respuesta = await fetch(url, {
                method: "GET",
                credentials: "same-origin",
                headers: {
                    "Accept": "application/json"
                }
            });

            if (!respuesta.ok) {
                throw new Error("Error HTTP: " + respuesta.status);
            }

            const datos = await respuesta.json();

            if (!datos.ok || !Array.isArray(datos.citas)) {
                throw new Error("Respuesta invalida");
            }

            cuerpo.replaceChildren();

            datos.citas.forEach(cita => {
                const fila = document.createElement("tr");

                crearCelda(fila, cita.id);
                crearCelda(fila, cita.nombre);
                crearCelda(fila, cita.telefono);
                crearCelda(fila, cita.email);
                crearCelda(fila, cita.servicio);
                crearCelda(fila, cita.fecha);

                fila.appendChild(crearAcciones(cita));
                cuerpo.appendChild(fila);
            });

            sinCitas.hidden = datos.citas.length > 0;

            estado.textContent =
                "Se encontraron " + datos.citas.length + " citas.";

        } catch (error) {
            estado.textContent =
                "No fue posible consultar las citas.";
            console.error(error);
        } finally {
            boton.disabled = false;
        }
    }

    boton.addEventListener("click", buscarCitas);

    input.addEventListener("keydown", evento => {
        if (evento.key === "Enter") {
            evento.preventDefault();
            buscarCitas();
        }
    });
});
