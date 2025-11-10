# Imagen base con PHP y Apache
FROM php:8.3-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Habilita mod_rewrite (necesario para Laravel)
RUN a2enmod rewrite

# 👉 Ajusta el DocumentRoot de Apache a /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf

# Instala Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define el directorio de trabajo
WORKDIR /var/www/html

# Copia el proyecto (si ya existe localmente)
COPY . /var/www/html

# Expone el puerto 80
EXPOSE 80

# Da permisos correctos a storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache
