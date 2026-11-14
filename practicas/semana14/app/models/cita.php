
<?php

class Cita
{
    private mysqli $conexion;

    public function __construct(mysqli $conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerTodas(
        string $busqueda = "",
        string $servicio = "",
        string $fechaDesde = "",
        string $fechaHasta = ""
    ): array {
        $sql = "SELECT id, nombre, telefono, email, servicio, fecha
                FROM citas
                WHERE (? = '' OR nombre LIKE ? OR servicio LIKE ?)
                  AND (? = '' OR servicio = ?)
                  AND (? = '' OR fecha >= ?)
                  AND (? = '' OR fecha <= ?)
                ORDER BY fecha ASC";

        $stmt = $this->conexion->prepare($sql);

        $filtroBusqueda = "%" . $busqueda . "%";

        $stmt->bind_param(
            "sssssssss",
            $busqueda,
            $filtroBusqueda,
            $filtroBusqueda,
            $servicio,
            $servicio,
            $fechaDesde,
            $fechaDesde,
            $fechaHasta,
            $fechaHasta
        );

        $stmt->execute();

        $resultado = $stmt->get_result();
        $citas = $resultado->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $citas;
    }
}
