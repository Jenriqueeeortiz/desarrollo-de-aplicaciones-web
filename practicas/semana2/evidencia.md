semana 2 formularios

objetivo:
el objetivo de esta práctica fue continuar con la aplicación web del salón de belleza realizada en la semana 1, agregando formularios para que el usuario ingrese datos y asi procesar la informacion, usando get y post, ademas de usar php para que se validen correctamente los datos

aplicación web
es una pagina en la que el usuario puede interactuar, en la cual me estoy enfocando es en un sistema de citas para un salon de belleza
el usuario ingresa informacion para agendar una cita, tales como servicio, nombre, numero, correo, etc.
los servicios que se ofrece son:corte de cabello,keratina,tinte,peinado y maquillaje
la aplicacion recibe los datos del usuario y los procesa mediante php

formulario HTML:

cree un formulario HTML en el archivo `index.php`,el formulario contiene diferentes campos relacionados con el registro de una cita: nombre del cliente
telefono,correo electronico,servicio y fecha de la cita, tambien agregue un boton para enviar la informacion
el formulario usa action para enviar los datos a procesar.php

campos utilizados:
nombre:utilice un campo de texto:
html
<input type="text" id="nombre" name="nombre" required>


telefono
use un campo numerico:
html
<input type="number" id="telefono" name="telefono" required>

correo electrónico
html
<input type="email" id="email" name="email" required>

servicio
utilice un elemento `select`:

html
<select id="servicio" name="servicio" required>

fecha
utilice:
html
<input type="date" id="fecha" name="fecha" required>

GET:
primero hice una prueba con el metodo get
configure el formulario con:
html
<form action="procesar.php" method="GET">

con ese metodo cuando enviaba los datos aparecian los resultados en la barra del buscador con el signo `?`.
un ejemplo fue:

http://localhost:8000/procesar.php?nombre=enrique&telefono=4871347333&email=jenriqueee02%40gmail.com&servicio=Keratina&fecha=2026-09-12
comprobe que los datos llegaran y ademas hice una prueba camnbiando el valor de keratina a tinte desde la url, y cuando actualice la pagina se cambio correctamente, asi que comprobe que puedo cambiar los datos desde la url usando get

que significa GET?

GET es un método HTTP utilizado para enviar información al servidor mediante los parámetros de la URL.
sirve para usar sus datos para consultas rapidas, pero no es optimo si los datos no deben de aparecer en el buscador

POST

despues cambie el formulario para utilizar POST:
html
<form action="procesar.php" method="POST">


tambien modifique el formulario para que funcionara mediante `$_POST`.
`php
$nombre = $_POST['nombre'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$email = $_POST['email'] ?? '';
$servicio = $_POST['servicio'] ?? '';
$fecha = $_POST['fecha'] ?? '';
al realizar la prueba, los datos fueron recibidos y mostrados correctamente
y a diferencia de get, con post la url quedo:
http://localhost:8000/procesar.php
los valores no aparecian en la url

diferencia entre GET y POST

get coloca los datos mostrandolos en la url, y post envia los datos dentro de una solicitud http y no los muestra en la barra de la url
GET puede ser útil para consultas o busquedas, mientras que POST es más apropiado para enviar informacion de formularios y realizar acciones en el servidor.

recepcion de datos con PHP
PHP recibe los datos enviados por el formulario mediante variables especiales.

Para GET se usa:
php
$_GET


Para POST se usa:
php
$_POST

validaciones
agregue validaciones en `procesar.php` para comprobar que la informacion recibida sea valida
se valida:

el nombre, el telefono y el correo no esten vacios, que el telefono sean datos numeericos y que el correo sea un formato valido., tambien que hayas escogido fecha y servicio
para validarlos utilice:
php
filter_var($email, FILTER_VALIDATE_EMAIL)

para que el telefono sea numerico
php
is_numeric($telefono)

Mensajes de error:
cuando hay un error se almacena en php en un arreglo
php
if (empty($nombre)) {
    $errores[] = "El nombre es obligatorio.";
}
para el correo:
php
if (empty($email)) {
    $errores[] = "El correo electrónico es obligatorio.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Ingresa un correo electrónico válido.";
}
para el correo hice una prueba de error poniendo un correo no valido el cual fue "hola", y me llego un mensjae diciendo que tenia que ingresar un correo valido

mensaje de confirmación
cuando todos los datos cumplen con lo solicitado, se muestra el mensaje:
text
Cita registrada correctamente
después se muestran los datos enviados por el usuario los cuales son nombre, servicio, fecha, numero y correo para que el usuario corrobore su informacion
 
herramientas de desarrollador

durante la practica use las opciones de desarrollador para ver como funcionaba el formulario, en las pruebas se pudo ver la diferencia entre get y post, como ya las comente

experimento GET vs POST
realice pruebas con ambos metodos   
GET:
Al utilizar GET, los datos se veian en la url, ejemplo:
nombre=enrique&telefono=4871347333&email=...
desde la url pude realizar cambios

POST
con post no pude realizar cambios desde la url, pero al enviar los datos se recibieron correctamente

resultado
la principal diferencia observada fue que GET hace visibles los parámetros en la URL, mientras que POST envía los datos en el cuerpo de la solicitud HTTP

pruebas realizadas
Prueba 1: GET

Se llenó el formulario y se enviaron los datos mediante GET.

resultado: los datos fueron recibidos correctamente y aparecieron en la URL.
prueba 2: modifique los datos mediante GET
cambie los datos en la url
cambie:
servicio=Keratina
por:
servicio=Tinte
resultado: la página mostro el nuevo servicio

prueba 3: POST

cambie el formulario para utilizar POST
resultado: los datos fueron recibidos correctamente y la URL no mostro los valores enviados

prueba 4: Correo electronico incorrecto
puse un correo inválido:
hola
resultado: PHP detecto el error y mostro un mensaje indicando que se debía ingresar un correo electronico valido

prueba 5: datos correctos
puse datos correctos en todos los campos
resultado: PHP proceso los datos y mostro la informacion de la cita correctamente

problemas encontrados
durante la practica fue necesario cambiar la forma en que PHP recibia los datos cuando cambie de get a post

soluciones aplicadas

modifique `method` del formulario:
html
method="POST"

y modifique las variables en procesar.php
$_POST['nombre']
$_POST['telefono']
$_POST['email']
$_POST['servicio']
$_POST['fecha']
despues volvi a intentar y todo funciono correctamente

Investigacion

que es un formulario HTML?
es un elemento en html que permite que el usuario ingrese los propios valores que desea

que es un input?
un elemento html que permite que el usuario ingrese su info

que es el atributo name?
es el nombre que identifica lo asignado en el formulario

que es action?
es lo que indica hacia donde se enviara la info del formulario, es decir el archivo

que es method?
es lo que indica que metodo usara http para recibir el formulario

que es GET?
es un metodo http que envia los valores por medio de la url

que es POST?
es un metodo HTTP que envia los datos dentro del cuerpo de la solicitud

que es $_GET?
es una variable de PHP que permite acceder a los datos recibidos mediante get

Que es $_POST?
es una variable de PHP que permite acceder a los datos recibidos mediante post.

que es una validación?
es una comprobacion para validar que los datos puestos sean correctos acorde a lo solicitado

que es un mensaje de error?
es un mensaje que informa al usuario que existe un problema con los datos introducidos

que es un mensaje de confirmacion?
es un mensaje que informa al usuario que la operacion se realizo correctamente

recorrido de los datos
el usuario comienza introduciendo sus datos en el formulario HTML
cada campo tiene un atributo `name`, que permite identificar el dato
al presionar el boton de envio, el navegador crea una solicitud HTTP utilizando el metodo configurado, GET o POST
el servidor recibe la solicitud y PHP obtiene los datos mediante `$_GET` o `$_POST`
despues PHP realiza las validaciones correspondientes
si encuentra errores, muestra mensajes para que el usuario pueda corregirlos
si los datos son correctos, PHP procesa la informacion y muestra un mensaje de confirmacion junto con los datos de la cita.
al final el servidor devuelve una respuesta y el navegador muestra el resultado al usuario.

reflexion final
En esta práctica aprendí cómo hacer que una aplicacion web deje de ser solamente una pagina que muestra informacion y permita al usuario interactuar con ella, aprendi a
utilizar formularios en html usando los metodos get y post, aprendi a diferenciar ambos siendo la principal que con get los datos introducidos se ven en el url y desde ahi se pueden modificar, siendo que con post no, aprendi que es importante validar la info antes de procesarla, ya que en la practica valide los datos, este sistema de formulario hace que el sistema de citas sea mas funcional
