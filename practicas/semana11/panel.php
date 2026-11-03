
<?php
require_once __DIR__ . "/autorizacion.php";

// Identificar el rol del usuario
$esAdmin = esAdministrador();

// Obtener el nombre del usuario
$nombre = htmlspecialchars(
    $_SESSION["nombre"] ?? "Usuario",
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de usuario - Salon de belleza</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header>
    <h1>Panel de usuario</h1>
    <p>Salon de belleza</p>
</header>

<main>
    <section>

        <h2>
            Bienvenido, <?php echo $nombre; ?>
        </h2>

        <p>Has iniciado sesion correctamente.</p>

        <p>
            <strong>Rol:</strong>
            <?php echo $esAdmin ? "Administrador" : "Consulta"; ?>
        </p>

        <?php if ($esAdmin): ?>

            <h3>Panel de administrador</h3>

            <p>
                Tienes permisos para consultar, registrar,
                editar y eliminar citas.
            </p>

            <a href="index.php">
                Administrar citas
            </a>

        <?php else: ?>

            <h3>Panel de consulta</h3>

            <p>
                Puedes visualizar las citas registradas
                en el sistema, pero no tienes permisos
                para modificarlas o eliminarlas.
            </p>

            <a href="index.php">
                Consultar citas
            </a>

        <?php endif; ?>

        <p>
            <a href="logout.php">
                Cerrar sesion
            </a>
        </p>

    </section>
</main>

<footer>
    <p>Sistema de Citas - Salon de Belleza</p>
    <p>Proyecto de Desarrollo de Aplicaciones Web</p>
</footer>

</body>
</html>
