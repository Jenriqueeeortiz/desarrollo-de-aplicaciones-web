 Inventario de módulos — Semana 14

 1. Objetivo

Identificar los módulos que forman parte del sistema de citas para el salón de belleza, describiendo sus funciones principales y las relaciones que existen entre ellos para preparar las pruebas de integración.

 2. Inventario de módulos

| Módulo | Función principal | Archivos relacionados |
|---|---|---|
| Conexión a la base de datos | Establecer conexión con MySQL | conexion.php, config.local.php |
| Autenticación | Iniciar sesión y verificar las credenciales | login.php, autorizacion.php |
| Control de acceso | Verificar los permisos de cada usuario | proteger.php, autorizacion.php |
| Gestión de citas | Registrar, consultar, editar y eliminar citas | index.php, editar.php |
| Modelo de citas | Realizar consultas a la base de datos | app/models/Cita.php |
| Controlador de citas | Validar solicitudes y comunicarse con el modelo | app/controllers/CitaController.php |
| Vistas | Mostrar la información del sistema | app/views/ |
| API de citas | Entregar las citas en formato JSON | api/listar_citas.php |
| Búsqueda y filtros | Buscar citas por texto, servicio y fechas | fetch_citas.js |
| Protección CSRF | Validar que las operaciones sean legítimas | Archivos de formularios y controladores |
| Cierre de sesión | Finalizar la sesión del usuario | logout.php |

 3. Relaciones entre módulos

Los módulos trabajan en conjunto de la siguiente manera:

1. El usuario inicia sesión mediante el módulo de autenticación.
2. El sistema verifica sus credenciales y determina su rol.
3. El control de acceso permite utilizar únicamente las funciones autorizadas.
4. El usuario puede consultar o administrar las citas dependiendo de sus permisos.
5. El controlador recibe las solicitudes y utiliza el modelo para consultar o modificar la información.
6. El modelo se comunica con la base de datos MySQL.
7. Las vistas muestran los resultados al usuario.
8. La búsqueda y los filtros utilizan Fetch API para solicitar información a la API y actualizar la tabla sin recargar la página.

 4. Módulos que requieren pruebas de integración

Se consideran importantes las siguientes relaciones:

- Inicio de sesión y control de acceso.
- Control de acceso y gestión de citas.
- Controlador, modelo y base de datos.
- API y búsqueda mediante Fetch.
- Filtros de servicio y fechas con la API.
- Formularios, validaciones y protección CSRF.
- Cierre de sesión y protección de páginas privadas.

 5. Conclusión

El sistema está formado por diferentes módulos que dependen unos de otros para funcionar correctamente. Por eso, durante esta práctica se comprobará que las conexiones entre ellos trabajen de manera adecuada y que los permisos y validaciones se mantengan en todas las operaciones.