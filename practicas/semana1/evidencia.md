Semana 1 - Primera pagina web con php

Objetivo:
Nuestro objetivo es construir nuestra primera pagina funcional mediante el uso de php, html, ademas de agregarle estilos con css, ademas de comprender los fundamentos de la pagina.

Aplicacion web:
Es un programa que fuunciona por medio de un navegador web en la cual el usuario puede interactuar con la pagina, ya sea al llenar algun formulario, dar click, etc. no es una pagina en la que solo puede leer.

Cliente y servidor:
El cliente es el usuario, el que esta accediendo a la pagina, y el servidor es a lo que el usuario se esta conectando, es al punto donde llega y envia lo que el usuario solicita de la pagina.

HTTP:
significa hypertext transfer protocol, es el protocolo que se utiliza para la comunicacion con el cliente y el servidor. cuando se solicita una pagina el navegador hace una solicitud http al servidor.

php:
es un lenguaje de programacion que se utiliza principalmente para desarrollar aplicaciones web del lado del servidor.

html:
significa hypertext markup language, se usa para estructurar el contenido de una pagina web.

localhost:
como el nombre lo dice, es el servidor local que se utiliza generalmente para realizar pruebas, en este caso, nuestra computadora.

variable:
es un "objeto" al que se le asigna un valor y puede ser llamada despues dependiendo el valor que se le haya asignado. un ejemplo en la practica fue la variable "$cliente" la cual se uso para asignar el nombre del cliente. las variables pueden ser de tipo string que es para palabras e int o float para variables numericas.

operadores:
son los que se utilizan para realizar las diferentes operaciones matematicas, en este caso use la multiplicacion, con los valores $tiempoDisponible = $duracionServicio * $citasDisponibles.

php + html:

php lo utilice para dentro del documento html para mostrar los datos almacenados en las variables. 
<p><strong>Cliente:</strong> <?php echo $cliente; ?></p> <p><strong>Servicio:</strong> <?php echo $servicio; ?></p>
php muestra los datos y html los organiza.

experimento con herramientas de desarrollador:
En network/red salian las solicitudes realizadas por el navegador al servidor local.
se observo el la solicitud get en la pagina principal
el codigo de respuesta fue 200 que es exitoso.

pruebas realizadas:
inicie el servidor local con php utilizando git bash y poniendo en la terminal php -S localhost:8000
abri la direccion http://localhost:8000
la pagina se mostro correctamente
aparecia el nombre del cliente, el servicio solicitado, la duracion del servicio, la cantidad de citas disponibles y se realizo una operacion matematica
y al final revise las solicitudes mdienate las herramientasd de desarrollador

problemas encontrados:
el unico problema que tuve fue al ejecutar en el servidor local ya que no tenia configurado php, pero una vez configurado correctamente no surgio otro problema.

soluciones aplicadas
para solucionar el problema instale php en windows y agregue la ubicación de php a las variables de entorno del sistema
despues de hacerlo ejecute:
php -v para ver que estuviera instalado en la terminal
despues corri el servidor con php -S localhost:8000

que recibe el navegador?
el navegador hace una solicitud al servidor y php procesa el archivo index.php en el servidor y "crea" el contenido que pusimos
despues el navegador envia el resultado en html

reflexion final:
En esta practica aprendi los elementos basicos para crear una pagina con php, vi lo basico de http, local host, y vi como se relaciona php y html.
ademas de que logre crear las bases para desarrollar mi pagina para agendar citas.

