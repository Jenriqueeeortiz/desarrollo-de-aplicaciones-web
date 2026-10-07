-- ============================================
-- SEMANA 05 - PHP + MYSQL
-- SISTEMA DE CITAS - SALON DE BELLEZA
-- ============================================


-- CREAR LA BASE DE DATOS
CREATE DATABASE salon_belleza;


-- SELECCIONAR LA BASE DE DATOS
USE salon_belleza;


-- COMPROBAR LA BASE DE DATOS ACTUAL
SELECT DATABASE();


-- CREAR LA TABLA DE CITAS
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(150) NOT NULL,
    servicio VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL
);


-- MOSTRAR LAS TABLAS
SHOW TABLES;


-- MOSTRAR LA ESTRUCTURA DE LA TABLA
DESCRIBE citas;


-- OTRA FORMA DE MOSTRAR LOS CAMPOS
SHOW COLUMNS FROM citas;


-- ============================================
-- INSERT
-- ============================================

-- INSERTAR UNA CITA DE PRUEBA
INSERT INTO citas (nombre, telefono, email, servicio, fecha)
VALUES (
    'Enrique Ortiz',
    '4441234567',
    'enrique@gmail.com',
    'Keratina',
    '2026-10-10'
);


-- ============================================
-- SELECT
-- ============================================

-- MOSTRAR TODAS LAS CITAS
SELECT * FROM citas;


-- MOSTRAR SOLO NOMBRE Y SERVICIO
SELECT nombre, servicio
FROM citas;


-- BUSCAR CITAS DE KERATINA
SELECT * FROM citas
WHERE servicio = 'Keratina';


-- BUSCAR CITAS POR NOMBRE
SELECT * FROM citas
WHERE nombre = 'Enrique Ortiz';


-- BUSCAR CITAS POSTERIORES A UNA FECHA
SELECT * FROM citas
WHERE fecha > '2026-10-01';


-- ============================================
-- UPDATE
-- ============================================

-- CAMBIAR EL SERVICIO DE UNA CITA
UPDATE citas
SET servicio = 'Maquillaje'
WHERE id = 1;


-- COMPROBAR EL CAMBIO
SELECT * FROM citas
WHERE id = 1;


-- REGRESAR EL SERVICIO A KERATINA
UPDATE citas
SET servicio = 'Keratina'
WHERE id = 1;


-- ============================================
-- DELETE
-- ============================================

-- CREAR UN REGISTRO PARA PROBAR DELETE
INSERT INTO citas (nombre, telefono, email, servicio, fecha)
VALUES (
    'Prueba Eliminar',
    '4440000000',
    'prueba@gmail.com',
    'Tinte',
    '2026-10-20'
);


-- VER LOS REGISTROS
SELECT * FROM citas;


-- ELIMINAR EL REGISTRO DE PRUEBA
-- CAMBIAR EL ID POR EL QUE TENGA "Prueba Eliminar"
DELETE FROM citas
WHERE id = 4;


-- COMPROBAR QUE SE ELIMINO
SELECT * FROM citas;


-- ============================================
-- ALTER TABLE
-- ============================================

-- AGREGAR UNA NUEVA COLUMNA
ALTER TABLE citas
ADD COLUMN observaciones VARCHAR(200);


-- COMPROBAR LA NUEVA ESTRUCTURA
DESCRIBE citas;


-- ============================================
-- CONSULTAS FINALES
-- ============================================

-- MOSTRAR TODAS LAS CITAS
SELECT * FROM citas;


-- MOSTRAR CITAS ORDENADAS POR FECHA
SELECT * FROM citas
ORDER BY fecha ASC;


-- MOSTRAR CITAS DE UN SERVICIO
SELECT * FROM citas
WHERE servicio = 'Keratina';


-- MOSTRAR SOLO ALGUNOS CAMPOS
SELECT nombre, telefono, servicio, fecha
FROM citas;