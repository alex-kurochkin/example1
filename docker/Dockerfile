FROM php:7.3-fpm-alpine3.12

RUN apk --no-cache add wget unzip

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=2.0.2
RUN mkdir /.composer
RUN chmod -R 777 /.composer

RUN echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT" >> /usr/local/etc/php/conf.d/z.ini
RUN echo "date.timezone = Europe/Moscow" >> /usr/local/etc/php/conf.d/z.ini

WORKDIR /app

COPY docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh

CMD /docker-entrypoint.sh
