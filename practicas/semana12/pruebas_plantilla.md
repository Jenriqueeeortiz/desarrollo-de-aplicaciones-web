
 Semana 12 - Pruebas de la plantilla general

 Objetivo

Comprobar que los componentes reutilizables y la plantilla general funcionen correctamente en las diferentes paginas del sistema de citas para el salon de belleza.

 Entorno de pruebas

- Lenguaje: PHP
- Base de datos: MySQL
- Servidor local: localhost:8000
- Navegador web
- Estructura MVC
- Plantilla general reutilizable

 Prueba 1 - Panel de usuario

Se ingreso al sistema con una cuenta valida y se abrio panel.php.

Resultado esperado:
Se muestra el encabezado, el menu de navegacion, el contenido del panel y el pie de pagina.

 Prueba 2 - Pagina de citas

Se abrio index.php desde el menu de navegacion.

Resultado esperado:
La pagina muestra el formulario de registro para administradores, el buscador y la tabla de citas, utilizando la misma plantilla general.

 Prueba 3 - Edicion de citas

Se selecciono la opcion de editar una cita desde index.php.

Resultado esperado:
Se abre editar.php con los datos correspondientes y se muestran los componentes reutilizables.

 Prueba 4 - Menu de navegacion

Se utilizaron los enlaces del menu para cambiar entre el panel y la pagina de citas.

Resultado esperado:
Los enlaces funcionan correctamente y mantienen la misma apariencia.

 Prueba 5 - Roles de usuario

Se revisaron los permisos de administrador y consulta.

Resultado esperado:
El administrador puede registrar, editar y eliminar citas. El usuario de consulta solamente puede visualizar la informacion.

 Prueba 6 - Busqueda con Fetch API

Se realizo una busqueda de citas utilizando el campo de busqueda.

Resultado esperado:
La tabla se actualiza sin recargar toda la pagina.

 Prueba 7 - Estilos compartidos

Se revisaron las paginas index.php, panel.php y editar.php.

Resultado esperado:
Las tres paginas mantienen los mismos colores beige, cafe y crema, asi como un encabezado, menu y pie de pagina consistentes.

 Prueba 8 - Seguridad

Se verifico que las paginas protegidas requieran una sesion activa y que la edicion de citas este limitada al administrador.

Resultado esperado:
Los usuarios sin autorizacion no pueden modificar citas y los formularios conservan la proteccion CSRF.

 Resultado general

Durante las pruebas realizadas se comprobo el funcionamiento general de la plantilla y de los componentes reutilizables.

Las paginas conservaron las funciones desarrolladas anteriormente, incluyendo el manejo de roles, las operaciones CRUD y la busqueda mediante Fetch API.

 
 Conclusion

Las pruebas permitieron comprobar que la plantilla general puede utilizarse en diferentes paginas sin afectar las funciones principales del sistema.

La reutilizacion de componentes facilita el mantenimiento y permite conservar una apariencia uniforme.
