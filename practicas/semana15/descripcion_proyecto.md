 Descripción del proyecto — Sistema de citas para un salón de belleza

 1. Nombre del proyecto

Sistema de gestión de citas para un salón de belleza.

 2. Problema que resuelve

El proyecto surge de la necesidad de organizar y administrar las citas de un salón de belleza. Cuando la información se lleva manualmente, puede resultar complicado consultar los registros, actualizar los datos o mantener un control adecuado de los servicios solicitados.

Por eso desarrollé una aplicación web que permite administrar las citas desde un solo lugar.

 3. Objetivo general

Desarrollar una aplicación web que permita registrar, consultar, editar y eliminar citas de un salón de belleza, utilizando diferentes tecnologías para facilitar la administración de la información y mantener un control de acceso para los usuarios.

 4. Usuarios del sistema

El sistema cuenta con dos tipos de usuarios:

- **Administrador:** puede registrar, consultar, editar y eliminar citas.
- **Usuario de consulta:** puede visualizar las citas, pero no modificarlas.

 5. Información que administra

Cada cita contiene los siguientes datos:

- Nombre del cliente.
- Número de teléfono.
- Correo electrónico.
- Servicio solicitado.
- Fecha de la cita.

Los servicios disponibles son corte de cabello, keratina, tinte, peinado y maquillaje.

 6. Funciones principales

- Inicio y cierre de sesión.
- Control de acceso mediante roles.
- Registro de nuevas citas.
- Consulta de citas registradas.
- Edición de información.
- Eliminación de citas.
- Búsqueda de citas por nombre o servicio.
- Filtros por tipo de servicio y rango de fechas.
- Validación de información.
- Protección de formularios y consultas a la base de datos.

 7. Tecnologías utilizadas

| Tecnología | Uso dentro del proyecto |
|---|---|
| HTML | Estructura de las páginas |
| CSS | Diseño y presentación |
| JavaScript | Interacciones del usuario |
| PHP | Procesamiento de información y lógica del sistema |
| MySQL | Almacenamiento de datos |
| Fetch API | Consultas dinámicas sin recargar la página |

 8. Organización del proyecto

Se utilizó el patrón MVC para separar las responsabilidades de la aplicación:

- **Modelo:** administra las consultas y la comunicación con la base de datos.
- **Controlador:** recibe las solicitudes, valida los datos y coordina las operaciones.
- **Vista:** presenta la información al usuario.

También se desarrollaron plantillas y componentes reutilizables para mantener una estructura uniforme entre las páginas.

 9. Característica avanzada

Una de las funciones agregadas es el filtrado de citas por servicio y rango de fechas. Esta característica facilita localizar registros específicos y complementa la búsqueda por nombre o servicio.

 10. Conclusión

Durante el desarrollo del proyecto integré diferentes tecnologías y aprendí a utilizarlas para construir una aplicación web completa. El sistema permite administrar las citas del salón de belleza, controlar los permisos de los usuarios y consultar la información de una manera más organizada.