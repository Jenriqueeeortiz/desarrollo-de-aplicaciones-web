 Plan de pruebas de integración — Semana 14

 1. Objetivo

Comprobar que los diferentes módulos del sistema de citas para el salón de belleza funcionen correctamente cuando trabajan en conjunto.

 2. Ambiente de pruebas

- Sistema operativo: Windows.
- Servidor local: PHP.
- Base de datos: MySQL.
- Navegador: brave.
- Proyecto: Sistema de citas para un salón de belleza.
- URL local: http://localhost:8000/practicas/semana14/

 3. Casos de prueba

| ID | Módulos involucrados | Prueba | Resultado esperado |
|---|---|---|---|
| PI-01 | Autenticación y base de datos | Iniciar sesión con credenciales correctas | El usuario accede al sistema |
| PI-02 | Autenticación y control de acceso | Iniciar sesión con credenciales incorrectas | El sistema rechaza el acceso |
| PI-03 | Roles y gestión de citas | Ingresar como administrador | Se permiten las operaciones de administración |
| PI-04 | Roles y gestión de citas | Ingresar como usuario de consulta | Solo se permite consultar información |
| PI-05 | Controlador, modelo y base de datos | Registrar una cita | La cita se guarda correctamente |
| PI-06 | Modelo y vistas | Consultar las citas registradas | Se muestran los datos correctamente |
| PI-07 | Gestión de citas y base de datos | Editar una cita | Los cambios quedan guardados |
| PI-08 | Gestión de citas y base de datos | Eliminar una cita como administrador | La cita se elimina correctamente |
| PI-09 | API y Fetch API | Buscar una cita por nombre | Se muestran los resultados correspondientes |
| PI-10 | API y filtros | Filtrar por servicio | Solo aparecen citas del servicio seleccionado |
| PI-11 | API y filtros | Filtrar por rango de fechas | Se muestran las citas dentro del rango |
| PI-12 | API y filtros | Combinar búsqueda y filtros | Los resultados cumplen todos los criterios |
| PI-13 | Formularios y protección CSRF | Enviar un formulario sin token válido | El sistema rechaza la operación |
| PI-14 | Sesiones y cierre de sesión | Cerrar sesión e intentar regresar al panel | Se solicita nuevamente iniciar sesión |

 4. Criterios de aceptación

Las pruebas se considerarán satisfactorias cuando:

- Los usuarios puedan iniciar sesión y acceder según su rol.
- Las operaciones de citas funcionen correctamente.
- La información se guarde y consulte desde MySQL.
- La búsqueda y los filtros muestren resultados correctos.
- Las solicitudes no autorizadas sean rechazadas.
- Las páginas privadas estén protegidas después de cerrar sesión.

 5. Registro de resultados

Cada prueba se realizará en el sistema y se registrará su resultado en el documento de pruebas de integración. También se agregarán capturas de pantalla como evidencia.

 6. Conclusión

Este plan permitirá revisar las conexiones entre los módulos principales del proyecto, detectar posibles errores y comprobar que el sistema funcione de manera integrada.