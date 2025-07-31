FROM php:8.2-fpm

# Evitar problemas de cache e pacotes antigos
RUN apt-get update --fix-missing && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    nginx \              # <-- NOVO: Instala o Nginx
    postgresql-client \  # <-- NOVO: Cliente para PostgreSQL
    # Extensões PHP
    && docker-php-ext-install pdo_pgsql mbstring zip bcmath # <-- ALTERADO: de pdo_mysql para pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer # <-- ALTERADO: usar :latest para a versão mais recente e robusta

WORKDIR /var/www/html

# NOVO: Copiar configuração do Nginx
# Certifique-se de que você tem um arquivo default.conf em .docker/nginx/ na raiz do seu projeto
COPY .docker/nginx/default.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
RUN rm -rf /etc/nginx/sites-enabled/default.conf # Remover a conf padrão do Nginx, se existir

# NOVO: Expor a porta 80
EXPOSE 80

# NOVO: Comando para iniciar PHP-FPM e Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
