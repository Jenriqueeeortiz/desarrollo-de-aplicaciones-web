
<?php

class Cita
{
    private mysqli $conexion;

    public function __construct(mysqli $conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerTodas(string $busqueda = ""): array
    {
        $sql = "SELECT id, nombre, telefono, email, servicio, fecha
                FROM citas
                WHERE nombre LIKE ?
                   OR servicio LIKE ?
                ORDER BY fecha ASC";

        $stmt = $this->conexion->prepare($sql);

        $filtro = "%" . $busqueda . "%";

        $stmt->bind_param("ss", $filtro, $filtro);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $citas = $resultado->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $citas;
    }
}
