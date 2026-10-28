
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

// Verificar token CSRF
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

// Validar identificador
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit("Identificador no valido.");
}

// Eliminar mediante consulta preparada
try {
    $sql = "DELETE FROM citas WHERE id = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $filasAfectadas = $stmt->affected_rows;
    $stmt->close();

    if ($filasAfectadas === 0) {
        http_response_code(404);
        exit("La cita no existe o ya fue eliminada.");
    }

    header("Location: index.php?mensaje=eliminada");
    exit;

} catch (mysqli_sql_exception $e) {
    error_log("Error al eliminar cita: " . $e->getMessage());

    http_response_code(500);
    exit("No fue posible eliminar la cita.");
}
