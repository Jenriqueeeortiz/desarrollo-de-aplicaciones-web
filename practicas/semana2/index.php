<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Citas - Salón de Belleza</title>
</head>
<body>

    <h1>Sistema de Citas - Salón de Belleza</h1>

    <h2>Agendar una cita</h2>

    <form action="procesar.php" method="POST">

        <label for="nombre">Nombre del cliente:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" required>
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="servicio">Servicio:</label>
        <select id="servicio" name="servicio" required>
            <option value="">Selecciona un servicio</option>
            <option value="Corte de cabello">Corte de cabello</option>
            <option value="Keratina">Keratina</option>
            <option value="Tinte">Tinte</option>
            <option value="Peinado">Peinado</option>
            <option value="Maquillaje">Maquillaje</option>
        </select>
        <br><br>

        <label for="fecha">Fecha de la cita:</label>
        <input type="date" id="fecha" name="fecha" required>
        <br><br>

        <button type="submit">Agendar cita</button>

    </form>

</body>
</html>