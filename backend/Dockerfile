# Dockerfile de Backend

FROM php:8.3-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar el código
COPY . .
COPY ./entrypoint.sh /var/www/entrypoint.sh

# Instalar dependencias de Laravel
RUN composer install

# Asignar permisos
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Exponer puerto
EXPOSE 9000

# Iniciar PHP-FPM
CMD ["php-fpm"]
