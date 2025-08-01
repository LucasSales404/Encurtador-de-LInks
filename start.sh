#!/bin/bash
set -e

# Rodar migrations automaticamente no start
php artisan migrate --force || true

exec php-fpm
