FROM phpdockerio/php:8.2-fpm
WORKDIR "/app"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.2-intl \
        php8.2-mcrypt \
        php8.2-mysql \
        php8.2-oauth \
        php8.2-redis \
        php8.2-uuid \
        php8.2-xdebug \
        php8.2-yaml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Append your alias to the existing .bashrc file
RUN echo "alias phpunit='/app/vendor/bin/phpunit --color'" >> /root/.bashrc
