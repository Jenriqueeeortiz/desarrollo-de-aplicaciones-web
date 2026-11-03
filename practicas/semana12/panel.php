
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

// Configurar el titulo de la pagina
$tituloPagina = "Panel de usuario - Salon de Belleza";

// Iniciar la captura del contenido
ob_start();
?>

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

    </section>
</main>

<?php
// Guardar el contenido de la pagina
$contenido = ob_get_clean();

// Cargar la plantilla general
require __DIR__ . "/app/views/layouts/plantilla.php";
?>
