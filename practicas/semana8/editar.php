<?php
require_once "proteger.php";
require_once "conexion.php";
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit("Identificador de cita no valido.");
}

$sql = "SELECT * FROM citas WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$cita = $resultado->fetch_assoc();

if (!$cita) {
    http_response_code(404);
    exit("La cita no existe.");
}

function escapar($valor) {
    return htmlspecialchars($valor, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cita</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>Editar cita</h1>
    <p>Modifica la informacion de la cita</p>
</header>

<main>
    <section>
        <form action="actualizar.php" method="POST">
        <input type="hidden" name="csrf_token"
            value="<?php echo htmlspecialchars(
            $_SESSION["csrf_token"],
            ENT_QUOTES,
            "UTF-8"
       );?>">

            <input type="hidden" name="id"
                   value="<?php echo (int)$cita['id']; ?>">

            <label for="nombre">Nombre del cliente:</label>
            <input type="text" id="nombre" name="nombre"
                   value="<?php echo escapar($cita['nombre']); ?>" required>

            <label for="telefono">Telefono:</label>
            <input type="tel" id="telefono" name="telefono"
                   value="<?php echo escapar($cita['telefono']); ?>"
                   pattern="[0-9]{10}" required>

            <label for="email">Correo electronico:</label>
            <input type="email" id="email" name="email"
                   value="<?php echo escapar($cita['email']); ?>" required>

            <label for="servicio">Servicio:</label>
            <select id="servicio" name="servicio" required>
                <?php
                $servicios = [
                    "Corte de cabello",
                    "Keratina",
                    "Tinte",
                    "Peinado",
                    "Maquillaje"
                ];

                foreach ($servicios as $servicio):
                ?>
                    <option value="<?php echo escapar($servicio); ?>"
                        <?php echo $cita['servicio'] === $servicio ? "selected" : ""; ?>>
                        <?php echo escapar($servicio); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="fecha">Fecha de la cita:</label>
            <input type="date" id="fecha" name="fecha"
                   min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                   value="<?php echo escapar($cita['fecha']); ?>" required>

            <button type="submit">Guardar cambios</button>
        </form>

        <p><a href="index.php">Regresar a las citas</a></p>
    </section>
</main>

</body>
</html>
