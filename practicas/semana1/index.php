<?php
$cliente = "Enrique Ortiz";
$servicio = "corte de cabello";

$duracionServicio = 40; // minutos
$citasDisponibles = 3;

$tiempoDisponible = $duracionServicio * $citasDisponibles;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Salón de Belleza</title>
</head>
<body>

    <h1>Sistema de Citas - Salón de Belleza</h1>

    <h2>Datos de la cita</h2>

    <p><strong>Cliente:</strong> <?php echo $cliente; ?></p>
    <p><strong>Servicio:</strong> <?php echo $servicio; ?></p>
    <p><strong>Duración del servicio:</strong> <?php echo $duracionServicio; ?> minutos</p>
    <p><strong>Citas disponibles:</strong> <?php echo $citasDisponibles; ?></p>

    <h2>Resultado</h2>

    <p>
        El tiempo total disponible para <?php echo $citasDisponibles; ?>
        citas de <?php echo $servicio; ?> es de
        <strong><?php echo $tiempoDisponible; ?> minutos.</strong>
    </p>

    <h2>Servicios del salón</h2>

    <ul>
        <li>Corte de cabello</li>
        <li>Keratina</li>
        <li>Tinte</li>
        <li>Peinados</li>
        <li>Maquillajes</li>
    </ul>

</body>
</html>