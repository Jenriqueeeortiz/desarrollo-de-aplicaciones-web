
 Semana 12 - Componentes reutilizables y plantilla general

 Objetivo

El objetivo de esta practica fue implementar componentes reutilizables y una plantilla general en PHP para mejorar la organizacion del sistema de citas de un salon de belleza.

Tambien se busco reducir el codigo repetido, mantener un diseño uniforme y conservar las funcionalidades desarrolladas durante las semanas anteriores.

 Descripcion del proyecto

Se continuo trabajando con el sistema web de citas para un salon de belleza.

El sistema permite registrar, consultar, buscar, editar y eliminar citas, dependiendo de los permisos del usuario.

Los servicios disponibles son:

- Corte de cabello
- Keratina
- Tinte
- Peinado
- Maquillaje

El proyecto utiliza PHP, HTML, CSS, JavaScript, Fetch API y MySQL.

 Analisis de componentes

Al revisar las paginas del sistema se identificaron elementos que se repetian, como el encabezado, el menu de navegacion, los mensajes y el pie de pagina.

Se decidio separar estos elementos en archivos PHP independientes para poder utilizarlos en diferentes paginas sin repetir el mismo codigo.

 Componentes desarrollados

 Encabezado

Se creo el archivo app/views/layouts/header.php.

Este componente muestra el nombre del sistema y una descripcion general.

 Menu de navegacion

Se creo el archivo app/views/layouts/menu.php.

Permite navegar entre el panel y las citas, muestra el nombre del usuario, su rol y la opcion de cerrar sesion.

 Mensajes

Se creo el archivo app/views/layouts/mensajes.php.

Este componente permite mostrar mensajes de exito, error, advertencia e informacion utilizando estilos compartidos.

 Pie de pagina

Se creo el archivo app/views/layouts/footer.php.

Muestra informacion general del proyecto y se utiliza en las diferentes paginas.

 Tabla de citas

Se conservo la vista app/views/citas/tabla.php, que permite mostrar las citas registradas y las acciones disponibles dependiendo del rol del usuario.

 Implementacion de la plantilla general

Se creo el archivo app/views/layouts/plantilla.php.

La plantilla contiene la estructura principal de HTML y carga los componentes reutilizables.

Para integrar el contenido de cada pagina se utilizaron las funciones ob_start() y ob_get_clean() de PHP.

De esta manera, cada pagina prepara su contenido y la plantilla se encarga de mostrarlo junto con el encabezado, el menu, los mensajes y el pie de pagina.

 Paginas modificadas

 index.php

Se integro la plantilla general conservando el formulario de registro de citas, el buscador con Fetch API y la tabla de citas.

 panel.php

Se integro la plantilla general para mostrar el panel principal del usuario.

El contenido cambia dependiendo del rol de administrador o consulta.

 editar.php

Se integro la plantilla general en el formulario de edicion de citas.

Se conservaron la validacion del identificador, las consultas preparadas, la proteccion CSRF y los permisos de administrador.

 Estilos CSS

Se conservaron los colores originales del proyecto, principalmente beige, cafe y crema.

Se agregaron estilos para el menu, encabezado, mensajes y pie de pagina, manteniendo una apariencia consistente.

Tambien se incluyeron reglas para adaptar los componentes a pantallas pequeñas.

 Relacion con MVC

Se mantuvo la estructura MVC implementada durante la Semana 11.

El modelo realiza las consultas de datos, el controlador organiza las operaciones de consulta y las vistas presentan la informacion.

Los componentes y la plantilla general forman parte de la capa de vistas.

 Seguridad

Se conservaron las medidas de seguridad implementadas anteriormente.

Entre ellas se encuentran:

- Validacion de sesiones.
- Control de acceso por roles.
- Consultas preparadas.
- Proteccion CSRF.
- Escape de datos al mostrar informacion.

 Pruebas realizadas

Se reviso el funcionamiento de la plantilla general en las paginas index.php, panel.php y editar.php.

Se comprobo que el sistema continuara mostrando los componentes compartidos y que las funciones principales siguieran disponibles.

Tambien se reviso la navegacion, el diseño y el funcionamiento general del sistema.

Las pruebas se documentaron en el archivo pruebas_plantilla.md.

 Problemas encontrados y soluciones

Durante la integracion se identificaron encabezados y pies de pagina duplicados, debido a que algunas paginas todavia contenian su estructura HTML original.

Para solucionarlo se eliminaron los elementos repetidos y se utilizo la plantilla general.

Tambien se detecto que los colores iniciales de los componentes nuevos no coincidian con el diseño del sistema.

Se corrigieron los estilos CSS para conservar la paleta original de colores beige, cafe y crema.


 Reflexion personal

En esta practica aprendi que utilizar componentes reutilizables ayuda a organizar mejor el codigo de una aplicacion web.

Antes se repetian elementos como el encabezado y el pie de pagina en diferentes archivos, pero ahora se pueden modificar desde un solo lugar.

Tambien comprendi como funciona una plantilla general en PHP y como integrarla con la estructura MVC sin perder las funcionalidades del sistema.

Considero que esta organizacion facilita el mantenimiento del proyecto y permite agregar nuevas paginas de manera mas sencilla.

 Conclusion

Se implementaron componentes reutilizables y una plantilla general en el sistema de citas para un salon de belleza.

La plantilla se integro en tres paginas y se conservaron las funciones de registro, consulta, busqueda, edicion y eliminacion de citas.

Con esta practica se mejoro la organizacion del proyecto, se redujo el codigo repetido y se mantuvo un diseño uniforme.
