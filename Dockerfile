FROM php:8.2-fpm

# Evitar problemas de cache e pacotes antigos
# Tudo em uma única instrução RUN
RUN apt-get update --fix-missing && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    nginx \
    postgresql-client \
    && docker-php-ext-install pdo_pgsql mbstring zip bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar configuração do Nginx (certifique-se de que o arquivo existe em .docker/nginx/default.conf)
COPY Nginx/conf.d/default.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
RUN rm -rf /etc/nginx/sites-enabled/default.conf # Remover a conf padrão do Nginx, se existir

# Expor a porta 80
EXPOSE 80

# Comando para iniciar PHP-FPM e Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
