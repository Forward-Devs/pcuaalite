# PCUAA Lite v1.0.10

Es la versión gratuita de PCUAA , un panel de control de usuarios para SAMP automático, se adapta fácilmente a cualquier Gamemode.


# Instalación

## Composer

**Tener instalado composer**
* PHP 7
Descarga composer: https://getcomposer.org/download/

## 1) Descarga

Ejecutar el comando `composer create-project forwarddevs/pcuaalite nombre-proyecto` remplazando "nombre-proyecto" por el nombre de la carpeta a crear, por ejemplo "composer create-project forwarddevs/pcuaalite pcu".

## 2) Configuración

En la carpeta raíz del proyecto nos encontraremos con el archivo ".env".

Debemos crear una base de datos y configurarla.

Remplazar los valores de 
`DB_HOST` por el HOST de nuestra database.
`DB_DATABASE` por el nombre de la database.
`DB_USERNAME` por el usuario.
`DB_PASSWORD` por la contraseña de nuestra database.

## 3) Instalación.

Una vez instalado el proyecto ingresar a la carpeta raíz con CMD, ejemplo `cd pcu` y ejecutar los comandos:
1) `php artisan migrate`
2) `php artisan db:seed`

## Run/Ejecutar

Ingresamos a nuestra web, siguiendo este ejemplo deberás ingresar a "http://localhost/pcu/public"

Si estás en un hosting recuerda definir el directorio root en la carpeta public.

## Desarollado por FR0Z3NH34R7
