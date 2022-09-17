FROM php:8.1.10-fpm-alpine
WORKDIR "/panako"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.1-sqlite3 zip; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
