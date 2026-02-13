# Usamos PHP 8.2 con Apache
FROM php:8.2-apache

# Instalamos extensión para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql \
    && docker-php-ext-enable pdo_pgsql

# Habilitamos mod_rewrite (útil para muchas apps)
RUN a2enmod rewrite

# 🆕 COPIAR CONFIGURACIÓN PERSONALIZADA DE APACHE
# Eliminamos la configuración por defecto y copiamos la nuestra
RUN rm /etc/apache2/sites-available/000-default.conf
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# 🆕 HABILITAR LA CONFIGURACIÓN (aunque ya debería estar habilitada)
RUN a2ensite 000-default.conf

# Copiamos todo el código al contenedor
COPY . /var/www/html/

# Configuramos permisos correctos (www-data es el usuario de Apache)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponemos el puerto 80
EXPOSE 80