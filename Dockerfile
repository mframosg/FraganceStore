FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libxml2-dev \
        libpq-dev \
        libzip-dev \
        mariadb-server \
        && docker-php-ext-install pdo pdo_mysql zip intl xmlrpc soap opcache \
        && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd

RUN apt-get update -y

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

COPY . /var/www/html
WORKDIR /var/www/html

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN cat .env

RUN php artisan key:generate
RUN php artisan storage:link
RUN php artisan migrate:fresh --seed
RUN php artisan db:seed
RUN php artisan test

RUN chmod -R 777 /var/www/html

RUN a2enmod rewrite
RUN service apache2 restart
