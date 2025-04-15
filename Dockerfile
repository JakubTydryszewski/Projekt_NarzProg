FROM php:8.2-apache

# Install mysqli extension and other necessary libraries
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Copy application files
COPY ./src/ /var/www/html/

# Expose port 80
EXPOSE 80
