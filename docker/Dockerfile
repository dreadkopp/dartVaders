FROM php:fpm-alpine3.12

WORKDIR /var/www/dartVaders

COPY ./bin/composer.phar /usr/bin/composer

RUN apk add nginx tzdata npm git mysql-client bash\
  && cp /usr/share/zoneinfo/Europe/Berlin /etc/localtime \
  && echo "Europe/Berlin" > /etc/timezone \
  && chmod u+x /usr/bin/composer


RUN set -xe \
    && apk add pcre-dev ${PHPIZE_DEPS} \
    && pecl install redis \
    && pecl install pcov \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable pcov \
    && apk del pcre-dev ${PHPIZE_DEPS} \
    && rm -rf /tmp/pear \
    && apk --no-cache update \
    && apk --no-cache upgrade \
    && apk add --no-cache --virtual .persistent-deps freetds unixodbc \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS unixodbc-dev freetds-dev \
    && docker-php-source extract \
    && docker-php-ext-install pdo_dblib \
    && docker-php-ext-install pdo pdo_mysql \
    && apk del .build-deps


##setup nginx
RUN mkdir /etc/nginx/sites-enabled
COPY ./conf/nginx.conf /etc/nginx/conf.d/default.conf
COPY ./conf/nginx_base.conf /etc/nginx/nginx.conf
COPY ./entrypoints/rundev.sh /rundev.sh
RUN chown -R nginx:www-data /var/lib/nginx
RUN chmod -R 0770 /var/lib/nginx/tmp

ARG UID
RUN addgroup -S sail && adduser -S sail -G sail -u $UID
RUN echo 'export PS1="\u@\w:>"' > /home/sail/.bashrc

RUN apk add zlib-dev libpng-dev \
       freetype-dev \
       libjpeg-turbo-dev \
       && docker-php-ext-configure gd --with-libdir=/usr/include/ --with-jpeg  --with-freetype \
       && docker-php-ext-install gd \
       && docker-php-ext-install exif

ENTRYPOINT ["/rundev.sh"]
