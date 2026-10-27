<?php
require_once "proteger.php";
require_once "conexion.php";

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

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$email = trim($_POST["email"] ?? "");
$servicio = trim($_POST["servicio"] ?? "");
$fecha = trim($_POST["fecha"] ?? "");

$errores = [];

$serviciosValidos = [
    "Corte de cabello",
    "Keratina",
    "Tinte",
    "Peinado",
    "Maquillaje"
];

if (!$id || $id < 1) {
    $errores[] = "El identificador no es valido.";
}

if (mb_strlen($nombre) < 3 || mb_strlen($nombre) > 100) {
    $errores[] = "El nombre debe tener entre 3 y 100 caracteres.";
}

if (!preg_match("/^[0-9]{10}$/", $telefono)) {
    $errores[] = "El telefono debe contener 10 numeros.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
    $errores[] = "El correo electronico no es valido.";
}

if (!in_array($servicio, $serviciosValidos, true)) {
    $errores[] = "Selecciona un servicio valido.";
}

$fechaValida = DateTimeImmutable::createFromFormat("!Y-m-d", $fecha);

if (!$fechaValida ||
    $fechaValida->format("Y-m-d") !== $fecha ||
    $fecha <= date("Y-m-d")) {
    $errores[] = "Selecciona una fecha posterior a hoy.";
}

if (!empty($errores)) {
    http_response_code(400);

    foreach ($errores as $error) {
        echo "<p>" . htmlspecialchars($error, ENT_QUOTES, "UTF-8") . "</p>";
    }

    echo '<a href="index.php">Regresar</a>';
    exit;
}

$consulta = $conexion->prepare("SELECT id FROM citas WHERE id = ?");
$consulta->bind_param("i", $id);
$consulta->execute();

if (!$consulta->get_result()->fetch_assoc()) {
    http_response_code(404);
    exit("La cita que intentas modificar no existe.");
}

$sql = "UPDATE citas
        SET nombre = ?, telefono = ?, email = ?, servicio = ?, fecha = ?
        WHERE id = ?";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "sssssi",
    $nombre,
    $telefono,
    $email,
    $servicio,
    $fecha,
    $id
);

try {
    $stmt->execute();
    $stmt->close();

    header("Location: index.php?mensaje=actualizada");
    exit;

} catch (mysqli_sql_exception $e) {
    error_log("Error al actualizar cita: " . $e->getMessage());

    http_response_code(500);
    exit("No fue posible actualizar la cita.");
}
