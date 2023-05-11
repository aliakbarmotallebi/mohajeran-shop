#FROM php:7.4-fpm
FROM php:8.0-fpm

# Quando entrar no container, esse vai ser pasta principal que ele vai entrar
WORKDIR /var/www
# Aqui vai remover a pasta html
RUN rm -rf /var/www/html

# Para alterar o caminho da versão LTS do node acessar essa página
# https://github.com/nodesource/distributions#debmanual
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --chown=www-data:www-data . /var/www
RUN chmod -R 777 /var/www/storage/

COPY . .

RUN  npm install

# Liberar porta 9020 para iniciar o php-fpm server
EXPOSE 8100