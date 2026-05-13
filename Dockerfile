FROM richarvey/nginx-php-fpm:latest

# 1. Set the working directory inside the container
WORKDIR /var/www/html

# 2. Copy EVERYTHING from your repository into the container
COPY . .

# 3. SMART MOVE: If the folder 'pakde-se2' exists, move its contents to the root.
# If it doesn't exist (because you're already in the root), do nothing.
RUN if [ -d "pakde-se2" ]; then \
        cp -R pakde-se2/* . && \
        rm -rf pakde-se2; \
    fi

# 4. Set Environment Variables for this specific Nginx-PHP image
ENV WEBROOT /var/www/html/public
ENV APP_TYPE php
ENV SKIP_COMPOSER 1
ENV PHP_ERRORS_STDERR 1

# 5. Fix permissions so Laravel can write logs and cache
# This image uses the 'poly' user by default
RUN chown -R poly:poly /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Expose port 80
EXPOSE 80
