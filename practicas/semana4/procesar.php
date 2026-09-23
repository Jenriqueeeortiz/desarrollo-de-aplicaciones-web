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
} elseif ($fecha <= date('Y-m-d')) {
    $errores[] = "La fecha de la cita debe ser posterior a la fecha de hoy.";
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