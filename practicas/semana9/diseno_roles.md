Semana9 diseño de roles y permisos

 Objetivo

El objetivo de esta practica fue implementar un sistema de roles y permisos en la aplicacion web del salon de belleza, para controlar las acciones que puede realizar cada usuario dependiendo de su tipo de cuenta.

 Descripcion del sistema

Se continuo trabajando con el sistema de citas del salon de belleza desarrollado en las semanas anteriores.

El sistema permite registrar, consultar, editar y eliminar citas, ademas de contar con un inicio de sesion para controlar el acceso.

En esta semana se agregaron dos roles: administrador y consulta.

 Roles implementados

Administrador

Este usuario tiene acceso a todas las operaciones del sistema. Puede registrar nuevas citas, consultar las existentes, modificar su informacion y eliminarlas.

Consulta

Este usuario solamente puede visualizar las citas registradas. No tiene permisos para agregar, editar o eliminar informacion.

 Matriz de permisos

| Operacion | Administrador | Consulta |
|---|---|---|
| Iniciar sesion | Permitido | Permitido |
| Consultar citas | Permitido | Permitido |
| Registrar citas | Permitido | Denegado |
| Editar citas | Permitido | Denegado |
| Eliminar citas | Permitido | Denegado |
| Cerrar sesion | Permitido | Permitido |

 Cambios en la base de datos

Se agrego la columna `rol` a la tabla `usuarios` de la base de datos `salon_belleza`.

Esta columna permite identificar los permisos de cada usuario.

Se utilizaron dos cuentas de prueba:

- `admin`, con rol administrador.
- `consulta`, con rol consulta.

Las contraseñas se almacenan utilizando `password_hash()` y se verifican mediante `password_verify()`.

 Archivos modificados

login.php: se modifico la consulta SQL para obtener el rol del usuario y guardarlo en la sesion.

autorizacion.php: se creo para comprobar los permisos de los usuarios y bloquear operaciones no autorizadas.

index.php: se adapto para mostrar el formulario y los botones de edicion y eliminacion solamente al administrador.

panel.php: se modifico para mostrar el nombre, el rol y las opciones correspondientes a cada usuario.

procesar.php, editar.php, actualizar.php y eliminar.php: se protegieron para permitir las operaciones solamente al administrador.

 Seguridad

La verificacion de permisos se realiza desde el servidor utilizando PHP.

Esto es importante porque ocultar botones no es suficiente para impedir que un usuario intente acceder directamente a los archivos.

Cuando un usuario sin permisos intenta realizar una operacion administrativa, el sistema responde con el codigo HTTP 403, que significa acceso denegado.

Tambien se conservaron las medidas de seguridad de la semana anterior, como las sesiones, los tokens CSRF, las consultas preparadas y la validacion de datos.

 Conclusion

Con esta practica aprendi a implementar roles y permisos en una aplicacion web utilizando PHP y MySQL.

Comprendi que cada usuario debe tener acceso solamente a las funciones que necesita y que los permisos deben comprobarse desde el servidor para evitar modificaciones no autorizadas.