
 Semana 10 - AJAX y Fetch API

 Objetivo

El objetivo de esta practica fue implementar Fetch API en el sistema de citas para un salon de belleza, permitiendo consultar informacion desde PHP y MySQL sin recargar completamente la pagina.

 Funcionalidad implementada

Se agrego un buscador de citas que permite consultar registros por nombre del cliente o por servicio.

El usuario escribe el texto que desea buscar y presiona el boton Buscar.

JavaScript envia una solicitud al servidor mediante Fetch API.

PHP procesa la busqueda y devuelve los resultados en formato JSON.

Finalmente, JavaScript actualiza la tabla de citas.

 Archivos creados o modificados

- index.php: se agrego el buscador y los identificadores de la tabla.
- fetch_citas.js: se implementaron las solicitudes asincronas.
- api/listar_citas.php: se creo el endpoint que devuelve JSON.
- diseno_fetch.md: documentacion del funcionamiento.
- pruebas_fetch.md: registro de pruebas.
- evidencia.md: documentacion de la practica.

 Estructura utilizada

La aplicacion conserva la estructura de la Semana 09 y agrega un archivo JavaScript y un endpoint PHP.

La comunicacion funciona de la siguiente manera:

Usuario -> JavaScript -> Fetch API -> PHP -> MySQL

MySQL -> PHP -> JSON -> JavaScript -> Tabla HTML

 Tablas de la base de datos involucradas

Se utilizo la base de datos salon_belleza.

La tabla principal fue citas, que contiene los siguientes campos:

- id
- nombre
- telefono
- email
- servicio
- fecha

Tambien se mantiene la tabla usuarios para el inicio de sesion y la administracion de roles.

 Pruebas realizadas

Se prepararon pruebas para comprobar la busqueda por nombre y servicio, la respuesta JSON, la actualizacion de la tabla, el manejo de errores y la conservacion de los permisos.

Los resultados se documentan en pruebas_fetch.md.

 Resultado de cada prueba

Los resultados se registran individualmente como Correcta, Incorrecta o Pendiente en el archivo pruebas_fetch.md.

 Errores encontrados

Durante la integracion fue necesario adaptar la tabla para permitir que JavaScript reemplazara sus filas dinamicamente.

Tambien se considero que las acciones de editar y eliminar debian conservarse para el administrador.

 Soluciones aplicadas

Se agregaron identificadores HTML para localizar los elementos de la tabla.

Se utilizo replaceChildren para actualizar los resultados y textContent para mostrar los datos de forma segura.

Los botones de editar y eliminar se generan solamente para el administrador, conservando los formularios POST y el token CSRF.

 Reflexion final

En esta practica aprendi a utilizar Fetch API para comunicar JavaScript con PHP de manera asincrona.

Comprendi que JSON permite intercambiar informacion entre el servidor y el navegador.

Tambien aprendi que las validaciones y los permisos deben mantenerse en PHP, aunque la interfaz utilice JavaScript.

Esta practica permitio mejorar la interaccion del sistema sin modificar completamente su funcionamiento.
