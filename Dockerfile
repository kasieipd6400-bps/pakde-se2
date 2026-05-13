FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Laravel configuration
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1
ENV PHP_ERRORS_STDERR 1

# Install dependencies if needed
RUN composer install --ignore-platform-reqs --no-interaction

EXPOSE 80
