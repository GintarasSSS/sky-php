FROM php:7.4-apache

WORKDIR /var/www/html

RUN apt-get update
RUN apt-get install -y libzip-dev libpng-dev
RUN docker-php-ext-install zip
RUN apt-get install -y zip

COPY ./ .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN /usr/bin/composer install

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite