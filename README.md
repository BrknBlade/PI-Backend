## A tener en cuenta
- Para este MVP no se utilizaran imagenes de bienvenida

## Migrations
### users_table **(Frank)**
- Id ***(PK)***
- Name ***(string)***
- Email ***(email)***
- Role ***(integer)***

### cut_types_table **(Frank)**
- Id ***(PK)***
- Name ***(string)***

### bookings_table **(Cristian)**
- Id ***(PK)***
- Gender ***(string)***
- Description ***(string)***
- Date ***(date)***
- Hour ***(date)***
- user_id ***(one to many)***
- cut_type_id ***(one to many)***
- status ***(string)***
- created_at ***(timestamp)***

## Roles Enum (Frank)
- Admin
- Owner
- Employee
- Client

## Models
- User ***(Controller)***
- CutType ***(Controller)***
- Booking ***(Controller)***

## Requests
- StoreBookingRequest
- UpdateBookingRequest
- StoreCutTypeRequest
- UpdateCutTypeRequest

## Policies (Cristian)
- BookingPolicy
- CutTypePolicy
- UserPolicy

## Resources
Todos los recursos devolveran un solo item o una coleccion dependiendo
de si se solicita uno o todos

- **UserResource**
```javascript
{
  "data" : [
    {
      "id" : 1,
      "name" : "John Doe",
      "email" : "johndoe@email.com",
      "role" : 1, // 1:Admin 2:Owner 3:Employee 4:Client
    }
  ]
}
```
Admin somos nosotros basicamente, Owner es el duenio de la peluqueria.

- **BookingResource**
```javascript
{
  "data" : [
    {
      "id" : 1,
      "gender" : "male",
      "description" : "Me gusta el corte del Messie pero con menos degradado",
      "date" : "05_03_2026", //Falta por confirmar el formato exacto, Cristian lo confirmara
      "hour" : "12:30",
      "user_id" : 1,
      "cut_type_id" : 2,
      "status" : "ongoing", //El estatus es mas que todo por si el empleado/peluquero cancela la cita
      "created_at" : "2026-03-04 21:32:09" //Formato estandar de Laravel
    }
  ]
}
```

- **CutTypeResource**
```javascript
{
  "data" : [
    {
      "id" : 2,
      "name" : "El del Messie"
    }
  ]
}
```

## Routes
- /login: Ingreso de credenciales para iniciar secion.
- /logout: Cerrar sesion.

**(Cristian)**
- /bookings ***(GET)*** : Segun el rol del usuario devuelve las citas agendadas ***(Policy)*** .
- /bookings ***(POST)*** : Ruta para crear una cita.
- /bookings/{booking} ***(GET)*** : Devuelve los datos de la cita especificada.
- /bookings/{booking} ***(PATCH)*** : Actualiza la informacion de la cita especificada ***(Policy)*** .
- /bookings/{booking} ***(DELETE)*** : Elimina la cita especificada ***(Policy)*** .

**(Frank)**
- /cut_types ***(GET)*** : Solo el Owner puede crear tipos de corte ***(Policy)*** .
- /cut_types ***(POST)*** : Solo el Owner puede crear tipos de corte.
- /cut_types/{cut-type} ***(GET)*** : Devuelve los datos del corte especificado.
- /cut_types/{cut_type} ***(PATCH)*** : Actualiza la informacion del tipo de corte especificado ***(Policy)*** .
- /cut_types/{cut_type} ***(DELETE)*** : Elimina el tipo de corte especificado ***(Policy)*** .

**(Frank)**
- /users ***(GET)*** : Si el usuario es admin ve la lista de los clientes que han agendado cita ***(Policy)*** .
- /users/{user} ***(GET)*** : Devuelve los datos de la cita especificada.
- /users/{user} ***(PATCH)*** : Actualiza la informacion de la cita especificada ***(Policy)*** .
- /users/{user} ***(DELETE)*** : Elimina el usuario especificado ***(Policy)*** .
- /users/{user}/dates ***(GET)*** : Devuelve la lista de citas del usuario especificado.
