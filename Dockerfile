FROM php:8.0-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application source code to the Apache document root
COPY src/ /var/www/html/

# Copy the initialization script
COPY src/init.sh /init.sh
RUN chmod +x /init.sh

# Set permissions for the Apache server
RUN chown -R www-data:www-data /var/www/html/ && \
    chmod -R 755 /var/www/html/

# Expose port 80
EXPOSE 80

# Use the custom initialization script
CMD ["/init.sh"]