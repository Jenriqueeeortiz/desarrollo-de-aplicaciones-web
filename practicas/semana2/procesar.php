<?php

$nombre = $_POST['nombre'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$email = $_POST['email'] ?? '';
$servicio = $_POST['servicio'] ?? '';
$fecha = $_POST['fecha'] ?? '';

$errores = [];

// Validar nombre
if (empty($nombre)) {
    $errores[] = "El nombre es obligatorio.";
}

// Validar teléfono
if (empty($telefono)) {
    $errores[] = "El teléfono es obligatorio.";
} elseif (!is_numeric($telefono)) {
    $errores[] = "El teléfono debe contener solamente números.";
}

// Validar correo
if (empty($email)) {
    $errores[] = "El correo electrónico es obligatorio.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Ingresa un correo electrónico válido.";
}

// Validar servicio
if (empty($servicio)) {
    $errores[] = "Debes seleccionar un servicio.";
}

// Validar fecha
if (empty($fecha)) {
    $errores[] = "Debes seleccionar una fecha.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesar cita</title>
</head>
<body>

    <h1>Sistema de Citas - Salón de Belleza</h1>

    <?php if (!empty($errores)): ?>

        <h2>Corrige los siguientes errores:</h2>

        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>

        <a href="index.php">Regresar al formulario</a>

    <?php else: ?>

        <h2>¡Cita registrada correctamente!</h2>

        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Servicio:</strong> <?php echo htmlspecialchars($servicio); ?></p>
        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($fecha); ?></p>

    <?php endif; ?>

</body>
</html>