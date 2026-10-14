semana7 - pruebas de login y sesiones

proyecto

sistema de citas para salon de belleza

base de datos

salon_belleza

tablas utilizadas

usuarios

citas

pruebas realizadas

prueba 1 - inicio de sesion correcto

se ingreso al sistema utilizando el usuario administrador y la contraseña de prueba.

resultado: el sistema valido las credenciales y permitio acceder al panel de administracion.

prueba 2 - contraseña incorrecta

se intento iniciar sesion utilizando una contraseña incorrecta.

resultado: el sistema rechazo el acceso y mostro un mensaje de error.

prueba 3 - acceso directo sin sesion

se intento acceder directamente a panel.php e index.php sin iniciar sesion.

resultado: el sistema redirigio automaticamente al formulario de login.

prueba 4 - navegacion con sesion activa

se inicio sesion correctamente y se ingreso al modulo de administracion de citas.

resultado: el sistema permitio consultar y administrar los registros.

prueba 5 - cierre de sesion

se utilizo la opcion cerrar sesion desde el panel de administracion.

resultado: la sesion finalizo correctamente y el sistema regreso al formulario de acceso.

prueba 6 - acceso despues de cerrar sesion

se intento ingresar nuevamente a panel.php despues de cerrar sesion.

resultado: el sistema rechazo el acceso y solicito iniciar sesion.

prueba 7 - usuario inactivo

se modifico temporalmente el campo activo del usuario administrador a 0.

resultado: el sistema impidio iniciar sesion con ese usuario.

posteriormente se restauro el valor a 1.

prueba 8 - contraseña almacenada

se consulto la tabla usuarios desde mysql para comprobar el almacenamiento de la contraseña.

resultado: se observo que la contraseña estaba almacenada como un hash y no como texto plano.

prueba 9 - funcionamiento del crud

se inicio sesion y se comprobaron las operaciones de registro, consulta, edicion y eliminacion de citas.

resultado: el crud continuo funcionando correctamente despues de integrar la autenticacion.

conclusion

las pruebas permitieron comprobar que el sistema valida las credenciales desde php, mantiene las sesiones y protege las paginas internas.
tambien se verifico que el cierre de sesion impide volver a ingresar a las paginas protegidas sin autenticarse nuevamente.