# ComunIpanema — Plataforma de Gestión de Propiedades e Incidencias

## Anteproyecto TFG — DAW 2025/2026

**ComunIpanema** es una aplicación web orientada a la gestión de propiedades e incidencias en comunidades de propietarios y administradores de fincas.

---

# 📌 1. Información General

| Campo | Información |
|---|---|
| **Nombre del proyecto** | ComunIpanema |
| **Temática** | Gestión inmobiliaria e incidencias |
| **Ciclo** | Desarrollo de Aplicaciones Web (DAW) |
| **Curso** | 2025 / 2026 |

## 🛠️ Stack tecnológico

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Blade + CSS + JS
- **Base de datos:** MySQL
- **Entorno:** Docker 


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
- Registro
- Logout

## 📊 Dashboard

- Contadores de propiedades e incidencias
- Últimas incidencias

## 🏠 Propiedades

- Listado (global o filtrado por usuario)
- Crear, ver, editar y eliminar (admin)
- Detalles de las incidencias relacionadas

## 🛠️ Incidencias

- Listado
- Crear incidencia
- Ver detalle
- Editar y eliminar (admin)

## 👤 Usuarios (Admin)

- Listado
- Ver perfil
- Editar
- Eliminar

---

# 📚 6. Tipos y Estados

## Roles

- Administrador
- Usuario

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

## Relaciones principales

- users → rols (N:1)
- users → propiedades (1:N)
- propiedades → incidencias (1:N)
- incidencias → tipos_incidencia (N:1)
- incidencias → estados_incidencia (N:1)

---

# 🚀 10. Despliegue

- Docker
- Laravel Sail
- MySQL 8

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
| Pruebas y despliegue |  En Progreso |

---

# 🧾 12. Conclusión

ComunIpanema resuelve una necesidad real en la gestión de comunidades de propietarios, ofreciendo:

- Control centralizado
- Seguimiento de incidencias
- Paneles personalizados por rol
- Arquitectura escalable

---

# 🔮 Futuras mejoras

- Notificaciones por email
- Exportación de informes
- Integración con calendarios
- Sistema de avisos en tiempo real
- Noticias de juntas 
- Foro para puesta en comun de mejoras entre usuarios 
