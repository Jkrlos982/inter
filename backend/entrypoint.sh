#!/bin/bash

# Ejecutar migraciones y seeders
php artisan migrate --force
php artisan db:seed --force

# Iniciar PHP-FPM
php-fpm
