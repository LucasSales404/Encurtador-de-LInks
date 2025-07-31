# ============================
# Etapa 1: Build do front (Vite)
# ============================
FROM node:18 as node-builder

WORKDIR /app

# Copiar package.json e lock primeiro (melhor cache)
COPY package*.json ./
RUN npm ci

# Copiar todo o código do Laravel (para acessar vite.config.js, etc)
COPY . .

# Rodar build do Vite
RUN npm run build


# ============================
# Etapa 2: PHP + Nginx + Laravel
# ============================
FROM php:8.2-fpm

# Instalar pacotes do sistema
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

# Copiar o código da aplicação
COPY . .

# Copiar o build do Vite gerado na etapa 1
COPY --from=node-builder /app/public/build ./public/build

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissões corretas
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

# Porta
EXPOSE 80

# Comando final
CMD ["/start.sh"]
