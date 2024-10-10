# Use the official PHP image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Copy composer.lock and composer.json
COPY composer.json /var/www/html/

# Install system dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    freetype-dev git libjpeg-turbo-dev libzip-dev openssh-client postgresql-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql opcache

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Add UID '1000' to www-data
RUN usermod -u 1000 www-data

# Copy application files
COPY --chown=www-data:www-data . /var/www/html
COPY docker/php/php.ini /usr/local/etc/php/

# Change current user to www-data
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]