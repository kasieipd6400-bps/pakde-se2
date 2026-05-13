FROM richarvey/nginx-php-fpm:latest

# Set the working directory
WORKDIR /var/www/html

# Copy the contents of your subfolder into the container's web root
# Note the dot at the end of the first path
COPY pakde-se2/. .

# Tell the image where the Laravel public folder is now
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1

# Fix permissions for the Laravel storage and cache
RUN chown -R poly:poly /var/www/html/storage /var/www/html/bootstrap/cache
