FROM php:8.4-apache

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y libzip-dev libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application source code to the Apache document root
COPY src/ /var/www/html/

# Set permissions for the Apache server
RUN chown -R www-data:www-data /var/www/html/ && \
    chmod -R 755 /var/www/html/

# Expose port 80
EXPOSE 80

# Set the default command to start Apache
CMD ["apache2-foreground"]