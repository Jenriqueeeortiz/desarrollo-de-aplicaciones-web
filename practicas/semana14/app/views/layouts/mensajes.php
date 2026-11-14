
<?php
$mensaje = $mensaje ?? "";
$tipoMensaje = $tipoMensaje ?? "info";

$tiposPermitidos = [
    "exito",
    "error",
    "advertencia",
    "info"
];

if (!in_array($tipoMensaje, $tiposPermitidos, true)) {
    $tipoMensaje = "info";
}
?>

<?php if ($mensaje !== ""): ?>
    <div class="mensaje mensaje-<?= $tipoMensaje ?>" role="status">
        <?= htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8") ?>
    </div>
<?php endif; ?>
