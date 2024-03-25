FROM php:8.2-fpm

COPY ./docker/php/php.ini /usr/local/etc/php/

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
