FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Copy your application files
COPY . .

RUN apt-get update && \
    apt-get install -y \
        libzip-dev zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install
        
RUN docker-php-ext-install pdo_mysql zip

CMD ["php", "artisan", "serve", "--host=0.0.0.1"]