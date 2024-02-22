FROM phpdockerio/php:8.3-fpm
WORKDIR "/app"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.3-intl \
        php8.3-mysql \
        php8.3-oauth \
        php8.3-redis \
        php8.3-uuid \
        php8.3-xdebug \
        php8.3-yaml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Append your alias to the existing .bashrc file
RUN echo "alias phpunit='/app/vendor/bin/phpunit'" >> /root/.bashrc
