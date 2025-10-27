FROM php:8.2-fpm

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Optional: install other common PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip git curl && \
    docker-php-ext-install mysqli

WORKDIR /var/www
