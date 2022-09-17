FROM phpdockerio/php:8.1-fpm
WORKDIR "/panako"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.1-sqlite3; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
