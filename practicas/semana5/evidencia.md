  semana 05 - php + mysql

  objetivo

el objetivo de esta practica fue continuar con el desarrollo del sistema de citas para el salon de belleza e integrar una base de datos mysql.

en las semanas anteriores la aplicacion ya permitia capturar informacion mediante un formulario, validar los datos con javascript y procesarlos con php. en esta semana se agrego mysql para poder guardar las citas de manera permanente y posteriormente consultarlas y mostrarlas dentro de la aplicacion.

  aplicacion web

se continuo trabajando con el mismo proyecto de las semanas anteriores, que consiste en un sistema web para agendar citas en un salon de belleza.

el sistema permite registrar los siguientes datos:

nombre del cliente

telefono

correo electronico

servicio

fecha de la cita

los servicios disponibles son:

corte de cabello

keratina

tinte

peinado

maquillaje

en esta version los datos ya no solamente son recibidos por php, sino que tambien son almacenados dentro de una base de datos mysql.

  base de datos

para esta practica se utilizo mysql como sistema gestor de base de datos.

la base de datos permite almacenar las citas registradas desde la aplicacion para que la informacion permanezca guardada y pueda ser consultada posteriormente.

antes de comenzar se comprobo que mysql estuviera instalado y funcionando correctamente.

  nombre de la base de datos

la base de datos utilizada para el proyecto se llama:

`salon_belleza`

para crearla se utilizo el comando:

```sql
create database salon_belleza;
```

posteriormente se selecciono con:

```sql
use salon_belleza;
```

  tabla principal

dentro de la base de datos se creo una tabla llamada:

`citas`

esta tabla se utiliza para almacenar la informacion de cada cita registrada desde el formulario.

la tabla fue creada con los campos necesarios para relacionarla directamente con los datos que ya se utilizaban en el proyecto.

  campos de la tabla

la tabla `citas` contiene los siguientes campos:

id

nombre

telefono

email

servicio

fecha

cada campo tiene una funcion especifica. el id identifica cada cita, mientras que los demas campos almacenan la informacion proporcionada por el usuario.

  llave primaria

el campo `id` se utilizo como llave primaria de la tabla.

```sql
id int auto_increment primary key
```

la llave primaria permite identificar de manera unica cada registro dentro de la tabla.

de esta forma, aunque existan dos personas con el mismo nombre o servicio, cada cita sigue teniendo un identificador diferente.

  tipos de datos

se utilizaron diferentes tipos de datos dependiendo de la informacion que se necesitaba almacenar.

la estructura principal fue:

```sql
create table citas (
    id int auto_increment primary key,
    nombre varchar(100) not null,
    telefono varchar(20) not null,
    email varchar(150) not null,
    servicio varchar(50) not null,
    fecha date not null
);
```

`int` se utilizo para el identificador.

`varchar` se utilizo para datos de texto como nombre, telefono, correo y servicio.

`date` se utilizo para almacenar la fecha de la cita.

  auto_increment

se utilizo `auto_increment` en el campo `id`.

esto permite que mysql asigne automaticamente un numero diferente a cada nueva cita.

por ejemplo, si el primer registro tiene el id 1, el siguiente puede recibir el id 2 sin necesidad de escribirlo manualmente.

  comandos sql utilizados

durante la practica se utilizaron diferentes comandos sql para crear, consultar y modificar informacion.

entre los principales comandos utilizados estuvieron:

`create database`

`use`

`create table`

`show tables`

`describe`

`insert`

`select`

`where`

`update`

`delete`

`alter table`

las consultas utilizadas durante la practica tambien fueron guardadas en el archivo `consultas.sql`.

  insert

el comando `insert` se utilizo para agregar registros a la tabla.

primero se realizo una prueba directamente desde mysql:

```sql
insert into citas (nombre, telefono, email, servicio, fecha)
values ('Enrique Ortiz', '4441234567', 'enrique@gmail.com', 'Keratina', '2026-10-10');
```

posteriormente se utilizo un `insert` desde php para guardar automaticamente la informacion enviada desde el formulario.

de esta manera las citas registradas desde la pagina quedan almacenadas en mysql.

  select

el comando `select` se utilizo para consultar la informacion almacenada.

una de las consultas utilizadas fue:

```sql
select * from citas;
```

tambien se realizaron consultas seleccionando solamente algunos campos:

```sql
select nombre, servicio from citas;
```

esto permitio comprobar que la informacion habia sido almacenada correctamente.

  conexion php + mysql

para comunicar php con mysql se utilizo la extension `mysqli`.

la conexion permite que php envie consultas a la base de datos y reciba los resultados.

durante esta parte se comprobo que php pudiera conectarse correctamente con la base de datos `salon_belleza`.

  archivo conexion.php

se creo el archivo:

`conexion.php`

este archivo contiene los datos necesarios para establecer la conexion con mysql.

se utilizaron los siguientes datos:

servidor

usuario

contraseña

nombre de la base de datos

tambien se agrego una comprobacion para detectar posibles errores durante la conexion.

al principio se presento un problema porque php no tenia habilitada la extension `mysqli`.

para solucionarlo se modifico el archivo `php.ini` y se habilito:

```text
extension=mysqli
```

despues de realizar este cambio se comprobo nuevamente la conexion y php pudo comunicarse correctamente con mysql.

  formulario

se mantuvo el formulario utilizado desde las semanas anteriores.

el usuario puede ingresar su nombre, telefono, correo electronico, seleccionar un servicio y elegir una fecha.

al enviar el formulario, los datos son enviados mediante el metodo post hacia `procesar.php`.

  guardar informacion

el archivo `procesar.php` recibe la informacion enviada desde el formulario.

despues de realizar las validaciones correspondientes, php utiliza la conexion con mysql para guardar la cita dentro de la tabla `citas`.

para realizar el registro se utilizo una consulta `insert`.

se comprobo el funcionamiento registrando una cita desde la pagina y posteriormente utilizando:

```sql
select * from citas;
```

la cita registrada desde el formulario aparecio correctamente dentro de mysql.

  consultar informacion

ademas de guardar informacion, php tambien se utilizo para consultar los registros existentes.

se realizo una consulta similar a:

```sql
select * from citas order by fecha asc;
```

esto permite obtener las citas registradas y ordenarlas de acuerdo con su fecha.

tambien se realizaron pruebas utilizando `where`.

por ejemplo:

```sql
select * from citas
where servicio = 'Keratina';
```

con `where` se pueden consultar solamente los registros que cumplen con una condicion determinada.

  mostrar informacion

los resultados obtenidos desde mysql se mostraron dentro de la pagina utilizando php y html.

se creo una tabla donde se muestran:

id

nombre

telefono

correo

servicio

fecha

de esta manera el usuario puede registrar una cita y posteriormente verla dentro de la misma aplicacion.

  validaciones

se conservaron las validaciones realizadas en las semanas anteriores.

javascript valida la informacion antes de enviar el formulario y php vuelve a comprobar los datos en el servidor.

entre las validaciones se encuentran:

nombre obligatorio

longitud minima del nombre

telefono obligatorio

cantidad correcta de numeros

correo electronico valido

servicio seleccionado

fecha seleccionada

fecha posterior al dia actual

esto evita guardar informacion incorrecta dentro de la base de datos.

  javascript

javascript continua funcionando del lado del navegador.

se utiliza para detectar eventos, manipular elementos del dom, mostrar mensajes dinamicos y validar el formulario antes de enviarlo.

aunque javascript ayuda a detectar errores rapidamente, no sustituye las validaciones realizadas con php.

  css

se mantuvo la hoja de estilos utilizada anteriormente.

css se utiliza para controlar la presentacion de la aplicacion, incluyendo:

colores

tipografia

formularios

botones

mensajes

secciones

tabla de citas

diseño adaptable

tambien se agregaron estilos para mostrar de forma ordenada los registros obtenidos desde mysql.

  experimentos realizados

durante la practica se realizaron diferentes experimentos con la base de datos.

primero se insertaron registros manualmente utilizando `insert`.

despues se utilizaron diferentes consultas con `select` para comprobar la informacion almacenada.

tambien se utilizo `where` para filtrar registros.

se realizo una prueba con `update` para modificar el servicio de una cita:

```sql
update citas
set servicio = 'Maquillaje'
where id = 1;
```

tambien se realizo una prueba con `delete` utilizando un registro creado especificamente para eliminarlo.

```sql
delete from citas
where id = 4;
```

el id utilizado depende del registro generado durante la prueba.

finalmente se utilizo `alter table` para agregar un nuevo campo:

```sql
alter table citas
add column observaciones varchar(200);
```

despues se utilizo:

```sql
describe citas;
```

para comprobar que el nuevo campo habia sido agregado correctamente.

  problemas encontrados

uno de los principales problemas encontrados fue que al intentar realizar la conexion desde php aparecia el siguiente error:

```text
class "mysqli" not found
```

esto impedia utilizar `new mysqli()` desde el archivo `conexion.php`.

tambien se realizaron pruebas intencionales modificando los datos de conexion para observar como responde php cuando no puede conectarse con mysql.

  errores de conexion

el error `class "mysqli" not found` ocurrio porque la extension `mysqli` no estaba habilitada en la instalacion de php utilizada por el proyecto.

tambien se probo colocar temporalmente una contraseña incorrecta dentro de `conexion.php`.

al hacer esto php no pudo acceder al servidor mysql debido a que las credenciales eran incorrectas.

este experimento permitio observar la importancia de configurar correctamente los datos de conexion.

  soluciones aplicadas

para solucionar el problema de `mysqli` primero se comprobo el archivo de configuracion utilizado por php mediante:

```text
php --ini
```

se encontro que php estaba utilizando:

```text
c:\php\php.ini
```

posteriormente se habilito la extension:

```text
extension=mysqli
```

despues de realizar este cambio se comprobo nuevamente el funcionamiento y la conexion con mysql se realizo correctamente.

en la prueba de contraseña incorrecta, la solucion fue volver a colocar las credenciales correctas dentro de `conexion.php`.

  investigacion

  que es una base de datos

una base de datos es una forma organizada de almacenar informacion para poder consultarla, modificarla y utilizarla posteriormente.

  que es mysql

mysql es un sistema gestor de bases de datos relacionales que permite almacenar y administrar informacion utilizando sql.

  que es sql

sql es un lenguaje utilizado para trabajar con bases de datos relacionales. permite crear tablas, insertar informacion, consultar registros, modificarlos y eliminarlos.

  que es una tabla

una tabla es una estructura dentro de una base de datos donde la informacion se organiza mediante filas y columnas.

  que es un registro

un registro corresponde a una fila de una tabla. en este proyecto cada registro representa una cita.

  que es un campo

un campo corresponde a una columna de la tabla y representa un dato especifico, como nombre, telefono o fecha.

  que es una llave primaria

una llave primaria es un campo que identifica de manera unica cada registro de una tabla.

  que es auto_increment

`auto_increment` permite generar automaticamente valores numericos consecutivos para un campo.

  que es varchar

`varchar` es un tipo de dato utilizado para almacenar texto de longitud variable.

  que es date

`date` es un tipo de dato utilizado para almacenar fechas.

  que es insert

`insert` permite agregar nuevos registros a una tabla.

  que es select

`select` permite consultar informacion almacenada dentro de una tabla.

  que es where

`where` permite establecer condiciones para seleccionar solamente determinados registros.

  que es update

`update` permite modificar informacion existente dentro de una tabla.

que es delete

`delete` permite eliminar registros de una tabla.

que es alter table

`alter table` permite modificar la estructura de una tabla existente, por ejemplo agregando una nueva columna.

que es mysqli

`mysqli` es una extension de php que permite establecer una conexion y trabajar con bases de datos mysql.

que es persistencia de datos

la persistencia de datos significa que la informacion permanece almacenada aunque se cierre la pagina o termine la ejecucion del programa.

relacion entre php y mysql

php y mysql trabajan juntos para procesar y almacenar informacion.

php recibe los datos enviados desde el formulario, realiza las validaciones y ejecuta las consultas necesarias.

mysql se encarga de almacenar los registros de manera permanente.

en este proyecto php funciona como intermediario entre la pagina web y la base de datos.

relacion entre javascript, php y mysql

javascript, php y mysql tienen responsabilidades diferentes dentro de la aplicacion.

javascript funciona principalmente en el navegador y permite validar los datos antes de enviarlos.

php recibe la informacion en el servidor, vuelve a validarla y realiza las operaciones necesarias.

mysql almacena la informacion de las citas.

el flujo utilizado en el proyecto es:

```text
usuario
   |
   v
formulario html
   |
   v
javascript
   |
   v
php
   |
   v
mysql
```

para consultar informacion se realiza el proceso contrario:

```text
mysql
   |
   v
php
   |
   v
html
   |
   v
usuario
```

antes y despues

antes de esta practica el sistema podia recibir y validar los datos de una cita, pero la informacion no quedaba almacenada permanentemente.

si se cerraba la pagina, los datos procesados no formaban parte de un sistema de almacenamiento.

despues de integrar mysql, las citas quedan registradas dentro de una base de datos.

tambien es posible consultar los registros y mostrarlos nuevamente dentro de la pagina mediante php.

esto hace que el proyecto se acerque mas al funcionamiento de una aplicacion web real.

reflexion final

en esta practica aprendi como conectar una aplicacion desarrollada con php a una base de datos mysql.

tambien comprendi mejor la utilidad de comandos como `insert`, `select`, `where`, `update`, `delete` y `alter table`.

una de las partes que mas me ayudo a comprender el funcionamiento fue registrar una cita desde el formulario y despues comprobar que realmente aparecia dentro de mysql.

tambien pude observar que cada tecnologia tiene una funcion diferente. html crea la estructura, css controla la apariencia, javascript permite agregar interactividad y validaciones, php procesa la informacion en el servidor y mysql permite almacenarla.

con esta practica el sistema de citas ya puede guardar y consultar informacion, lo cual representa una mejora importante respecto a las versiones realizadas durante las semanas anteriores.