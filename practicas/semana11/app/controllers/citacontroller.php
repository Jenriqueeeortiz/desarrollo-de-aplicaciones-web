
<?php

require_once __DIR__ . "/../models/Cita.php";

class CitaController
{
    private Cita $modelo;

    public function __construct(Cita $modelo)
    {
        $this->modelo = $modelo;
    }

    public function listar(string $busqueda = ""): array
    {
        if (mb_strlen($busqueda) > 100) {
            throw new InvalidArgumentException(
                "La busqueda es demasiado larga"
            );
        }

        return $this->modelo->obtenerTodas($busqueda);
    }
}
