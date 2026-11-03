 Semana 10 - AJAX y Fetch API

 Objetivo

El objetivo de esta practica fue implementar Fetch API en el sistema de citas para un salon de belleza, con la finalidad de mejorar la interaccion entre el usuario y la aplicacion.

Se busco permitir la consulta y busqueda de citas registradas sin tener que recargar completamente la pagina, utilizando JavaScript para enviar solicitudes a PHP y recibir informacion en formato JSON.

Tambien se busco conservar las funciones de seguridad, autenticacion y control de permisos desarrolladas en las semanas anteriores.

 Funcionalidad implementada

Durante esta practica se agrego un buscador dinamico al modulo de citas registradas.

El buscador permite consultar citas utilizando el nombre del cliente o el servicio solicitado.

Cuando el usuario escribe un dato y presiona el boton Buscar, JavaScript utiliza Fetch API para enviar una peticion HTTP GET al archivo `api/listar_citas.php`.

Este archivo comprueba que exista una sesion valida, recibe el parametro de busqueda y realiza una consulta a la base de datos MySQL.

Posteriormente, PHP devuelve los registros encontrados en formato JSON.

JavaScript procesa la respuesta y actualiza las filas de la tabla utilizando el DOM, sin necesidad de recargar toda la pagina.

La funcionalidad tambien contempla el caso en que no se encuentren resultados y el manejo de errores durante la comunicacion.

 Archivos creados o modificados

**index.php**

Se modifico la pagina principal para agregar un campo de busqueda, un boton para ejecutar la consulta y un espacio para mostrar mensajes.

Tambien se agregaron identificadores HTML para que JavaScript pudiera localizar y actualizar la tabla.

**fetch_citas.js**

Se creo este archivo para realizar las peticiones asincronas mediante Fetch API.

Contiene las funciones necesarias para enviar el texto de busqueda, procesar las respuestas JSON, crear las filas de la tabla y mostrar mensajes al usuario.

**api/listar_citas.php**

Se creo un endpoint PHP que recibe las solicitudes de busqueda, comprueba la sesion, valida los datos y consulta la base de datos mediante una sentencia preparada.

Devuelve una respuesta JSON con el estado de la operacion, un mensaje, el total de resultados y las citas encontradas.

**diseno_fetch.md**

Se documento el diseño de la funcionalidad, los archivos utilizados, los datos enviados, el formato de respuesta y los permisos necesarios.

**pruebas_fetch.md**

Se preparo el registro de pruebas funcionales y de seguridad para evaluar el comportamiento de Fetch API.

**evidencia.md**

Se documento el desarrollo de la practica y los cambios realizados.

 Estructura utilizada

Se conservo la estructura principal del proyecto de la Semana 09 y se agregaron los archivos necesarios para trabajar con Fetch API.

El funcionamiento de la comunicacion es el siguiente:

1. El usuario escribe el nombre de un cliente o un servicio.
2. JavaScript detecta la accion del usuario.
3. Fetch API envia una peticion HTTP GET.
4. PHP verifica la sesion y valida el texto recibido.
5. PHP consulta los registros de MySQL.
6. El servidor devuelve los resultados en formato JSON.
7. JavaScript interpreta la respuesta.
8. El contenido de la tabla se actualiza mediante el DOM.

La estructura permite mantener separada la comunicacion asincrona del codigo principal de la interfaz.

 Tablas de la base de datos involucradas

Se utilizo la base de datos `salon_belleza`.

La tabla principal fue `citas`, que contiene los siguientes campos:

- id
- nombre
- telefono
- email
- servicio
- fecha

Estos campos se utilizan para mostrar los registros encontrados en las busquedas.

Tambien se conservo la tabla `usuarios`, utilizada para la autenticacion y la identificacion de los roles de administrador y consulta.

 Pruebas realizadas

Se definieron pruebas para revisar el funcionamiento de la busqueda por nombre y por servicio.

Tambien se consideraron busquedas sin texto, consultas sin coincidencias, respuestas JSON, errores HTTP y fallos de comunicacion.

En cuanto a la seguridad, se incluyeron comprobaciones de acceso sin sesion y de diferencias entre los permisos de administrador y consulta.

Finalmente, se incluyeron pruebas de regresion para comprobar que las operaciones tradicionales de registrar, editar y eliminar continuaran funcionando.

Los casos y sus resultados se encuentran documentados en `pruebas_fetch.md`.

 Resultado de cada prueba

El comportamiento previsto para las busquedas es mostrar solamente los registros que coincidan con el nombre o servicio ingresado.

Cuando el campo de busqueda se encuentra vacio, el endpoint permite recuperar todas las citas.

Cuando no existen coincidencias, la interfaz muestra un mensaje indicando que no se encontraron registros.

El endpoint utiliza una estructura JSON que contiene los campos `ok`, `mensaje`, `total` y `citas`.

La interfaz comprueba el estado HTTP de la respuesta y muestra un mensaje general cuando ocurre un error.

En cuanto a los permisos, el administrador puede visualizar las opciones de editar y eliminar, mientras que el usuario de consulta solamente puede revisar los registros.

La confirmacion de los resultados obtenidos durante la ejecucion se registra en `pruebas_fetch.md`.

 Errores encontrados

Durante la integracion se identificaron algunos detalles relacionados con la actualizacion dinamica de la tabla.

El primer problema fue que la tabla original se generaba directamente desde PHP y no tenia los identificadores necesarios para que JavaScript pudiera actualizar sus filas facilmente.

Otro detalle fue que, en una primera version, las filas generadas mediante JavaScript no conservaban las opciones de editar y eliminar correspondientes al administrador.

Tambien fue necesario considerar las busquedas sin resultados, ya que la interfaz debia mostrar un mensaje adecuado en lugar de dejar al usuario sin informacion.

Por ultimo, se identifico la necesidad de manejar los errores HTTP y de comunicacion para evitar que la aplicacion mostrara resultados incorrectos cuando el servidor no respondiera correctamente.

 Soluciones aplicadas

Se agregaron identificadores HTML al buscador y a la tabla de citas.

Se utilizo `fetch()` para realizar las solicitudes al servidor y `respuesta.json()` para interpretar los datos recibidos.

Para actualizar los registros se implemento `replaceChildren()`, permitiendo sustituir las filas anteriores por las nuevas.

Se utilizo `textContent` para mostrar los valores de manera segura, evitando interpretar los datos como codigo HTML.

Se agrego una funcion para crear los botones de editar y eliminar cuando el usuario tiene el rol de administrador.

Tambien se conservaron los formularios POST y los tokens CSRF para las operaciones de eliminacion.

Se agregaron mensajes para indicar el estado de la busqueda, la cantidad de resultados encontrados y los errores de comunicacion.

 Evidencias

La evidencia tecnica de la implementacion se encuentra en los archivos `index.php`, `fetch_citas.js` y `api/listar_citas.php`.

En ellos se puede revisar el buscador, la solicitud asincrona, el procesamiento del JSON y la consulta a MySQL.

El archivo `diseno_fetch.md` explica el funcionamiento de la comunicacion y `pruebas_fetch.md` contiene los casos de prueba.

La demostracion funcional consiste en realizar una busqueda desde la interfaz y comprobar que la tabla cambia sin recargar completamente la pagina, manteniendo los permisos correspondientes a cada usuario.

 Reflexion final

En esta practica aprendi a utilizar Fetch API para comunicar JavaScript con PHP de manera asincrona.

Comprendi que JSON permite intercambiar informacion entre el navegador y el servidor de una forma organizada y que JavaScript puede utilizar esa informacion para modificar solamente una parte de la pagina.

Tambien comprendi que las validaciones y los permisos deben seguir realizandose en PHP, ya que las comprobaciones del navegador no son suficientes para proteger una aplicacion.

Considero que esta practica fue importante porque permitio mejorar la experiencia del usuario y hacer que el sistema de citas fuera mas dinamico sin modificar completamente su funcionamiento.