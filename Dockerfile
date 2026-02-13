# Usamos PHP 8.2 con Apache
FROM php:8.2-apache

# Instalamos extensión para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql \
    && docker-php-ext-enable pdo_pgsql

# Habilitamos mod_rewrite (útil para muchas apps)
RUN a2enmod rewrite

# Copiamos todo el código al contenedor
COPY . /var/www/html/

# Configuramos permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponemos el puerto 80
EXPOSE 80