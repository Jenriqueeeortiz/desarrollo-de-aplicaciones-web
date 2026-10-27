semana8  auditoria de seguridad

 proyecto

sistema de citas para salon de belleza

base de datos

salon_belleza

inventario de seguridad

| archivo | datos que recibe | riesgo que se revisara | medida de seguridad |
|---|---|---|---|
| index.php | registros de mysql | mostrar codigo html no seguro | htmlspecialchars |
| procesar.php | datos de citas | datos invalidos e inyeccion sql | validaciones php y consultas preparadas |
| editar.php | id de la cita | identificador invalido | validar id y consultar mediante parametros |
| actualizar.php | id y datos modificados | modificaciones incorrectas | validaciones y consulta preparada |
| eliminar.php | id de la cita | eliminacion no autorizada | post, sesion y consulta preparada |
| login_form.php | usuario y contraseña | exposicion de credenciales | formulario post |
| login.php | credenciales | acceso no autorizado | password_verify y consultas preparadas |
| panel.php | datos de sesion | acceso sin autenticacion | proteger.php |
| proteger.php | sesion activa | acceso a paginas privadas | comprobacion de sesion |
| logout.php | sesion activa | sesion abierta | destruccion de sesion |
| conexion.php | datos de mysql | exposicion de contraseña | configuracion local protegida |

reglas de validacion

el nombre del cliente debe contener entre 3 y 100 caracteres.

el telefono debe contener exactamente 10 numeros.

el correo electronico debe tener un formato valido.

el servicio debe corresponder a una de las opciones disponibles.

la fecha de la cita debe ser posterior a la fecha actual.

el identificador de la cita debe ser un numero entero positivo.

aspectos por comprobar

validaciones del servidor

consultas preparadas

escape de datos html

contraseñas almacenadas como hash

proteccion de sesiones

cierre de sesion

manejo de errores

proteccion de credenciales

observaciones

esta tabla representa la revision inicial. las medidas deben verificarse en el codigo y actualizarse con los resultados reales de las pruebas.