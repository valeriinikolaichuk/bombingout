FROM php:8.2-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        librabbitmq-dev \
        libssl-dev \
        make \
        gcc \
        pkg-config \
        curl \
        git \
        unzip \
    && rm -rf /var/lib/apt/lists/*

# PKG_CONFIG_PATH
ENV PKG_CONFIG_PATH=/usr/lib/x86_64-linux-gnu/pkgconfig

# PECL amqp
RUN pecl install amqp-2.2.0 \
    && docker-php-ext-enable amqp

# MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html
