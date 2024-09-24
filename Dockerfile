FROM php:8.1-apache

ARG user
ARG uid
    
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nano \
    libpq-dev \
    libbz2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libssl-dev \
    libzip-dev \
    libsodium-dev \
    libicu-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd mysqli soap sodium intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

RUN sed -i -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

WORKDIR /var/www/html

USER $user
