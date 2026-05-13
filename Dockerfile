# Stage 1: Build dependencies
FROM composer:latest as vendor
WORKDIR /app
COPY . .
RUN composer install --ignore-platform-reqs --no-interaction --no-scripts --prefer-dist

# Stage 2: Runtime
FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy all code
COPY . .
# Copy vendor from Stage 1
COPY --from=vendor /app/vendor /var/www/html/vendor

# --- FIXED CONFIGURATION ---
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1
ENV PHP_ERRORS_STDERR 1

# Final permission check
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 80
