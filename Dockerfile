FROM php:7.1-apache

COPY . /var/www/html
WORKDIR /var/www/html

RUN apt-get update && apt-get install git -y
RUN a2enmod rewrite

RUN curl \
  -sS https://getcomposer.org/installer \
  | php -- \
    --install-dir=/usr/bin/ \
    --filename=composer

RUN composer install --prefer-source --no-interaction

WORKDIR /var/www/html/wordpress
RUN cp wp-config-sample.php wp-config.php
RUN sed -i 's/database_name_here/illuminate-wp-boilerplate/' wp-config.php
RUN sed -i 's/username_here/root/' wp-config.php
RUN sed -i 's/password_here//' wp-config.php
RUN sed -i 's/localhost/mysql/' wp-config.php