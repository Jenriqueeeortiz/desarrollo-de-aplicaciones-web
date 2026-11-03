
  Semana 11 - Arquitectura MVC

 Objetivo

El objetivo de esta practica fue reorganizar una parte del sistema de citas para un salon de belleza mediante una arquitectura inspirada en MVC, separando el acceso a los datos, el procesamiento de solicitudes y la presentacion de la informacion.

Tambien se busco conservar las funcionalidades implementadas durante las semanas anteriores, especialmente el CRUD, el inicio de sesion, los roles de usuario, las medidas de seguridad y la busqueda mediante Fetch API.

 Funcionalidad implementada

Durante esta practica se reorganizo el modulo de consulta y busqueda de citas.

Anteriormente, el archivo `index.php` realizaba directamente la consulta a MySQL y generaba la tabla HTML con los resultados.

De manera similar, el endpoint `api/listar_citas.php` contenia su propia consulta SQL.

Para mejorar la organizacion del codigo, se crearon un modelo, un controlador y una vista.

El modelo se encarga de obtener los registros desde MySQL.

El controlador recibe el texto de busqueda, valida su longitud y solicita los registros al modelo.

La vista recibe los datos y genera la tabla HTML que se muestra al usuario.

Tambien se modifico el endpoint de Fetch API para reutilizar el mismo modelo y controlador.

 Archivos creados o modificados

**app/models/Cita.php**

Se creo el modelo encargado de consultar la tabla `citas` de MySQL.

Contiene el metodo `obtenerTodas()`, que permite recuperar los registros y realizar busquedas por nombre o servicio utilizando consultas preparadas.

**app/controllers/CitaController.php**

Se creo el controlador encargado de coordinar las solicitudes de consulta.

Contiene el metodo `listar()`, que valida el texto de busqueda y utiliza el modelo para obtener los resultados.

**app/views/citas/tabla.php**

Se creo la vista encargada de mostrar los registros en una tabla HTML.

La vista recibe los datos previamente consultados y utiliza `htmlspecialchars()` para mostrar los valores de manera segura.

Tambien conserva las opciones correspondientes a los roles de administrador y consulta.

**index.php**

Se modifico para utilizar el controlador y cargar la vista de la tabla.

El formulario de registro, el buscador, los estilos y los demas elementos principales se conservaron.

**api/listar_citas.php**

Se modifico para utilizar el modelo y el controlador en lugar de ejecutar directamente una consulta SQL.

El endpoint conserva el formato JSON utilizado por Fetch API.

**estructura_inicial.md**

Se documento la organizacion del proyecto antes de implementar MVC.

**estructura_mvc.md**

Se documento la nueva estructura, las responsabilidades de cada componente y el flujo de informacion.

**pruebas_mvc.md**

Se preparo el registro de pruebas para revisar el funcionamiento de la aplicacion despues de la reorganizacion.

**evidencia.md**

Se documento el procedimiento realizado y los cambios principales de la practica.

 Estructura utilizada

La estructura MVC implementada fue la siguiente:

```text
semana11/
├── app/
│   ├── controllers/
│   │   └── CitaController.php
│   ├── models/
│   │   └── Cita.php
│   └── views/
│       └── citas/
│           └── tabla.php
├── api/
│   └── listar_citas.php
├── index.php
├── conexion.php
├── autorizacion.php
├── fetch_citas.js
└── estilos.css
```

Se implementaron tres componentes principales.

**Modelo**

Su responsabilidad es acceder a la base de datos y obtener los registros.

**Vista**

Su responsabilidad es presentar la informacion mediante HTML.

**Controlador**

Su responsabilidad es recibir los parametros de busqueda, validarlos y coordinar la comunicacion con el modelo.

El flujo de funcionamiento es el siguiente:

1. El usuario solicita consultar o buscar citas.
2. La solicitud llega a `index.php` o al endpoint de Fetch API.
3. Se comprueba la sesion y los permisos correspondientes.
4. El controlador recibe la busqueda.
5. El controlador solicita los registros al modelo.
6. El modelo consulta la base de datos MySQL.
7. Los resultados regresan al controlador.
8. La informacion se presenta mediante la vista HTML o mediante una respuesta JSON.

 Tablas de la base de datos involucradas

Se utilizo la base de datos `salon_belleza`.

La tabla principal fue `citas`, que contiene los siguientes campos:

- id
- nombre
- telefono
- email
- servicio
- fecha

El modelo `Cita.php` utiliza esta tabla para recuperar la informacion solicitada.

Tambien se conservo la tabla `usuarios`, que permite gestionar el inicio de sesion y los roles de administrador y consulta.

No fue necesario modificar la estructura de las tablas para implementar MVC.

 Pruebas realizadas

Se definieron pruebas para comprobar que la pagina principal continuara cargando despues de reorganizar los archivos.

Tambien se incluyeron pruebas para verificar que el modelo recuperara los registros, el controlador coordinara la consulta y la vista presentara correctamente la informacion.

Se considero la integracion con Fetch API para comprobar que el buscador continuara utilizando respuestas JSON y actualizando la tabla sin recargar completamente la pagina.

Ademas, se incluyeron pruebas de las operaciones de registrar, editar y eliminar citas, asi como del inicio y cierre de sesion.

Finalmente, se revisaron los permisos de los roles administrador y consulta para asegurar que la reorganizacion no eliminara las restricciones de acceso existentes.

Los casos de prueba se encuentran documentados en `pruebas_mvc.md`.

 Resultado de cada prueba

La estructura implementada permite que `index.php` obtenga los registros a traves del controlador, sin ejecutar directamente la consulta SQL del listado.

El modelo concentra la consulta de citas y devuelve los registros en un arreglo.

El controlador valida el parametro de busqueda y coordina la consulta con el modelo.

La vista utiliza los datos recibidos para generar la tabla HTML y mostrar las acciones correspondientes al rol del usuario.

El endpoint de Fetch API conserva la respuesta JSON con los campos `ok`, `mensaje`, `total` y `citas`, permitiendo mantener la compatibilidad con `fetch_citas.js`.

Las operaciones tradicionales del CRUD permanecen en sus archivos PHP originales, por lo que la reorganizacion se limita al modulo de consulta y busqueda.

La confirmacion de los resultados de ejecucion se registra en `pruebas_mvc.md`.

 Errores encontrados

Durante la reorganizacion se identificaron algunos problemas relacionados con la estructura anterior del proyecto.

El primero fue que las consultas SQL del listado estaban distribuidas en diferentes archivos, lo que provocaba que una misma operacion tuviera codigo repetido.

El segundo fue que `index.php` mezclaba la consulta de datos con la generacion de HTML, dificultando la separacion de responsabilidades.

Otro detalle fue la necesidad de utilizar rutas correctas al crear las carpetas `models`, `controllers` y `views`.

Finalmente, era necesario conservar el formato JSON del endpoint para evitar problemas de compatibilidad con el buscador implementado durante la Semana 10.

 Soluciones aplicadas

Se creo el modelo `Cita.php` para concentrar el acceso a los registros de la tabla `citas`.

Se creo el controlador `CitaController.php` para recibir y validar el texto de busqueda.

Se separo la tabla HTML en la vista `tabla.php`.

Se modifico `index.php` para utilizar el controlador y cargar la vista mediante `require`.

Se actualizo `api/listar_citas.php` para utilizar el mismo modelo y controlador.

Se utilizaron rutas basadas en `__DIR__` para localizar correctamente los archivos PHP.

Tambien se conservo la estructura de las respuestas JSON y el archivo `fetch_citas.js`, evitando modificar innecesariamente el funcionamiento del buscador.

Las validaciones, sesiones, permisos y tokens CSRF de las semanas anteriores se mantuvieron en los archivos correspondientes.

 Evidencias

La evidencia tecnica de la arquitectura MVC se encuentra en los archivos `app/models/Cita.php`, `app/controllers/CitaController.php` y `app/views/citas/tabla.php`.

Estos archivos permiten identificar claramente la separacion de responsabilidades entre el acceso a los datos, el procesamiento de solicitudes y la presentacion.

El archivo `index.php` muestra la integracion del controlador y la vista, mientras que `api/listar_citas.php` demuestra como se reutiliza el mismo modelo para responder solicitudes Fetch API.

El documento `estructura_inicial.md` describe la organizacion anterior y `estructura_mvc.md` explica los cambios realizados.

Por su parte, `pruebas_mvc.md` contiene los casos utilizados para evaluar la integracion y la conservacion de las funciones del sistema.

 Reflexion final

En esta practica aprendi que la arquitectura MVC permite organizar mejor el codigo de una aplicacion web al separar las responsabilidades de cada componente.

Comprendi que el modelo se encarga de trabajar con los datos, el controlador coordina las solicitudes y la vista presenta la informacion al usuario.

Tambien aprendi que no es necesario desarrollar nuevamente todo el sistema para implementar una arquitectura diferente, ya que es posible reorganizar progresivamente los modulos existentes.

Considero que esta practica fue importante porque mejoro la organizacion del proyecto, redujo la repeticion de consultas y facilito el mantenimiento del codigo.

Ademas, me permitio comprender como se puede integrar MVC con tecnologias utilizadas anteriormente, como PHP, MySQL, JavaScript y Fetch API.