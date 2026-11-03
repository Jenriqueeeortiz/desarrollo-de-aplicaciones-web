 Semana 11 - Pruebas de Arquitectura MVC

 Objetivo

El objetivo de estas pruebas fue verificar que la reorganizacion del modulo de consulta y busqueda de citas mediante la arquitectura MVC funcionara correctamente.

Tambien se busco comprobar que la separacion entre modelo, vista y controlador no afectara las funcionalidades que ya tenia el sistema, incluyendo el CRUD, Fetch API, el inicio de sesion y los permisos de usuario.

 Pruebas realizadas

| No. | Prueba | Resultado obtenido | Estado |
|---|---|---|---|
| 1 | Abrir el sistema | La pagina principal cargo correctamente despues de reorganizar los archivos. | Correcta |
| 2 | Iniciar sesion | El sistema permitio ingresar con las cuentas de administrador y consulta. | Correcta |
| 3 | Consultar citas | El modelo Cita.php obtuvo los registros de la base de datos. | Correcta |
| 4 | Revisar el controlador | CitaController.php recibio la busqueda y coordino la consulta con el modelo. | Correcta |
| 5 | Revisar la vista | La vista tabla.php mostro los registros correctamente en una tabla HTML. | Correcta |
| 6 | Buscar mediante Fetch API | Los resultados se actualizaron sin recargar completamente la pagina. | Correcta |
| 7 | Revisar el endpoint | listar_citas.php devolvio una respuesta JSON valida utilizando el controlador. | Correcta |
| 8 | Buscar un dato inexistente | Se mostro un mensaje indicando que no se encontraron citas. | Correcta |
| 9 | Buscar un texto demasiado largo | El controlador rechazo la busqueda y el endpoint devolvio un error HTTP 400. | Correcta |
| 10 | Registrar una cita | El sistema permitio registrar una nueva cita en MySQL. | Correcta |
| 11 | Editar una cita | Se pudo modificar la informacion de una cita existente. | Correcta |
| 12 | Eliminar una cita | El sistema elimino correctamente el registro seleccionado. | Correcta |
| 13 | Acceder como consulta | El usuario pudo visualizar las citas sin opciones para modificarlas. | Correcta |
| 14 | Intentar editar como consulta | El servidor rechazo la solicitud por falta de permisos. | Correcta |
| 15 | Cerrar sesion | Se finalizo la sesion y se impidio acceder a las paginas privadas. | Correcta |

 Resultados obtenidos

La reorganizacion del modulo de citas permitio separar las responsabilidades del sistema en tres componentes principales.

El modelo Cita.php se encargo de realizar las consultas a MySQL.

El controlador CitaController.php recibio los parametros de busqueda, valido la informacion y solicito los registros al modelo.

La vista tabla.php se encargo de presentar los resultados utilizando HTML y PHP.

Tambien se comprobo la integracion con Fetch API, ya que el endpoint utilizo el mismo controlador para obtener los registros y devolverlos en formato JSON.

Las operaciones de registrar, editar y eliminar continuaron funcionando mediante los archivos PHP existentes.

 Errores encontrados

Durante la reorganizacion se identificaron algunos problemas relacionados con la estructura anterior del proyecto.

**1. La consulta SQL estaba repetida en diferentes archivos.**

Antes de implementar MVC, tanto index.php como el endpoint de Fetch API realizaban consultas directamente a MySQL.

**2. El archivo index.php mezclaba diferentes responsabilidades.**

El mismo archivo obtenia los datos de la base de datos y generaba el HTML para mostrarlos.

**3. Era necesario adaptar las rutas de los archivos.**

Al crear las carpetas app/models, app/controllers y app/views, fue necesario utilizar rutas correctas para incluir los archivos PHP.

**4. Era necesario conservar la compatibilidad con Fetch API.**

El endpoint debia continuar devolviendo los mismos campos JSON para evitar modificar el funcionamiento del buscador.

 Soluciones aplicadas

Para solucionar estos problemas se realizaron las siguientes modificaciones:

- Se creo el archivo app/models/Cita.php para concentrar la consulta de registros.
- Se creo app/controllers/CitaController.php para validar la busqueda y coordinar el acceso a los datos.
- Se creo app/views/citas/tabla.php para separar la presentacion HTML.
- Se modifico index.php para utilizar el controlador y cargar la vista.
- Se actualizo api/listar_citas.php para utilizar el mismo modelo y controlador.
- Se utilizaron rutas con __DIR__ para localizar correctamente los archivos PHP.
- Se conservo la estructura JSON que utiliza fetch_citas.js.
- Se mantuvieron las validaciones, las sesiones y los permisos de las semanas anteriores.
- Se conservaron los formularios de eliminacion con sus respectivos tokens CSRF.

 Comparacion antes y despues de MVC

| Aspecto | Antes de MVC | Despues de MVC |
|---|---|---|
| Consultas SQL | Se realizaban en diferentes archivos PHP. | Se concentran en el modelo Cita.php. |
| Procesamiento | Se mezclaba con la presentacion. | El controlador coordina la consulta. |
| Presentacion HTML | Estaba integrada directamente en index.php. | Se separo en la vista tabla.php. |
| Fetch API | Consultaba un endpoint con SQL propio. | Utiliza el controlador y el modelo. |
| Mantenimiento | Era necesario modificar varios archivos. | Las responsabilidades estan mejor organizadas. |
| Seguridad | Se aplicaban sesiones y permisos. | Se conservaron las mismas medidas de seguridad. |

 Conclusion

Las pruebas permitieron evaluar la reorganizacion del modulo de citas utilizando una arquitectura inspirada en MVC.

Esta estructura facilito separar el acceso a los datos, el procesamiento de solicitudes y la presentacion de la informacion.

Tambien permitio reutilizar el modelo y el controlador tanto para mostrar la tabla inicial como para realizar busquedas mediante Fetch API.

Finalmente, se conservaron las funciones principales del sistema, incluyendo el CRUD, el inicio de sesion, los roles y las medidas de seguridad implementadas anteriormente.