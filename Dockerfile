FROM php:8.2-fpm

# Instalações de pacotes do sistema
RUN apt-get update --fix-missing && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    nginx \
    postgresql-client \
    libpq-dev \
    gettext-base \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_pgsql mbstring zip bcmath


# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar todo o código da aplicação
COPY . .

# Instalar dependências do Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configurar permissões
RUN usermod -u 1000 www-data \
    && chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type f -exec chmod 664 {} + \
    && find /var/www/html -type d -exec chmod 775 {} + \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar configuração do Nginx
COPY nginx/conf.d/default.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default \
    && rm -rf /etc/nginx/sites-enabled/default.conf

# Copiar script de inicialização
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expor a porta (apenas informativo)
EXPOSE 80

# Comando de inicialização
CMD ["/start.sh"]
