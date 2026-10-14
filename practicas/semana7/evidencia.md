semana7 - desarrollo de aplicaciones web

objetivo

el objetivo de esta practica fue implementar un sistema de autenticacion en la aplicacion de citas para salon de belleza, utilizando php y mysql para validar usuarios, administrar sesiones y proteger las paginas internas.

funcionalidad implementada

se continuo trabajando sobre el proyecto desarrollado durante las semanas anteriores.

en esta practica se agrego un formulario de inicio de sesion que permite ingresar mediante un usuario y contraseña.

las credenciales se verifican desde php consultando la informacion almacenada en mysql.

cuando el usuario ingresa correctamente, el sistema crea una sesion y permite acceder al panel de administracion.

tambien se implemento el cierre de sesion y la proteccion de las paginas del crud.

archivos modificados o creados

login_form.php

contiene el formulario donde el usuario escribe sus credenciales.

login.php

procesa las credenciales recibidas, consulta la base de datos y verifica la contraseña mediante password_verify.

panel.php

muestra el panel principal y el nombre del usuario autenticado.

proteger.php

comprueba que exista una sesion activa antes de permitir el acceso a las paginas internas.

logout.php

permite cerrar la sesion y regresar al formulario de inicio de sesion.

index.php

se agrego la proteccion de sesion para restringir el acceso a la administracion de citas.

procesar.php

se agrego la comprobacion de sesion antes de registrar citas.

editar.php

se agrego la proteccion para impedir editar citas sin autenticacion.

actualizar.php

se agrego la proteccion antes de actualizar los registros.

eliminar.php

se agrego la proteccion antes de eliminar citas.

conexion.php

se reutilizo la conexion existente con mysql.

estilos.css

se conservaron los estilos utilizados en el proyecto.

tablas de la base de datos utilizadas

se utilizo la base de datos salon_belleza.

tabla usuarios

id

nombre

usuario

correo

password_hash

activo

creado_en

esta tabla almacena la informacion de los usuarios que pueden ingresar al sistema.

tabla citas

se continuo utilizando esta tabla para administrar las citas del salon de belleza.

seguridad de las contraseñas

para almacenar la contraseña del administrador se utilizo la funcion password_hash de php.

esta funcion genera un hash que se almacena en mysql en lugar de guardar la contraseña original.

durante el inicio de sesion se utiliza password_verify para comprobar si la contraseña ingresada corresponde al hash almacenado.

sesiones en php

se utilizo session_start para iniciar o recuperar la sesion del usuario.

cuando las credenciales son correctas, se utiliza session_regenerate_id para renovar el identificador de sesion.

posteriormente se almacenan los datos necesarios del usuario en la variable $_SESSION.

estos datos permiten identificar al usuario mientras navega por las paginas protegidas.

proteccion de paginas

se creo el archivo proteger.php para comprobar si existe una sesion activa.

este archivo se incluyo en el panel de administracion y en las paginas relacionadas con el crud.

cuando alguien intenta acceder sin iniciar sesion, el sistema lo redirige al formulario de login.

cierre de sesion

se implemento el archivo logout.php para finalizar la sesion.

al cerrar sesion se eliminan los datos almacenados y se destruye la sesion de php.

despues de cerrar sesion ya no es posible ingresar directamente al panel de administracion sin autenticarse nuevamente.

pruebas realizadas

se inicio sesion utilizando credenciales correctas.

se intento iniciar sesion con una contraseña incorrecta.

se comprobo el acceso directo a paginas protegidas.

se navego por el crud con una sesion activa.

se cerro sesion y se intento volver al panel.

se comprobo el acceso de un usuario inactivo.

se verifico que la contraseña estuviera almacenada como hash.

se comprobo que el crud continuara funcionando.

resultado de cada prueba

el sistema permitio el acceso cuando las credenciales eran correctas.

las credenciales incorrectas fueron rechazadas.

las paginas protegidas solicitaron iniciar sesion.

el cierre de sesion funciono correctamente.

los usuarios inactivos no pudieron iniciar sesion.

las operaciones del crud continuaron funcionando despues de integrar el login.

errores encontrados

durante las pruebas aparecio el error err_too_many_redirects en el navegador.

este problema impedia visualizar correctamente el formulario de inicio de sesion.

soluciones aplicadas

se revisaron los archivos login_form.php, panel.php y proteger.php para comprobar que las redirecciones fueran correctas.

posteriormente se reinicio el servidor php desde la carpeta principal del proyecto y se realizaron nuevas pruebas.

el sistema permitio acceder al formulario de login y las paginas protegidas comenzaron a funcionar correctamente.

en esta practica aprendi a implementar un sistema de autenticacion utilizando php y mysql.
comprendi la importancia de almacenar las contraseñas de manera segura, verificar las credenciales desde el servidor y utilizar sesiones para controlar el acceso a las paginas internas.
tambien aprendi a proteger las operaciones del crud para evitar que usuarios sin autenticacion puedan administrar las citas.
con esta practica el sistema de citas para salon de belleza cuenta con funciones de administracion y control de acceso, integrando los conocimientos adquiridos durante las semanas anteriores.