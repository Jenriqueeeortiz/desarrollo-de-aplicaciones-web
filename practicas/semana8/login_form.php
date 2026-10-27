<!-- passwd temporal : Salon2026_Prueba! -->
<?php
session_start();

if (isset($_SESSION["usuario_id"])) {
    header("Location: panel.php");
    exit;
}

$error = isset($_GET["error"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion - Salon de belleza</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>Salon de belleza</h1>
    <p>Acceso al sistema de administracion</p>
</header>

<main>
    <section>
        <h2>Iniciar sesion</h2>

        <?php if ($error): ?>
            <p class="mensaje-error">
                Usuario o contraseña incorrectos.
            </p>
        <?php endif; ?>

        <form action="login.php" method="POST">

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario"
                   name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena"
                   name="contrasena" required>

            <button type="submit">
                Iniciar sesion
            </button>

        </form>
    </section>
</main>

</body>
</html>
