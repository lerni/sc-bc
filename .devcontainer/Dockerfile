FROM mcr.microsoft.com/devcontainers/php:8.4

# Install PHP extensions required by Silverstripe CMS
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y libicu-dev libgd-dev libtidy-dev libzip-dev default-mysql-client \
    && docker-php-ext-install intl gd mysqli pdo_mysql tidy zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set Apache document root to public/, enable mod_rewrite and AllowOverride for .htaccess
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf \
    && a2enmod rewrite
