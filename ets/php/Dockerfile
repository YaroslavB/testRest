FROM php:7.4-fpm-alpine

# 3 Install Additional dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    php7 \
    php7-fpm \
    php7-common \
    php7-pdo \
    php7-pdo_mysql \
    php7-mysqli \
    php7-mcrypt \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-gd \
    php7-dom \
    php7-session \
    php7-zlib

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-enable pdo_mysql

# Download and install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

ARG user=admin
ARG group=admin
ARG uid=1000
ARG gid=1000

RUN groupadd -g ${gid} ${group}
RUN useradd -u ${uid} -ms /bin/bash -g ${group} ${user}

COPY --chown=${group}:${user} . /var/projects

# Change current user to www
USER ${user}

# Set working directory
WORKDIR /var/www
