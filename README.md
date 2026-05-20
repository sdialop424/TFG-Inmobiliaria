# ComunIpanema — Plataforma de Gestión de Propiedades e Incidencias

## Anteproyecto TFG — DAW 2025/2026

**ComunIpanema** es una aplicación web orientada a la gestión de propiedades e incidencias en comunidades de propietarios y administradores de fincas.

---

# 📌 1. Información General

| Campo | Información |
|---|---|
| **Nombre del proyecto** | ComunIpanema |
| **Temática** | Gestión de  incidencias para comunidades |
| **Ciclo** | Desarrollo de Aplicaciones Web (DAW) |
| **Curso** | 2025 / 2026 |

## 🛠️ Stack tecnológico

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Blade + CSS + JS
- **Base de datos:** MySQL
- **Entorno:** Docker 
- **Despliegue:** AWS 

---

# 🧠 2. Descripción

ComunIpanema permite:

- Gestionar propiedades inmobiliarias
- Asignarlas a usuarios
- Crear y seguir incidencias
- Controlar el flujo completo desde apertura hasta resolución

Incluye un sistema de roles con paneles personalizados para cada tipo de usuario.

---

# 🎯 3. Objetivos

## Objetivo general

Desarrollar una plataforma web full-stack para la gestión centralizada de propiedades e incidencias.

## Objetivos específicos

- CRUD completo de propiedades
- Sistema de incidencias con estados y tipos
- Autenticación con roles (Admin / Usuario)
- Dashboard personalizado
- Control de acceso por roles
- UI moderna y responsive
- Despliegue con Docker

---

# 👥 4. Sistema de Roles

| Rol | Capacidades |
|---|---|
| **Administrador** | Acceso total. CRUD de todo el sistema, estadísticas globales |
| **Usuario (Propietario)** | Acceso limitado a sus propiedades e incidencias |

---

# 🧩 5. Funcionalidades

## 🔐 Autenticación

- Login
- Registro(el registro lo hace el administrador ya es para una comunidad cerrada )
- Logout

## 📊 Dashboard

- Contadores de propiedades e incidencias
- Últimas incidencias y Todas las incidencias 

## 🏠 Propiedades

- Listado (global para administrador  o filtrado por usuario)
- Crear, editar y eliminar (admin) y ver por el usaurio 
- Detalles de las incidencias relacionadas

## 🛠️ Incidencias

- Listado
- Crear incidencia
- Ver detalle
- Editar y eliminar 

## 👤 Usuarios (Admin)

- Listado
- Ver perfil
- Editar
- Eliminar

## 👤 Usuarios

- Editar contraseña, nombre  y correo 

---

# 📚 6. Tipos y Estados

## Roles

- Administrador
- Usuario
- Propietario 

## Tipos de propiedad

- Casa
- Local
- Apartamento

## Tipos de incidencia

- Mantenimiento
- Reparación
- Limpieza

## Estados de incidencia

- Pendiente
- En progreso
- Resuelta

## Estados de propiedad

- Disponible
- Vendida
- Alquilada

---

# 🏗️ 7. Arquitectura

## Frontend

- Blade
- Css
- Java Script

## Backend

- Laravel 12
- Eloquent ORM
- Laravel Sanctum
- Laravel Socialite
- Middleware de roles
- Services Layer
- Form Requests

---

# 🗄️ 8. Base de Datos

## Tablas principales

- users
- rols
- propiedades
- tipos_propiedad
- incidencias
- tipos_incidencia
- estados_incidencia

## Relaciones clave

- Un usuario → un rol
- Un usuario → muchas propiedades
- Una propiedad → muchas incidencias
- Una incidencia → tipo + estado

---

# 🔗 9. Modelo Entidad-Relación

<img width="581" height="601" alt="DiagramaER drawio (1)" src="https://github.com/user-attachments/assets/06c60788-0cee-4d71-b529-0d499a19ec29" />


## Relaciones principales

- usuarios → roles (N:1)
- usuarios → propiedades (1:N)
- propiedades → incidencias (1:N)
- incidencias → tipos_incidencia (N:1)
- incidencias → estados_incidencia (N:1)

---


# 📅 11. Planificación

| Fase | Estado |
|---|---|
| Diseño y modelado | ✅ Completado |
| Autenticación y roles | ✅ Completado |
| CRUD Propiedades | ✅ Completado |
| CRUD Incidencias | ✅ Completado |
| Dashboard y permisos | ✅ Completado |
| CRUD Usuarios | ✅ Completado |
| Refinamiento UI |✅ Completado |
| Pruebas y despliegue | ✅ Completado |
| Documentacion y video | En progreso |

---

- Noticias de juntas 
- Foro para puesta en comun de mejoras entre usuarios 
- Si la aplicacion llega a una administracion con varias comunidades podria tener una base de datos multitenant 

