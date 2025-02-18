FROM php:8.1-apache

COPY . /var/www/html

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install bcmath zip # Cambiar a docker-php-ext-install

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

COPY database/database.sqlite /var/www/html/database/database.sqlite

RUN chmod -R 777 /var/www/html/storage/
RUN chmod -R 777 /var/www/html/database/

RUN php artisan migrate --force
RUN php artisan db:seed --force

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN cat /etc/apache2/apache2.conf

EXPOSE 80
