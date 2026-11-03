
<?php
require_once __DIR__ . "/autorizacion.php";

// Solo el administrador puede editar citas
exigirAdministrador();

require_once __DIR__ . "/proteger.php";
require_once __DIR__ . "/conexion.php";

// Crear token CSRF si no existe
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

// Validar el identificador de la cita
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit("Identificador de cita no valido.");
}

// Consultar la cita mediante una sentencia preparada
$sql = "SELECT * FROM citas WHERE id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$cita = $resultado->fetch_assoc();

$stmt->close();

// Verificar que la cita exista
if (!$cita) {
    http_response_code(404);
    exit("La cita no existe.");
}

// Funcion para escapar datos
function escapar($valor) {
    return htmlspecialchars(
        (string)$valor,
        ENT_QUOTES,
        "UTF-8"
    );
}

// Servicios disponibles
$servicios = [
    "Corte de cabello",
    "Keratina",
    "Tinte",
    "Peinado",
    "Maquillaje"
];

// Titulo de la pagina
$tituloPagina = "Editar cita - Salon de Belleza";

// Iniciar captura del contenido
ob_start();
?>

<main>

    <section>
        <h2>Editar cita</h2>

        <p>
            Modifica la informacion de la cita
            y guarda los cambios.
        </p>
    </section>

    <section>

        <form action="actualizar.php" method="POST">

            <!-- Token de seguridad CSRF -->
            <input
                type="hidden"
                name="csrf_token"
                value="<?php echo escapar($_SESSION["csrf_token"]); ?>"
            >

            <!-- ID de la cita -->
            <input
                type="hidden"
                name="id"
                value="<?php echo (int)$cita["id"]; ?>"
            >

            <label for="nombre">
                Nombre del cliente:
            </label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="<?php echo escapar($cita["nombre"]); ?>"
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
                value="<?php echo escapar($cita["telefono"]); ?>"
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
                value="<?php echo escapar($cita["email"]); ?>"
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

                <?php foreach ($servicios as $servicio): ?>

                    <option
                        value="<?php echo escapar($servicio); ?>"
                        <?php
                        echo $cita["servicio"] === $servicio
                            ? "selected"
                            : "";
                        ?>
                    >
                        <?php echo escapar($servicio); ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <label for="fecha">
                Fecha de la cita:
            </label>

            <input
                type="date"
                id="fecha"
                name="fecha"
                min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                value="<?php echo escapar($cita["fecha"]); ?>"
                required
            >

            <button type="submit">
                Guardar cambios
            </button>

        </form>

    </section>

    <section>
        <a href="index.php">
            Regresar a las citas
        </a>
    </section>

</main>

<?php
// Guardar el contenido de la pagina
$contenido = ob_get_clean();

// Cargar la plantilla general reutilizable
require __DIR__ . "/app/views/layouts/plantilla.php";
?>
