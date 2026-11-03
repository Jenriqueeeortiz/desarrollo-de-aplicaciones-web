
<?php
require_once __DIR__ . "/autorizacion.php";
require_once __DIR__ . "/conexion.php";

// Crear token CSRF
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

// Escapar datos antes de mostrarlos
function escapar($valor) {
    return htmlspecialchars(
        (string)$valor,
        ENT_QUOTES,
        "UTF-8"
    );
}

// Cargar el controlador MVC
require_once __DIR__ . "/app/controllers/CitaController.php";

$modelo = new Cita($conexion);
$controlador = new CitaController($modelo);

$citas = $controlador->listar();

// Identificar el rol del usuario
$esAdmin = esAdministrador();

// Configurar la plantilla
$tituloPagina = "Sistema de Citas - Salon de Belleza";

// Capturar el contenido de la pagina
ob_start();
?>

<div id="mensajeBienvenida" class="mensaje-bienvenida"></div>

<main>

    <?php if ($esAdmin): ?>

        <section class="contenedor">
            <div>
                <h2>Agendar una cita</h2>

                <p>
                    Completa los siguientes datos para
                    registrar una nueva cita.
                </p>
            </div>

            <div class="caja">
                <strong>Servicios disponibles</strong>

                <p>
                    Cortes, keratina, tinte,
                    peinados y maquillajes.
                </p>
            </div>
        </section>

        <section class="informacion-seccion">

            <button type="button" id="btnMostrar">
                Ocultar informacion
            </button>

            <div id="informacion">
                <h2>Informacion de la cita</h2>

                <p>
                    Recuerda proporcionar tus datos correctamente.
                    La fecha seleccionada debe ser posterior
                    al dia de hoy.
                </p>
            </div>

        </section>

        <section>

            <div id="mensaje"></div>

            <form
                id="formularioCita"
                action="procesar.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?php echo escapar($_SESSION["csrf_token"]); ?>"
                >

                <label for="nombre">
                    Nombre del cliente:
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    minlength="3"
                    maxlength="100"
                    required
                >

                <label for="telefono">
                    Telefono:
                </label>

                <input
                    type="tel"
                    id="telefono"
                    name="telefono"
                    pattern="[0-9]{10}"
                    maxlength="10"
                    required
                >

                <label for="email">
                    Correo electronico:
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    maxlength="150"
                    required
                >

                <label for="servicio">
                    Servicio:
                </label>

                <select
                    id="servicio"
                    name="servicio"
                    required
                >
                    <option value="">
                        Selecciona un servicio
                    </option>

                    <option value="Corte de cabello">
                        Corte de cabello
                    </option>

                    <option value="Keratina">
                        Keratina
                    </option>

                    <option value="Tinte">
                        Tinte
                    </option>

                    <option value="Peinado">
                        Peinado
                    </option>

                    <option value="Maquillaje">
                        Maquillaje
                    </option>
                </select>

                <label for="fecha">
                    Fecha de la cita:
                </label>

                <input
                    type="date"
                    id="fecha"
                    name="fecha"
                    min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                    required
                >

                <button type="submit">
                    Agendar cita
                </button>

            </form>

        </section>

    <?php else: ?>

        <section class="contenedor">
            <div>
                <h2>Consulta de citas</h2>

                <p>
                    Puedes revisar las citas registradas,
                    pero no tienes permisos para agregar,
                    editar o eliminar informacion.
                </p>
            </div>

            <div class="caja">
                <strong>Acceso de solo lectura</strong>

                <p>
                    Tu cuenta tiene el rol de consulta.
                </p>
            </div>
        </section>

    <?php endif; ?>

    <section class="citas-registradas">

        <h2>Citas registradas</h2>

        <!-- Buscador con Fetch API -->
        <div class="buscador-citas">

            <label for="buscarCita">
                Buscar cita:
            </label>

            <input
                type="search"
                id="buscarCita"
                placeholder="Buscar por nombre o servicio"
                maxlength="100"
            >

            <button
                type="button"
                id="btnBuscarCitas"
            >
                Buscar
            </button>

            <p
                id="estadoBusqueda"
                role="status"
                aria-live="polite"
            ></p>

        </div>

        <!-- Vista reutilizable de citas -->
        <?php require __DIR__ . "/app/views/citas/tabla.php"; ?>

    </section>

    <p>
        <a href="panel.php">
            Regresar al panel
        </a>
    </p>

</main>

<!-- Configuracion para Fetch API -->
<script>
    const CONFIG_CITAS = {
        esAdmin: <?php echo json_encode($esAdmin); ?>,
        csrfToken: <?php echo json_encode(
            $_SESSION["csrf_token"],
            JSON_HEX_TAG |
            JSON_HEX_AMP |
            JSON_HEX_APOS |
            JSON_HEX_QUOT
        ); ?>
    };
</script>

<script src="script.js"></script>
<script src="fetch_citas.js"></script>

<?php
// Guardar el contenido HTML y JavaScript
$contenido = ob_get_clean();

// Cargar la plantilla general
require __DIR__ . "/app/views/layouts/plantilla.php";
?>
