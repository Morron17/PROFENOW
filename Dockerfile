FROM php:8.3-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

<<<<<<< HEAD
CMD php artisan serve --host=0.0.0.0 --port=10000
=======
CMD php artisan serve --host=0.0.0.0 --port=10000
>>>>>>> aff91345a9bc8a9fe05465a11b777b083f172062
