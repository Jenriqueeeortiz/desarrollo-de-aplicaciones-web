semana 4 - JavaScript

Objetivo

El objetivo de esta practica fue agregar JavaScript al proyecto del sistema de citas para el salon de belleza, buscando que la pagina tuviera una mayor interaccion con el usuario
Tambien trabaje con variables, funciones, eventos, manipulacion del DOM, validacion de formularios, mensajes dinamicos y mostrar u ocultar elementos
Con esto busque que el sistema no solamente tuviera una buena apariencia, sino que tambien pudiera responder a las acciones que realiza el usuario

Aplicacion web
Continue trabajando con el mismo proyecto de las semanas anteriores, que consiste en un sistema web para agendar citas en un salon de bellez
En esta semana agregue JavaScript al proyecto para darle mas interactividad y hacer que algunas acciones se realizaran directamente en la pagina antes de enviar la informacion al servidor
El sistema permite registrar los datos del cliente, seleccionar un servicio y elegir una fecha para la cita

Archivo JavaScript
Cree el archivo
script.js
Decidi mantener JavaScript en un archivo separado para tener mejor organizado el proyecto y evitar colocar todo el codigo directamente dentro del archivo PHP
Para conectar JavaScript con la pagina utilice
<script src="script.js"></script>
Con esto el navegador puede cargar el codigo JavaScript cuando se abre la pagina
Tambien agregue un mensaje en la consola para comprobar que el archivo estuviera conectado correctamente

Variables
Durante la practica utilice variables para guardar informacion que se necesita mientras se ejecuta el programa
Por ejemplo
let nombre = "";
let servicio = "";
let fecha = "";
Estas variables posteriormente reciben los datos que el usuario introduce en el formulario
Tambien utilice variables para guardar los elementos del formulario obtenidos mediante el DOM
Por ejemplo
let nombreCampo = document.getElementById("nombre");
let telefonoCampo = document.getElementById("telefono");
let emailCampo = document.getElementById("email");
Las variables me permitieron trabajar de una manera mas sencilla con los datos que ingresa el usuario

funciones
Cree una funcion llamada
function mostrarBienvenida() {
    let mensaje = document.getElementById("mensajeBienvenida");

    mensaje.textContent = "¡Bienvenido al sistema de citas del salon!";
}
Esta funcion se encarga de mostrar un mensaje de bienvenida cuando se carga la pagina
Tambien aprendi que una funcion sirve para agrupar instrucciones que realizan una tarea especifica y que puede ser llamada cuando sea necesario

Eventos
Utilice eventos para detectar las acciones que realiza el usuario dentro de la pagina
Uno de los principales eventos utilizados fue `submit`, que se ejecuta cuando el usuario intenta enviar el formulario
Tambien utilice el evento `click` para el boton que permite mostrar u ocultar la informacion adicional
Por ejemplo
formulario.addEventListener("submit", function(event) {
Con los eventos pude hacer que JavaScript respondiera a las acciones del usuario

DOM
Utilice el DOM para poder acceder a los elementos HTML desde JavaScript
Por ejemplo
document.getElementById("nombre");
Con este metodo pude obtener elementos especificos de la pagina utilizando su identificador
Tambien utilice el DOM para modificar textos, obtener los valores introducidos en el formulario y cambiar algunas propiedades de los elementos

Maniulacion de elementos
JavaScript me permitio modificar elementos de la pagina de forma dinamica
Uno de los ejemplos fue cambiar el contenido de un mensaje utilizando
mensaje.textContent = "El nombre debe tener al menos 3 caracteres.";
n utilice `classList.add()` para agregar clases CSS dependiendo de si el mensaje era de error o de exito
Esto permitio que los mensajes cambiaran de apariencia de acuerdo con la situacion

Validacion del formulario
Agregue validaciones mediante JavaScript para revisar la informacion antes de enviar el formulario
Las validaciones que realice fueron
El nombre es obligatorio
El nombre debe tener al menos 3 caracteres
El telefono debe tener 10 numeros
El correo debe tener un formato valido
Se debe seleccionar un servicio
Se debe seleccionar una fecha
La fecha debe ser posterior al dia actual
Por ejemplo, para validar la longitud del nombre utilice
if (nombre.length < 3) {
    event.preventDefault();

    mensaje.textContent = "El nombre debe tener al menos 3 caracteres.";
    mensaje.classList.add("mensaje-error");

    nombreCampo.focus();
    return;
}
Realice diferentes pruebas con datos incorrectos para comprobar que los mensajes aparecieran correctamente

Mensajes dinamicos
Agregue mensajes dinamicos para informar al usuario sobre lo que esta sucediendo en el formulario
Por ejemplo, cuando el nombre es demasiado corto aparece
El nombre debe tener al menos 3 caracteres.
Cuando el correo no tiene un formato correcto aparece un mensaje indicando que se debe ingresar un correo valido
Tambien agregue un mensaje cuando los datos son correctos
Datos correctos. Registrando cita...
Esos mensajes se muestran directamente en la pagina mediante JavaScript
mostrar y ocultar elementos
Agregue una seccion de informacion que puede mostrarse u ocultarse mediante un boton
Al presionar el boton se oculta la informacion y el texto cambia para indicar que se puede volver a mostrar
Cuando se vuelve a presionar, la informacion aparece nuevamente
Esta funcion la realice mediante JavaScript modificando la propiedad `display` del elemento
Con esto pude comprobar que JavaScript tambien puede cambiar la forma en que se muestran los elementos de una pagina

Herramientas de desarrollador
Utilice las herramientas de desarrollador del navegador para revisar el funcionamiento de JavaScript
Principalmente utilice la pestaña Console para comprobar que el archivo `script.js` estuviera conectado y para revisar posibles errores
Tambien utilice la seccion de elementos para revisar los identificadores de los elementos HTML que utilizaba JavaScript
Estas herramientas fueron utiles para encontrar errores y comprobar que los cambios realizados funcionaran correctamente

Experimentos realizados

Experimento 1: Cambios en la pagina
Realice dferentes cambios en los elementos de la pagina utilizando JavaScript
Cambie textos de mensajes y el contenido de algunos elementos para comprobar que JavaScript pudiera modificar la pagina sin tener que editar directamente el HTML
Con este experimento pude comprobar la utilidad del DOM

Experimento 2: Error intencional en JavaScript
Realice una prueba provocando un error intencional en el codigo JavaScript
Despues revise la consola del navegador para identificar el error que se estaba generando
Al encontrar el problema revise el codigo y corregi la parte que estaba causando la falla
Despues de corregirlo volvi a probar la pagina y comprobe que JavaScript funcionara nuevamente
Este experimento me ayudo a entender que la consola es una herramienta importante para detectar errores

Experimento 3: Cambio de identificador
Realice una prueba cambiando el identificador de uno de los elementos HTML sin cambiar el identificador correspondiente en JavaScript
Al hacer esto JavaScript ya no pudo encontrar correctamente el elemento
La consola permitio identificar el problema
Desues regrese el identificador a su valor correcto y la funcion volvio a trabajar normalmente
Con esto comprobe que los nombres utilizados en HTML y JavaScript deben coincidir

Experimento 4: Herramientas de desarrollador
Utilice las herramientas de desarrollador para revisar diferentes partes de la pagina
Revise la consola, los elementos HTML y algunos cambios realizados mediante JavaScript
Tambien pude comprobar como los elementos cambiaban cuando se ejecutaban las instrucciones del programa

Problemas encontrados
Unode los problemas encontrados fue que al principio la validacion del nombre no mostraba el mensaje esperado cuando se introducia una cantidad muy pequeña de caracteres
Esto se relacionaba con la validacion que realiza el propio navegador antes de ejecutar JavaScript
Tambien fue necesario revisar que todos los identificadores utilizados en HTML coincidieran con los utilizados en `script.js`

Errores de JavaScript
Durante las pruebas tambien revise los errores que pueden aparecer cuando JavaScript intenta utilizar un elemento que no existe o cuando el identificador no coincide
La consola del navegador fue la herramienta que utilice para revisar este tipo de errores
Esto me permitio entender mejor como localizar el problema y saber que parte del codigo tenia que revisar

Soluciones aplicadas
Para solucionar los problemas encontrados revise los identificadores utilizados en los archivos HTML y JavaScript
Tambien agregue los elementos que necesitaba el codigo JavaScript para poder encontrarlos correctamente
Para que las validaciones fueran controladas por JavaScript agregue `novalidate` al formulario
<form id="formularioCita" action="procesar.php" method="POST" novalidate>
Despues de realizar los cambios hice nuevamente las pruebas para comprobar que las validaciones y eventos funcionaran correctamente

Investigacion
Que es JavaScript
JavaScript es un lenguaje de programacion que permite agregar interactividad a las paginas web
Para que sirve
Su principal funcion en este proyecto es permitir que la pagina responda a las acciones del usuario y pueda realizar cambios sin necesidad de modificar directamente el HTML
Que es una variable
Una variable sirve para almacenar informacion que puede utilizarse durante la ejecucion del programa
Que es una funcion
Una funcion es un conjunto de instrucciones que realiza una tarea especifica
Que es un evento
Un evento es una accion que ocurre en la pagina, como hacer clic en un boton, escribir en un campo o enviar un formulario
Que es el DOM
El DOM es la representacion de los elementos HTML de una pagina y permite que JavaScript pueda acceder a ellos y modificarlos
Que hace getElementById
Es un metodo que permite obtener un elemento HTML utilizando el valor de su atributo `id`
Que hace querySelector
Es un metodo que permite seleccionar un elemento utilizando un selector
Que hace textContent
Es una propiedad que permite obtener o modificar el texto que contiene un elemento
Que hace classList
Permite agregar, quitar o revisar las clases CSS que tiene un elemento
Que hace addEventListener
Permite indicar que codigo debe ejecutarse cuando ocurre un evento especifico
Que hace preventDefaul
Permite evitar la accion predeterminada del navegador en un evento
En este proyecto se utilizo para evitar que el formulario se enviara cuando los datos eran incorrectos
Que es una validacion
Es el proceso de revisar que la informacion proporcionada por el usuario cumpla con ciertas condiciones
Que es un mensaje dinamico
Es un mensaje que cambia dependiendo de lo que esta sucediendo en la aplicacion
Que es JavaScript externo
Es cuando el codigo JavaScript se guarda en un archivo separado, como `script.js`, en lugar de colocarlo directamente dentro del archivo HTML o PHP
Que es la consola
Es una herramienta de los navegadores que permite ver mensajes, advertencias y errores relacionados con JavaScript
Que es PHP
PHP es el lenguaje que se utiliza en este proyecto para procesar los datos que recibe el servidor
Relacion entre HTML, CSS, JavaScript y PHP
HTML lo utilice para crear la estructura de la pagina y los elementos del formulario
CSS lo utilice para cambiar la apariencia de la pagina, incluyendo colores, tamaños, espacios y diseño
JavaScript lo utilice para agregar interactividad, validar los datos y modificar elementos de la pagina
PHP lo utilice para procesar la informacion que se envia mediante el formulario
En este proyecto las cuatro tecnologias trabajan juntas para que el sistema tenga estructura, diseño, interactividad y procesamiento de datos

Antes y despues
Antes
Antes de agregar JavaScript el sistema ya podia mostrar el formulario y enviar la informacion a PHP, pero la interaccion del usuario era mas limitada
Las validaciones dependian principalmente de PHP y de las funciones propias del navegador

Despues
Despues de agregar JavaScript el sistema puede responder de manera mas directa a las acciones del usuario
Se agregaron
Mensaje de bienvenida
Validacion de datos
Mensajes de error
Mensaje de confirmacion
Eventos
Manipulacion del DOM
Mostrar y ocultar informacion
Cambios dinamicos en los elementos
Con estos cambios la pagina se siente mas interactiva y tiene una mejor respuesta ante las acciones del usuario

Reflexion final
Durante esta practica aprendi como JavaScript puede hacer que una pagina web sea mas interactiva y no solamente mostrar informacion
Tambien aprendi a utilizar variables, funciones, eventos y el DOM para modificar elementos de la pagina
Una parte importante fue aprender a validar los datos antes de enviarlos al servidor y entender que JavaScript no reemplaza la validacion que se realiza con PHP
Tambien aprendi a utilizar la consola del navegador para encontrar errores y revisar el funcionamiento del codigo
Con esta practica pude complementar lo aprendido en las semanas anteriores, donde HTML se utilizo para la estructura, CSS para el diseño y PHP para procesar la informacion. Ahora JavaScript permite agregar interactividad y hacer que el sistema responda mejor a las acciones del usuario
