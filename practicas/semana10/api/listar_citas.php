
<?php
// Evitar mostrar errores tecnicos en la respuesta JSON
ini_set("display_errors", "0");

header("Content-Type: application/json; charset=UTF-8");
header("Cache-Control: no-store");

function responder(int $codigo, array $datos): void
{
    http_response_code($codigo);

    echo json_encode(
        $datos,
        JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE
    );

    exit;
}

// Verificar que la solicitud sea GET
if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Allow: GET");

    responder(405, [
        "ok" => false,
        "mensaje" => "Metodo no permitido"
    ]);
}

// Verificar que exista una sesion activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (
    empty($_SESSION["usuario_id"]) ||
    !in_array(
        $_SESSION["rol"] ?? "",
        ["administrador", "consulta"],
        true
    )
) {
    responder(401, [
        "ok" => false,
        "mensaje" => "Debes iniciar sesion"
    ]);
}

try {
    require_once __DIR__ . "/../conexion.php";

    // Recibir y validar el texto de busqueda
    $busqueda = trim($_GET["buscar"] ?? "");

    if (mb_strlen($busqueda) > 100) {
        responder(400, [
            "ok" => false,
            "mensaje" => "La busqueda es demasiado larga"
        ]);
    }

    // Consultar citas usando parametros
    $sql = "SELECT id, nombre, telefono, email, servicio, fecha
            FROM citas
            WHERE nombre LIKE ?
               OR servicio LIKE ?
            ORDER BY fecha ASC";

    $stmt = $conexion->prepare($sql);

    $filtro = "%" . $busqueda . "%";

    $stmt->bind_param("ss", $filtro, $filtro);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $citas = $resultado->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    responder(200, [
        "ok" => true,
        "mensaje" => "Consulta realizada correctamente",
        "total" => count($citas),
        "citas" => $citas
    ]);

} catch (Throwable $error) {
    error_log($error->getMessage());

    responder(500, [
        "ok" => false,
        "mensaje" => "No fue posible consultar las citas"
    ]);
}
