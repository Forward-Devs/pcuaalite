# PCUAA Lite v1.1.2

[![Latest Stable Version](https://poser.pugx.org/forwarddevs/pcuaalite/v/stable)](https://packagist.org/packages/forwarddevs/pcuaalite)
[![Total Downloads](https://poser.pugx.org/forwarddevs/pcuaalite/downloads)](https://packagist.org/packages/forwarddevs/pcuaalite)
[![Latest Unstable Version](https://poser.pugx.org/forwarddevs/pcuaalite/v/unstable)](https://packagist.org/packages/forwarddevs/pcuaalite)
[![License](https://poser.pugx.org/forwarddevs/pcuaalite/license)](https://packagist.org/packages/forwarddevs/pcuaalite)

Es la versión gratuita de PCUAA , un panel de control de usuarios para SAMP automático, se adapta fácilmente a cualquier Gamemode.


# Instalación

## Composer

**Tener instalado composer**
* PHP 7
* Node JS
* Descarga composer: https://getcomposer.org/download/

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

## NPM

No olvidar usar "npm install" para instalar las dependencias de node
## Run/Ejecutar

Ingresamos a nuestra web, siguiendo este ejemplo deberás ingresar a "http://localhost/pcu/public"

Si estás en un hosting recuerda definir el directorio root en la carpeta public.

## Desarrollado por FR0Z3NH34R7
