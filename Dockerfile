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
    libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_pgsql mbstring zip bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# NOVO: Copiar todos os arquivos da sua aplicação Laravel para o WORKDIR
COPY . .

# Instalar dependências do Composer (agora que o código foi copiado)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Opcional: Construir assets do frontend (se você usa Vite/NPM para o frontend)
# Se você tiver um build de assets, precisará instalar Node/NPM aqui primeiro ou usar um estágio multi-stage
# Se você não usa frontend ou ele já é servido por outro lugar, ignore esta parte
# RUN npm install && npm run build

# Copiar configuração do Nginx
COPY nginx/conf.d/default.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
RUN rm -rf /etc/nginx/sites-enabled/default.conf # Remover a conf padrão do Nginx, se existir

# Configurar permissões (importante para Laravel/Nginx)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expor a porta 80
EXPOSE 80

# Comando para iniciar PHP-FPM e Nginx
CMD ["sh", "-c", "php-fpm && nginx -g 'daemon off;'"]
