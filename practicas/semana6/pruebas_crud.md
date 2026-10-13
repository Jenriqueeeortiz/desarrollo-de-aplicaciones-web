semana6 - pruebas del crud

proyecto
sistema de citas para salon de belleza

entidad utilizada
citas

base de datos
salon_belleza

tabla
citas

pruebas realizadas

prueba 1 - registrar una cita

se registro una cita mediante el formulario con los datos solicitados.

resultado: la cita se guardo correctamente en mysql y aparecio en la tabla de registros.

#prueba 2 - consultar citas

se consultaron las citas almacenadas desde la pagina principal.

resultado: se mostraron los registros guardados en la base de datos.

prueba 3 - editar una cita

se selecciono una cita mediante el boton editar, se modificaron sus datos y se guardaron los cambios.

resultado: la informacion se actualizo correctamente y los cambios permanecieron al consultar nuevamente.

prueba 4 - eliminar una cita

se selecciono una cita de prueba y se confirmo su eliminacion.

resultado: el registro fue eliminado y dejo de aparecer en la tabla.

prueba 5 - validar campos obligatorios

se intento enviar el formulario sin completar los datos requeridos.

resultado: el sistema rechazo los datos incompletos mediante las validaciones correspondientes.

prueba 6 - identificador inexistente

se intento consultar una cita utilizando un identificador que no existia.

resultado: el sistema mostro un mensaje indicando que la cita no existe.

prueba 7 - confirmacion de eliminacion

se selecciono eliminar una cita y se cancelo la confirmacion.

resultado: la cita permanecio registrada sin modificaciones.
conclusion

las operaciones de crear, consultar, actualizar y eliminar funcionan correctamente. los datos se administran mediante php y mysql, utilizando consultas preparadas y validaciones para evitar operaciones incorrectas.