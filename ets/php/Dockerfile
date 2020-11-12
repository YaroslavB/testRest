FROM php:7.3-fpm

ARG DOCKER_HOST_IP=172.17.0.1
ARG IDE_KEY=PHPSTORM
ENV XDEBUG_CONFIG="idekey=${IDE_KEY} remote_enable=1 remote_host=${DOCKER_HOST_IP}"
RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        libzip-dev \
        libmcrypt-dev \
        && pecl install mcrypt-1.0.3 \
	    && docker-php-ext-enable mcrypt \
	    && pecl install xdebug-2.7.1 \
        && docker-php-ext-enable xdebug \
        && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
        && docker-php-ext-install -j$(nproc) gd


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www


CMD ["php-fpm"]