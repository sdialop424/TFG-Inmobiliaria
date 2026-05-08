FROM php:8.2-apache

# Dependencias del sistema y extensiones PHP necesarias.
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip opcache \
    && docker-php-ext-enable pdo_mysql opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite para Laravel/Symfony en Apache.
RUN a2enmod rewrite

# Composer en imagen final.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Capa cacheable: dependencias PHP antes de copiar todo el proyecto.
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --no-scripts

# Copia del resto del código de la aplicación.
COPY . .

# Script de arranque para evitar reinstalar vendor si ya existe.
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]