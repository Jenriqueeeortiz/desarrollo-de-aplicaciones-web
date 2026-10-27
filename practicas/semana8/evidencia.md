 semana8  desarrollo de aplicaciones web

 objetivo

fortalecer la seguridad del sistema de citas para salon de belleza mediante validaciones del lado del servidor, consultas preparadas, proteccion de contraseñas, escape de datos html, proteccion csrf y manejo de informacion sensible.

 funcionalidad implementada

se continuo trabajando sobre el sistema de citas desarrollado durante las semanas anteriores.

se revisaron las operaciones del crud para comprobar que los datos recibidos fueran validados desde php.

se reforzaron las validaciones del nombre, telefono, correo electronico, servicio y fecha de la cita.

se revisaron las consultas sql para evitar incorporar directamente valores externos.

se agregaron tokens csrf a los formularios de registro, edicion y eliminacion.

se separaron las credenciales de conexion a mysql de los archivos que se publicaran en el repositorio.

 archivos modificados o creados

index.php

se mejoraron las validaciones html, el escape de datos y los formularios con tokens csrf.

procesar.php

se reforzaron las validaciones del servidor y se agrego la comprobacion del token csrf.

editar.php

se reviso la validacion del identificador y se agrego el token csrf al formulario de edicion.

actualizar.php

se agrego la verificacion del token csrf y el manejo de errores durante la actualizacion.

eliminar.php

se agrego la verificacion del token csrf y el manejo de errores durante la eliminacion.

conexion.php

se modifico para cargar las credenciales desde una configuracion local.

config.local.php

se creo para almacenar la configuracion de conexion en el entorno local sin publicarla.

.gitignore

se creo en la carpeta principal del repositorio para excluir archivos de configuracion sensible.

auditoria.md

contiene el inventario de seguridad del proyecto.

pruebas_seguridad.md

contiene las pruebas realizadas y las comprobaciones pendientes.

 tablas de la base de datos utilizadas

se utilizo la base de datos salon_belleza.

tabla citas

almacena los datos de las citas registradas.

tabla usuarios

almacena los usuarios del sistema y los hashes de sus contraseñas.

 validaciones implementadas

se comprobo que el nombre tuviera una longitud permitida.

se valido que el telefono contuviera exactamente 10 numeros.

se comprobo el formato del correo electronico.

se restringio el servicio a las opciones disponibles.

se verifico que la fecha fuera valida y posterior al dia actual.

se validaron los identificadores antes de consultar o modificar registros.

 consultas preparadas

se utilizaron consultas preparadas con mysqli para las operaciones que reciben datos externos.

esto evita que los valores proporcionados por el usuario se interpreten como parte de las instrucciones sql.

 proteccion de contraseñas

se conservo el sistema de autenticacion implementado en la semana 07.

las contraseñas se almacenan mediante hashes y se verifican con password_verify.

 escape de datos html

se utilizo htmlspecialchars para mostrar los datos dinamicos de las citas como texto dentro de la pagina.

 proteccion csrf

se implementaron tokens csrf asociados a la sesion del usuario.

estos tokens se envian mediante campos ocultos y se comprueban en los archivos que procesan las operaciones.

 manejo de errores

se agregaron mensajes generales para determinados errores de operaciones con mysql.

los detalles tecnicos se registran mediante error_log en lugar de mostrarse directamente al usuario.

 pruebas realizadas

se comprobo el registro, edicion y eliminacion de citas.

se probaron identificadores invalidos e inexistentes.

se verifico que las paginas privadas exigieran iniciar sesion.

se comprobo que las operaciones principales continuaran funcionando despues de las modificaciones.

 resultado de cada prueba

las operaciones principales del crud funcionaron correctamente.

los identificadores invalidos e inexistentes fueron rechazados.

el acceso a las paginas protegidas sin sesion fue restringido.

las comprobaciones adicionales pendientes se encuentran documentadas en pruebas_seguridad.md.

 errores encontrados

durante la revision se detecto que las credenciales de mysql estaban escritas directamente en conexion.php.

tambien se identifico que los formularios no contaban inicialmente con proteccion csrf.

en el listado se encontro una columna de fecha duplicada.

 soluciones aplicadas

se creo una configuracion local para la conexion a mysql.

se agregaron tokens csrf a los formularios y comprobaciones en los archivos de procesamiento.

se elimino la columna duplicada y se mejoro el escape de los datos mostrados.

 evidencias

captura del formulario de registro.

captura del listado de citas.

captura de la edicion de una cita.

captura de la eliminacion de una cita de demostracion.

captura del rechazo de un identificador invalido.

captura del rechazo de un identificador inexistente.

captura del acceso restringido sin sesion.

captura del codigo de consultas preparadas.

 reflexion final

en esta practica aprendi que una aplicacion web no solamente debe funcionar correctamente, sino tambien proteger la informacion y validar los datos recibidos.

comprendi la importancia de utilizar consultas preparadas, contraseñas protegidas, sesiones y tokens csrf.

tambien aprendi que las validaciones del navegador no sustituyen las comprobaciones realizadas desde php.

estas mejoras permiten que el sistema de citas cuente con medidas basicas de seguridad antes de implementar los roles y permisos de la siguiente practica.