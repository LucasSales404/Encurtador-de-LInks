#!/bin/sh
set -e
echo "==> Iniciando script start.sh"
echo "PORT = $PORT"

envsubst '$PORT' < /etc/nginx/sites-available/default > /etc/nginx/sites-enabled/default
cat /etc/nginx/sites-enabled/default

php-fpm -D
nginx -g 'daemon off;'
