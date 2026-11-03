
<?php

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

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Allow: GET");

    responder(405, [
        "ok" => false,
        "mensaje" => "Metodo no permitido"
    ]);
}

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
    require_once __DIR__ . "/../app/controllers/CitaController.php";

    $busqueda = $_GET["buscar"] ?? "";

    if (!is_string($busqueda)) {
        responder(400, [
            "ok" => false,
            "mensaje" => "Busqueda invalida"
        ]);
    }

    $busqueda = trim($busqueda);

    $modelo = new Cita($conexion);
    $controlador = new CitaController($modelo);

    $citas = $controlador->listar($busqueda);

    responder(200, [
        "ok" => true,
        "mensaje" => "Consulta realizada correctamente",
        "total" => count($citas),
        "citas" => $citas
    ]);

} catch (InvalidArgumentException $error) {
    responder(400, [
        "ok" => false,
        "mensaje" => $error->getMessage()
    ]);

} catch (Throwable $error) {
    error_log($error->getMessage());

    responder(500, [
        "ok" => false,
        "mensaje" => "No fue posible consultar las citas"
    ]);
}
