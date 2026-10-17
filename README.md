# Combi 19

Sistema web para una empresa de viajes en combi durante la pandemia de COVID-19.

## Qué es

Un proyecto en equipo de 2021 para una empresa ficticia de traslados en combi. Tiene tres tipos de usuario: pasajero, chofer y administrador.

## Qué hace

- Búsqueda de viajes por origen, destino y fecha, y registro con membresía común o Golden (20 % de descuento).
- **Pasajeros:** compra de pasajes con tarjeta, mis viajes, historial, comentarios, devoluciones y cambio de membresía.
- **Choferes:** iniciar, terminar o cancelar viajes, ver la lista de pasajeros, vender en el momento y registrar síntomas de COVID (cancela el pasaje y lo marca para devolver la plata).
- **Administración:** ciudades, rutas, viajes, combis, insumos, empleados y membresías.
- **Reportes:** pasajeros por viaje, viajes entre fechas y pasajeros con síntomas.

## Tecnologías

PHP, Laravel 8, Blade y MySQL.

## Equipo

Braian Chavez, [@Tonyraz18](https://github.com/Tonyraz18) y [@marceloMolinaCari](https://github.com/marceloMolinaCari).

## Cómo correrlo

Necesitás PHP 7.3 o más, Composer y MySQL.

```bash
git clone https://github.com/Brai99chavez/Combi_19.git
cd Combi_19
composer install
cp .env.example .env
php artisan key:generate
```

Creá una base MySQL llamada `combi_19` (o cambiá `DB_DATABASE` en `.env`) y cargá las tablas con datos de ejemplo:

```bash
php artisan migrate --seed
```

Los estilos usan rutas relativas: abrilo desde Apache (por ejemplo, con XAMPP) en `http://localhost/Combi_19/public/`. Con `php artisan serve` también anda, pero sin estilos.

**Usuarios de prueba:** administrador `brai@gmail.com` / `brai123`, chofer `tony@gmail.com` / `tony123`, pasajero `tomas@gmail.com` / `tomas123`.
