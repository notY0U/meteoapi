FROM php:7.4-fpm-alpine

 # Copy composer.lock and composer.json
COPY ./composer.lock* ./composer.json* /var/www/public/

# Set working directory
WORKDIR /var/www

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
 
 COPY docker-entrypoint.sh .

ENTRYPOINT ["docker-entrypoint.sh"]