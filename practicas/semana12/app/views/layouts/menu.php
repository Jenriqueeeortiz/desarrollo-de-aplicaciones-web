
<?php
$rolActual = $_SESSION["rol"] ?? "";
$usuarioActual = $_SESSION["nombre"] ?? "Usuario";
?>

<nav class="menu-principal" aria-label="Navegacion principal">
    <a href="panel.php">Panel</a>
    <a href="index.php">Citas</a>

    <?php if ($rolActual === "administrador"): ?>
        <span class="etiqueta-rol">Administrador</span>
    <?php elseif ($rolActual === "consulta"): ?>
        <span class="etiqueta-rol">Consulta</span>
    <?php endif; ?>

    <span class="usuario-actual">
        <?= htmlspecialchars($usuarioActual, ENT_QUOTES, "UTF-8") ?>
    </span>

    <a href="logout.php">Cerrar sesion</a>
</nav>
