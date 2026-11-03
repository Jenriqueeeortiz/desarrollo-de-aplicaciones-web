
 Semana 11 - Arquitectura MVC

 Objetivo

Reorganizar el modulo de consulta y busqueda de citas utilizando una estructura inspirada en MVC.

 Modelo

Archivo: app/models/Cita.php

El modelo se encarga de consultar la tabla citas en MySQL.

Contiene el metodo obtenerTodas, que permite obtener todos los registros o filtrar por nombre y servicio.

Utiliza consultas preparadas para procesar los parametros.

 Controlador

Archivo: app/controllers/CitaController.php

El controlador recibe el texto de busqueda, valida su longitud y solicita los datos al modelo.

Tambien permite reutilizar la misma operacion desde index.php y desde el endpoint de Fetch API.

 Vista

Archivo: app/views/citas/tabla.php

La vista recibe los registros y genera la tabla HTML.

Los datos se muestran utilizando htmlspecialchars para evitar interpretar contenido no confiable.

Las acciones de editar y eliminar solamente se muestran al administrador.

 Integracion con Fetch API

Archivo: api/listar_citas.php

El endpoint verifica la sesion, recibe la busqueda y utiliza el controlador para consultar las citas.

La respuesta se devuelve en formato JSON.

JavaScript recibe los resultados y actualiza la tabla sin recargar toda la pagina.

 Flujo de funcionamiento

Usuario -> index.php o Fetch API -> CitaController.php -> Cita.php -> MySQL

MySQL -> Cita.php -> CitaController.php -> Vista HTML o JSON

 Seguridad

Se conservaron las sesiones, los roles y la proteccion CSRF de las semanas anteriores.

Los permisos para modificar registros siguen verificandose en PHP.

La configuracion local de MySQL no se incluye en GitHub.
