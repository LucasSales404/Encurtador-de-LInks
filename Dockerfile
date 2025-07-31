FROM php:8.2-fpm

# Instalações de pacotes do sistema (mantem essa parte como está)
RUN apt-get update --fix-missing && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    nginx \
    postgresql-client \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_pgsql mbstring zip bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar todo o código da aplicação
COPY . .

# Instalar dependências do Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configurar permissões (importante para Laravel/Nginx)
RUN usermod -u 1000 www-data
RUN chown -R www-data:www-data /var/www/html
RUN find /var/www/html -type f -exec chmod 664 {} +
RUN find /var/www/html -type d -exec chmod 775 {} +
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar configuração do Nginx
# VERIFIQUE A CAPITALIZAÇÃO DE "Nginx" AQUI!
COPY nginx/conf.d/default.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
RUN rm -rf /etc/nginx/sites-enabled/default.conf # Remover a conf padrão do Nginx, se existir

# Expor a porta 80
EXPOSE 80

# NOVO CMD: Voltar à forma direta de iniciar PHP-FPM e Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
