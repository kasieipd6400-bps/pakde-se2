# Stage 1: Build dependencies
FROM composer:latest as vendor
WORKDIR /app
COPY . .
RUN composer install --ignore-platform-reqs --no-interaction --prefer-dist

# Stage 2: Runtime
FROM richarvey/nginx-php-fpm:latest

# The image expects code in /var/www/html
WORKDIR /var/www/html
COPY . .
COPY --from=vendor /app/vendor /var/www/html/vendor

# --- CRITICAL CONFIGURATION ---
# These variables tell the base image's scripts how to configure Nginx
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1
ENV PHP_ERRORS_STDERR 1

# Ensure the storage directories exist and are writable
RUN mkdir -p storage/framework/sessions \
             storage/framework/views \
             storage/framework/cache \
             storage/logs \
             bootstrap/cache && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 80
