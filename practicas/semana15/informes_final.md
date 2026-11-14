 Informe final del proyecto

 1. Nombre del proyecto

**Sistema de citas para un salón de belleza.**

 2. Problema que resuelve

El proyecto busca solucionar la dificultad de administrar las citas de un salón de belleza de manera organizada. Cuando las citas se registran manualmente, pueden presentarse problemas como pérdida de información, confusión en los horarios y dificultad para consultar los servicios solicitados.

Con esta aplicación se pueden registrar, consultar, modificar y eliminar citas desde una plataforma web.

 3. Objetivo general

Desarrollar una aplicación web que permita administrar las citas de un salón de belleza mediante una interfaz sencilla, facilitando el registro de clientes, la consulta de información y la organización de los servicios.

 4. Usuarios y funciones principales

El sistema cuenta con dos tipos de usuarios:

- **Administrador:** puede iniciar sesión, consultar, registrar, editar y eliminar citas.
- **Usuario de consulta:** puede iniciar sesión y consultar las citas, pero no puede modificarlas ni eliminarlas.

Las funciones principales son:

- Inicio y cierre de sesión.
- Registro de citas.
- Consulta de citas.
- Edición y eliminación de citas.
- Búsqueda de citas por nombre o servicio.
- Filtros por tipo de servicio y fechas.
- Control de permisos según el rol del usuario.

 5. Tecnologías utilizadas

Para desarrollar el proyecto utilicé las siguientes tecnologías:

- **HTML:** para estructurar las páginas.
- **CSS:** para diseñar la interfaz y adaptar su presentación.
- **JavaScript:** para las interacciones de la página.
- **PHP:** para procesar la información y controlar la lógica del sistema.
- **MySQL:** para almacenar los usuarios y las citas.
- **Fetch API:** para realizar consultas al servidor sin recargar toda la página.
- **Git y GitHub:** para llevar el control de versiones y guardar los avances del proyecto.

 6. Estructura de la aplicación

Durante el desarrollo organicé el proyecto utilizando el patrón Modelo-Vista-Controlador (MVC).

La estructura principal incluye:

- `app/models/`: contiene el modelo encargado de consultar y trabajar con los datos de las citas.
- `app/controllers/`: contiene los controladores que procesan las solicitudes y conectan el modelo con las vistas.
- `app/views/`: contiene las vistas que muestran la información.
- `app/views/layouts/`: contiene los elementos reutilizables de la interfaz, como encabezado, menú, mensajes, pie de página y plantilla.
- `api/`: contiene los archivos encargados de proporcionar información en formato JSON.
- Archivos PHP principales: gestionan el inicio de sesión, las citas y las operaciones del sistema.
- Archivos CSS y JavaScript: controlan el diseño y las interacciones de la aplicación.

Esta organización permite mantener el código más ordenado y facilita su mantenimiento.

 7. Diseño de la base de datos

Utilicé MySQL para almacenar la información del sistema. La base de datos se llama `salon_belleza` y cuenta principalmente con dos tablas.

**Tabla `citas`:**

- `id`: identificador de la cita.
- `nombre`: nombre del cliente.
- `telefono`: teléfono del cliente.
- `email`: correo electrónico.
- `servicio`: servicio solicitado.
- `fecha`: fecha de la cita.

**Tabla `usuarios`:**

- `id`: identificador del usuario.
- `nombre`: nombre del usuario.
- `usuario`: nombre de acceso.
- `correo`: correo electrónico.
- `password_hash`: contraseña almacenada mediante un hash.
- `activo`: indica si la cuenta está activa.
- `creado_en`: fecha de creación.
- `rol`: tipo de usuario dentro del sistema.

 8. Autenticación, roles y seguridad

Implementé un sistema de inicio de sesión para controlar el acceso a la aplicación.

También incorporé medidas de seguridad como:

- Verificación de contraseñas mediante `password_verify()`.
- Almacenamiento de contraseñas con hash.
- Uso de sesiones para mantener autenticados a los usuarios.
- Regeneración del identificador de sesión al iniciar sesión.
- Protección de páginas privadas.
- Control de permisos según el rol.
- Uso de tokens CSRF para proteger operaciones que modifican información.
- Consultas preparadas para interactuar con la base de datos.
- Validación de datos y escape de contenido HTML.

Estas medidas ayudan a proteger la información y evitar accesos u operaciones no autorizadas.

 9. Implementación de Fetch API

Implementé Fetch API para realizar búsquedas de citas sin tener que recargar toda la página.

JavaScript envía los parámetros de búsqueda al archivo `api/listar_citas.php`, que procesa la solicitud y obtiene la información de MySQL.

El servidor devuelve los resultados en formato JSON y JavaScript actualiza el contenido de la tabla.

Esto permite que las búsquedas sean más dinámicas y mejora la experiencia de uso.

 10. Organización MVC y componentes

Organicé parte de la aplicación utilizando MVC:

- **Modelo:** se encarga de consultar los datos de las citas en MySQL.
- **Controlador:** recibe las solicitudes, valida los datos y utiliza el modelo.
- **Vista:** muestra la información al usuario.

También desarrollé componentes reutilizables para mantener una estructura visual consistente, como el encabezado, menú, mensajes, pie de página y plantilla general.

Esto evita repetir código y facilita realizar cambios en diferentes páginas.

 11. Función avanzada implementada

La función avanzada que desarrollé fue la búsqueda de citas mediante filtros.

El usuario puede filtrar las citas utilizando:

- Nombre del cliente o servicio mediante el buscador.
- Tipo de servicio.
- Fecha inicial.
- Fecha final.

Los filtros se procesan mediante Fetch API y el servidor consulta la información utilizando consultas preparadas.

Esta función permite localizar citas de manera más rápida y organizada.

 12. Pruebas realizadas y resultados

Durante las semanas de desarrollo realicé pruebas para verificar el funcionamiento de los diferentes módulos.

Entre las pruebas realizadas se encuentran:

- Inicio de sesión con credenciales válidas e inválidas.
- Acceso según el rol del usuario.
- Registro de citas.
- Consulta de citas.
- Edición y eliminación de citas.
- Búsqueda mediante Fetch API.
- Aplicación de filtros por servicio y fecha.
- Validación de formularios.
- Protección de operaciones mediante CSRF.
- Cierre de sesión.
- Pruebas de integración y regresión.

Los resultados quedaron documentados en los archivos de pruebas de las semanas anteriores. Los casos registrados como correctos corresponden a las verificaciones realizadas durante el desarrollo.

 13. Errores encontrados y soluciones

Durante el desarrollo fue necesario corregir y ajustar diferentes partes de la aplicación.

Algunos de los aspectos que trabajé fueron:

- Ajustes en la conexión entre PHP y MySQL.
- Correcciones en el procesamiento de formularios.
- Validación de los datos recibidos.
- Correcciones en las consultas a la base de datos.
- Integración de Fetch API con el servidor.
- Organización del código mediante MVC.
- Ajustes en la plantilla y los componentes reutilizables.
- Validación de permisos para los diferentes roles.

Estos ajustes permitieron mejorar la organización y el funcionamiento del sistema.


 15. Limitaciones conocidas

El sistema está diseñado para administrar las citas de un salón de belleza, por lo que tiene algunas limitaciones:

- No cuenta con un sistema de notificaciones automáticas.
- No incluye pagos en línea.
- No cuenta con una aplicación móvil independiente.
- No tiene integración con calendarios externos.
- Su funcionamiento depende de que el servidor y la base de datos estén disponibles.

 16. Mejoras futuras

En futuras versiones me gustaría implementar:

- Notificaciones automáticas para recordar las citas.
- Calendario visual para consultar la disponibilidad.
- Gestión de horarios de los empleados.
- Confirmación de citas por correo electrónico.
- Reportes de citas y servicios.
- Diseño adaptable para dispositivos móviles.
- Implementación de una opción para cancelar citas desde el usuario de consulta, si se establece ese permiso.

 17. Conclusión personal

Con el desarrollo de este proyecto pude aplicar los conocimientos que adquirí durante la materia de Desarrollo de Aplicaciones Web.

Aprendí a trabajar con HTML, CSS, JavaScript, PHP y MySQL, además de implementar operaciones CRUD, autenticación, roles de usuario, seguridad, Fetch API y el patrón MVC.

También comprendí la importancia de organizar el código, validar la información y realizar pruebas para comprobar el funcionamiento de una aplicación.

Considero que el proyecto me permitió mejorar mis habilidades de programación y conocer mejor el proceso de desarrollo de una aplicación web desde su planeación hasta su integración final.