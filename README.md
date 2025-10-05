# Sistema de Login con Registro y Avatar - MiApp

Sistema de autenticación de usuarios desarrollado con CodeIgniter 4, que incluye registro, login, dashboard y gestión de avatares.

## Requisitos

- PHP 8.1 o superior
- MySQL 5.7 o superior
- Composer
- CodeIgniter 4

## Base de Datos

**Nombre de la BD:** `miapp`

### Tabla: usuarios

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | INT(11) | Clave primaria, auto-increment |
| nombres | VARCHAR(80) | Nombre completo del usuario |
| nomusuario | VARCHAR(40) | Nombre de usuario (único) |
| claveacceso | VARCHAR(255) | Contraseña encriptada |
| img_avatar | VARCHAR(255) | Ruta del avatar (nullable) |
| create_at | DATETIME | Fecha de creación |
| update_at | DATETIME | Fecha de actualización |

## Instalación

### 1. Configurar la base de datos

Edita el archivo `.env`:

```env
database.default.hostname = localhost
database.default.database = miapp
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### 2. Crear migración

```bash
php spark make:migration TUsuarios
```

### 3. Ejecutar migración

```bash
php spark migrate
```

### 4. Crear seeder

```bash
php spark make:seeder SUsuarios
```

### 5. Ejecutar seeder

```bash
php spark db:seed SUsuarios
```

### 6. Crear carpeta para avatares

```bash
mkdir -p public/images/users
```

## Estructura del Proyecto

```
app/
├── Controllers/
│   ├── UsuarioController.php    # Maneja registro, login, perfil
│   └── DashboardController.php  # Dashboard principal
├── Models/
│   └── Usuario.php               # Modelo de usuarios
├── Views/
│   ├── home/
│   │   ├── registro.php         # Formulario de registro
│   │   └── login.php            # Formulario de login
│   ├── usuario/
│   │   └── perfil.php           # Perfil del usuario
│   └── dashboard.php            # Dashboard principal
└── Database/
    ├── Migrations/
    │   └── XXXX_TUsuarios.php   # Migración de tabla usuarios
    └── Seeds/
        └── SUsuarios.php         # Datos iniciales
```

## Funcionalidades

### 1. Registro de Usuario
- Formulario con: nombres, nombre de usuario, contraseña
- Subida de avatar opcional (JPG, PNG, GIF)
- Validación de usuario existente
- Contraseña encriptada con `password_hash()`

### 2. Login
- Validación de credenciales
- Mensajes de error para usuario inexistente o contraseña incorrecta
- Sesiones para mantener autenticación
- Redirección al dashboard si login exitoso

### 3. Dashboard
- Navbar con avatar del usuario o ícono por defecto
- Menú desplegable con opciones:
  - Mi Perfil
  - Cerrar sesión
- Mensaje de bienvenida con datos del usuario
- Alerta si no tiene avatar configurado

### 4. Perfil de Usuario
- Vista de información personal
- Avatar actual (o ícono si no tiene)
- Formulario para subir/cambiar avatar
- Las imágenes se guardan en `public/images/users/`

### 5. Cerrar Sesión
- Destruye la sesión
- Redirige al login

## Rutas Principales

| Método | Ruta | Descripción |
|--------|------|-------------|
| GET | `/` | Redirige al login |
| GET | `/registro` | Mostrar formulario de registro |
| POST | `/registro` | Procesar registro |
| GET | `/login` | Mostrar formulario de login |
| POST | `/login` | Procesar login |
| GET | `/dashboard` | Dashboard principal |
| GET | `/perfil` | Ver perfil del usuario |
| POST | `/perfil/actualizar-avatar` | Subir/actualizar avatar |
| GET | `/logout` | Cerrar sesión |

## Usuario de Prueba (Seeder)

```
Usuario: demo
Contraseña: demo123
Avatar: null (sin avatar)
```

## Seguridad

- Contraseñas encriptadas con `password_hash()` y verificadas con `password_verify()`
- Validación de sesiones antes de acceder a rutas protegidas
- Validación de tipos de archivos para avatares
- Restricción UNIQUE en nombre de usuario

## Notas Importantes

- Los avatares se guardan en `public/images/users/` con nombres aleatorios
- El campo `img_avatar` en la BD guarda la ruta relativa: `images/users/nombrearchivo.jpg`
- Si el avatar es `null`, se muestra un ícono por defecto de Bootstrap Icons
- Las sesiones flash se usan para mensajes de error/éxito

## Tecnologías Usadas

- CodeIgniter 4
- Bootstrap 5.3.8
- Bootstrap Icons
- PHP password_hash/verify
- MySQL

## Capturas de Flujo

1. **Registro** → Usuario completa formulario con avatar opcional
2. **Login** → Usuario ingresa credenciales
3. **Dashboard** → Bienvenida con navbar mostrando avatar
4. **Perfil** → Visualizar datos y subir/cambiar avatar
5. **Logout** → Cerrar sesión y volver al login

---

**Desarrollado como tarea práctica de CodeIgniter 4**

*Migraciones y Semillas - Sistema MiApp*