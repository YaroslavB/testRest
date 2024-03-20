FROM php:7.4.3-fpm

# 3 Install Additional dependencies
#RUN apk update && apk add --no-cache \
#    build-base shadow vim curl \
#    php7 \
#    php7-fpm \
#    php7-common \
#    php7-pdo \
#    php7-pdo_mysql \
#    php7-mysqli \
#    php7-mcrypt \
#    php7-mbstring \
#   php7-xml \
#   php7-openssl \
#   php7-json \
#   php7-phar \
#   php7-zip \
#   php7-gd \
#   php7-dom \
#   php7-session \
#    php7-zlib

RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip openssl \
    librabbitmq-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    libz-dev \
    && docker-php-ext-install intl opcache pdo pdo_mysql exif pcntl bcmath \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd \
     --with-freetype --with-jpeg \
    && docker-php-ext-install gd



# Clean
RUN rm -rf /var/cache/apk/* && docker-php-source delete

USER root

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

USER www-data:www-data

# Set working directory
WORKDIR /var/www
