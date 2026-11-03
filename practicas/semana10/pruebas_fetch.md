
 Semana 10 - Pruebas de Fetch API

 Objetivo

Comprobar el funcionamiento de la busqueda de citas mediante Fetch API, verificando la comunicacion entre JavaScript, PHP y MySQL.

 Pruebas realizadas

| No. | Prueba | Resultado esperado | Estado |
|---|---|---|---|
| 1 | Abrir el sistema | La pagina carga correctamente | correcto |
| 2 | Buscar por nombre | Se muestran las citas coincidentes | correcto |
| 3 | Buscar por servicio | Se muestran las citas del servicio | correcto |
| 4 | Buscar sin escribir texto | Se muestran todas las citas | correcto |
| 5 | Buscar un dato inexistente | Se muestra un mensaje sin resultados | correcto |
| 6 | Comprobar Fetch API | La pagina no se recarga completamente | correcto |
| 7 | Revisar respuesta JSON | El endpoint devuelve JSON valido | correcto |
| 8 | Enviar una busqueda demasiado larga | PHP rechaza la solicitud | correcto |
| 9 | Consultar sin iniciar sesion | El endpoint rechaza el acceso | correcto |
| 10 | Buscar como administrador | Se muestran las acciones de editar y eliminar | correcto |
| 11 | Buscar como usuario de consulta | Se muestran los registros en solo lectura | correcto |
| 12 | Intentar modificar como consulta | PHP rechaza la operacion | correcto |
| 13 | Provocar un error de comunicacion | Se muestra un mensaje de error | correcto |
| 14 | Comprobar el CRUD tradicional | Registrar, editar y eliminar siguen funcionando | correcto |
| 15 | Cerrar sesion | El usuario pierde acceso a las paginas privadas | correcto |

 Resultados

Las pruebas permiten verificar que la busqueda utiliza peticiones asincronas y que los permisos siguen aplicandose desde el servidor.

Los estados se actualizaran de acuerdo con los resultados obtenidos durante la ejecucion.

 Errores y correcciones

Registrar aqui los errores encontrados durante las pruebas y explicar como se solucionaron.
