#!/bin/sh
# Substitui a variável $PORT no arquivo de configuração do Nginx
envsubst '$PORT' < /etc/nginx/sites-available/default > /etc/nginx/sites-enabled/default

# Inicia o PHP-FPM em background
php-fpm -D

# Inicia o Nginx em foreground (mantém o container rodando)
nginx -g 'daemon off;'
