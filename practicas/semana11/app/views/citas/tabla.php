
<?php
// Variables esperadas:
// $citas, $esAdmin y $_SESSION["csrf_token"]
?>

<table id="tablaCitas">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Servicio</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody id="cuerpoCitas">
        <?php foreach ($citas as $cita): ?>
            <tr>
                <td><?= (int)$cita["id"] ?></td>
                <td><?= escapar($cita["nombre"]) ?></td>
                <td><?= escapar($cita["telefono"]) ?></td>
                <td><?= escapar($cita["email"]) ?></td>
                <td><?= escapar($cita["servicio"]) ?></td>
                <td><?= escapar($cita["fecha"]) ?></td>

                <td>
                    <?php if ($esAdmin): ?>

                        <a class="btn-editar"
                           href="editar.php?id=<?= (int)$cita["id"] ?>">
                            Editar
                        </a>

                        <form action="eliminar.php"
                              method="POST"
                              class="form-eliminar"
                              onsubmit="return confirm('¿Seguro que deseas eliminar esta cita?');">

                            <input type="hidden"
                                   name="id"
                                   value="<?= (int)$cita["id"] ?>">

                            <input type="hidden"
                                   name="csrf_token"
                                   value="<?= escapar($_SESSION["csrf_token"]) ?>">

                            <button type="submit" class="btn-eliminar">
                                Eliminar
                            </button>
                        </form>

                    <?php else: ?>
                        <span>Solo lectura</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p id="sinCitas" <?= count($citas) > 0 ? "hidden" : "" ?>>
    No hay citas registradas.
</p>
