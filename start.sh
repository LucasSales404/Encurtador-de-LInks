#!/bin/bash
set -e

# Rodar migrations automaticamente no start
php artisan migrate --force || true

# Iniciar o Nginx
service nginx start

# Manter o container vivo com o PHP-FPM em foreground
exec php-fpm
