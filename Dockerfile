FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# 1. Copy everything
COPY . .

# 2. Configure the image for Laravel
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1

# 3. Create folders if they are missing and fix permissions
# We use 'mkdir -p' to ensure they exist, then chown them.
RUN mkdir -p storage/framework/sessions \
             storage/framework/views \
             storage/framework/cache \
             storage/logs \
             bootstrap/cache && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 80
