FROM php:8.4.3-apache

# UPDATE APT-GET AND INSTALL LIBS
RUN apt-get update -y && apt-get install -y --fix-missing \
    apt-utils \
    gnupg
RUN apt-get update -y && apt-get install -y --fix-missing
RUN apt-get install -y wget openssl zlib1g-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev zip unzip git libnss3 npm cron vim

# PHP EXTENSIONS
RUN docker-php-ext-install pdo pdo_mysql zip gd mysqli

# ANABLE APACHE MODULES
RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod ssl

# INSTALL COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change www-data user to match the host system UID and GID and chown www directory
RUN usermod --non-unique --uid 1000 www-data \
  && groupmod --non-unique --gid 1000 www-data \
  && chown -R www-data:www-data /var/www

# Defines that the image will have port 80 to expose
EXPOSE 80 443

WORKDIR /var/www