FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    pkg-config \
    git \
    curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install mysqli pdo pdo_mysql mbstring zip gd xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 9000