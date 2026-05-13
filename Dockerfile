FROM richarvey/nginx-php-fpm:latest

# Set the working directory
WORKDIR /var/www/html

# This version handles both cases: 
# 1. If you are in the root and 'pakde-se2' is a subfolder
# 2. If you are already inside 'pakde-se2'
COPY . .

# Move the contents out of the subfolder IF it exists, 
# then delete the empty folder to keep it clean.
RUN if [ -d "pakde-se2" ]; then cp -R pakde-se2/* . && rm -rf pakde-se2; fi

# Tell the image where the Laravel public folder is
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1

# Fix permissions for Laravel
RUN chown -R poly:poly /var/www/html/storage /var/www/html/bootstrap/cache
