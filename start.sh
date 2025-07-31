#!/bin/sh
# Substituir a variável de ambiente $PORT no arquivo do Nginx
envsubst '$PORT' < /etc/nginx/sites-available/default > /etc/nginx/sites-enabled/default

# Iniciar PHP-FPM em background
php-fpm -D

# Iniciar o Nginx em foreground (mantém o container ativo)
nginx -g 'daemon off;'
