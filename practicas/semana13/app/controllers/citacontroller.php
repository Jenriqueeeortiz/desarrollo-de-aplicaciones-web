
<?php

require_once __DIR__ . "/../models/Cita.php";

class CitaController
{
    private Cita $modelo;

    public function __construct(Cita $modelo)
    {
        $this->modelo = $modelo;
    }

    public function listar(
        string $busqueda = "",
        string $servicio = "",
        string $fechaDesde = "",
        string $fechaHasta = ""
    ): array {
        $busqueda = trim($busqueda);
        $servicio = trim($servicio);
        $fechaDesde = trim($fechaDesde);
        $fechaHasta = trim($fechaHasta);

        // Validar longitud de la busqueda
        if (mb_strlen($busqueda) > 100) {
            throw new InvalidArgumentException(
                "La busqueda es demasiado larga"
            );
        }

        // Validar servicio permitido
        $serviciosPermitidos = [
            "Corte de cabello",
            "Keratina",
            "Tinte",
            "Peinado",
            "Maquillaje"
        ];

        if (
            $servicio !== "" &&
            !in_array($servicio, $serviciosPermitidos, true)
        ) {
            throw new InvalidArgumentException(
                "El servicio seleccionado no es valido"
            );
        }

        // Validar formato y existencia de las fechas
        if (
            $fechaDesde !== "" &&
            !$this->fechaValida($fechaDesde)
        ) {
            throw new InvalidArgumentException(
                "La fecha inicial no es valida"
            );
        }

        if (
            $fechaHasta !== "" &&
            !$this->fechaValida($fechaHasta)
        ) {
            throw new InvalidArgumentException(
                "La fecha final no es valida"
            );
        }

        // Comprobar que la fecha inicial no sea posterior
        // a la fecha final
        if (
            $fechaDesde !== "" &&
            $fechaHasta !== "" &&
            $fechaDesde > $fechaHasta
        ) {
            throw new InvalidArgumentException(
                "La fecha inicial no puede ser posterior a la fecha final"
            );
        }

        return $this->modelo->obtenerTodas(
            $busqueda,
            $servicio,
            $fechaDesde,
            $fechaHasta
        );
    }

    private function fechaValida(string $fecha): bool
    {
        $fechaObjeto = DateTime::createFromFormat("!Y-m-d", $fecha);

        return $fechaObjeto !== false &&
               $fechaObjeto->format("Y-m-d") === $fecha;
    }
}
