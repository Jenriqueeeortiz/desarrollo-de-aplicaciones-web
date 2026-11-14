
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("buscarCita");
    const boton = document.getElementById("btnBuscarCitas");
    const estado = document.getElementById("estadoBusqueda");
    const cuerpo = document.getElementById("cuerpoCitas");
    const sinCitas = document.getElementById("sinCitas");

    // Controles de filtros
    const filtroServicio = document.getElementById("filtroServicio");
    const fechaDesde = document.getElementById("fechaDesde");
    const fechaHasta = document.getElementById("fechaHasta");
    const botonAplicar = document.getElementById("btnAplicarFiltros");
    const botonLimpiar = document.getElementById("btnLimpiarFiltros");

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
        const servicio = filtroServicio?.value ?? "";
        const desde = fechaDesde?.value ?? "";
        const hasta = fechaHasta?.value ?? "";

        // Validar rango de fechas antes de enviar la solicitud
        if (desde !== "" && hasta !== "" && desde > hasta) {
            estado.textContent =
                "La fecha inicial no puede ser posterior a la fecha final.";
            return;
        }

        boton.disabled = true;

        if (botonAplicar) {
            botonAplicar.disabled = true;
        }

        if (botonLimpiar) {
            botonLimpiar.disabled = true;
        }

        estado.textContent = "Buscando citas...";

        try {
            const parametros = new URLSearchParams({
                buscar: busqueda,
                servicio: servicio,
                fecha_desde: desde,
                fecha_hasta: hasta
            });

            const url = "api/listar_citas.php?" + parametros.toString();

            const respuesta = await fetch(url, {
                method: "GET",
                credentials: "same-origin",
                headers: {
                    "Accept": "application/json"
                }
            });

            const datos = await respuesta.json();

            if (!respuesta.ok || !datos.ok ||
                !Array.isArray(datos.citas)) {
                throw new Error(
                    datos.mensaje || "No fue posible consultar las citas."
                );
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
                error.message || "No fue posible consultar las citas.";

            console.error(error);

        } finally {
            boton.disabled = false;

            if (botonAplicar) {
                botonAplicar.disabled = false;
            }

            if (botonLimpiar) {
                botonLimpiar.disabled = false;
            }
        }
    }

    // Buscar por texto
    boton.addEventListener("click", buscarCitas);

    input.addEventListener("keydown", evento => {
        if (evento.key === "Enter") {
            evento.preventDefault();
            buscarCitas();
        }
    });

    // Aplicar filtros
    if (botonAplicar) {
        botonAplicar.addEventListener("click", buscarCitas);
    }

    // Limpiar filtros de servicio y fechas
    if (botonLimpiar) {
        botonLimpiar.addEventListener("click", () => {
            if (filtroServicio) {
                filtroServicio.value = "";
            }

            if (fechaDesde) {
                fechaDesde.value = "";
            }

            if (fechaHasta) {
                fechaHasta.value = "";
            }

            buscarCitas();
        });
    }
});
