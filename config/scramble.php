<?php

use Dedoc\Scramble\Http\Middleware\RestrictedDocsAccess;

return [
    'api_path' => 'api',
    'api_domain' => null,
    'export_path' => 'api.json',
    'info' => [
        'version' => env('API_VERSION', '1.0.0'),
        'description' => '## Salón Elegancia API

API REST para gestión de citas en peluquerías y barberías.

## Autenticación
Todos los endpoints protegidos requieren Bearer Token en el header:
`Authorization: Bearer {token}`

Obtén el token haciendo POST a `/api/login`.

## Roles de usuario
| Rol | Valor | Descripción |
|-----|-------|-------------|
| Admin | 1 | Acceso total al panel de administración |
| Manager | 2 | Gestión de citas y empleados |
| Cliente | 3 | Reservas y consulta de citas propias |
| Usuario | 4 | Rol por defecto al registrarse |

## Tablas principales
| Tabla | Descripción |
|-------|-------------|
| users | Clientes y administradores del sistema |
| bookings | Citas reservadas por los clientes |
| cut_types | Servicios disponibles (corte, tinte, etc.) |
| employees | Profesionales del salón (nombre, rol, especialidad) |
| business_info | Configuración del negocio (horarios, contacto, etc.) |

## Relaciones
- Una **booking** pertenece a un **user** (cliente) via `user_id`
- Una **booking** pertenece a un **cut_type** via `cut_type_id`
- Una **booking** tiene un empleado asignado via `employee_id` → `users.id`
- **business_info** pertenece a un **user** (propietario) via `owner_id`',
    ],
    'ui' => [
        'title' => 'Salón Elegancia API',
        'theme' => 'dark',
        'hide_try_it' => false,
        'hide_schemas' => false,
        'logo' => '',
        'try_it_credentials_policy' => 'include',
        'layout' => 'responsive',
    ],
    'servers' => null,
    'enum_cases_description_strategy' => 'description',
    'enum_cases_names_strategy' => false,
    'flatten_deep_query_parameters' => true,
    'middleware' => [
        'web',
    ],
    'extensions' => [],
];
