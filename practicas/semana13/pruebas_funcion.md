 Pruebas de funcionamiento de la función avanzada

 1. Introducción

En este documento se describen las pruebas realizadas a la función avanzada de filtros implementada en el sistema de citas del salón de belleza.

El propósito fue comprobar que los filtros funcionaran correctamente, que se pudieran combinar diferentes criterios de búsqueda y que se conservaran las funciones que ya tenía el sistema.

 2. Entorno de pruebas

Para realizar las pruebas se utilizó el siguiente entorno:

| Elemento | Herramienta |
|---|---|
| Lenguaje del servidor | PHP |
| Base de datos | MySQL |
| Lenguaje del cliente | JavaScript |
| Comunicación | Fetch API |
| Servidor local | Servidor integrado de PHP |
| Navegador | Google Chrome |
| Proyecto | Sistema de Citas - Salón de Belleza |

 3. Casos de prueba

 Prueba 1. Búsqueda por nombre

**Procedimiento:**
1. Ingresar al sistema con una cuenta autorizada.
2. Escribir el nombre de un cliente en el buscador.
3. Presionar el botón Buscar.

**Resultado esperado:** Se muestran las citas relacionadas con el nombre ingresado.

**Resultado obtenido:** La búsqueda se realizó correctamente y se mostraron los registros correspondientes.

**Estado:** Correcto.

 Prueba 2. Filtro por servicio

**Procedimiento:**
1. Seleccionar un servicio, por ejemplo, Keratina.
2. Presionar Aplicar filtros.
3. Revisar los resultados de la tabla.

**Resultado esperado:** Se muestran únicamente las citas correspondientes al servicio seleccionado.

**Resultado obtenido:** El sistema mostró las citas que coincidían con el servicio seleccionado.

**Estado:** Correcto.

 Prueba 3. Filtro por fecha inicial y final

**Procedimiento:**
1. Seleccionar una fecha inicial.
2. Seleccionar una fecha final.
3. Presionar Aplicar filtros.

**Resultado esperado:** Se muestran las citas registradas dentro del rango de fechas seleccionado, incluyendo las fechas límite.

**Resultado obtenido:** El sistema realizó la consulta utilizando el rango de fechas y mostró los registros correspondientes.

**Estado:** Correcto.

 Prueba 4. Combinación de filtros

**Procedimiento:**
1. Escribir el nombre de un cliente.
2. Seleccionar un servicio.
3. Establecer una fecha inicial y una fecha final.
4. Aplicar los filtros.

**Resultado esperado:** Se muestran únicamente las citas que cumplen con todos los criterios seleccionados.

**Resultado obtenido:** La búsqueda combinada funcionó correctamente y los resultados coincidieron con los criterios establecidos.

**Estado:** Correcto.

 Prueba 5. Limpiar filtros

**Procedimiento:**
1. Seleccionar un servicio.
2. Establecer un rango de fechas.
3. Presionar el botón Limpiar filtros.

**Resultado esperado:** Se eliminan los filtros de servicio y fecha y se vuelve a realizar la consulta.

**Resultado obtenido:** Los campos de filtros se limpiaron y el sistema volvió a mostrar los registros sin esos criterios.

**Estado:** Correcto.

 Prueba 6. Validación de fechas incorrectas

**Procedimiento:**
1. Seleccionar una fecha inicial posterior a la fecha final.
2. Presionar Aplicar filtros.

**Resultado esperado:** El sistema muestra un mensaje indicando que la fecha inicial no puede ser posterior a la fecha final.

**Resultado obtenido:** Se mostró el mensaje de validación y no se realizó la consulta con el rango incorrecto.

**Estado:** Correcto.

 Prueba 7. Servicio no permitido

**Procedimiento:**
1. Enviar una solicitud a la API con un servicio que no se encuentre dentro de las opciones permitidas.
2. Revisar la respuesta del servidor.

**Resultado esperado:** El servidor rechaza el parámetro y devuelve una respuesta de error con código HTTP 400.

**Resultado obtenido:** La API rechazó el servicio no válido y devolvió el mensaje correspondiente.

**Estado:** Correcto.

 Prueba 8. Consulta sin resultados

**Procedimiento:**
1. Seleccionar un servicio o rango de fechas sin citas registradas.
2. Aplicar los filtros.

**Resultado esperado:** La tabla no muestra registros y aparece el mensaje de que no existen citas disponibles para la consulta.

**Resultado obtenido:** El sistema mostró cero resultados y presentó el estado de consulta sin registros.

**Estado:** Correcto.

 Prueba 9. Permisos de usuario

**Procedimiento:**
1. Iniciar sesión con un usuario administrador.
2. Comprobar que aparezcan las opciones de edición y eliminación.
3. Iniciar sesión con un usuario de consulta.
4. Revisar las acciones disponibles.

**Resultado esperado:** El administrador conserva sus permisos y el usuario de consulta solamente puede visualizar la información.

**Resultado obtenido:** Los permisos se conservaron correctamente para ambos tipos de usuario.

**Estado:** Correcto.

 4. Tabla general de resultados

| No. | Prueba | Resultado |
|---|---|---|
| 1 | Búsqueda por nombre | Correcto |
| 2 | Filtro por servicio | Correcto |
| 3 | Filtro por fechas | Correcto |
| 4 | Combinación de filtros | Correcto |
| 5 | Limpiar filtros | Correcto |
| 6 | Validación de fechas | Correcto |
| 7 | Servicio no permitido | Correcto |
| 8 | Consulta sin resultados | Correcto |
| 9 | Permisos de usuario | Correcto |

 5. Conclusión

Las pruebas permitieron revisar el funcionamiento de la nueva característica de filtros avanzados.

Se comprobó el funcionamiento de la búsqueda por nombre, el filtrado por servicio, la consulta por fechas y la combinación de diferentes criterios.

También se revisaron las validaciones y los permisos de usuario para conservar la seguridad del sistema.

Con estas pruebas se verificó que la función avanzada se integrara con el funcionamiento que ya tenía el proyecto.