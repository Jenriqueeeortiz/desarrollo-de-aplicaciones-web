
 Semana 10 - Diseño de Fetch API

 Modulo seleccionado

Para esta practica seleccione el modulo de consulta y busqueda de citas del sistema para un salon de belleza.

El objetivo es permitir que los usuarios busquen citas registradas sin tener que recargar toda la pagina.

 Archivos utilizados

- index.php: contiene la interfaz y el buscador.
- fetch_citas.js: realiza las peticiones con Fetch API.
- api/listar_citas.php: recibe la solicitud y consulta MySQL.
- conexion.php: establece la conexion con la base de datos.
- autorizacion.php: permite identificar el rol del usuario.

 Funcionamiento

1. El usuario escribe un nombre o servicio.
2. Presiona el boton Buscar.
3. JavaScript captura el evento.
4. Fetch API envia una peticion GET al servidor.
5. PHP comprueba que exista una sesion autorizada.
6. PHP consulta la tabla citas utilizando una consulta preparada.
7. El servidor devuelve los resultados en formato JSON.
8. JavaScript actualiza la tabla sin recargar la pagina.

 Datos enviados

Se utiliza el parametro buscar mediante el metodo GET.

Ejemplo:

api/listar_citas.php?buscar=Keratina

 Respuesta JSON

El servidor devuelve una estructura con los siguientes datos:

- ok: indica si la solicitud fue correcta.
- mensaje: describe el resultado.
- total: cantidad de citas encontradas.
- citas: arreglo con los registros obtenidos.

 Permisos

Los usuarios con rol administrador y consulta pueden buscar citas.

El administrador puede editar y eliminar registros.

El usuario de consulta solamente puede visualizar la informacion.

Los permisos para modificar datos se comprueban en PHP.

 Elemento actualizado

La tabla de citas se actualiza mediante JavaScript utilizando el elemento cuerpoCitas.

Los resultados se insertan con textContent para evitar interpretar contenido no confiable como HTML.

 Seguridad

Se conserva la autenticacion mediante sesiones.

La busqueda se valida en PHP y utiliza consultas preparadas.

Las respuestas del endpoint no muestran credenciales ni detalles tecnicos.

Las operaciones de modificacion siguen utilizando permisos de administrador y proteccion CSRF.
