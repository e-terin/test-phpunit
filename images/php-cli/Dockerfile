FROM composer AS composer
FROM php:8.0-cli
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN pecl install xdebug-3.0.3 \
    && docker-php-ext-enable xdebug

RUN apt-get update
RUN apt-get install -y zip libzip-dev \
    && docker-php-ext-install zip

#RUN addgroup -gid 1000 jek
#RUN useradd -rm -g 1000 -G sudo -u 1000

RUN groupadd --gid 1000 jek \
    && useradd --uid 1000 --gid jek --shell /bin/bash --create-home jek

WORKDIR /app
USER jek
CMD ['bash']