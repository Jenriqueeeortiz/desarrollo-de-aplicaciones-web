 Pruebas de regresión — Semana 14

 1. Objetivo

Comprobar que las funciones que ya estaban implementadas en el sistema continúen trabajando correctamente después de realizar las integraciones y modificaciones de las prácticas anteriores.

 2. Pruebas realizadas

| ID | Funcionalidad revisada | Resultado obtenido | Estado |
|---|---|---|---|
| PR-01 | Inicio de sesión | El acceso funciona correctamente | Realizada |
| PR-02 | Cierre de sesión | La sesión termina correctamente | Realizada |
| PR-03 | Control de roles | Se respetan los permisos de administrador y consulta | Realizada |
| PR-04 | Registro de citas | Las citas se guardan correctamente | Realizada |
| PR-05 | Consulta de citas | La información se muestra correctamente | Realizada |
| PR-06 | Edición de citas | Se pueden actualizar los registros | Realizada |
| PR-07 | Eliminación de citas | Se pueden eliminar registros como administrador | Realizada |
| PR-08 | Búsqueda con Fetch API | La búsqueda continúa funcionando | Realizada |
| PR-09 | Filtro por servicio | Los resultados corresponden al servicio seleccionado | Realizada |
| PR-10 | Filtro por fechas | Se muestran las citas del rango seleccionado | Realizada |
| PR-11 | Validaciones y CSRF | Se mantienen las protecciones del sistema | Realizada |
| PR-12 | Plantilla y vistas | Las páginas conservan su estructura y presentación | Realizada |

 3. Resultado general

Las pruebas de regresión se completaron satisfactoriamente. Las funcionalidades que ya estaban implementadas continuaron trabajando correctamente después de integrar los nuevos filtros.

No se detectaron errores que afectaran las funciones principales del sistema.

 4. Conclusión

Con estas pruebas comprobé que las modificaciones realizadas no afectaron el funcionamiento de las características anteriores. Esto permite mantener la estabilidad del sistema y continuar con la preparación de la entrega final.