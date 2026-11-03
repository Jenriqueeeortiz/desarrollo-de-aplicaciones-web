
<?php
// Plantilla general reutilizable

if (!isset($contenido) || !is_string($contenido)) {
    throw new RuntimeException("No se definio el contenido de la pagina.");
}

$tituloPagina = $tituloPagina ?? "Sistema de Citas - Salon de Belleza";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, "UTF-8") ?></title>

    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php require __DIR__ . "/header.php"; ?>

<?php require __DIR__ . "/menu.php"; ?>

<?php require __DIR__ . "/mensajes.php"; ?>

<?= $contenido ?>

<?php require __DIR__ . "/footer.php"; ?>

</body>
</html>
