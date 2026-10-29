# ElectroStore — gestión de productos (proyecto formativo)

Aplicación web de práctica con PHP y MySQL para registrar, consultar y modificar productos.

## Tecnologías
- PHP y MySQL (mysqli)
- HTML5, CSS3 y JavaScript

## Configuración local
1. Configurar Apache, PHP y MySQL (por ejemplo con XAMPP).
2. Crear la base de datos y las tablas correspondientes al proyecto.
3. Definir en el entorno del servidor **DB_HOST**, **DB_USER**, **DB_PASSWORD** y **DB_NAME** (no subir contraseñas al repositorio).
4. Abrir `index2.html` desde el servidor local.

> Si previamente se subió una contraseña, **cámbiala** en MySQL. Eliminarla de la versión actual no la borra del historial de Git.

## Estado y limitaciones
- Las consultas de inserción, búsqueda y edición han recibido mejoras de seguridad en esta rama.
- **Sin pruebas de integración contra una base de datos real**.
- La función de baja de productos no está implementada completamente.
- No se recomienda desplegarlo públicamente ni usarlo con datos reales sin completar pruebas y revisión.
