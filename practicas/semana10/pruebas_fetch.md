 Semana 10 - Pruebas de Fetch API

 Objetivo

El objetivo de estas pruebas fue comprobar el funcionamiento de la busqueda de citas mediante Fetch API, verificando la comunicacion entre JavaScript, PHP y MySQL, asi como la actualizacion de los resultados sin recargar completamente la pagina.

Tambien se reviso que las funciones de seguridad, inicio de sesion y permisos de usuario continuaran funcionando correctamente.

 Pruebas realizadas

| No. | Prueba | Resultado obtenido | Estado |
|---|---|---|---|
| 1 | Abrir el sistema | La pagina cargo correctamente y mostro el formulario y las citas registradas. | Correcta |
| 2 | Buscar por nombre | El sistema mostro las citas que coincidieron con el nombre ingresado. | Correcta |
| 3 | Buscar por servicio | Se mostraron los registros correspondientes al servicio seleccionado. | Correcta |
| 4 | Buscar sin escribir texto | Se mostraron todas las citas registradas en la base de datos. | Correcta |
| 5 | Buscar un dato inexistente | La tabla quedo vacia y aparecio un mensaje indicando que no habia resultados. | Correcta |
| 6 | Comprobar Fetch API | Los resultados cambiaron sin necesidad de recargar completamente la pagina. | Correcta |
| 7 | Revisar respuesta JSON | El archivo listar_citas.php devolvio una respuesta JSON con los campos ok, mensaje, total y citas. | Correcta |
| 8 | Enviar una busqueda demasiado larga | PHP rechazo la solicitud y devolvio un codigo HTTP 400. | Correcta |
| 9 | Consultar sin iniciar sesion | El endpoint rechazo la solicitud y devolvio un codigo HTTP 401. | Correcta |
| 10 | Buscar como administrador | Se mostraron las citas con las opciones de editar y eliminar. | Correcta |
| 11 | Buscar como usuario de consulta | Se mostraron los registros con el mensaje Solo lectura. | Correcta |
| 12 | Intentar modificar como consulta | El servidor rechazo la operacion porque el usuario no tenia permisos de administrador. | Correcta |
| 13 | Provocar un error de comunicacion | JavaScript mostro un mensaje indicando que no fue posible consultar las citas. | Correcta |
| 14 | Comprobar el CRUD tradicional | Las operaciones de registrar, editar y eliminar continuaron funcionando. | Correcta |
| 15 | Cerrar sesion | El sistema impidio acceder a las paginas privadas sin iniciar sesion nuevamente. | Correcta |

 Resultados obtenidos

La implementacion de Fetch API permitio realizar busquedas de citas de manera asincrona.

Al escribir el nombre de un cliente o el servicio solicitado, JavaScript envio una peticion al servidor y recibio los resultados en formato JSON.

Posteriormente, la tabla HTML se actualizo mostrando las citas encontradas, sin necesidad de recargar toda la pagina.

Tambien se mantuvo la diferencia entre los roles de administrador y consulta. El administrador pudo visualizar las opciones de editar y eliminar, mientras que el usuario de consulta solamente pudo revisar la informacion.

 Errores encontrados

Durante la implementacion se identificaron algunos detalles que era necesario corregir.

**1. La tabla no estaba preparada para actualizarse dinamicamente.**

Inicialmente, los registros se mostraban directamente desde PHP y no existian identificadores para que JavaScript pudiera localizar facilmente el cuerpo de la tabla.

**2. Los botones de editar y eliminar no aparecian despues de realizar una busqueda.**

En la primera version de la busqueda, JavaScript reemplazaba las filas de la tabla, pero no reconstruia las acciones correspondientes al administrador.

**3. No se mostraba correctamente el mensaje cuando no habia resultados.**

Era necesario controlar el caso en el que la consulta devolviera un arreglo vacio.

**4. Era necesario controlar los errores de comunicacion.**

Si el servidor no respondia correctamente, la aplicacion necesitaba mostrar un mensaje comprensible al usuario.

 Soluciones aplicadas

Para solucionar estos problemas se realizaron las siguientes modificaciones:

- Se agregaron identificadores HTML a la tabla y al cuerpo de los registros.
- Se utilizo replaceChildren para reemplazar las filas anteriores por los nuevos resultados.
- Se implemento textContent para mostrar los datos de manera segura.
- Se agrego una funcion para generar los botones de editar y eliminar cuando el usuario es administrador.
- Se conservo el token CSRF dentro de los formularios de eliminacion.
- Se agrego un mensaje para indicar cuando no existen citas coincidentes.
- Se utilizo try/catch para controlar los errores de las solicitudes Fetch.
- Se verifico el codigo HTTP de la respuesta antes de procesar el JSON.

 Conclusion

Las pruebas permitieron comprobar el funcionamiento de la busqueda mediante Fetch API y la comunicacion entre JavaScript, PHP y MySQL.

Esta funcionalidad mejoro la interaccion con el sistema porque permite consultar informacion sin recargar completamente la pagina.

Ademas, se conservaron las medidas de seguridad implementadas anteriormente, incluyendo la autenticacion, los permisos de usuario y las consultas preparadas.