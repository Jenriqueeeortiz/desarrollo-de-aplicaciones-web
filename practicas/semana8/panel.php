
<?php
require_once "proteger.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administracion</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>Panel de administracion</h1>
    <p>Salon de belleza</p>
</header>

<main>
    <section>
        <h2>
            Bienvenido,
            <?php echo htmlspecialchars(
                $_SESSION["nombre"],
                ENT_QUOTES,
                "UTF-8"
            ); ?>
        </h2>

        <p>Has iniciado sesion correctamente.</p>

        <a href="index.php">Administrar citas</a>

        <p>
            <a href="logout.php">Cerrar sesion</a>
        </p>
    </section>
</main>

</body>
</html>
