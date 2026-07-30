# SIGESGA

**Sistema de Gestión de Grúas y Asistencias Viales**

SIGESGA es una aplicación web desarrollada con Laravel 12, Inertia y Vue para la administración integral de servicios de grúas y asistencia en carretera.

## Funcionalidades

- **Landing page** con solicitud de servicios, rastreo y soporte
- **Panel de administración** con autenticación y roles (admin, cotizador, operador)
- **Cotizaciones** - Gestión de presupuestos para servicios de grúa
- **Servicios** - Seguimiento y control de servicios realizados
- **Facturación** - Generación y gestión de facturas
- **Clientes** - Registro y administración de clientes
- **Aseguradoras** - Gestión de compañías aseguradoras
- **Convenios** - Acuerdos con aseguradoras y empresas
- **Tarifas** - Configuración de tarifas propias y por convenio
- **Unidades** - Control de flotilla de grúas y unidades
- **Mantenimientos** - Registro de mantenimiento de unidades
- **Empleados y Operadores** - Gestión del personal
- **Oficinas** - Administración de sucursales
- **Configuración** - Personalización del sistema
- **Notificaciones** - Sistema de notificaciones internas

## Requisitos

- PHP ^8.2
- Node.js
- Composer
- Base de datos (MySQL, PostgreSQL, SQLite, etc.)

## Instalación

```bash
# Clonar el repositorio
git clone https://github.com/JazMendez17/sigesga.git

# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Compilar assets
npm run build
```

## Desarrollo

```bash
# Iniciar servidor de desarrollo
composer run dev
```

## Licencia

Este proyecto está bajo la licencia MIT.
