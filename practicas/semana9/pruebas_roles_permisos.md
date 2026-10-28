 Semana9 pruebas de roles y permisos

 Objetivo

Comprobar que los roles implementados en el sistema de citas funcionen correctamente y que cada usuario pueda realizar solamente las operaciones permitidas.

 Usuarios utilizados

- Administrador: `admin`
- Consulta: `consulta`

 Pruebas realizadas

| Numero | Prueba | Resultado esperado | Resultado obtenido |
|---|---|---|---|
| 1 | Iniciar sesion como administrador | Acceso al panel de administrador | Correcto |
| 2 | Iniciar sesion como consulta | Acceso al panel de consulta | Correcto |
| 3 | Consultar citas como administrador | Mostrar las citas registradas | Correcto |
| 4 | Consultar citas como consulta | Mostrar las citas registradas | Correcto |
| 5 | Registrar una cita como administrador | Permitir el registro | Correcto |
| 6 | Editar una cita como administrador | Permitir modificar los datos | Correcto |
| 7 | Eliminar una cita como administrador | Permitir eliminar el registro | Correcto |
| 8 | Ver formulario como consulta | No mostrar el formulario | Correcto |
| 9 | Ver botones de edicion como consulta | No mostrar los botones | Correcto |
| 10 | Acceder a editar.php como consulta | Mostrar error 403 | Correcto |
| 11 | Enviar POST a eliminar.php como consulta | Responder con error 403 | Correcto |
| 12 | Cerrar sesion | Finalizar la sesion del usuario | Correcto |

 Prueba de acceso no autorizado

Se inicio sesion utilizando el usuario de consulta.

Despues se intento acceder directamente al archivo `editar.php` mediante la URL.

El sistema mostro un mensaje de acceso denegado y respondio con el codigo HTTP 403.

Tambien se realizo una solicitud POST al archivo `eliminar.php` desde la consola del navegador.

El resultado obtenido fue el codigo HTTP 403, por lo que se comprobo que el usuario de consulta no podia realizar esa operacion.

 Prueba del administrador

Se inicio sesion con el usuario administrador y se realizaron las operaciones principales del sistema.

Se registro una cita de prueba, se modifico su informacion y posteriormente se elimino.

Las operaciones se realizaron correctamente.

 Resultados

Las pruebas permitieron comprobar que los dos roles funcionan de acuerdo con los permisos establecidos.

El administrador puede realizar las operaciones CRUD, mientras que el usuario de consulta solamente puede visualizar los registros.

La proteccion de las rutas PHP impide que un usuario sin permisos realice operaciones administrativas.

 Conclusion

Las pruebas fueron importantes para verificar que el control de acceso funciona tanto en la interfaz como en el servidor.

Con esto se comprobo que los usuarios tienen diferentes permisos y que el sistema bloquea los intentos de acceso no autorizado.