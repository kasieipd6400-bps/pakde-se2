FROM richarvey/nginx-php-fpm:latest

# 1. Set the working directory
WORKDIR /var/www/html

# 2. Copy all files from your repo root to the container root
COPY . .

# 3. Force the image to use the 'public' folder as the web root
# This is what stops the 404
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1

# 4. Fix permissions for Laravel
RUN chown -R poly:poly /var/www/html/storage /var/www/html/bootstrap/cache
