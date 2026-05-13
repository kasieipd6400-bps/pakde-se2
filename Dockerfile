# Stage 1: Install dependencies
FROM composer:latest as vendor
WORKDIR /app
COPY . .
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Stage 2: Web Server
FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy app code and the vendor folder from the previous stage
COPY . .
COPY --from=vendor /app/vendor /var/www/html/vendor

# Configuration
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1

# Fix permissions for Laravel
RUN mkdir -p storage/framework/sessions \
             storage/framework/views \
             storage/framework/cache \
             storage/logs \
             bootstrap/cache && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 80
