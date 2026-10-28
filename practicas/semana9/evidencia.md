  Semana9 Roles y permisos

 Objetivo

El objetivo de esta practica fue implementar roles y permisos en el sistema web de citas para un salon de belleza, utilizando PHP, sesiones y MySQL.

 Aplicacion desarrollada

Se continuo trabajando con el proyecto de las semanas anteriores.

La aplicacion permite gestionar citas para los siguientes servicios:

- Corte de cabello
- Keratina
- Tinte
- Peinado
- Maquillaje

Durante esta semana se implementaron dos tipos de usuarios para controlar el acceso a las funciones del sistema.

 Desarrollo de la practica

 1. Preparacion del proyecto

Se creo la carpeta `semana9` y se utilizaron como base los archivos de la Semana 08, conservando las medidas de seguridad implementadas anteriormente.

 2. Modificacion de la base de datos

Se agrego la columna `rol` a la tabla `usuarios` de MySQL.

Esta columna permite distinguir entre los usuarios administradores y los usuarios de consulta.

 3. Creacion de usuarios

Se utilizaron dos cuentas para realizar las pruebas.

El usuario `admin` tiene permisos de administrador y el usuario `consulta` tiene acceso de solo lectura.

 4. Modificacion del inicio de sesion

Se modifico el archivo `login.php` para consultar el rol del usuario al iniciar sesion.

El rol se guarda en `$_SESSION["rol"]` y se utiliza para controlar el acceso a las diferentes funciones.

 5. Implementacion de autorizacion

Se creo el archivo `autorizacion.php` con funciones para comprobar si el usuario tiene permisos de administrador.

Cuando un usuario sin permisos intenta acceder a una operacion restringida, el sistema responde con el codigo HTTP 403.

 6. Modificacion de la interfaz

Se modificaron los archivos `index.php` y `panel.php`.

El administrador puede visualizar el formulario de registro y los botones para editar y eliminar citas.

El usuario de consulta solamente puede visualizar los registros existentes.

 7. Proteccion de operaciones

Se agregaron comprobaciones de permisos en los archivos encargados de registrar, editar, actualizar y eliminar citas.

De esta manera, los permisos se verifican desde el servidor y no dependen solamente de los elementos visibles en la pagina.

 Pruebas realizadas

Se realizaron pruebas iniciando sesion con ambos usuarios.

Con el administrador se comprobaron las operaciones de registro, consulta, edicion y eliminacion.

Con el usuario de consulta se comprobo que solamente puede visualizar las citas y que el sistema rechaza las operaciones no autorizadas.

Tambien se probaron accesos directos a archivos PHP y solicitudes POST para verificar el control de permisos.

 Problemas y soluciones

Uno de los aspectos importantes fue comprender que ocultar botones no garantiza la seguridad del sistema.

Para solucionarlo, se implementaron verificaciones de permisos en los archivos PHP que realizan las operaciones.

Tambien fue necesario modificar el inicio de sesion para almacenar el rol de cada usuario.

 Reflexion personal

Durante esta practica aprendi como funcionan los roles y permisos en una aplicacion web.

Comprendi la importancia de controlar el acceso desde el servidor y de permitir que cada usuario realice solamente las acciones correspondientes a su rol.

Tambien pude relacionar los conocimientos de sesiones, bases de datos y seguridad trabajados en las semanas anteriores.

 Conclusion

Se implemento correctamente un sistema de roles y permisos para el proyecto del salon de belleza.

El administrador tiene acceso a las operaciones CRUD y el usuario de consulta puede visualizar los registros sin modificarlos.

Con esta practica se mejoro la organizacion y seguridad del sistema.