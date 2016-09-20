FROM php:7.0-apache

COPY . /var/www/html
WORKDIR /var/www/html

RUN docker-php-ext-install -j$(nproc) iconv pdo pdo_mysql mysqli mbstring

RUN apt-get update && apt-get install git zip unzip -y

RUN a2enmod rewrite

RUN curl \
  -sS https://getcomposer.org/installer \
  | php -- \
    --install-dir=/usr/bin/ \
    --filename=composer

RUN composer install --prefer-source --no-interaction

WORKDIR /var/www/html/wordpress
RUN cp wp-config-sample.php wp-config.php
RUN sed -i 's/database_name_here/wp/' wp-config.php
RUN sed -i 's/username_here/user/' wp-config.php
RUN sed -i 's/password_here/password/' wp-config.php
RUN sed -i 's/localhost/illuminate-wp-boilerplate-db/' wp-config.php

EXPOSE 80
