<?php

$config = require __DIR__ . "/config.local.php";

$conexion = new mysqli(
    $config["servidor"],
    $config["usuario"],
    $config["password"],
    $config["baseDatos"]
);

if ($conexion->connect_error) {
    error_log("Error de conexion con MySQL.");
    http_response_code(500);
    exit("No fue posible conectar con la base de datos.");
}

$conexion->set_charset("utf8mb4");