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


## 2. ENLACES Y RECURSOS CLAVE DEL PROYECTO

| Recurso | Enlace |
|---|---|
| **Aplicación Desplegada** | [Enlace a la aplicación desplegada](http://ec2-16-192-21-198.eu-north-1.compute.amazonaws.com/public/index.php) |
| **Usuario demo (Admin)** | admin@admin.com / admin|
| **Usuario demo (User)** | sebas@sebas.com / 1234 |
| **Prototipo Figma** | [Enlace al prototipo de Figma](https://www.figma.com/proto/87rLZHobm5bx1rnaha2zeL/Figma-TFg?node-id=0-1&t=oyr3chj3mYeaUFKi-1) |
| **Video de Presentación** | [Enlace al video de presentación](https://placeholder-url-to-your-video.com) |



## 🛠️ Stack tecnológico

El proyecto **ComunIpanema** está construido sobre un conjunto de tecnologías modernas y robustas, divididas en las siguientes capas y librerías clave:

### ⚙️ Núcleo & Backend
*   **[Laravel 12](https://laravel.com/) (PHP 8.2+):** Framework de desarrollo web basado en MVC, que proporciona la estructura base, inyección de dependencias, routing avanzado, migraciones de base de datos y un ORM potente (Eloquent).
*   **[Laravel Sanctum](https://laravel.com/docs/12.x/sanctum):** Proporciona un sistema de autenticación ligero y seguro para APIs y Single Page Applications mediante tokens y cookies de sesión.
*   **[Laravel Socialite](https://laravel.com/docs/12.x/socialite):** Facilita la autenticación OAuth con proveedores externos (Google, GitHub, etc.) de manera fluida y estandarizada.
*   **[Laravel Tinker](https://github.com/laravel/tinker):** Consola interactiva REPL que permite depurar y consultar directamente el estado de la aplicación y la base de datos en tiempo real.

### 🎨 Frontend & Presentación
*   **[Blade Templates](https://laravel.com/docs/12.x/blade):** Motor de plantillas nativo de Laravel que permite estructurar la interfaz de usuario mediante herencia, secciones y componentes limpios.
*   **[Vite 7](https://vite.dev/):** Compilador y empaquetador de frontend ultra rápido que gestiona la recarga en caliente (HMR) y optimiza el empaquetado de assets para producción.
*   **[Laravel Vite Plugin](https://laravel.com/docs/12.x/vite):** Enlace oficial que conecta el ciclo de vida de Vite con el renderizado de vistas en Laravel.
*   **[Axios](https://axios-http.com/):** Cliente HTTP basado en promesas para realizar peticiones asíncronas desde JavaScript al backend de forma segura y sencilla.
*   **CSS Vanilla & JavaScript (ES6+):** Utilizados para el diseño y comportamiento dinámico personalizado, maximizando la flexibilidad y el control sin dependencias pesadas de terceros.

### 🧪 Entorno, Calidad & Pruebas
*   **[Docker](https://www.docker.com/) & [Docker Compose](https://docs.docker.com/compose/):** Orquestación del entorno local mediante contenedores independientes para el servidor web, PHP y MySQL, asegurando la reproducibilidad del entorno.
*   **[PHPUnit 11](https://phpunit.de/):** Framework de pruebas de software para asegurar el correcto funcionamiento del modelo de negocio mediante tests unitarios y de integración.
*   **[FakerPHP](https://fakerphp.org/):** Librería utilizada en seeders y factorías para la generación masiva de datos falsos pero realistas con fines de prueba.
*   **[Laravel Pint](https://laravel.com/docs/12.x/pint):** Linter y corrector de estilo de código PHP para garantizar que el proyecto siga el estándar PSR-12 de forma automatizada.
*   **[Nunomaduro Collision](https://github.com/nunomaduro/collision):** Proporciona reportes visuales detallados y estéticos en consola para errores de ejecución y pruebas.

### 🗄️ Base de Datos & Despliegue
*   **[MySQL](https://dev.mysql.com/):** Sistema de gestión de bases de datos relacionales robusto encargado del almacenamiento estructurado y seguro de la información del negocio.
*   **[AWS (Amazon Web Services)](https://aws.amazon.com/):** Nube utilizada para hospedar y desplegar la aplicación garantizando alta disponibilidad y escalabilidad.

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

# 🏗️ 7. Arquitectura y Componentes

## 🖥️ 7.1. Capa de Frontend (Interfaz & Presentación)
*   **Vistas Blade:** Organizadas con layout centralizado (`layouts/app.blade.php`), secciones dinámicas (`@yield` / `@section`) e inclusión de subcomponentes.
*   **JavaScript (ES6+) y Axios:** Manejo de peticiones asíncronas de manera nativa para evitar recargas completas de la página en interacciones puntuales (como cambios rápidos de estado).
*   **CSS Vanilla Responsivo:** Hojas de estilos optimizadas con Flexbox y CSS Grid para asegurar que la interfaz sea adaptable a dispositivos móviles, tablets y ordenadores de escritorio.

## ⚙️ 7.2. Capa de Backend (Lógica & Datos)
*   **Controladores Delegados:** Siguiendo el principio de responsabilidad única, los controladores reciben las peticiones y retornan respuestas, delegando la lógica compleja.
*   **Services Layer (Capa de Servicios):** Centraliza la lógica de negocio del sistema (p. ej., asignación de propiedades, flujo de cambio de estado de una incidencia), permitiendo que el código sea testeable y reutilizable.
*   **Eloquent ORM:** Los modelos representan entidades de negocio (`User`, `Propiedad`, `Incidencia`, etc.) y sus relaciones (1:N, N:1) con métodos fluidos.
*   **Form Requests:** Clases de validación específicas para sanear y verificar las entradas de datos antes de que lleguen a los controladores.
*   **Middleware de Autenticación y Roles:** Filtros de seguridad que protegen las rutas según si el usuario está autenticado y posee el rol adecuado (`Administrador` o `Usuario`).

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


# 🔧 10. Documentación Avanzada de Funcionalidades Clave

En esta sección se detalla el funcionamiento técnico interno de las principales características operativas del sistema:

### 🔑 A. Autenticación Híbrida (Sesiones Cookies vs. API Tokens)
El proyecto implementa un doble mecanismo de seguridad adaptado al canal de entrada:
*   **Navegador Web (Blade):** Inicio de sesión convencional gestionado por `AuthController.php`. Utiliza las sesiones nativas cifradas de Laravel sobre HTTP cookies, impidiendo ataques de suplantación y protegiendo las vistas con el middleware `auth` tradicional.
*   **API RESTful:** Protegida mediante el middleware `auth:sanctum`. El login de API autentica las credenciales y devuelve un token de acceso criptográfico (Bearer Token). El cliente debe guardar dicho token (por ejemplo, en un cliente móvil o SPA) y adjuntarlo en la cabecera `Authorization: Bearer <token>` de cada petición.

### 🔄 B. Fetching de Datos Asíncrono e Interactividad con Axios
En el frontend, la carga asíncrona de datos evita la recarga innecesaria de vistas completas en procesos puntuales:
*   Se utiliza **Axios** para enviar peticiones en segundo plano al backend (como cambios en tiempo real del estado de incidencias).
*   Se ha diseñado un gestor JavaScript centralizado en el layout maestro que captura errores de base de datos o fallos de red durante las peticiones AJAX, disparando un modal de SweetAlert2 con una estética oscura y un botón interactivo de reintento de conexión.

### 🛠️ C. Flujo de Transiciones y Ciclo de Vida de Incidencias
El paso de una incidencia a los estados de `Pendiente`, `En progreso` o `Resuelta` está validado a nivel lógico dentro del dominio de `IncidenciaService.php`:
*   Un usuario Propietario común únicamente puede abrir incidencias sobre propiedades que le han sido asignadas por un administrador (validado mediante relaciones directas `auth()->user()->propiedades()->exists()`).
*   Los estados operativos solo pueden ser modificados por un Administrador. Si una petición inyectada intenta transicionar estados directamente desde la API REST sin poseer los privilegios correspondientes, el middleware de seguridad bloquea la petición retornando un error `403 Forbidden`.

### 🛡️ D. Confirmación Interactiva de Borrados Críticos
Para prevenir borrados accidentales en cascada de propiedades asociadas a incidencias:
*   Los formularios HTML que ejecutan acciones `DELETE` interceptan el evento de envío nativo.
*   JavaScript invoca a SweetAlert2, deteniendo el flujo para mostrar un mensaje modal dinámico. Solo si el usuario confirma de forma explícita el borrado, se procede a ejecutar `form.submit()`, activando a su vez un spinner de carga en pantalla completa mientras el backend procesa la petición de forma segura.

---

# 📅 11. Planificación y Bitácora de Desarrollo

## 📅 11.1. Planificación Cronológica
El desarrollo se estructuró a lo largo de las siguientes fases progresivas:

| Fase | Tarea | Estado |
|---|---|---|
| **Fase 1** | Diseño y modelado de datos | ✅ Completado |
| **Fase 2** | Autenticación y roles de usuario | ✅ Completado |
| **Fase 3** | CRUD de Propiedades inmobiliarias | ✅ Completado |
| **Fase 4** | CRUD de Incidencias comunitarias | ✅ Completado |
| **Fase 5** | Dashboard interactivo y permisos | ✅ Completado |
| **Fase 6** | CRUD de Usuarios y perfiles | ✅ Completado |
| **Fase 7** | Refinamiento de la interfaz oscura | ✅ Completado |
| **Fase 8** | Pruebas automatizadas y despliegue AWS/Docker | ✅ Completado |
| **Fase 9** | Documentación técnica final y video | En progreso |

# 🚀 12. Mejoras y Propuestas Futuras (Versión 2.0)

De cara a la evolución tecnológica del ecosistema **ComunIpanema**, se proponen las siguientes extensiones de negocio:

1.  **Notificaciones en Tiempo Real (WebSockets):** Incorporación de **Laravel Reverb** o **Pusher** para alertar al instante al propietario cuando su incidencia sea transicionada a "En progreso" o "Resuelta".
2.  **Aplicación Móvil Nativa (Android/iOS):** Desarrollo de un cliente ligero en **Flutter** o **React Native** para propietarios, el cual se comunicará de manera directa y segura con la API REST protegida por **Laravel Sanctum** ya disponible.
3.  **Generación de Informes en PDF Mensuales:** Tarea programada (*Cron Job* / *Laravel Scheduler*) que recopile gastos y resoluciones mensuales para generar un reporte y remitirlo automáticamente por correo a los administradores.

---

# 📚 13. Bibliografía y Referencias Oficiales

A continuación, se listan los recursos académicos y la documentación técnica oficial de los componentes utilizados para el desarrollo de esta plataforma:

1.  **Laravel Framework (v12.x)**
    *   *Documentación Oficial:* [https://laravel.com/docs/12.x](https://laravel.com/docs/12.x)
    *   *Referencia:* Otwell, T. (2025). *Laravel - The PHP Framework for Web Artisans*.
2.  **Laravel Sanctum (v4.x)**
    *   *Documentación Oficial:* [https://laravel.com/docs/12.x/sanctum](https://laravel.com/docs/12.x/sanctum)
    *   *Referencia:* Laravel Team. (2025). *Laravel Sanctum - API Authentication guard*.
3.  **Vite - Build Tool (v7.x)**
    *   *Documentación Oficial:* [https://vite.dev/](https://vite.dev/)
    *   *Referencia:* Evan You & Vite Contributors. (2025). *Vite - Next Generation Frontend Tooling*.
4.  **Axios HTTP Client**
    *   *Documentación Oficial:* [https://axios-http.com/](https://axios-http.com/)
    *   *Referencia:* Axios Authors. (2025). *Axios - Promise based HTTP client for browser and node.js*.
5.  **SweetAlert2 Dialogs**
    *   *Documentación Oficial:* [https://sweetalert2.github.io/](https://sweetalert2.github.io/)
    *   *Referencia:* Limon, T. (2025). *A beautiful, responsive, highly customizable replacement for JavaScript's popup boxes*.
6.  **Docker & Docker Compose**
    *   *Documentación Oficial:* [https://docs.docker.com/](https://docs.docker.com/)
    *   *Referencia:* Docker Inc. (2025). *Docker Documentation - Containerization Platform*.
7.  **MySQL Database Reference**
    *   *Documentación Oficial:* [https://dev.mysql.com/doc/](https://dev.mysql.com/doc/)
    *   *Referencia:* Oracle Corporation. (2025). *MySQL Reference Manual*.
8.  **PHPUnit Testing Platform**
    *   *Documentación Oficial:* [https://phpunit.de/](https://phpunit.de/)
    *   *Referencia:* Bergmann, S. (2025). *PHPUnit Manual - Testing Framework*.
9.  **FakerPHP Code Library**
    *   *Documentación Oficial:* [https://fakerphp.org/](https://fakerphp.org/)
    *   *Referencia:* FakerPHP Contributors. (2025). *FakerPHP - A PHP library that generates fake data*.
