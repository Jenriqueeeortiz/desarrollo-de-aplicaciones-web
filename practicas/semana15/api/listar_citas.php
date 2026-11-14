
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

    // Obtener y validar los parametros recibidos
    $nombresParametros = [
        "buscar",
        "servicio",
        "fecha_desde",
        "fecha_hasta"
    ];

    $parametros = [];

    foreach ($nombresParametros as $nombre) {
        $valor = $_GET[$nombre] ?? "";

        if (!is_string($valor)) {
            responder(400, [
                "ok" => false,
                "mensaje" => "Parametro invalido: " . $nombre
            ]);
        }

        $parametros[$nombre] = trim($valor);
    }

    // Crear modelo y controlador
    $modelo = new Cita($conexion);
    $controlador = new CitaController($modelo);

    // Consultar citas con los filtros recibidos
    $citas = $controlador->listar(
        $parametros["buscar"],
        $parametros["servicio"],
        $parametros["fecha_desde"],
        $parametros["fecha_hasta"]
    );

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
