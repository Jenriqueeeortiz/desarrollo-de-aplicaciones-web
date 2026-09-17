Semana 3 - CSS
Objetivo

El objetivo de esta practica fue aplicar CSS al proyecto del sistema de citas para el salon de belleza, buscando mejorar su apariencia, organizacion y facilidad de uso
Tambien trabaje con selectores CSS, colores, tipografia, modelo de caja, Flexbox, diseño de formularios y diseño adaptable usando @media

Aplicacion web
Continue trabajando con el mismo proyecto de las semanas anteriores, que consiste en un sistema web para agendar citas en un salon de belleza

En el sistema puedo registrar
Nombre del cliente
Telefono
Correo electronico
Servicio
Fecha de la cita

Los servicios que agregue son
Corte de cabello
Keratina
Tinte
Peinado
Maquillaje
El usuario llena el formulario y los datos se mandan mediante el metodo POST al archivo procesar.php

HTML utilizado
Use HTML para crear la estructura de la pagina
Los elementos que use fueron
header para el encabezado
main para el contenido principal
section par organizar las diferentes partes
form para el formulario
label para identificar los campos
input para capturar informacion
select para seleccionar el servicio
button para enviar el formulario
footer para el pie de pagina
Tambien agregue la etiqueta
<link rel="stylesheet" href="estilos.css">
Con esta etiqueta conecte los archivos HTML o PHP con la hoja de estilos externa

Hoja de estilos
Cree el archivo
estilos.css

Decidi mantener la hoja de estilos separada de los archivos PHP para tener mejor organizado el proyecto y que los cambios de diseño fueran mas faciles de hacer
Los principales colores que use fueron
Beige claro para el fondo
Crema para los formularios y tarjetas
Cafe para los encabezados y botones
Cafe oscuro para los titulos y otros elementos
Tambien agregue bordes, espacios, sombras y esquinas redondeadas para que la pagina tuviera una apariencia mas completa

Selectores CSS
Durante la practica use diferentes tipos de selectores CSS
Selector por elemento
body {
    background-color: #f3eee6;
}

Con este selector aplique el estilo directamente al elemento body

Selector por clase
.caja {
    padding: 20px;
}

Use este tipo de selector para aplicar estilos a los elementos que tienen la clase caja
Selector por identificador
En el formulario use identificadores como
<input type="text" id="nombre">

Tambien use selectores combinados como

.contenedor > div:first-child {
    flex: 1;
}

Modelo de caja
Use el modelo de caja para controlar mejor el espacio que ocupa cada elemento dentro de la pagina
Las propiedades que use fueron
width
height
margin
padding
border
Tambien agregue
* {
    box-sizing: border-box;
}
Con esto hice que el ancho y alto de los elementos tomaran en cuenta el padding y el borde
Margin
Use margin para controlar el espacio que queda fuera de un elemento

main {
    margin: 30px auto;
}

Con esto agregue espacio alrededor del contenido principal y tambien pude centrarlo horizontalmente

Padding
Use padding para controlar el espacio que queda dentro de un elemento entre el contenido y el borde
form {
    padding: 30px;
}


Border
Use border para agregar bordes alrededor de algunos elementos
.caja {
    border: 2px solid #b49b7a;
}
Lo use principalmente para diferenciar visualmente las tarjetas y otras partes del sistema

Flexbox
Use Flexbox para organizar la parte superior de la pagina

El contenedor que use fue
.contenedor {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    gap: 30px;
}
Con Flexbox pude colocar el contenido principal y la seccion de servicios disponibles de manera horizontal
Tambien agregue una regla responsive para que la distribucion cambiara cuando la pantalla fuera pequeña

Diseño del formulario
Modifique el formulario usando CSS
Los elementos a los que les aplique estilos fueron
form
label
input
select
button
Cambie colores, tamaños, bordes, espacios y tipografia para que el formulario se viera mejor
Tambien agregue un efecto cuando el usuario selecciona un campo
input:focus,
select:focus {
    outline: none;
    border-color: #8b7355;
}
Con esto hice que fuera mas facil identificar el campo que se esta utilizando

Diseño de la tabla
Mi proyecto actualmente no utiliza una tabla para mostrar informacion
Por esta razon decidi no agregar una tabla solamente para cumplir con este apartado, ya que por ahora el sistema no necesita mostrar los datos de esa forma
La informacion de la cita la muestro mediante diferentes bloques organizados dentro de la pagina

Diseño adaptable
Implemente diseño responsive utilizando @media

Use el siguiente codigo

@media (max-width: 600px) {
    .contenedor {
        flex-direction: column;
    }

    .caja {
        width: 100%;
    }
}
Con esto hice que los elementos que estaban acomodados horizontalmente pasaran a colocarse de forma vertical cuando la pantalla fuera pequeña
Tambien ajuste los tamaños del formulario, encabezado, campos y botones para que se adaptaran mejor

Herramientas de desarrollador
Use las herramientas de desarrollador del navegador para revisar la estructura HTML y los estilos CSS
En la parte de inspeccion pude revisar
Los elementos HTML
Las clases que use
Los estilos aplicados
Las propiedades CSS
Los estilos que no se aplicaban por algun error
Tambien cambie temporalmente algunos valores de CSS desde el navegador para ver rapidamente como afectaban al diseño

Experimentos realizados
Experimento 1: Cambios visuales
Hice diferentes cambios en
Colores
Tamaños de texto
Bordes
Espacios
Alineaion
Fondo de la pagina
La idea fue ver como cambiaba la apariencia del sistema
Al final elegi una combinacion de colores beige, crema y cafe porque senti que quedaba mejor con el estilo del salon de belleza

Experimento 2: Error intencional en CSS
Hice un cambio intencional en una propiedad CSS para ver que pasaba cuando habia un error
Al modificar o eliminar una propiedad, el elemento dejo de mostrar el estilo que esperaba
Despue revise nuevamente el codigo, encontre el error y lo corregi
Esto me ayudo a entender que un pequeño error en CSS puede hacer que una parte del diseño deje de funcionar correctamente

Experimento 3: Cambio de clase
Probe cambiar el nombre de una clase utilizada en HTML sin cambiar el nombre correspondiente en CSS

Por ejemplo
<section class="contenido">


Mientras que el CSS esperaba

.contenedor {
    display: flex;
}

El estilo dejo de aplicarse porque los nombres ya no coincidian
Despues regrese el nombre correcto de la clase
Con esto pude comprobar la importancia de utilizar correctamente los nombres de las clases tanto en HTML como en CSS

Experimento 4: Herramientas de desarrollador
Revise diferentes elementos del sistema utilizando las herramientas de desarrollador del navegador
Revise sus clases y propiedades CSS
Tambien modifique temporalmente algunas propiedades para ver los cambios directamente en la pagina
Esto me permitio identificar de una manera mas sencilla que estilos estaban funcionando y cuales necesitaban cambios

Problemas encontrados

Uno de los problemas que encontre fue que la seccion de servicios disponibles se veia demasiado pequeña despues de aplicar Flexbox
La caja tenia un tamaño reducido y no se adaptaba correctamente al contenido
Tambien tuve que ajustar los espacios entre los elementos para que la seccion tuviera una mejor distribucion
Soluciones aplicadas

Modifique la configuracion de Flexbox
.contenedor {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    gap: 30px;
}

Tambien aumente el ancho de la caja de servicios
.caja {
    width: 280px;
}

Quite algunos margenes que no eran necesarios y agregue bordes, sombras y espacios internos
Con estos cambios logre que la seccion de servicios quedara mejor distribuida y fuera mas facil de visualizar

Investigacion
Que es CSS
CSS es el lenguaje que use para darle apariencia a mi pagina web
Cual es su proposito
Su principal proposito es separar la parte visual de la estructura HTML,de esta manera HTML se encarga de organizar el contenido y CSS se encarga de definir como se va a mostrar

Que es un selector
Es la parte de una regla CSS que indica a que elemento o elementos se les va a aplicar un estilo
Por ejemplo

Que es una clase
Una clase permite asignar un nombre a uno o varios elementos para poder aplicarles determinados estilo

Que es un id
Un id sirve para identificar un elemento especifico dentro del documento HTML

Que es el modelo de caja
Es la forma en que CSS representa los elementos como cajas
Estas cajas estan formadas por contenido, padding, border y margin

Que es margin
Es el espacio que queda fuera de un elemento

Que es padding

Es el espacio que queda dentro de un elemento entre el contenido y el borde

Que es border
Es el borde que rodea el contenido y el padding de un elemento

Que es Flexbox
Es un sistema de CSS que use para organizar elementos de una manera flexible dentro de un contenedor

Que hace display: flex
Convierte un elemento en un contenedor Flexbox y permite organizar los elementos que se encuentran dentro utilizando diferentes propiedades

Que hace justify-content
Controla como se distribuyen los elementos dentro del eje principal del contenedor Flexbox

Que hace align-items
Controla como se alinean los elementos en el eje secundario

Que es responsive design
Es una forma de diseñar paginas para que puedan adaptarse a diferentes tamaños de pantalla

Que es @media
Es una regla de CSS que permite aplicar diferentes estilos dependiendo de ciertas condiciones, como el ancho de la pantalla

Relacion entre HTML, CSS y PHP
HTML lo use para construir la estructura de la pagina
CSS lo use para cambiar la apariencia visual de esa estructura
PHP lo use para procesar la informacion en el servidor
En este proyecto HTML construye el formulario, CSS le da el diseño y PHP recibe y valida los datos que envia el usuario


Antes y despues
Antes
En la version anterior el sistema ya era funcional, pero utilizaba principalmente HTML y tenia un diseño bastante sencillo
El formulario funcionaba correctamente, pero visualmente todavia podia mejorar

Despues
Despues de aplicar CSS
Se agrego un encabezado
Cambie los colores
Diseñe el formulario
Agregue bordes y sombras
Mejore los espacios
Use Flexbox
Agregue una seccion de servicios disponibles
Diseñe la pagina de confirmacion
Diseñe la pagina de errores
Agregue diseño responsive
Use una combinacion de colores beige, crema y cafe

Reflexion final
Durante esta practica aprendi como funcionan los estilos css y la importancia de estos, ya que es lo que hace que una pagina se vea mejor, es la que le da la "vida", aprendi la diferencia de cada cosa como lo es php que sirve para procesar la informacion al servidor, html que es la que da la estructura de la pagina y css que es la que da el estilo. con esta practica organice mas mi pagina ademas de que se ve mas bonita
