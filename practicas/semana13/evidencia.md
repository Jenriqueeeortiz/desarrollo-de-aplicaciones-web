 Evidencia de la Semana 13

 1. Objetivo

Implementar una función avanzada en el sistema de citas del salón de belleza para mejorar la consulta de información mediante filtros por servicio y rango de fechas.

 2. Actividades realizadas

Durante esta semana se realizaron las siguientes actividades:

1. Se analizó el funcionamiento del sistema desarrollado en la semana anterior.
2. Se seleccionó como función avanzada la implementación de filtros por servicio y fecha.
3. Se modificó el modelo `Cita.php` para permitir consultas con diferentes criterios.
4. Se actualizó el controlador `CitaController.php` para validar los parámetros recibidos.
5. Se modificó la API `listar_citas.php` para recibir los filtros mediante solicitudes GET.
6. Se actualizó `fetch_citas.js` para enviar los parámetros mediante Fetch API y actualizar la tabla.
7. Se modificó `index.php` para agregar los controles de filtrado.
8. Se realizaron pruebas para comprobar el funcionamiento de la nueva característica.

 3. Archivos modificados

- `app/models/Cita.php`
- `app/controllers/CitaController.php`
- `api/listar_citas.php`
- `fetch_citas.js`
- `index.php`

 4. Resultados obtenidos

Se agregó una función que permite filtrar las citas por servicio y por un rango de fechas.

También se conservó la búsqueda por nombre o servicio y se agregó la opción para limpiar los filtros.

Los resultados se actualizan mediante Fetch API sin necesidad de recargar la página. Además, se mantuvieron las validaciones, las consultas preparadas y los permisos de los usuarios.

 6. Conclusión

En esta semana logré implementar una función avanzada para mejorar el sistema de citas del salón de belleza.

La nueva característica facilita la búsqueda de reservaciones y permite consultar los registros de acuerdo con el servicio y las fechas seleccionadas.

Con esta implementación reforcé mis conocimientos sobre PHP, MySQL, JavaScript, Fetch API, consultas preparadas y validación de datos.

El resultado fue una mejora en la organización y consulta de las citas, conservando las funciones y medidas de seguridad desarrolladas anteriormente.