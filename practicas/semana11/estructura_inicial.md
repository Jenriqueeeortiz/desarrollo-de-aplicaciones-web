
 Semana 11 - Estructura inicial

 Descripcion

Antes de implementar MVC, el sistema de citas tenia una estructura basada en archivos PHP independientes.

El archivo index.php contenia tanto la consulta de citas a MySQL como el codigo HTML para mostrar los registros.

El archivo api/listar_citas.php realizaba directamente la consulta SQL y devolvia la respuesta JSON.

 Archivos principales

- conexion.php: conexion con MySQL.
- index.php: formulario y listado de citas.
- procesar.php: registro de citas.
- editar.php: formulario de edicion.
- actualizar.php: actualizacion de citas.
- eliminar.php: eliminacion de citas.
- login.php: autenticacion.
- proteger.php: proteccion de sesiones.
- autorizacion.php: control de permisos.
- fetch_citas.js: busqueda asincrona.
- api/listar_citas.php: consulta de citas mediante JSON.

 Problema identificado

La consulta SQL estaba repetida en diferentes archivos.

Ademas, index.php mezclaba el acceso a los datos con la presentacion HTML.

Por este motivo se decidio reorganizar el modulo de consulta y busqueda de citas mediante MVC.
