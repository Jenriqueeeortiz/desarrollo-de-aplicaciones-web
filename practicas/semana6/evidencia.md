semana6 - desarrollo de aplicaciones web

objetivo
el objetivo de esta practica fue implementar un crud completo en el sistema de citas para salon de belleza, permitiendo registrar, consultar, editar y eliminar informacion almacenada en mysql.

funcionalidad implementada

se continuo trabajando sobre el proyecto desarrollado en las semanas anteriores.

en esta semana se agregaron las operaciones necesarias para administrar las citas registradas.

create permite registrar nuevas citas.

read permite consultar las citas almacenadas.

update permite modificar la informacion de una cita existente.

delete permite eliminar una cita de prueba.

archivos modificados o creados

index.php

se agregaron las opciones para editar y eliminar cada cita registrada.

procesar.php

se mantuvo el procesamiento del formulario y el registro de citas.

conexion.php

se reutilizo la conexion a la base de datos.

editar.php

se creo un formulario que permite consultar y modificar los datos de una cita existente.

actualizar.php

se implemento la actualizacion de registros mediante consultas preparadas y validaciones en php.

eliminar.php

se implemento la eliminacion de citas mediante el metodo post y una consulta preparada.

estilos.css

se agregaron estilos para los botones de editar y eliminar.

script.js

se conservaron las funcionalidades de javascript utilizadas anteriormente.

tablas de la base de datos utilizadas

se utilizo la base de datos salon_belleza y la tabla citas.

la tabla contiene los siguientes campos principales.

id

nombre

telefono

email

servicio

fecha

el campo id funciona como llave primaria y permite identificar cada cita.

pruebas realizadas

se realizaron pruebas para comprobar el funcionamiento de las cuatro operaciones del crud.

se registro una nueva cita.

se consultaron los registros existentes.

se modifico la informacion de una cita.

se elimino una cita de prueba.

se probaron las validaciones del formulario.

se intento consultar un identificador inexistente.

se comprobo la confirmacion antes de eliminar.

resultado de cada prueba

las operaciones principales funcionaron correctamente.

los registros se guardaron en mysql y aparecieron en la tabla.

los cambios realizados mediante el formulario de edicion permanecieron almacenados.

las citas eliminadas dejaron de aparecer en el listado.

las validaciones permitieron detectar informacion incorrecta.

errores encontrados

durante las pruebas de actualizacion aparecio un error relacionado con la funcion mb_strlen de php.

el error ocurria porque la extension mbstring no estaba habilitada.

soluciones aplicadas

se abrio el archivo php.ini y se habilito la extension mbstring.

posteriormente se reinicio el servidor de php y se realizaron nuevamente las pruebas.

el error desaparecio y la actualizacion de citas funciono correctamente.

reflexion final

en esta practica aprendi a implementar las cuatro operaciones principales de un crud utilizando php y mysql.

tambien comprendi la importancia de identificar los registros mediante su llave primaria, validar la informacion y utilizar consultas preparadas para trabajar de manera mas segura con la base de datos.

con estas mejoras el sistema de citas ya no solamente permite guardar informacion, sino que tambien puede administrarla desde la pagina web.