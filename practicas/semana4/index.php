<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas - Salón de Belleza</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <header>
        <h1>Sistema de Citas - Salón de Belleza</h1>
        <p>Agenda tu cita de manera rápida y sencilla</p>
    </header>
    <div id="mensajeBienvenida" class="mensaje-bienvenida"></div>

    <main>

        <section class="contenedor">
            <div>
                <h2>Agendar una cita</h2>
                <p>Completa los siguientes datos para registrar tu cita.</p>
            </div>

            <div class="caja">
                <strong>Servicios disponibles</strong>
                <p>Cortes, keratina, tinte, peinados y maquillajes.</p>
            </div>
        </section>
        <section class="informacion-seccion">

            <button type="button" id="btnMostrar">
                Ocultar información
            </button>

            <div id="informacion">
                <h2>Información de la cita</h2>
                <p>
                    Recuerda proporcionar tus datos correctamente.
                    La fecha seleccionada debe ser posterior al día de hoy.
                </p>
            </div>
        </section>
        <section>
            <div id="mensaje"></div>
            <form id="formularioCita" action="procesar.php" method="POST">

                <label for="nombre">Nombre del cliente:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" required>

                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="servicio">Servicio:</label>
                <select id="servicio" name="servicio" required>
                    <option value="">Selecciona un servicio</option>
                    <option value="Corte de cabello">Corte de cabello</option>
                    <option value="Keratina">Keratina</option>
                    <option value="Tinte">Tinte</option>
                    <option value="Peinado">Peinado</option>
                    <option value="Maquillaje">Maquillaje</option>
                </select>
                <label for="fecha">Fecha de la cita:</label>
                <input type="date" id="fecha" name="fecha" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>

                <button type="submit">Agendar cita</button>

            </form>
        </section>

    </main>

    <footer>
        <p>Sistema de Citas - Salón de Belleza</p>
        <p>Proyecto de Desarrollo de Aplicaciones Web</p>
    </footer>
<script src="script.js"></script>
</body>
</html>
