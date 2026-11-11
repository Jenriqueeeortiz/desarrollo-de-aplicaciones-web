
<?php
require_once __DIR__ . "/autorizacion.php";
exigirAdministrador();
require_once "proteger.php";
require_once "conexion.php";

// Solo permitir solicitudes POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Metodo no permitido.");
}

$tokenRecibido = $_POST["csrf_token"] ?? "";
$tokenSesion = $_SESSION["csrf_token"] ?? "";

if (
    !is_string($tokenRecibido) ||
    !is_string($tokenSesion) ||
    $tokenSesion === "" ||
    !hash_equals($tokenSesion, $tokenRecibido)
) {
    http_response_code(403);
    exit("Solicitud no autorizada. Token de seguridad invalido.");
}


// Obtener y limpiar datos
$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$email = trim($_POST["email"] ?? "");
$servicio = trim($_POST["servicio"] ?? "");
$fecha = trim($_POST["fecha"] ?? "");

$errores = [];

// Validar nombre
if ($nombre === "") {
    $errores[] = "El nombre es obligatorio.";
} elseif (mb_strlen($nombre, "UTF-8") < 3 ||
          mb_strlen($nombre, "UTF-8") > 100) {
    $errores[] = "El nombre debe tener entre 3 y 100 caracteres.";
}

// Validar telefono
if ($telefono === "") {
    $errores[] = "El telefono es obligatorio.";
} elseif (!preg_match('/^[0-9]{10}$/D', $telefono)) {
    $errores[] = "El telefono debe contener exactamente 10 numeros.";
}

// Validar correo
if ($email === "") {
    $errores[] = "El correo electronico es obligatorio.";
} elseif (strlen($email) > 150 ||
          !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Ingresa un correo electronico valido.";
}

// Validar servicio
$serviciosPermitidos = [
    "Corte de cabello",
    "Keratina",
    "Tinte",
    "Peinado",
    "Maquillaje"
];

if ($servicio === "") {
    $errores[] = "Debes seleccionar un servicio.";
} elseif (!in_array($servicio, $serviciosPermitidos, true)) {
    $errores[] = "El servicio seleccionado no es valido.";
}

// Validar fecha real
$fechaValida = DateTimeImmutable::createFromFormat("!Y-m-d", $fecha);

if ($fecha === "") {
    $errores[] = "Debes seleccionar una fecha.";
} elseif (
    !$fechaValida ||
    $fechaValida->format("Y-m-d") !== $fecha
) {
    $errores[] = "La fecha ingresada no es valida.";
} elseif ($fecha <= date("Y-m-d")) {
    $errores[] = "La fecha debe ser posterior al dia de hoy.";
}

// Guardar solamente si no hay errores
if (empty($errores)) {
    try {
        $sql = "INSERT INTO citas
                (nombre, telefono, email, servicio, fecha)
                VALUES (?, ?, ?, ?, ?)";

        $consulta = $conexion->prepare($sql);

        $consulta->bind_param(
            "sssss",
            $nombre,
            $telefono,
            $email,
            $servicio,
            $fecha
        );

        $consulta->execute();
        $consulta->close();

    } catch (mysqli_sql_exception $e) {
        error_log("Error al registrar cita: " . $e->getMessage());
        http_response_code(500);
        $errores[] = "No se pudo guardar la cita. Intenta nuevamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar cita</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <header>
        <h1>Sistema de Citas - Salón de Belleza</h1>
    </header>

    <main>

        <?php if (!empty($errores)): ?>

            <section class="errores">

                <h2>Corrige los siguientes errores</h2>

                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>

                <a href="index.php" class="enlace-boton">
                    Regresar al formulario
                </a>

            </section>

        <?php else: ?>

            <section class="resultado">

                <div class="mensaje-exito">
                    <h2>¡Cita registrada correctamente!</h2>
                    <p>Los datos de tu cita son los siguientes:</p>
                </div>

                <div class="datos-cita">

                    <div class="dato">
                        <strong>Nombre:</strong>
                        <?php echo htmlspecialchars($nombre); ?>
                    </div>

                    <div class="dato">
                        <strong>Teléfono:</strong>
                        <?php echo htmlspecialchars($telefono); ?>
                    </div>

                    <div class="dato">
                        <strong>Correo:</strong>
                        <?php echo htmlspecialchars($email); ?>
                    </div>

                    <div class="dato">
                        <strong>Servicio:</strong>
                        <?php echo htmlspecialchars($servicio); ?>
                    </div>

                    <div class="dato">
                        <strong>Fecha de la cita:</strong>
                        <?php echo htmlspecialchars($fecha); ?>
                    </div>

                </div>

                <a href="index.php" class="enlace-boton">
                    Registrar otra cita
                </a>

            </section>

        <?php endif; ?>

    </main>

    <footer>
        <p>Sistema de Citas - Salón de Belleza</p>
    </footer>

</body>
</html>