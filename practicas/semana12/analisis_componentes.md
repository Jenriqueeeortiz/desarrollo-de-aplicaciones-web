
 Semana 12 - Analisis de componentes reutilizables

 Objetivo

Identificar los elementos que se repiten en las diferentes paginas del sistema de citas para un salon de belleza y convertirlos en componentes reutilizables utilizando PHP.

 Analisis del sistema

El proyecto consiste en un sistema web que permite administrar y consultar citas de un salon de belleza.

Durante las semanas anteriores se desarrollaron diferentes paginas, como el panel de usuario, el registro de citas y la edicion de citas.

Al revisar estas paginas se identificaron elementos que se repetian, como el encabezado, el menu de navegacion, los mensajes y el pie de pagina.

Para evitar repetir el mismo codigo en diferentes archivos se decidio separar estos elementos en componentes reutilizables.

 Componentes identificados

 Encabezado

Archivo: app/views/layouts/header.php

Muestra el nombre del sistema y una descripcion general. Se utiliza en las diferentes paginas para mantener una presentacion uniforme.

 Menu de navegacion

Archivo: app/views/layouts/menu.php

Permite navegar entre el panel y las citas, muestra el usuario y su rol, y proporciona la opcion de cerrar sesion.

 Mensajes

Archivo: app/views/layouts/mensajes.php

Permite mostrar mensajes informativos, de exito, advertencia o error utilizando una estructura comun.

 Pie de pagina

Archivo: app/views/layouts/footer.php

Muestra informacion general del proyecto y se reutiliza en las paginas del sistema.

 Tabla de citas

Archivo: app/views/citas/tabla.php

Muestra las citas registradas y las acciones disponibles dependiendo del rol del usuario.

 Plantilla general

Archivo: app/views/layouts/plantilla.php

Se creo una plantilla general que contiene la estructura HTML y carga automaticamente los componentes de encabezado, menu, mensajes y pie de pagina.

La plantilla recibe el contenido de cada pagina mediante una variable de PHP.

Para esto se utilizan las funciones ob_start() y ob_get_clean(), que permiten capturar el contenido HTML antes de mostrarlo dentro de la plantilla.

 Paginas donde se utiliza

- index.php: registro, consulta y busqueda de citas.
- panel.php: panel principal del usuario.
- editar.php: formulario para modificar una cita.

Las tres paginas utilizan la misma plantilla general.

 Relacion con MVC

Se conserva la organizacion MVC implementada anteriormente.

El modelo se encarga de consultar los datos, el controlador organiza las operaciones de consulta y las vistas muestran la informacion.

Los componentes reutilizables forman parte de las vistas y ayudan a mantener separado el diseño de la logica del sistema.

 Estilos utilizados

Se conservaron los colores originales del proyecto, principalmente beige, cafe y crema.

Los estilos de los componentes se agregaron al archivo estilos.css para mantener una apariencia uniforme.

 Ventajas de utilizar componentes

La reutilizacion de componentes permite reducir el codigo repetido, facilitar el mantenimiento y conservar el mismo diseño en diferentes paginas.

Tambien permite realizar cambios en un solo archivo y reflejarlos en todas las paginas que utilizan ese componente.

 Conclusion

En esta practica aprendi a identificar elementos repetidos dentro de una aplicacion web y convertirlos en componentes reutilizables.

Tambien comprendi como utilizar una plantilla general en PHP para organizar mejor las vistas y facilitar el mantenimiento del sistema.
