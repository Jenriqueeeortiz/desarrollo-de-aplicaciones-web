 Diseño de función avanzada

 1. Introducción

En esta semana se trabajó en la implementación de una función avanzada para el sistema de citas del salón de belleza.

El objetivo fue mejorar la consulta de información mediante filtros que permitan encontrar citas de una manera más rápida y organizada, sin tener que revisar todos los registros manualmente.

La función implementada consiste en filtrar las citas por servicio y por un rango de fechas, conservando también la búsqueda que ya se tenía por nombre o servicio.

 2. Objetivo de la función

Implementar filtros avanzados en el apartado de citas registradas para facilitar la búsqueda y consulta de información, utilizando PHP, MySQL, JavaScript y Fetch API.

 3. Descripción de la función

La función se agregó al apartado de citas registradas y cuenta con las siguientes opciones:

- **Búsqueda por nombre o servicio:** permite encontrar citas escribiendo el nombre del cliente o el servicio.
- **Filtro por servicio:** permite seleccionar un servicio específico.
- **Fecha desde:** permite establecer la fecha inicial de la consulta.
- **Fecha hasta:** permite establecer la fecha final de la consulta.
- **Aplicar filtros:** ejecuta la consulta utilizando los criterios seleccionados.
- **Limpiar filtros:** elimina los filtros seleccionados y muestra nuevamente los registros.

Los servicios disponibles son:

- Corte de cabello.
- Keratina.
- Tinte.
- Peinado.
- Maquillaje.

También es posible combinar la búsqueda por texto con los filtros de servicio y fecha.

 4. Tecnologías utilizadas

| Tecnología | Función |
|---|---|
| PHP | Procesar las solicitudes y validar los datos. |
| MySQL | Consultar los registros almacenados. |
| JavaScript | Obtener los valores de los filtros y actualizar la tabla. |
| Fetch API | Enviar solicitudes al servidor sin recargar la página. |
| HTML | Crear los controles de búsqueda y filtros. |
| CSS | Mantener el diseño visual del sistema. |

 5. Diseño y funcionamiento

El funcionamiento de la característica se divide en los siguientes pasos:

1. El usuario ingresa un nombre o selecciona los filtros disponibles.
2. JavaScript obtiene los valores de los campos.
3. Fetch API envía una solicitud GET al archivo `api/listar_citas.php`.
4. PHP recibe los parámetros y los envía al controlador.
5. El controlador valida la información recibida.
6. El modelo realiza la consulta a MySQL utilizando una consulta preparada.
7. El servidor devuelve los resultados en formato JSON.
8. JavaScript recibe la respuesta y actualiza la tabla de citas.

 6. Archivos modificados

Para implementar esta función se modificaron los siguientes archivos:

| Archivo | Modificación |
|---|---|
| `app/models/Cita.php` | Se agregaron parámetros para filtrar por servicio y fechas en las consultas. |
| `app/controllers/CitaController.php` | Se agregaron validaciones para los filtros recibidos. |
| `api/listar_citas.php` | Se agregaron los parámetros GET para recibir los filtros. |
| `fetch_citas.js` | Se agregó el envío de los filtros mediante Fetch API y la actualización de resultados. |
| `index.php` | Se agregaron los controles visuales para seleccionar los filtros. |

 7. Validaciones y seguridad

Para mantener la seguridad del sistema se conservaron las medidas implementadas anteriormente y se agregaron validaciones para los nuevos filtros.

Las validaciones realizadas son:

- Comprobar que los parámetros recibidos sean cadenas de texto.
- Limitar la longitud de la búsqueda.
- Verificar que el servicio seleccionado sea válido.
- Comprobar que las fechas tengan el formato correcto.
- Evitar que la fecha inicial sea posterior a la fecha final.
- Utilizar consultas preparadas para las consultas a MySQL.
- Verificar que el usuario tenga una sesión activa.
- Conservar los permisos de administrador y consulta.

 8. Beneficios de la implementación

La nueva función permite consultar las citas de manera más eficiente, facilita la organización de los registros y reduce el tiempo necesario para encontrar información.

También mejora la experiencia del usuario porque los resultados se actualizan sin necesidad de recargar toda la página.

 9. Conclusión

Con esta implementación logré agregar una función avanzada al sistema de citas del salón de belleza.

Los filtros permiten consultar las reservaciones por servicio y fechas, además de combinarse con la búsqueda por nombre o servicio que ya existía.

También se mantuvo la estructura MVC y las medidas de seguridad implementadas en las semanas anteriores, logrando mejorar el funcionamiento del sistema sin modificar sus características principales.