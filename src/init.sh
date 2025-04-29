#!/bin/bash

# Install and enable mysqli
docker-php-ext-install mysqli pdo pdo_mysql
docker-php-ext-enable mysqli

# Start Apache
apache2-foreground