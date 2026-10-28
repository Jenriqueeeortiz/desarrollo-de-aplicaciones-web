
<?php
require_once __DIR__ . "/proteger.php";

function esAdministrador(): bool
{
    return ($_SESSION["rol"] ?? "") === "administrador";
}

function exigirAdministrador(): void
{
    if (!esAdministrador()) {
        http_response_code(403);
        exit("Acceso denegado. No tienes permisos para realizar esta accion.");
    }
}
