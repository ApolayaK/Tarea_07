# Tarea 07 – Registro y Login con Avatar

En esta tarea se implementará un sistema de **registro y login** en CodeIgniter 4.

- El usuario podrá **registrarse** con nombre, contraseña y un **avatar opcional**.  
- Si no sube avatar, se guardará como **NULL** en la base de datos.  
- Después del registro se redirigirá al **login**.  
- Con credenciales correctas accederá al **Dashboard**, donde se mostrará:  
  - Su nombre de usuario.  
  - Su avatar (o una imagen por defecto si no tiene).  
  - La opción de **cerrar sesión**.  

La base de datos se llamará **`miapp`** y la tabla `usuarios` se gestionará con **migraciones y semillas**.
