# Sistema de Login con Avatar - CodeIgniter 4

Sistema de registro, login y gestión de perfiles con avatares.

---

## Instalación Rápida

### 1. Configurar Base de Datos

Crear la base de datos:
```sql
CREATE DATABASE miapp;
```

Editar archivo `.env`:
```env
database.default.hostname = localhost
database.default.database = miapp
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### 2. Ejecutar Migraciones y Seeder

```bash
php spark migrate
php spark db:seed SUsuarios
```

### 3. Crear carpeta para avatares

```bash
mkdir public/images/users
```

### 4. Iniciar el servidor

```bash
php spark serve
```

Abrir en el navegador: **http://localhost:8080**

---

## Usuario de Prueba

- **Usuario:** demo
- **Contraseña:** demo123

---

## Estructura

```
app/
├── Controllers/
│   ├── UsuarioController.php
│   └── DashboardController.php
├── Models/
│   └── Usuario.php
├── Views/
│   ├── home/
│   │   ├── registro.php
│   │   └── login.php
│   ├── usuario/
│   │   └── perfil.php
│   └── dashboard.php
└── Database/
    ├── Migrations/XXXX_TUsuarios.php
    └── Seeds/SUsuarios.php
```

---

## 🔧 Comandos Útiles

```bash
# Revertir migración
php spark migrate:rollback

# Refrescar todo
php spark migrate:refresh
php spark db:seed SUsuarios
```

---