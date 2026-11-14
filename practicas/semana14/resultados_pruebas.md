 Resultados de las pruebas de integración — Semana 14

 1. Objetivo

Registrar los resultados obtenidos durante las pruebas de integración del sistema de citas para el salón de belleza, comprobando que los módulos trabajen correctamente en conjunto.

 2. Resultados

| ID | Prueba realizada | Resultado | Estado |
|---|---|---|---|
| PI-01 | Inicio de sesión con credenciales correctas | El sistema permitió el acceso | Correcta |
| PI-02 | Inicio de sesión con credenciales incorrectas | El sistema rechazó el acceso | Correcta |
| PI-03 | Acceso como administrador | Se habilitaron las funciones administrativas | Correcta |
| PI-04 | Acceso como usuario de consulta | Se permitió consultar sin modificar citas | Correcta |
| PI-05 | Registro de una cita | La información se guardó en MySQL | Correcta |
| PI-06 | Consulta de citas | Los registros se mostraron correctamente | Correcta |
| PI-07 | Edición de una cita | Los cambios se guardaron correctamente | Correcta |
| PI-08 | Eliminación de una cita | El registro se eliminó correctamente | Correcta |
| PI-09 | Búsqueda mediante Fetch API | Se mostraron los resultados correspondientes | Correcta |
| PI-10 | Filtro por servicio | Se mostraron las citas del servicio seleccionado | Correcta |
| PI-11 | Filtro por fechas | Se mostraron las citas dentro del rango indicado | Correcta |
| PI-12 | Combinación de búsqueda y filtros | Se aplicaron correctamente los criterios | Correcta |
| PI-13 | Protección CSRF | Se rechazaron las solicitudes con token inválido | Correcta |
| PI-14 | Cierre de sesión | Se finalizó la sesión y se protegió el panel | Correcta |

 3. Resultado general

Las pruebas de integración se completaron satisfactoriamente. Los módulos principales del sistema trabajaron correctamente en conjunto, incluyendo la autenticación, los permisos por roles, la gestión de citas, las consultas a MySQL y los filtros.

No se identificaron errores que impidieran el funcionamiento general del sistema.

 4. Conclusión

Con estas pruebas pude comprobar que las diferentes partes del sistema están integradas correctamente. También verifiqué que las funciones principales continúan trabajando y que se respetan los permisos de cada tipo de usuario.