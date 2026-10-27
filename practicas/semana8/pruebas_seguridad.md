 semana8  pruebas de seguridad

 proyecto

sistema de citas para salon de belleza

 objetivo

comprobar las medidas basicas de seguridad implementadas en la aplicacion web utilizando php y mysql.

 pruebas realizadas

 prueba 1 - registro correcto

resultado: correcta

se registro una cita de demostracion utilizando datos validos y se comprobo que apareciera en el listado.

 prueba 2 - validacion de campos

resultado: correcta

se verifico que el servidor rechazara los datos que no cumplen las reglas de validacion.

 prueba 3 - identificador invalido

resultado: correcta

se intento editar una cita utilizando un identificador con letras.

el sistema rechazo el identificador y mostro un mensaje de error.

 prueba 4 - identificador inexistente

resultado: correcta

se intento editar una cita utilizando un identificador que no existia en la base de datos.

el sistema mostro un mensaje indicando que la cita no existe.

 prueba 5 - consultas preparadas

resultado: correcta

se revisaron las consultas utilizadas para registrar, editar, actualizar y eliminar citas.

las operaciones que reciben valores externos utilizan parametros preparados.

 prueba 6 - contraseñas protegidas

resultado: correcta

se comprobo que la autenticacion utiliza password_verify y que la contraseña del usuario administrador se almacena como hash.

 prueba 7 - escape de datos html

resultado: pendiente

falta realizar una prueba especifica con caracteres especiales almacenados en un registro de demostracion.

 prueba 8 - acceso sin sesion

resultado: correcta

se intento ingresar directamente a index.php despues de cerrar sesion.

el sistema solicito iniciar sesion nuevamente.

 prueba 9 - proteccion csrf

resultado: pendiente

se agregaron tokens csrf a los formularios de registro, actualizacion y eliminacion.

falta comprobar mediante una solicitud sin token que el servidor responda con un error 403.

 prueba 10 - funcionamiento del crud

resultado: correcta

se comprobo que las operaciones de registro, edicion y eliminacion continuaran funcionando despues de las modificaciones de seguridad.

prueba 11 - manejo de errores

resultado: pendiente

falta revisar el comportamiento ante errores internos y comprobar que no se muestren detalles tecnicos sensibles.

prueba 12 - proteccion de credenciales

resultado: pendiente de revision final

se separaron las credenciales de mysql en config.local.php y se agrego el archivo al gitignore.

falta revisar que no existan credenciales reales en archivos previamente publicados o rastreados por git.

conclusion

las pruebas funcionales realizadas muestran que las validaciones, la proteccion de sesiones y las operaciones principales del crud continuan funcionando.

se identificaron algunas comprobaciones adicionales que deben completarse antes de considerar terminada la auditoria de seguridad.