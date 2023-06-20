FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libpq-dev \
    curl \
    libcurl4-openssl-dev \
    libonig-dev \
    --no-install-recommends \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_pgsql -j$(nproc) gd curl mbstring

RUN apt-get update && apt-get install curl && \
  curl -sS https://getcomposer.org/installer | php \
  && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

#WORKDIR /app
#COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
#COPY . .
#COPY .env.dev .env
#
#RUN composer install --no-interaction
